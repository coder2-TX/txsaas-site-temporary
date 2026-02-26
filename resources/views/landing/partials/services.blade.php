{{-- resources/views/landing/partials/services.blade.php --}}

@php
    use Illuminate\Support\Facades\Storage;

    // ✅ البيانات الافتراضية (هي نفسها القديمة)
    $defaults = [
        1 => [
            'title' => 'تطوير منصات SaaS',
            'text'  => 'اشتراكات، خطط، فواتير، مستخدمين، صلاحيات — جاهزة للتوسع.',
            'icon_svg' => <<<'SVG'
<svg viewBox="0 0 24 24" fill="none">
  <path d="M17.5 19H6a4 4 0 0 1 0-8 5.5 5.5 0 0 1 10.5-2.1A3.5 3.5 0 1 1 17.5 19Z"
    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
SVG,
        ],
        2 => [
            'title' => 'Laravel / Backend &amp; APIs',
            'text'  => 'بنية نظيفة، أداء، كاش، Queues، تكاملات — API قوي وواضح.',
            'icon_svg' => <<<'SVG'
<svg viewBox="0 0 24 24" fill="none">
  <path d="M8 9L4 12l4 3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M16 9l4 3-4 3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M14 4l-4 16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
SVG,
        ],
        3 => [
            'title' => 'تطبيقات Flutter',
            'text'  => 'تطبيقات سريعة ومناسبة للأعمال مع ربط كامل بـ API ولوحة التحكم.',
            'icon_svg' => <<<'SVG'
<svg viewBox="0 0 24 24" fill="none">
  <rect x="7" y="2" width="10" height="20" rx="2" stroke="currentColor" stroke-width="2"/>
  <path d="M11 18h2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
</svg>
SVG,
        ],
        4 => [
            'title' => 'لوحات تحكم وإدارة',
            'text'  => 'Admin Dashboard + تقارير + تحكم بالصلاحيات + تدقيق.',
            'icon_svg' => <<<'SVG'
<svg viewBox="0 0 24 24" fill="none">
  <rect x="3" y="3" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2"/>
  <path d="M3 9h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
  <path d="M9 21V9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
</svg>
SVG,
        ],
        5 => [
            'title' => 'DevOps / Cloud',
            'text'  => 'نشر، مراقبة، نسخ احتياطي، تحسين أداء، إعدادات Production.',
            'icon_svg' => <<<'SVG'
<svg viewBox="0 0 24 24" fill="none">
  <rect x="3" y="4" width="18" height="7" rx="2" stroke="currentColor" stroke-width="2"/>
  <rect x="3" y="13" width="18" height="7" rx="2" stroke="currentColor" stroke-width="2"/>
  <path d="M7 8h.01" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
  <path d="M7 17h.01" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
</svg>
SVG,
        ],
        6 => [
            'title' => 'Security &amp; Hardening',
            'text'  => 'حماية، سياسات دخول، Rate Limit، مراجعة أمان قبل الإطلاق.',
            'icon_svg' => <<<'SVG'
<svg viewBox="0 0 24 24" fill="none">
  <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"
    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M9 12l2 2 4-4"
    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
SVG,
        ],
    ];

    // ✅ DB rows
    $dbRows = collect();
    try {
        $dbRows = \App\Models\HomeService::query()
            ->orderBy('position')
            ->get()
            ->keyBy('position');
    } catch (\Throwable $e) {
        $dbRows = collect();
    }

    // ✅ دمج: لو is_active=false => رجّع default (ولا تخفي الكرت)
    $services = collect($defaults)->map(function (array $def, int $pos) use ($dbRows) {
        $row = $dbRows->get($pos);

        // مفعّل = استخدم قيم DB (كتخصيص)
        $useCustom = $row && (bool) $row->is_active;

        $title = ($useCustom && filled($row->title)) ? $row->title : $def['title'];
        $text  = ($useCustom && filled($row->text))  ? $row->text  : $def['text'];

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
      <h2 class="tx-h2">الخدمات</h2>
      <p class="tx-sub">باقة خدمات متكاملة لبناء منتجك أو نظام شركتك من البداية للنهاية.</p>
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