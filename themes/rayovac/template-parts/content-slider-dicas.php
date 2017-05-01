<script>
	//Initialise Bootstrap Carousel Touch Slider
	// Curently there are no option available.
	$('#bootstrap-touch-slider').bsTouchSlider();
</script>

<?php 
	$posts = get_posts(array(
		'post_type'			=> 'blog',
		'order' 			=> 'ASC'
	));	
?>

<!-- slider -->
<div class="slider container dicas">
	<div id="bootstrap-touch-slider" class="carousel bs-slider slide  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

    <!-- Indicators -->
    <!--<ol class="carousel-indicators">
        <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
        <li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
        <li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
    </ol>-->

    <!-- Wrapper For Slides -->
    <div class="carousel-inner" role="listbox">

        <?php $i=1; foreach( $posts as $post ){ ?>
            <div class="item <?php if($i==1){?>active<?php }?>">
    
                <!-- Slide Background -->
                <?php /*the_post_thumbnail('banner-img');*/ //the_field('imagem'); die(); ?>
                <?php echo wp_get_attachment_image(get_field('imagem'), 'banner-img', '', array('class' => 'slide-image-dark')); ?>
                <div class="bs-slider-overlay  hidden-sm hidden-xs"></div>
    
                <div class="container">
                    <div class="row">
                        <!-- Slide Text Layer -->
                        <div class="slide-text slide_style_left">
                            <h1 data-animation="animated zoomInRight"><?php the_field('titulo'); ?></h1>
                            <p data-animation="animated fadeInLeft"><?php //the_field('banner_descricao'); ?></p>
                            	<?php if(get_field('link')){ ?>
                                	<a class="default" href="<?php the_field('link'); ?>" data-animation="animated fadeInLeft">Saiba mais</a>
                                <?php }?>
                        	
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Slide -->
        <?php $i++;}?>

    </div><!-- End of Wrapper For Slides -->
	
    <?php if(count($posts) > 1){ ?>
        <!-- Left Control -->
        <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
    
        <!-- Right Control -->
        <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
	<?php }?>
    
</div> <!-- End  boots -->
</div>


