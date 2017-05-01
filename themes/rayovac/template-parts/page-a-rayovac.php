<script>
    //Initialise Bootstrap Carousel Touch Slider
    // Curently there are no option available.
    $('#bootstrap-touch-slider').bsTouchSlider();
    
$(document).ready(function(){   
    $('.count').each(function () {
        if(isNaN($(this).text()) == false){
			$(this).prop('Counter',0).animate({
				Counter: $(this).text()
			}, {
				duration: 6000,
				easing: 'swing',
				step: function (now) {
					$(this).text(Math.ceil(now));
				}
			});
		}
    });
});
</script>
    
<main class="a-rayovac">

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
    
    <?php $array = get_field('rayovac_texto');?>
    
    <!--middle-->
    <section class="middle">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                	<?php echo wp_get_attachment_image(get_field('imagem'), 'banner-img', '', array('class' => 'img-responsive')); ?>
                </div>
                <?php if($array){?>
                    <div class="col-md-6">
                        <div class="row right">
                            <?php foreach($array as $ar){?>
                                <div class="col-xs-6 col-md-12">
                                    <h2><?php echo $ar['titulo_rayovac']; ?></h2>
                                    <p><?php echo $ar['texto_rayovac']; ?></p>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </section>
    <!-- fim middle-->
    
    <!--big numbers-->
    <section class="big-numbers">
        <div class="container">
            <div class="row container-center">
                <div class="col-md-4 big">
                    <p><span class="count"><?php the_field('rayovac_numeros_1'); ?></span></p>
                    <p><?php the_field('rayovac_texto_1'); ?></p>
                </div>
                <div class="col-md-4 big">
                    <p><span class="count"><?php the_field('rayovac_numeros_2'); ?></span></p>
                    <p><?php the_field('rayovac_texto_2'); ?></p>
                </div>
                <div class="col-md-4 big">
                    <p><span class="count"><?php the_field('rayovac_numeros_3'); ?></span></p>
                    <p><?php the_field('rayovac_texto_3'); ?></p>
                </div>
            </div>
        </div>
    </section>
    <!--fim big numbers-->
    
    <!--bottom-->
    <section class="bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-offset-1 left">
                    <h2>
                        Linha do Tempo
                    </h2>
                    <p>
                        Conheça a história inovadora escrita pela Rayovac de 1906 até os dias atuais.
                    </p>
                    <a href="<?php echo site_url('historia/'); ?>">Saiba mais &#45;></a>
                </div>
                <div class="col-md-6">
                    <img src="<?php echo get_template_directory_uri() ?>/files/img/pilhas-antigas.jpg" class="img-responsive">
                </div>
            </div>
        </div>
    </section>
    <!--fim bottom-->
</main>
