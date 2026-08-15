{{-- resources/views/landing/partials/services.blade.php --}}

@php
    use Illuminate\Support\Facades\Storage;

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
            'icon_svg' => <<<'SVG'
<svg viewBox="0 0 24 24" fill="none">
  <path d="M4 19h16M7 16V8m5 8V5m5 11v-5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
  <path d="M5 6l4-3 4 2 6-3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
SVG,
        ],
        2 => [
            'title' => 'أنظمة الويب',
            'text'  => 'نبني أو نحسّن أنظمة ويب عملية وقابلة للتطوير، مع التركيز على الأداء وسهولة الاستخدام وتنظيم البنية التقنية.',
            'icon_svg' => <<<'SVG'
<svg viewBox="0 0 24 24" fill="none">
  <rect x="3" y="4" width="18" height="16" rx="2" stroke="currentColor" stroke-width="2"/>
  <path d="M3 9h18M8 6.5h.01M11 6.5h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
</svg>
SVG,
        ],
        3 => [
            'title' => 'تطبيقات الموبايل',
            'text'  => 'نطوّر تطبيقات سهلة الاستخدام وموثوقة تساعدك على الوصول إلى عملائك وتقديم خدماتك بشكل أسرع.',
            'icon_svg' => <<<'SVG'
<svg viewBox="0 0 24 24" fill="none">
  <rect x="7" y="2" width="10" height="20" rx="2" stroke="currentColor" stroke-width="2"/>
  <path d="M11 18h2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
</svg>
SVG,
        ],
        4 => [
            'title' => 'المواقع الإلكترونية',
            'text'  => 'نصمم مواقع احترافية مدعومة بلوحات تحكم تعكس هوية نشاطك وتعرض خدماتك بصورة واضحة ومؤثرة.',
            'icon_svg' => <<<'SVG'
<svg viewBox="0 0 24 24" fill="none">
  <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
  <path d="M3.5 9h17M3.5 15h17M12 3c2.3 2.4 3.5 5.4 3.5 9S14.3 18.6 12 21M12 3C9.7 5.4 8.5 8.4 8.5 12S9.7 18.6 12 21" stroke="currentColor" stroke-width="1.8"/>
</svg>
SVG,
        ],
        5 => [
            'title' => 'الاستضافة والسيرفرات',
            'text'  => 'نجهّز بيئة تشغيل مستقرة وآمنة، من إعداد الاستضافة والسيرفر إلى الربط والحماية والمتابعة بعد الإطلاق.',
            'icon_svg' => <<<'SVG'
<svg viewBox="0 0 24 24" fill="none">
  <rect x="3" y="4" width="18" height="6" rx="2" stroke="currentColor" stroke-width="2"/>
  <rect x="3" y="14" width="18" height="6" rx="2" stroke="currentColor" stroke-width="2"/>
  <path d="M7 7h.01M7 17h.01" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
</svg>
SVG,
        ],
        6 => [
            'title' => 'حلول رقمية مخصصة',
            'text'  => 'نطوّر حلولًا مصممة حسب احتياج عملك، مع مرونة تسمح للنظام بالتوسع والتطور مع نمو أعمالك.',
            'icon_svg' => <<<'SVG'
<svg viewBox="0 0 24 24" fill="none">
  <path d="M12 3a4 4 0 0 0-4 4v1H7a4 4 0 1 0 0 8h1v1a4 4 0 0 0 8 0v-1h1a4 4 0 1 0 0-8h-1V7a4 4 0 0 0-4-4Z" stroke="currentColor" stroke-width="2"/>
  <path d="M9 12h6M12 9v6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
</svg>
SVG,
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

        $title = $useCustom
            ? $resolveCatalogValue($row->title, $legacy['title'], $def['title'])
            : $def['title'];

        $text = $useCustom
            ? $resolveCatalogValue($row->text, $legacy['text'], $def['text'])
            : $def['text'];

        $iconUrl = null;

        if ($useCustom && filled($row->icon_path)) {
            $p = str_replace('\\', '/', trim((string) $row->icon_path));

            if (preg_match('~^https?://~i', $p)) {
                $iconUrl = $p;
            } elseif (str_starts_with($p, 'assets/')) {
                $iconUrl = asset($p);
            } else {
                $iconUrl = Storage::disk('public')->url($p);
            }
        }

        return [
            'title'    => $title,
            'text'     => $text,
            'icon_url' => $iconUrl,
            'icon_svg' => $def['icon_svg'],
        ];
    });
@endphp

<section class="tx-section" id="services">
  <div class="tx-container">
    <div class="tx-sectionHead">
      <h2 class="tx-h2">خدماتنا</h2>
      <p class="tx-sub">حلول تقنية متكاملة تبدأ من تحليل الأنظمة وتمتد إلى تطوير الويب والموبايل والمواقع وتجهيز بيئة التشغيل.</p>
    </div>

    <div class="tx-cards">
      @foreach ($services as $s)
        <article class="tx-card">
          <div class="tx-card__icon" aria-hidden="true">
            @if (!empty($s['icon_url']))
              <img
                src="{{ $s['icon_url'] }}"
                alt=""
                width="24"
                height="24"
                loading="lazy"
                decoding="async"
              />
            @else
              {!! $s['icon_svg'] !!}
            @endif
          </div>

          <h3 class="tx-card__title">{!! $s['title'] !!}</h3>
          <p class="tx-card__text">{{ $s['text'] }}</p>
        </article>
      @endforeach
    </div>
  </div>
</section>
