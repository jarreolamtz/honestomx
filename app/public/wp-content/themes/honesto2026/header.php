<!-- HEAD.PHP -->
<!DOCTYPE html>
<html>

<head>

  <!-- Consentimiento de cookies (Google Consent Mode): todo empieza "denegado" hasta que la
       persona acepta en el aviso de cookies (js/consent.js). Debe ir antes de GTM/GA. -->
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('consent', 'default', {
      ad_storage: 'denied', ad_user_data: 'denied', ad_personalization: 'denied',
      analytics_storage: 'denied', wait_for_update: 500
    });
    try {
      if (localStorage.getItem('honesto_consent') === 'granted') {
        gtag('consent', 'update', {
          ad_storage: 'granted', ad_user_data: 'granted', ad_personalization: 'granted',
          analytics_storage: 'granted'
        });
      }
    } catch (e) {}
  </script>

  <!-- Google Tag Manager. Google Analytics (GA4) se configura dentro de GTM, no aquí. -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-5FFWLWJV');
  </script>
  <!-- End Google Tag Manager -->



  <!-- Iso -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

  <!-- Favicon -->
  <link rel="icon" href="favicon/favicon.ico" sizes="any">
  <link rel="icon" href="favicon/favicon.svg" type="image/svg+xml">
  <link rel="apple-touch-icon" href="favicon/apple-touch-icon.png">
  <link rel="manifest" href="favicon/site.webmanifest">
  <meta name="theme-color" content="#FFFFFF">
  <!-- <link rel="manifest" href="favicons/manifest.json"> -->
  <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#FFFFFF">
  <meta name="theme-color" content="#ffffff">

  <!-- El título, la descripción y las etiquetas para compartir (Open Graph) los genera
       functions.php dentro de wp_head(), o un plugin de SEO si se instala uno. -->
  <script src="<?php echo get_template_directory_uri(); ?>/js/splide-extension-auto-scroll.min.js"></script>
  <!-- Stylesheets -->
  <?php wp_head(); ?>
</head>


<!-- <body style="background-image: url(<?php echo get_template_directory_uri() ?>/img/delete/home.jpg);"> -->

<body post-type="<?php echo get_post_type() ?>" page-name="<?php echo get_post_field('post_name', get_post()); ?>">
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FFWLWJV"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->


  <!-- CONTENT -->
  <div class="site">
    <div class="site-content">
      <!-- HEADER -->
      <?php if (!is_front_page('organism_home.php') && !is_page('shop')): $fixed = 'fixed-top opacity_effect';
      else: $fixed = '';
      endif; ?>
      <header class="transition-600 <?php echo $fixed  ?>">
        <div class="container-fluid">
          <div class="row">
            <!-- LOGO-->
            <div class="col-6 col-sm-8">
              <a href="<?php echo get_home_url(); ?>">
                <?php
                if (is_front_page('organism_home.php')): ?>
                  <img class="logo desktop" src="<?php echo get_template_directory_uri() ?>/img/logo_rosa.png" alt="<?php bloginfo('name'); ?> Logo">
                  <img class="logo mobile" src="<?php echo get_template_directory_uri() ?>/img/logo_negro_mobile.svg" alt="<?php bloginfo('name'); ?> Logo">
                <?php else: ?>
                  <img class="logo desktop" src="<?php echo get_template_directory_uri() ?>/img/logo_negro.png" alt="<?php bloginfo('name'); ?> Logo">
                  <img class="logo mobile" src="<?php echo get_template_directory_uri() ?>/img/logo_negro_mobile.svg" alt="<?php bloginfo('name'); ?> Logo">
                <?php endif; ?>
              </a>
            </div>
            <div class="col-6 col-sm-4 d-flex align-items-center">
              <?php
              if (is_front_page('organism_home.php')) {
                wp_nav_menu(array('theme_location' => 'header-menu', 'container_class' => 'w-100 menu-list text-link'));
              } else {
                wp_nav_menu(array('theme_location' => 'header-menu-out', 'container_class' => 'w-100 menu-list text-link'));
              }
              ?>
            </div>
          </div>
        </div>
      </header>