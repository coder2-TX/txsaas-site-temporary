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
      'checklist' => [
        'تصميم UI/UX مناسب للأعمال (RTL جاهز)',
        'Backend + API + Admin Dashboard',
        'نظام مستخدمين وصلاحيات وتدقيق',
        'جاهزية للنشر: إعدادات وأداء وأمان',
        'دعم بعد الإطلاق حسب الاتفاق',
      ],
    ];

    $defaults = [
      'subtitle' => 'نبني حلولًا عملية تجمع بين الكفاءة والمرونة وسهولة الاستخدام، وتساعد الشركات على إدارة عملياتها بثقة وتنظيم أعمالها بصورة أكثر احترافية.',

      'bullets' => [
        ['t' => 'حلول مصممة حسب احتياجك', 'd' => 'نبدأ من طبيعة عملك والتحديات الفعلية لنقدم حلًا يخدم احتياجك الحقيقي.'],
        ['t' => 'منتجات جاهزة قابلة للتخصيص', 'd' => 'نوفّر منتجات رقمية جاهزة يمكن تكييفها لتناسب آلية العمل ومتطلبات كل منشأة.'],
        ['t' => 'أنظمة مرنة تنمو مع أعمالك', 'd' => 'نبني بنية قابلة للتطوير والتوسع بدل حلول تتوقف عند الاحتياج الحالي.'],
        ['t' => 'تشغيل مستقر وتجربة أكثر كفاءة', 'd' => 'نركز على وضوح العمليات وسهولة الاستخدام واستقرار التشغيل لتحسين تجربة الفرق والعملاء.'],
      ],

      'checklist' => [
        'تنظيم العمليات اليومية بصورة أوضح',
        'رفع كفاءة التشغيل وتقليل التعقيد',
        'تجربة استخدام سهلة للفرق والعملاء',
        'بنية تقنية تدعم الاستدامة والتوسع',
        'متابعة وتشغيل أكثر استقرارًا',
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

    $checklist = [];

    for ($i = 1; $i <= 5; $i++) {
      $idx = $i - 1;
      $field = "c{$i}";

      $checklist[] = $useCustom
        ? $resolveCatalogValue($row->{$field}, $legacyDefaults['checklist'][$idx], $defaults['checklist'][$idx])
        : $defaults['checklist'][$idx];
    }
  @endphp

  <div class="tx-container">
    <div class="tx-sectionHead">
      <h2 class="tx-h2">شريكك نحو التحول الرقمي</h2>
      <p class="tx-sub">{{ $subtitle }}</p>
    </div>

    <div class="tx-whyGrid">
      <div class="tx-whyPoints">
        @foreach ($bullets as $i => $b)
          <article class="tx-whyPoint">
            <span class="tx-whyPoint__index">{{ str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) }}</span>
            <div class="tx-whyPoint__content">
              <h3 class="tx-whyPoint__title">{{ $b['t'] }}</h3>
              <p class="tx-whyPoint__text">{{ $b['d'] }}</p>
            </div>
          </article>
        @endforeach
      </div>

      <aside class="tx-whyOutcome">
        <span class="tx-whyOutcome__eyebrow">قيمة عملية</span>
        <h3 class="tx-whyOutcome__title">ما الذي نقدمه لأعمالك؟</h3>

        <ul class="tx-whyOutcome__list">
          @foreach ($checklist as $item)
            <li><span class="tx-whyOutcome__check" aria-hidden="true">✓</span><span>{{ $item }}</span></li>
          @endforeach
        </ul>

        <a class="tx-btn tx-whyOutcome__cta" href="{{ url('/contact') }}">ناقش احتياجك معنا</a>
      </aside>
    </div>
  </div>
</section>
