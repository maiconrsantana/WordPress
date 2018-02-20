<?php
/**
 * Template Name: Práticas e Especialidades
 *
 * @package WordPress
 * @subpackage Amaral Aguiar
 * 
 */
?>

<?php get_header(); ?>

<?php
  if(get_field('banner')){
    $banner = get_field('banner');
  }else{
    $banner = get_field('imagem', 'option');
  } 
?>

<?php almd_header( 'post', $banner, false, get_field('logo') ) ?>

<div class="space"></div>

<div class="container-fluid mission">
  
    <div class="row padding">
      
        <div class="col-xl-3 col-lg-2 col-md-2 col-sm-1 col-xs-2"></div>
        
        <div class="col-xl-6 col-lg-8 col-md-8 col-sm-10 col-xs-8 content_setores interna no-padding"> 
                
          <?php while ( have_posts() ) { the_post(); ?>

              <div class="content">
                  <h3 class="categ"> <?php echo strip_tags( get_the_category_list() ); ?> <?php echo get_the_date() ?> </h3>
                  <h1 class="titles"><?php the_title(); ?></h1>
              </div>

              <div class="space"></div>

              <?php the_content(); ?>

          <?php }?>
        
          <div class="col-xl-12 icons text-right">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-print" aria-hidden="true"></i></a>
            <!--<a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>-->
          </div>

          

        </div>
        
        <div class="col-xl-3 col-lg-2 col-md-2 col-sm-1 col-xs-2"></div>
    
    </div>

</div>

<div class="space"></div>

<div class="row">
    <div class="col-md-12 text-center">
        <a href="<?php echo site_url('midia'); ?>" class="links-more hidden-sm-down"> VER TODOS OS ARTIGOS E NOTÍCIAS </a>
        <a href="<?php echo site_url('midia'); ?>" class="links-more hidden-sm-up"> VER TODAS </a>              
        </div>
</div>
  
<div class="space"></div>

<!-- \/home-content\/ -->

<?php get_footer(); ?>

<script>

  //desativar altura automática do header
  disable_header_height = true;
</script>