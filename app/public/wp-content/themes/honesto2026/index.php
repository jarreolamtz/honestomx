<!-- GET HEAD.PHP -->
<?php get_header();?>
<?php
  // HOME
  if ( is_home() ):
    get_template_part('organisms/organism_home');
  elseif ( is_page('work') ):
    get_template_part('organisms/organism_proyectos');
  elseif ( is_page('about') ):
    get_template_part('organisms/organism_about');
  elseif ( is_singular('work') ):
    get_template_part('organisms/organism_proyecto');
  elseif ( is_page('contact') ):
    get_template_part('organisms/organism_contact');
  elseif ( is_page('terms-conditions') ):
    get_template_part('organisms/organism_legales');
  elseif ( is_page('privacy-policy') ):
    get_template_part('organisms/organism_legales');
  elseif (is_page('shop')):
    include 'organisms/organism_shop.php';
  elseif (is_singular('shop')):
    include 'organisms/organism_producto.php';
  else:
    get_template_part('404');
  endif;
?>
</div>
</div>
<!-- GET FOOTER.PHP -->
<?php get_footer(); ?>