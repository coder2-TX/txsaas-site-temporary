<section class="tx-hero tx-hero--reference" id="home">
  @php
    $catalogHeroText = 'نبني لك مواقع إلكترونية، أنظمة SaaS، تطبيقات ولوحات تحكم عملية تساعدك على تنظيم العمل، تحسين التجربة، والانطلاق بنمو أوضح.';
    $legacyHeroText = 'من الفكرة إلى الإطلاق: تصميم واجهات، Backend، APIs، لوحة تحكم، واستضافة — مع بنية قابلة للتوسع وأمان أعلى.';

    $resolvedHeroText = filled($heroText ?? null) && trim((string) $heroText) !== $legacyHeroText
      ? $heroText
      : $catalogHeroText;
  @endphp

  <div class="tx-container">
    <div class="tx-heroRef">
      <div class="tx-heroRef__bg tx-heroRef__bg--left" aria-hidden="true"></div>
      <div class="tx-heroRef__bg tx-heroRef__bg--right" aria-hidden="true"></div>

      <div class="tx-heroRef__content">
        <div class="tx-heroRef__chip tx-heroRef__chip--top">TX-SaaS موثوق للشركات</div>

        <h1 class="tx-heroRef__title">
          <span class="tx-heroRef__line tx-heroRef__line--first">حلول رقمية متكاملة</span>
          <span class="tx-heroRef__line tx-heroRef__line--second">تنظّم أعمالك وتدعم نموك <span class="tx-heroRef__confidence"><span class="tx-heroRef__confidenceWord">بثقة</span><span class="tx-heroRef__patternSlot" aria-hidden="true"><img class="tx-heroRef__patternSvg" src="{{ asset('assets/images/brand/pattern-line.svg') }}" alt=""></span></span></span>
        </h1>

        <p class="tx-heroRef__lead">{{ $resolvedHeroText }}</p>

        <div class="tx-heroRef__actions">
          <a class="tx-btn tx-btn--primary tx-heroRef__btnPrimary" href="{{ url('/contact') }}">
            <span class="tx-call-icon" aria-hidden="true"></span>
            <span>تواصل معنا</span>
          </a>

          <a class="tx-btn tx-btn--ghost tx-heroRef__btnGhost" href="#services">
            استعرض الخدمات
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
