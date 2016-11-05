<?php get_header(); ?>
<main class="container">
  <?php if(is_active_sidebar('home-featured')) : ?>
    <div class="row">
      <div class="col-sm-12 home-featured">
        <?php dynamic_sidebar('home-featured') ?>
      </div>
    </div>
  <?php endif; ?>
  
  <div class="row">
    <div class="col-md-9">
      <?php 
      if(is_active_sidebar('home-main')) : 
        dynamic_sidebar('home-main'); 
      endif; ?>
    </div>
      
      <div class="col-md-3">
        <?php 
        if(is_active_sidebar('primary')) : 
          dynamic_sidebar('primary'); 
        endif; ?>
      </div>
  </div>
  
</main>
<?php get_footer(); ?>
