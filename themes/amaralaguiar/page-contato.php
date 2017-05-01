<?php
/**
 * @package WordPress
 * @subpackage Amaral Aguiar */

get_header(); ?>

<!-- contato-content -->
<section class="contato">
  <div class="container">
    <?php if(get_field('banner')){ ?>
      <img src="<?php the_field('banner'); ?>" class="img-fluid" />
    <?php }?>

    <h2 class="custom_amag">Fale Conosco</h2>

    <div class="row no-gutters">
      <div class="col-md-12 col-lg-6">
          <h5><a href="<?php echo site_url('duvidas'); ?>">Clique aqui e confira as dúvidas mais comuns</a> ou envie a sua pelo formulário abaixo.</h5>

          <div class="form-contato">
    			   <form method="post" action="/wp-admin/admin-post.php">
                <div class="form-group">
                  <label class="label" for="name">Nome (obrigatório)</label>
                  <input type="text" class="form-control" name="name" id="name" required="required">
                </div>
                <div class="form-group">
                  <label class="label" for="email">E-mail (obrigatório)</label>
                  <input type="email" class="form-control" name="email" id="email" required="required">
                </div>
                <div class="form-group">
                  <label class="label" for="contact">Telefone</label>
                  <input type="text" class="form-control" name="phone" id="phone">
                </div>
                <div class="form-group">
                  <label class="label" for="subject">Assunto (obrigatório)</label>
                  <input type="text" class="form-control" name="subject" id="subject" required="required">
                </div>
                <div class="form-group">
                  <label class="label" for="message">Mensagem (obrigatório)</label>
                  <textarea rows="14" class="form-control" name="message" id="message" required="required"></textarea>
                </div>

                <div class="form-group col-md-12">
                  <input type="hidden" name="action" value="sendForm" >
                  <input type="hidden" name="return" value="<?php echo site_url('contato');?>" >
                  <input type="hidden" name="email_to" value="<?php echo the_field('email');?>" >
                  <input type="submit" class="btn btn-primary pull-right" value="Enviar" >
                </div>
              </form>
            </div>
      </div>

      <div class="col-md-12 col-lg-6">
          <div class="address">
            <?php the_field('endereco'); ?>
          </div>

          <div class="fone">
            <a class="nav-link tel no-padding" href="tel: <?php the_field('telefone'); ?>"><?php the_field('telefone'); ?></a>
          </div>

          <div class="email">
            <a class="nav-link mail no-padding" href="mailto: <?php the_field('email'); ?>"><?php the_field('email'); ?></a>
          </div>

          <?php the_field('mapa'); ?>
      </div>
    </div>
  </div>

  <div class="clearfix" style="height: 35px;"></div>

</section>
<!-- \/contato-content\/ -->

<?php get_footer(); ?>
