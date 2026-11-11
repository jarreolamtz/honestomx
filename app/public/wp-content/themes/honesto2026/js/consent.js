// Aviso de cookies con Google Consent Mode.
// header.php deja todo "denegado" por default; aquí la persona acepta o rechaza y se guarda su
// elección en este navegador. Si acepta, Google Analytics / Tag Manager pueden usar cookies.
(function () {
  var KEY = 'honesto_consent';

  function guardada() {
    try { return localStorage.getItem(KEY); } catch (e) { return null; }
  }

  function guardar(valor) {
    try { localStorage.setItem(KEY, valor); } catch (e) {}
  }

  function actualizarConsentimiento(valor) {
    window.dataLayer = window.dataLayer || [];
    var gtag = window.gtag || function () { window.dataLayer.push(arguments); };
    gtag('consent', 'update', {
      ad_storage: valor, ad_user_data: valor, ad_personalization: valor, analytics_storage: valor
    });
    window.dataLayer.push({ event: 'consent_update', consent: valor });
  }

  function mostrarAviso() {
    var aviso = document.createElement('div');
    aviso.className = 'cookie-notice';
    aviso.setAttribute('role', 'dialog');
    aviso.setAttribute('aria-live', 'polite');
    aviso.setAttribute('aria-label', 'Cookie notice');
    aviso.innerHTML =
      '<p class="cookie-notice__text">We use cookies to understand how people use our site and to improve it. ' +
      'Read our <a href="/privacy-policy/">Privacy Policy</a>.</p>' +
      '<div class="cookie-notice__actions">' +
      '<button type="button" class="cookie-notice__decline">Decline</button>' +
      '<button type="button" class="cookie-notice__accept">Accept</button>' +
      '</div>';

    function responder(valor) {
      guardar(valor);
      actualizarConsentimiento(valor);
      aviso.remove();
    }

    aviso.querySelector('.cookie-notice__accept').addEventListener('click', function () { responder('granted'); });
    aviso.querySelector('.cookie-notice__decline').addEventListener('click', function () { responder('denied'); });
    document.body.appendChild(aviso);
  }

  // Permite volver a abrir el aviso desde cualquier enlace con data-cookie-settings
  document.addEventListener('click', function (e) {
    var link = e.target.closest && e.target.closest('[data-cookie-settings]');
    if (!link) return;
    e.preventDefault();
    if (!document.querySelector('.cookie-notice')) mostrarAviso();
  });

  if (!guardada()) {
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', mostrarAviso);
    else mostrarAviso();
  }
})();
