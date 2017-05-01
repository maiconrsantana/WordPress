<?php
 
// Admin Banners - Blog
add_action('init', 'type_post_blog');
 
function type_post_blog() { 
	$labels = array(
		'name' => _x('Dicas', 'post type general name'),
		'singular_name' => _x('Banners Blog', 'post type singular name'),
		'add_new' => _x('Adicionar Novo', 'Novo item'),
		'add_new_item' => __('Novo Banner'),
		'edit_item' => __('Editar Banner'),
		'new_item' => __('Novo Banner'),
		'view_item' => __('Ver Banner'),
		'search_items' => __('Procurar Banner'),
		'not_found' =>  __('Nenhum banner encontrado'),
		'not_found_in_trash' => __('Nenhum banner encontrado na lixeira'),
		'parent_item_colon' => '',
		'menu_name' => 'Banners Blog'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,			
		'query_var' => true,
		'rewrite' => array('slug' => 'dicas', 'with_front' => false),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 4,
		'menu_icon' => 'dashicons-images-alt',
		'register_meta_box_cb' => 'destaques_blog_meta_box',		
		'supports' => array('title','thumbnail', 'revisions'),
	  );
 
	register_post_type( 'blog' , $args );
	flush_rewrite_rules();
}

// Admin Produtos
add_action('init', 'type_post_produtos');
 
function type_post_produtos() { 
	$labels = array(
		'name' => _x('Produtos', 'post type general name'),
		'singular_name' => _x('Produtos', 'post type singular name'),
		'add_new' => _x('Adicionar Novo', 'Novo item'),
		'add_new_item' => __('Novo Produto'),
		'edit_item' => __('Editar Produto'),
		'new_item' => __('Novo Produto'),
		'view_item' => __('Ver Produto'),
		'search_items' => __('Procurar Produto'),
		'not_found' =>  __('Nenhum produto encontrado'),
		'not_found_in_trash' => __('Nenhum produto encontrado na lixeira'),
		'parent_item_colon' => '',
		'menu_name' => 'Produtos'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,			
		'query_var' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-image-filter',
		'register_meta_box_cb' => 'destaques_meta_box',		
		'supports' => array('title','thumbnail', 'revisions'),
		'rewrite' => array('slug' => 'produtos/%category_prod%', 'with_front' => false ),
	  );
 
	register_post_type( 'produtos' , $args );
    register_taxonomy_for_object_type( 'post_tag', 'produtos' );

	flush_rewrite_rules();
}

// Admin FAQ
add_action('init', 'type_post_faq');
 
function type_post_faq() { 
	$labels = array(
		'name' => _x('Perguntas', 'post type general name'),
		'singular_name' => _x('Perguntas', 'post type singular name'),
		'add_new' => _x('Adicionar Pergunta', 'Novo item'),
		'add_new_item' => __('Nova Pergunta'),
		'edit_item' => __('Editar Pergunta'),
		'new_item' => __('Nova Pergunta'),
		'view_item' => __('Ver Pergunta'),
		'search_items' => __('Procurar Pergunta'),
		'not_found' =>  __('Nenhuma pergunta encontrada'),
		'not_found_in_trash' => __('Nenhuma pergunta encontrada na lixeira'),
		'parent_item_colon' => '',
		'menu_name' => 'FAQ'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,			
		'query_var' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 6,
		'menu_icon' => 'dashicons-list-view',
		'register_meta_box_cb' => 'faq_meta_box',		
		'supports' => array('title', 'revisions'),
		'rewrite' => array('slug' => 'faq', 'with_front' => false ),
	  );
 
	register_post_type( 'faq' , $args );

	flush_rewrite_rules();
}

// Cria categoria de produtos
function cwp_register_taxonomy_produtos(){
	 
	 $labels = array(
			'name' => _x('Categorias', 'taxonomy general name'),
	 );
	 $posts_types = array(
	 		'produtos',
			'faq'
	 );

	 register_taxonomy(
          'category_prod',
          $posts_types,
          array(
               'labels' => $labels,
			   'singular_name' => __('Categoria'),
               'rewrite' => array('slug' => 'categoria_produto'),
               'hierarchical' => true
          )
     );
}
add_action('init', 'cwp_register_taxonomy_produtos');

// Admin Banners - Home
add_action('init', 'type_post_destaques');
 
function type_post_destaques() { 
	$labels = array(
		'name' => _x('Banners Home', 'post type general name'),
		'singular_name' => _x('Banners Home', 'post type singular name'),
		'add_new' => _x('Adicionar Novo', 'Novo item'),
		'add_new_item' => __('Novo Banner'),
		'edit_item' => __('Editar Banner'),
		'new_item' => __('Novo Banner'),
		'view_item' => __('Ver Banner'),
		'search_items' => __('Procurar Banner'),
		'not_found' =>  __('Nenhum banner encontrado'),
		'not_found_in_trash' => __('Nenhum banner encontrado na lixeira'),
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
		'menu_position' => 7,
		'menu_icon' => 'dashicons-images-alt',
		'register_meta_box_cb' => 'destaques_meta_box',		
		'supports' => array('title','thumbnail', 'revisions')
	  );
 
	register_post_type( 'destaques' , $args );
	flush_rewrite_rules();
}

// Admin Chamadas
add_action('init', 'type_post_chamadas');
 
function type_post_chamadas() { 
	$labels = array(
		'name' => _x('Destaques Home', 'post type general name'),
		'singular_name' => _x('Destaques Home', 'post type singular name'),
		'add_new' => _x('Adicionar Novo', 'Novo item'),
		'add_new_item' => __('Novo Destaque'),
		'edit_item' => __('Editar Destaque'),
		'new_item' => __('Novo Destaque'),
		'view_item' => __('Ver Destaque'),
		'search_items' => __('Procurar Destaque'),
		'not_found' =>  __('Nenhum destaque encontrado'),
		'not_found_in_trash' => __('Nenhum destaque encontrado na lixeira'),
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
		'menu_position' => 8,
		'menu_icon' => 'dashicons-align-center',
		'register_meta_box_cb' => 'destaques_meta_box',		
		'supports' => array('title','thumbnail', 'revisions')
	  );
 
	register_post_type( 'chamadas' , $args );
	register_taxonomy_for_object_type( 'category_prod', 'chamadas' );
	flush_rewrite_rules();
}

// Admin Lojas
add_action('init', 'type_post_lojas');
 
function type_post_lojas() { 
	$labels = array(
		'name' => _x('Lojas', 'post type general name'),
		'singular_name' => _x('Lojas', 'post type singular name'),
		'add_new' => _x('Adicionar Nova', 'Novo item'),
		'add_new_item' => __('Nova Loja'),
		'edit_item' => __('Editar Loja'),
		'new_item' => __('Nova Loja'),
		'view_item' => __('Ver Loja'),
		'search_items' => __('Procurar Loja'),
		'not_found' =>  __('Nenhuma Loja encontrado'),
		'not_found_in_trash' => __('Nenhum destaque encontrado na lixeira'),
		'parent_item_colon' => '',
		'menu_name' => 'Lojas'
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
		'menu_position' => 9,
		'menu_icon' => 'dashicons-cart',
		'register_meta_box_cb' => 'lojas_meta_box',		
		'supports' => array('title','thumbnail', 'revisions')
	  );
 
	register_post_type( 'lojas' , $args );
	flush_rewrite_rules();
}

// filtrar post types na busca
function includeSearch($query) {
 
	if ($query->is_search) {
	 
		$query->set('post_type', array('post', 'produtos'));
		//$query->set('tag', '%'.get_search_query().'%');
	 
	}
	 return $query;
	 
	}
add_filter('pre_get_posts','includeSearch');

//texto instrução imagem destacada
function add_featured_image_instruction( $content ) {
    return $content .= '<p>Tamanho Recomendado: <b>1245px X 500px</b></p>';
}
add_filter( 'admin_post_thumbnail_html', 'add_featured_image_instruction');

?>