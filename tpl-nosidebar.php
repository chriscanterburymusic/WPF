<?php /* Template Name: No sidebar */
/**
 * The template for displaying pages without the sidebar.
 * 
 * 
 */

get_header(); ?>
<?php wpf_dev( 'tpl-nosidebar.php' ); ?>
	<section id='primary' class="content-area">

		<!-- Row for main content area -->
		<div id="content" class="site-content-fw" role="main">
		
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
	</section>
<?php wpf_dev( 'end tpl-nosidebar.php' ); ?>
<?php get_footer(); ?>