<?php
    $args = array (
      'post_type' => 'work',
      'posts_per_page' => 1,
      'p' => get_the_ID()
    );
    $wp_query = new WP_Query( $args );
    if ( $wp_query -> have_posts() ) : while ( $wp_query -> have_posts() ) :  $wp_query -> the_post();
    // VARIABLES ---------
    
    // INICIO
    $portada_proyecto_imagen = get_field('portada_proyecto_imagen');
    $portada_proyecto_video = get_field('portada_proyecto_video');
    $proyecto_titulo = get_field('proyecto_titulo');
    $proyecto_contenido = get_field('proyecto_contenido');

    // PROYECTO ACF
    $acmf_titulo = get_field('titulo');
    $acmf_descripcion = get_field('descripcion');
    $acmf_descripcion_corta = get_field('descripcion_corta');
    $acmf_cliente = get_field('cliente');
    $acmf_servicios = get_field('servicios');
    if (is_array($acmf_servicios)) {
      $acmf_servicios = implode(', ', array_map('get_cat_name', $acmf_servicios));
    }
    $acmf_industria = get_field('industria');

?>
  <!-- 1 SECTION : PORTADA -->
  <section id="section-portada">
    <!-- IF video else imagen -->
    <?php if(!empty($portada_proyecto_video)):?>
      <video class="background" autoplay muted loop>
        <source src="<?php echo esc_url($portada_proyecto_video); ?>" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    <?php elseif(!empty($portada_proyecto_imagen)):?>
      <img class="background" src="<?php echo esc_url($portada_proyecto_imagen); ?>" alt="<?php the_title(); ?>">
    <?php else: ?>
      <div class="background" style="background-color: #F5F5F5;"></div>
    <?php endif; ?>
  </section>
  <!-- 2 SECTION : INFO -->
  <section id="section-info" class="container-fluid">
    <div class="row">
      <div class="col-sm-5">
        <?php if(!empty($acmf_titulo)):?>
          <p class="titulo"><?php echo $acmf_titulo; ?></p>
        <?php endif; ?>
      </div>
      <div class="col-sm-7">
        <?php if(!empty($acmf_descripcion)):?>
          <div class="descripcion"><?php echo $acmf_descripcion; ?></div>
        <?php endif; ?>
      </div>
    </div>
    <div class="row">
      <div class="col-12 d-flex flex-column gap-3 detalles">
        <?php if(!empty($acmf_cliente)):?>
          <p class="cliente">Client:<br><span class="text-serif-small"><?php echo $acmf_cliente; ?></span></p>
        <?php endif; ?>
        <?php if(!empty($acmf_servicios)):?>
          <p class="servicios">Services:<br><span class="text-serif-small"><?php echo $acmf_servicios; ?></span></p>
        <?php endif; ?>
        <?php if(!empty($acmf_industria)):?>
          <p class="industria">Industry:<br><span class="text-serif-small"><?php echo $acmf_industria; ?></span></p>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <!-- 3 SECTION : MEDIA -->
  <div id="section-media"class="container-fluid">
    <div class="row">
      <div class="col-md-12 text-center d-flex flex-column">
        <?php the_content(); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-12 d-sm-none justify-content-center align-items-center">
      <a class="contacto-btn" href="<?php echo esc_url( get_site_url() . '/contact' ); ?>">Let’s get to work.</a>
    </div>  
  </div>
  <!-- 4 CONTROLES -->
  <div id="controls" class="container-fluid mt-5">
    <div class="row w-100">
      <?php
        $prev_post = get_previous_post();
        $next_post = get_next_post();
      ?>
      <div class="col-6 col-sm-4 d-flex justify-content-start align-items-center">
        <?php if ( !empty($prev_post) ): ?>
          <a class="btn-prev d-flex align-items-center gap-2" href="<?php echo get_permalink($prev_post->ID); ?>">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M21.9166 11.9999H2.08325M2.08325 11.9999L11.9999 21.9166M2.08325 11.9999L11.9999 2.08325" stroke="#1E1E1E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Prev Project
          </a>
        <?php endif; ?>
      </div>
      <div class="col-4 d-none d-sm-flex justify-content-center align-items-center">
        <a class="contacto-btn" href="<?php echo esc_url( get_site_url() . '/contact' ); ?>">Let’s get to work.</a>
      </div>
      <div class="col-6 col-sm-4 d-flex justify-content-end align-items-center">
        <?php if ( !empty($next_post) ): ?>
          <a class="btn-next d-flex align-items-center gap-2" href="<?php echo get_permalink($next_post->ID); ?>">
            Next Project
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M2.08317 12.0001L21.9165 12.0001M21.9165 12.0001L11.9998 2.08341M21.9165 12.0001L11.9998 21.9167" stroke="#1E1E1E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>

<?php endwhile; endif; wp_reset_postdata(); wp_reset_query(); ?>