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
</head>

<body class="tx-contact-page-body">
  @include('landing.partials.header')

  <main class="tx-contactPage">
    <section class="tx-section tx-contactPage__section">
      <div class="tx-container">
        <div class="tx-contactPage__layout">
          <div class="tx-contactPage__content">
            <div class="tx-contactPage__intro">
              <h1 class="tx-h2 tx-contactPage__title">
                تواصل معنا
              </h1>

              <span class="tx-contactPage__pattern" aria-hidden="true">
                <img
                  src="{{ asset('assets/images/brand/pattern-line.svg') }}"
                  alt=""
                />
              </span>

              <p class="tx-contactPage__text">
                اكتب لنا ما تحتاجه بشكل مختصر وواضح، وشاركنا فكرة المشروع أو
                التحدي الذي ترغب في حله والمتطلبات الأساسية التي تتوقعها.
                سنراجع التفاصيل ونتواصل معك بصورة أوضح حول نطاق العمل، الحل
                المناسب، الخطوة التالية، والمدة والتقدير المبدئي للمشروع، حتى
                تكون بداية التنفيذ مبنية على تصور واضح من الطرفين.
              </p>
            </div>

            <div class="tx-contactPage__direct" aria-label="بيانات التواصل">
              <div class="tx-contactPage__infoItem">
                <div class="tx-contactPage__iconShell">
                  <span class="tx-contactPage__emailIcon" aria-hidden="true"></span>
                </div>

                <div class="tx-contactPage__infoContent">
                  <span class="tx-contactPage__infoTitle">
                    البريد الإلكتروني
                  </span>

                  <a
                    class="tx-contactPage__infoValue"
                    href="mailto:Info@travel-x.online"
                    dir="ltr"
                  >
                    Info@travel-x.online
                  </a>
                </div>
              </div>

              <div class="tx-contactPage__infoItem">
                <div class="tx-contactPage__iconShell">
                  <span class="tx-call-icon" aria-hidden="true"></span>
                </div>

                <div class="tx-contactPage__infoContent">
                  <span class="tx-contactPage__infoTitle">
                    الاتصال
                  </span>

                  <a
                    class="tx-contactPage__infoValue"
                    href="tel:+967783939666"
                    dir="ltr"
                  >
                    +967783939666
                  </a>
                </div>
              </div>
              <div class="tx-contactPage__infoItem">
                <div class="tx-contactPage__iconShell">
                  <span class="tx-contactPage__locationIcon" aria-hidden="true"></span>
                </div>

                <div class="tx-contactPage__infoContent">
                  <span class="tx-contactPage__infoTitle">
                    الموقع
                  </span>

                  <span class="tx-contactPage__infoValue">
                    اليمن، صنعاء
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="tx-contactPage__formCard">
            <form class="tx-contactPage__form" autocomplete="on">
              <div class="tx-contactPage__grid">
                <label class="tx-contactPage__field">
                  <span>الاسم</span>

                  <input
                    type="text"
                    name="name"
                    placeholder="اكتب اسمك"
                    autocomplete="name"
                  />
                </label>

                <label class="tx-contactPage__field">
                  <span>البريد الإلكتروني</span>

                  <input
                    type="email"
                    name="email"
                    placeholder="name@example.com"
                    autocomplete="email"
                    dir="ltr"
                  />
                </label>

                <label class="tx-contactPage__field tx-contactPage__field--full">
                  <span>نوع المشروع</span>

                  <div
                    class="tx-contactPage__customSelect"
                    data-tx-contact-select
                  >
                    <input
                      type="hidden"
                      name="project_type"
                      value=""
                      data-tx-contact-select-input
                    />

                    <button
                      class="tx-contactPage__selectTrigger"
                      type="button"
                      aria-haspopup="listbox"
                      aria-expanded="false"
                      data-tx-contact-select-trigger
                    >
                      <span
                        class="tx-contactPage__selectValue is-placeholder"
                        data-tx-contact-select-value
                      >
                        اختر نوع المشروع
                      </span>

                      <svg
                        class="tx-contactPage__selectChevron"
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
                      class="tx-contactPage__selectMenu"
                      role="listbox"
                    >
                      <button
                        class="tx-contactPage__selectOption is-selected"
                        type="button"
                        role="option"
                        aria-selected="true"
                        data-value=""
                        data-tx-contact-select-option
                      >
                        اختر نوع المشروع
                      </button>

                      <button
                        class="tx-contactPage__selectOption"
                        type="button"
                        role="option"
                        aria-selected="false"
                        data-value="saas"
                        data-tx-contact-select-option
                      >
                        منتج SaaS
                      </button>

                      <button
                        class="tx-contactPage__selectOption"
                        type="button"
                        role="option"
                        aria-selected="false"
                        data-value="business-system"
                        data-tx-contact-select-option
                      >
                        نظام أعمال
                      </button>

                      <button
                        class="tx-contactPage__selectOption"
                        type="button"
                        role="option"
                        aria-selected="false"
                        data-value="website"
                        data-tx-contact-select-option
                      >
                        موقع أو منصة
                      </button>

                      <button
                        class="tx-contactPage__selectOption"
                        type="button"
                        role="option"
                        aria-selected="false"
                        data-value="api"
                        data-tx-contact-select-option
                      >
                        Backend / APIs
                      </button>

                      <button
                        class="tx-contactPage__selectOption"
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

                <label class="tx-contactPage__field tx-contactPage__field--full">
                  <span>وصف مختصر</span>

                  <textarea
                    name="description"
                    rows="6"
                    placeholder="اكتب الفكرة والمتطلبات الرئيسية..."
                  ></textarea>
                </label>
              </div>

              <div class="tx-contactPage__submitWrap">
                <button
                  class="tx-btn tx-btn--primary tx-contactPage__submit"
                  type="button"
                >
                  <span class="tx-send-icon" aria-hidden="true"></span>
                  <span>إرسال المتطلبات</span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  @include('landing.partials.footer')

  <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
