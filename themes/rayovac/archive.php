<?php
/**
 * The template for displaying blog results pages
 *
 */

get_header(); ?>

<?php get_template_part( 'template-parts/content', 'slider-dicas' ); ?>
 
<?php	
	$args = array();
	$args['post_type'] 			= 'post';
	$args['posts_per_page'] 	= 6;
				
	$posts = new WP_Query( $args ); 
?>

<div class="bg-title">
  <div class="container">
   <?php if ( $posts->have_posts() ) :
     
	       	get_template_part( 'template-parts/content', 'dicas' );
    
	else: ?>
  
        <h2 class="page-title">
            Nenhum conteúdo encontrado
        </h2>
    
    <?php endif; ?>
    

  </div>
</div>
	
<?php get_footer(); ?>
