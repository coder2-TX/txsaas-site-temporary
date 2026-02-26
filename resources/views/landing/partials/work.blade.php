<section class="tx-section tx-section--soft" id="work">
  @php
    use Illuminate\Support\Facades\Storage;

    // ✅ Defaults (Fallback) = نفس بياناتك الحالية (لو DB فاضي)
    $defaults = [
      [
        'tag' => 'SaaS',
        'title' => 'منصة إدارة اشتراكات وفواتير',
        'description' => 'خطط، اشتراكات، فواتير، تقارير، وإدارة مستخدمين وصلاحيات.',
        'meta' => ['لوحة تحكم','API','RBAC'],
        'icon_svg' => <<<'SVG'
<svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
  <path d="M17.5 19H6a4 4 0 0 1 0-8 5.5 5.5 0 0 1 10.5-2.1A3.5 3.5 0 1 1 17.5 19Z"
    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
SVG,
      ],
      [
        'tag' => 'Business',
        'title' => 'نظام حضور وانصراف للشركات',
        'description' => 'جداول، سياسات، تقارير، صلاحيات، مع واجهة عربية كاملة.',
        'meta' => ['تقارير','صلاحيات','سير عمل'],
        'icon_svg' => <<<'SVG'
<svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
  <path d="M9 6V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v1"
    stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
  <path d="M4 7h16v11a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7Z"
    stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
  <path d="M4 12h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
</svg>
SVG,
      ],
      [
        'tag' => 'Mobile',
        'title' => 'تطبيق خدمات العملاء',
        'description' => 'تطبيق Flutter مرتبط بـ API ولوحة تحكم لإدارة المحتوى والطلبات.',
        'meta' => ['Flutter','Notifications','Admin'],
        'icon_svg' => <<<'SVG'
<svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
  <rect x="7" y="2" width="10" height="20" rx="2" stroke="currentColor" stroke-width="2"/>
  <path d="M11 18h2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
</svg>
SVG,
      ],
    ];

    // ✅ جلب من DB (قابل لزيادة عدد الأعمال)
    $rows = collect();
    try {
      if (class_exists(\App\Models\HomeWorkItem::class)) {
        $rows = \App\Models\HomeWorkItem::query()
          ->where('is_active', true)
          ->orderBy('sort_order')
          ->get();
      }
    } catch (\Throwable $e) {
      $rows = collect();
    }

    // ✅ لو DB فيه بيانات: نعرضها
    // لو DB فاضي: نعرض Defaults
    $cards = $rows->count()
      ? $rows->values()->map(function ($row, $i) use ($defaults) {
          $def = $defaults[$i] ?? null; // للـ 3 الأوائل فقط fallback

          $tag   = filled($row->tag) ? $row->tag : ($def['tag'] ?? '');
          $title = filled($row->title) ? $row->title : ($def['title'] ?? '');
          $desc  = filled($row->description) ? $row->description : ($def['description'] ?? '');

          $meta = array_values(array_filter([
            filled($row->meta1) ? $row->meta1 : ($def['meta'][0] ?? null),
            filled($row->meta2) ? $row->meta2 : ($def['meta'][1] ?? null),
            filled($row->meta3) ? $row->meta3 : ($def['meta'][2] ?? null),
          ]));

          $iconUrl = null;
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

          return [
            'tag' => $tag,
            'title' => $title,
            'description' => $desc,
            'meta' => $meta,
            'icon_url' => $iconUrl,
            'icon_svg' => $def['icon_svg'] ?? null, // fallback لو ما رفع صورة
          ];
      })
      : collect($defaults)->map(function ($def) {
          return [
            'tag' => $def['tag'],
            'title' => $def['title'],
            'description' => $def['description'],
            'meta' => $def['meta'],
            'icon_url' => null,
            'icon_svg' => $def['icon_svg'],
          ];
      });
  @endphp

  <div class="tx-container">
    <div class="tx-sectionHead">
      <h2 class="tx-h2">أعمال عامة (نماذج)</h2>
      <p class="tx-sub">أمثلة على أنواع المشاريع التي ننفذها (نماذج عامة قابلة للتخصيص).</p>
    </div>

    <div class="tx-workGrid">
      @foreach ($cards as $card)
        <article class="tx-workCard">
          <div class="tx-workCap" aria-hidden="true">
            <!-- ✅ Cloud shape ثابت لا يتغير -->
            <svg class="tx-workCap__cloud" viewBox="0 0 92 62">
              <path
                d="M67 48H26C15 48 6 39.5 6 29.5C6 20.7 12.5 13.4 21.1 12.1C24.2 5.3 31 1 38.9 1C49 1 57.9 8.1 60.1 17.8C61.8 17 63.7 16.6 65.8 16.6C73.6 16.6 80 22.9 80 30.7C80 40.2 74.2 48 67 48Z"
                fill="rgba(255,255,255,.96)"
                stroke="rgba(18,120,243,.25)"
                stroke-width="1.2"
                stroke-linejoin="round"
              />
            </svg>

            <!-- ✅ Icon circle (يتغير محتواه فقط) -->
            <span class="tx-workCap__icon">
              @if (!empty($card['icon_url']))
                <img class="tx-workIconImg" src="{{ $card['icon_url'] }}" alt="" loading="lazy" decoding="async">
              @else
                {!! $card['icon_svg'] !!}
              @endif
            </span>
          </div>

          <div class="tx-workCard__tag">{{ $card['tag'] }}</div>
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