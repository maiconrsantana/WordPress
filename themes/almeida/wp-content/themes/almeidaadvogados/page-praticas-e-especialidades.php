<?php
/**
 * @package WordPress
 * @subpackage Almeida Advogados
 *
 * Práticas e Especialidades Index Page
 */
?>

<?php get_header(); ?>

<?php almd_header( get_the_title(), get_field('banner'), false, get_field('logo') ) ?>

<div class="space"></div>

<div class="container-fluid mission no-padding-xs">
  
    <div class="row padding no-margin-xs">
      
        <div class="col-xl-1 col-lg-2 col-md-2 col-sm-1 col-xs-2"></div>
        
        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-10 col-xs-8 content_setores no-padding"> 
                
          <?php while ( have_posts() ) { the_post(); ?>           
              <div class="content text-center">
                  <?php the_content(); ?>
              </div>
          <?php }?>
        
        </div>
        
        <div class="col-xl-1 col-lg-2 col-md-2 col-sm-1 col-xs-2"></div>
        
    </div>

</div>
<!-- Missão -->

<?php $array = paginas_filhas( get_the_ID() ); ?>

<div class="container-fluid padding last-news">
  
    <div class="row">
        <div class="col-md-12 text-center">
            <h3 class="titles-2"> Saiba mais sobre nossas especialidades </h3>
        </div>
    </div>
    
    <div class="space"></div>
      
    <div class="row padding box-setores">
            
        <?php if(is_array($array) and count($array) > 0){ ?>
            <div class="col-12">
                
                <?php foreach($array as $ar){ ?>
                    <div class="col-12 col-md-6 col-lg-4 titles-3"> 
                      <a href="<?php echo  $ar['link']; ?>"><?php echo  $ar['title']; ?></a>  

                      <!-- verificar segundo nível de páginas filhas-->
                      <?php $child_array = paginas_filhas( $ar['id'] ); ?>

                      <?php if(is_array($child_array) and count($child_array) > 0){ ?>
                        <?php foreach($child_array as $ar){ ?>
                          <div class="col-12"><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="<?php echo  $ar['link']; ?>"><?php echo  $ar['title']; ?></a></div>
                        <?php }?>
                      <?php }?>
                    </div>
                <?php }?>
                    
            </div>
        <?php }?>
            
    </div>     
            
    <div class="space"></div>
    
</div>
<!-- Notícias -->
    

<!-- \/home-content\/ -->

<?php get_footer(); ?>
