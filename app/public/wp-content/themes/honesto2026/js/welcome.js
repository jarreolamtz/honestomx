document.addEventListener("DOMContentLoaded", function () {
  function playVideo() {
    // Play video for project icons
    document.querySelectorAll("#projects .project .icon-play").forEach(function (el) {
      el.addEventListener("click", function () {
        var videoLink = el.getAttribute("data-link");
        document.querySelector("#videoPlayer iframe").setAttribute("src", "https://player.vimeo.com/video/" + videoLink);
        setTimeout(function () {
          document.getElementById("videoPlayer").removeAttribute("hidden");
        }, 500);
      });
    });

    // Play video for playReel
    var playReel = document.getElementById("playReel");
    if (playReel) {
      playReel.addEventListener("click", function () {
        var videoLink = playReel.getAttribute("data-link");
        document.querySelector("#videoPlayer iframe").setAttribute("src", "https://player.vimeo.com/video/" + videoLink);
        setTimeout(function () {
          document.getElementById("videoPlayer").removeAttribute("hidden");
        }, 500);
      });
    }

    // Close video
    var closeBtn = document.querySelector("#videoPlayer .closeVideo");
    if (closeBtn) {
      closeBtn.addEventListener("click", function () {
        document.getElementById("videoPlayer").setAttribute("hidden", "hidden");
      });
    }
  }

  function proceso_animation() {
    // Assumes GSAP and ScrollTrigger are loaded globally
    if (typeof gsap !== "undefined" && typeof ScrollTrigger !== "undefined") {
      gsap.registerPlugin(ScrollTrigger);
      gsap.to('.process_animation', {
        scrollTrigger: {
          trigger: '.process_animation',
          start: 'top center',
          end: 'bottom center',
          scrub: true,
          markers: true,
        },
        x: 400,
        rotation: 360,
        duration: 3
      });
    }
  }

  // functions
  playVideo();
  // Uncomment if you want to enable GSAP animation
  // proceso_animation();
});