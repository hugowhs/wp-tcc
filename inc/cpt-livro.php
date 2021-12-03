<?php

add_action( 'init', 'w2ztheme_livro_init' );
/**
 * Livro post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function w2ztheme_livro_init() {
	$labels = array(
		'name'               => 'Livros',
		'singular_name'      => 'Livro',
		'menu_name'          => 'Livros',
		'name_admin_bar'     => 'Livros',
		'add_new'            => 'Adicionar novo',
		'add_new_item'       => 'Adicionar novo Livro',
		'new_item'           => 'Novo Livro',
		'edit_item'          => 'Editar Livro',
		'view_item'          => 'Visualizar Livro',
		'all_items'          => 'Todos os Livros',
		'search_items'       => 'Buscar Livros',
		'parent_item_colon'  => 'Livros pai:',
		'not_found'          => 'Nenhum Livro encontrado.',
		'not_found_in_trash' => 'Nenhum Livro encontrado na lixeira.',
	);

	$args = array(
		'labels'             => $labels,
		'description'        => 'Descrição.',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'livro', 'with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => 'livros',
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
		'menu_icon'          => 'dashicons-book',
        'taxonomies'         => array( 'genero' ),
		'show_in_rest'       => true,

	);

	register_post_type( 'livro', $args );
}
