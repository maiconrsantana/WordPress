<?php 
    $posts = get_posts(array(
        'post_type'         => 'chamadas',
        'order' 			=> 'ASC',
    )); 
?>

<script>
    //Initialise Bootstrap Carousel Touch Slider
    // Curently there are no option available.
    <?php for($i=0; $i <= count($posts); $i++){ ?>
        $('#bootstrap-touch-slider-<?php echo $i; ?>').bsTouchSlider();
    <?php }?>
</script>

<div class="container featured">
    <?php $i=0; foreach( $posts as $post ){ ?>
        <div class="row no-gutter">
            
            <!-- produto -->
            <div class="col-md-5 <?php if($i%2){ ?>col-md-push-7<?php }?>">
                <!-- <?php echo get_the_term_list( $post->ID, 'category_prod', '<span>', ' / ', '</span>' ); ?> -->
                <?php if(get_field('categoria')){ ?>
                <?php if(get_field('link_categoria')){ ?>
                <a href="<?php the_field('link_categoria') ?>">
                <?php } ?>
                <span>
                    <?php echo the_field('categoria')?>
                </span>
                <?php if(get_field('link_categoria')){ ?>
                </a>
                <?php } ?>
                <?php } ?>

                <h2><?php the_field('titulo') ?></h2>
                
                <?php if(get_field('descricao')){ ?>
                    <p><?php the_field('descricao') ?></p>
                <?php } ?>

                <?php if(get_field('link')){ ?>
                    <a class="default" href="<?php the_field('link') ?>">Saiba mais</a>
                <?php } ?>
                
                <?php if(get_field('imagem_de_destaque')){ ?>
                    <?php echo wp_get_attachment_image(get_field('imagem_de_destaque'), '', '', array('class' => 'img-responsive')); ?>
                <?php }?>
            </div>
            
            <div class="col-md-7 <?php if($i%2){ ?>col-md-pull-5<?php }?>">
                <!-- slider -->
                <div class="slider middle">
                    <div id="bootstrap-touch-slider-<?php echo $i; ?>" class="carousel bs-slider slide  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >
                
                    <!-- Wrapper For Slides -->
                    <div class="carousel-inner" role="listbox">
                
                        <?php $k=1; foreach( get_field('slide') as $slide ){ ?>
                            <div class="item <?php if($k==1){?>active<?php }?>">
                    
                                <!-- Slide Background -->
                                <?php echo wp_get_attachment_image($slide['id'], 'banner-small-img', '', array('class' => 'slide-image')); ?>
                                <!--<div class="bs-slider-overlay"></div>-->
                    
                            </div>
                            <!-- End of Slide -->
                        <?php $k++;}?>
                
                    </div><!-- End of Wrapper For Slides -->
                    
                    <?php if(count(get_field('slide')) > 1){ ?>
                        <!-- Left Control -->
                        <a class="left carousel-control" href="#bootstrap-touch-slider-<?php echo $i; ?>" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                    
                        <!-- Right Control -->
                        <a class="right carousel-control" href="#bootstrap-touch-slider-<?php echo $i; ?>" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    <?php }?>
                    
                </div> <!-- End  boots -->
                </div>
            </div>    
        </div>
    <?php $i++;}?>
</div>