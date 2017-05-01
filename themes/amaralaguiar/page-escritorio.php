<?php
/**
 * @package WordPress
 * @subpackage Amaral Aguiar */

get_header(); ?>

<!-- escritorio-content -->
<section class="escritorio">
  <div class="container">
    <?php if(get_field('banner')){ ?>
      <img src="<?php the_field('banner'); ?>" class="img-fluid" />
    <?php }?>

    <h2 class="custom_amag">O Escritório</h2>

    <div class="row text-justify no-gutters">
      <div class="col-md-12 col-lg-6">
          <?php the_field('texto_coluna_1'); ?>
      </div>

      <div class="col-md-12 col-lg-6">
          <?php the_field('texto_coluna_2'); ?>
      </div>
    </div>
  </div>

  <div class="clearfix" style="height: 35px;"></div>

</section>

<section class="row call-to-action escritorio d-xs-flex align-items-xs-center">
  <div class="col-xs-12">
    <h3>Estamos à disposição<br>para ajudá-lo</h3>
  </div>
  <div class="col-xs-12">
    <a href="<?php echo site_url('contato'); ?>" class="btn btn-primary">Consulte</a>
  </div>
</section>

<section class="escritorio fundadores">
  <div class="container">
    <div class="clearfix" style="height: 35px;"></div>

    <h2 class="custom_amag">Sócios Fundadores</h2>

    <div class="row text-justify no-gutters">

      <div class="col-md-12 col-lg-6">
          <?php if(get_field('socios_imagem_perfil_1')){ ?>
              <img src="<?php the_field('socios_imagem_perfil_1'); ?>" class="img-fluid" />
          <?php }?>

          <h3><?php the_field('socios_nome_1'); ?></h3>

          <?php the_field('socios_descricao_1'); ?>
      </div>

      <div class="col-md-12 col-lg-6">
          <?php if(get_field('socios_imagem_perfil_2')){ ?>
              <img src="<?php the_field('socios_imagem_perfil_2'); ?>" class="img-fluid" />
          <?php }?>

          <h3><?php the_field('socios_nome_2'); ?></h3>

          <?php the_field('socios_descricao_2'); ?>
      </div>
    </div>
  </div>

  <div class="clearfix" style="height: 35px;"></div>

</section>
<!-- \/escritorio-content\/ -->

<?php get_footer(); ?>
