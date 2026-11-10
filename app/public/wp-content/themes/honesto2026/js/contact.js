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
