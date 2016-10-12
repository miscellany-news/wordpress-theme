<?php if ( is_active_sidebar( 'primary' ) ) : ?>
	<?php dynamic_sidebar( 'primary' ); ?>
<?php else : ?>
	You have no widgets in your sidebar
<?php endif; ?>