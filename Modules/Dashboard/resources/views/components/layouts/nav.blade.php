<nav class="admin-nav" aria-label="ناوبری پنل مدیریت">
    <div class="admin-nav__inner">
        <a href="{{route('admin.dashboard')}}" class="admin-nav__item {{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">
            <svg><use href="#i-home"/></svg>
            پیشخوان
        </a>
        <a href="{{route('admin.product_management')}}" class="admin-nav__item {{request()->routeIs('admin.product_management') ? 'is-active' : ''}}">
            <svg><use href="#i-package"/></svg>
            محصولات
        </a>
        <a href="{{route('admin.management_categories')}}" class="admin-nav__item {{ request()->routeIs('admin.management_categories') ? 'is-active' : '' }}">
            <svg><use href="#i-layers"/></svg>
            دسته‌بندی‌ها
        </a>
        <a href="#" class="admin-nav__item">
            <svg><use href="#i-shopping-bag"/></svg>
            سفارشات
        </a>
        <a href="{{route('admin.user_management')}}" class="admin-nav__item {{ request()->routeIs('admin.user_management') ? 'is-active' : '' }}">
            <svg><use href="#i-users"/></svg>
            مشتریان
        </a>
        <a href="#" class="admin-nav__item">
            <svg><use href="#i-settings"/></svg>
            تنظیمات
        </a>
    </div>
</nav>
