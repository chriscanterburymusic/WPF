<?php
/**************************************************************************
 *    >MISC
 **************************************************************************/


/**
 * Print developer comments
 *
 * This function will only print the developers helping comments when
 * WPF_DEV_MODE is equal to true. The comment will get contained within
 * <!-- and -->.
 *
 * @param    string        $report    The comment that will be printed.
 * @param    bool          $echo      Print $report.
 * @return   string/bool              Returns the variable $report. Default: false
 */
if ( ! function_exists( 'wpf_dev' ) ) {
	function wpf_dev( $report = false, $echo = true ) {
		if ( defined( 'WPF_DEV_MODE' ) && WPF_DEV_MODE ) {
			$report = '<!-- ' . $report . ' -->' . "\n";
			if ( $echo ) echo $report;
		}
		return $report;
	} // end wpf_dev()
}

/**
 * Prints the entry meta for posts.
 *
 *
 */
if ( ! function_exists( 'wpf_entry_meta' ) ) {
	function wpf_entry_meta() {
		// Post sticky
		if ( is_sticky() && is_home() && ! is_paged() )
			echo '<span class="featured-post">' . __( 'Sticky', 'wpf' ) . '</span>';

		// Post date
		printf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
			esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ),
			esc_attr( sprintf( __( 'Permalink to the month archive for %s', 'wpf' ), get_the_date( 'F' ) ) ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		// Post author
		if ( 'post' == get_post_type() ) {
			printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'wpf' ), get_the_author() ) ),
				get_the_author()
			);
		}
	} // end wpf_entry_meta()
}

/**
 * This will alternate the .site-subtitle of the page
 *
 *
 */
if ( ! function_exists( 'wpf_site_subtitle' ) ) {
	function wpf_site_subtitle() {
		switch ( true ) {
			case is_day():
				printf( __( 'Daily Archives: %s', 'wpf' ), get_the_date() );
				break;
			case is_month():
				printf( __( 'Monthly Archives: %s', 'wpf' ), get_the_date( _x( 'F Y' , 'monthly archives date format', 'wpf' ) ) );
				break;
			case is_year():
				printf( __( 'Yearly Archives: %s', 'wpf' ), get_the_date( _x( 'Y', 'yearly archives date format', 'wpf' ) ) );
				break;
			case is_category():
				single_cat_title();
				break;
			case is_search():
				// Get the search query
				$search_query = get_search_query();

				// If the search query is longer then 100 char's then get the first 100
				// char's and add '...' to the end.
				if ( strlen( $search_query ) > 100 ) {
					$search_query = substr( $search_query, 0, 100 ) . '...';
				}
				printf( __( 'The search results for "%s"', 'wpf' ), $search_query );
				break;
			case is_author():
				$author = get_userdata( get_query_var( 'author' ) );
				printf( __( 'Author\'s archive: %s', 'wpf' ), $author->display_name );
				break;
			case is_archive():
				_e( 'Archives', 'wpf' );
				break;
			default:
				echo bloginfo( 'description' );
		}
	} // end wpf_site_subtitle()
}

/**
 * This function takes care of post thumbnails
 *
 * It will post the thumbnail when available and will make the thumbnail
 * clickable (permalink to post). Also it will only show the thumbnail on the
 * first page of the post.
 */
if ( ! function_exists( 'wpf_post_thumbnail' ) ) {
	function wpf_post_thumbnail() {
		if ( has_post_thumbnail() && ! post_password_required() ) {

			$prefix = '<div class="entry-thumbnail">';
			$postfix = '</div>';

			if ( is_single() ) {
				global $page;
				if ( $page == 1 )
					echo $prefix . get_the_post_thumbnail() . $postfix;
			} else {
				echo $prefix;
				echo '<a href="' . get_permalink() . '" title="' . esc_attr( sprintf( __( 'Permalink to %s', 'wpf' ), the_title_attribute( 'echo=0' ) ) ). '" rel="bookmark">' . get_the_post_thumbnail() . '</a>';
				echo $postfix;
			}
		}
	} // end wpf_post_thumbnail()
}