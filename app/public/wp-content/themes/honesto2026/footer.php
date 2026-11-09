<?php
  $decoracionFlor = get_template_directory() . '/img/doodles/decoracion_flor.svg';
?>
<footer class="container-fluid text-body-med fixed-bottom">
  <?php if(!wp_is_mobile()):?>
    <div class="row w-100">
      <div class="col-md-6">
        <p>© HNST 2025      (  <a href="">Privacy Policies</a> / <a href="">Terms & Conditions</a>  )</p>
      </div>
      <div class="col-md-6">
        <div class="row">
          <div class="col-12 justify-content-end d-flex">
            <a class="color-pink" href="https://www.linkedin.com/company/honesto-cc/" target="_blank">LinkedIn</a>
            <a class="color-pink" href="https://www.instagram.com/honesto.cc/" target="_blank">Instagram</a>
          </div>
        </div>
        <div class="row">
          <div class="col-12 justify-content-end d-flex">
            <a class="color-pink" href="mailto:hi@honestocreative.com">hi@honestocreative.com</a>
            <a class="color-pink" href="https://www.behance.net/honesto/" target="_blank">Behance</a>
          </div>
        </div>
      </div>
    </div>
  <?php else: ?>
    <div class="row">
      <div class="col-5">
        <span>© HNST 2025</span>
        <br>
        <!-- <a href="/privacy-policy">Privacy Policies</a> -->
      </div>
      <div class="col-7 text-right d-flex flex-column">
        <div class="d-flex flex-row gap-2">
          <a class="color-black" href="/contact">lets talk!</a>
          <span class="color-black">•</span>
          <a class="color-black" href="https://www.linkedin.com/company/honesto-cc/" target="_blank">Li</a>
          <a class="color-black" href="https://www.instagram.com/honesto.cc/" target="_blank">Ig</a>
          <a class="color-black" href="https://www.behance.net/honesto" target="_blank">Be</a>
        </div>
        <!-- <a class="color-black" href="/terms-conditions">Terms & Conditions</a> -->
      </div>
    </div>
  <?php endif; ?>
  <!-- Decoracion flor -->
  <?php if(!wp_is_mobile()): ?>
    <?php if( is_page('work') ): ?>
      <div class="decoracion_flor">
        <?php echo file_get_contents($decoracionFlor); ?>
      </div>
    <?php endif; ?>
  <?php else: ?>
    <div class="decoracion_flor">
      <?php echo file_get_contents($decoracionFlor); ?>
    </div>
  <?php endif; ?>
</footer>
</div>
</div>


<!-- Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-dateFormat/1.0/jquery.dateFormat.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.js">

</script>
  <!-- Mouse -->
  <!-- <script src="js/plugins/assets.js"></script>
  <script src="js/plugins/cursor.js"></script> -->
  <!-- Regular -->
  <?php wp_footer();?>


  <!-- Loader -->
  <script>
  setTimeout(function(){
  $(document).scrollTop(0);
  }, 300);
  setTimeout(function(){
  $(document).scrollTop(0);
  $(".loader").fadeOut(400);
  }, 1000);
</script>
</body>
</html>
