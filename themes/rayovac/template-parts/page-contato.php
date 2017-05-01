<?php wp_enqueue_script( 'mask', get_template_directory_uri().'/files/js/jquery.mask.min.js', array( 'jquery' ) ); ?>

<script>
	//Initialise Bootstrap Carousel Touch Slider
	// Curently there are no option available.
	$('#bootstrap-touch-slider').bsTouchSlider();

    var SPcel = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
spOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(SPcel.apply({}, arguments), options);
    }
};
	
	$( document ).ready(function() {
		//confirm mail
		var email = document.getElementById("email")
		  , confirm_email = document.getElementById("confirm_email");
		
		function validateEmail(){
		  if(email.value != confirm_email.value) {
			confirm_email.setCustomValidity("Campos de email não conferem");
		  } else {
			confirm_email.setCustomValidity('');
		  }
		}
		
		email.onchange = validateEmail;
		confirm_email.onkeyup = validateEmail;


		
		//jquery mask
		$('#telefone').mask('(00) 0000-0000');
        $('#celular').mask(SPcel, spOptions);
	});


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
    
    <?php if(isset($_GET['envio'])){ ?>
		<?php if($_GET['envio'] == 'erro'){ ?>
            <div class="alert alert-danger" style="margin-top:20px; text-align:center; position: relative;
    z-index: 9999;">
            	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Erro ao enviar a mensagem!</strong> <br> Por favor, tente novamente.
            </div>
    	<?php }else{ ?>
            <div class="alert alert-success" style="margin-top:20px; text-align:center; position: relative;
    z-index: 9999;">
            	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Mensagem enviada!</strong> <br> Você receberá sua resposta em breve.
            </div>
        <?php }?>
	<?php }?>

    <!--middle-->
    <section class="middle">
        <div class="contato-container">
            <div class="row">
                <div class="col-md-offset-1 col-md-5">
                    <h2>Dúvidas frequentes (FAQ)</h2>
                    <p>Antes de enviar sua mensagem, confira se sua dúvida já não foi respondida em nossa lista de perguntas mais comuns.</p>
                	
                    <div class="clearfix" style="height:20px"></div>
                    <a class="default" href="<?php echo site_url('/duvidas-frequentes'); ?>">Confira</a>
                    
                    <img class="img-responsive" src="<?php echo get_template_directory_uri().'/files/img/lanterna_contato.jpg'; ?>" alt="contato">
                </div>
            
                <div class="col-md-5 col-md-offset-1 row">
                    <h2>Envie-nos sua mensagem</h2>
                    <p>Se preferir, envie-nos uma mensagem preenchendo o formulário abaixo.</p>
                    
                        <form id="contato" action="<?php echo site_url('/wp-admin/admin-post.php'); ?>" method="post" >
                        	
                            <select name="assunto" class="col-md-12" aria-required="true" aria-invalid="false" required>
                                <option value="">Assunto</option><option value="Dúvidas">Dúvidas</option>
                                <option value="Sugestões">Sugestões</option>
                            </select>
                            
                            <input name="nome" value="" size="40" class="col-md-6" aria-required="true" aria-invalid="false" placeholder="Nome" type="text" required>
                           
							<input name="sobrenome" value="" size="40" class="col-md-6" aria-required="true" aria-invalid="false" placeholder="Sobrenome" type="text" required>
                            
                            <input id="email" name="email" value="" size="40" class="col-md-6" aria-required="true" aria-invalid="false" placeholder="Email" type="email" required>
                            
							<input id="confirm_email" name="confirm_email" value="" size="40" class="col-md-6" aria-required="true" aria-invalid="false" placeholder="Confirme o e-mail" type="email" required>
                            
							<input id="telefone" name="telefone" value="" size="40" class="col-md-6" aria-required="true" aria-invalid="false" placeholder="Telefone" type="tel" required>
                            
							<input id="celular" name="celular" value="" size="40" class="col-md-6" aria-invalid="false" placeholder="Celular" type="tel">
                            
							<input name="cidade" value="" size="40" class="col-md-6" aria-required="true" aria-invalid="false" placeholder="Cidade" type="text" required>
                            
                            <input name="estado" value="" size="40" class="col-md-6" aria-required="true" aria-invalid="false" placeholder="Estado" type="text" required>

							<textarea name="mensagem" cols="40" rows="10" class="col-md-12" aria-required="true" aria-invalid="false" placeholder="Mensagem" required></textarea>
                            
                            <label class="col-md-12 txt">
								<input name="newsletter" value="sim" type="checkbox" checked> Gostaria de receber e-mails sobre a Rayovac
							</label>
							                            
							<input type="hidden" name="action" value="sendForm" >
                  			<input type="hidden" name="return" value="<?php echo site_url('/contato');?>" >
                            <input value="Enviar" class="btn" type="submit">
                        </form>
                </div>
            </div>

        </div>
    </section>
    <!-- fim middle-->
    
</main>