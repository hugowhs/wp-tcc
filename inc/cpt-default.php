<?php

add_action( 'init', 'w2ztheme_default_init' );
/**
 * Register a default post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function w2ztheme_default_init() {
	$labels = array(
		'name'               => 'Posts',
		'singular_name'      => 'Post',
		'menu_name'          => 'Custom Posts',
		'name_admin_bar'     => 'Post',
		'add_new'            => 'Adicionar novo',
		'add_new_item'       => 'Adicionar novo Post',
		'new_item'           => 'Novo Post',
		'edit_item'          => 'Editar Post',
		'view_item'          => 'Visualizar Post',
		'all_items'          => 'Todos os Posts',
		'search_items'       => 'Buscar Posts',
		'parent_item_colon'  => 'Posts pai:',
		'not_found'          => 'Nenhum Post encontrado.',
		'not_found_in_trash' => 'Nenhum Post encontradona lixeira.',
	);

	$args = array(
		'labels'             => $labels,
		'description'        => 'Descrição.',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'default', 'with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'menu_icon'          => 'dashicons-pressthis',

	);

	register_post_type( 'default', $args );
}



// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_default_taxonomy', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_default_taxonomy() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => 'Taxonomia',
		'singular_name'     => 'Taxonomia',
		'search_items'      => 'Pesquisar taxonomias',
		'all_items'         => 'Todas as taxonomias',
		'parent_item'       => 'Taxonomia pai',
		'parent_item_colon' => 'Taxonomia pai:',
		'edit_item'         => 'Editar taxonomia',
		'update_item'       => 'Atualizar taxonomia',
		'add_new_item'      => 'Adicionar nova taxonomia',
		'new_item_name'     => 'Nome da nova taxonomia',
		'menu_name'         => 'Taxonomias',
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'default-cat' ),
	);

	register_taxonomy( 'default-cat', array( 'default' ), $args );

}
