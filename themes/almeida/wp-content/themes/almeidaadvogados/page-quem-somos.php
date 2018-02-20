<?php
/**
 * Template Name: Quem Somos
 *
 * @package WordPress
 * @subpackage Almeida Advogados
 * 
 */
?>

<?php get_header(); ?>

<?php almd_header( get_field('descricao'), get_field('banner'), false, get_field('logo') ) ?>

<div class="space"></div>

<div class="container-fluid mission no-padding-xlg">
  
    <div class="row padding xs-no-margin">
      
        <div class="hidden-xlg-down col-xl-1 col-lg-2 col-md-2 col-sm-1 col-xs-2"></div>
        
        <div class="col-12 content_setores"> 
                
                     
              <div class="content">
                  <div class="space"></div>

                  <?php while ( have_posts() ) { the_post(); ?>

		              <?php the_content(); ?>

		          <?php }?>

		          <div class="space"></div>
              </div>
                  
        </div>
        
        <div class="hidden-xlg-down col-xl-1 col-lg-2 col-md-2 col-sm-1 col-xs-2"></div>
        
    </div>

</div>


<!-- Missão -->
<div class="container-fluid">

  <?php $carousel = get_field('visao_missao_valores'); ?>

  <div id="carousel" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    
    <!--<ul class="carousel-indicators">
      <li data-target="#carousel" data-slide-to="0" class="active"></li>
      <li data-target="#carousel" data-slide-to="1"></li>
      <li data-target="#carousel" data-slide-to="2"></li>
    </ul>-->

    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item text-center active">
        <h2 class="titles">Visão</h2>

        <div class="carousel-content">
          <?php echo $carousel['visao']; ?>
        </div>


      </div>

      <div class="carousel-item text-center">
        <h2 class="titles">Missão</h2>

        <div class="carousel-content">
          <?php echo $carousel['missao']; ?>
        </div>

      </div>
      
      <div class="carousel-item text-center">
        <h2 class="titles">Valores</h2>

        <div class="carousel-content">
          <?php echo $carousel['valores']; ?>
        </div>

      </div>

    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#carousel" data-slide="prev">
      <img src="<?php echo get_template_directory_uri().'/files/img/prev-icon.png' ?>">
    </a>
    <a class="carousel-control-next" href="#carousel" data-slide="next">
      <img src="<?php echo get_template_directory_uri().'/files/img/next-icon.png' ?>">
    </a>

  </div>

</div>
<!-- //Missão// -->


<div class="container-fluid padding">
    <?php $destaque = get_field('destaque'); ?>
  
    <div class="row team quem-somos xs-no-margin no-padding-xs" style="background-image: url(<?php echo $destaque['imagem'] ?>);">
    
      <div class="col-md-12 team-bg-2">
          
            <div class="row">
            
                <div class="hidden-lg-down col-xl-7 col-lg-7 col-md-7 col-sm-12"></div>
                
                <div class="col-xl-4 col-lg-4 col-md-12">
                      <h3 class="categ"> <?php echo $destaque['categoria'] ?> </h3>
                        <h2 class="titles"> <?php echo $destaque['titulo'] ?> </h2>
                        <p>
                        <?php echo $destaque['texto'] ?>
                        </p> <br />
                        <a href="<?php echo $destaque['link'] ?>" class="links-more"> SAIBA MAIS </a>                       
                </div>

            
            </div>
            
        </div>
        
    </div>
    
</div>

<!--<div class="space"></div>
<div class="space"></div>

<?php if(get_field('clientes')){ ?>
  <div class="container-fluid padding">
    
      <div class="row team clientes xs-no-margin no-padding-xs">
      
        <div class="col-md-12 team-bg-2">
            <?php foreach(get_field('clientes') as $clientes){ ?>
              <?php echo $clientes ?>
            <?php } ?>
        </div>

      </div>

  </div>
<?php } ?>-->

<div class="space sessenta"></div>

<?php if(get_field('boxes')){ ?>
  <div class="container-fluid no-padding">
    
      <div class="row box-news padding">
        
        <?php foreach(get_field('boxes') as $boxes){ ?>
          <div class="col-md-5 padding">
            <h3 class="categ"><?php echo $boxes['tipo']?></h3>
            <h2 class="titles-3"><?php echo $boxes['titulo']?></h2>
            
            <div class="space"></div>
            <?php echo $boxes['conteudo']?>
            <div class="space"></div>

          </div>

          <div class="col-md-2"></div>

        <?php }?>


      </div>

  </div>
<?php }?>

<div class="space"></div>

<!-- \/home-content\/ -->

<?php get_footer(); ?>
