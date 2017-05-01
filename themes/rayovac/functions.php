<?php
/**
 * @package WordPress
 * @subpackage Rayovac
 */

define('MAIL_TO', 'maiconrsantana@hotmail.com');


// Ocultando a Admin Bar
add_filter('show_admin_bar', '__return_false');

if(!function_exists('rayovac_setup')){
	function rayovac_setup() {
		
		//add_theme_support( 'title-tag' );
		
		// definir tamanho das imagens
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );
		add_image_size( 'banner-img', 1245, 630, true );
		add_image_size( 'banner-small-img', 550, 250, true );
		add_image_size( 'banner-prod-img', 620, 250, true );
		add_image_size( 'min-img', 310, 220, true );
	
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	}
}
add_action( 'after_setup_theme', 'rayovac_setup' );

//Montar link com as categorias de produto criadas
function wpa_course_post_link( $post_link, $id = 0 ){
    $post = get_post($id);  
    if ( is_object( $post ) ){
        $terms = wp_get_object_terms( $post->ID, 'category_prod' );
        if( $terms ){
            return str_replace( '%category_prod%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;  
}
add_filter( 'post_type_link', 'wpa_course_post_link', 1, 3 );


//Config pages title
function rayovac_title_tag() {
	
	if(is_home()){
		?><title><?php bloginfo('name'); ?></title><?php
	}

	if(is_page()){
		?><title><?php bloginfo('name'); ?> | <?php echo get_the_title(); ?></title><?php
	}

	if(is_archive()){
		?><title><?php bloginfo('name'); ?> | Dicas</title><?php
	}
	
	if(is_single()){
		?><title><?php bloginfo('name'); ?> | <?php echo get_the_title(); ?></title><?php
	}

}

// Carrega Scripts
function rayovac_scripts() {
	// Bootstrap core CSS
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/files/css/bootstrap/bootstrap.css', array(), '' );

    // IE10 viewport hack for Surface/desktop Windows 8 bug
	wp_enqueue_style( 'ie10-viewport-bug-workaround', get_template_directory_uri().'/files/css/bootstrap/ie10-viewport-bug-workaround.css', array(), '' );

	// Theme stylesheet.
	wp_enqueue_style( 'rayovac-style', get_stylesheet_uri() );

	// Load the scripts.
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', get_template_directory_uri().'/files/js/jquery.min-1.12.4.js' );

	// Bootstrap core JS
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/files/js/bootstrap/bootstrap.min.js', array( 'jquery' ) );
	
	// IE10 viewport hack for Surface/desktop Windows 8 bug
	wp_enqueue_script( 'ie10-viewport-bug-workaround', get_template_directory_uri().'/files/js/bootstrap/ie10-viewport-bug-workaround.js', array( 'jquery' ) );

	//scrollto
	wp_enqueue_script( 'scrollto', get_template_directory_uri().'/files/js/jquery.scrollTo-min.js', array( 'jquery' ) );
	
    // custom script theme  
	wp_enqueue_script( 'rayovac', get_template_directory_uri().'/files/js/custom.js', array( 'jquery' ) );
	wp_enqueue_script( 'timeline', get_template_directory_uri().'/files/js/timeline.js', array( 'jquery' ) );

	//scrollreveal
	wp_enqueue_script('scrollreveal', get_template_directory_uri() . "/files/js/scrollreveal.js",'','',true);   
  	wp_enqueue_script('custom_footer', get_template_directory_uri() . "/files/js/custom_footer.js",'','',true);
	
}
add_action( 'wp_enqueue_scripts', 'rayovac_scripts' );

/**
 * Customizer additions.
 */

function ry_to_slug($text) {
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return '';
  }

  return $text;
}

function clean_phone($text){
	// remove elements
  	$text = str_replace('(', '', $text);
	$text = str_replace(')', '', $text);
	$text = str_replace('-', '',$text);
	$text = str_replace('.', '',$text);
	
	// trim
	$text = trim($text);
	
	if (empty($text)) {
    	return '';
  	}
  
	return $text;
}

//função para envio de mensagem do formulário de contato
function sendForm()
{
	//print_r($_POST); die();
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	$headers .= 'To: Rayovac <'.MAIL_TO.'>' . "\r\n";
	$headers .= 'From: Contato via Site <naoresponder@rayovac.com.br>' . "\r\n";
	
	$subject = 'Contato via Site - '.$_POST['assunto'];
	
	if($_POST['newsletter']){ $newsletter = 'Sim'; }else{ $newsletter = 'Não'; }
	
	$message = '<b>Nome:</b> '.$_POST['nome'].' '.$_POST['sobrenome'].'<br>'; 
	$message .= '<b>Email:</b> '.$_POST['email'].'<br>';
	$message .= '<b>Telefone:</b> '.$_POST['telefone'].'<br>';
	$message .= '<b>Celular:</b> '.$_POST['celular'].'<br>'; 
	$message .= '<b>Cidade:</b> '.$_POST['cidade'].' - '.$_POST['estado'].'<br>';
	$message .= '<b>Mensagem:</b> '.nl2br($_POST['mensagem']).'<br>'; 
	$message .= '<b>Newsletter:</b> '.$newsletter.'<br>';
	
	if(wp_mail( MAIL_TO, $subject, $message, $headers )){
		$get = '?envio=ok';
	}else{
		$get = '?envio=erro';
	}
	
	wp_redirect( $_POST['return'].$get );
	die();
}
add_action('admin_post_sendForm', 'sendForm');
add_action('admin_post_nopriv_sendForm', 'sendForm');

//related posts query
function get_related_category_posts($id_post){
	//for use in the loop, list 5 post titles related to first tag on current post
	$tags = wp_get_post_tags($id_post);
	$category = get_the_category($id_post);
	if ($tags) {
		$first_tag 	= $tags[0]->term_id;
		$first_cat	= $category[0]->cat_id;
		$args=array(
			'tag__in' => array($first_tag),
			'post__not_in' => array($id_post),
			'posts_per_page'=>4,
			//'caller_get_posts'=>1,
			//'category__in'=> array($first_cat),
			'orderby'=>'rand',
		);
		
		$my_query = new WP_Query($args);
		
		wp_reset_query();
		return $my_query;
	}
}

//mascara de campos

/**	exemplos
	$cnpj = '17804682000198';
	echo Mask("##.###.###/####-##",$cnpj).'<BR>';
	
	$cpf = '21450479480';
	echo Mask("###.###.###-##",$cpf).'<BR>';
	
	$cep = '36970000';
	echo Mask("#####-###",$cep).'<BR>';
	
	$telefone = '3391922727';
	echo Mask("(##)####-####",$telefone).'<BR>';
	
	$data = '21072014';
	echo Mask("##/##/####",$data);
*/
function Mask($mask,$str){

    $str = str_replace(" ","",$str);

    for($i=0;$i<strlen($str);$i++){
        $mask[strpos($mask,"#")] = $str[$i];
    }


    return str_replace('#', '', $mask);

}

// Custom WordPress Login Logo
function cutom_login_logo() {
echo "<style type=\"text/css\">
body.login div#login h1 a {
background-image: url(".get_bloginfo('template_directory')."/files/img/logo-rayovac.jpg);
-webkit-background-size: auto;
background-size: auto;
margin: 0 0 25px;
width: 320px;
}
</style>";
}
add_action( 'login_enqueue_scripts', 'cutom_login_logo' );

//custom post types 
require get_template_directory() . '/inc/custom-post-types.php';

require get_template_directory() . '/inc/ajax-requests.php';

?>
