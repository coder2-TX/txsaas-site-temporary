{{-- resources/views/landing/partials/services.blade.php --}}

@php
    $legacyDefaults = [
        1 => ['title' => 'تطوير منصات SaaS', 'text' => 'اشتراكات، خطط، فواتير، مستخدمين، صلاحيات — جاهزة للتوسع.'],
        2 => ['title' => 'Laravel / Backend &amp; APIs', 'text' => 'بنية نظيفة، أداء، كاش، Queues، تكاملات — API قوي وواضح.'],
        3 => ['title' => 'تطبيقات Flutter', 'text' => 'تطبيقات سريعة ومناسبة للأعمال مع ربط كامل بـ API ولوحة التحكم.'],
        4 => ['title' => 'لوحات تحكم وإدارة', 'text' => 'Admin Dashboard + تقارير + تحكم بالصلاحيات + تدقيق.'],
        5 => ['title' => 'DevOps / Cloud', 'text' => 'نشر، مراقبة، نسخ احتياطي، تحسين أداء، إعدادات Production.'],
        6 => ['title' => 'Security &amp; Hardening', 'text' => 'حماية، سياسات دخول، Rate Limit، مراجعة أمان قبل الإطلاق.'],
    ];

    $defaults = [
        1 => [
            'title' => 'تحليل الأنظمة',
            'text'  => 'ندرس النظام والعمليات وسير العمل، ونحوّل الفكرة إلى تصور واضح يساعد على اكتشاف نقاط الضعف واتخاذ قرارات تطوير أدق.',
            'icon'  => 'assets/images/icons/Analysis.svg',
        ],
        2 => [
            'title' => 'أنظمة الويب',
            'text'  => 'نبني أو نحسّن أنظمة ويب عملية وقابلة للتطوير، مع التركيز على الأداء وسهولة الاستخدام وتنظيم البنية التقنية.',
            'icon'  => 'assets/images/icons/system.svg',
        ],
        3 => [
            'title' => 'تطبيقات الموبايل',
            'text'  => 'نطوّر تطبيقات سهلة الاستخدام وموثوقة تساعدك على الوصول إلى عملائك وتقديم خدماتك بشكل أسرع.',
            'icon'  => 'assets/images/icons/application.svg',
        ],
        4 => [
            'title' => 'المواقع الإلكترونية',
            'text'  => 'نصمم مواقع احترافية مدعومة بلوحات تحكم تعكس هوية نشاطك وتعرض خدماتك بصورة واضحة ومؤثرة.',
            'icon'  => 'assets/images/icons/website.svg',
        ],
        5 => [
            'title' => 'الاستضافة والسيرفرات',
            'text'  => 'نجهّز بيئة تشغيل مستقرة وآمنة، من إعداد الاستضافة والسيرفر إلى الربط والحماية والمتابعة بعد الإطلاق.',
            'icon'  => 'assets/images/icons/server.svg',
        ],
        6 => [
            'title' => 'حلول رقمية مخصصة',
            'text'  => 'نطوّر حلولًا مصممة حسب احتياج عملك، مع مرونة تسمح للنظام بالتوسع والتطور مع نمو أعمالك.',
            'icon'  => 'assets/images/icons/Solutions.svg',
        ],
    ];

    $dbRows = collect();

    try {
        $dbRows = \App\Models\HomeService::query()
            ->orderBy('position')
            ->get()
            ->keyBy('position');
    } catch (\Throwable $e) {
        $dbRows = collect();
    }

    $resolveCatalogValue = static function ($value, $legacy, $catalog) {
        if (!filled($value)) {
            return $catalog;
        }

        return trim((string) $value) === trim((string) $legacy)
            ? $catalog
            : $value;
    };

    $services = collect($defaults)->map(function (array $def, int $pos) use ($dbRows, $legacyDefaults, $resolveCatalogValue) {
        $row = $dbRows->get($pos);
        $useCustom = $row && (bool) $row->is_active;
        $legacy = $legacyDefaults[$pos] ?? ['title' => '', 'text' => ''];

        return [
            'title' => $useCustom
                ? $resolveCatalogValue($row->title, $legacy['title'], $def['title'])
                : $def['title'],
            'text' => $useCustom
                ? $resolveCatalogValue($row->text, $legacy['text'], $def['text'])
                : $def['text'],
            'icon' => $def['icon'],
        ];
    });
@endphp

<section class="tx-section tx-services" id="services">
  <div class="tx-container">
    <div class="tx-sectionHead tx-services__head">
      <h2 class="tx-h2 tx-services__title">خدماتنا</h2>

      <span class="tx-services__pattern" aria-hidden="true">
        <img
          src="{{ asset('assets/images/brand/pattern-line.svg') }}"
          alt=""
          width="200"
          height="32"
          loading="lazy"
          decoding="async"
        />
      </span>

      <p class="tx-sub tx-services__sub">
        حلول تقنية متكاملة تبدأ من تحليل الأنظمة وتمتد إلى تطوير الويب والموبايل والمواقع وتجهيز بيئة التشغيل.
      </p>
    </div>

    <div class="tx-services__grid">
      @foreach ($services as $service)
        <article class="tx-service">
          <div class="tx-service__icon-shell" aria-hidden="true">
            <img
              class="tx-service__icon"
              src="{{ asset($service['icon']) }}"
              alt=""
              width="30"
              height="30"
              loading="lazy"
              decoding="async"
            />
          </div>

          <div class="tx-service__content">
            <h3 class="tx-service__title">{!! $service['title'] !!}</h3>
            <p class="tx-service__text">{{ $service['text'] }}</p>
          </div>
        </article>
      @endforeach
    </div>
  </div>
</section>
