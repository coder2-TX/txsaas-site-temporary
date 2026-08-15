<section class="tx-section tx-section--soft" id="work">
  @php
    use Illuminate\Support\Facades\Storage;

    $legacyDefaults = [
      [
        'tag' => 'SaaS',
        'title' => 'منصة إدارة اشتراكات وفواتير',
        'description' => 'خطط، اشتراكات، فواتير، تقارير، وإدارة مستخدمين وصلاحيات.',
        'meta' => ['لوحة تحكم','API','RBAC'],
      ],
      [
        'tag' => 'Business',
        'title' => 'نظام حضور وانصراف للشركات',
        'description' => 'جداول، سياسات، تقارير، صلاحيات، مع واجهة عربية كاملة.',
        'meta' => ['تقارير','صلاحيات','سير عمل'],
      ],
      [
        'tag' => 'Mobile',
        'title' => 'تطبيق خدمات العملاء',
        'description' => 'تطبيق Flutter مرتبط بـ API ولوحة تحكم لإدارة المحتوى والطلبات.',
        'meta' => ['Flutter','Notifications','Admin'],
      ],
    ];

    $defaults = [
      [
        'tag' => 'السفر والسياحة',
        'title' => 'طيران',
        'description' => 'منصة متكاملة لإدارة خدمات السفر والسياحة، تجمع التأشيرات والنقل وتأمين السفر وإدارة طلبات العملاء في تجربة تشغيل موحدة.',
        'meta' => ['التأشيرات','النقل','تأمين السفر'],
        'icon_svg' => <<<'SVG'
<svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
  <path d="m3 11 18-7-7 18-3-7-8-4Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
  <path d="m11 15 3-3" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
</svg>
SVG,
      ],
      [
        'tag' => 'المواعيد والحجوزات',
        'title' => 'طابور',
        'description' => 'نظام ذكي لإدارة المواعيد والحجوزات يساعد المنشآت على تقليل الانتظار وتنظيم رحلة الحجز وخيارات الدفع والمتابعة.',
        'meta' => ['المواعيد','الحجوزات','الدفع'],
        'icon_svg' => <<<'SVG'
<svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
  <rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor" stroke-width="2"/>
  <path d="M7 3v4M17 3v4M3 10h18M8 14h3M13 14h3M8 17h3" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
</svg>
SVG,
      ],
      [
        'tag' => 'إدارة السفريات',
        'title' => 'سفر إكس',
        'description' => 'نظام لشركات السفريات لتنظيم المبيعات والحجوزات والطلبات والحسابات والتحصيل، مع صلاحيات وتقارير من لوحة تحكم موحدة.',
        'meta' => ['المبيعات','الحجوزات','التقارير'],
        'icon_svg' => <<<'SVG'
<svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
  <path d="M4 19V5h16v14H4Z" stroke="currentColor" stroke-width="2"/>
  <path d="M7 15l3-3 3 2 4-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
SVG,
      ],
      [
        'tag' => 'الموارد البشرية',
        'title' => 'أذكى HR',
        'description' => 'نظام متكامل للموارد البشرية ينظّم بيانات الموظفين والحضور والانصراف والإجازات والأذونات وجداول العمل والصلاحيات.',
        'meta' => ['الموظفون','الحضور','الإجازات'],
        'icon_svg' => <<<'SVG'
<svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
  <circle cx="9" cy="8" r="3" stroke="currentColor" stroke-width="2"/>
  <circle cx="17" cy="9" r="2" stroke="currentColor" stroke-width="2"/>
  <path d="M3 20c0-4 2.5-7 6-7s6 3 6 7M14 14c3.5 0 6 2.4 6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
</svg>
SVG,
      ],
      [
        'tag' => 'الذكاء الاصطناعي',
        'title' => 'TX AI Bot',
        'description' => 'مساعد ذكاء اصطناعي قابل للتخصيص يرتبط بالأنظمة ويفهم قواعد المعرفة والملفات والنصوص لتقديم دعم فوري ومعلومات دقيقة.',
        'meta' => ['قاعدة معرفة','PDF','دعم فوري'],
        'icon_svg' => <<<'SVG'
<svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
  <path d="M8 4h8a4 4 0 0 1 4 4v5a4 4 0 0 1-4 4h-3l-4 3v-3H8a4 4 0 0 1-4-4V8a4 4 0 0 1 4-4Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
  <path d="M9 10h.01M15 10h.01M9 13c1.5 1 4.5 1 6 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
</svg>
SVG,
      ],
      [
        'tag' => 'الحضور الرقمي',
        'title' => 'المواقع الإلكترونية',
        'description' => 'نصمم ونطوّر مواقع إلكترونية احترافية ولوحات تحكم تعكس هوية نشاطك، وتساعدك على عرض خدماتك باحترافية وجذب عملائك بسهولة.',
        'meta' => ['واجهات احترافية','لوحة تحكم','متجاوب'],
        'icon_svg' => <<<'SVG'
<svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
  <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
  <path d="M3.5 9h17M3.5 15h17M12 3c2.3 2.4 3.5 5.4 3.5 9S14.3 18.6 12 21M12 3C9.7 5.4 8.5 8.4 8.5 12S9.7 18.6 12 21" stroke="currentColor" stroke-width="1.8"/>
</svg>
SVG,
      ],
    ];

    $rows = collect();

    try {
      if (class_exists(\App\Models\HomeWorkItem::class)) {
        $rows = \App\Models\HomeWorkItem::query()
          ->where('is_active', true)
          ->orderBy('sort_order')
          ->get()
          ->values();
      }
    } catch (\Throwable $e) {
      $rows = collect();
    }

    $resolveCatalogValue = static function ($value, $legacy, $catalog) {
      if (!filled($value)) {
        return $catalog;
      }

      return trim((string) $value) === trim((string) $legacy)
        ? $catalog
        : $value;
    };

    $cards = collect($defaults)->map(function ($def, $i) use ($rows, $legacyDefaults, $resolveCatalogValue) {
      $row = $rows->get($i);
      $legacy = $legacyDefaults[$i] ?? null;

      $tag = $def['tag'];
      $title = $def['title'];
      $desc = $def['description'];
      $meta = $def['meta'];
      $iconUrl = null;

      if ($row) {
        $tag = $legacy
          ? $resolveCatalogValue($row->tag, $legacy['tag'], $def['tag'])
          : (filled($row->tag) ? $row->tag : $def['tag']);

        $title = $legacy
          ? $resolveCatalogValue($row->title, $legacy['title'], $def['title'])
          : (filled($row->title) ? $row->title : $def['title']);

        $desc = $legacy
          ? $resolveCatalogValue($row->description, $legacy['description'], $def['description'])
          : (filled($row->description) ? $row->description : $def['description']);

        $meta = [];

        foreach ([1, 2, 3] as $metaIndex) {
          $field = "meta{$metaIndex}";
          $catalogMeta = $def['meta'][$metaIndex - 1] ?? null;
          $legacyMeta = $legacy['meta'][$metaIndex - 1] ?? '';

          $resolved = $legacy
            ? $resolveCatalogValue($row->{$field}, $legacyMeta, $catalogMeta)
            : (filled($row->{$field}) ? $row->{$field} : $catalogMeta);

          if (filled($resolved)) {
            $meta[] = $resolved;
          }
        }

        if (filled($row->icon_path)) {
          $p = str_replace('\\', '/', trim((string) $row->icon_path));

          if (preg_match('~^https?://~i', $p)) {
            $iconUrl = $p;
          } elseif (str_starts_with($p, 'assets/')) {
            $iconUrl = asset($p);
          } else {
            $iconUrl = Storage::disk('public')->url($p);
          }
        }
      }

      return [
        'tag' => $tag,
        'title' => $title,
        'description' => $desc,
        'meta' => array_values(array_filter($meta)),
        'icon_url' => $iconUrl,
        'icon_svg' => $def['icon_svg'],
      ];
    });
  @endphp

  <div class="tx-container">
    <div class="tx-sectionHead">
      <h2 class="tx-h2">منتجاتنا</h2>
      <p class="tx-sub">منتجات رقمية متخصصة تساعد الشركات على تنظيم التشغيل وإدارة الخدمات ورفع كفاءة العمل، مع قابلية التخصيص حسب الاحتياج.</p>
    </div>

    <div class="tx-workGrid">
      @foreach ($cards as $card)
        <article class="tx-workCard">
          <div class="tx-workCap" aria-hidden="true">
            <svg class="tx-workCap__cloud" viewBox="0 0 92 62">
              <path
                d="M67 48H26C15 48 6 39.5 6 29.5C6 20.7 12.5 13.4 21.1 12.1C24.2 5.3 31 1 38.9 1C49 1 57.9 8.1 60.1 17.8C61.8 17 63.7 16.6 65.8 16.6C73.6 16.6 80 22.9 80 30.7C80 40.2 74.2 48 67 48Z"
                fill="rgba(255,255,255,.96)"
                stroke="rgba(18,120,243,.25)"
                stroke-width="1.2"
                stroke-linejoin="round"
              />
            </svg>

            <span class="tx-workCap__icon">
              @if (!empty($card['icon_url']))
                <img class="tx-workIconImg" src="{{ $card['icon_url'] }}" alt="" loading="lazy" decoding="async">
              @else
                {!! $card['icon_svg'] !!}
              @endif
            </span>
          </div>

          <h3 class="tx-workCard__t">{{ $card['title'] }}</h3>
          <p class="tx-workCard__d">{{ $card['description'] }}</p>

          <div class="tx-workCard__meta">
            @foreach ($card['meta'] as $m)
              <span>{{ $m }}</span>
            @endforeach
          </div>
        </article>
      @endforeach
    </div>
  </div>
</section>
