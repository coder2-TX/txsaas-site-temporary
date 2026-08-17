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
      [
        'title' => 'Kiwi Travels',
        'domain' => 'kiwitravels-ye.com',
        'image' => asset('assets/images/website/Kiwi.png'),
        'url' => 'https://kiwitravels-ye.com/',
      ],
      [
        'title' => 'Destination Media',
        'domain' => 'destination-media.pro',
        'image' => asset('assets/images/website/destination.png'),
        'url' => 'https://destination-media.pro/',
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

      <p class="tx-productsHead__sub">
        حلول رقمية ذكية تساعد الشركات على تنظيم أعمالها وتحسين التشغيل،
        وتشمل أنظمة متخصصة للسفر والمواعيد والمبيعات والموارد البشرية والمساعدات الذكية.
      </p>
    </header>

    @php
      /*
       * Product cards follow the approved TX-SaaS catalog order/content.
       * Existing HomeWorkItem activation still controls whether a product exists.
       * The website-design item is a Service, not one of the five catalog products.
       */
      $txCatalogProducts = collect($cards)
        ->map(function ($card) {
          $rawTitle = trim((string) ($card['title'] ?? ''));

          $normalized = function_exists('mb_strtolower')
            ? mb_strtolower($rawTitle, 'UTF-8')
            : strtolower($rawTitle);

          if (str_contains($normalized, 'طيران') || str_contains($normalized, 'tayra')) {
            return [
              'order' => 1,
              'title' => 'نظام طيران',
              'description' => 'نظام متكامل لإدارة خدمات السفر والسياحة، يساعد على تنظيم التأشيرات، النقل، والتأمين من خلال منصة واحدة سهلة الاستخدام.',
            ];
          }

          if (str_contains($normalized, 'طابور') || str_contains($normalized, 'tabour')) {
            return [
              'order' => 2,
              'title' => 'نظام طابور',
              'description' => 'نظام ذكي لإدارة المواعيد والحجوزات، يمكّن المنشآت من تنظيم الحجوزات ومتابعة الحالات وخيارات الدفع بكفاءة أعلى.',
            ];
          }

          if (str_contains($normalized, 'سفر') || str_contains($normalized, 'safar')) {
            return [
              'order' => 3,
              'title' => 'نظام سفر إكس',
              'description' => 'نظام مخصص لشركات السفريات لإدارة المبيعات والحجوزات والطلبات بكفاءة، وتنظيم العمل اليومي من منصة موحدة.',
            ];
          }

          if (
            str_contains($normalized, 'hr') ||
            str_contains($normalized, 'أذكى') ||
            str_contains($normalized, 'الموارد')
          ) {
            return [
              'order' => 4,
              'title' => 'نظام أذكى HR',
              'description' => 'نظام متكامل لإدارة الموارد البشرية ينظّم بيانات الموظفين والحضور والإجازات والصلاحيات من منصة واحدة ذكية.',
            ];
          }

          if (
            str_contains($normalized, 'ai') ||
            str_contains($normalized, 'bot')
          ) {
            return [
              'order' => 5,
              'title' => 'TX AI Bot',
              'description' => 'مساعد ذكي يتكامل مع أي نظام ويفهم بياناته عبر قاعدة معرفة مخصصة، لتقديم خدمة أسرع وأكثر احترافية.',
            ];
          }

          return null;
        })
        ->filter()
        ->unique('order')
        ->sortBy('order')
        ->values();
    @endphp

    <div class="tx-productsCards">
      @foreach ($txCatalogProducts as $card)
        <article class="tx-productCard">
          <h3 class="tx-productCard__title">{{ $card['title'] }}</h3>
          <p class="tx-productCard__text">{{ $card['description'] }}</p>
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
