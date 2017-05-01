<?php if(get_field('banner')){ ?>
	<style> body { margin-top: 0 !important;} </style>
<?php }?>

<script>
	//Initialise Bootstrap Carousel Touch Slider
	// Curently there are no option available.
	$('#bootstrap-touch-slider').bsTouchSlider();
	
</script>

    
<main class="faq container">
	
	<?php if(get_field('banner')){ ?>
    <!-- slider -->
    <div class="slider container">
    <div id="bootstrap-touch-slider" class="carousel bs-slider slide  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >
    
    <!-- Indicators -->
    <!--<ol class="carousel-indicators">
        <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
        <li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
        <li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
    </ol>-->
    
    <!-- Wrapper For Slides -->
    <div class="carousel-inner" role="listbox">
    
        <?php $i=1; foreach(get_field('banner') as $banner){ ?>
            <div class="item <?php if($i==1){?>active<?php }?>">
    
                <!-- Slide Background -->
                <?php /*the_post_thumbnail('banner-img');*/ //the_field('imagem'); die(); ?>
                <?php echo wp_get_attachment_image($banner['id'], 'banner-img', '', array('class' => 'slide-image')); ?>
    
                <div class="container">
                    <div class="row">
                        <!-- Slide Text Layer -->
                        <div class="slide-text slide_style_left">
                            <h1 data-animation="animated zoomInRight"><?php the_field('titulo'); ?></h1>
                            <p data-animation="animated fadeInLeft"><?php the_field('descricao'); ?></p>
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
    <?php }?>
    
    <div class="buttons container faq">
        <div class="row">
            <div class="col-xs-4 btn_cat active" data-filter-faq="pilhas">
                Pilhas
            </div>
            <div class="col-xs-4 btn_cat" data-filter-faq="lanternas">
                Lanternas
            </div>
            <div class="col-xs-4 btn_cat" data-filter-faq="lampadas">
                Lâmpadas
            </div>    
        </div>
	</div>

    <?php 
		//get faq data
		
		$cat = array(
			'taxonomy' => 'category_prod',
			'field' => 'slug',
			'terms' => 'pilhas',
		);
	
		$posts = get_posts(array(
			'post_type'         => 'faq',
			'order' 			=> 'ASC',
			'posts_per_page'	=> -1,
			'tax_query'			=> array($cat)
		)); 
	?>


    <!--middle-->
    <section class="middle">

    	<div class="col-md-12 text-center loading"><img src="<?php echo get_template_directory_uri().'/files/img/ellipsis.svg'; ?>" alt="loading"></div>

        <div id="faq" class="faq container">
            <div class="row">
                <div class="col-sm-6 col-md-offset-1 col-md-5 indice">
                    <?php
						// Start the loop.
						$i=1; foreach($posts as $post){
							echo '<h4 class="item_faq" data-indice="'.$i.'">'.$i.'. '.get_the_title().'</h3>';
						$i++;};
					?>
                </div>
            
                <div class="col-sm-6 col-md-5 respostas">
                    <?php
						// Start the loop.
						$i=1; foreach($posts as $post){
							echo '<div id="item-'.$i.'" class="item">';
								echo '<div class="faq_answer">'.$i.'. '.get_the_title().'</div>';
								echo '<p>'.the_field('resposta').'</p>';
							echo '</div>';	
						$i++;};
					?>
                </div>
            </div>

        </div>
        
        <div class="col-md-12 text-center btn_see_more" data-target="go_to_top" >Voltar ao topo</div>
        
    </section>
    <!-- fim middle-->
    
    <input type="hidden" id="link" value="<?php echo site_url(); ?>" />
    
</main>