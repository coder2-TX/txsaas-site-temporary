<section class="tx-section tx-section--soft tx-productsSection" id="work">
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


  @php
    $websiteShowcase = [
      [
        'title' => 'Fly Yemen',
        'domain' => 'fly-yemen.com',
        'image' => asset('assets/images/website/fly-yemen.png'),
        'url' => 'https://fly-yemen.com/',
      ],
      [
        'title' => 'Athka Holidays',
        'domain' => 'athkaholidays.com',
        'image' => asset('assets/images/website/athkaholidays.png'),
        'url' => 'https://athkaholidays.com/',
      ],
      [
        'title' => 'ATA Yemen',
        'domain' => 'ata-yemen.com',
        'image' => asset('assets/images/website/ata-yemen.png'),
        'url' => 'https://ata-yemen.com/',
      ],
    ];

    /*
     * مؤقتًا نكرر المواقع داخل المجموعة نفسها حتى يبقى الشريط ممتلئًا
     * إلى أن تتم إضافة بقية أعمال الشركة.
     */
    $websiteShowcaseLoop = array_merge(
      $websiteShowcase,
      $websiteShowcase,
      $websiteShowcase,
      $websiteShowcase
    );
  @endphp
  <div class="tx-container">
    <header class="tx-productsHead">
      <h2 class="tx-h2">منتجاتنا</h2>

      <span class="tx-productsHead__pattern" aria-hidden="true">
        <img
          src="{{ asset('assets/images/brand/pattern-line.svg') }}"
          alt=""
          width="200"
          height="32"
          loading="lazy"
          decoding="async"
        >
      </span>

      <p class="tx-productsHead__sub">منتجات رقمية متخصصة تساعد الشركات على تنظيم التشغيل وإدارة الخدمات ورفع كفاءة العمل، مع قابلية التخصيص حسب الاحتياج.</p>
    </header>

    <div class="tx-productsGrid">
      @foreach ($cards as $i => $card)
        <article class="tx-productTile">
          <div class="tx-productTile__top">
            <span class="tx-productTile__mark" aria-hidden="true">
              @if (!empty($card['icon_url']))
                <img class="tx-productMarkImage" src="{{ $card['icon_url'] }}" alt="" loading="lazy" decoding="async">
              @else
                {!! $card['icon_svg'] !!}
              @endif
            </span>

            <span class="tx-productTile__index" aria-hidden="true">
              {{ str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) }}
            </span>
          </div>

          <div class="tx-productTile__body">
            <p class="tx-productTile__eyebrow">{{ $card['tag'] }}</p>
            <h3 class="tx-productTile__title">{{ $card['title'] }}</h3>
            <p class="tx-productTile__text">{{ $card['description'] }}</p>
          </div>

          @if (!empty($card['meta']))
            <div class="tx-productTile__meta">
              @foreach ($card['meta'] as $m)
                <span>{{ $m }}</span>
              @endforeach
            </div>
          @endif
        </article>
      @endforeach
    </div>
    <div class="tx-sitesShowcase">
      <div class="tx-sitesMarquee" aria-label="نماذج من المواقع التي نفذتها الشركة">
        <div class="tx-sitesMarquee__track">
          @foreach ([0, 1] as $copy)
            <div class="tx-sitesMarquee__group" @if ($copy === 1) aria-hidden="true" @endif>
              @foreach ($websiteShowcaseLoop as $site)
                <a
                  class="tx-sitePreview"
                  href="{{ $site['url'] }}"
                  target="_blank"
                  rel="noopener noreferrer"
                  aria-label="فتح موقع {{ $site['title'] }}"
                >
                  <img
                    src="{{ $site['image'] }}"
                    alt="معاينة موقع {{ $site['title'] }}"
                    loading="lazy"
                    decoding="async"
                  >
                </a>
              @endforeach
            </div>
          @endforeach
        </div>
      </div>
    </div>
</div>
</section>
