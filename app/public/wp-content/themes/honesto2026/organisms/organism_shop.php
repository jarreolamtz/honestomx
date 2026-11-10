<section id="section-welcome" class="container" style="padding-bottom: 140px;">
  <div class="row">
        <!--Post type Proyectos-->
         <?php
            $args = array(
              'post_type' => 'shop',
              'posts_per_page' => 16,
            );
            $proyectos = new WP_Query($args);
            if ($proyectos->have_posts()) :
              while ($proyectos->have_posts()) : $proyectos->the_post();

              $portada_imagen = get_field('foto');
              $disponibilidad = get_field('Disponibilidad');
              $url = get_field('url');
              $label = get_field('label');

           ?>
           
           <<?php if ($disponibilidad == 'soldout'): ?>div<?php else: ?>a<?php endif; ?> target="_blank" href="<?php echo $url; ?>" class="col-sm-4 producto text-center">
            <div class="fotografia" style="position: relative;">
             <img class="background w-100" src="<?php echo esc_url($portada_imagen); ?>" alt="<?php the_title(); ?>" <?php if ($disponibilidad == 'soldout'): ?>style="opacity: .5;"<?php endif; ?>>
             <?php if ($disponibilidad == 'soldout'): ?>
              <p class="sold-out" style="font-size: 45px; position: absolute;color: #FF00D6;font-style: italic;top: 50%;left: 50%;transform: translate(-50%, -50%);">Sold out</p>
             <?php endif; ?>
            </div>
            <p class="label" <?php if ($disponibilidad == 'soldout'): ?>style="opacity: .5; font-size: 31px;"<?php else:?>style="font-size: 31px;"<?php endif; ?> ><?php echo $label; ?></p>
           </<?php if ($disponibilidad == 'soldout'):?>div<?php else: ?>a<?php endif;?>>
          <?php
             endwhile;
           endif;
           wp_reset_postdata();
          ?>
  </div>
</section>