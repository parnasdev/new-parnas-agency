<?php

namespace App\Http\Livewire\Home\Auth;

use App\Http\Extra\ConvertDigits;
use App\Models\User;
use App\PrsAuth\PrsAuth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AuthenticatePage extends Component
{
    use ConvertDigits;
    public string $step = 'validation';

    public $referrer_url = '/';

    public $buttonSelected = true;

    protected $queryString = ['step' => ['except' => 'validation'], 'is_temp' => ['as' => 'pass'], 'referrer_url' => ['except' => '/', 'as' => 'referrer-url']];

    public array $user = ['username' => '']; // role => 2

    public bool $is_temp = false;

    public function mount()
    {
        $this->stepCheck();
    }

    public function render()
    {
        return view('livewire.home.auth.authenticate-page');
    }

    public function updated($name)
    {
        if ($name == 'user.username') {
            $this->user['username'] = $this->convertEn($this->user['username']);
        }


        if ($this->is_temp && $name == 'user.password') {
            $this->user['password'] = $this->convertEn($this->user['password']);
        }

        if ($this->step == 'register' && $name == 'user.token') {
            $this->user['token'] = $this->convertEn($this->user['token']);
        }
    }

    public function submit()
    {
        match ($this->step) {
            'validation' => $this->validateData(),
            'login' => $this->login(),
            'register' => $this->activation()
        };
    }

    public function validateData()
    {
        $this->validate([
            'user.username' => ['required', 'regex:/(09)[0-9]{9}/', 'digits:11']
        ]);

        $column = 'phone';

        $user = User::query()->where($column, $this->user['username'])->first();

        if (!empty($user)) {
            $this->step = 'login';
            if (is_null($user->password)) {
                $result = $this->sendMessage();
                $this->dispatchBrowserEvent('toastMessage', ['message' => $result->getError(), 'icon' => 'info']);
            }
            $this->stepCheck();
            $this->buttonSelected = false;
            return true;
        }

        $this->validate([
            'user.username' => ['required', 'regex:/(09)[0-9]{9}/', 'string', 'digits:11', Rule::unique('users', 'phone')],
        ]);

        $result = PrsAuth::getArray($this->user)->sendVerifyCode();
        $this->dispatchBrowserEvent("start-timer");
        if ($result) {
            $this->step = 'register';
            $this->stepCheck();
        }

        return true;
    }

    public function login()
    {
        $this->validate([
            'user.username' => 'required',
            'user.password' => 'required'
        ]);
        if ($this->is_temp) {
            $result = PrsAuth::getArray($this->user)->verifyTempPassword();
            if ($result instanceof User) {
                auth()->login($result);
                return redirect($this->referrer_url);
            }
        } else {
            $result = PrsAuth::getArray($this->user)->authenticate();
            if ($result->isSuccess) {
                return redirect($this->referrer_url);
            }

        }
        $this->addError('username', $result->getError());
    }

    public function activation()
    {
        $this->validate([
            'user.username' => ['required', 'regex:/(09)[0-9]{9}/', 'string', 'digits:11', $this->step == 'register' ? Rule::unique('users', 'phone') : null],
            'user.token' => 'required'
        ]);

        $result = PrsAuth::getArray($this->user)->activeAccount();
        if ($result instanceof User) {
            auth()->login($result);

            return redirect($this->referrer_url);
        }

        return false;
    }

    public function validationCondition()
    {
        return $this->user = ['username' => $this->user['username']];
    }

    public function loginCondition()
    {
        return $this->user = ['username' => $this->user['username'], 'password' => ''];
    }

    public function registerCondition()
    {
        return $this->user = ['username' => $this->user['username'], 'token' => ''];
    }

    public function stepCheck()
    {
        if ($this->user['username'] == '') {
            $this->step = 'validation';
            $this->is_temp = false;
        }

        match ($this->step) {
            'validation' => $this->validationCondition(),
            'login' => $this->loginCondition(),
            'register' => $this->registerCondition()
        };
    }

    public function sendMessage()
    {
        $this->validate([
            'user.username' => ['required', 'regex:/(09)[0-9]{9}/', 'string', 'digits:11', $this->step == 'register' ? Rule::unique('users', 'phone') : null],
        ]);

        $this->buttonSelected = true;
        $this->dispatchBrowserEvent("start-timer");
        return match ($this->step) {
            'login' => $this->sendTempPassword(),
            'register' => PrsAuth::getArray($this->user)->sendVerifyCode()
        };
    }

    public function sendTempPassword()
    {
        $result = PrsAuth::getArray($this->user)->sendTempPassword();
        $this->is_temp = true;
        $this->dispatchBrowserEvent("start-timer");
        return $result;
    }

    public function backToStep()
    {
        if ($this->step != 'validation') {
            $this->step = 'validation';
            if ($this->is_temp) {
                $this->is_temp = false;
            }

            $this->stepCheck();
        }
    }
}
