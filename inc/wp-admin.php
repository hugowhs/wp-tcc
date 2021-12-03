<?php
/**
 * wp-admin.php
 */


/**
* CUSTOM LOGIN PAGE
*----------------------------------------------------------------------------*/
function w2ztheme_login_css() {
	echo '
	<style type="text/css">
		body.login {
			background-color: #1b1d2f;
		}
		body.login #login h1 a {
			display: block;
			width: 320px;
			height: 70px;
			padding-bottom: 25px;
			text-indent: -9999px;
			overflow: hidden;
			background: url(wp-admin/images/w-logo-white.png) center no-repeat !important;
			background-size: auto 90px !important;
		}
	</style>
	';
}
add_action( 'login_enqueue_scripts', 'w2ztheme_login_css' );



/**
* CUSTOMIZE ADMIN
*----------------------------------------------------------------------------*/
// REMOVE THE WORDPRESS UPDATE NOTIFICATION  and ADMIN BAR for all USERS EXCEPT 'admin@w2z'
global $user_login;
wp_get_current_user();
if ( 'admin@w2z' != $user_login ) {

	// Hide ADMIN BAR for users
	show_admin_bar( false );

	add_action( 'admin_menu', 'w2ztheme_hideupdate' );
	function w2ztheme_hideupdate() {
		remove_action( 'admin_notices', 'update_nag', 3 );
	}
}


// Custom ToolBar Itens
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );
function remove_admin_bar_links() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'wp-logo' );
	$wp_admin_bar->remove_menu( 'updates' );
}

// Custom Backend Footer
add_filter( 'admin_footer_text', 'w2ztheme_custom_admin_footer' );
function w2ztheme_custom_admin_footer() {
	echo '<span id="footer-thankyou">Desenvolvido por <a href="https://w2z.com.br" target="_blank">W2Z Soluções em TI</a>.</span>';
}

// Image Update Default
update_option( 'image_default_link_type', 'none' );


// Custom POST columns
function manage_columns( $columns ) {
	unset( $columns['categories'] );
	unset( $columns['author'] );
	unset( $columns['tags'] );
	return $columns;
}
function column_init() {
	add_filter( 'manage_posts_columns', 'manage_columns' );
}
//add_action( 'admin_init', 'column_init' );

// Custom menu POST label
function change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'Notícias';
	$submenu['edit.php'][5][0] = 'Notícias';
	$submenu['edit.php'][10][0] = 'Adicionar Nova';

	unset( $submenu['edit.php'][15] ); // Cat menu
	unset( $submenu['edit.php'][16] ); // Tags menu

	echo '';
}
//add_action( 'admin_menu', 'change_post_menu_label' );

// Custom POST object label
function change_post_object_label() {
	global $wp_post_types;
	$labels                     = &$wp_post_types['post']->labels;
	$labels->name               = 'Notícias';
	$labels->singular_name      = 'Notícia';
	$labels->add_new            = 'Adicionar Nova';
	$labels->add_new_item       = 'Adicionar Nova';
	$labels->edit_item          = 'Editar Notícia';
	$labels->new_item           = 'Notícia';
	$labels->view_item          = 'Visualizar';
	$labels->search_items       = 'Pesquisar notícias';
	$labels->not_found          = 'Nenhuma notícia encontrada';
	$labels->not_found_in_trash = 'Nenhuma notícia na lixeira';
}
//add_action( 'init', 'change_post_object_label' );


// Custom CATEGORY object label
function change_category_label() {
	global $wp_taxonomies;
	$cat                                     = $wp_taxonomies['category'];
	$cat->labels->name                       = 'Categorias';
	$cat->labels->singular_name              = 'Categoria';
	$cat->labels->search_items               = 'Pesquisar Categorias';
	$cat->labels->all_items                  = 'Todas as Categorias';
	$cat->labels->parent_item                = 'Categoria Pai';
	$cat->labels->parent_item_colon          = 'Pai:';
	$cat->labels->edit_item                  = 'Editar Categoria';
	$cat->labels->update_item                = 'Atualizar Categoria';
	$cat->labels->add_new_item               = 'Adicionar Nova Categoria';
	$cat->labels->new_item_name              = 'Novo nome';
	$cat->labels->separate_items_with_commas = 'Separar Categorias por vírgula';
	$cat->labels->add_or_remove_items        = 'Adicionar ou remover Categorias';
	$cat->labels->choose_from_most_used      = 'Categorias mais utilizadas';
}
//add_action( 'init', 'change_category_label' );


// Custom menu POST label
function remove_admin_menus() {
	remove_menu_page( 'edit.php' );
}
//add_action( 'admin_menu', 'remove_admin_menus' );


// Menu Order
function custom_menu_order( $menu_ord ) {
	if ( ! $menu_ord ) {
		return true;
	}

	return array(
		'index.php', // Dashboard
		'edit.php', // Posts
		'edit.php?post_type=page', // Pages

		'separator1', // First separator

		'upload.php', // Media
		'link-manager.php', // Links
		'edit-comments.php', // Comments

		'separator2', // Second separator

		'themes.php', // Appearance
		'plugins.php', // Plugins
		'users.php', // Users
		'tools.php', // Tools
		'options-general.php', // Settings
		'separator-last', // Last separator
	);
}
//add_filter( 'custom_menu_order', 'custom_menu_order' ); // Activate custom_menu_order
//add_filter( 'menu_order', 'custom_menu_order' );
