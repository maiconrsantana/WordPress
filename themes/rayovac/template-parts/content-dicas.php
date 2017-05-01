<?php
/**
 * The template part for displaying results in blog pages
 *
 */
		
?>
<div class="buttons container">
	<div class="row">
    	<div class="col-xs-3 btn_cat" data-filter="saude">
        	Saúde
        </div>
        <div class="col-xs-3 btn_cat" data-filter="familia">
        	Família
        </div>
        <div class="col-xs-3 btn_cat" data-filter="aventura">
        	Aventura
        </div>
        <div class="col-xs-3 btn_cat" data-filter="acessorios">
        	Acessórios
        </div>

    </div>
</div>

<div id="dicas" class="search dicas">
	   
    <div class="row">
        <?php
        // Start the loop.
        while ( $posts->have_posts() ) : $posts->the_post();
		?>
		
       
            <div class="col-xs-12 col-sm-6 col-md-6">

                <div class="row">
                    <div class="col-sm-12 col-md-6">
                         <a href="<?php echo $post->guid; ?>"><?php the_post_thumbnail('min-img', array('class' => 'img-responsive width-100')); ?></a>
                    </div>
                    <a href="<?php echo $post->guid; ?>">
                    <div class="col-sm-12 col-md-6 content">
                            <?php $category = get_the_category( $id ); ?>
<!--                            <span class="type"><?php echo $category[0]->cat_name; ?></span> -->
                            <?php $category = get_the_category( $id ); ?>
                           <span class="title"><?php the_title(); ?></span>
                            <p class="desc"><?php echo mb_strimwidth(( get_the_content() ), 0, 100, '[...]'); ?></p>
                    </div>
                    </a>
                </div>
            </div>
       <?php endwhile; ?>
     </div>

</div><!-- #post-## -->

<div class="col-md-12 text-center loading"><img src="<?php echo get_template_directory_uri().'/files/img/ellipsis.svg'; ?>" alt="loading"></div>

<div class="col-md-12 text-center btn_see_more" data-target="see_more" data-category="all" data-page="6" >Ver mais</div>

<input type="hidden" id="link" value="<?php echo site_url(); ?>" />
