<?php
/**
 * @package WordPress
 * @subpackage Amaral Aguiar
 *
 * Content Page for Post Type area_atuacao
 */

get_header(); ?>

  <!-- areas-atuacao-content -->
  <section class="main-atuacao">
    <div class="container">

      <?php echo wp_get_attachment_image( get_field('imagem_de_capa'), 'banner-atuacao', false, ['class' => 'img-fluid', 'title' => get_the_title()] ); ?>

      <h2 class="custom_amag"><?php the_title(); ?></h2>

      <div class="row text-justify no-gutters">
        <div class="col-md-12 col-lg-6">
            <?php the_field('texto_coluna_1'); ?>
        </div>

        <div class="col-md-12 col-lg-6">
            <?php the_field('texto_coluna_2'); ?>
        </div>
      </div>

    </div>
  </section>

  <section class="lista-atuacao">
    <div class="container">
        <h3>Atuação</h3>
    </div>

    <div class="container bg-image d-xs-flex align-items-xs-center" style="background-image: url(  <?php the_field('imagem_lista'); ?>);">
      <div class="row">
      <?php $middle = round(count(get_field('lista')) / 2) ?>

        <ul class="col-sm-6">
          <?php $i=1; foreach(get_field('lista') as $lista){ ?>

              <li><?php echo $lista['linha']; ?></li>

              <?php if($middle == $i){?></ul><ul class="col-sm-6"><?php }?>

          <?php $i++;}?>
        </ul>
      </div>
    </div>
  </section>
  <!-- \/areas-atuacao-content\/ -->

<?php get_footer(); ?>
