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
        <symbol id="i-trash" viewBox="0 0 24 24">
            <path d="M3 6h18M8 6V4a1 1 0 011-1h6a1 1 0 011 1v2"/>
            <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
            <path d="M10 11v6M14 11v6"/>
        </symbol>
        <symbol id="i-image" viewBox="0 0 24 24">
            <rect x="3" y="3" width="18" height="18" rx="2"/>
            <circle cx="8.5" cy="8.5" r="1.5"/>
            <path d="M21 15l-5-5L5 21"/>
        </symbol>
        <symbol id="i-images" viewBox="0 0 24 24">
            <rect x="3" y="3" width="14" height="14" rx="2"/>
            <path d="M9 21h10a2 2 0 002-2V9"/>
        </symbol>
        <symbol id="i-upload" viewBox="0 0 24 24">
            <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
            <path d="M17 8l-5-5-5 5"/>
            <path d="M12 3v12"/>
        </symbol>
        <symbol id="i-calendar" viewBox="0 0 24 24">
            <rect x="3" y="4" width="18" height="18" rx="2"/>
            <path d="M16 2v4M8 2v4M3 10h18"/>
        </symbol>
        <symbol id="i-star" viewBox="0 0 24 24">
            <path d="M12 2l3 7h7l-5.5 4.5 2 7L12 16l-5.5 4.5 2-7L3 9h7z"/>
        </symbol>
        <symbol id="i-arrow-right" viewBox="0 0 24 24">
            <path d="M9 18l6-6-6-6"/>
        </symbol>
        <symbol id="i-arrow-left" viewBox="0 0 24 24">
            <path d="M15 18l-6-6 6-6"/>
        </symbol>
        <symbol id="i-shirt" viewBox="0 0 24 24">
            <path d="M16 3l5 3-2 5-2-1v10H7V10l-2 1-2-5 5-3a4 4 0 008 0z"/>
        </symbol>
        <symbol id="i-file-image" viewBox="0 0 24 24">
            <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z"/>
            <path d="M14 2v6h6"/>
            <circle cx="10" cy="13" r="1.5"/>
            <path d="M20 17l-4-4-8 8"/>
        </symbol>
        <symbol id="i-sparkle" viewBox="0 0 24 24">
            <path d="M12 2l2 7h7l-5.5 4.5 2 7L12 16l-5.5 4.5 2-7L3 9h7z"/>
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
                        <span class="breadcrumb__current">مدیریت گالری</span>
                    </nav>
                    <h1 class="page-header__title">گالری <span>محصول</span></h1>
                    <p class="page-header__desc">تصاویر گالری محصول را مدیریت کنید — می‌توانید چند عکس را همزمان آپلود
                        کنید.</p>
                </div>
            </div>

            <!-- ═══════════ کارت اطلاعات محصول ═══════════ -->
            <div class="product-info-card">
                <div class="product-info-card__thumb">
                    <svg>
                        <use href="#i-shirt"/>
                    </svg>
                </div>
                <div class="product-info-card__info">
                    <div class="product-info-card__name">{{$product->title}}</div>
                    <div class="product-info-card__meta">
                        دسته بندی: <strong>{{$product->category->title}}</strong>
                    </div>
                </div>
                <span class="product-info-card__badge">{{$product->status}}</span>
            </div>

            <!-- ═══════════ فرم آپلود ═══════════ -->
            <section class="glass-card upload-card">
                <header class="glass-card__head">
                    <h2 class="glass-card__title">افزودن تصاویر جدید</h2>
                    <span class="glass-card__count">
            <svg
                style="width:12px;height:12px;fill:none;stroke:currentColor;stroke-width:2.4;stroke-linecap:round;stroke-linejoin:round;"><use
                    href="#i-plus"/></svg>
            آپلود
          </span>
                </header>

                <form class="upload-form" id="uploadForm">

                    <!-- دراپ‌زون -->
                    <div class="upload-zone @error('images') 'has-error' @enderror " id="uploadZone">
                        <input
                            wire:model="images"
                            @keyup.enter="$wire.createRow"
                            type="file"
                            class="upload-zone__input"
                            id="galleryInput"
                            name="newImages[]"
                            multiple
                            aria-label="آپلود تصاویر گالری"
                        />

                        <div class="upload-zone__icon">
                            <svg>
                                <use href="#i-upload"/>
                            </svg>
                        </div>

                        <div class="upload-zone__text">
                            <div class="upload-zone__title">
                                <strong>چند عکس</strong> را انتخاب کنید یا به اینجا بکشید
                            </div>
                            <div class="upload-zone__desc">
                                می‌توانید چند فایل را با هم انتخاب کنید (Ctrl + Click)
                            </div>
                        </div>

                        <div class="upload-zone__hints">
                            <span class="upload-zone__hint"><svg><use href="#i-check"/></svg> PNG / JPG / WebP</span>
                            <span class="upload-zone__hint"><svg><use
                                        href="#i-check"/></svg> حداکثر ۲ مگابایت هر فایل</span>
                            <span class="upload-zone__hint"><svg><use href="#i-check"/></svg> حداکثر ۱۰ تصویر</span>
                        </div>
                    </div>


                </form>
            </section>

            <!-- ═══════════ گرید پیش‌نمایش ═══════════ -->
            <section class="glass-card gallery-grid-card">
                <header class="glass-card__head">
                    <h2 class="glass-card__title">پیش‌نمایش تصاویر</h2>
                </header>

                <div class="gallery-grid" id="galleryGrid">

                    @if($images)
                        @foreach($images as $index => $image)
                            <div class="gallery-item" data-image-id="{{$index}}">

                                <img
                                    src="{{$image->temporaryUrl()}}"
                                    alt="نمای "
                                    class="gallery-item__img"
                                    loading="lazy"
                                />
                                <button
                                    wire:click="removeImage({{ $index }})"
                                    type="button"
                                    class="gallery-item__remove"
                                    data-action="remove-image"
                                    data-image-id="1"
                                    aria-label="حذف تصویر"
                                >
                                    <svg><use href="#i-x"/></svg>
                                </button>
                            </div>
                        @endforeach

                    @endif
                    <!-- عکس ۱ (اصلی) -->


                </div>
            </section>

            <!-- ═══════════ لیست تصاویر ═══════════ -->
            <section class="glass-card gallery-list-card">
                <header class="glass-card__head">
                    <h2 class="glass-card__title">لیست تصاویر</h2>
                    <span class="glass-card__count">
            <svg
                style="width:12px;height:12px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;"><use
                    href="#i-file-image"/></svg>
            <span id="listCount">{{$this->gallerire->count()}}</span> ردیف
          </span>
                </header>

                <div class="gallery-list-wrap">
                    <table class="gallery-list">
                        <thead>
                        <tr>
                            <th>تصویر</th>
                            <th>تاریخ آپلود</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody id="galleryListBody">

                        @foreach($this->gallerire as $gallery)
                            <tr data-image-id="1">
                                <td>
                                    <div class="list-thumb">
                                        <img
                                            src="{{asset('Images/Products/' . $gallery->image)}}"
                                            alt="نمای ۱"
                                            class="list-thumb__img"
                                            loading="lazy"
                                        />
                                    </div>
                                </td>
                                <td>
                  <span class="list-date">
                    <svg><use href="#i-calendar"/></svg>
                    {{\Hekmatinasser\Verta\Verta::instance($gallery->created_at)->formatJalaliDate()}}
                  </span>
                                </td>
                                <td>
                                    <button
                                        wire:click="$dispatch('delete' , {gallery_id:{{$gallery->id}} })"
                                        type="button"
                                        class="list-action-btn"
                                        data-action="remove-image"
                                        data-image-id="1"
                                        aria-label="حذف تصویر"
                                    >
                                        <svg>
                                            <use href="#i-trash"/>
                                        </svg>
                                        <span>حذف</span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach

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
    Livewire.on('gallery.created', () => {
        Noty.toast({
            type: 'success',
            message: 'گالری محصول با موفقیت ساخته شد',
            duration: 4000,
        });
    });
    Livewire.on('delete', (event) => {
        Noty.delete({
            title: 'حذف سایز',
            text: 'آیا از حذف این عکس مطمئنید؟ این عمل قابل بازگشت نیست و تمام اطلاعات عکس برای همیشه حذف خواهد شد.',
            confirmText: 'بله، حذف کن',
        }).then(ok => {
            if (ok) {
                Livewire.dispatch('photo.delete', {id: event.gallery_id});
                Noty.toast({
                    type: 'error',
                    message: 'عکس حذف شد.',
                    duration: 8000
                });
            }
        });
    })
</script>
@endscript
