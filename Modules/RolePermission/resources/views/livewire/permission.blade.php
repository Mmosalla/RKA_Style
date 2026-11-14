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
                        <span class="breadcrumb__current">مجوز ها</span>
                    </nav>
                    <h1 class="page-header__title">مدیریت <span>مجوز ها</span></h1>
                    <p class="page-header__desc">ایجاد، ویرایش و مجوزهای دسترسی سیستم</p>
                </div>
            </div>

            <!-- ═══════════ فرم ایجاد نقش ═══════════ -->
            <section class="glass-card create-role-card">
                <header class="glass-card__head">
                    @if($editedIndex)
                        <h2 class="glass-card__title">ویرایش مجوز </h2>

                    @else
                        <h2 class="glass-card__title">ایجاد مجوز جدید</h2>

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
                        <label class="form-label" for="roleName">نام مجوز</label>
                        <input
                            wire:model="name"
                            type="text"
                            class="form-input"
                            id="roleName"
                            name="roleName"
                            placeholder="مثال: ویرایش و ساخت"
                        />
                        @error('name')
                        <span style="text-decoration: red">{{$message}}</span>
                        @enderror
                    </div>

                    @if($editedIndex)
                        <button wire:click.prevent="updateRow" class="form-submit">
                            <svg>
                                <use href="#i-plus"/>
                            </svg>
                            <span>ویرایش مجوز</span>
                        </button>
                    @else
                        <button wire:click.prevent="createPermission" class="form-submit">
                            <svg>
                                <use href="#i-plus"/>
                            </svg>
                            <span>ایجاد مجوز</span>
                        </button>
                    @endif

                </form>
            </section>

            <!-- ═══════════ جدول نقش‌ها ═══════════ -->
            <section class="glass-card roles-card">

                <header class="glass-card__head">
                    <h2 class="glass-card__title">لیست مجوز ها</h2>
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
                        placeholder="جستجو در نام یا توضیح مجوز..."
                        aria-label="جستجو در مجوزها"
                    />
                    <span class="search-card__hint">نمایش <strong>۴</strong> از <strong>۴</strong></span>
                </div>

                <!-- جدول -->
                <div class="roles-table-wrap">
                    <table class="roles-table">
                        <thead>
                        <tr>
                            <th>نام مجوز</th>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($permissions as $permission)
                            <tr>
                                <td>
                                    <div class="role-cell">
                                        <div class="role-cell__icon role-cell__icon--admin">
                                            <svg>
                                                <use href="#i-shield"/>
                                            </svg>
                                        </div>
                                        <div class="role-cell__info">
                                            <div class="role-cell__name">{{$permission->name}}</div>
                                        </div>
                                    </div>
                                </td>

                                <td data-label="تاریخ ایجاد">
                  <span class="date-cell">
                    <svg><use href="#i-calendar"/></svg>
                    {{\Hekmatinasser\Verta\Verta::instance($permission->created_at)->formatJalaliDate()}}
                  </span>
                                </td>
                                <td>
                                    <div class="action-group">

                                        <button wire:click.prevent="editRow({{$permission->id}})" type="button" class="action-btn action-btn--edit" aria-label="ویرایش">
                                            <svg>
                                                <use href="#i-pencil"/>
                                            </svg>
                                            <span class="action-btn__text">ویرایش</span>
                                        </button>
                                        <button wire:click="$dispatch('delete' , {'permission_id':{{$permission->id}} }) " type="button" class="action-btn action-btn--delete" aria-label="حذف">
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
</div>
@assets
<link rel="stylesheet" href="{{asset('Panel/Notifications/style.css')}}">
<script src="{{asset('Panel/Notifications/script.js')}}"></script>
@endassets
@script
<script>
    Livewire.on('permissionCreated', () => {
        Noty.toast({
            type: 'success',
            message: 'مجوز با موفقیت ساخته شد',
            duration: 4000,
        });
    });
    Livewire.on('permissionUpdated', () => {
        Noty.toast({
            type: 'success',
            message: 'مجوز با موفقیت ویرایش شد',
            duration: 4000,
        });
    });
    Livewire.on('delete', (event) => {
        Noty.delete({
            title: 'حذف مجوز',
            confirmText: 'بله، حذف کن',
        }).then(ok => {
            if (ok) {
                Livewire.dispatch('permission.delete', {permission_id: event.permission_id});
                Noty.toast({
                    type: 'error',
                    message: 'مجوز حذف شد.',
                    duration: 8000
                });
            }
        });
    })

</script>
@endscript
