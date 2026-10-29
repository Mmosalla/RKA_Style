<?php

namespace Modules\User\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Auth\Enums\UserStatusEnum;
use Modules\Auth\Models\User;
use Modules\Category\Enums\CategoryStatusEnum;
use Modules\Category\Models\Category;

class UserManagement extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = 'bootstrap';

    #[Computed]
    public function usersList()
    {
        return User::query()
            ->where('status', UserStatusEnum::ACTIVE->value)
            ->paginate(10);
    }

    public function changeStatus($status, $id): void
    {

        if ($status === UserStatusEnum::ACTIVE->value) {
            User::query()
                ->findOrFail($id)
                ->update(['status' => UserStatusEnum::INACTIVE->value]);
        } elseif ($status === UserStatusEnum::INACTIVE->value) {
            User::query()
                ->findOrFail($id)
                ->update(['status' => UserStatusEnum::Banned->value]);
        } elseif ($status === UserStatusEnum::Banned->value) {
            User::query()
                ->findOrFail($id)
                ->update(['status' => UserStatusEnum::ACTIVE->value]);
        }
        $this->dispatch('user.changeStatus');
    }

    public function searchData()
    {
        $this->usersList = User::query()
            ->orWhere('username', 'like', '%' . $this->search . '%')
            ->orWhere('mobile', 'like', '%' . $this->search . '%')
            ->paginate(10);


    }

    #[Layout('dashboard::components.layouts.master')]
    #[Title('مدیرت کاربران')]
    public function render(): view
    {
        return view('user::livewire.user-management');
    }
}
