<?php
  
/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);
//Remove WPAUTOP from ACF TinyMCE Editor
function acf_wysiwyg_add_wpautop() {
    add_filter('acf_the_content', 'wpautop' );
}

// Versión de cada asset = fecha de modificación del archivo. Cambia sola en cada deploy,
// así los navegadores descargan el CSS/JS nuevo en vez de usar el que tienen en caché.
function honesto_v($path) {
  $file = get_template_directory() . $path;
  return file_exists($file) ? (string) filemtime($file) : null;
}

// Load CSS
function areaStyle() {
  wp_enqueue_style('bootstrap',get_template_directory_uri() . '/css/framework/bootstrap.min.css', array(), honesto_v('/css/framework/bootstrap.min.css'));
  wp_enqueue_style('global_css',get_template_directory_uri() . '/css/global.css', array(), honesto_v('/css/global.css'));
  // HEADER
  wp_enqueue_style('header_css',get_template_directory_uri() . '/css/header.css', array(), honesto_v('/css/header.css'));
  // BODY
  if(is_front_page()){
    wp_enqueue_style('index_css',get_template_directory_uri() . '/css/sections/welcome.css', array(), honesto_v('/css/sections/welcome.css'));
    // Splide.min.css
    wp_enqueue_style('splide_css','https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css');
  } else if(is_page('inicio')){
    wp_enqueue_style('index_css',get_template_directory_uri() . '/css/sections/welcome.css', array(), honesto_v('/css/sections/welcome.css'));
  } else if(is_page('work')) {
    wp_enqueue_style('index_css',get_template_directory_uri() . '/css/sections/proyectos.css', array(), honesto_v('/css/sections/proyectos.css'));
    wp_enqueue_style('splide_css','https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css');
  } else if(is_singular('work')) {
    wp_enqueue_style('index_css',get_template_directory_uri() . '/css/sections/proyecto.css', array(), honesto_v('/css/sections/proyecto.css'));
  } else if(is_page('about')) {
    wp_enqueue_style('index_css',get_template_directory_uri() . '/css/sections/about.css', array(), honesto_v('/css/sections/about.css'));
  } else if(is_page('contact')) {
    wp_enqueue_style('index_css',get_template_directory_uri() . '/css/sections/contact.css', array(), honesto_v('/css/sections/contact.css'));
    wp_enqueue_style('doodle_css',get_template_directory_uri() . '/css/doodle/doodle.css', array(), honesto_v('/css/doodle/doodle.css'));
  } else if(is_404()) {
    wp_enqueue_style('404',get_template_directory_uri() . '/css/sections/404.css', array(), honesto_v('/css/sections/404.css'));
  } else {
    // Páginas normales (privacy-policy, terms-conditions, shop, etc.)
    wp_enqueue_style('page_css',get_template_directory_uri() . '/css/sections/page.css', array(), honesto_v('/css/sections/page.css'));
  }
  // FOOTER
  wp_enqueue_style('footer_css',get_template_directory_uri() . '/css/footer.css', array(), honesto_v('/css/footer.css'));
}
// Load Scripts
function areaScripts() {
  if ( !is_admin() ) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js', '3.7.1', false);
    wp_enqueue_script('jquery');
  }
  wp_enqueue_script('global_js',get_template_directory_uri() . '/js/global.js', array('jquery'), honesto_v('/js/global.js'), true);
  if(is_front_page()){
    wp_enqueue_script('splide_js','https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', array('jquery'), '', true);
    wp_enqueue_script('tweenmax_js','https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js', '', true);
  } else if(is_page('work')) {
    wp_enqueue_script('splide_js','https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', array('jquery'), '', true);
  } else if(is_page('contact')) {
    wp_enqueue_script('contact_js', get_template_directory_uri() . '/js/contact.js', array('jquery'), honesto_v('/js/contact.js'), true);
  } else {
    // Else
  }
}
// Editor en páginas: se oculta solo en las páginas que tienen su propia plantilla y no
// muestran ese contenido en el sitio. En las demás (legales y páginas nuevas) sí aparece,
// porque su texto sale del editor.
function honesto_paginas_sin_editor() {
  return array('inicio', 'work', 'about', 'contact', 'shop');
}
function honesto_ocultar_editor_en_paginas() {
  $post = isset($_GET['post']) ? get_post((int) $_GET['post']) : null;
  if ($post && $post->post_type === 'page' && in_array($post->post_name, honesto_paginas_sin_editor(), true)) {
    remove_post_type_support('page', 'editor');
  }
}
// Line Break Shortcode
function line_break_shortcode() {
  return '<br />';
}
// Register New Menu
function wpb_custom_new_menu() {
  register_nav_menus(
    array(
      'header-menu' => __( 'header' ),
      'header-menu-out' => __( 'header-out' )
    )
  );
}

// Calls 
// add_theme_support( 'post-thumbnails' );
add_filter( 'use_block_editor_for_post', '__return_false', 10 );
add_filter('acf/settings/remove_wp_meta_box', '__return_false');
add_action('acf/init', 'acf_wysiwyg_add_wpautop');
add_action ('wp_enqueue_scripts','areaStyle');
add_action('wp_enqueue_scripts','areaScripts');
add_action('load-post.php', 'honesto_ocultar_editor_en_paginas');
add_shortcode( 'br', 'line_break_shortcode' );
add_action( 'init', 'wpb_custom_new_menu' );

// Nav: data-text en los links del menú para reservar el ancho del bold (evita saltos en hover/active)
function honesto_nav_link_data_text($atts, $item, $args) {
  if (in_array($args->theme_location, array('header-menu', 'header-menu-out'), true)) {
    $atts['data-text'] = wp_strip_all_tags($item->title);
  }
  return $atts;
}
add_filter('nav_menu_link_attributes', 'honesto_nav_link_data_text', 10, 3);

// CF7: agrega una opción "Select" deshabilitada y seleccionada por default a cada select
function honesto_cf7_select_placeholder($html) {
  return preg_replace(
    '/(<select\b[^>]*>)/i',
    '$1<option value="" disabled selected>Select</option>',
    $html
  );
}
add_filter('wpcf7_form_elements', 'honesto_cf7_select_placeholder');

?>
