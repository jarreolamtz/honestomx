<?php get_header(); ?>
  <!-- 404 -->
  <section id="section-404" class="container-fluid">
    <div class="row">
      <div class="col-12 d-flex flex-column align-items-center justify-content-center text-center">
        <h1 class="titulo_404 color-pink">404</h1>
        <p class="texto_404">Oops, this page doesn't exist.</p>
        <a class="btn_404" href="<?php echo esc_url(home_url('/')); ?>">Back to home</a>
      </div>
    </div>
  </section>
</div>
</div>
<?php get_footer(); ?>
