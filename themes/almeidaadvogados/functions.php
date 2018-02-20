<?php
/**
 * Theme functions and definitions
 *
 */

if ( ! function_exists( 'almd_setup' ) ) :
	function almd_setup() {

		show_admin_bar(false);

 		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );
		add_image_size( 'equipe', 450, 600, true );
		add_image_size( 'thumb-equipe', 450, 320, array( 'center', 'top' ) );

		// This theme uses wp_nav_menu() in two locations.
		/*register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'almd' ),
		) );*/

	}
endif; // etoile_setup
add_action( 'after_setup_theme', 'almd_setup' );


if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' => 'Configurações do tema',
        'menu_title'	=> 'Config Tema',
        'menu_slug' => 'tema-theme-options',
        'capability'	=> 'edit_posts',
        'position'	=> 4,
// 'icon_url'	=> get_template_directory_uri().'/assets/img/icone_menu.png' /* Ícone do Menu */
    ));

    /* Utilize o código abaixo para criar novas opções no menu de configuração */
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Cabeçalho',
        'menu_title'	=> 'Cabeçalho',
        'parent_slug'	=> 'tema-theme-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Artigos',
        'menu_title'	=> 'Artigos',
        'parent_slug'	=> 'tema-theme-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Endereços',
        'menu_title'	=> 'Endereços',
        'parent_slug'	=> 'tema-theme-options',
    ));
}

/**
 * Enqueues scripts and styles.
 *
 */
function almd_scripts() {
	// Add bootstrap, used in the main stylesheet.
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/files/bootstrap/css/bootstrap.min.css' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/files/font-awesome/css/font-awesome.min.css' );

	// Theme stylesheet.
	wp_enqueue_style( 'almd-style', get_stylesheet_uri() );


	// Load the scripts.
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/files/js/jquery-1.12.4.min.js' );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/files/bootstrap/js/bootstrap.min.js', array( 'jquery' ) );

	// IE10 viewport hack for Surface/desktop Windows 8 bug
	wp_enqueue_script( 'nicescroll', get_template_directory_uri() . '/files/js/jquery.nicescroll.js', array( 'jquery' ) );


  // custom script theme
	wp_enqueue_script( 'almd-script', get_template_directory_uri() . '/files/js/custom.js', array( 'jquery' ) );

}
add_action( 'wp_enqueue_scripts', 'almd_scripts' );

//adicionar variaveis na url
function add_query_vars($aVars) {
	$aVars[] = "prod_page";
	$aVars[] = "search_term";
	return $aVars;
}
 
// hook add_query_vars function into query_vars
add_filter('query_vars', 'add_query_vars');

function add_rewrite_rules($aRules) {
	$aNewRules = array(
			//'produtos/(pagina/)([^/]+)/?$' => 'index.php?pagename=produtos&prod_page=$matches[2]',
			//'busca/([^/]+)/?$' => 'index.php?pagename=busca&search_term=$matches[1]',
			'midia/(pagina/)([^/]+)/?$' => 'index.php?pagename=midia&prod_page=$matches[2]'
	);

	$aRules = $aNewRules + $aRules;
	return $aRules;
}
// hook add_rewrite_rules function into rewrite_rules_array
add_filter('rewrite_rules_array', 'add_rewrite_rules');

//buscar banners
function almd_banners(){
	$array = array();
	$i=0;

	$args['post_type'] 	= 'banners';

	$loop = new WP_Query( $args );

	if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); 
		$array[$i]['img'] = get_field('imagem');
		$array[$i]['title'] = get_field('texto');
		$array[$i]['link'] = get_field('link');

		$i++;
	endwhile; endif;

	return $array;
}

//buscar páginas filhas 
function paginas_filhas($id) {
 $array = false;
 
 $args = array(
 'post_parent' => $id,
 'post__not_in' => array($id),
 'post_type' => 'page',
 'orderby' => 'title',
 'order' => 'ASC',
 'posts_per_page' => 999999
 );
 
 $loop = new WP_query($args);
 $i=0;
 // listar title das páginas filhas
 if ($loop->have_posts()) :
	
 	while ($loop->have_posts()) : $loop->the_post();
 		$array[$i]['id'] 	= get_the_ID();
 		$array[$i]['link'] 	= get_permalink();
 		$array[$i]['title']	= get_the_title();
 		$i++;
 	endwhile;
 
 endif;

 wp_reset_postdata();

 return $array;
}

//buscar artigos
function almd_artigos($return_loop=false, $limit=false, $autor=false){
	$args = array();
	$args['post_type'] 	= 'post';
	if($limit){
		$args['posts_per_page'] 	= $limit;
	}
	if($autor == true){
		$args['author'] 			= $autor;
	}
	if($autor == 1){
		$args['author'] 			= 99999999;
	}
	$loop = new WP_Query( $args );

	//se não encontrar artigo do autor, busca os últimos artigos publicados por outros
	if($autor == true && $loop->post_count == '0' ){
		unset($args['author']);
		$return['author'] = false;
		$return['artigos'] = new WP_Query( $args );

		return $return;
		wp_reset_postdata();
		die();
	}elseif($autor == true){
		$return['author'] = true;
		$return['artigos'] = $loop;

		return $return;
		wp_reset_postdata();
		die();
	}

	if($return_loop){
		return $loop;
		wp_reset_postdata();
		die();
	}

	// montar html
	if ($loop->have_posts()) : ?>

		<div class="row">

		    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
		        <div class="col-xs-12 col-lg-6 col-xl-3 box-news">
		        
		            <div class="col-md-12 padding">
		                    <h3 class="categ"> <?php echo strip_tags( get_the_category_list() ); ?> <?php echo get_the_date() ?> </h3>
		                    <h2 class="titles-3"> <?php the_title() ?> </h2>
		                    <p> <?php the_excerpt() ?> </p>
		                    <br>
		                    <a href="<?php the_permalink() ?>" class="read-more"> LEIA MAIS </a>
		                </div>
		                
		        </div>
		    <?php endwhile; ?>

		</div>

	<?php endif;

	wp_reset_postdata();

	return;
}

//busca artigos por ajax
function almd_artigos_index($page, $term, $type, $limit=8){
	
	$args = array();
	$args['post_type'] 		= 'post';
	$args['post_status']    = 'publish';
	$args['posts_per_page'] = $limit;
	$args['paged'] = $page;

	if($type == 'category'){
		$args['category_name'] = $term;
	}elseif($type == 'search'){
		$args['s'] = $term;
	}elseif($type == 'andrealmeida'){
		$user = get_user_by('slug','andrealmeida');
		$args['author'] = $user->ID;
	}
	
	$loop = new WP_Query( $args );
	
	wp_reset_postdata();

	return $loop;
}

//buscar template posts 
function almd_get_artigos()
{
	get_template_part( 'template-parts/content', 'posts' );

    die();
}
//Adiciona a funcao aos hooks ajax do WordPress.
add_action('wp_ajax_almd_get_artigos', 'almd_get_artigos');
add_action('wp_ajax_nopriv_almd_get_artigos', 'almd_get_artigos');

//buscar posts 
function getPostsFinish()
{
	$page = $_POST['page']; 
	$term = $_POST['term'];
	$type = $_POST['type'];
	
	$posts = almd_artigos_index($page+1, $term, $type); 

	if ( $posts->have_posts() ){ 
		echo '1';
	}else{
		echo '0';
	};

    die();
}
//Adiciona a funcao aos hooks ajax do WordPress.
add_action('wp_ajax_getPostsFinish', 'getPostsFinish');
add_action('wp_ajax_nopriv_getPostsFinish', 'getPostsFinish');

function get_cat_slug($cat_id) {
	$category = get_category($cat_id);
	return $category->slug;
}

//buscar Vagas 
function busca_vagas() {

 $args = array(
 'post_type' => 'vagas'
 );
 
 $loop = new WP_query($args);
 $i=0;
 // listar title das páginas filhas
 if ($loop->have_posts()) :

 	while ($loop->have_posts()) : $loop->the_post();

		$setor = wp_get_post_terms(get_the_ID() , 'setor');

		$array[$i]['id']		= get_the_ID();
 		$array[$i]['title']		= get_the_title();
 		$array[$i]['desc']		= get_field('descricao');
 		$array[$i]['setor_id']	= $setor[0]->term_id;
 		$array[$i]['setor']		= $setor[0]->name;

 		$i++;
 	endwhile;
 
 endif;

 wp_reset_postdata();

 return $array;
}

//buscar categorias
/*function almd_categoria($id=false, $current=false){
	$args['hide_empty']	=	0;
	$args['exclude']		=	1;
	$args['orderby']		=	'ID';
	$args['order']			=	'ASC';

	//return $id; //print_r($array);
	$html = '<ul class="row">';
	if($id){
		$args['fields']			=	'all_with_object_id';
		$array = wp_get_post_categories($id, $args);

		if(is_array($array) and count($array)){
			foreach($array as $ar){
				$img  = '<img src="'.get_wp_term_image($ar->term_id).'" alt="'.$ar->cat_name.'" > ';
				$link = site_url('categoria/'.$ar->slug);
				$html .= '<li><a href="'.$link.'">'.$img.'</a></li>';
			}
		}
	}else{
		$array = get_categories($args);

		if(is_array($array) and count($array)){
			foreach($array as $ar){
				if($current == true && $current == $ar->term_id){ $class = 'active'; }else{ $class = ''; }

				$img  = '<img src="'.get_wp_term_image($ar->term_id).'" alt="'.$ar->cat_name.'" > ';
				$link = site_url('categoria/'.$ar->slug);
				$html .= '<li class="col-sm-6 col-md-12 '.$class.'"><a href="'.$link.'">'.$img.$ar->cat_name.' ('.$ar->category_count.')</a></li>';
			}
		}
	}

	$html .= '</ul>';
	return $html;
}
*/
//exibe header das páginas
function almd_header($title, $image, $page=false, $logo=false){
	
	global $header_title, $header_image, $header_page;
	
	$header_title 	= $title;
	$header_image 	= $image;
	$header_page 	= $page;
	$header_logo 	= $logo;
	
	return include('template-parts/content-header.php');

}

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function almd_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'almd_custom_excerpt_length', 999 );


//busca equipe
function almd_team($destaque=false, $limit=false, $random=false, $exclude=false){
	
	$args = array();
	$args['post_type'] 		= 'equipe';
	$args['orderby']    	= 'title';
	$args['order']    		= 'ASC';
	
	if($destaque){
		$args['meta_key']		= 'destaque';
		$args['meta_value']		= 'sim';
	}else{
		$args['meta_key']		= 'destaque';
		$args['meta_value']		= 'sim';
		$args['meta_compare']	= 'NOT EXISTS';
	}

	if($limit){
		$args['posts_per_page'] = $limit;
	}else{
		$args['posts_per_page'] = 999999;
	}
	if($random){
		$args['orderby'] = 'rand';
	}
	if($exclude){
		$args['post__not_in'] = array($exclude); 
	}


	$loop = new WP_Query( $args );
	
	wp_reset_postdata();

	return $loop;
}

function wpb_custom_new_menu() {
  register_nav_menu('menu-news',__( 'Menu News' ));

  register_nav_menu('menu-principal',__( 'Menu Principal' ));

  register_nav_menu('menu-rodape',__( 'Menu Rodapé' ));

}
add_action( 'init', 'wpb_custom_new_menu' );

//texto instrução imagem destacada
/*function add_featured_image_instruction( $content ) {
    return $content .= '<p>Tamanho recomendado 1024px X 390px</p>';
}
add_filter( 'admin_post_thumbnail_html', 'add_featured_image_instruction');
*/


/**
* adiciona link Tutorial no menu ferramentas
*/

/*function tutorial_admin_menu() {
    global $submenu;
    $url = get_template_directory_uri() . '/files/Tutorial.pdf';
    $submenu['tools.php'][] = array('Tutorial', 'manage_options', $url);
}
add_action('admin_menu', 'tutorial_admin_menu');
*/
// Custom WordPress Login Logo
function cutom_login_logo() {
echo "<style type=\"text/css\">
body.login div#login h1 a {
background-image: url(".get_bloginfo('template_directory')."/files/img/logo-almeida-advogados-br-menu.png);
-webkit-background-size: contain;
background-size: contain;
margin: 0 0 25px;
width: 320px;
}
</style>";
}
add_action( 'login_enqueue_scripts', 'cutom_login_logo' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/custom-posts-types.php';
?>
