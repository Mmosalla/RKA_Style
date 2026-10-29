<div>

    @include('auth::components.layouts.loader')

    <main class="admin-main">
        <div class="container">

            <!-- هدر صفحه -->
            <div class="page-header">
                <div>
                    <h1 class="page-header__title">مدیریت <span>مشتریان</span></h1>
                    <p class="page-header__desc">مشاهده، جستجو و مدیریت کاربران فروشگاه</p>
                </div>
                <div class="page-stats">
          <span class="page-stat">
            <span class="page-stat__dot page-stat__dot--active"></span>
            فعال: <strong>{{$this->usersList->where('status', \Modules\Auth\Enums\UserStatusEnum::ACTIVE->value)->count()}}</strong>
          </span>
                    <span class="page-stat">
            <span class="page-stat__dot page-stat__dot--inactive"></span>
            غیرفعال: <strong>{{$this->usersList->where('status', \Modules\Auth\Enums\UserStatusEnum::INACTIVE->value)->count()}}</strong>
          </span>
                    <span class="page-stat">
            <span class="page-stat__dot page-stat__dot--banned"></span>
            بن‌شده: <strong>{{$this->usersList->where('status', \Modules\Auth\Enums\UserStatusEnum::Banned)->count()}}</strong>
          </span>
                </div>
            </div>

            <!-- کارت جستجو -->
            <div class="search-card">
                <svg class="search-card__icon">
                    <use href="#i-search"/>
                </svg>
                <input
                    wire:model="search"
                    @keyup.enter="$wire.searchData"
                    type="text"
                    class="search-card__input"
                    placeholder="جستجو در نام، شماره تماس یا یوزرنیم..."
                    aria-label="جستجو در مشتریان"
                />
                <span class="search-card__hint">
          مجموع: <strong>{{$this->usersList->count() }} مشتری</strong>
        </span>
            </div>

            <!-- کارت جدول -->
            <div class="users-card">

                <header class="users-card__head">
                    <h2 class="users-card__title">لیست مشتریان</h2>
                    <span class="users-card__count">{{$this->usersList->count() }} کاربر</span>
                </header>

                <div class="users-table-wrap">
                    <table class="users-table">
                        <thead>
                        <tr>
                            <th>کاربر</th>
                            <th>شماره تماس</th>
                            <th>تاریخ عضویت</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($this->usersList as $user)
                            <tr>
                                <td>
                                    <div class="user-cell">
                                        <div class="user-cell__avatar user-cell__avatar--1">{{$user->username}}</div>
                                        <div class="user-cell__info">
                                            <div class="user-cell__name">{{$user->username}}</div>
                                            {{--                    <div class="user-cell__username">@ali_rezaei</div>--}}
                                        </div>
                                    </div>
                                </td>
                                <td><span class="phone-cell" dir="ltr">{{$user->mobile}}</span></td>
                                <td><span
                                        class="date-cell">{{\Hekmatinasser\Verta\Verta::instance($user->created_at)->formatJalaliDate()}}</span>
                                </td>
                                @if($user->status === \Modules\Auth\Enums\UserStatusEnum::ACTIVE->value)
                                    <td><span wire:click.prevent="changeStatus('{{$user->status}}' , {{$user->id}})" class="status-badge status-badge--active">فعال</span></td>
                                @elseif($user->status === \Modules\Auth\Enums\UserStatusEnum::INACTIVE->value)
                                    <td><span wire:click.prevent="changeStatus('{{$user->status}}' , {{$user->id}})" class="status-badge status-badge--inactive">غیره فعال</span></td>
                                @elseif($user->status === \Modules\Auth\Enums\UserStatusEnum::Banned->value)
                                    <td><span wire:click.prevent="changeStatus('{{$user->status}}' , {{$user->id}})" class="status-badge status-badge--banned">بن شده</span></td>
                                @endif
                                <td>
                                    <div class="action-group">
                                        <button class="action-btn action-btn--role" data-modal="roleModal"
                                                data-user="علی رضایی">
                                            <svg>
                                                <use href="#i-user-shield"/>
                                            </svg>
                                            <span class="action-btn__text">نقش</span>
                                        </button>
                                        <button class="action-btn action-btn--edit" aria-label="ویرایش">
                                            <svg>
                                                <use href="#i-pencil"/>
                                            </svg>
                                            <span class="action-btn__text">ویرایش</span>
                                        </button>
                                        <button class="action-btn action-btn--delete" aria-label="حذف">
                                            <svg>
                                                <use href="#i-trash"/>
                                            </svg>
                                            <span class="action-btn__text">حذف</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <div class="empty-state">
                                <div class="empty-state__title">هنوز دسته بندی اضافه نشده</div>
                                <div class="empty-state__desc">از فرم بالا برای افزودن اولین دسته بندی استفاده کنید.
                                </div>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    <div class="role-modal" id="roleModal" role="dialog" aria-modal="true" aria-label="تعیین نقش کاربری">
        <div class="role-modal__backdrop" data-close="roleModal"></div>
        <div class="role-modal__content">

            <button class="modal-close" data-close="roleModal" aria-label="بستن">
                <svg>
                    <use href="#i-x"/>
                </svg>
            </button>

            <!-- هدر مودال -->
            <div class="role-modal__header">
                <div class="role-modal__icon">
                    <svg>
                        <use href="#i-user-shield"/>
                    </svg>
                </div>
                <h2 class="role-modal__title">تعیین نقش کاربری</h2>
                <p class="role-modal__subtitle">نقش مورد نظر را برای این کاربر انتخاب کنید</p>
            </div>

            <!-- لیست نقش‌ها -->
            <div class="role-options">

                <!-- مدیر کل -->
                <label class="role-option role-option--super">
                    <input type="radio" name="role" value="super-admin" class="role-option__input"/>
                    <div class="role-option__content">
                        <div class="role-option__icon">
                            <svg>
                                <use href="#i-crown"/>
                            </svg>
                        </div>
                        <div class="role-option__info">
                            <span class="role-option__name">مدیر کل</span>
                            <span class="role-option__desc">دسترسی کامل به تمام بخش‌های سیستم</span>
                        </div>
                        <div class="role-option__radio"></div>
                    </div>
                </label>

                <!-- مدیر محصولات -->
                <label class="role-option role-option--products">
                    <input type="radio" name="role" value="products-manager" class="role-option__input"/>
                    <div class="role-option__content">
                        <div class="role-option__icon">
                            <svg>
                                <use href="#i-package"/>
                            </svg>
                        </div>
                        <div class="role-option__info">
                            <span class="role-option__name">مدیر محصولات</span>
                            <span class="role-option__desc">مدیریت محصولات، دسته‌بندی و موجودی</span>
                        </div>
                        <div class="role-option__radio"></div>
                    </div>
                </label>

                <!-- مدیر سفارشات -->
                <label class="role-option role-option--orders">
                    <input type="radio" name="role" value="orders-manager" class="role-option__input"/>
                    <div class="role-option__content">
                        <div class="role-option__icon">
                            <svg>
                                <use href="#i-shopping-bag"/>
                            </svg>
                        </div>
                        <div class="role-option__info">
                            <span class="role-option__name">مدیر سفارشات</span>
                            <span class="role-option__desc">مشاهده و مدیریت سفارشات و ارسال</span>
                        </div>
                        <div class="role-option__radio"></div>
                    </div>
                </label>

                <!-- پشتیبان -->
                <label class="role-option role-option--support">
                    <input type="radio" name="role" value="support" class="role-option__input"/>
                    <div class="role-option__content">
                        <div class="role-option__icon">
                            <svg>
                                <use href="#i-headphones"/>
                            </svg>
                        </div>
                        <div class="role-option__info">
                            <span class="role-option__name">پشتیبان</span>
                            <span class="role-option__desc">پاسخ به سوالات و پشتیبانی مشتریان</span>
                        </div>
                        <div class="role-option__radio"></div>
                    </div>
                </label>

            </div>

            <!-- دکمه‌ها -->
            <div class="role-modal__actions">
                <button type="button" class="btn-cancel" data-close="roleModal">انصراف</button>
                <button type="button" class="btn-confirm">
                    <svg>
                        <use href="#i-check"/>
                    </svg>
                    <span>ذخیره نقش</span>
                </button>
            </div>

        </div>
    </div>

</div>

@assets
<link rel="stylesheet" href="{{asset('Panel/Notifications/style.css')}}">
<script src="{{asset('Panel/Notifications/script.js')}}"></script>
@endassets
@script
<script>
    Livewire.on('user.changeStatus', () => {
        Noty.toast({
            type: 'success',
            message: 'وضعیت کاربر با موفقیت ویراش شد',
            duration: 4000,
        });
    });
</script>
@endscript
