<header class="tx-header" id="txHeader">
  <div class="tx-container tx-header__inner">
    <a class="tx-brand" href="{{ url('/') }}" aria-label="TX-SaaS">
      <img class="tx-brand__logo" src="{{ asset('assets/images/brand/TX SAAS PROFILE1.jpg.png') }}" alt="TX-SaaS" />
    </a>

    <nav class="tx-nav" aria-label="التنقل الرئيسي">
      <a class="tx-nav__link" href="{{ url('/') }}" data-nav-page="home">الرئيسية</a>
      <a class="tx-nav__link" href="{{ url('/#services') }}" data-nav-section="services">الخدمات</a>
      <a class="tx-nav__link" href="{{ url('/#why') }}" data-nav-section="why">عن TX-SaaS</a>
      <a class="tx-nav__link" href="{{ url('/#process') }}" data-nav-section="process">طريقة العمل</a>
      <a class="tx-nav__link" href="{{ url('/#work') }}" data-nav-section="work">المنتجات</a>
      <a class="tx-nav__link" href="{{ url('/#faq') }}" data-nav-section="faq">الأسئلة</a>
      <a class="tx-nav__link" href="{{ url('/contact') }}" data-nav-page="contact">تواصل</a>
    </nav>

    <div class="tx-header__actions">
      <a class="tx-btn tx-btn--primary tx-header__cta tx-contact-cta" href="{{ url('/contact') }}">
        <span class="tx-call-icon" aria-hidden="true"></span>
        <span>تواصل معنا</span>
      </a>

      <button class="tx-burger" id="txBurger" type="button" aria-label="فتح القائمة" aria-controls="txDrawer" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</header>

<div class="tx-drawer" id="txDrawer" aria-hidden="true">
  <div class="tx-drawer__backdrop" data-close-drawer></div>
  <div class="tx-drawer__panel" role="dialog" aria-modal="true" aria-label="قائمة التنقل">
    <div class="tx-drawer__top">
      <img class="tx-drawer__logo" src="{{ asset('assets/images/brand/TX SAAS PROFILE1.jpg.png') }}" alt="TX-SaaS" />
      <button class="tx-drawer__close" type="button" aria-label="إغلاق" data-close-drawer>
        <span class="tx-drawer__closeIcon" aria-hidden="true"></span>
      </button>
    </div>

    <div class="tx-drawer__links">
      <a href="{{ url('/') }}" data-close-drawer>الرئيسية</a>
      <a href="{{ url('/#services') }}" data-close-drawer>الخدمات</a>
      <a href="{{ url('/#why') }}" data-close-drawer>عن TX-SaaS</a>
      <a href="{{ url('/#process') }}" data-close-drawer>طريقة العمل</a>
      <a href="{{ url('/#work') }}" data-close-drawer>المنتجات</a>
      <a href="{{ url('/#faq') }}" data-close-drawer>الأسئلة</a>
      <a href="{{ url('/contact') }}" data-close-drawer>تواصل</a>
    </div>

    <div class="tx-drawer__cta">
      <a class="tx-btn tx-btn--primary tx-btn--block tx-contact-cta" href="{{ url('/contact') }}" data-close-drawer>
        <span class="tx-call-icon" aria-hidden="true"></span><span>تواصل معنا</span>
      </a>
    </div>
  </div>
</div>

<a
  class="tx-floating-contact{{ request()->is('/') ? ' is-home-hero-hidden' : '' }}"
  href="{{ url('/contact') }}"
  aria-label="تواصل معنا"
  title="تواصل معنا"
>
  <span class="tx-floating-contact__icon" aria-hidden="true"></span>
</a>
