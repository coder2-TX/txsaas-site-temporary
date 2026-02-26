<section class="tx-hero">
  <div class="tx-hero__bg" aria-hidden="true">
    <div class="tx-blob tx-blob--1"></div>
    <div class="tx-blob tx-blob--2"></div>
    <div class="tx-grid"></div>
  </div>

  <div class="tx-container tx-hero__inner">
    <div class="tx-hero__content">
      <span class="tx-badge">استوديو برمجي • SaaS • أنظمة أعمال</span>

      <h1 class="tx-hero__title">
        نبني منتجات <span class="tx-highlight">SaaS</span> وأنظمة أعمال
        <br />
        بسرعة وجودة عالية.
      </h1>

      {{-- ✅ النص الوحيد القابل للتعديل من Filament --}}
      <p class="tx-hero__text">
        {{ $heroText ?? 'من الفكرة إلى الإطلاق: تصميم واجهات، Backend، APIs، لوحة تحكم، واستضافة — مع بنية قابلة للتوسع وأمان أعلى.' }}
      </p>

      <div class="tx-hero__cta">
        <a class="tx-btn tx-btn--primary" href="#contact">اطلب عرض سعر</a>
        <a class="tx-btn tx-btn--ghost" href="#services">استعرض الخدمات</a>
      </div>

      <!-- <div class="tx-metrics" aria-label="مؤشرات سريعة">
        <div class="tx-metric">
          <div class="tx-metric__num">سريع</div>
          <div class="tx-metric__label">تسليم MVP</div>
        </div>
        <div class="tx-metric">
          <div class="tx-metric__num">آمن</div>
          <div class="tx-metric__label">أفضل ممارسات</div>
        </div>
        <div class="tx-metric">
          <div class="tx-metric__num">قابل للتوسع</div>
          <div class="tx-metric__label">Architecture</div>
        </div>
      </div> -->
    </div>

    <!--
    <div class="tx-hero__card">
      <div class="tx-heroCard">
        <div class="tx-heroCard__top">
          <div class="tx-heroCard__dot"></div>
          <div class="tx-heroCard__dot"></div>
          <div class="tx-heroCard__dot"></div>
          <div class="tx-heroCard__title">لوحة تحكم SaaS</div>
        </div>

        <div class="tx-heroCard__grid">
          <div class="tx-mini">
            <div class="tx-mini__k">اشتراكات</div>
            <div class="tx-mini__v">Monthly / Yearly</div>
          </div>
          <div class="tx-mini">
            <div class="tx-mini__k">صلاحيات</div>
            <div class="tx-mini__v">RBAC + Audit</div>
          </div>
          <div class="tx-mini">
            <div class="tx-mini__k">واجهات</div>
            <div class="tx-mini__v">RTL/LTR</div>
          </div>
          <div class="tx-mini">
            <div class="tx-mini__k">API</div>
            <div class="tx-mini__v">REST / JSON</div>
          </div>
        </div>

        <div class="tx-heroCard__hint">
          جاهزين نبني نفس هذا الشكل لمشروعك — بشكل احترافي ومهيأ للبيع والتوسع.
        </div>
      </div>
    </div>
    -->

    <!-- ✅ Cloud Icon (fills the empty left area) -->
    <div class="tx-hero__cloud" aria-hidden="true">
      <div class="tx-cloudMark">
        <div class="tx-cloudMark__ring"></div>

        <svg class="tx-cloudMark__svg" viewBox="0 0 24 24" aria-hidden="true">
          <path
            fill="none"
            stroke="currentColor"
            stroke-width="1.9"
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M17.5 19H6a4 4 0 0 1 0-8 5.5 5.5 0 0 1 10.5-2.1A3.5 3.5 0 1 1 17.5 19Z"
          />
        </svg>

        <div class="tx-cloudMark__tx">TX</div>
      </div>
    </div>
  </div>
</section>