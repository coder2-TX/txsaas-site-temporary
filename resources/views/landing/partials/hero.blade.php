<section class="tx-hero" id="home">
  <div class="tx-hero__bg" aria-hidden="true">
    <div class="tx-blob tx-blob--1"></div>
    <div class="tx-blob tx-blob--2"></div>
    <div class="tx-grid"></div>
  </div>

  <div class="tx-container tx-hero__inner">
    <div class="tx-hero__content">
      <h1 class="tx-hero__title">
        <span class="tx-hero__title-line">نبني منتجات <span class="tx-highlight">SaaS</span> وأنظمة أعمال</span>
        <span class="tx-hero__title-line">بسرعة وجودة عالية.</span>
      </h1>

      <p class="tx-hero__text">
        {{ $heroText ?? 'من الفكرة إلى الإطلاق: تصميم واجهات، Backend، APIs، لوحة تحكم، واستضافة — مع بنية قابلة للتوسع وأمان أعلى.' }}
      </p>

      <div class="tx-hero__cta">
        <a class="tx-btn tx-btn--primary tx-hero__contact-btn" href="{{ url('/contact') }}">
          <span class="tx-call-icon" aria-hidden="true"></span><span>تواصل معنا</span>
        </a>
        <a class="tx-btn tx-btn--ghost" href="#services">استعرض الخدمات</a>
      </div>
    </div>

    <div class="tx-hero__cloud" aria-hidden="true">
      <div class="tx-cloudMark">
        <div class="tx-cloudMark__ring"></div>
        <svg class="tx-cloudMark__svg" viewBox="0 0 24 24" aria-hidden="true">
          <path fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" d="M17.5 19H6a4 4 0 0 1 0-8 5.5 5.5 0 0 1 10.5-2.1A3.5 3.5 0 1 1 17.5 19Z" />
        </svg>
        <div class="tx-cloudMark__tx">TX</div>
      </div>
    </div>
  </div>
</section>
