<footer class="tx-footer">
  <div class="tx-container tx-footer__shell">
    <div class="tx-footer__rule" aria-hidden="true"></div>

    <div class="tx-footer__main">
      <div class="tx-footer__brand">
        <a class="tx-footer__brandLink" href="{{ url('/') }}" aria-label="TX-SaaS">
          <img
            class="tx-footer__logo"
            src="{{ asset('assets/images/brand/TX SAAS PROFILE1.jpg.png') }}"
            alt="TX-SaaS"
          />
        </a>

        <p class="tx-footer__brandText">
          نبني حلول SaaS وأنظمة أعمال رقمية بواجهات واضحة وتجربة مستقرة
          قابلة للتوسع مع نمو أعمالك.
        </p>
      </div>

      <div class="tx-footer__contact">

        <div class="tx-footer__contactList">
          <div class="tx-footer__contactItem">
            <span class="tx-footer__contactLabel">البريد الإلكتروني</span>
            <a
              class="tx-footer__contactValue"
              href="mailto:Info@travel-x.online"
              dir="ltr"
            >
              Info@travel-x.online
            </a>
          </div>

          <div class="tx-footer__contactItem">
            <span class="tx-footer__contactLabel">الاتصال</span>
            <a
              class="tx-footer__contactValue"
              href="tel:+967783939666"
              dir="ltr"
            >
              +967783939666
            </a>
          </div>

          <div class="tx-footer__contactItem">
            <span class="tx-footer__contactLabel">الموقع</span>
            <span class="tx-footer__contactValue">اليمن، صنعاء</span>
          </div>
        </div>
      </div>

      <div class="tx-footer__social">
        <h2 class="tx-footer__heading">مواقع التواصل الاجتماعي</h2>

        <div class="tx-footer__socialList" aria-label="وسائل التواصل الاجتماعي">
          <span
            class="tx-footer__socialCard"
            role="img"
            aria-label="Instagram"
            title="Instagram"
          >
            <img
              class="tx-footer__socialIcon"
              src="{{ asset('assets/images/brand/instagram.svg') }}"
              alt=""
              aria-hidden="true"
            />
          </span>

          <span
            class="tx-footer__socialCard"
            role="img"
            aria-label="Facebook"
            title="Facebook"
          >
            <img
              class="tx-footer__socialIcon"
              src="{{ asset('assets/images/brand/facebook.svg') }}"
              alt=""
              aria-hidden="true"
            />
          </span>

          <a
            class="tx-footer__socialCard"
            href="https://wa.me/967783939666"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="WhatsApp"
            title="WhatsApp"
          >
            <img
              class="tx-footer__socialIcon"
              src="{{ asset('assets/images/brand/whatsapp.svg') }}"
              alt=""
              aria-hidden="true"
            />
          </a>
        </div>
      </div>
    </div>

    <div class="tx-footer__bottom">
      <p class="tx-footer__copy">
        © <span id="txYear"></span> TX-SaaS. جميع الحقوق محفوظة.
      </p>
    </div>
  </div>
</footer>
