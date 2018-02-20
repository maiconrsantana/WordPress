<?php
/**
 * @package WordPress
 * @subpackage Almeida Advogados
 *
 * Home Page
 */
?>

<?php get_header(); ?>

<?php get_template_part('template-parts/content', 'home-header') ?>

<div class="container-fluid">
    
    <?php $locations = get_field("campos", "option"); ?>

    <?php if($locations){ ?>

        <div class="row addresses-header">
            
            <?php foreach($locations as $lts){ ?>
                <div class="col-12 col-sm-6 col-md-5-custom text-center no-padding"> <strong><?php echo $lts['abreviacao'] ?></strong> &nbsp; | &nbsp; <?php echo $lts['telefone'] ?> </div>
            <?php }?>
        
        </div>
    <?php }?>
             
</div>
<!-- Head -->


<div class="space"></div>

<?php while ( have_posts() ) { the_post(); ?>
<div class="container-fluid mission">
  
    <div class="row padding justify-content-center">
      
        <div class="col-xl-6 col-lg-8 col-md-10 text-center">
                <?php $sobre = get_field('sobre'); ?> 
            
                <h1 class="titles"><?php echo $sobre['titulo']; ?></h1> <br />
        
                <p>
                <?php echo $sobre['texto']; ?>
                </p> <br />
                
                <a href="<?php echo site_url('quem-somos'); ?>" class="links-more"> SAIBA MAIS </a>
        
        </div> 
        
    </div>

</div>
<!-- Missão -->

<?php /*
<div class="space"></div>

<div class="container-fluid no-padding services">
  
    <div class="row padding">
        
        <div class="hidden-lg-down col-md-1"></div>
        
        <div class="col-xs-12 col-md-6 col-lg-5 no-padding-sm services-blocks">
        
          <div class="row">
            
            
                <?php $destaque_1 = get_field('destaque_1'); ?> 
                <div class="row box-img-services" style="background-image: url(<?php echo $destaque_1['imagem'] ?>);"></div>
                
                <div class="row box-txt-services">
                  
                    <div class="col-md-1"></div>
                    
                    <div class="col-12 col-xl-10 col-lg-8">
                      <h3 class="categ"> <?php echo $destaque_1['categoria'] ?> </h3>
                        <h2 class="titles"> <?php echo $destaque_1['titulo'] ?> </h2>
                        <p>
                        <?php echo $destaque_1['texto'] ?>
                        </p> <br />
                        <a href="<?php echo $destaque_1['link'] ?>" class="links-more"> SAIBA MAIS </a>
                  </div>
                        
                </div>
                            
         
          </div>
      
        </div>
      
        
        <div class="col-xs-12 col-md-6 col-lg-5 no-padding-sm services-blocks">
        
          <div class="row">
                
                
                <?php $destaque_2 = get_field('destaque_2'); ?> 
                <div class="row box-img-services" style="background-image: url(<?php echo $destaque_2['imagem'] ?>);"></div>
                
                <div class="row box-txt-services">
                  
                    <div class="col-md-1"></div>
                    <div class="col-12 col-xl-10 col-lg-8">
                      <h3 class="categ"> <?php echo $destaque_2['categoria'] ?> </h3>
                        <h2 class="titles"> <?php echo $destaque_2['titulo'] ?> </h2>
                        <p>
                        <?php echo $destaque_2['texto'] ?>
                        </p> <br />
                        <a href="<?php echo $destaque_2['link'] ?>" class="links-more"> SAIBA MAIS </a>
                  </div>
                        
                </div>   
              
                
          </div>
      
        </div>
        
        <div class="hidden-lg-down col-md-1"></div>
        
  </div>
    
</div>
<!-- Serviços -->
*/ ?>

<div class="space"></div>
<div class="space"></div>

<!-- área destaques -->
<div class="container-fluid featured_home services">
  
    <div class="row padding">
        
        <div class="col-xs-12 col-md-6 no-padding-sm services-blocks">
        
          <div class="row xs-no-margin">
            
            
                <?php $destaque_1 = get_field('destaque_1'); ?> 
                <div class="row box-img-services" style="background-image: url(<?php echo $destaque_1['imagem'] ?>);"></div>
                
                <div class="row box-txt-services">
                    
                    <div class="col-12 col-xl-10 no-padding-md">
                        <h3 class="categ"> <?php echo $destaque_1['categoria'] ?> </h3>
                        <h2 class="titles"> <?php echo $destaque_1['titulo'] ?> </h2>
                        <p>
                        <?php echo $destaque_1['texto'] ?>
                        </p> <br />
                        <a href="<?php echo $destaque_1['link'] ?>" class="links-more"> SAIBA MAIS </a>
                    </div>
                        
                </div>
                            
         
          </div>
      
        </div>
      
        
        <div class="col-xs-12 col-md-6 no-padding-sm services-blocks">
        
          <div class="row xs-no-margin">
                
                
                <?php $destaque_2 = get_field('destaque_2'); ?> 
                <div class="row box-img-services" style="background-image: url(<?php echo $destaque_2['imagem'] ?>);"></div>
                
                <div class="row box-txt-services">
                  
                    <div class="col-12 col-xl-10 no-padding-md">
                        <h3 class="categ"> <?php echo $destaque_2['categoria'] ?> </h3>
                        <h2 class="titles"> <?php echo $destaque_2['titulo'] ?> </h2>
                        <p>
                        <?php echo $destaque_2['texto'] ?>
                        </p> <br />
                        <a href="<?php echo $destaque_2['link'] ?>" class="links-more"> SAIBA MAIS </a>
                    </div>
                        
                </div>   
              
                
          </div>
      
        </div>
        
  </div>
    
</div>
<!-- fim àrea destaques -->


<?php /*
<div class="container-fluid padding">
    
    <?php $destaque_3 = get_field('destaque_3'); ?>

    <div class="row team no-padding-sm xs-no-margin" style="background-image: url(<?php echo $destaque_3['imagem'] ?>);"> 

      <div class="col-md-12 team-bg-2">
          
            <div class="row">
            
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12"></div>
                
                <div class="col-xl-3 col-lg-5 col-md-5 col-sm-12">
                      <h3 class="categ"> <?php echo $destaque_3['categoria'] ?> </h3>
                        <h2 class="titles"> <?php echo $destaque_3['titulo'] ?> </h2>
                        <p>
                        <?php echo $destaque_3['texto'] ?>
                        </p> <br />
                        <a href="<?php echo $destaque_3['link'] ?>" class="links-more"> SAIBA MAIS </a>                        
                </div>

            
            </div>
            
        </div>
        
    </div>
    
</div>    
<!-- Equipe -->
*/ ?>


<?php } // fim loop post ?>

<div class="container-fluid padding last-news">
  
    <div class="row">
        <div class="col-md-12 text-center">
            <h3 class="titles-2"> Últimas notícias </h3>
            </div>
    </div>
    
    <?php $loop = almd_artigos(true, 3); ?>

    <?php if ($loop->have_posts()) : ?>
    <div class="row padding no-padding-xs">

        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
            <div class="col-lg-4 col-md-12 col-sm-12 box-news">
            
                <div class="col-md-12 padding">
                        <h3 class="categ"> <?php echo strip_tags( get_the_category_list() ); ?> <?php echo get_the_date() ?> </h3>
                        <a href="<?php the_permalink() ?>"><h2 class="titles-3"> <?php the_title() ?> </h2></a>
                        <p> <?php the_excerpt() ?> </p>
                        <br>
                        <a href="<?php the_permalink() ?>" class="read-more"> LEIA MAIS </a>
                    </div>
                    
            </div>
        <?php endwhile; ?>
            
    </div>  
    <?php endif; ?>   
            
    <div class="space"></div>
  
    <div class="row">
        <div class="col-md-12 text-center">
            <a href="<?php echo site_url('midia'); ?>" class="links-more hidden-sm-down"> VER TODOS OS ARTIGOS E NOTÍCIAS </a>
            <a href="<?php echo site_url('midia'); ?>" class="links-more hidden-sm-up"> VER TODAS </a>              
            </div>
    </div>

</div>
<!-- Notícias -->
    

<!-- \/home-content\/ -->

<?php get_footer(); ?>
