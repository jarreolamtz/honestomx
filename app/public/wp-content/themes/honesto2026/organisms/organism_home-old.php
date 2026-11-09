<?php
    $args = array (
        'pagename' => 'inicio',
    );
    $wp_query = new WP_Query( $args );
    if ( $wp_query -> have_posts() ) : while ( $wp_query -> have_posts() ) :  $wp_query -> the_post();
    // VARIABLES ---------
    
    // INICIO
    $inicio_bienvenida_background = get_field('inicio_bienvenida_background');
    $inicio_bienvenida_contenido = get_field('inicio_bienvenida_contenido');
    // ABOUT
    $inicio_about_background = get_field('inicio_about_background');
    $inicio_about_descripcion = get_field('inicio_about_descripcion');
    $inicio_about_descripcion_mobile = get_field('inicio_about_descripcion_mobile');
    $inicio_about_lista_areas = get_field('inicio_about_lista_areas');
    $inicio_about_lista_areas_hover = get_field('inicio_about_lista_areas_hover');
    // SERVICES
    $inicio_work_background = get_field('inicio_work_background');
    $inicio_work_contenido = get_field('inicio_work_contenido');
    $inicio_work_contenido_mobile = get_field('inicio_work_contenido_mobile');
    $inicio_work_pdf = get_field('inicio_work_pdf');
    // GET IN TOUCH
    $inicio_getintouch_background = get_field('inicio_getintouch_background');
    $inicio_getintouch_titulo = get_field('inicio_getintouch_titulo');
    $inicio_getintouch_form = get_field('inicio_getintouch_form');

?>
  <!-- WELCOME -->
  <div id="section-welcome"class="container-fluid fill-gray">
    <?php if(!empty($inicio_bienvenida_background['imagen_1'])):?>
      <img class="back_01" src="<?php echo $inicio_bienvenida_background['imagen_1']; ?>" alt="">
    <?php endif; ?>
    <?php if(!empty($inicio_bienvenida_background['imagen_2'])):?>
      <img class="back_02" src="<?php echo $inicio_bienvenida_background['imagen_2']; ?>" alt="">
    <?php endif; ?>
    <div class="row center-y">
      <div class="col-md-12 text-center">
        <?php if(!empty($inicio_bienvenida_contenido['titulo_1'])):?>
          <p class="text-heading"><?php echo $inicio_bienvenida_contenido['titulo_1']; ?></p>
        <?php endif; ?>
        <?php if(!empty($inicio_bienvenida_contenido['imagen'])):?>
          <img class="logo-big" src="<?php echo $inicio_bienvenida_contenido['imagen']; ?>" alt="Honesto Logo">
        <?php endif; ?>
        <?php if(!empty($inicio_bienvenida_contenido['titulo_2'])):?>
          <p class="text-heading"><?php echo $inicio_bienvenida_contenido['titulo_2']; ?></p>
        <?php endif; ?>
        <?php if(!empty($inicio_bienvenida_contenido['titulo_3'])):?>
          <p class="text-serif-small"><?php echo $inicio_bienvenida_contenido['titulo_3']; ?></p>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <!-- ABOUT -->
  <div id="about" class="container-fluid fill-pink">
    <div class="row">
      <div class="col-md-12 text-heading-bold color-white">
        <?php if(!wp_is_mobile()):?>
          <?php echo $inicio_about_descripcion; ?>
          <!-- <p class="text-heading-bold color-white">
            We’re a team of creatives<span class="text-heading-min italic hover-trigger">(1)</span>
            who really, really, <span class="text-heading-serif">really love stories</span>
            and finding the best way to tell them through our skills.
          </p> -->
        <?php else: ?>
          <?php echo $inicio_about_descripcion_mobile; ?>
          <!-- <p class="text-heading-bold color-white">
            Our collective is <span class="text-heading-serif">made up of storytellers </span>
            who love branding and communication design.
          </p> -->
        <?php endif; ?>
      </div>
    </div>
    <?php if(!wp_is_mobile()): ?>
      <div class="row">
        <div class="offset-6 col-md-3">
          <ul>
            <!-- List: 1 -->
            <?php if(!empty($inicio_about_lista_areas['area_1'])):?>
              <li class="color-white"><?php echo $inicio_about_lista_areas['area_1']; ?></li>
            <?php endif; ?>
            <!-- List: 2 -->
            <?php if(!empty($inicio_about_lista_areas['area_2'])):?>
              <li class="color-white"><?php echo $inicio_about_lista_areas['area_2']; ?></li>
            <?php endif; ?>
            <!-- List: 3 -->
            <?php if(!empty($inicio_about_lista_areas['area_3'])):?>
              <li class="color-white"><?php echo $inicio_about_lista_areas['area_3']; ?></li>
            <?php endif; ?>
            <!-- List: 4 -->
            <?php if(!empty($inicio_about_lista_areas['area_4'])):?>
              <li class="color-white"><?php echo $inicio_about_lista_areas['area_4']; ?></li>
            <?php endif; ?>
          </ul>
        </div>
        <div class="col-md-3">
          <ul>
            <!-- List: 5 -->
            <?php if(!empty($inicio_about_lista_areas['area_5'])):?>
              <li class="color-white"><?php echo $inicio_about_lista_areas['area_5']; ?></li>
            <?php endif; ?>
            <!-- List: 6 -->
            <?php if(!empty($inicio_about_lista_areas['area_6'])):?>
              <li class="color-white"><?php echo $inicio_about_lista_areas['area_6']; ?></li>
            <?php endif; ?>
            <!-- List: 7 -->
            <?php if(!empty($inicio_about_lista_areas['area_7'])):?>
              <li class="color-white"><?php echo $inicio_about_lista_areas['area_7']; ?></li>
            <?php endif; ?>
            <!-- List: 8 -->
            <?php if(!empty($inicio_about_lista_areas['area_8'])):?>
              <li class="color-white"><?php echo $inicio_about_lista_areas['area_8']; ?></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    <?php endif;?>
    <img class="back_03" src="<?php echo get_template_directory_uri() ?>/img/delete/HNST_05_comunicacion.png" alt="">
  </div>
  <!-- SERVICES -->
  <div id="work" class="container-fluid <?php echo $inicio_work_background['color']; ?>">
    <div class="row center-y <?php if(wp_is_mobile()):?>mx-auto<?php endif; ?>">
      <div class="col-12 col-md-7">
      <?php if(!wp_is_mobile()):?>
        <div class="text-heading-reg color-white">
          <?php echo $inicio_work_contenido; ?>
        </div>
      <?php else: ?>
        <div class="text-heading-min color-white">
          <?php echo $inicio_work_contenido_mobile['titulo_1']; ?>
        </div>
      <?php endif; ?>
      </div>
      <div class="offset-md-2 col-md-2">
        <?php if(!wp_is_mobile()):?>
          <p class="color-white pdf"><?php echo $inicio_work_pdf['desktop_titulo'] ;?></p>
        <?php endif; ?>
        <div class="links color-white">
          <a href="<?php echo $inicio_work_pdf['link_1'] ;?>" target="_blank" class="color-pink">English</a> / <a href="<?php echo $inicio_work_pdf['link_2'] ;?>" target="_blank" class="color-pink">Español</a>
        </div>
        <?php if(!wp_is_mobile()):?>
        <?php else: ?>
          <p class="color-white text-body-min"><?php echo $inicio_work_pdf['mobile_titulo'] ;?></p>
          <div class="text-heading-min color-white visit-our">
            <?php echo $inicio_work_contenido_mobile['titulo_2']; ?>
          </div>
        <?php endif; ?>

      </div>
    </div>
    <img class="back_04" src="<?php echo $inicio_work_background['imagen']; ?>" alt="">
  </div>
  <!-- GET IN TOUCH -->
  <div id="get_in_touch" class="container-fluid <?php echo $inicio_getintouch_background['color'] ?>">
    <div class="row">
      <div class="col-12">
        <div class="text-display color-white text-center">
          <?php echo $inicio_getintouch_titulo;?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5">
        <p class="text-body-min color-white"><?php echo $inicio_getintouch_form["titulo"]; ?></p>
        <?php echo do_shortcode('<?php echo $inicio_getintouch_form["shortcode"]; ?>');?>
        <?php echo do_shortcode('[contact-form-7 id="11" title="Formulario de contacto 1"]');?>
      </div>
    </div>
    <img class="back_05" src="<?php echo $inicio_getintouch_background['imagen'] ?>" alt="">
  </div>

  <?php if(!empty($inicio_about_lista_areas_hover)):?>
    <div class="hover-box">
      <div class="close color-white text-subheading transition">✕</div>
      <div class="about-hover center-xy text-heading-min-min color-white text-center text-uppercase">
        <?php echo $inicio_about_lista_areas_hover; ?>
      </div>
    </div>
  <?php endif; ?>
<?php endwhile; endif; wp_reset_postdata(); wp_reset_query(); ?>