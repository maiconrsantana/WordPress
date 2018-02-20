<?php
/**
 * Index Publicações
 *
 * @package WordPress
 * @subpackage Almeida Advogados
 * 
 */
?>

<?php get_header(); ?>

<?php almd_header( get_the_title(), get_field('banner'), 'equipe_index' ) ?>

<?php
	$page=1;
	if(isset($_GET['pagina'])) {
		$page = $_GET['pagina'];
	}

	//$cat = get_category( get_query_var( 'cat' ) );
	//$cat_slug = $cat->slug;
?>

<div class="space"></div>

<div class="container-fluid menu_news d-flex justify-content-center">
<?php $menu_array = wp_get_nav_menu_items('menu-news'); ?>
	<div class="row text-center padding">
		<div class="col-12">
			<ul>
				<li> <a id="todos" onclick="get_posts('todos')">Artigos Almeida </a></li>
				<?php foreach($menu_array as $menu){ ?>
					<li> <a id="<?php echo get_cat_slug($menu->object_id) ?>" onclick="get_posts('category', '<?php echo get_cat_slug($menu->object_id) ?>')" ><?php echo $menu->title ?></a> </li>
				<?php }?>
			</ul>
		</div>
	</div>
</div>


<div class="container-fluid last-news">
      
    <div id="div_busca"></div>

    <div id="loading" class="text-center">
    	<img src="<?php echo get_stylesheet_directory_uri().'/files/img/loading.gif'; ?>" />
    </div>

    <div class="space"></div>
  
    <div class="row">
        <div class="col-md-12 text-center">
            <a id="btn_ver_mais" href="javascript: pagination();" data-page="<?php echo $page+1 ?>" data-type="todos" data-term=" " class="links-more"> VER MAIS </a>              
        </div>
    </div>

</div>    


<script>
	set_page(<?php echo $page ?>);
	get_posts('todos', '');
</script>
            

<div class="space"></div>

<div class="space"></div>

<!-- \/home-content\/ -->

<?php get_footer(); ?>
