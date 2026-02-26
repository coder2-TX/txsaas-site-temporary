<section class="tx-section tx-section--soft" id="why">
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

    <div class="tx-split">
      <div class="tx-bullets">
        @foreach ($bullets as $b)
          <div class="tx-bullet">
            <div class="tx-bullet__t">{{ $b['t'] }}</div>
            <div class="tx-bullet__d">{{ $b['d'] }}</div>
          </div>
        @endforeach
      </div>

      <div class="tx-panel">
        <div class="tx-panel__title">ماذا ستحصل عليه؟</div>
        <ul class="tx-checklist">
          @foreach ($checklist as $item)
            <li>{{ $item }}</li>
          @endforeach
        </ul>
        <a class="tx-btn tx-btn--primary tx-btn--block" href="#contact">ابدأ مشروعك الآن</a>
      </div>
    </div>
  </div>
</section>