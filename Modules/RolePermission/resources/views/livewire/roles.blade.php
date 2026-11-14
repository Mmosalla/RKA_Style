<div>
    @include('auth::components.layouts.loader')

    <main class="admin-main">
        <div class="container">

            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <nav class="breadcrumb" aria-label="مسیر">
                        <a href="{{route('admin.dashboard')}}">داشبورد</a>
                        <span class="breadcrumb__sep">/</span>
                        <span class="breadcrumb__current">نقش‌ها</span>
                    </nav>
                    <h1 class="page-header__title">مدیریت <span>نقش‌ها</span></h1>
                    <p class="page-header__desc">ایجاد، ویرایش و انتساب مجوزهای دسترسی به نقش‌های مختلف سیستم</p>
                </div>
            </div>

            <!-- ═══════════ فرم ایجاد نقش ═══════════ -->
            <section class="glass-card create-role-card">
                <header class="glass-card__head">
                    @if($editIndex)
                        <h2 class="glass-card__title">ویرایش نقش </h2>

                    @else
                        <h2 class="glass-card__title">ایجاد نقش جدید</h2>

                    @endif
                    <span class="glass-card__count">
            <svg
                style="width:12px;height:12px;fill:none;stroke:currentColor;stroke-width:2.4;stroke-linecap:round;stroke-linejoin:round;"><use
                    href="#i-plus"/></svg>
            نقش
          </span>
                </header>

                <form class="create-role-form" action="#" method="POST">
                    <div class="form-field">
                        <label class="form-label" for="roleName">نام نقش</label>
                        <input
                            wire:model="name"
                            type="text"
                            class="form-input"
                            id="roleName"
                            name="roleName"
                            placeholder="مثال: مدیر محصولات"
                        />
                        @error('name')
                        <span style="text-decoration: red">{{$message}}</span>
                        @enderror
                    </div>

                    @if($editIndex)
                        <button wire:click.prevent="updateRow" class="form-submit">
                            <svg>
                                <use href="#i-plus"/>
                            </svg>
                            <span>ویرایش نقش</span>
                        </button>
                    @else
                        <button wire:click.prevent="createRole" class="form-submit">
                            <svg>
                                <use href="#i-plus"/>
                            </svg>
                            <span>ایجاد نقش</span>
                        </button>
                    @endif

                </form>
            </section>

            <!-- ═══════════ جدول نقش‌ها ═══════════ -->
            <section class="glass-card roles-card">

                <header class="glass-card__head">
                    <h2 class="glass-card__title">لیست نقش‌ها</h2>
                    <span class="glass-card__count">
            <svg
                style="width:12px;height:12px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;"><use
                    href="#i-shield"/></svg>
            ۴ نقش
          </span>
                </header>

                <!-- جستجو -->
                <div class="search-card">
                    <svg class="search-card__icon">
                        <use href="#i-search"/>
                    </svg>
                    <input
                        type="text"
                        class="search-card__input"
                        placeholder="جستجو در نام یا توضیح نقش..."
                        aria-label="جستجو در نقش‌ها"
                    />
                    <span class="search-card__hint">نمایش <strong>۴</strong> از <strong>۴</strong></span>
                </div>

                <!-- جدول -->
                <div class="roles-table-wrap">
                    <table class="roles-table">
                        <thead>
                        <tr>
                            <th>نام نقش</th>
                            <th>مجوزها</th>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($roles as $role)
                            <tr>
                                <td>
                                    <div class="role-cell">
                                        <div class="role-cell__icon role-cell__icon--admin">
                                            <svg>
                                                <use href="#i-shield"/>
                                            </svg>
                                        </div>
                                        <div class="role-cell__info">
                                            <div class="role-cell__name">{{$role->name}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="permissions-cell">
                                                                 @forelse($role->permissions as $permission)
                                                                         <span class="perm-badge perm-badge--products">{{$permission->name}}</span>

                                                                     @empty
                                                                         <span class="perm-badge perm-badge--products">رکوردی موجود نیست</span>
                                                                     @endforelse
                                    </div>
                                </td>
                                <td data-label="تاریخ ایجاد">
                  <span class="date-cell">
                    <svg><use href="#i-calendar"/></svg>
                    {{\Hekmatinasser\Verta\Verta::instance($role->created_at)->formatJalaliDate()}}
                  </span>
                                </td>
                                <td>
                                    <div class="action-group">
                                        <button
                                            wire:click.prevent="getRoleId({{$role->id}})"
                                            type="button"
                                            class="action-btn action-btn--assign"
                                            data-action="open-permissions"
                                            data-role-name="مدیر کل"
                                            aria-label="انتساب مجوز"
                                        >
                                            <svg>
                                                <use href="#i-shield"/>
                                            </svg>
                                            <span class="action-btn__text">انتساب مجوز</span>
                                        </button>
                                        <button wire:click.prevent="editRow({{$role->id}})" type="button"
                                                class="action-btn action-btn--edit" aria-label="ویرایش">
                                            <svg>
                                                <use href="#i-pencil"/>
                                            </svg>
                                            <span class="action-btn__text">ویرایش</span>
                                        </button>
                                        <button wire:click="$dispatch('delete' , {'role_id':{{$role->id}} }) "
                                                type="button" class="action-btn action-btn--delete" aria-label="حذف">
                                            <svg>
                                                <use href="#i-trash"/>
                                            </svg>
                                            <span class="action-btn__text">حذف</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <p>رکوردی وجود ندارد</p>
                        @endforelse


                        </tbody>
                    </table>
                </div>

            </section>

        </div>
    </main>

    <!-- ============================================================
         مودال انتساب مجوز
         ============================================================ -->
    <div wire:ignore.self class="perm-modal" id="permModal" role="dialog" aria-modal="true" aria-label="انتساب مجوز">
        <div class="perm-modal__backdrop" data-action="close-permissions"></div>
        <div class="perm-modal__content">


            <!-- بدنه -->
            <div  class="perm-modal__body">

                <!-- گروه ۱: محصولات -->
                <div class="perm-group perm-group--products">
                    <div class="perm-group__list">
                        @foreach($permissions as $permission)
                            <label class="perm-checkbox">
                                <input type="checkbox" wire:model="user_permissions" value="{{$permission}}"/>
                                <span class="perm-checkbox__box">
                <svg viewBox="0 0 24 24"><path d="M5 12l5 5L20 7"/></svg>
              </span>
                                <span class="perm-checkbox__label">{{$permission}} </span>
                            </label>
                        @endforeach

                    </div>
                </div>

            </div>

            <!-- فوتر -->
            <div class="perm-modal__footer">
                <button type="button" class="perm-btn perm-btn--cancel" data-action="close-permissions">
                    انصراف
                </button>
                <button wire:click.prevent="syncPermissions" type="button" class="perm-btn perm-btn--save">
                    <svg>
                        <use href="#i-check"/>
                    </svg>
                    <span>ذخیره مجوزها</span>
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
    Livewire.on('role.created', () => {
        Noty.toast({
            type: 'success',
            message: 'نقش با موفقیت ساخته شد',
            duration: 4000,
        });
    });
    Livewire.on('role_syncPermissions', () => {
        Noty.toast({
            type: 'success',
            message: 'نقش با موفقیت به مجوز وصل شد',
            duration: 4000,
        });
    });
    Livewire.on('role.updated', () => {
        Noty.toast({
            type: 'success',
            message: 'نقش با موفقیت ویرایش شد',
            duration: 4000,
        });
    });
    Livewire.on('delete', (event) => {
        Noty.delete({
            title: 'حذف نقش',
            text: 'یا از حذف نقش مطمئن هستید؟ با پاک کردن نقش تمام مجوزهای آن نیز هم پاک خواهد شد و غیرقابل بازگشت هستش.',
            confirmText: 'بله، حذف کن',
        }).then(ok => {
            if (ok) {
                Livewire.dispatch('role.delete', {role_id: event.role_id});
                Noty.toast({
                    type: 'error',
                    message: 'نقش حذف شد.',
                    duration: 8000
                });
            }
        });
    })

</script>
@endscript
