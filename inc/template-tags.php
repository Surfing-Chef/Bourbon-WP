<?php
/**
 * Custom template tags for this theme
 *
 * @package Bourbon-WP
 */

if ( ! function_exists( 'bourbon_wp_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function bourbon_wp_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )//,
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'bourbon-wp' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	echo '<span class="posted-on meta">Posted on ' . $icon_posted . $posted_on . '</span><span class="byline"> ' . '</span>'; // WPCS: XSS OK.

}

function bourbon_wp_posted_modified_on() {
	$icon_posted = '<i class="fa fa-clock-o" aria-hidden="true"></i>';
	$icon_modified = '<i class="fa fa-pencil" aria-hidden="true"></i>';

	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	echo '<span class="post-date-mods">';

	$posted_on = sprintf(
		esc_html_x( ' %s', 'post date', 'bourbon-wp' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'bourbon-wp' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $icon_posted . $posted_on . '</span>' ;

	// echo '<span class="posted-on">' . $posted_on . '<span class="byline"> ' . $byline . '</span></span>'; // WPCS: XSS OK.


	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string2 = '<time class="updated" datetime="%3$s">%4$s</time>';

		$time_string2 = sprintf( $time_string2,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$modified_on = sprintf(
			esc_html_x( ' %s', 'post date', 'bourbon-wp' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string2 . '</a>'
		);

		$byline = sprintf(
			esc_html_x( 'by %s', 'post author', 'bourbon-wp' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="modified-on">' . $icon_modified . $modified_on . '</span>' ;
	}
	echo '</span>';
}

endif;



if ( ! function_exists( 'bourbon_wp_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function bourbon_wp_entry_footer() {

	$icon_tag = '<i class="fa fa-tags" aria-hidden="true"></i>';
	$icon_comments = '<i class="fa fa-comments" aria-hidden="true"></i>';
	$icon_edit = '<i class="fa fa-pencil" aria-hidden="true"></i>';

	echo '<span class="post-meta-info">';

	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */

		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'bourbon-wp' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . $icon_tag . ' %1$s' . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">' . $icon_comments;
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( ' Leave a Comment<span class="screen-reader-text"> on %s</span>', 'bourbon-wp' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>'; // END comments-link
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( ' Edit Post%s', 'bourbon-wp' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">'.$icon_edit,
		'</span>' // END edit-link
	);
echo '</span>'; // END post-meta-info
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function bourbon_wp_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'bourbon_wp_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'bourbon_wp_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so bourbon_wp_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so bourbon_wp_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in bourbon_wp_categorized_blog.
 */
function bourbon_wp_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'bourbon_wp_categories' );
}
add_action( 'edit_category', 'bourbon_wp_category_transient_flusher' );
add_action( 'save_post',     'bourbon_wp_category_transient_flusher' );
