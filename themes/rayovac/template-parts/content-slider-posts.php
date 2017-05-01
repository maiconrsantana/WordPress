<script>
	//Initialise Bootstrap Carousel Touch Slider
	// Curently there are no option available.
	$('#bootstrap-touch-slider-posts').bsTouchSlider();
</script>

<?php 
	$posts = get_posts(array(
		'post_type'			=> 'post',
		'order' 			=> 'DESC',
		'posts_per_page' => 6,
		'meta_query' => array(
			array(
			 'key' => '_thumbnail_id',
			 'compare' => 'EXISTS'
			),
		)
	));
?>

<!-- slider -->
<div class="bottom slider container posts">
	<div id="bootstrap-touch-slider-posts" class="carousel bs-slider slide  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

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
                <?php the_post_thumbnail('banner-img', array('class' => 'slide-image')); ?>
                <!--<div class="bs-slider-overlay"></div>-->
    
    			<div class="row">
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_left">
                        <h1><?php echo $post->post_title; ?></h1>
                        <p><?php echo mb_strimwidth(wp_strip_all_tags( $post->post_content ), 0, 300, '[...]'); ?></p>
                        <a class="default" href="<?php echo $post->guid; ?>">Saiba mais</a>
                    </div>
                </div>
            </div>
            <!-- End of Slide -->
        <?php $i++;}?>

    </div><!-- End of Wrapper For Slides -->
	
    <?php if(count($posts) > 1){ ?>
        <!-- Left Control -->
        <a class="left carousel-control" href="#bootstrap-touch-slider-posts" role="button" data-slide="prev" style="margin-top: -20px;">
            <span class="glyphicon" aria-hidden="true"><img src="<?php echo get_template_directory_uri().'/files/img/arrow_left_blue.png'; ?>"></span>
            <span class="sr-only">Previous</span>
        </a>
    
        <!-- Right Control -->
        <a class="right carousel-control" href="#bootstrap-touch-slider-posts" role="button" data-slide="next" style="margin-top: -20px;">
            <span class="glyphicon" aria-hidden="true"><img src="<?php echo get_template_directory_uri().'/files/img/arrow_right_blue.png'; ?>"></span>
            <span class="sr-only">Next</span>
        </a>
	<?php }?>
    
	</div> <!-- End  boots -->
</div>
