<section id="section-welcome"class="container-fluid">
  <div class="row">
    <div class="col-md-12 text-center">
      <!-- Splide.js Carousel -->
      <div class="splide" aria-label="Welcome Images">
        <div class="splide__track">
          <ul class="splide__list">
            <!--Post type Proyectos-->
            <?php
            $args = array(
              'post_type' => 'work',
              'posts_per_page' => 20,
            );
            $proyectos = new WP_Query($args);
            if ($proyectos->have_posts()) :
              while ($proyectos->have_posts()) : $proyectos->the_post();

              $portada_imagen = get_field('portada_imagen');
              $portada_video = get_field('portada_video');
              $portada_cuadrada = get_field('slide_cuadrado');

            ?>
              <li class="splide__slide">
                <?php if (!empty($portada_imagen) OR !empty($portada_video)) : ?>
                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <!--PORTADAS-->
                    <?php if (empty($portada_video) AND !empty($portada_imagen)): ?>
                      <img class="background <?php if ($portada_cuadrada) echo 'cuadrada'; ?>" src="<?php echo esc_url($portada_imagen); ?>" alt="<?php the_title(); ?>">
                    <?php elseif (!empty($portada_video)): ?>
                      <video class="background" autoplay loop muted playsinline>
                        <source src="<?php echo esc_url($portada_video); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                      </video>
                    <?php endif; ?>
                    <!--INFO-->
                    <div class="info">
                      <h2><?php the_title(); ?></h2>
                      <p class="underline">Ver más</p>
                    </div>
                  </a>
                <?php endif; ?>
              </li>
            <?php
              endwhile;
            endif;
            wp_reset_postdata();
            ?>
          </ul>
        </div>
    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var splide = new Splide('.splide', {
      type   : 'loop',
      autoWidth: true,
      gap: '15px',
      pagination: false,
      breakpoints: {
        768: { destroy: true }
      }
    });
    splide.mount();
  });
</script>