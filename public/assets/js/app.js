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