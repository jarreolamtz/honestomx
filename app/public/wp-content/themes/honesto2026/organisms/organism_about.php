<?php
$args = array(
  'pagename' => 'about',
);
$wp_query = new WP_Query($args);
if ($wp_query->have_posts()) : while ($wp_query->have_posts()) :  $wp_query->the_post();
  // INICIO
  $titulo = get_field('titulo');
  $descripcion = get_field('descripcion');
  $servicio_1 = get_field('servicio_1');
  $servicio_1_titulo = isset($servicio_1['titulo']) ? $servicio_1['titulo'] : '';
  $servicio_1_servicios = $servicio_1['servicios'];
  $servicio_2 = get_field('servicio_2');
  $servicio_2_titulo = isset($servicio_2['titulo']) ? $servicio_2['titulo'] : '';
  $servicio_2_servicios = $servicio_2['servicios'];
  $servicio_3 = get_field('servicio_3');
  $servicio_3_titulo = isset($servicio_3['titulo']) ? $servicio_3['titulo'] : '';
  $servicio_3_servicios = $servicio_3['servicios'];
  $servicio_4 = get_field('servicio_4');
  $servicio_4_titulo = isset($servicio_4['titulo']) ? $servicio_4['titulo'] : '';
  $servicio_4_servicios = $servicio_4['servicios'];
  $decoracion = get_field('decoracion');
  $decoracion_mobile = get_field('decoracion');
?>
  <!-- WELCOME -->
  <div id="section-welcome" class="container-fluid d-flex flex-column gap-5">
    <div class="row">
      <div class="col-md-12 d-grid">
        <?php if (!empty($titulo)): ?>
          <p class="titulo text-heading color-pink">
            <?php echo $titulo; ?>
          </p>
        <?php endif; ?>
        <?php if (!empty($descripcion)): ?>
          <div class="descripcion text-description">
            <!-- Decoracion (Mobile) -->
            <?php if (pathinfo($decoracion, PATHINFO_EXTENSION) === 'svg'): ?>
              <span class="decoracion-mobile">
                <?php echo file_get_contents($decoracion_mobile); ?>
              </span>
            <?php else: ?>
              <img src="<?php echo esc_url($decoracion_mobile); ?>" class="decoracion-mobile" alt="Decoración">
            <?php endif; ?>
            <?php echo $descripcion; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="row position-relative tax">
      <div class="col-md-12">
        <h2 class="titulo_services">Services</h2>
        <div class="taxonomias-area d-flex flex-row gap-3">
          <?php
          // Array of servicios
          $servicios = [
            ['titulo' => $servicio_1_titulo, 'servicios' => $servicio_1_servicios],
            ['titulo' => $servicio_2_titulo, 'servicios' => $servicio_2_servicios],
            ['titulo' => $servicio_3_titulo, 'servicios' => $servicio_3_servicios],
            ['titulo' => $servicio_4_titulo, 'servicios' => $servicio_4_servicios],
          ];
          foreach ($servicios as $servicio) :
            if (!empty($servicio['titulo'])):
          ?>
            <div class="taxonomia">
              <h3 class="titulo_taxonomia p-0 m-0"><?php echo $servicio['titulo']; ?></h3>
              <?php if (!empty($servicio['servicios'])): ?>
                <ul class="taxonomias d-flex flex-column gap-0 m-0 p-0 mt-2">
                  <?php foreach ($servicio['servicios'] as $servicio_id): ?>
                    <?php
                    $term = get_term($servicio_id);
                    if ($term && !is_wp_error($term)):
                    ?>
                      <li><?php echo esc_html($term->name); ?></li>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>
          <?php endif; endforeach; ?>
        </div>
      </div>
      <!-- Decoracion (Desktop) -->
      <div class="decoracion-desktop">
        <?php if (pathinfo($decoracion, PATHINFO_EXTENSION) === 'svg'): ?>
          <?php echo file_get_contents($decoracion); ?>
        <?php else: ?>
          <img src="<?php echo esc_url($decoracion); ?>"  width="<?php echo esc_attr(getimagesize($decoracion)[0]); ?>" height="<?php echo esc_attr(getimagesize($decoracion)[1]); ?>" alt="Decoración">
        <?php endif; ?>
      </div>
    </div>
  </div>

<?php endwhile; endif; wp_reset_postdata(); wp_reset_query(); ?>