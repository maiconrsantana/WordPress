<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage rayovac
 */

?>

<script>
	//Initialise Bootstrap Carousel Touch Slider
	// Curently there are no option available.
		$('#bootstrap-touch-slider-<?php $post->ID; ?>').bsTouchSlider();
</script>

<article id="post-<?php $post->ID; ?>" <?php post_class(); ?>>
	<div class="container prods">
		<div class="row row_first">
        	<div class="col-md-offset-1 col-md-4 text">
            	<?php $term = get_the_terms($post->ID, 'category_prod'); ?>
                
            	<span class="type">Produtos / <?php echo $term[0]->name; ?></span>
                <h2><?php the_title(); ?></h2>
				<?php if(get_field('descricao')){ ?>
                	<p><?php the_field('descricao') ?></p>
                <?php }?>
            </div>
            
            <!-- buscar tamanhos -->
            <?php $get = 1; ?>
			
			<?php 
				if(get_field('tamanho_grupo')){ 
					$array = get_field('tamanho_grupo');
					if(isset($_GET['tamanho'])){ $get = $_GET['tamanho']; }
					$field = 'tamanho'; 
				}
 
				if(get_field('modelo_grupo')){ 
					$array = get_field('modelo_grupo');
					if(isset($_GET['modelo'])){ $get = $_GET['modelo']; }
					$field = 'modelo'; 
				}
				
				if(get_field('formato_grupo')){ 
					$array = get_field('formato_grupo');
					if(isset($_GET['formato'])){ $get = $_GET['formato']; }
					$field = 'formato'; 
				}
			?>
            
            <div class="col-md-offset-1 col-md-5">
            	<div id="bootstrap-touch-slider-<?php echo $i; ?>" class="carousel bs-slider slide control-round indicators-line" data-ride="carousel" data-interval="0" >
                  <?php if(count($array) > 0){ ?>
                        <!-- Left Control -->
                        <a class="left carousel-control" data-role-prod="true" href="#bootstrap-touch-slider-<?php $post->ID; ?>" role="button" data-slide="prev">
                            <span class="glyphicon" aria-hidden="true"><img src="<?php echo get_template_directory_uri().'/files/img/arrow_left_red.png'; ?>"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                    
                        <!-- Right Control -->
                        <a class="right carousel-control" data-role-prod="true" href="#bootstrap-touch-slider-<?php $post->ID; ?>" role="button" data-slide="next">
                            <span class="glyphicon" aria-hidden="true"><img src="<?php echo get_template_directory_uri().'/files/img/arrow_right_red.png'; ?>"></span>
                            <span class="sr-only">Next</span>
                        </a>
                   <?php }?>
                   
                    <!-- Wrapper For Slides -->
                    <div class="carousel-inner" role="listbox">
                		
                        <!-- imagem padrão da categoria -->
                        <div data-slide="<?php echo $field.'_';?>" class="item <?php if($get == 1){ ?>active<?php }?>">
                                <!-- Slide Background -->
                                <?php echo wp_get_attachment_image(get_field('imagem'), 'banner-small-img', '',  array('class' => 'slide-image-prod img-responsive center-block')); ?>
                        </div>
                        
						
						<?php $k=1; foreach( $array as $ar ){ ?>
                            <div data-slide="<?php echo $field.'_'.ry_to_slug($ar[$field.'_nome']);?>" class="item <?php if(ry_to_slug($ar[$field.'_nome']) == $get){?>active<?php }?>">
                    
                                <!-- Slide Background -->
                                <div class="box-slide">
                                <?php echo wp_get_attachment_image($ar[$field.'_prod'], 'banner-small-img', '', array('class' => 'slide-image-prod img-responsive center-block')); ?>
                                </div>
                    
                            </div>
                            <!-- End of Slide -->
                        <?php $k++;}?>
                
                    </div><!-- End of Wrapper For Slides -->
                   
            	</div>
            </div>
        </div>
		
        <div class="clearfix"></div>
        
        <div class="row">            
            
            <?php if(get_field('tamanhos_array') == 'Sim'){ ?>
                <div class="row col-md-offset-1 col-md-5 col-md-push-6">
                    <h4><b>Tamanhos disponíveis</b></h4>
                    <?php $k=1; foreach( $array as $ar ){ ?>
                    	<div class="icones <?php if(ry_to_slug($ar['tamanho_nome']) == $get){?>active<?php }?>" data-icon="tamanho_<?php echo ry_to_slug($ar['tamanho_nome']); ?>">
							<?php echo wp_get_attachment_image($ar['tamanho_icone'], '', '', array('class' => '')); ?>
                        	<br>
							<?php echo $ar['tamanho_nome']; ?>
                        </div>
                    <?php }?>
                </div>
            <?php }?>

            <?php if(get_field('modelos_array') == 'Sim'){ ?>
                <div class="row col-md-offset-1 col-md-7 col-md-push-5">
                <!--<div class="row col-md-offset-1 col-md-5 col-md-push-6">-->
                    <h4><b>Modelos disponíveis</b></h4>
                    <?php $k=1; foreach( $array as $ar ){ ?>
                    	<div class="icones col-xs-2 text-center <?php if(ry_to_slug($ar['modelo_nome']) == $get){?>active<?php }?>" data-icon="modelo_<?php echo ry_to_slug($ar['modelo_nome']); ?>">
							<?php echo wp_get_attachment_image($ar['modelo_icone'], '', '', array('class' => '')); ?>
                        	<br>
							<?php echo $ar['modelo_nome']; ?>
                        </div>
                    <?php }?>
                </div>
            <?php }?>

            <?php if(get_field('formatos_array') == 'Sim'){ ?>
                <div class="row col-md-offset-1 col-md-6 col-lg-2 col-md-push-6">
                    <h4><b>Formatos disponíveis</b></h4>
                    <?php $k=1; foreach( $array as $ar ){ ?>
                    	<div class="icones <?php if(ry_to_slug($ar['formato_nome']) == $get){?>active<?php }?>" data-icon="formato_<?php echo ry_to_slug($ar['formato_nome']); ?>">
							<?php echo wp_get_attachment_image($ar['formato_icone'], '', '', array('class' => '')); ?>
                        	<br>
							<?php echo $ar['formato_nome']; ?>
                        </div>
                    <?php }?>
                </div>
            <?php }?>
			
            <?php if(get_field('potencia') or get_field('voltagens')){ ?>
                <div class="row no-gutter col-md-offset-1 col-lg-offset-0 col-md-3 col-lg-3 col-md-push-3 col-lg-push-7">
                    <?php if(get_field('potencia')){ ?>
                    	<div class="col-md-6">
                            <h4><b>Potências</b></h4>
                            <?php foreach( get_field('potencia') as $pt ){ ?>
                                <?php echo $pt['label']; ?><br>
                            <?php }?>
                        </div>
                	<?php }?>	
                    
					<?php if(get_field('voltagens')){ ?>
                    	<div class="col-md-6">
                            <h4><b>Voltagens</b></h4>
                            <?php foreach( get_field('voltagens') as $vt ){ ?>
                                <?php echo $vt['label']; ?><br>
                            <?php }?>
						</div>
                	<?php }?>	
                </div>
            <?php }?>
			

            <!-- dicas lâmpadas -->
            <?php if(get_field('formatos_array') == 'Sim'){ ?>
                <div class="row col-md-3 col-md-pull-8 col-lg-pull-4">
                    <h4><b>Luz branca ou amarela?</b></h4>
                    <div class="row luz no-gutter">
                        <div class="col-xs-2 col-md-2">
                            <img class="img-responsive" src="<?php echo get_template_directory_uri().'/files/img/produtos/luz-branca.jpg'; ?>" />
                        </div>
                        <div class="col-xs-8 col-md-9 col-md-offset-1">
                            <h4>Luz branca</h4>
                            <p>Melhor visualização de detalhes.</p> 
                            <p>Para ambientes como cozinhas ou banheiros.</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-2 col-md-2">
                            <img class="img-responsive" src="<?php echo get_template_directory_uri().'/files/img/produtos/luz-amarela.jpg'; ?>" />
                        </div>
                        <div class="col-xs-8 col-md-9 col-md-offset-1">
                            <h4>Luz amarela</h4>
                            <p>Sensação de um ambiente mais aconchegante.</p> 
                            <p>Para ambientes como sala de estar ou quarto.</p>
                        </div>
                	</div>
                 </div>
            <?php }?>
            
            <!-- icones melhor uso -->
			<?php if(get_field('melhor_uso')){ ?>
            	<?php if($term[0]->name == 'Lanternas'){ ?>
            		<div class="row col-md-3 col-lg-4 col-md-pull-8 col-md-pull-6">
                <?php }else{ ?>
             		<div class="row col-md-3 col-lg-4 col-md-pull-8 col-md-pull-4">
                <?php }?>
                    
                    <h4><b>Melhor uso</b></h4>
                    <?php foreach( get_field('melhor_uso') as $mu ){ ?>
                        <img src="<?php echo get_template_directory_uri().'/files/img/produtos/icon_'.$mu['value'].'.jpg'; ?>" alt="<?php echo $mu['label']; ?>">
                    <?php }?>
            	</div>
            <?php }?>

        </div>

	</div><!-- .content-area -->
    
    <?php if(get_field('quando_usar') and get_field('quando_usar_descricao')){ ?>
	<div class="container when_use" style="background-image: url('<?php the_field('quando_usar_background'); ?>');">
		<div class="row">
        	<div class="col-md-offset-1 col-md-5">
            	
            	<h2><?php the_field('quando_usar') ?></h2>
                <p><?php the_field('quando_usar_descricao') ?></p>
                
                <?php if(get_field('quando_usar_link')){ ?>
                	<a class="default" href="<?php the_field('quando_usar_link') ?>">Saiba mais</a>
                <?php } ?>
                
            </div>
        </div>
	</div><!-- .content-area -->
    <?php }?>
    
    <?php if(get_field('video') and get_field('video_thumb')){ ?>
    <div class="container video">
        <?php echo wp_get_attachment_image(get_field('video_thumb'), '', '', array('data-toggle' => 'modal', 'data-target' => '#modal-video', 'class' => 'img-responsive')); ?>
    </div>    
    <?php }?>
    
    <!-- outros produtos -->
    <?php get_template_part( 'template-parts/content', 'outros-produtos' ); ?>
    
</article>

<!-- Modal -->
<?php if(get_field('video')){ ?>
    <div class="modal fade" id="modal-video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-content-one">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <!--<h4 class="modal-title" id="myModalLabel">Title</h4>-->
                </div>
                <div class="modal-body">
                    <video controls>
                    <source src="<?php the_field('video') ?>" type="video/mp4">
                    Seu navegador não suporta o arquivo de vídeo.
                    </video>
                </div>
            </div>
        </div>
    </div>
<?php }?>