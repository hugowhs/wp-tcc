<?php
/**
 * The sidebar containing the main widget area
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

dynamic_sidebar( 'sidebar-1' );
