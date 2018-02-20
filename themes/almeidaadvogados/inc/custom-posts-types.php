<?php

//Custom Posts Types

	//Alterar posts para artigos no Menu
	function change_post_label() {
	    global $menu;
	    global $submenu;
	    $menu[5][0] = 'Mídia';
	    $submenu['edit.php'][5][0] = 'Mídia';
	    $submenu['edit.php'][10][0] = 'Adicionar Texto';
	    $submenu['edit.php'][16][0] = 'Tags';
	    echo '';
	}
	function change_post_object() {
	    global $wp_post_types;
	    $labels = &$wp_post_types['post']->labels;
	    $labels->name = 'Artigos';
	    $labels->singular_name = 'Artigo';
	    $labels->add_new = 'Adicionar Artigo';
	    $labels->add_new_item = 'Adicionar Artigo';
	    $labels->edit_item = 'Editar Artigo';
	    $labels->new_item = 'Artigo';
	    $labels->view_item = 'Ver Artigo';
	    $labels->search_items = 'Buscar Artigo';
	    $labels->not_found = 'Nenhum Artigo encontrado';
	    $labels->not_found_in_trash = 'Nenhum Artigo encontrado no Lixo';
	    $labels->all_items = 'Todos Artigos';
	    $labels->menu_name = 'Artigos';
		$labels->menu_icon = 'dashicons-welcome-learn-more';
	    $labels->name_admin_bar = 'Artigos';
	}

	add_action( 'admin_menu', 'change_post_label' );
	add_action( 'init', 'change_post_object' );

	//Banners Home
	add_action('init', 'type_post_banners');

	function type_post_banners() {
		$labels = array(
			'name' => _x('Banners Home', 'post type general name'),
			'singular_name' => _x('Banner', 'post type singular name'),
			'add_new' => _x('Adicionar Novo', 'Novo item'),
			'add_new_item' => __('Novo Item'),
			'edit_item' => __('Editar Item'),
			'new_item' => __('Novo Item'),
			'view_item' => __('Ver Item'),
			'search_items' => __('Procurar Item'),
			'not_found' =>  __('Nenhum item encontrado'),
			'not_found_in_trash' => __('Nenhum item encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Banners Home'
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'public_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => false,
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_position' => 4,
			'menu_icon' => 'dashicons-align-center',
			'supports' => array('title', 'revisions')
    );

	register_post_type( 'banners' , $args );
	flush_rewrite_rules();
	}

//Equipe
add_action('init', 'type_post_equipe');

function type_post_equipe() {
	$labels = array(
		'name' => _x('Equipe', 'post type general name'),
		'singular_name' => _x('Equipe', 'post type singular name'),
		'add_new' => _x('Adicionar Membro', 'Novo Membro'),
		'add_new_item' => __('Novo Membro'),
		'edit_item' => __('Editar Membro'),
		'new_item' => __('Novo Membro'),
		'view_item' => __('Ver Membro'),
		'search_items' => __('Procurar Membro'),
		'not_found' =>  __('Nenhum membro encontrado'),
		'not_found_in_trash' => __('Nenhum membro encontrado na lixeira'),
		'parent_item_colon' => '',
		'menu_name' => 'Equipe'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,
		'query_var' => 'equipe',
		'rewrite' => array('slug' => 'equipe','with_front' => false),
		'capability_type' => 'post',
		'has_archive' => false,
		'hierarchical' => false,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-admin-users',
		'supports' => array('title', 'revisions')
	);

register_post_type( 'equipe' , $args );
flush_rewrite_rules();
}

//Vagas
add_action('init', 'type_post_vagas');

function type_post_vagas() {
	$labels = array(
		'name' => _x('Vagas', 'post type general name'),
		'singular_name' => _x('Vagas', 'post type singular name'),
		'add_new' => _x('Adicionar Vaga', 'Novo Membro'),
		'add_new_item' => __('Nova Vaga'),
		'edit_item' => __('Editar Membro'),
		'new_item' => __('Nova Vaga'),
		'view_item' => __('Ver Vaga'),
		'search_items' => __('Procurar Vaga'),
		'not_found' =>  __('Nenhuma vaga encontrado'),
		'not_found_in_trash' => __('Nenhuma vaga encontrada na lixeira'),
		'parent_item_colon' => '',
		'menu_name' => 'Vagas'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,
		'query_var' => 'vagas',
		'rewrite' => array('slug' => 'vagas','with_front' => false),
		'capability_type' => 'post',
		'has_archive' => false,
		'hierarchical' => false,
		'menu_position' => 7,
		'menu_icon' => 'dashicons-welcome-widgets-menus',
		'supports' => array('title', 'revisions')
	);

register_post_type( 'vagas' , $args );


//criar categoria setores
$labels = array(
		'name'              => _x( 'Setores', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Setor', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Procurar Setor', 'textdomain' ),
		'all_items'         => __( 'Todos Setores', 'textdomain' ),
		'edit_item'         => __( 'Editar Setor', 'textdomain' ),
		'update_item'       => __( 'Atualizar Setor', 'textdomain' ),
		'add_new_item'      => __( 'Novo Setor', 'textdomain' ),
		'menu_name'         => __( 'Setores', 'textdomain' ),
	);

$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'setor' ),
);

register_taxonomy( 'setor', array( 'vagas' ), $args );

flush_rewrite_rules();
}


?>
