<?php
$args = array(
  'pagename' => 'contact',
);
$wp_query = new WP_Query($args);
if ($wp_query->have_posts()) : while ($wp_query->have_posts()) :  $wp_query->the_post();
  // INICIO
  $titulo = get_field('titulo');
  $form = get_field('form');
?>
  <!-- WELCOME -->
  <section id="welcome" class="container-fluid d-flex flex-column gap-5">
    <div class="row justify-content-center">
      <img class="doodle_mano" src="<?php echo get_template_directory_uri() . '/img/doodles/mano.svg'; ?>" alt="Mano">
      <div class="col-12 col-lg-10  doodle_sides position-relative ">
        <a class="doodle_corazon" href="#are_you_an_agency">
          <img src="<?php echo get_template_directory_uri() . '/img/doodles/corazon.svg'; ?>" alt="Corazon">
          <img class="corazon_hover" src="<?php echo get_template_directory_uri() . '/img/doodles/corazon_hover.svg'; ?>" alt="" aria-hidden="true">
        </a>
        <img class="doodle_vertical doodle_left" height="4713px" src="<?php echo get_template_directory_uri() . '/img/doodles/form_vertical.svg'; ?>" alt="Doodle Left">
        <div class="row justify-content-center">
          <img class="doodle_horizontal" src="<?php echo get_template_directory_uri() . '/img/doodles/form_horizontal.svg'; ?>" alt="Doodle Horizontal">
          <div class="col-10 col-sm-8 col-lg-7">
            <?php if (!empty($titulo)): ?>
              <h1 class="titulo text-heading text-bold bold color-pink">
                <?php echo $titulo; ?>
              </h1>
            <?php endif; ?>
            <div class="formulario doodle">
              <!-- form shortcode -->
              <?php echo do_shortcode($form); ?>
            </div>
          </div>
        </div>
        <img class="doodle_vertical doodle_right" height="4713px" src="<?php echo get_template_directory_uri() . '/img/doodles/form_vertical.svg'; ?>" alt="Doodle Right">
      </div>
    </div>
  </section>
  <!-- ARE YOU AN AGENCY -->
  <section id="are_you_an_agency" class="fill-pink">
    <div class="container-fluid center-y w-100">
      <div class="row justify-content-center">
        <div class="col-12 text-center py-8 text-uppercase ">
          <h2 class="text-display color-white">Are you an agency?</br>
            <strong>We'd love to co-create.</strong></br>
            contact us at
            <a class="color-white text-underline" href="mailto:hi@honestocreative.com">hi@honestocreative.com</a>
          </h2>
        </div>
      </div>
    </div>
  </section>
<?php endwhile; endif; wp_reset_postdata(); wp_reset_query(); ?>