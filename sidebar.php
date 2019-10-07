<aside class="main-sidebar">

<?php if ( is_active_sidebar( 'above-opinions' ) ) : ?>
	<?php dynamic_sidebar( 'above-opinions' ); ?>
<?php else : ?>
	You have no widgets in your sidebar
<?php endif; ?>
	<section class="section-opinions">

	<?php
	$idObj = get_category_by_slug('opinions');
	$category_id = $idObj->term_id;
	$category_link = get_category_link( $category_id );
	?>
	<h2 class="section-title"><a href="<?php echo $category_link; ?>">Opinions</a></h2>
	<div class="grid">
		<?php
		$args = array('posts_per_page' => 3, 'offset' => 0, 'category_name' => 'opinions');
		$loop = new WP_Query( $args );
		while ($loop->have_posts()) : $loop->the_post();
			get_template_part('template-parts/side');
		endwhile; wp_reset_postdata();
		?>
	</div>
	</section>

<?php if ( is_active_sidebar( 'primary' ) ) : ?>
	<?php dynamic_sidebar( 'primary' ); ?>
<?php else : ?>
	You have no widgets in your sidebar
<?php endif; ?>

</aside>
