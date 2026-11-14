<?php

namespace Modules\RolePermission\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    use WithPagination;

    #[Rule('required')]
    public $name;
    public $editIndex;
    public $user_permissions = [];
    protected $paginationTheme = 'bootstrap';

    public $role_id;

    public function getRoleId($id)
    {
        $this->role_id = Role::query()->findOrFail($id);
        foreach ($this->role_id->permissions as $permission) {
            $this->user_permissions[] = $permission->name;
        }
    }

    public function syncPermissions()
    {
        $role = Role::query()->findOrFail($this->role_id->id);

        $role->syncPermissions($this->user_permissions);
        $this->dispatch('role_syncPermissions');
    }

    public function createRole(): void
    {
        $this->validate();

        $role = Role::query()->create([
            'name' => $this->name,
        ]);


        $this->reset('name');
        $this->dispatch('role.created');
    }

    public function editRow($id): void
    {
        $role = Role::query()->find($id);
        foreach ($role->permissions as $permission) {
            $this->user_permissions[] = $permission->name;
        }
        $this->name = $role->name;
        $this->editIndex = $id;
    }

    public function updateRow(): void
    {
        $this->validate();
        $role = Role::query()->find($this->editIndex);
        $role->update([
            'name' => $this->name,
        ]);

        $role->syncPermissions($this->user_permissions);
        $this->user_permissions = [];
        $this->reset('name');
        $this->dispatch('role.updated');
        $this->editIndex = null;
    }

    #[On('role.delete')]
    public function destroyRole($role_id): void
    {
        Role::destroy($role_id);
    }

    #[Layout('rolepermission::components.layouts.master')]
    #[Title('مدیریت نقش‌ها | آرکا')]
    public function render(): view
    {
        $permissions = Permission::query()->pluck('name');
        $roles = Role::query()->paginate(10);
        return view('rolepermission::livewire.roles', compact('roles', 'permissions'));
    }
}
