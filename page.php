<?php
/**
 *  The template for displaying all pages.
 * 
 * 
 */

get_header(); ?>
<?php wpf_dev( 'page.php' ); ?>
	<section id='primary' class="content-area">
	
		<!-- Row for main content area -->
		<div id="content" class="site-content" role="main">
		
			<?php /* Start loop */ ?>
			<?php while ( have_posts() ): the_post(); ?>
				<article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wpf_link_pages(); ?>
					</div><!-- .entry-content -->

					<?php if ( has_tag() ) : ?>	
						<footer class="entry-meta">
							<div class="post-tags">
								<?php the_tags( '<span class="post-tag">', '</span> <span class="post-tag">', '</span>' ); ?>
							</div><!--post-tags -->
						</footer><!-- .entry-meta -->
					<?php endif; ?>
				</article><!-- #post -->
	
				<?php comments_template(); ?>
			<?php endwhile; ?>
	
		</div><!-- #content -->
		<?php $GLOBALS['class_searchform'] = 'show-for-medium-down'; ?>
		<?php get_sidebar(); ?>
	</section><!-- #primary -->	
<?php wpf_dev( 'end page.php' ); ?>
<?php get_footer(); ?>