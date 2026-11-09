<?php
  
/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);
//Remove WPAUTOP from ACF TinyMCE Editor
function acf_wysiwyg_add_wpautop() {
    add_filter('acf_the_content', 'wpautop' );
}

// Load CSS
function areaStyle() {
  wp_enqueue_style('bootstrap',get_template_directory_uri() . '/css/framework/bootstrap.min.css');
  wp_enqueue_style('bootstrap',get_template_directory_uri() . '/css/types/fontawesome-free-5.14.0-web/css/fontawesome.css');
  wp_enqueue_style('global_css',get_template_directory_uri() . '/css/global.css');
  // HEADER
  wp_enqueue_style('header_css',get_template_directory_uri() . '/css/header.css');
  // BODY
  if(is_front_page()){
    wp_enqueue_style('index_css',get_template_directory_uri() . '/css/sections/welcome.css');
    // Splide.min.css
    wp_enqueue_style('splide_css','https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css');
    // Lottie Files
    wp_enqueue_style('lottie_css',get_template_directory_uri() . '/css/sections/organism_lottie.css');
    if( date("Y-m-d", strtotime("now"))."\n" <= date("Y-m-d", strtotime('28-8-3'))."\n" ) { 
      wp_enqueue_style('event_css',get_template_directory_uri() . '/css/sections/organism_event.css');
    }
  } else if(is_page('inicio')){
    wp_enqueue_style('index_css',get_template_directory_uri() . '/css/sections/welcome.css');
  } else if(is_page('work')) {
    wp_enqueue_style('index_css',get_template_directory_uri() . '/css/sections/proyectos.css');
    wp_enqueue_style('splide_css','https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css');
  } else if(is_singular('work')) {
    wp_enqueue_style('index_css',get_template_directory_uri() . '/css/sections/proyecto.css');
  } else if(is_page('about')) {
    wp_enqueue_style('index_css',get_template_directory_uri() . '/css/sections/about.css');
  } else if(is_page('contact')) {
    wp_enqueue_style('index_css',get_template_directory_uri() . '/css/sections/contact.css');
    wp_enqueue_style('doodle_css',get_template_directory_uri() . '/css/doodle/doodle.css');
  } else {
    wp_enqueue_style('404',get_template_directory_uri() . '/css/sections/404.css');
  }
  // FOOTER
  wp_enqueue_style('footer_css',get_template_directory_uri() . '/css/footer.css');
}
// Load Scripts
function areaScripts() {
  if ( !is_admin() ) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js', '3.7.1', false);
    wp_enqueue_script('jquery');
  }
  wp_enqueue_script('global_js',get_template_directory_uri() . '/js/global.js', array('jquery'), '', true);
  if(is_front_page()){
    wp_enqueue_script('splide_js','https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', array('jquery'), '', true);
    wp_enqueue_script('lottie_js','https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.7.4/lottie.min.js', array('jquery'), '', true);
    wp_enqueue_script('tweenmax_js','https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js', '', true);
  } else if(is_page('work')) {
    wp_enqueue_script('splide_js','https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', array('jquery'), '', true);
  } else if(is_page('contact')) {
    wp_enqueue_script('contact_js', get_template_directory_uri() . '/js/contact.js', array('jquery'), '', true);
  } else {
    // Else
  }
}
// Eliminar Textarea de Pages
function remove_textarea() {
  // remove_post_type_support( 'post', 'editor' );
  remove_post_type_support( 'page', 'editor' );
  wp_enqueue_script('global_js',get_template_directory_uri() . '/js/customPages.js', array('jquery'), '', true);
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
add_action('admin_init', 'remove_textarea');
add_shortcode( 'br', 'line_break_shortcode' );
add_action( 'init', 'wpb_custom_new_menu' );

?>