<div>
    @include('auth::components.layouts.loader')

    <svg class="svg-sprite" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
        <symbol id="i-user" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-7 8-7s8 3 8 7"/></symbol>
        <symbol id="i-users" viewBox="0 0 24 24"><circle cx="9" cy="8" r="4"/><path d="M2 21c0-4 3-7 7-7s7 3 7 7"/><path d="M22 12c0-2-1.5-3.5-3.5-3.5S15 10 15 12"/></symbol>
        <symbol id="i-settings" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 11-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 110-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 114 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 110 4h-.09a1.65 1.65 0 00-1.51 1z"/></symbol>
        <symbol id="i-logout" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><path d="M16 17l5-5-5-5M21 12H9"/></symbol>
        <symbol id="i-home" viewBox="0 0 24 24"><path d="M3 10l9-7 9 7v10a2 2 0 01-2 2H5a2 2 0 01-2-2V10z"/><path d="M9 22V12h6v10"/></symbol>
        <symbol id="i-package" viewBox="0 0 24 24"><path d="M16 4l-4 2-4-2-4 2v14l4-2 4 2 4-2 4 2V6z"/><path d="M8 6v14M16 6v14"/></symbol>
        <symbol id="i-layers" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></symbol>
        <symbol id="i-shopping-bag" viewBox="0 0 24 24"><path d="M6 2l-2 5v13a2 2 0 002 2h12a2 2 0 002-2V7l-2-5H6z"/><path d="M4 7h16"/><path d="M16 11a4 4 0 01-8 0"/></symbol>
        <symbol id="i-chevron-down" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></symbol>
        <symbol id="i-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.5-4.5"/></symbol>
        <symbol id="i-x" viewBox="0 0 24 24"><path d="M18 6L6 18M6 6l12 12"/></symbol>
        <symbol id="i-check" viewBox="0 0 24 24"><path d="M5 12l5 5L20 7"/></symbol>
        <symbol id="i-alert" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 8v4M12 16h.01"/></symbol>
        <symbol id="i-info" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></symbol>
        <symbol id="i-plus" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></symbol>
        <symbol id="i-pencil" viewBox="0 0 24 24"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></symbol>
        <symbol id="i-trash" viewBox="0 0 24 24"><path d="M3 6h18M8 6V4a1 1 0 011-1h6a1 1 0 011 1v2"/><path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/><path d="M10 11v6M14 11v6"/></symbol>
        <symbol id="i-palette" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><circle cx="8" cy="10" r="1.5" fill="currentColor"/><circle cx="12" cy="8" r="1.5" fill="currentColor"/><circle cx="16" cy="10" r="1.5" fill="currentColor"/><circle cx="16" cy="14" r="1.5" fill="currentColor"/><circle cx="12" cy="16" r="1.5" fill="currentColor"/></symbol>
        <symbol id="i-ruler" viewBox="0 0 24 24"><path d="M3 10h18v4H3z"/><path d="M7 10V8M12 10V8M17 10V8M7 14v2M12 14v2M17 14v2"/></symbol>
        <symbol id="i-calendar" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></symbol>
        <symbol id="i-arrow-right" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></symbol>
        <symbol id="i-arrow-left" viewBox="0 0 24 24"><path d="M15 18l-6-6 6-6"/></symbol>
    </svg>

    <main class="admin-main">
        <div class="container">

            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <nav class="breadcrumb" aria-label="مسیر">
                        <a href="{{route('admin.product_management')}}">محصولات</a>
                        <span class="breadcrumb__sep">/</span>
                        <span class="breadcrumb__current">مدیریت سایزبندی</span>
                    </nav>
                    <h1 class="page-header__title">مدیریت <span>سایزبندی</span></h1>
                    <p class="page-header__desc">افزودن و سازماندهی سایزهای محصولات (S، M، L، XL، 40، 41 و...)</p>
                </div>
            </div>

            <!-- ═══════════ فرم افزودن سایز ═══════════ -->
            <section class="glass-card add-size-card">
                <header class="glass-card__head">
                    <h2 class="glass-card__title">افزودن سایز جدید</h2>
                    <span class="glass-card__count">
            <svg style="width:12px;height:12px;fill:none;stroke:currentColor;stroke-width:2.4;stroke-linecap:round;stroke-linejoin:round;"><use href="#i-plus"/></svg>
            سایز
          </span>
                </header>

                <form class="add-size-form" >

                    <div class="add-size-form__row">

                        <!-- مقدار سایز -->
                        <div class="form-field @error('sizeValue') has-error @enderror">
                            <label class="form-label" for="sizeValue">مقدار سایز</label>

                            <div class="size-input-wrap">
                                <input
                                    wire:model="sizeValue"
                                    type="text"
                                    class="form-input"
                                    id="sizeValue"
                                    name="sizeValue"
                                    placeholder="مثال: S، M، L، XL، 40، 41، 42..."
                                    autocomplete="off"
                                    maxlength="20"
                                />
                                <span class="size-live-chip is-empty" id="sizeLiveChip">?</span>
                            </div>

                            <span class="form-hint">
                <svg style="width:12px;height:12px;color:var(--accent);fill:none;stroke:currentColor;stroke-width:2.2;stroke-linecap:round;stroke-linejoin:round;">
                  <use href="#i-info"/>
                </svg>
                برای لباس: S، M، L، XL | برای کفش: 40، 41، 42
              </span>

                            @error('sizeValue')
                            <span class="form-error" role="alert">
                  <svg><use href="#i-alert"/></svg>
                  <span>{{ $message }}</span>
                </span>
                            @enderror
                        </div>

                        <div class="form-field @error('count') has-error @enderror">
                            <label class="form-label" for="sizeValue">تعداد</label>

                            <div class="size-input-wrap">
                                <input
                                    wire:model="count"
                                    type="text"
                                    class="form-input"
                                    id="sizeValue"
                                    name="sizeValue"
                                    placeholder="مثال:1,2,3..."
                                    autocomplete="off"
                                    maxlength="20"
                                />
                            </div>

                            @error('count')
                            <span class="form-error" role="alert">
                                    <svg><use href="#i-alert"/></svg>
                                    <span>{{ $message }}</span>
                            </span>
                            @enderror
                        </div>


                        <!-- دکمه افزودن -->
                        <button wire:click.prevent="createSize" class="form-submit">
                            <svg><use href="#i-plus"/></svg>
                            <span>افزودن سایز</span>
                        </button>

                    </div>

                </form>
            </section>

            <!-- ═══════════ جدول سایزها ═══════════ -->
            <section class="glass-card sizes-card">

                <header class="glass-card__head">
                    <h2 class="glass-card__title">لیست سایزها</h2>
                    <span class="glass-card__count">
            <svg style="width:12px;height:12px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;"><use href="#i-ruler"/></svg>
            {{ $this->sizes->count() ?? 0 }} سایز
          </span>
                </header>

                <!-- جستجو -->
                <div class="search-card">
                    <svg class="search-card__icon"><use href="#i-search"/></svg>
                    <input
                        wire:model="search"
                        @keyup.enter="$wire.searchData"
                        type="text"
                        class="search-card__input"
                        placeholder="جستجو در مقدار سایز..."
                        aria-label="جستجو در سایزها"
                    />
                    <span class="search-card__hint">نمایش <strong>{{ $this->sizes->count() ?? 0 }}</strong></span>
                </div>

                @if($this->sizes->count())
                    <!-- جدول -->
                    <div class="sizes-table-wrap">
                        <table class="sizes-table">
                            <thead>
                            <tr>
                                <th>مقدار سایز</th>
                                <th>تاریخ ایجاد</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($this->sizes as $size)
                                <tr>
                                    <td>
                                        <div class="size-cell">
                                            <span class="size-cell__">{{ $size->count }}</span>
                                            <span class="size-cell__chip">{{ $size->size }}</span>
                                        </div>
                                    </td>
                                    <td data-label="تاریخ ایجاد">
                      <span class="date-cell">
                        <svg><use href="#i-calendar"/></svg>
                        {{  \Hekmatinasser\Verta\Verta::instance($size->created_at)->formatJalaliDate() }}
                      </span>
                                    </td>
                                    <td>
                                        <div class="action-group">

                                            <button wire:click.prevent="$dispatch('delete', {size_id: {{ $size->id }}})" type="button" class="action-btn action-btn--delete" aria-label="حذف">
                                                <svg><use href="#i-trash"/></svg>
                                                <span class="action-btn__text">حذف</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <!-- Empty state -->
                    <div class="empty-state" role="status" aria-live="polite">
                        <div class="empty-state__visual" aria-hidden="true">
                            <div class="empty-state__glow"></div>
                            <div class="empty-state__ring"></div>
                            <div class="empty-state__ring empty-state__ring--2"></div>

                            <div class="empty-state__icon">
                                <svg viewBox="0 0 64 64" fill="none">
                                    <!-- خط‌کش با علامت‌ها -->
                                    <rect x="10" y="22" width="44" height="20" rx="3"
                                          stroke="currentColor" stroke-width="2.4"/>
                                    <path d="M 18 22 L 18 30 M 26 22 L 26 32 M 34 22 L 34 30 M 42 22 L 42 32 M 50 22 L 50 30"
                                          stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/>
                                </svg>
                            </div>

                            <span class="empty-state__sparkle empty-state__sparkle--1"></span>
                            <span class="empty-state__sparkle empty-state__sparkle--2"></span>
                            <span class="empty-state__sparkle empty-state__sparkle--3"></span>
                        </div>

                        <h3 class="empty-state__title">هیچ سایزی وجود ندارد</h3>
                        <p class="empty-state__desc">
                            هنوز هیچ سایزی برای محصولات تعریف نکرده‌اید. اولین سایز را با فرم بالا اضافه کنید.
                        </p>
                    </div>
                @endif

            </section>

            <!-- صفحه‌بندی -->
            {{$this->sizes->links('vendor.livewire.admin_pagination')}}

        </div>
    </main>

</div>
@assets
<link rel="stylesheet" href="{{asset('Panel/Notifications/style.css')}}">
<script src="{{asset('Panel/Notifications/script.js')}}"></script>
@endassets
@script
<script>
    Livewire.on('size.created', () => {
        Noty.toast({
            type: 'success',
            message: 'سایز محصول با موفقیت ساخته شد',
            duration: 4000,
        });
    });
    Livewire.on('delete', (event) => {
        Noty.delete({
            title: 'حذف سایز',
            text: 'آیا از حذف این سایز مطمئنید؟ این عمل قابل بازگشت نیست و تمام اطلاعات سایز برای همیشه حذف خواهد شد.',
            confirmText: 'بله، حذف کن',
        }).then(ok => {
            if (ok) {
                Livewire.dispatch('size.delete', {id: event.size_id});
                Noty.toast({
                    type: 'error',
                    message: 'سایز حذف شد.',
                    duration: 8000
                });
            }
        });
    })
</script>
@endscript
