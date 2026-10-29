<div>

    @include('auth::components.layouts.loader')

    <svg class="svg-sprite" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
        <symbol id="i-user" viewBox="0 0 24 24">
            <circle cx="12" cy="8" r="4"/>
            <path d="M4 21c0-4 4-7 8-7s8 3 8 7"/>
        </symbol>
        <symbol id="i-users" viewBox="0 0 24 24">
            <circle cx="9" cy="8" r="4"/>
            <path d="M2 21c0-4 3-7 7-7s7 3 7 7"/>
            <path d="M22 12c0-2-1.5-3.5-3.5-3.5S15 10 15 12"/>
        </symbol>
        <symbol id="i-settings" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="3"/>
            <path
                d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 11-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 110-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 114 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 110 4h-.09a1.65 1.65 0 00-1.51 1z"/>
        </symbol>
        <symbol id="i-logout" viewBox="0 0 24 24">
            <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/>
            <path d="M16 17l5-5-5-5M21 12H9"/>
        </symbol>
        <symbol id="i-home" viewBox="0 0 24 24">
            <path d="M3 10l9-7 9 7v10a2 2 0 01-2 2H5a2 2 0 01-2-2V10z"/>
            <path d="M9 22V12h6v10"/>
        </symbol>
        <symbol id="i-package" viewBox="0 0 24 24">
            <path d="M16 4l-4 2-4-2-4 2v14l4-2 4 2 4-2 4 2V6z"/>
            <path d="M8 6v14M16 6v14"/>
        </symbol>
        <symbol id="i-layers" viewBox="0 0 24 24">
            <path d="M12 2L2 7l10 5 10-5-10-5z"/>
            <path d="M2 17l10 5 10-5"/>
            <path d="M2 12l10 5 10-5"/>
        </symbol>
        <symbol id="i-shopping-bag" viewBox="0 0 24 24">
            <path d="M6 2l-2 5v13a2 2 0 002 2h12a2 2 0 002-2V7l-2-5H6z"/>
            <path d="M4 7h16"/>
            <path d="M16 11a4 4 0 01-8 0"/>
        </symbol>
        <symbol id="i-chevron-down" viewBox="0 0 24 24">
            <path d="M6 9l6 6 6-6"/>
        </symbol>
        <symbol id="i-search" viewBox="0 0 24 24">
            <circle cx="11" cy="11" r="7"/>
            <path d="M21 21l-4.5-4.5"/>
        </symbol>
        <symbol id="i-x" viewBox="0 0 24 24">
            <path d="M18 6L6 18M6 6l12 12"/>
        </symbol>
        <symbol id="i-check" viewBox="0 0 24 24">
            <path d="M5 12l5 5L20 7"/>
        </symbol>
        <symbol id="i-alert" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10"/>
            <path d="M12 8v4M12 16h.01"/>
        </symbol>
        <symbol id="i-info" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10"/>
            <path d="M12 16v-4M12 8h.01"/>
        </symbol>
        <symbol id="i-plus" viewBox="0 0 24 24">
            <path d="M12 5v14M5 12h14"/>
        </symbol>
        <symbol id="i-pencil" viewBox="0 0 24 24">
            <path d="M12 20h9"/>
            <path d="M16.5 3.5a2.12 2.12 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/>
        </symbol>
        <symbol id="i-trash" viewBox="0 0 24 24">
            <path d="M3 6h18M8 6V4a1 1 0 011-1h6a1 1 0 011 1v2"/>
            <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
            <path d="M10 11v6M14 11v6"/>
        </symbol>
        <symbol id="i-palette" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10"/>
            <circle cx="8" cy="10" r="1.5" fill="currentColor"/>
            <circle cx="12" cy="8" r="1.5" fill="currentColor"/>
            <circle cx="16" cy="10" r="1.5" fill="currentColor"/>
            <circle cx="16" cy="14" r="1.5" fill="currentColor"/>
            <circle cx="12" cy="16" r="1.5" fill="currentColor"/>
        </symbol>
        <symbol id="i-calendar" viewBox="0 0 24 24">
            <rect x="3" y="4" width="18" height="18" rx="2"/>
            <path d="M16 2v4M8 2v4M3 10h18"/>
        </symbol>
        <symbol id="i-droplet" viewBox="0 0 24 24">
            <path d="M12 2.7L5.5 9.2a9 9 0 1012.9 0z"/>
        </symbol>
        <symbol id="i-arrow-right" viewBox="0 0 24 24">
            <path d="M9 18l6-6-6-6"/>
        </symbol>
        <symbol id="i-arrow-left" viewBox="0 0 24 24">
            <path d="M15 18l-6-6 6-6"/>
        </symbol>
    </svg>

    <main class="admin-main">
        <div class="container">

            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <nav class="breadcrumb" aria-label="مسیر">
                        <a href="{{route('admin.product_management')}}">محصولات</a>
                        <span class="breadcrumb__sep">/</span>
                        <span class="breadcrumb__current">مدیریت رنگ‌ها</span>
                    </nav>
                    <h1 class="page-header__title">مدیریت <span>رنگ محصولات</span></h1>
                    <p class="page-header__desc">افزودن، ویرایش و سازماندهی رنگ‌های محصولات فروشگاه</p>
                </div>
            </div>

            <!-- ═══════════ فرم افزودن رنگ ═══════════ -->
            <section class="glass-card add-color-card">
                <header class="glass-card__head">
                    <h2 class="glass-card__title">افزودن رنگ جدید</h2>
                    <span class="glass-card__count">
            <svg style="width:12px;height:12px;fill:none;stroke:currentColor;stroke-width:2.4;stroke-linecap:round;stroke-linejoin:round;"><use href="#i-plus"/></svg>
            رنگ
          </span>
                </header>

                <form class="add-color-form" >

                    <div class="add-color-form__row">

                        <!-- نام رنگ -->
                        <div class="form-field @error('colorName') has-error @enderror">
                            <label class="form-label" for="colorName">نام رنگ</label>
                            <input
                                wire:model="colorName"
                                type="text"
                                class="form-input"
                                id="colorName"
                                name="colorName"
                                placeholder="مثال: کرم، سرمه‌ای، زیتونی..."
                                autocomplete="off"
                            />
                            @error('colorName')
                            <span class="form-error" role="alert">
                  <svg><use href="#i-alert"/></svg>
                  <span>{{ $message }}</span>
                </span>
                            @enderror
                        </div>



                        <!-- کد رنگ -->
                        <div class="form-field @error('colorCode') has-error @enderror">
                            <label class="form-label" for="colorCode">کد رنگ</label>
                            <div class="color-code-group">
                                <!-- Color picker -->
                                <div class="color-picker-wrap" id="colorPickerWrap">
                                    <input
                                        type="color"
                                        id="colorPickerNative"
                                        value="#C6A758"
                                        aria-label="انتخاب رنگ از پالت"
                                    />
                                    <div class="color-picker-btn" id="colorPickerBtn" style="--picker-color: #C6A758;"></div>
                                </div>

                                <!-- Hex input -->
                                <div class="color-hex-wrap">
                                    <span class="color-hex-prefix">#</span>
                                    <input
                                        wire:model="colorCode"
                                        type="text"
                                        class="form-input"
                                        id="colorCode"
                                        name="colorCode"
                                        placeholder="C6A758"
                                        autocomplete="off"
                                        maxlength="7"
                                        dir="ltr"
                                    />
                                </div>
                            </div>
                            @error('colorCode')
                            <span class="form-error" role="alert">
                  <svg><use href="#i-alert"/></svg>
                  <span>{{ $message }}</span>
                </span>
                            @enderror
                        </div>

                        <!-- دکمه افزودن -->
                        <button wire:click.prevent="createColor" class="form-submit">
                            <svg><use href="#i-plus"/></svg>
                            <span>افزودن رنگ</span>
                        </button>

                    </div>

                    <!-- پیش‌نمایش زنده -->
                    <div class="color-live-preview" id="livePreview">
                        <span class="color-live-preview__label">پیش‌نمایش:</span>
                        <div class="color-live-preview__swatch" id="livePreviewSwatch" style="--preview-color: #C6A758;"></div>
                        <span class="color-live-preview__code" id="livePreviewCode">#C6A758</span>
                    </div>

                </form>
            </section>

            <!-- ═══════════ جدول رنگ








            ‌ها ═══════════ -->
            <section class="glass-card colors-card">

                <header class="glass-card__head">
                    <h2 class="glass-card__title">لیست رنگ‌ها</h2>
                    <span class="glass-card__count">
            <svg style="width:12px;height:12px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;"><use href="#i-palette"/></svg>
            {{ $this->colorList->count() ?? 0 }} رنگ
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
                        placeholder="جستجو در نام یا کد رنگ..."
                        aria-label="جستجو در رنگ‌ها"
                    />
                    <span class="search-card__hint">نمایش <strong>{{ $this->colorList->count() ?? 0 }}</strong></span>
                </div>

                @if($this->colorList->count())
                    <!-- جدول -->
                    <div class="colors-table-wrap">
                        <table class="colors-table">
                            <thead>
                            <tr>
                                <th>نام رنگ</th>
                                <th>کد رنگ</th>
                                <th>تاریخ ایجاد</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($this->colorList as $color)
                                <tr>
                                    <td>
                                        <div class="color-cell">
                                            <div class="color-cell__swatch" style="--swatch-color: {{ $color->code }}"></div>
                                            <div class="color-cell__info">
                                                <div class="color-cell__name">{{ $color->name }}</div>
                                                <div class="color-cell__slug">{{ $color->code  }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="کد رنگ">
                      <span class="color-code-cell" style="--swatch-color: {{ $color->code }}">
                        {{ $color->code }}
                      </span>
                                    </td>
                                    <td data-label="تاریخ ایجاد">
                      <span class="date-cell">
                        <svg><use href="#i-calendar"/></svg>
                        {{ \Hekmatinasser\Verta\Verta::instance($color->created_at )->formatJalaliDate() }}
                      </span>
                                    </td>
                                    <td>
                                        <div class="action-group">

                                            <button wire:click.prevent="$dispatch('delete', {color_id: {{ $color->id }}})" type="button" class="action-btn action-btn--delete" aria-label="حذف">
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
                                    <circle cx="32" cy="32" r="22" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/>
                                    <circle cx="22" cy="26" r="3" fill="currentColor"/>
                                    <circle cx="32" cy="22" r="3" fill="currentColor"/>
                                    <circle cx="42" cy="26" r="3" fill="currentColor"/>
                                    <circle cx="42" cy="38" r="3" fill="currentColor"/>
                                    <circle cx="32" cy="42" r="3" fill="currentColor"/>
                                    <path d="M 22 38 Q 26 34 30 38" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" opacity="0.6"/>
                                </svg>
                            </div>

                            <span class="empty-state__sparkle empty-state__sparkle--1"></span>
                            <span class="empty-state__sparkle empty-state__sparkle--2"></span>
                            <span class="empty-state__sparkle empty-state__sparkle--3"></span>
                        </div>

                        <h3 class="empty-state__title">هیچ رنگی وجود ندارد</h3>
                        <p class="empty-state__desc">
                            هنوز هیچ رنگی برای محصولات تعریف نکرده‌اید. اولین رنگ را با فرم بالا اضافه کنید.
                        </p>
                    </div>
                @endif

            </section>

            <!-- صفحه‌بندی -->
            {{$this->colorList->links('vendor.livewire.admin_pagination')}}


        </div>
    </main>
</div>
@assets
<link rel="stylesheet" href="{{asset('Panel/Notifications/style.css')}}">
<script src="{{asset('Panel/Notifications/script.js')}}"></script>
@endassets
@script
<script>
    Livewire.on('color.created', () => {
        Noty.toast({
            type: 'success',
            message: 'رنگ محصول با موفقیت ساخته شد',
            duration: 4000,
        });
    });
    Livewire.on('delete', (event) => {
        Noty.delete({
            title: 'حذف رنگ',
            text: 'آیا از حذف این رنگ مطمئنید؟ این عمل قابل بازگشت نیست و تمام اطلاعات رنگ برای همیشه حذف خواهد شد.',
            confirmText: 'بله، حذف کن',
        }).then(ok => {
            if (ok) {
                Livewire.dispatch('color.delete', {id: event.color_id});
                Noty.toast({
                    type: 'error',
                    message: 'رنگ حذف شد.',
                    duration: 8000
                });
            }
        });
    })
</script>
@endscript
