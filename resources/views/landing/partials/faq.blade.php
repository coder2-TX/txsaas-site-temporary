<section class="tx-section" id="faq">
  @php
    $legacyDefaults = [
      ['q' => 'كم مدة تنفيذ مشروع MVP؟', 'a' => 'يعتمد على النطاق، لكن غالبًا يتم خلال أسابيع قليلة لمشروع MVP منظم.'],
      ['q' => 'هل تدعمون أنظمة الاشتراكات والدفع؟', 'a' => 'نعم، يمكن بناء خطط واشتراكات وفواتير وتكامل مع بوابات دفع حسب بلدك.'],
      ['q' => 'هل تسلمون الكود والمستندات؟', 'a' => 'نعم، تسليم مرتب للكود + توثيق أساسي + إرشادات نشر وتشغيل.'],
      ['q' => 'هل تدعمون عربي/إنجليزي RTL/LTR؟', 'a' => 'نعم، التصميم والبناء يدعم الاتجاهين حسب الحاجة.'],
      ['q' => 'هل يوجد دعم وصيانة بعد الإطلاق؟', 'a' => 'نعم، حسب اتفاق واضح (شهرية/ربع سنوية/حسب الطلب).'],
      ['q' => 'كيف أبدأ؟', 'a' => 'ارسل وصف مختصر للفكرة والمتطلبات، وسنقترح نطاق MVP وخطة تنفيذ.'],
    ];

    $defaults = [
      [
        'q' => 'هل تقدمون منتجات جاهزة أم حلولًا مخصصة؟',
        'a' => 'نقدم الاثنين: منتجات رقمية جاهزة قابلة للتخصيص، إضافة إلى حلول وأنظمة تُبنى حسب احتياج العمل وطبيعة العمليات.',
      ],
      [
        'q' => 'ما الخدمات التقنية التي تقدمها TX-SaaS؟',
        'a' => 'تشمل خدماتنا تحليل الأنظمة، تطوير أنظمة الويب، تطبيقات الموبايل، المواقع الإلكترونية، والاستضافة وإدارة السيرفرات.',
      ],
      [
        'q' => 'هل يمكن تخصيص المنتجات الجاهزة حسب طبيعة العمل؟',
        'a' => 'نعم، أحد محاور TX-SaaS هو تقديم منتجات جاهزة قابلة للتخصيص لتناسب احتياجات المنشأة وطريقة تشغيلها.',
      ],
      [
        'q' => 'كيف تبدأون تنفيذ نظام جديد؟',
        'a' => 'نبدأ بفهم الفكرة والاحتياج، ثم تحليل المستخدمين والعمليات، إعداد التصور والواجهات، التطوير والاختبار، وأخيرًا الإطلاق والمتابعة.',
      ],
      [
        'q' => 'هل توفرون الاستضافة وتجهيز السيرفرات؟',
        'a' => 'نعم، نحدد احتياج الاستضافة، نجهز الدومين وبيئة السيرفر، نربط النظام وقاعدة البيانات، ثم نفعّل الحماية ونتابع التشغيل.',
      ],
      [
        'q' => 'ما أبرز المنتجات المتاحة لديكم؟',
        'a' => 'من منتجاتنا: طيران لخدمات السفر والسياحة، طابور للمواعيد والحجوزات، سفر إكس لشركات السفريات، أذكى HR للموارد البشرية، وTX AI Bot كمساعد ذكاء اصطناعي.',
      ],
    ];

    $items = collect();

    try {
        if (class_exists(\App\Models\FaqItem::class)) {
            $items = \App\Models\FaqItem::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->get()
                ->map(fn ($r) => [
                    'q' => $r->question,
                    'a' => $r->answer,
                ])
                ->values();
        }
    } catch (\Throwable $e) {
        $items = collect();
    }

    $isLegacyFaq = $items->count() === count($legacyDefaults)
      && $items->values()->every(function ($item, $index) use ($legacyDefaults) {
          return trim((string) $item['q']) === trim((string) $legacyDefaults[$index]['q'])
            && trim((string) $item['a']) === trim((string) $legacyDefaults[$index]['a']);
      });

    if ($items->isEmpty() || $isLegacyFaq) {
        $items = collect($defaults);
    }
  @endphp

  <div class="tx-container">
    <header class="tx-faqHead">
      <h2 class="tx-h2">أسئلة شائعة</h2>

      <span class="tx-faqHead__pattern" aria-hidden="true">
        <img
          src="{{ asset('assets/images/brand/pattern-line.svg') }}"
          alt=""
          width="200"
          height="32"
          loading="lazy"
          decoding="async"
        >
      </span>

      <p class="tx-faqHead__sub">إجابات سريعة عن طبيعة حلولنا وطريقة العمل معنا.</p>
    </header>

    <div class="tx-faq" data-faq>
      @foreach ($items as $item)
        <details class="tx-faqItem">
          <summary>{{ $item['q'] }}</summary>
          <div class="tx-faqItem__a">{{ $item['a'] }}</div>
        </details>
      @endforeach
    </div>
  </div>
</section>
