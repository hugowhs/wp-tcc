<?php

add_action( 'init', 'create_genero_taxonomy', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_genero_taxonomy() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => 'Gênero',
		'singular_name'     => 'Gênero',
		'search_items'      => 'Pesquisar gêneros',
		'all_items'         => 'Todas as gêneros',
		'parent_item'       => 'Gênero pai',
		'parent_item_colon' => 'Gênero pai:',
		'edit_item'         => 'Editar gênero',
		'update_item'       => 'Atualizar gênero',
		'add_new_item'      => 'Adicionar nova gênero',
		'new_item_name'     => 'Nome da nova gênero',
		'menu_name'         => 'Gêneros',
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'genero' ),
	);

	register_taxonomy( 'genero', array( 'genero' ), $args );

}
