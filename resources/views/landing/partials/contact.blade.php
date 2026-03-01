<section class="tx-section tx-contact" id="contact">
  @php
    $defaultEmail = 'Info@travel-x.online';
    $defaultWhats = '+967783939666';

    $contactRow = null;

    try {
        $contactRow = \App\Models\HomeContactSetting::query()->latest('id')->first();
    } catch (\Throwable $e) {
        $contactRow = null;
    }

    $useCustomContact = $contactRow && (bool) $contactRow->is_active;

    $emailRaw = ($useCustomContact && filled($contactRow->email)) ? $contactRow->email : $defaultEmail;
    $whatsRaw = ($useCustomContact && filled($contactRow->whatsapp)) ? $contactRow->whatsapp : $defaultWhats;

    // ✅ تنظيف رقم الواتساب إلى أرقام فقط للرابط
    $whatsDigits = preg_replace('/\D+/', '', $whatsRaw);

    // ✅ عرض أجمل: إذا الرقم أرقام فقط نعرضه مع +
    $whatsDisplay = trim($whatsRaw);
    if ($whatsDigits && !str_starts_with($whatsDisplay, '+')) {
        $whatsDisplay = '+' . $whatsDigits;
    }

    // ✅ رسالة واتساب افتراضية
    $waText = 'مرحباً، أريد عرض سعر لمشروع برمجي (TX-SaaS).';

    // ✅ رابط واتساب (Web + App)
    $whatsUrl = $whatsDigits
        ? ('https://api.whatsapp.com/send?phone=' . $whatsDigits . '&text=' . urlencode($waText))
        : '#';

    // ✅ Project types from DB (fallback إذا فاضي)
    $defaultTypes = [
      ['value' => 'saas',   'label' => 'منصة SaaS'],
      ['value' => 'system', 'label' => 'نظام أعمال'],
      ['value' => 'mobile', 'label' => 'تطبيق موبايل'],
      ['value' => 'api',    'label' => 'API / تكاملات'],
    ];

    $types = collect();

    try {
        if (class_exists(\App\Models\HomeProjectType::class)) {
            $types = \App\Models\HomeProjectType::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->get()
                ->map(fn ($t) => [
                    'value' => (string) $t->value,
                    'label' => (string) $t->label,
                ])
                ->filter(fn ($t) => filled($t['value']) && filled($t['label']))
                ->values();
        }
    } catch (\Throwable $e) {
        $types = collect();
    }

    if ($types->isEmpty()) {
        $types = collect($defaultTypes);
    }
  @endphp

  <div class="tx-container">
    <div class="tx-contactBox">
      <div class="tx-contactBox__left">
        <h2 class="tx-h2">جاهز نبدأ؟</h2>
        <p class="tx-sub">اكتب متطلباتك بشكل مختصر، وسنرجع لك بخطة + تقدير مبدئي.</p>

        <div class="tx-contactInfo">
          <div class="tx-contactInfo__row">
            <span class="tx-contactInfo__k">البريد:</span>
            <span class="tx-contactInfo__v">
              {{-- ✅ البريد نفسه يفتح Gmail عبر JS (data-mail-to) --}}
              <a
                href="#"
                id="txEmailLink"
                data-mail-to="{{ $emailRaw }}"
                dir="ltr"
              >{{ $emailRaw }}</a>
            </span>
          </div>

          <div class="tx-contactInfo__row">
            <span class="tx-contactInfo__k">واتساب:</span>
            <span class="tx-contactInfo__v">
              <a href="{{ $whatsUrl }}" target="_blank" rel="noopener" dir="ltr">{{ $whatsDisplay }}</a>
            </span>
          </div>
        </div>

        <div class="tx-contactBtns">
          <a
            class="tx-btn tx-btn--primary"
            href="{{ $whatsUrl }}"
            id="txWhatsAppBtn"
            data-wa-phone="{{ $whatsDigits }}"
            data-wa-text="{{ $waText }}"
            target="_blank"
            rel="noopener"
          >تواصل واتساب</a>

          <a
            class="tx-btn tx-btn--ghost"
            href="#"
            id="txEmailBtn"
            data-mail-to="{{ $emailRaw }}"
          >أرسل بريد</a>
        </div>

        <p class="tx-note">* غيّر البريد ورقم الواتساب لاحقًا، وسنربط النموذج بإرسال حقيقي عند الاستضافة.</p>
      </div>

      <form class="tx-form" id="txForm" novalidate>
        <div class="tx-form__row">
          <label class="tx-label" for="name">الاسم</label>
          <input class="tx-input" id="name" name="name" type="text" placeholder="اكتب اسمك" required />
        </div>

        <div class="tx-form__row">
          <label class="tx-label" for="email">البريد الإلكتروني</label>
          <input class="tx-input" id="email" name="email" type="email" placeholder="name@example.com" required />
        </div>

        <div class="tx-form__row">
          <label class="tx-label" for="type">نوع المشروع</label>
          <select class="tx-input" id="type" name="type" required>
            <option value="" selected disabled>اختر</option>
            @foreach ($types as $t)
              <option value="{{ $t['value'] }}">{{ $t['label'] }}</option>
            @endforeach
          </select>
        </div>

        <div class="tx-form__row">
          <label class="tx-label" for="msg">وصف مختصر</label>
          <textarea class="tx-input tx-textarea" id="msg" name="msg" rows="4" placeholder="اكتب الفكرة والمتطلبات الرئيسية..." required></textarea>
        </div>

        <button class="tx-btn tx-btn--primary tx-btn--block" type="submit">
          إرسال الطلب
        </button>

        <div class="tx-form__status" id="txFormStatus" role="status" aria-live="polite"></div>
      </form>
    </div>
  </div>
</section>