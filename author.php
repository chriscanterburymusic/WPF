<?php
/**
 * The template for displaying Author archive pages.
 *
 *
 */

get_header(); ?>
<?php wpf_dev( 'author.php' ); ?>
	<section id='primary' class="content-area">
	
		<!-- Row for main content area -->
		<div id="content" class="site-content" role="main">
		
			<?php if ( have_posts() ) : ?>

				<?php the_post(); ?>
				<?php if ( get_the_author_meta( 'description' ) ) : ?>
					<?php get_template_part( 'author-bio' ); ?>
				<?php endif; ?>
				<?php rewind_posts(); ?>
				
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content/content', get_post_format() ); ?>
				<?php endwhile; ?>
			<?php else: ?>
				<?php get_template_part( 'content/content', 'none' ); ?>
			<?php endif; ?>

			<?php wpf_paginate_link(); ?>
	
		</div><!-- #content -->
		<?php $GLOBALS['class_searchform'] = 'show-for-medium-down'; ?>
		<?php get_sidebar(); ?>
	</section><!-- #primary -->
<?php wpf_dev( 'end author.php' ); ?>
<?php get_footer(); ?>