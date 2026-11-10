// CF7: botón "X" para cerrar .wpcf7-response-output después de enviar
(function () {
  var body = document.body;

  var closeBtn = document.createElement('button');
  closeBtn.type = 'button';
  closeBtn.className = 'cf7-response-close';
  closeBtn.setAttribute('aria-label', 'Cerrar mensaje');
  closeBtn.textContent = 'X';
  body.appendChild(closeBtn);

  // Cada respuesta de CF7 (enviado, error, inválido, spam) muestra la X
  document.addEventListener('wpcf7submit', function () {
    body.classList.remove('cf7-response-dismissed');
    body.classList.add('cf7-response-open');
  });

  // Al reenviar, se limpia el estado para que el nuevo mensaje sí aparezca
  document.addEventListener('wpcf7beforesubmit', function () {
    body.classList.remove('cf7-response-open', 'cf7-response-dismissed');
  });

  closeBtn.addEventListener('click', function () {
    body.classList.remove('cf7-response-open');
    body.classList.add('cf7-response-dismissed');
  });
})();

// Header en blanco mientras la sección rosa (#are_you_an_agency) pasa detrás de él (es fixed)
(function () {
  var section = document.getElementById('are_you_an_agency');
  if (!section) return;
  var targets = [
    { el: document.querySelector('header'), cls: 'header-on-pink' }
  ].filter(function (t) { return t.el; });

  var ticking = false;
  function update() {
    ticking = false;
    var s = section.getBoundingClientRect();
    targets.forEach(function (t) {
      var r = t.el.getBoundingClientRect();
      // Activo cuando la sección cubre la mitad vertical del elemento
      var middle = r.top + r.height / 2;
      document.body.classList.toggle(t.cls, s.top <= middle && s.bottom >= middle);
    });
  }
  function onScroll() {
    if (!ticking) {
      ticking = true;
      requestAnimationFrame(update);
    }
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  window.addEventListener('resize', onScroll);
  update();
})();
