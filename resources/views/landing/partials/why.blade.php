<section class="tx-section tx-section--soft tx-whySection" id="why">
  @php
    $defaults = [
      'subtitle' => 'نركز على بناء منتج “جاهز للبيع” — وليس مجرد كود.',

      'bullets' => [
        ['t' => 'Architecture قابل للتوسع', 'd' => 'تصميم طبقات واضح + قابلية إضافة ميزات بدون تعقيد.'],
        ['t' => 'أداء عالي',              'd' => 'Caching، Queues، تحسين استعلامات قاعدة البيانات.'],
        ['t' => 'أمان وموثوقية',          'd' => 'صلاحيات RBAC، تدقيق Logs، حماية نقاط الـ API.'],
        ['t' => 'تسليم مرتب',             'd' => 'توثيق + بيئة نشر + مخرجات واضحة قابلة للإدارة.'],
      ],

      'checklist' => [
        'تصميم UI/UX مناسب للأعمال (RTL جاهز)',
        'Backend + API + Admin Dashboard',
        'نظام مستخدمين وصلاحيات وتدقيق',
        'جاهزية للنشر: إعدادات وأداء وأمان',
        'دعم بعد الإطلاق حسب الاتفاق',
      ],
    ];

    $row = null;

    try {
        $row = \App\Models\HomeWhySection::query()->latest('id')->first();
    } catch (\Throwable $e) {
        $row = null;
    }

    // ✅ نفس منطق الخدمات: is_active = تفعيل التخصيص
    $useCustom = $row && (bool) $row->is_active;

    $subtitle = ($useCustom && filled($row->subtitle)) ? $row->subtitle : $defaults['subtitle'];

    $bullets = [
      [
        't' => ($useCustom && filled($row->b1_title)) ? $row->b1_title : $defaults['bullets'][0]['t'],
        'd' => ($useCustom && filled($row->b1_desc))  ? $row->b1_desc  : $defaults['bullets'][0]['d'],
      ],
      [
        't' => ($useCustom && filled($row->b2_title)) ? $row->b2_title : $defaults['bullets'][1]['t'],
        'd' => ($useCustom && filled($row->b2_desc))  ? $row->b2_desc  : $defaults['bullets'][1]['d'],
      ],
      [
        't' => ($useCustom && filled($row->b3_title)) ? $row->b3_title : $defaults['bullets'][2]['t'],
        'd' => ($useCustom && filled($row->b3_desc))  ? $row->b3_desc  : $defaults['bullets'][2]['d'],
      ],
      [
        't' => ($useCustom && filled($row->b4_title)) ? $row->b4_title : $defaults['bullets'][3]['t'],
        'd' => ($useCustom && filled($row->b4_desc))  ? $row->b4_desc  : $defaults['bullets'][3]['d'],
      ],
    ];

    $checklist = [
      ($useCustom && filled($row->c1)) ? $row->c1 : $defaults['checklist'][0],
      ($useCustom && filled($row->c2)) ? $row->c2 : $defaults['checklist'][1],
      ($useCustom && filled($row->c3)) ? $row->c3 : $defaults['checklist'][2],
      ($useCustom && filled($row->c4)) ? $row->c4 : $defaults['checklist'][3],
      ($useCustom && filled($row->c5)) ? $row->c5 : $defaults['checklist'][4],
    ];
  @endphp

  <div class="tx-container">
    <div class="tx-sectionHead">
      <h2 class="tx-h2">لماذا TX-SaaS؟</h2>
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
        <span class="tx-whyOutcome__eyebrow">مخرجات واضحة</span>
        <h3 class="tx-whyOutcome__title">ماذا ستحصل عليه؟</h3>
        <ul class="tx-whyOutcome__list">
          @foreach ($checklist as $item)
            <li><span class="tx-whyOutcome__check" aria-hidden="true">✓</span><span>{{ $item }}</span></li>
          @endforeach
        </ul>
        <a class="tx-btn tx-whyOutcome__cta" href="{{ url('/contact') }}">ابدأ مشروعك الآن</a>
      </aside>
    </div>
  </div>
</section>
