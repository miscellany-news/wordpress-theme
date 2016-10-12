		<div class="post-meta">
			<p>By 
				<?php
				if ( function_exists( 'coauthors_posts_links' ) ) {
					coauthors_posts_links();
				} else {
					the_author_link();
				}?>
			</p>
			<p><time datetime="<?php the_date('Y-m-d');?>"><?php the_time('F j, Y');?></time></p>
		</div>