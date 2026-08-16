<section class="tx-section tx-section--soft tx-whySection" id="why">
  @php
    $legacyDefaults = [
      'subtitle' => 'نركز على بناء منتج “جاهز للبيع” — وليس مجرد كود.',
      'bullets' => [
        ['t' => 'Architecture قابل للتوسع', 'd' => 'تصميم طبقات واضح + قابلية إضافة ميزات بدون تعقيد.'],
        ['t' => 'أداء عالي', 'd' => 'Caching، Queues، تحسين استعلامات قاعدة البيانات.'],
        ['t' => 'أمان وموثوقية', 'd' => 'صلاحيات RBAC، تدقيق Logs، حماية نقاط الـ API.'],
        ['t' => 'تسليم مرتب', 'd' => 'توثيق + بيئة نشر + مخرجات واضحة قابلة للإدارة.'],
      ],
    ];

    $defaults = [
      'subtitle' => 'نقدّم لك حلولًا رقمية عملية تجمع بين الكفاءة والمرونة وسهولة الاستخدام، وتساعد أعمالك على النمو والتشغيل بثقة.',

      'bullets' => [
        ['t' => 'حلول رقمية مصممة حسب احتياجك', 'd' => 'نبدأ من طبيعة عملك والتحديات الفعلية لنقدم حلًا يخدم احتياجك الحقيقي.'],
        ['t' => 'منتجات جاهزة قابلة للتخصيص', 'd' => 'نوفّر منتجات رقمية جاهزة يمكن تكييفها لتناسب آلية العمل ومتطلبات كل منشأة.'],
        ['t' => 'أنظمة مرنة تنمو مع أعمالك', 'd' => 'نبني بنية قابلة للتطوير والتوسع بدل حلول تتوقف عند الاحتياج الحالي.'],
        ['t' => 'تشغيل مستقر وتجربة أكثر كفاءة', 'd' => 'نركز على وضوح العمليات وسهولة الاستخدام واستقرار التشغيل لتحسين تجربة الفرق والعملاء.'],
      ],
    ];

    $row = null;

    try {
        $row = \App\Models\HomeWhySection::query()->latest('id')->first();
    } catch (\Throwable $e) {
        $row = null;
    }

    $useCustom = $row && (bool) $row->is_active;

    $resolveCatalogValue = static function ($value, $legacy, $catalog) {
        if (!filled($value)) {
            return $catalog;
        }

        return trim((string) $value) === trim((string) $legacy)
            ? $catalog
            : $value;
    };

    $subtitle = $useCustom
      ? $resolveCatalogValue($row->subtitle, $legacyDefaults['subtitle'], $defaults['subtitle'])
      : $defaults['subtitle'];

    $bullets = [];

    for ($i = 1; $i <= 4; $i++) {
      $idx = $i - 1;
      $titleField = "b{$i}_title";
      $descField = "b{$i}_desc";

      $bullets[] = [
        't' => $useCustom
          ? $resolveCatalogValue($row->{$titleField}, $legacyDefaults['bullets'][$idx]['t'], $defaults['bullets'][$idx]['t'])
          : $defaults['bullets'][$idx]['t'],
        'd' => $useCustom
          ? $resolveCatalogValue($row->{$descField}, $legacyDefaults['bullets'][$idx]['d'], $defaults['bullets'][$idx]['d'])
          : $defaults['bullets'][$idx]['d'],
      ];
    }
  @endphp

  <div class="tx-container">
    <div class="tx-whyLayout">
      <div class="tx-whyIntro">
        <h2 class="tx-h2 tx-whyIntro__title">
          <span>شريكك نحو التحول</span>
          <span class="tx-whyIntro__digitalWord">الرقمي</span>
        </h2>

        <span class="tx-whyIntro__pattern" aria-hidden="true">
          <img
            src="{{ asset('assets/images/brand/pattern-line.svg') }}"
            alt=""
            width="200"
            height="32"
            loading="lazy"
            decoding="async"
          >
        </span>

        <p class="tx-whyIntro__lead">{{ $subtitle }}</p>
      </div>

      <div class="tx-whyPoints" aria-label="ما الذي نقدمه لأعمالك؟">
        @foreach ($bullets as $i => $b)
          <article class="tx-whyPoint">
            <span class="tx-whyPoint__index" aria-hidden="true">{{ $i + 1 }}</span>

            <div class="tx-whyPoint__content">
              <h3 class="tx-whyPoint__title">{{ $b['t'] }}</h3>
              <p class="tx-whyPoint__text">{{ $b['d'] }}</p>
            </div>
          </article>
        @endforeach
      </div>
    </div>
  </div>
</section>
