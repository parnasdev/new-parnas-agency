<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\PostFile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UserEdit extends Component
{

    public User $user;

    public $file = [
        'id' => null,
        'url' => null,
        'alt' => null,
        'type' => 1,
    ];

    public array $files = [];


    public function mount()
    {
        $this->file = optional($this->user->files()->first())->toArray() ?? ['id' => null, 'url' => null, 'alt' => null, 'type' => 1,];
    }

    public function rules()
    {
        return [
            'user.name' => ['nullable'],
            'user.family' => ['nullable'],
            'user.role_id' => ['required'],
            'user.phone' => [Rule::when($this->user['username'] == '' && $this->user['email'] == '' , 'required' , 'nullable') , Rule::unique('users' , 'phone')->ignore($this->user->id)],
            'user.username' => [Rule::when($this->user['phone'] == '' && $this->user['email'] == '' ,'required' , 'nullable'), Rule::unique('users' , 'username')->ignore($this->user->id)],
            'user.email' => [Rule::when($this->user['username'] == '' && $this->user['phone'] == '' ,'required' , 'nullable') , Rule::unique('users' , 'email')->ignore($this->user->id)],
        ];
    }

    public function render()
    {
        $roles = Role::query()->get();
        return view('livewire.admin.users.user-edit' , compact('roles'));
    }

    public function submit()
    {
        $this->validate();

        $this->user->save();

        if (is_null($this->file['id'])) {
            PostFile::query()->create([
                'url' => $this->file['url'],
                'alt' => $this->user->fullName(),
                'type' => $this->file['type'],
                'post_fileable_id' => $this->user->id,
                'post_fileable_type' => get_class($this->user)
            ]);
        } else {
            PostFile::query()->find($this->file['id'])->update([
                'url' => $this->file['url'],
                'type' => $this->file['type'],
            ]);
        }

        session()->flash('message' , ['title' =>  'کاربر شما با موفقیت ثبت شد.' , 'icon' => 'success']);

        return redirect(route('admin.users.index'));
    }

    public function openFileManager($file_type , $maxItems , $type = 'all')
    {
        $this->emit('getData_fileManager' , ['maxItems' => $maxItems , 'file_type' => $file_type , 'direction' => 'categories' , 'type' => $type]);
        $this->dispatchBrowserEvent('open-modal', ['name' => 'uploader']);
    }

    public function deleteFile()
    {
        if (!is_null($this->file['id']))
            PostFile::query()->find($this->file['id'])->delete();

        $this->file = [
            'id' => null,
            'url' => null,
            'alt' => null,
            'type' => null,
        ];
    }
}
