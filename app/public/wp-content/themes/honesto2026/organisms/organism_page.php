<?php
// Template de página normal: título + contenido, para páginas sin organism propio
if (have_posts()) : while (have_posts()) : the_post(); ?>
  <section id="section-page" class="container-fluid">
    <div class="row">
      <div class="col-sm-8 offset-sm-2">
        <h1 class="page-title text-heading color-pink"><?php the_title(); ?></h1>
        <div class="page-content">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </section>
<?php endwhile; endif; ?>
