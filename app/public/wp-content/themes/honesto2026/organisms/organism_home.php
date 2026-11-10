<?php
    $args = array (
        'pagename' => 'inicio',
    );
    $wp_query = new WP_Query( $args );
    if ( $wp_query -> have_posts() ) : while ( $wp_query -> have_posts() ) :  $wp_query -> the_post();
    // VARIABLES ---------
    $inicio_bienvenida_background = get_field('inicio_bienvenida_background');
    $inicio_bienvenida_contenido = get_field('inicio_bienvenida_contenido');
    $svg_crayon = get_field('crayon');
    $svg_coloreable = get_field('svg_coloreable');
    $color_1 = get_field('color_1');
    $color_2 = get_field('color_2');
    $color_3 = get_field('color_3');
    $color_4 = get_field('color_4');
    $color_5 = get_field('color_5');
    $color_6 = get_field('color_6');
?>
  <!-- WELCOME -->
  <section id="welcome" class="container-fluid" style="padding-block: 50px;">
    <!-- COLOR ME -->
     <div class="row justify-content-center">
      <div class="col-12 col-md-8 text-center text-md-end">
        <span class="color_me">Color me!</span>
      </div>
     </div>
    <div class="row justify-content-center">
      <div class="col-1 col-md-2 text-centered position-relative">
        <div class="color_picker text-center d-flex flex-column center-xy">
          <!-- CRAYON -->
          <div class="crayon">
            <?php echo file_get_contents( $svg_crayon ); ?>
          </div>
          <!-- COLORS -->
           <div class="colors center-xy">
             <input default hidden type="radio" id="color1" name="color" value="<?php echo $color_1;?>" checked>
             <label for="color1" class="color1" style="background-color: <?php echo $color_1;?>;"></label>
             <input hidden type="radio" id="color2" name="color" value="<?php echo $color_2;?>">
             <label for="color2" class="color2" style="background-color: <?php echo $color_2;?>;"></label>
             <input hidden type="radio" id="color3" name="color" value="<?php echo $color_3;?>">
             <label for="color3" class="color3" style="background-color: <?php echo $color_3;?>;"></label>
             <input hidden type="radio" id="color4" name="color" value="<?php echo $color_4;?>">
             <label for="color4" class="color4" style="background-color: <?php echo $color_4;?>;"></label>
             <input hidden type="radio" id="color5" name="color" value="<?php echo $color_5;?>">
             <label for="color5" class="color5" style="background-color: <?php echo $color_5;?>;"></label>
             <input hidden type="radio" id="color6" name="color" value="<?php echo $color_6;?>">
             <label for="color6" class="color6" style="background-color: <?php echo $color_6;?>;"></label>
           </div>
        </div>
      </div>
      <div class="col-10 col-md-8 text-center col-svg_coloreable">
        <div id="svg-coloreable">
          <?php echo file_get_contents( $svg_coloreable ); ?>
        </div>
      </div>
      <div class="street"></div>
    </div>
  </section>

  <?php if(!empty($inicio_about_lista_areas_hover)):?>
    <div class="hover-box">
      <div class="close color-white text-subheading transition">✕</div>
      <div class="about-hover center-xy text-heading-min-min color-white text-center text-uppercase">
        <?php echo $inicio_about_lista_areas_hover; ?>
      </div>
    </div>
  <?php endif; ?>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Color Picker
      const welcome = document.getElementById('welcome');
      const colorInputs = document.querySelectorAll('input[name="color"]');
      const svgElementPaths = document.querySelectorAll('#svg-coloreable svg #coloreable path');
      const crayon_pointer = document.querySelector('.crayon svg #selected_color');
      const borrador = document.querySelector('.crayon svg #borrador_completo') || document.querySelector('.crayon svg #borrador');
      let erasing = false;

      function setErasing(state) {
        erasing = state;
        welcome.classList.toggle('is-erasing', state);
      }
      // Regresa el path a su fill original (atributo del SVG)
      function restorePath(path) {
        path.style.fill = '';
      }

      crayon_pointer.style.fill = colorInputs[0].value;

      // Click: activa/desactiva el modo borrador
      borrador.addEventListener('click', function() {
        setErasing(!erasing);
      });
      // Doble click: borra todo
      borrador.addEventListener('dblclick', function() {
        svgElementPaths.forEach(restorePath);
        setErasing(false);
      });

      // Elegir un color (aunque sea el mismo) sale del modo borrador
      colorInputs.forEach(input => {
        input.addEventListener('click', function() {
          setErasing(false);
          crayon_pointer.style.fill = this.value;
        });
      });

      svgElementPaths.forEach(function(path) {
        path.addEventListener('click', function() {
          if (erasing) {
            restorePath(this);
            return;
          }
          const selectedColor = document.querySelector('input[name="color"]:checked').value;
          this.style.fill = selectedColor;
        });
      });
    });
  </script>
<?php endwhile; endif; wp_reset_postdata(); wp_reset_query(); ?>