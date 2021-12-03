<?php
/**
 * Custom template tags for this theme
 */


/**
 * Prints HTML with meta information for the current post-date/time.
 */
function w2ztheme_posted_on() {
	$time_string = '<time class="entry__meta--date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry__meta--date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf(
		$time_string,
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( DATE_W3C ) ),
		esc_html( get_the_modified_date() )
	);

	printf(
		'<span class="posted-on">%1$s%2$s</span>',
		'<i class="material-icons">query_builder</i>',
		$time_string
	);
}



/**
 * Prints HTML with meta information about theme author.
 */
function w2ztheme_posted_by() {
	printf(
		/* translators: 1: SVG icon. 2: post author, only visible to screen readers. 3: author link. */
		'<span class="entry__meta--byline">%1$s<span class="screen-reader-text">%2$s</span><span class="author vcard"><a class="url fn n" href="%3$s">%4$s</a></span></span>',
		'<i class="material-icons">person</i>',
		'Publicado por',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_html( get_the_author() )
	);
}




/**
 * Prints HTML with the comment count for the current post.
 */
function w2ztheme_comment_count() {
	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="entry__meta--comments-link">';
		echo '<i class="material-icons">comment</i>';
		comments_popup_link( 'Deixe um comentário' );
		echo '</span>';
	}
}




/**
 * Displays an optional post thumbnail.
 */
function w2ztheme_post_thumbnail() {
	if ( ! w2ztheme_can_show_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
		?>
		<figure class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</figure><!-- .post-thumbnail -->
		<?php
	else :
		?>
		<figure class="post-thumbnail">
			<a class="post-thumbnail-inner" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php the_post_thumbnail( 'post-thumbnail' ); ?>
			</a>
		</figure>
		<?php
	endif; // End is_singular().
}
