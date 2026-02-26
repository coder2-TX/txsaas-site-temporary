<header class="tx-header" id="txHeader">
  <div class="tx-container tx-header__inner">
    <a class="tx-brand" href="#top" aria-label="العودة للأعلى">
      <img class="tx-brand__logo" src="{{ asset('assets/images/brand/tx-saas.png') }}" alt="TX-SaaS" />
    </a>

    <nav class="tx-nav" aria-label="التنقل الرئيسي">
      <a class="tx-nav__link" href="#services">الخدمات</a>
      <a class="tx-nav__link" href="#why">لماذا TX-SaaS</a>
      <a class="tx-nav__link" href="#process">المنهجية</a>
      <a class="tx-nav__link" href="#work">الأعمال</a>
      <a class="tx-nav__link" href="#faq">الأسئلة</a>
      <a class="tx-nav__link" href="#contact">تواصل</a>
    </nav>

    <div class="tx-header__actions">
      <a class="tx-btn tx-btn--primary" href="#contact">اطلب عرض سعر</a>

      <button
        class="tx-burger"
        id="txBurger"
        type="button"
        aria-label="فتح القائمة"
        aria-controls="txDrawer"
        aria-expanded="false"
      >
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</header>

<!-- ✅ الدروار خارج الهيدر (عشان ما يطلع خلف المحتوى) -->
<div class="tx-drawer" id="txDrawer" aria-hidden="true">
  <div class="tx-drawer__backdrop" data-close-drawer></div>

  <div class="tx-drawer__panel" role="dialog" aria-modal="true" aria-label="قائمة التنقل">
    <div class="tx-drawer__top">
      <button class="tx-drawer__close" type="button" aria-label="إغلاق" data-close-drawer>×</button>
    </div>

    <div class="tx-drawer__links">
      <a href="#top" data-close-drawer>الرئيسية</a>
      <a href="#services" data-close-drawer>الخدمات</a>
      <a href="#why" data-close-drawer>لماذا TX-SaaS</a>
      <a href="#process" data-close-drawer>المنهجية</a>
      <a href="#work" data-close-drawer>الأعمال</a>
      <a href="#faq" data-close-drawer>الأسئلة</a>
      <a href="#contact" data-close-drawer>تواصل</a>
    </div>

    <div class="tx-drawer__cta">
      <a class="tx-btn tx-btn--primary tx-btn--block" href="#contact" data-close-drawer>اطلب عرض سعر</a>
      <a class="tx-btn tx-btn--ghost tx-btn--block" href="#work" data-close-drawer>شاهد الأعمال</a>
    </div>
  </div>
</div>