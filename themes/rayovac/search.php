<?php
/**
 * The template for displaying search results pages
 *
 */

get_header(); ?>

<div class="container search">

    <div class="row">
        <form class="navbar-form page-search" method="get" action="<?php echo site_url(); ?>">
            <div class="input-group stylish-input-group">
                <input type="text" class="form-control" name="s" value="<?php echo esc_html( get_search_query() ); ?>" placeholder="O que você procura?" required>
                <span class="input-group-addon">
                    <button type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>  
                </span>
            </div>
	        <div class="count"><?php echo 'mostrando ' . $wp_query->post_count . ' resultado'; if($wp_query->post_count != 1){ echo 's';} ?></div>
        </form>
    </div>

</div>
	  

<div class="bg-title">
  <div class="container">
    <?php if ( have_posts() ) :
            
            get_template_part( 'template-parts/content', 'search' );
        
    else: ?>
  
        <h2 class="page-title">
            Nenhum conteúdo encontrado<br>para o termo
        </h2>
    
    <?php endif; ?>
    

  </div>
</div>
	
<?php get_footer(); ?>
