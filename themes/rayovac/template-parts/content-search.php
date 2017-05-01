<?php
/**
 * The template part for displaying results in search pages
 *
 */

?>

<div class="search search-posts">
	<div class="row">
        <?php
        // Start the loop.
        $i=0; while ( have_posts() ) : the_post();
		?>
		
       
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                         <a href="<?php echo $post->guid; ?>"><?php the_post_thumbnail('min-img', array('class' => 'img-responsive width-100')); ?></a>
                    </div>
                    <div class="col-sm-12 col-md-6 content">
                        <?php if($post->post_type == 'produtos'){ ?>
                            <span class="type"><?php echo $post->post_type ?></span>
                            <span class="title"><?php the_title(); ?></span>
                            
                            <p class="desc"><?php echo mb_strimwidth(wp_strip_all_tags( get_field('descricao') ), 0, 160, '[...]'); ?></p>
                        <?php }else{?>
                            <?php $category = get_the_category( $id ); ?>
                            <span class="type"><?php echo $category[0]->cat_name; ?></span>
                            <span class="title"><?php the_title(); ?></span>
                            
                             <a href="<?php echo $post->guid; ?>"><p class="desc"><?php echo mb_strimwidth(wp_strip_all_tags( get_the_content() ), 0, 100, '[...]'); ?></p></a>
                        <?php }?>
                    </div>
                </div>
            </div>
           
       <?php $i++; endwhile; ?>
    </div>
	
</div><!-- #post-## -->

