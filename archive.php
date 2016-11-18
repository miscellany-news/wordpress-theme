<?php

get_header(); ?>

<div class="container container-top">
<div class="row">
  <main class="column medium-8 archive">
		<?php if ( have_posts() ) : ?>

			<header class="archive-header">
				<?php
					the_archive_title('<h1>','</h1>');
					the_archive_description('<p>','</p>');
				?>
			</header>

			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', get_post_format() );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination();

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

</main>
<div class="column medium-4">
<?php get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>
