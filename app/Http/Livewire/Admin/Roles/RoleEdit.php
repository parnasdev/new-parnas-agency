<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Validation\Rule;
use Livewire\Component;

class RoleEdit extends Component
{

    public Role $role;
    public array $permissionIds = [];

    public function rules()
    {
        return [
            'role.name' => ['required' , 'string' , 'max:30'],
            'role.label' => ['required', 'string' , 'max:30'],
            'role.is_access_panel' => ['required'],
            'role.is_access_dashboard' => ['required'],
            'role.is_custom' => ['required'],
            'role.see_all_post' => ['required'],
            'role.custom_route_name_access' => [Rule::when($this->role->is_custom , 'required' , 'nullable')],
        ];
    }

    public function mount()
    {
        $this->permissionIds = $this->role->permissions()->pluck('id')->toArray();
    }

    public function render()
    {
        $permissions = Permission::query()->get();
        return view('livewire.admin.roles.role-edit' , compact('permissions'));
    }

    public function submit()
    {
        $this->validate();

        $this->role->save();

        $this->role->permissions()->sync($this->permissionIds);

        session()->flash('message' , ['title' =>  'مقام شما با موفقیت ثبت شد.' , 'icon' => 'success']);

        return redirect(route('admin.roles.index'));
    }
}
