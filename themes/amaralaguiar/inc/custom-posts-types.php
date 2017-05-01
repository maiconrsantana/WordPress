<?php

//Custom Posts Types

	//Alterar posts para artigos no Menu
	function change_post_label() {
	    global $menu;
	    global $submenu;
	    $menu[5][0] = 'Artigos';
	    $submenu['edit.php'][5][0] = 'Artigos';
	    $submenu['edit.php'][10][0] = 'Adicionar Artigo';
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
			'name' => _x('Destaques Home', 'post type general name'),
			'singular_name' => _x('Destaque', 'post type singular name'),
			'add_new' => _x('Adicionar Novo', 'Novo item'),
			'add_new_item' => __('Novo Item'),
			'edit_item' => __('Editar Item'),
			'new_item' => __('Novo Item'),
			'view_item' => __('Ver Item'),
			'search_items' => __('Procurar Item'),
			'not_found' =>  __('Nenhum item encontrado'),
			'not_found_in_trash' => __('Nenhum item encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Destaques Home'
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

//Áreas de Atuação
add_action('init', 'type_post_areas_atuacao');

function type_post_areas_atuacao() {
	$labels = array(
		'name' => _x('Áreas de Atuação', 'post type general name'),
		'singular_name' => _x('Área de Atuação', 'post type singular name'),
		'add_new' => _x('Adicionar Nova', 'Nova Área'),
		'add_new_item' => __('Nova Área'),
		'edit_item' => __('Editar Área'),
		'new_item' => __('Nova Área'),
		'view_item' => __('Ver Área'),
		'search_items' => __('Procurar Área'),
		'not_found' =>  __('Nenhuma área encontrada'),
		'not_found_in_trash' => __('Nenhuma área encontrada na lixeira'),
		'parent_item_colon' => '',
		'menu_name' => 'Áreas de Atuação'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,
		'query_var' => 'areas_atuacao',
		'rewrite' => array('slug' => 'atuacao','with_front' => false),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-editor-quote',
		'supports' => array('title', 'revisions')
	);

register_post_type( 'area_atuacao' , $args );
flush_rewrite_rules();
}

//Dúvidas
add_action('init', 'type_post_duvidas');

function type_post_duvidas() {
	$labels = array(
		'name' => _x('Dúvidas', 'post type general name'),
		'singular_name' => _x('Dúvida', 'post type singular name'),
		'add_new' => _x('Adicionar Nova', 'Nova Dúvida'),
		'add_new_item' => __('Nova Dúvida'),
		'edit_item' => __('Editar Dúvida'),
		'new_item' => __('Nova Dúvida'),
		'view_item' => __('Ver Dúvida'),
		'search_items' => __('Procurar Dúvida'),
		'not_found' =>  __('Nenhuma Dúvida encontrada'),
		'not_found_in_trash' => __('Nenhuma Dúvida encontrada na lixeira'),
		'parent_item_colon' => '',
		'menu_name' => 'Dúvidas'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,
		'query_var' => 'duvidas',
		'rewrite' => array('slug' => 'duvidas','with_front' => false),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 6,
		'menu_icon' => 'dashicons-editor-help',
		'supports' => array('title', 'revisions')
	);

register_post_type( 'duvida' , $args );
flush_rewrite_rules();
}

?>
