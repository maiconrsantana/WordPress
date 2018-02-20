<?php
/**
 * @package WordPress
 * @subpackage Almeida Advogados
 *
 * Equipe Index Page
 */
?>

<?php get_header(); ?>

<?php almd_header( get_field('subtitulo'), get_field('banner'), 'equipe_index', get_field('logo')) ?>

<div class="space"></div>

<div class="container-fluid equipe">
  
    <div class="row padding xs-no-margin">
      
        <div class="hidden-xlg-down col-lg-2"></div>
        
        <div class="content_setores no-padding"> 
                
          <?php while ( have_posts() ) { the_post(); ?>           
              <div class="content text-center">
                  <?php the_content(); ?>
              </div>
          <?php }?>
        
        </div>
        
        <div class="hidden-xlg-down col-lg-2"></div>
        
    </div>

</div>
<!-- equipe -->

<?php get_template_part('template-parts/content', 'equipe-search') ?>


<!-- Vagas -->
<div class="container-fluid equipe">
  
    <div class="row padding no-padding-md">
      
        <div class="col-xl-4 col-lg-2 col-md-2 col-sm-1 col-xs-2"></div>
        
        <div class="col-xl-4 col-lg-8 col-md-8 col-sm-10 col-xs-8 text-center no-padding-md"> 
              
            <?php while ( have_posts() ) { the_post(); ?>           
              <?php the_field('trabalhe_conosco'); ?>
            <?php }?>
                
        </div>
        
        <div class="col-xl-4 col-lg-2 col-md-2 col-sm-1 col-xs-2"></div>
        
    </div>

</div>

<div class="space sessenta"></div>
<!-- Vagas -->

    

<!-- \/home-content\/ -->

<?php get_footer(); ?>
