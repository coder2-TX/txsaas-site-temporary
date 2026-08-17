// public/assets/js/app.js
(function () {
  async function includePartials() {
    const nodes = Array.from(document.querySelectorAll("[data-include]"));
    for (const el of nodes) {
      const url = el.getAttribute("data-include");
      if (!url) continue;

      try {
        const res = await fetch(url, { cache: "no-cache" });
        if (!res.ok) throw new Error(String(res.status));
        const html = await res.text();
        el.innerHTML = html;
      } catch (err) {
        el.innerHTML =
          `<div style="padding:12px;border:1px solid #E6EAF2;border-radius:14px;background:#fff;color:#5B677A;font-family:system-ui">تعذر تحميل: ${url}</div>`;
      }
    }
  }

  function initUI() {
    const header = document.getElementById("txHeader");
    const burger = document.getElementById("txBurger");
    const drawer = document.getElementById("txDrawer");
    const yearEl = document.getElementById("txYear");

    const form = document.getElementById("txForm");
    const statusEl = document.getElementById("txFormStatus");

    const waBtn = document.getElementById("txWhatsAppBtn");

    const emailBtn = document.getElementById("txEmailBtn");
    const emailLink = document.getElementById("txEmailLink");

    if (yearEl) yearEl.textContent = String(new Date().getFullYear());

    // Drawer open/close
    function setDrawer(open) {
      if (!drawer || !burger) return;

      drawer.classList.toggle("is-open", open);
      drawer.setAttribute("aria-hidden", open ? "false" : "true");
      burger.setAttribute("aria-expanded", open ? "true" : "false");

      document.documentElement.style.overflow = open ? "hidden" : "";
      document.body.style.overflow = open ? "hidden" : "";
    }

    if (burger && drawer) {
      burger.addEventListener("click", () =>
        setDrawer(!drawer.classList.contains("is-open"))
      );

      drawer.addEventListener("click", (e) => {
        const t = e.target;
        if (
          t &&
          (t.matches("[data-close-drawer]") || t.closest("[data-close-drawer]"))
        ) {
          setDrawer(false);
        }
      });

      window.addEventListener("keydown", (e) => {
        if (e.key === "Escape") setDrawer(false);
      });
    }

    // Header subtle shadow on scroll
    function onScroll() {
      const sc = window.scrollY || document.documentElement.scrollTop;
      if (!header) return;
      header.style.boxShadow =
        sc > 10 ? "0 10px 26px rgba(15,23,42,.08)" : "none";
    }
    window.addEventListener("scroll", onScroll, { passive: true });
    onScroll();

    // ==========================
    // Helpers
    // ==========================

    function getFormValues() {
      let name = "";
      let email = "";
      let typeVal = "";
      let typeLabel = "";
      let msg = "";

      if (!form) return { name, email, typeVal, typeLabel, msg };

      const data = new FormData(form);
      name = (data.get("name") || "").toString().trim();
      email = (data.get("email") || "").toString().trim();
      typeVal = (data.get("type") || "").toString().trim();
      msg = (data.get("msg") || "").toString().trim();

      typeLabel = typeVal;
      const typeSelect = document.getElementById("type");
      if (typeSelect && typeSelect.options) {
        const opt = Array.from(typeSelect.options).find((o) => o.value === typeVal);
        if (opt && opt.textContent) typeLabel = opt.textContent.trim();
      }

      return { name, email, typeVal, typeLabel, msg };
    }

    function openGmailCompose(to) {
      if (!to) return;

      const { name, email, typeLabel, msg } = getFormValues();

      const subject = "طلب مشروع (TX-SaaS)";
      const body =
        `مرحباً،\n\n` +
        `أرغب بالتواصل بخصوص مشروع.\n\n` +
        `الاسم: ${name || "-"}\n` +
        `بريد العميل: ${email || "-"}\n` +
        `نوع المشروع: ${typeLabel || "-"}\n\n` +
        `وصف مختصر:\n${msg || "-"}\n`;

      const gmailUrl =
        "https://mail.google.com/mail/?view=cm&fs=1" +
        `&to=${encodeURIComponent(to)}` +
        `&su=${encodeURIComponent(subject)}` +
        `&body=${encodeURIComponent(body)}`;

      window.open(gmailUrl, "_blank", "noopener,noreferrer");
    }

    function bindEmailToGmail(el) {
      if (!el) return;

      el.addEventListener("click", (e) => {
        const to = (el.dataset.mailTo || "").toString().trim();

        // إذا ما في بريد من الداتا → خلّي الرابط يعمل طبيعي (لو كان mailto)
        if (!to) return;

        e.preventDefault();
        openGmailCompose(to);
      });
    }

    // ==========================
    // WhatsApp button (dynamic)
    // ==========================
    if (waBtn) {
      waBtn.addEventListener("click", (e) => {
        const phone = (waBtn.dataset.waPhone || "").toString().trim();
        const text = (waBtn.dataset.waText || "").toString().trim();

        // إذا ما في رقم من الداتا → خلّي href يشتغل طبيعي
        if (!phone) return;

        e.preventDefault();

        const msg = text || "مرحباً، أريد عرض سعر لمشروع برمجي (TX-SaaS).";
        const url = `https://api.whatsapp.com/send?phone=${encodeURIComponent(
          phone
        )}&text=${encodeURIComponent(msg)}`;

        window.open(url, "_blank", "noopener,noreferrer");
      });
    }

    // ==========================
    // Email (button + link) -> Gmail
    // ==========================
    bindEmailToGmail(emailBtn);
    bindEmailToGmail(emailLink);

    // ==========================
    // Form submit -> Send to WhatsApp
    // ==========================
    if (form && statusEl) {
      form.addEventListener("submit", (e) => {
        e.preventDefault();

        const { name, email, typeVal, typeLabel, msg } = getFormValues();

        if (!name || !email || !typeVal || !msg) {
          statusEl.textContent = "فضلاً املأ كل الحقول.";
          return;
        }

        const phone = (waBtn?.dataset?.waPhone || "").toString().trim();
        if (!phone) {
          statusEl.textContent = "رقم الواتساب غير مضبوط في لوحة التحكم.";
          return;
        }

        const composed =
          `طلب تواصل من موقع (TX-SaaS)\n` +
          `الاسم: ${name}\n` +
          `البريد: ${email}\n` +
          `نوع المشروع: ${typeLabel}\n` +
          `الوصف: ${msg}`;

        const url = `https://api.whatsapp.com/send?phone=${encodeURIComponent(
          phone
        )}&text=${encodeURIComponent(composed)}`;

        window.open(url, "_blank", "noopener,noreferrer");

        statusEl.textContent = "تم تجهيز رسالتك للواتساب. أكمل الإرسال داخل واتساب.";
        form.reset();
      });
    }

    // Close other FAQ items when one opens (nice UX)
    const faqWrap = document.querySelector("[data-faq]");
    if (faqWrap) {
      faqWrap.addEventListener(
        "toggle",
        (e) => {
          const target = e.target;
          if (!(target instanceof HTMLDetailsElement)) return;
          if (!target.open) return;

          const all = faqWrap.querySelectorAll("details");
          all.forEach((d) => {
            if (d !== target) d.open = false;
          });
        },
        true
      );
    }
  }

  document.addEventListener("DOMContentLoaded", async () => {
    await includePartials();
    initUI();
  });
})();

/* TX_SAAS_ACTIVE_NAV_V8_START */
(function () {
  function initTxActiveNavV8() {
    const links = Array.from(document.querySelectorAll('.tx-nav__link'));
    if (!links.length) return;

    const homeLink = links.find((link) => link.dataset.navPage === 'home');
    const contactLink = links.find((link) => link.dataset.navPage === 'contact');

    const clearActive = () => links.forEach((link) => {
      link.classList.remove('is-active');
      link.removeAttribute('aria-current');
    });

    const setActive = (link) => {
      if (!link) return;
      clearActive();
      link.classList.add('is-active');
      link.setAttribute('aria-current', 'page');
    };

    const currentPath = window.location.pathname.replace(/\/+$/, '') || '/';
    if (currentPath === '/contact') { setActive(contactLink); return; }
    if (currentPath !== '/') return;

    const sectionItems = links
      .filter((link) => link.dataset.navSection)
      .map((link) => ({ link, section: document.getElementById(link.dataset.navSection) }))
      .filter((item) => item.section);

    if (!sectionItems.length) { setActive(homeLink); return; }

    const firstSectionTop = () => Math.max(0, sectionItems[0].section.getBoundingClientRect().top + window.scrollY - 150);
    const visible = new Map();

    const syncActive = () => {
      if (window.scrollY < firstSectionTop()) { setActive(homeLink); return; }
      const candidates = sectionItems
        .filter(({ section }) => visible.get(section))
        .sort((a, b) => Math.abs(a.section.getBoundingClientRect().top - 100) - Math.abs(b.section.getBoundingClientRect().top - 100));
      if (candidates.length) setActive(candidates[0].link);
    };

    if ('IntersectionObserver' in window) {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => visible.set(entry.target, entry.isIntersecting));
        syncActive();
      }, { root: null, rootMargin: '-18% 0px -58% 0px', threshold: [0, .06, .16, .3] });
      sectionItems.forEach(({ section }) => observer.observe(section));
    }

    window.addEventListener('scroll', syncActive, { passive: true });
    window.addEventListener('resize', syncActive, { passive: true });
    links.forEach((link) => link.addEventListener('click', () => {
      if (link === homeLink) setActive(homeLink);
      else if (link.dataset.navSection) setActive(link);
    }));
    syncActive();
  }
  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', initTxActiveNavV8);
  else initTxActiveNavV8();
})();
/* TX_SAAS_ACTIVE_NAV_V8_END */

/* TX_SAAS_RESPONSIVE_STATE_FIX_V8_4_START */
(function () {
  const RESPONSIVE_MAX = 980;

  function getDrawer() {
    return document.getElementById('txDrawer');
  }

  function getBurger() {
    return document.getElementById('txBurger');
  }

  function unlockPageScroll() {
    document.documentElement.style.removeProperty('overflow');
    document.body.style.removeProperty('overflow');

    document.documentElement.classList.remove('tx-drawer-open');
    document.body.classList.remove('tx-drawer-open');
  }

  function closeResponsiveDrawer() {
    const drawer = getDrawer();
    const burger = getBurger();

    if (drawer) {
      drawer.classList.remove('is-open');
      drawer.setAttribute('aria-hidden', 'true');
    }

    if (burger) {
      burger.setAttribute('aria-expanded', 'false');
    }

    const header = document.getElementById('txHeader');

    if (header) {
      header.classList.remove('is-drawer-open');
    }

    unlockPageScroll();
  }

  function enforceResponsiveState() {
    if (window.innerWidth > RESPONSIVE_MAX) {
      closeResponsiveDrawer();
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', enforceResponsiveState);
  } else {
    enforceResponsiveState();
  }

  window.addEventListener('resize', enforceResponsiveState, {
    passive: true,
  });

  window.addEventListener('orientationchange', function () {
    window.setTimeout(enforceResponsiveState, 60);
  });
})();
/* TX_SAAS_RESPONSIVE_STATE_FIX_V8_4_END */

/* TX_SAAS_CONTACT_CUSTOM_SELECT_V10_2_START */
(function () {
  function initContactSelect(root) {
    if (!root || root.dataset.txSelectReady === '1') {
      return;
    }

    const trigger = root.querySelector('[data-tx-contact-select-trigger]');
    const valueLabel = root.querySelector('[data-tx-contact-select-value]');
    const hiddenInput = root.querySelector('[data-tx-contact-select-input]');
    const options = Array.from(
      root.querySelectorAll('[data-tx-contact-select-option]')
    );

    if (!trigger || !valueLabel || !hiddenInput || options.length === 0) {
      return;
    }

    root.dataset.txSelectReady = '1';

    function setOpen(open) {
      root.classList.toggle('is-open', open);
      trigger.setAttribute('aria-expanded', open ? 'true' : 'false');
    }

    function selectOption(option) {
      const selectedValue = option.dataset.value || '';
      const selectedLabel = option.textContent.trim();

      hiddenInput.value = selectedValue;
      valueLabel.textContent = selectedLabel;
      valueLabel.classList.toggle('is-placeholder', selectedValue === '');

      options.forEach(function (item) {
        const selected = item === option;

        item.classList.toggle('is-selected', selected);
        item.setAttribute('aria-selected', selected ? 'true' : 'false');
      });

      hiddenInput.dispatchEvent(
        new Event('change', {
          bubbles: true,
        })
      );

      setOpen(false);
      trigger.focus();
    }

    trigger.addEventListener('click', function () {
      setOpen(!root.classList.contains('is-open'));
    });

    options.forEach(function (option) {
      option.addEventListener('click', function () {
        selectOption(option);
      });
    });

    document.addEventListener('click', function (event) {
      if (!root.contains(event.target)) {
        setOpen(false);
      }
    });

    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape' && root.classList.contains('is-open')) {
        setOpen(false);
        trigger.focus();
      }
    });
  }

  function bootContactSelects() {
    document
      .querySelectorAll('[data-tx-contact-select]')
      .forEach(initContactSelect);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', bootContactSelects);
  } else {
    bootContactSelects();
  }
})();
/* TX_SAAS_CONTACT_CUSTOM_SELECT_V10_2_END */
/* TX-SaaS floating contact visibility:
   hidden only while the homepage Hero (#home) intersects the viewport. */
(() => {
  function initTxFloatingContactVisibility() {
    const floatingContact = document.querySelector('.tx-floating-contact');
    if (!floatingContact) return;

    const homeHero = document.getElementById('home');

    // Any non-home page, including /contact, keeps the floating button visible.
    if (!homeHero) {
      floatingContact.classList.remove('is-home-hero-hidden');
      return;
    }

    const setHeroVisibilityState = (heroIsVisible) => {
      floatingContact.classList.toggle(
        'is-home-hero-hidden',
        heroIsVisible
      );
    };

    const syncFromGeometry = () => {
      const rect = homeHero.getBoundingClientRect();
      const heroIsVisible =
        rect.bottom > 0 &&
        rect.top < window.innerHeight;

      setHeroVisibilityState(heroIsVisible);
    };

    // Correct initial state, including direct loads to /#services etc.
    syncFromGeometry();

    if ('IntersectionObserver' in window) {
      const observer = new IntersectionObserver(
        ([entry]) => {
          if (!entry) return;
          setHeroVisibilityState(entry.isIntersecting);
        },
        {
          root: null,
          threshold: 0,
        }
      );

      observer.observe(homeHero);

      window.addEventListener('pageshow', syncFromGeometry, {
        passive: true,
      });

      window.addEventListener('resize', syncFromGeometry, {
        passive: true,
      });

      return;
    }

    // Fallback only for browsers without IntersectionObserver.
    window.addEventListener('scroll', syncFromGeometry, {
      passive: true,
    });

    window.addEventListener('resize', syncFromGeometry, {
      passive: true,
    });

    window.addEventListener('pageshow', syncFromGeometry, {
      passive: true,
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener(
      'DOMContentLoaded',
      initTxFloatingContactVisibility,
      { once: true }
    );
  } else {
    initTxFloatingContactVisibility();
  }
})();
