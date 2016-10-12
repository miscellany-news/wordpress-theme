<?php get_header(); ?>
<main class="container">
	<div class="row">
		
		<div class="col-md-4">
			<?php if ( is_active_sidebar( 'home-left' ) ) : ?>
				<?php dynamic_sidebar( 'home-left' ); ?>
			<?php else : ?>
				You need to add widgets to the left column
			<?php endif; ?>
		</div>
		<div class="col-md-5">
			<?php if ( is_active_sidebar( 'home-middle' ) ) : ?>
				<?php dynamic_sidebar( 'home-middle' ); ?>
			<?php else : ?>
				You need to add widgets to the middle column
			<?php endif; ?>
		</div>
		<div class="col-md-3">
			<?php if ( is_active_sidebar( 'home-right' ) ) : ?>
				<?php dynamic_sidebar( 'home-right' ); ?>
			<?php else : ?>
				You need to add widgets to the right column
			<?php endif; ?>
		</div>
		
	</div>
</main>
<?php get_footer(); ?>
