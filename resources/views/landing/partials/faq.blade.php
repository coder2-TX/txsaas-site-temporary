<section class="tx-section" id="faq">
  @php
    $defaults = [
      ['q' => 'كم مدة تنفيذ مشروع MVP؟', 'a' => 'يعتمد على النطاق، لكن غالبًا يتم خلال أسابيع قليلة لمشروع MVP منظم.'],
      ['q' => 'هل تدعمون أنظمة الاشتراكات والدفع؟', 'a' => 'نعم، يمكن بناء خطط واشتراكات وفواتير وتكامل مع بوابات دفع حسب بلدك.'],
      ['q' => 'هل تسلمون الكود والمستندات؟', 'a' => 'نعم، تسليم مرتب للكود + توثيق أساسي + إرشادات نشر وتشغيل.'],
      ['q' => 'هل تدعمون عربي/إنجليزي RTL/LTR؟', 'a' => 'نعم، التصميم والبناء يدعم الاتجاهين حسب الحاجة.'],
      ['q' => 'هل يوجد دعم وصيانة بعد الإطلاق؟', 'a' => 'نعم، حسب اتفاق واضح (شهرية/ربع سنوية/حسب الطلب).'],
      ['q' => 'كيف أبدأ؟', 'a' => 'ارسل وصف مختصر للفكرة والمتطلبات، وسنقترح نطاق MVP وخطة تنفيذ.'],
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
                ]);
        }
    } catch (\Throwable $e) {
        $items = collect();
    }

    if ($items->isEmpty()) {
        $items = collect($defaults);
    }
  @endphp

  <div class="tx-container">
    <div class="tx-sectionHead">
      <h2 class="tx-h2">أسئلة شائعة</h2>
      <p class="tx-sub">إجابات مختصرة تساعدك قبل البدء.</p>
    </div>

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