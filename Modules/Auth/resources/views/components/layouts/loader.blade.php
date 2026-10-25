<div class="loader" wire:loading.class="is-active" id="appLoader" role="status" aria-live="polite" aria-label="در حال بارگذاری">

    <!-- پس‌زمینه‌ی بلور -->
    <div class="loader__backdrop"></div>

    <!-- محتوای لودر -->
    <div class="loader__content">

        <!-- استیج اصلی -->
        <div class="loader__stage">

            <!-- موج پالس -->
            <div class="loader__pulse"></div>
            <div class="loader__pulse"></div>

            <!-- درخشش پس‌زمینه -->
            <div class="loader__glow"></div>

            <!-- حلقه‌ها -->
            <div class="loader__ring loader__ring--outer"></div>
            <div class="loader__ring loader__ring--inner"></div>

            <!-- سوزن چرخان -->
            <div class="loader__needle-wrap">
                <div class="loader__needle"></div>
            </div>

            <!-- چوب‌لباسی با پیراهن -->
            <div class="loader__hanger">
                <svg viewBox="0 0 120 160" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- قلاب -->
                    <path d="M 60 8 Q 60 3 64 3 Q 69 3 69 8 Q 69 13 64 15 L 60 18"
                          stroke="currentColor" stroke-width="2.6"
                          stroke-linecap="round" stroke-linejoin="round"/>
                    <!-- مثلث چوب‌لباسی -->
                    <path d="M 40 26 L 60 18 L 80 26"
                          stroke="currentColor" stroke-width="2.6"
                          stroke-linecap="round" stroke-linejoin="round"/>
                    <!-- بدنه‌ی پیراهن -->
                    <path d="M 60 34
                     L 40 26
                     L 15 52
                     L 26 68
                     L 34 60
                     L 34 148
                     L 86 148
                     L 86 60
                     L 94 68
                     L 105 52
                     L 80 26
                     L 60 34
                     Z"
                          stroke="currentColor" stroke-width="2.6"
                          stroke-linejoin="round"/>
                    <!-- یقه -->
                    <path d="M 40 26 L 60 42 L 80 26"
                          stroke="currentColor" stroke-width="2.2"
                          stroke-linejoin="round"/>
                    <!-- دکمه‌ها -->
                    <circle cx="60" cy="65" r="2.2" fill="currentColor"/>
                    <circle cx="60" cy="88" r="2.2" fill="currentColor"/>
                    <circle cx="60" cy="111" r="2.2" fill="currentColor"/>
                    <circle cx="60" cy="134" r="2.2" fill="currentColor"/>
                </svg>
            </div>

            <!-- جرقه‌های شناور -->
            <span class="loader__sparkle loader__sparkle--1"></span>
            <span class="loader__sparkle loader__sparkle--2"></span>
            <span class="loader__sparkle loader__sparkle--3"></span>

        </div>

        <!-- متن -->
        <div class="loader__text">
            <span>در حال آماده‌سازی</span>
            <span class="loader__dots">
          <span>.</span><span>.</span><span>.</span>
        </span>
        </div>

        <!-- نوار پیشرفت -->
        <div class="loader__progress">
            <div class="loader__progress-bar"></div>
        </div>

    </div>
</div>
