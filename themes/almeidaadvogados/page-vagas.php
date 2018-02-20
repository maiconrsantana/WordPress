<?php
/**
 * Template Name: Vagas
 *
 * @package WordPress
 * @subpackage Almeida Advogados
 * 
 */
?>

<?php get_header(); ?>

<?php almd_header( 'Trabalhe no Almeida Advogados', get_field('banner'), 'vagas_index', get_field('logo') ) ?>

<div class="space"></div>

<div class="container-fluid equipe">
  
    <div class="row padding">
      
        <div class="col-xl-4 col-lg-2 col-md-2 col-sm-1 col-xs-2"></div>
        
        <div class="col-xl-4 col-lg-8 col-md-8 col-sm-10 col-xs-8 text-center"> 
                
          <?php while ( have_posts() ) { the_post(); ?>

              <?php the_content(); ?>

          <?php }?>
        
        </div>
        
        <div class="col-xl-4 col-lg-2 col-md-2 col-sm-1 col-xs-2"></div>
        
    </div>

</div>
<!-- Missão -->

<?php echo do_shortcode( '[mrs_contact template="template_1"]' ); ?>

<!-- \/home-content\/ -->

<?php get_footer(); ?>
