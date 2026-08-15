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

<body class="tx-contact-page-body tx-contact-v9-body">
  @include('landing.partials.header')

  <main class="tx-contact-v9">
    <section class="tx-contact-v9__hero">
      <div class="tx-container">
        <div class="tx-contact-v9__heroInner">
          <span class="tx-contact-v9__eyebrow">
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

    <section class="tx-contact-v9__workspace">
      <div class="tx-container">
        <div class="tx-contact-v9__layout">
          <div class="tx-contact-v9__formSide">
            <div class="tx-contact-v9__sectionHead">
              <span class="tx-contact-v9__sectionIndex">01</span>

              <div>
                <h2>تفاصيل المشروع</h2>

                <p>
                  أعطنا فكرة كافية عن المشروع، ولا تحتاج لكتابة وثيقة طويلة.
                </p>
              </div>
            </div>

            <form class="tx-contact-v9__form" autocomplete="on">
              <div class="tx-contact-v9__row">
                <label class="tx-contact-v9__field">
                  <span>الاسم</span>

                  <input
                    type="text"
                    name="name"
                    placeholder="اكتب اسمك"
                    autocomplete="name"
                  />
                </label>

                <label class="tx-contact-v9__field">
                  <span>البريد الإلكتروني</span>

                  <input
                    type="email"
                    name="email"
                    placeholder="name@example.com"
                    autocomplete="email"
                    dir="ltr"
                  />
                </label>
              </div>

              <label class="tx-contact-v9__field">
                <span>نوع المشروع</span>

                <select name="project_type">
                  <option value="">اختر نوع المشروع</option>
                  <option value="saas">منتج SaaS</option>
                  <option value="business-system">نظام أعمال</option>
                  <option value="website">موقع أو منصة</option>
                  <option value="api">Backend / APIs</option>
                  <option value="other">أخرى</option>
                </select>
              </label>

              <label class="tx-contact-v9__field">
                <span>وصف مختصر</span>

                <textarea
                  name="description"
                  rows="6"
                  placeholder="اكتب الفكرة والمتطلبات الرئيسية..."
                ></textarea>
              </label>

              <div class="tx-contact-v9__formFooter">
                <button
                  class="tx-btn tx-btn--primary tx-contact-v9__submit"
                  type="button"
                >
                  <span class="tx-call-icon" aria-hidden="true"></span>
                  <span>إرسال المتطلبات</span>
                </button>

                <p>
                  سنربط النموذج بإرسال حقيقي عند تجهيز الاستضافة.
                </p>
              </div>
            </form>
          </div>

          <aside class="tx-contact-v9__direct" aria-label="بيانات التواصل">
            <div class="tx-contact-v9__sectionHead tx-contact-v9__sectionHead--direct">
              <span class="tx-contact-v9__sectionIndex">02</span>

              <div>
                <h2>تواصل مباشر</h2>

                <p>
                  تقدر تتواصل معنا مباشرة عبر البريد أو واتساب.
                </p>
              </div>
            </div>

            <div class="tx-contact-v9__contactList">
              <a
                class="tx-contact-v9__contactItem"
                href="mailto:Info@travel-x.online"
              >
                <span class="tx-contact-v9__contactIcon" aria-hidden="true">
                  <svg viewBox="0 0 24 24">
                    <path
                      d="M4 6h16v12H4zM4 7l8 6 8-6"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="1.8"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </span>

                <span class="tx-contact-v9__contactText">
                  <small>البريد الإلكتروني</small>
                  <strong dir="ltr">Info@travel-x.online</strong>
                </span>

                <span class="tx-contact-v9__arrow" aria-hidden="true">↗</span>
              </a>

              <a
                class="tx-contact-v9__contactItem"
                href="https://wa.me/967783939666"
                target="_blank"
                rel="noopener noreferrer"
              >
                <span class="tx-contact-v9__contactIcon" aria-hidden="true">
                  <span class="tx-call-icon"></span>
                </span>

                <span class="tx-contact-v9__contactText">
                  <small>واتساب</small>
                  <strong dir="ltr">+967783939666</strong>
                </span>

                <span class="tx-contact-v9__arrow" aria-hidden="true">↗</span>
              </a>
            </div>

            <div class="tx-contact-v9__note">
              <span aria-hidden="true">i</span>

              <p>
                البريد ورقم الواتساب الحاليان قابلان للتغيير لاحقًا بدون تغيير
                تصميم الصفحة.
              </p>
            </div>
          </aside>
        </div>
      </div>
    </section>
  </main>

  @include('landing.partials.footer')

  <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
