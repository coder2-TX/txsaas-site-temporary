<section class="tx-section" id="process">
  @php
    $legacyDefaults = [
      'subtitle' => 'خطوات واضحة من التحليل حتى الإطلاق — بدون ضياع وقت.',
      'steps' => [
        ['t' => 'Discovery', 'd' => 'نفهم الفكرة والهدف ونحدد نطاق MVP بدقة.'],
        ['t' => 'UI/UX Prototype', 'd' => 'تصميم أولي للشاشات ومسارات المستخدم.'],
        ['t' => 'Build Sprint', 'd' => 'تطوير على دفعات مع تسليمات واضحة.'],
        ['t' => 'QA + Security', 'd' => 'اختبارات وتجهيز أمان قبل الإطلاق.'],
        ['t' => 'Launch + Support', 'd' => 'نشر ومراقبة + دعم وتحسينات لاحقة.'],
      ],
    ];

    $defaults = [
      'subtitle' => 'نحوّل الفكرة إلى تصور واضح وقابل للتنفيذ، ثم نبني ونختبر ونطلق الحل بخطوات منظمة.',
      'steps' => [
        ['t' => 'فهم الفكرة والاحتياج', 'd' => 'نحدد المشكلة التي سيحلها النظام، أهدافه، والنتيجة التي يجب أن يقدمها.'],
        ['t' => 'تحليل المستخدمين والعمليات', 'd' => 'نحلل الأدوار وحالات الاستخدام وتدفق العمليات داخل النظام.'],
        ['t' => 'إعداد التصور والواجهات', 'd' => 'نحوّل المتطلبات إلى هيكل واضح وواجهات وتجربة استخدام قابلة للتنفيذ.'],
        ['t' => 'التطوير والاختبار', 'd' => 'نبني الحل ونختبر الأداء والتجاوب وسير العمليات قبل التسليم.'],
        ['t' => 'الإطلاق والمتابعة', 'd' => 'نجهّز التشغيل والنشر، ثم نتابع الأداء ونعالج ما يلزم بعد الإطلاق.'],
      ],
    ];

    $row = null;

    try {
        $row = \App\Models\HomeProcessSection::query()->latest('id')->first();
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

    $steps = [];

    for ($i = 1; $i <= 5; $i++) {
      $idx = $i - 1;
      $titleField = "s{$i}_title";
      $descField = "s{$i}_desc";

      $steps[] = [
        't' => $useCustom
          ? $resolveCatalogValue($row->{$titleField}, $legacyDefaults['steps'][$idx]['t'], $defaults['steps'][$idx]['t'])
          : $defaults['steps'][$idx]['t'],
        'd' => $useCustom
          ? $resolveCatalogValue($row->{$descField}, $legacyDefaults['steps'][$idx]['d'], $defaults['steps'][$idx]['d'])
          : $defaults['steps'][$idx]['d'],
      ];
    }
  @endphp

  <div class="tx-container">
    <div class="tx-sectionHead">
      <h2 class="tx-h2">من الفكرة إلى الإطلاق</h2>
      <p class="tx-sub">{{ $subtitle }}</p>
    </div>

    <ol class="tx-steps">
      @foreach ($steps as $i => $s)
        <li class="tx-step">
          <span class="tx-step__n">{{ $i + 1 }}</span>

          <div class="tx-step__c">
            <div class="tx-step__t">{{ $s['t'] }}</div>
            <div class="tx-step__d">{{ $s['d'] }}</div>
          </div>
        </li>
      @endforeach
    </ol>
  </div>
</section>
