<script>
	//Initialise Bootstrap Carousel Touch Slider
	// Curently there are no option available.
	$('#bootstrap-touch-other-products').bsTouchSlider();
</script>

<?php
	$posts = get_posts(array(
		'post_type'			=> 'produtos',
		'orderby' 			=> 'rand',
		'numberposts'		=> 6,
		'post__not_in' 		=> array(get_the_ID()),
	));
?>

<!-- slider -->
<div class="row">
    <div class="col-xs-offset-1 col-xs-11">
        <h2 class="title-other-products">Conheça nossos outros produtos</h2>
    </div>
</div>

<div class="slider container other-products">
	    
    <div id="bootstrap-touch-other-products" class="carousel bs-slider slide  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

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
        		<?php $category = get_the_terms($post->ID, 'category_prod'); ?>
    			<div class="row">	
    				<div class="col-md-offset-1 col-md-4">
                        <!-- Slide Text Layer -->
                        <div class="slide-text slide_style_left">
                        	<?php $term = get_the_terms($post->ID, 'category_prod'); ?>
                        	<span class="type"><?php echo $term[0]->name; ?></span>
                            <a href="<?php echo site_url().'/produtos/'.$category[0]->slug.'/'.$post->post_name; ?>">
                            <h1><?php echo $post->post_title; ?></h1>
                            </a>
                            <p><?php echo mb_strimwidth(get_field('descricao'), 0, 300, '[...]'); ?></p>
                            <a class="default" href="<?php echo site_url().'/produtos/'.$category[0]->slug.'/'.$post->post_name; ?>">Saiba mais</a>
                        </div>
					</div>
                	
                    <div class="col-md-6">
                        <!-- Slide Background -->
                        <center><?php echo wp_get_attachment_image(get_field('imagem', $post->ID), 'banner-small-img', '', array('class' => 'slide-image img-responsive')); ?></center>
					</div>
                </div>
            </div>
            <!-- End of Slide -->
        <?php $i++;}?>

    </div><!-- End of Wrapper For Slides -->
	
    <?php if(count($posts) > 1){ ?>
        <!-- Left Control -->
        <a class="left carousel-control" href="#bootstrap-touch-other-products" role="button" data-slide="prev">
            <span class="glyphicon" aria-hidden="true"><img src="<?php echo get_template_directory_uri().'/files/img/arrow_left_blue.png'; ?>"></span>
            <span class="sr-only">Previous</span>
        </a>
    
        <!-- Right Control -->
        <a class="right carousel-control" href="#bootstrap-touch-other-products" role="button" data-slide="next">
            <span class="glyphicon" aria-hidden="true"><img src="<?php echo get_template_directory_uri().'/files/img/arrow_right_blue.png'; ?>"></span>
            <span class="sr-only">Next</span>
        </a>
	<?php }?>
    
	</div> <!-- End  boots -->
</div>
