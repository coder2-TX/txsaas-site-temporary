<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#4274B6" />
  <meta name="color-scheme" content="light" />

  <title>TX-SaaS | حلول برمجية ومنتجات SaaS</title>

  <meta
    name="description"
    content="TX-SaaS: نبني منتجات SaaS وأنظمة أعمال بسرعة وجودة عالية — واجهات، Backend، APIs، لوحة تحكم، واستضافة."
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

<body>
  <div id="top"></div>
@include('landing.partials.header')

  <main>
    @include('landing.partials.hero')
    @include('landing.partials.services')
    @include('landing.partials.why')
    @include('landing.partials.process')
    @include('landing.partials.work')
    @include('landing.partials.faq')
</main>

  @include('landing.partials.footer')

  <script src="{{ asset('assets/js/app.js') }}"></script>

  <script>
    (function (d, t) {
      var BASE_URL = "http://10.0.0.98:3000";
      var g = d.createElement(t);
      var s = d.getElementsByTagName(t)[0];

      g.src = BASE_URL + "/packs/js/sdk.js";
      g.async = true;

      s.parentNode.insertBefore(g, s);

      g.onload = function () {
        window.chatwootSDK.run({
          websiteToken: 'HbvQjQWRYXTDoL1MRVH5PA1h',
          baseUrl: BASE_URL
        });
      };
    })(document, "script");
  </script>
</body>
</html>
