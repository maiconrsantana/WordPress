<?php if(get_field('banner')){ ?>
	<style> body { margin-top: 0 !important;} </style>
<?php }?>

<?php wp_enqueue_script( 'mask', get_template_directory_uri().'/files/js/jquery.mask.min.js', array( 'jquery' ) ); ?>

<script>
	//Initialise Bootstrap Carousel Touch Slider
	// Curently there are no option available.
	$('#bootstrap-touch-slider').bsTouchSlider();
	
</script>

    
<main class="contato container">
	
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
    
    <?php
	//Buscar estados com lojas cadastradas
	$args['post_type']		= 'lojas';
	$args['meta_key']		= 'estado';
    $args['orderby']		= 'meta_value';
    $args['order']			= 'ASC';
	$args['posts_per_page'] = -1;
	
	$posts = new WP_Query( $args ); 
	$states = array();
	
	if($posts->have_posts()){
		while ( $posts->have_posts() ) { $posts->the_post();
			$st = get_field('estado', $post->ID);
			
			$states[$st['value']] = $st['label'];
		};
	}
	?>

    <!--middle-->
    <section class="middle">
        <div class="ondeencontrar container">
            <div class="row">
                <div class="col-md-5 col-md-offset-1">
                    <h2>Encontre uma Rayovac</h2>
                    <!--<p>Lorem ipsum site dolor lorem at amet</p>-->
                	
                    <select id="estado-search" name="estado" class="col-md-12" aria-required="true" aria-invalid="false">
                        <option value="">Escolha seu estado</option>
                        <?php 
                            if(count($states) > 0){
                                foreach( $states as $key => $value ){
                                    echo '<option value="' . $key . '">' . $value . '</option>';
                                }
                            }
                        ?>        
                    </select>
                    
                    <select id="cidade-search" name="cidade" class="col-md-12" aria-required="true" aria-invalid="false">
                        <option value="">Escolha sua cidade</option>
                    </select>
                    
                    <input id="link" type="hidden" value="<?php echo site_url(); ?>">
                </div>
            
                <div id="label" class="col-md-10 col-md-offset-1"></div>
                
				<div class="col-md-12 text-center loading"><img src="<?php echo get_template_directory_uri().'/files/img/ellipsis.svg'; ?>" alt="loading"></div>

                <div id="result" class="col-md-10 col-md-offset-1"></div>
            </div>

        </div>
    </section>
    <!-- fim middle-->
    
</main>