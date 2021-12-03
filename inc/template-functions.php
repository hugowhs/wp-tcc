<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 */



/**
 * Adds custom classes to the array of body classes.
 */
function w2ztheme_body_classes( $classes ) {

	if ( is_singular() ) {
		// Adds `singular` to singular pages.
		$classes[] = 'singular';
	} else {
		// Adds `hfeed` to non singular pages.
		$classes[] = 'hfeed';
	}

	// Adds a class if image filters are enabled.
	$classes[] = 'image-filters-enabled';

	return $classes;
}
add_filter( 'body_class', 'w2ztheme_body_classes' );



//** SEARCH FORM LAYOUT
function w2ztheme_wpsearch( $form ) {
	$form = '<form id="searchform" class="form-inline" role="search" method="get" action="' . home_url( '/' ) . '" >
	<label class="sr-only" for="s">' . __( 'Pesquisa:', 'fwtheme' ) . '</label>
	<input class="input-medium" type="search" value="' . get_search_query() . '" name="s" id="s" placeholder="pesquisar por..." />
	<button id="searchsubmit" class="btn" type="submit"  >' . esc_attr__( 'OK' ) . '</button>
	</form>';
	return $form;
} // function


//** get PAGE_ID by slug
function w2ztheme_get_id( $page_slug ) {
	$page = get_page_by_path( $page_slug );
	if ( $page ) {
		return $page->ID;
	}
}


//** POSTS PER PAGE
//add_action( 'pre_get_posts', 'w2ztheme_posts_per_page' );
function w2ztheme_posts_per_page( $query ) {
	// do not alter the query on wp-admin pages and only alter it if it's the main query
	if ( ! is_admin() && $query->is_main_query() ) {

		if ( is_post_type_archive( 'produto' ) ) {
			$query->set( 'posts_per_page', -1 );
		}
	}
}

// Função do MAIN MENU
function w2ztheme_nav_main() {
	wp_nav_menu(
		array(
			'theme_location' => 'nav-main',
			'menu'           => 'Menu Principal',
			'menu_class'     => 'header-nav dropdown vertical medium-horizontal menu',
			'items_wrap'     => '<ul id="%1$s" class="%2$s" data-responsive-menu="drilldown medium-dropdown" data-auto-height="true">%3$s</ul>',
			'container'      => false,
			'fallback_cb'    => false,
			'walker'         => new DRILL_MENU_WALKER(),
		)
	);
}

class DRILL_MENU_WALKER extends Walker_Nav_Menu {
	/*
	 * Add vertical menu class
	 */

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class=\"vertical menu\">\n";
	}
}


// Função do FOOTER MENU
function w2ztheme_nav_footer() {
	wp_nav_menu(
		array(
			'theme_location' => 'nav-footer',
			'menu'           => 'Menu Rodapé',
			'menu_class'     => 'footer-navbar',
			'container'      => false,
		) 
	);
}


//** CUSTOM PAGINATION
function w2ztheme_pagination() {
	$pagination = get_the_posts_pagination(
		array(
			'mid_size'           => 2,
			'prev_next'          => true,
			'prev_text'          => '&larr;',
			'next_text'          => '&rarr;',
			'before_page_number' => '',
			'screen_reader_text' => 'A',
		)
	);

	$scheme = str_replace( '<h2 class="screen-reader-text">A</h2>', '', $pagination );

	echo '<div class="loop__pagination">' . $scheme . '</div>';
}



/**
 * Filters the default archive titles.
 */
function w2ztheme_get_the_archive_title() {
	if ( is_category() ) {
		$title = 'Arquivos da categoria: <span class="page__description">' . single_term_title( '', false ) . '</span>';
	} elseif ( is_tag() ) {
		$title = 'Arquivos da tag: <span class="page__description">' . single_term_title( '', false ) . '</span>';
	} elseif ( is_author() ) {
		$title = 'Arquivos do autor: <span class="page__description">' . get_the_author_meta( 'display_name' ) . '</span>';
	} elseif ( is_year() ) {
		$title = 'Arquivos do ano: <span class="page__description">' . get_the_date( 'Y' ) . '</span>';
	} elseif ( is_month() ) {
		$title = 'Arquivos do mês: <span class="page__description">' . get_the_date( 'F \d\e Y' ) . '</span>';
	} elseif ( is_day() ) {
		$title = 'Arquivos do dia: <span class="page__description">' . get_the_date() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$title = 'Arquivos do tipo: <span class="page__description">' . post_type_archive_title( '', false ) . '</span>';
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		$title = sprintf( 'Arquivos: ', $tax->labels->singular_name );
	} else {
		$title = 'Arquivos: ';
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'w2ztheme_get_the_archive_title' );



/**
 * Determines if post thumbnail can be displayed.
 */
function w2ztheme_can_show_post_thumbnail() {
	return apply_filters( 'w2ztheme_can_show_post_thumbnail', ! post_password_required() && ! is_attachment() && has_post_thumbnail() );
}

