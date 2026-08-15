<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#4274B6" />
  <meta name="color-scheme" content="light" />

  <title>تواصل معنا | TX-SaaS</title>

  <meta
    name="description"
    content="تواصل مع TX-SaaS وأرسل متطلبات مشروعك للحصول على خطة وتقدير مبدئي."
  />

  <link
    rel="icon"
    type="image/png"
    href="{{ asset('assets/images/brand/Brand_Mark.png') }}"
  />

  <link
    rel="apple-touch-icon"
    href="{{ asset('assets/images/brand/Brand_Mark.png') }}"
  />

  <link
    rel="stylesheet"
    href="{{ asset('assets/css/style.css') }}"
  />

  <link
    rel="stylesheet"
    href="{{ asset('assets/css/tx-design-overrides.css') }}"
  />
</head>

<body class="tx-contact-page-body tx-contact-v10-body">
  @include('landing.partials.header')

  <main class="tx-contact-v10">
    <section class="tx-contact-v10__hero">
      <div class="tx-container">
        <div class="tx-contact-v10__heroInner">
          <span class="tx-contact-v10__eyebrow">
            تواصل معنا
          </span>

          <h1>
            خلّنا نبدأ من فكرتك.
          </h1>

          <p>
            اكتب لنا ما تحتاجه بشكل مختصر، وسنرجع لك بصورة أوضح عن نطاق العمل
            والخطوة التالية والتقدير المبدئي للمشروع.
          </p>
        </div>
      </div>
    </section>

    <section class="tx-contact-v10__section">
      <div class="tx-container">
        <form class="tx-contact-v10__form" autocomplete="on">
          <div class="tx-contact-v10__grid">
            <label class="tx-contact-v10__field">
              <span>الاسم</span>

              <input
                type="text"
                name="name"
                placeholder="اكتب اسمك"
                autocomplete="name"
              />
            </label>

            <label class="tx-contact-v10__field">
              <span>البريد الإلكتروني</span>

              <input
                type="email"
                name="email"
                placeholder="name@example.com"
                autocomplete="email"
                dir="ltr"
              />
            </label>

            <label class="tx-contact-v10__field tx-contact-v10__field--full">
              <span>نوع المشروع</span>

              <div
  class="tx-contact-v10__customSelect"
  data-tx-contact-select
>
  <input
    type="hidden"
    name="project_type"
    value=""
    data-tx-contact-select-input
  />

  <button
    class="tx-contact-v10__selectTrigger"
    type="button"
    aria-haspopup="listbox"
    aria-expanded="false"
    data-tx-contact-select-trigger
  >
    <span
      class="tx-contact-v10__selectValue is-placeholder"
      data-tx-contact-select-value
    >
      اختر نوع المشروع
    </span>

    <svg
      class="tx-contact-v10__selectChevron"
      viewBox="0 0 20 20"
      aria-hidden="true"
    >
      <path
        d="M5.5 7.5 10 12l4.5-4.5"
        fill="none"
        stroke="currentColor"
        stroke-width="1.7"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
    </svg>
  </button>

  <div
    class="tx-contact-v10__selectMenu"
    role="listbox"
  >
    <button
      class="tx-contact-v10__selectOption is-selected"
      type="button"
      role="option"
      aria-selected="true"
      data-value=""
      data-tx-contact-select-option
    >
      اختر نوع المشروع
    </button>

    <button
      class="tx-contact-v10__selectOption"
      type="button"
      role="option"
      aria-selected="false"
      data-value="saas"
      data-tx-contact-select-option
    >
      منتج SaaS
    </button>

    <button
      class="tx-contact-v10__selectOption"
      type="button"
      role="option"
      aria-selected="false"
      data-value="business-system"
      data-tx-contact-select-option
    >
      نظام أعمال
    </button>

    <button
      class="tx-contact-v10__selectOption"
      type="button"
      role="option"
      aria-selected="false"
      data-value="website"
      data-tx-contact-select-option
    >
      موقع أو منصة
    </button>

    <button
      class="tx-contact-v10__selectOption"
      type="button"
      role="option"
      aria-selected="false"
      data-value="api"
      data-tx-contact-select-option
    >
      Backend / APIs
    </button>

    <button
      class="tx-contact-v10__selectOption"
      type="button"
      role="option"
      aria-selected="false"
      data-value="other"
      data-tx-contact-select-option
    >
      أخرى
    </button>
  </div>
</div>
            </label>

            <label class="tx-contact-v10__field tx-contact-v10__field--full">
              <span>وصف مختصر</span>

              <textarea
                name="description"
                rows="6"
                placeholder="اكتب الفكرة والمتطلبات الرئيسية..."
              ></textarea>
            </label>
          </div>

          <div class="tx-contact-v10__submitWrap">
            <button
              class="tx-btn tx-btn--primary tx-contact-v10__submit"
              type="button"
            >
              <span class="tx-send-icon" aria-hidden="true"></span>
              <span>إرسال المتطلبات</span>
            </button>
          </div>
        </form>

        <div class="tx-contact-v10__direct" aria-label="بيانات التواصل">
          <div class="tx-contact-v10__directItem">
            <div class="tx-contact-v10__iconHolder">
              <span class="tx-contact-v10__emailIcon" aria-hidden="true"></span>
            </div>

            <span class="tx-contact-v10__directLabel">
              البريد الإلكتروني
            </span>

            <a
              class="tx-contact-v10__directValue"
              href="mailto:Info@travel-x.online"
              dir="ltr"
            >
              Info@travel-x.online
            </a>
          </div>

          <div class="tx-contact-v10__directItem">
            <div class="tx-contact-v10__iconHolder">
              <span class="tx-call-icon" aria-hidden="true"></span>
            </div>

            <span class="tx-contact-v10__directLabel">
              الاتصال
            </span>

            <a
              class="tx-contact-v10__directValue"
              href="tel:+967783939666"
              dir="ltr"
            >
              +967783939666
            </a>
          </div>
        </div>
      </div>
    </section>
  </main>

  @include('landing.partials.footer')

  <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
