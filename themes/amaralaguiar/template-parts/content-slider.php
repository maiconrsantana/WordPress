<?php
  //register scripts
  wp_enqueue_style( 'touchSlider', get_template_directory_uri() . '/files/css/slider.min.css' );
  wp_enqueue_script( 'touchSlider JS', get_template_directory_uri() . '/files/js/jquery.touchSlider.min.js' );

  //get data
  $args = array();
  $args['post_type'] 	= 'banners';
  //$args['orderby']  = 'rand';
  //$args['order']	  = 'desc';

  $posts = new WP_Query( $args );
 ?>

<script type="text/javascript">

	$(document).ready(function(){
		$('#mainSlider').touchSlider({
			mode: 'index',
			center: true,
      StartAuto: true,
      AutoSlideInterval: 8000,
      PauseOnHover: true,
		});

    <?php if($posts->post_count > 1) : ?>
  		$('.moveTo').bind('click', function(){
           var toSlider = $(this).attr('data-slider-position');
           $('#mainSlider').get(0).moveTo(toSlider);
           //$(this).addClass('active');
  			return false;
  		})
    <?php endif; ?>
	});
</script>

		<div class="gallery-holder">
			<div class="gallery" id="mainSlider">
				<div class="holder">
					<div class="list">

            <?php
		          // Start the loop.
		           $i=0; while ( $posts->have_posts() ) : $posts->the_post();
	          ?>
						<div class="item <?php if($i==0){ echo 'active'; }?>" data-item="<?php echo $i; ?>">
							<div class="ibox">
								<div class="sliderContent">
									<div class="sliderContainer">
										<h2 class="custom_amag"><?php the_field('titulo'); ?></h2>
										<p><?php the_field('frase'); ?></p>
										<a href="<?php the_field('links_botao'); ?>" class="btn btn-primary"><?php the_field('texto_botao'); ?></a>
									</div>
								</div>
								<img src="" data-img-desktop="<?php the_field('imagem_de_fundo_desktop'); ?>" data-img-mobile="<?php the_field('imagem_de_fundo_mobile'); ?>" />
							</div>
						</div>
            <?php $i++; endwhile; ?>

					</div>
				</div>
        <?php if($posts->post_count > 1) : ?>
          <div class="bullets">
            <?php for($k=0; $k < $posts->post_count; $k++){ ?>
    				    <a href="#" class="moveTo <?php if($k==0){ echo 'active'; }?>" data-slider-position="<?php echo $k;?>" ><?php echo $k+1;?></a>
            <?php }?>
          </div>
        <?php endif; ?>
			</div>
		</div>

		<div id="console"></div>
