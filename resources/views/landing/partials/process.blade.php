<section class="tx-section" id="process">
  @php
    $defaults = [
      'subtitle' => 'خطوات واضحة من التحليل حتى الإطلاق — بدون ضياع وقت.',
      'steps' => [
        ['t' => 'Discovery',        'd' => 'نفهم الفكرة والهدف ونحدد نطاق MVP بدقة.'],
        ['t' => 'UI/UX Prototype',  'd' => 'تصميم أولي للشاشات ومسارات المستخدم.'],
        ['t' => 'Build Sprint',     'd' => 'تطوير على دفعات مع تسليمات واضحة.'],
        ['t' => 'QA + Security',    'd' => 'اختبارات وتجهيز أمان قبل الإطلاق.'],
        ['t' => 'Launch + Support', 'd' => 'نشر ومراقبة + دعم وتحسينات لاحقة.'],
      ],
    ];

    $row = null;
    try {
        $row = \App\Models\HomeProcessSection::query()->latest('id')->first();
    } catch (\Throwable $e) {
        $row = null;
    }

    $useCustom = $row && (bool) $row->is_active;

    $subtitle = ($useCustom && filled($row->subtitle)) ? $row->subtitle : $defaults['subtitle'];

    $steps = [
      [
        't' => ($useCustom && filled($row->s1_title)) ? $row->s1_title : $defaults['steps'][0]['t'],
        'd' => ($useCustom && filled($row->s1_desc))  ? $row->s1_desc  : $defaults['steps'][0]['d'],
      ],
      [
        't' => ($useCustom && filled($row->s2_title)) ? $row->s2_title : $defaults['steps'][1]['t'],
        'd' => ($useCustom && filled($row->s2_desc))  ? $row->s2_desc  : $defaults['steps'][1]['d'],
      ],
      [
        't' => ($useCustom && filled($row->s3_title)) ? $row->s3_title : $defaults['steps'][2]['t'],
        'd' => ($useCustom && filled($row->s3_desc))  ? $row->s3_desc  : $defaults['steps'][2]['d'],
      ],
      [
        't' => ($useCustom && filled($row->s4_title)) ? $row->s4_title : $defaults['steps'][3]['t'],
        'd' => ($useCustom && filled($row->s4_desc))  ? $row->s4_desc  : $defaults['steps'][3]['d'],
      ],
      [
        't' => ($useCustom && filled($row->s5_title)) ? $row->s5_title : $defaults['steps'][4]['t'],
        'd' => ($useCustom && filled($row->s5_desc))  ? $row->s5_desc  : $defaults['steps'][4]['d'],
      ],
    ];
  @endphp

  <div class="tx-container">
    <div class="tx-sectionHead">
      <h2 class="tx-h2">منهجية العمل</h2>
      <p class="tx-sub">{{ $subtitle }}</p>
    </div>

    <ol class="tx-steps">
      @foreach ($steps as $i => $s)
        <li class="tx-step">
          <span class="tx-step__n">{{ $i + 1 }}</span>
          <div class="tx-step__c">
            <div class="tx-step__t">{{ $s['t'] }}</div>
            <div class="tx-step__d">{{ $s['d'] }}</div>
          </div>
        </li>
      @endforeach
    </ol>
  </div>
</section>