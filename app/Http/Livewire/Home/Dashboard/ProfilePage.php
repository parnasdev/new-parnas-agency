<?php

namespace App\Http\Livewire\Home\Dashboard;

use App\Models\PostFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfilePage extends Component
{
    use WithFileUploads;

    public $user = [];

    public $file;

    public $newPassword = [
        'password' => '',
        'password_confirmation' => ''
    ];

    public $currentPassword = [
        'current_password' => '',
        'new_password' => ''
    ];

    public function mount()
    {
        $this->user = [
            'name' => user()->name,
            'family' => user()->family,
            'email' => user()->email,
            'phone' => user()->phone,
        ];
    }

    public function render()
    {
        return view('livewire.home.dashboard.profile-page');
    }

    public function editProfile()
    {
        $this->validate([
            'user.name' => ['required', 'string', 'max:50'],
            'user.family' => ['required', 'string', 'max:50'],
            'user.email' => ['nullable', 'email', 'string', 'max:50'],
            'user.phone' => ['required', 'string', 'digits:11', Rule::unique('users', 'phone')->ignore(user()->id)],
        ]);

        user()->update(
            $this->user
        );

        if ($this->file) {
            $url = $this->file->store('users', 'uploads');

            PostFile::query()->create([
                'url' => url('/uploads/' . $url),
                'type' => 1,
                'private_path' => false,
                'post_fileable_id' => user()->id,
                'post_fileable_type' => get_class(user())
            ]);
        }

        $this->dispatchBrowserEvent('toastMessage', ['message' => 'اطلاعات شما ثبت شد.', 'icon' => 'success']);

        $this->emit('updateUser');
    }

    public function setPassword()
    {
        $this->validate([
            'newPassword.password' => ['required', 'string', 'min:8', 'max:16'],
            'newPassword.password_confirmation' => ['required'],
        ]);

        if ($this->newPassword['password'] !== $this->newPassword['password_confirmation']) {
            $this->addError('newPassword.password_confirmation', trans('validation.confirmed', 'رمزعبور تایید'));
            return false;
        }

        user()->update([
            'password' => Hash::make($this->newPassword['password'])
        ]);

        $this->newPassword = [
            'password' => '',
            'password_confirmation' => ''
        ];

        $this->dispatchBrowserEvent('toastMessage', ['message' => 'گذرواژه شما تغییر یافت.', 'icon' => 'success']);
    }
}

