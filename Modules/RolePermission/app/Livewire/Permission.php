<?php

namespace Modules\RolePermission\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Permission extends Component
{
    use WithPagination;

    public $name;
    public $editedIndex;
    protected $paginationTheme = 'bootstrap';


    public function createPermission(): void
    {
        \Spatie\Permission\Models\Permission::query()->create([
            'name' => $this->name,
        ]);

        $this->reset('name');
        $this->dispatch('permissionCreated');
    }

    public function editRow($id): void
    {
        $permission = \Spatie\Permission\Models\Permission::query()->find($id);
        $this->name = $permission->name;
        $this->editedIndex=$id;
    }

    public function updateRow(): void
    {
        \Spatie\Permission\Models\Permission::query()->find($this->editedIndex)->update([
            'name' => $this->name,
        ]);

        $this->reset('name');
     $this->dispatch('permissionUpdated');
        $this->editedIndex=null;
    }

    #[On('permission.delete')]
    public function destroyPermission($permission_id): void
    {
        \Spatie\Permission\Models\Permission::destroy($permission_id);
    }
    #[Layout('rolepermission::components.layouts.master')]
    #[Title('مدیریت مجوزها | آرکا')]
    public function render(): view
    {
        $permissions = \Spatie\Permission\Models\Permission::query()->paginate(10);
        return view('rolepermission::livewire.permission' , compact('permissions'));
    }
}
