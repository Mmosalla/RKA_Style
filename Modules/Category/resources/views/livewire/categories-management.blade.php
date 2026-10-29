<div>

    <main class="admin-main">
        <div class="container">

            <div class="page-header">
                <div>
                    <h1 class="page-header__title">مدیریت <span>دسته‌بندی‌ها</span></h1>
                    <p class="page-header__desc">افزودن، ویرایش و سازماندهی دسته‌بندی‌های فروشگاه</p>
                </div>
            </div>

            <!-- ============================================
                 کارت فرم افزودن دسته‌بندی
                 ============================================ -->
            <section class="glass-card add-category-card">
                <header class="glass-card__head">
                    @if($editIndex)
                        <h2 class="glass-card__title">ویراش دسته‌بندی </h2>
                    @else
                        <h2 class="glass-card__title">افزودن دسته‌بندی جدید</h2>
                    @endif
                    <span class="glass-card__count">
            <svg
                style="width:12px;height:12px;fill:none;stroke:currentColor;stroke-width:2.4;stroke-linecap:round;stroke-linejoin:round;"><use
                    href="#i-plus"/></svg>
            دسته‌بندی
          </span>
                </header>

                <form class="add-category-form" id="addCategoryForm" novalidate>

                    <!-- آپلود عکس + پیش‌نمایش -->
                    <div class="image-upload @error('image') has-error @enderror" id="imageUpload">
                        <div class="image-upload__zone {{ $image ? 'has-image' : '' }}" id="imageUploadZone">
                            <input
                                wire:model="image"
                                type="file"
                                class="image-upload__input"
                                id="categoryImage"
                                name="categoryImage"
                                aria-label="آپلود عکس دسته‌بندی"
                            />

                            <!-- پلیس‌هولدر — حالت خالی -->
                            <div class="image-upload__placeholder">
                                <div class="image-upload__icon">
                                    <svg>
                                        <use href="#i-upload"/>
                                    </svg>
                                </div>
                                <div class="image-upload__text">
                                    <strong>انتخاب یا کشیدن عکس</strong>
                                    <small>PNG، JPG یا WebP<br>حداکثر ۲ مگابایت</small>
                                </div>
                            </div>

                            <!-- پیش‌نمایش — با src پر کن، ما نمایش رو مدیریت می‌کنیم -->
                            {{-- پیش‌نمایش --}}
                            @if ($image)
                                <img
                                    src="{{ $image->temporaryUrl() }}"
                                    alt="پیش‌نمایش"
                                    class="image-upload__preview"
                                />
                            @else
                                <img src="" class="image-upload__preview" id="imagePreview" alt=""/>
                            @endif

                            <!-- overlay "تغییر عکس" -->
                            <div class="image-upload__overlay">
                                <svg>
                                    <use href="#i-image"/>
                                </svg>
                                <span>تغییر عکس</span>
                            </div>


                            @error('image')
                            <span class="form-error" role="alert">
                                     <svg><use href="#i-alert"/></svg>
                                      <span>{{ $message }}</span>
                            </span>
                            @enderror
                        </div>


                    </div>

                    <!-- فیلدها -->
                    <div class="form-fields">

                        <div class="form-fields__grid">
                            <!-- نام دسته‌بندی -->
                            <div class="form-field @error('title') has-error @enderror" id="categoryNameField">
                                <label class="form-label" for="categoryName">نام دسته‌بندی</label>
                                <input
                                    wire:model="title"
                                    type="text"
                                    class="form-input"
                                    id="categoryName"
                                    name="categoryName"
                                    placeholder="مثال: پیراهن مردانه"
                                    autocomplete="off"
                                />
                                @error('title')
                                <span class="form-error" id="categoryNameError" role="alert">
                  <svg><use href="#i-alert"/></svg>
                  <span>{{$message}}</span>
                </span>
                                @enderror
                            </div>

                            <!-- والد دسته‌بندی -->
                            <div class="form-field" id="parentCategoryField">
                                <label class="form-label form-label--optional" for="parentCategory">دسته‌بندی
                                    والد</label>
                                <div class="form-select-wrap">
                                    <select wire:model="parent_id" class="form-select" id="parentCategory"
                                            name="parentCategory">
                                        <option value="0">بدون والد (دسته اصلی)</option>
                                        @foreach($categories as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{--                                <span class="form-error" id="parentCategoryError" role="alert">--}}
                                {{--                  <svg><use href="#i-alert"/></svg>--}}
                                {{--                  <span>لطفاً دسته‌بندی والد را انتخاب کنید</span>--}}
                                {{--                </span>--}}
                            </div>
                        </div>

                        <!-- دکمه ذخیره -->
                        @if($editIndex)
                            <button wire:click.prevent="updateRow" class="form-submit">
                                <svg>
                                    <use href="#i-pen"/>
                                </svg>
                                <span>ویراش دسته‌بندی</span>
                            </button>
                        @else
                            <button wire:click.prevent="createRow" class="form-submit">
                                <svg>
                                    <use href="#i-check"/>
                                </svg>
                                <span>ذخیره دسته‌بندی</span>
                            </button>
                        @endif

                    </div>
                </form>
            </section>

            <!-- ============================================
                 کارت جدول دسته‌بندی‌ها
                 ============================================ -->
            <section class="glass-card categories-card">

                <header class="glass-card__head">
                    <h2 class="glass-card__title">لیست دسته‌بندی‌ها</h2>
                    <span class="glass-card__count">
            <svg
                style="width:12px;height:12px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;"><use
                    href="#i-layers"/></svg>
            {{$this->categories->count()}}
          </span>
                </header>

                <div class="search-card">
                    <svg class="search-card__icon">
                        <use href="#i-search"/>
                    </svg>
                    <input
                        wire:model="search"
                        @keyup.enter="$wire.searchData"
                        type="text"
                        class="search-card__input"
                        placeholder="جستجو در نام یا اسلاگ دسته‌بندی..."
                        aria-label="جستجو در دسته‌بندی‌ها"
                    />
                    <span class="search-card__hint">نمایش<strong>{{$this->categories->count()}}</strong></span>
                </div>

                <div class="categories-table-wrap">
                    <table class="categories-table">
                        <thead>
                        <tr>
                            <th>دسته‌بندی</th>
                            <th>والد</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>

                        <!-- ردیف ۱ — پیراهن -->
                        @forelse($this->categories as $category)
                            <tr>
                                <td>
                                    <div class="cat-cell">
                                        <div class="cat-cell__avatar cat-cell__avatar--gold">
                                            <svg>
                                                <use href="#i-shirt"/>
                                            </svg>
                                        </div>
                                        <div class="cat-cell__info">
                                            <div class="cat-cell__name">{{$category->title}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="والد">
                                    <span class="parent-cell"><svg><use href="#i-corner-down"/></svg>{{$category->parentCategory->title}}</span>
                                </td>
                                <td data-label="وضعیت">
                                    @if($category->status === \Modules\Category\Enums\CategoryStatusEnum::Draft->value)
                                        <span style="cursor: pointer" wire:click.prevent="changeStatus('{{$category->status}}' , {{$category->id}})" class="status-badge status-badge--info">پیش فرض</span>
                                    @elseif($category->status === \Modules\Category\Enums\CategoryStatusEnum::ACTIVE->value)
                                        <span style="cursor: pointer" wire:click.prevent="changeStatus('{{$category->status}}' , {{$category->id}})" class="status-badge status-badge--active">فعال</span>
                                    @elseif($category->status === \Modules\Category\Enums\CategoryStatusEnum::INACTIVE->value)
                                        <span style="cursor: pointer" wire:click.prevent="changeStatus('{{$category->status}}' , {{$category->id}})" class="status-badge status-badge--inactive">غیره فعال</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-group">
                                        <button class="action-btn action-btn--attr" aria-label="ویژگی‌های دسته">
                                            <svg>
                                                <use href="#i-sliders"/>
                                            </svg>
                                            <span class="action-btn__text">ویژگی‌ها</span>
                                        </button>
                                        <button wire:click.prevent="editRow({{$category->id}})"
                                                class="action-btn action-btn--edit" aria-label="ویرایش">
                                            <svg>
                                                <use href="#i-pencil"/>
                                            </svg>
                                            <span class="action-btn__text">ویرایش</span>
                                        </button>
                                        <button
                                            wire:click.prevent="$dispatch('delete' , {category_id:{{$category->id}} })"
                                            class="action-btn action-btn--delete" aria-label="حذف">
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

            </section>

            <!-- صفحه‌بندی -->
            {{$this->categories->links('vendor.livewire.admin_pagination')}}


        </div>
    </main>
    @include('auth::components.layouts.loader')
</div>
@assets
<link rel="stylesheet" href="{{asset('Panel/Notifications/style.css')}}">
<script src="{{asset('Panel/Notifications/script.js')}}"></script>
@endassets
@script
<script>
    Livewire.on('category.created', () => {
        Noty.toast({
            type: 'success',
            message: 'دسته بندی با موفقیت ساخته شد',
            duration: 4000,
        });
    });
    Livewire.on('category.updated', () => {
        Noty.toast({
            type: 'success',
            message: 'دسته بندی با موفقیت ویرایش شد',
            duration: 4000,
        });
    });
    Livewire.on('category.changeStatus', () => {
        Noty.toast({
            type: 'success',
            message: 'وضعیت دسته بندی با موفقیت ویراش شد',
            duration: 4000,
        });
    });
    Livewire.on('delete', (event) => {
        Noty.delete({
            title: 'حذف دسته بندی',
            text: 'آیا از حذف این دسته بندی مطمئنید؟ این عمل قابل بازگشت نیست و تمام اطلاعات دیسته بندی از جمله زیر گروه آن حذف خواهد شد.',
            confirmText: 'بله، حذف کن',
        }).then(ok => {
            if (ok) {
                Livewire.dispatch('category.delete', {category_id: event.category_id});
                Noty.toast({
                    type: 'error',
                    message: 'محصول حذف شد.',
                    duration: 8000
                });
            }
        });
    })

</script>
@endscript
