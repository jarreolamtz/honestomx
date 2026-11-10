<!-- HEAD.PHP -->
<!DOCTYPE html>
<html>

<head>

  <!-- Google Tag Manager -->
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
    })(window, document, 'script', 'dataLayer', 'REPLACE');
  </script>
  <!-- End Google Tag Manager -->


  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=REPLACE"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'REPLACE');
  </script>

  <!-- Iso -->
  <meta charset="UTF-8">
  <!-- Title is the first phrase you see as a search result. -->
  <title><?php bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

  <!-- Description of your website. Max 160 Characters-->
  <meta name="description" content="<?php bloginfo('description'); ?>" />

  <!-- Most important word to use on specific page. / No more than 10 keyword phrases -->
  <meta name="keywords" content="Branding, Communication Design, Photography & Video, Animation, Illustration, Web Design, Editorial, Customer Experience">

  <!-- Favicon -->
  <link rel="icon" href="favicon/favicon.ico" sizes="any">
  <link rel="icon" href="favicon/favicon.svg" type="image/svg+xml">
  <link rel="apple-touch-icon" href="favicon/apple-touch-icon.png">
  <link rel="manifest" href="favicon/site.webmanifest">
  <meta name="theme-color" content="#FFFFFF">
  <!-- <link rel="manifest" href="favicons/manifest.json"> -->
  <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#FFFFFF">
  <meta name="theme-color" content="#ffffff">

  <!-- Allows robots to crawl your website. https://yoast.com/robots-meta-tags/ -->
  <meta name="robots" content="selection">

  <!-- Schema.org markup for Google+ and Pinterest  http://schema.org/docs/gs.html-->
  <meta itemprop="name" content="<?php bloginfo('name'); ?>">
  <meta itemprop="description" content="<?php bloginfo('description'); ?>">
  <meta itemprop="image" content="https://honesto.co/image.jpg">

  <!-- Twitter Card data -->
  <meta name="twitter:card" content="<?php bloginfo('name'); ?>">
  <meta name="twitter:site" content="@publisher_handle">
  <meta name="twitter:title" content="<?php bloginfo('name'); ?>">
  <meta name="twitter:description" content="<?php bloginfo('description'); ?>">
  <meta name="twitter:creator" content="<?php bloginfo('name'); ?>">
  <meta name="twitter:image" content="https://honesto.co/image.jpg">


  <!-- Open Graph data for sharing in Facebook -->
  <meta property="og:title" content="<?php bloginfo('name'); ?>" />
  <meta property="og:type" content="<?php bloginfo('name'); ?>" />
  <meta property="og:url" content="https://honesto.co/" />
  <meta property="og:image" content="https://honesto.co/image.jpg" />
  <meta property="og:description" content="<?php bloginfo('description'); ?>" />
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
  <script src="<?php echo get_template_directory_uri(); ?>/js/splide-extension-auto-scroll.min.js"></script>
  <!-- Stylesheets -->
  <?php wp_head(); ?>
</head>


<!-- <body style="background-image: url(<?php echo get_template_directory_uri() ?>/img/delete/home.jpg);"> -->

<body post-type="<?php echo get_post_type() ?>" page-name="<?php echo get_post_field('post_name', get_post()); ?>">
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=REPLACE"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->


  <!-- LOADER -->
  <div class="loader">
    <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/logo_w_loader.svg" style="max-height: 40px;">
  </div>
  
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