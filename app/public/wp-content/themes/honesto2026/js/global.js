document.addEventListener('DOMContentLoaded', function() {
  function headerScroll() {
    var winWidth = window.innerWidth;
    var welcomeH = document.getElementById("section-welcome")?.offsetHeight || 0;
    var welcomeHeight = welcomeH - 50;
    console.log(welcomeHeight);

    window.addEventListener('scroll', function() {
      var header = document.querySelector('header.opacity_effect');
      var scroll = window.scrollY;
      if (!header) return;
      if (scroll >= welcomeHeight) header.classList.add('active');
      else header.classList.remove('active');
    });
    // if (winWidth >= 765) { }
  }

  function hover_box() {
    document.querySelectorAll('.hover-trigger').forEach(function(el) {
      el.addEventListener('mouseover', function() {
        document.querySelectorAll('.hover-box').forEach(function(box) {
          box.style.display = 'block';
          box.classList.add('active');
        });
      });
    });
    document.querySelectorAll('.hover-box .close').forEach(function(el) {
      el.addEventListener('click', function() {
        document.querySelectorAll('.hover-box').forEach(function(box) {
          box.style.display = 'none';
          box.classList.remove('active');
        });
      });
    });
  }

  // functions
  headerScroll();
  hover_box();
});