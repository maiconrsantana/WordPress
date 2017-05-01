<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Rayovac
 */
?>


<?php $thumb    =   get_the_post_thumbnail_url( get_the_ID(), 'banner-img' ); ?>
<?php $content  =   apply_filters('the_content', get_post_field('post_content', get_the_ID())); ?>

<?php if($thumb){ ?>
    <style> body { margin-top: 0 !important;} </style>
<?php }?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <!-- slider -->
    <?php if($thumb){ ?>
    <div class="slider container">
        <img class="img-responsive-full" src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'banner-img' ) ?>" />
    </div>
    <?php }?>
    
    <!--content-->
    <section class="content-post">
        <div class="container">
            <div class="row container-post <?php if($thumb){ ?>margin-top<?php }?>">
                <div class="col-md-6">
                    <?php $category = get_the_category( get_the_ID() ); ?>
                    <span class="type"><?php echo $category[0]->cat_name; ?></span> 
                </div>      
                
                <div class="col-md-12">
                    <h1><?php the_title(); ?></h1>
                </div>
                
                <div class="col-md-12 entry-content">
                    <?php echo $content; ?>
                </div>
                
                <div class="col-md-12 footer-post">
                    <div class="col-md-6">
                        <span class="entry-date"><?php echo get_the_date(); ?></span>
                    </div>
                    <div class="col-md-6">
                        <a href="<?php echo get_permalink();?>" onclick="window.print();"><span class="">imprimir</span></a>
                        <!-- <span class="">enviar por email</span> -->

                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- fim content-->
          
</article>

<!--relacionados-->
<section class="related-post">

    <?php 
        $posts = get_related_category_posts(get_the_ID());
    ?>
    
     <div class="container search">
        <div class="row">
            <div class="col-md-12"><h3>Relacionados</h3></div>
        </div>
        <?php
            // Start the loop.
            $i=0; while ( $posts->have_posts() ) : $posts->the_post();
            ?>
            
            <a href="<?php echo $post->guid; ?>">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <?php the_post_thumbnail('min-img', array('class' => 'img-responsive')); ?>
                        </div>
                        <div class="col-md-6 content">
                                <span class="title"><?php the_title(); ?></span>
                                
                                <p class="desc"><?php echo mb_strimwidth(wp_strip_all_tags( get_the_content() ), 0, 160, '[...]'); ?></p>
                        </div>
                    </div>
                </div>
            </a>
               
           <?php $i++; endwhile; ?>
        </div>
    
</section>

<!--fim big numbers-->



