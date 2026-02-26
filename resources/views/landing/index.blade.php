<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>TX-SaaS | حلول برمجية ومنتجات SaaS</title>
  <meta name="description" content="TX-SaaS: نبني منتجات SaaS وأنظمة أعمال بسرعة وجودة عالية — واجهات، Backend، APIs، لوحة تحكم، واستضافة." />

  {{-- لو تستخدم Google Fonts اتركه، أو احذفه لو تريد Offline --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>

<body>
  <div id="top"></div>

  <div class="tx-topline" aria-hidden="true"></div>

  {{-- ✅ كل شيء في نفس الصفحة --}}
  @include('landing.partials.header')

  <main id="top">
    @include('landing.partials.hero')
    @include('landing.partials.services')
    @include('landing.partials.why')
    @include('landing.partials.process')
    @include('landing.partials.work')
    @include('landing.partials.faq')
    @include('landing.partials.contact')
  </main>

  @include('landing.partials.footer')

  <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>