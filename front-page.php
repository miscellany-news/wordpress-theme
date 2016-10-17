<?php get_header(); ?>
<main class="container">
  <div class="row">
    <div class="col-lg-9">
      <div class="row">
        <div class="col-md-5 col-lg-4 front-left">
          <?php if ( is_active_sidebar( 'home-left-1' ) ) : ?>
            <?php dynamic_sidebar( 'home-left-1' ); ?>
          <?php else : ?>
            You need to add widgets to the left column
          <?php endif; ?>
        </div>
        <div class="col-md-7 col-lg-5 front-middle">
          <?php if ( is_active_sidebar( 'home-middle-1' ) ) : ?>
            <?php dynamic_sidebar( 'home-middle-1' ); ?>
          <?php else : ?>
            You need to add widgets to the middle column
          <?php endif; ?>
        </div>
      </div>
      
      <?php if(is_active_sidebar('home-left-2') && is_active_sidebar('home-middle-2')) : ?>
      <div class="row">
        <div class="col-md-5 col-lg-4 front-left">
          <?php if ( is_active_sidebar( 'home-left-2' ) ) : ?>
            <?php dynamic_sidebar( 'home-left-2' ); ?>
          <?php else : ?>
            You need to add widgets to the left column
          <?php endif; ?>
        </div>
        <div class="col-md-7 col-lg-5 front-middle">
          <?php if ( is_active_sidebar( 'home-middle-2' ) ) : ?>
            <?php dynamic_sidebar( 'home-middle-2' ); ?>
          <?php else : ?>
            You need to add widgets to the middle column
          <?php endif; ?>
        </div>
      </div>
      <?php endif; ?>
      
    </div>
    <div class="col-lg-3 front-right">
      <?php if ( is_active_sidebar( 'home-right' ) ) : ?>
        <?php dynamic_sidebar( 'home-right' ); ?>
      <?php else : ?>
        You need to add widgets to the right column
      <?php endif; ?>
    </div>
		
  </div>
</main>
<?php get_footer(); ?>
