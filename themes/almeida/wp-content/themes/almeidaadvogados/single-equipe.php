<?php
/**
 * Template Name: Equipe
 *
 * @package WordPress
 * @subpackage Amaral Aguiar
 * 
 */
?>

<?php get_header(); ?>

<?php almd_header('equipe', false); ?>

<?php $user_id = get_the_ID(); ?> 



<div class="space"></div>


<?php 
  if(get_field('layout') == 'destaque'){ 

    get_template_part('template-parts/content', 'single-equipe-layout-1');

  }else{

    get_template_part('template-parts/content', 'single-equipe-layout-2');

  }
?>




<div class="container-fluid padding last-news">
    
    <?php $loop = almd_artigos( true, 3, get_field('usuario')['ID'] ); ?>

    <?php $author = $loop['author']; ?>    

    <?php $loop = $loop['artigos']; if ($loop->have_posts()) : ?>
    <div class="row padding no-padding-xs bg-artigos no-margin-xs ">

        <div class="space"></div>
        <div class="space"></div>
        <div class="col-md-12 text-center">
            <h3 class="titles-2"> Últimos artigos <?php if($author == 'true'){ echo 'de '.get_the_title(); } ?> </h3>
        </div>

        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
            <div class="col-lg-4 col-md-12 col-sm-12 box-news">
            
                <div class="col-md-12 padding">
                        <h3 class="categ"> <?php echo strip_tags( get_the_category_list() ); ?> <?php echo get_the_date() ?> </h3>
                        <a href="<?php the_permalink() ?>">
                            <h2 class="titles-3"> <?php the_title() ?> </h2>
                        </a>
                        <?php the_excerpt() ?>
                        <a href="<?php the_permalink() ?>" class="read-more"> LEIA MAIS </a>
                    </div>
                    
            </div>
        <?php endwhile; ?>
        
        <div class="space"></div>
    </div>  
    <?php endif; ?>   
            
    <div class="space"></div>

</div>
<!-- Notícias -->

<!-- Experts -->
 <div class="space"></div>

<div class="row">
    <div class="col-md-12 text-center">
        <a href="<?php echo site_url('equipe'); ?>" class="links-more hidden-sm-down"> CONHEÇA NOSSOS OUTROS EXPERTS </a>
        <a href="<?php echo site_url('equipe'); ?>" class="links-more hidden-sm-up"> OUTROS EXPERTS </a>              
        </div>
</div>

 <div class="space sessenta"></div>

<?php /* ?>
<?php  $dest = almd_team('destaque', 3, true, $user_id ); ?>
<div class="container-fluid equipe single">
  
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="space"></div>
            <h3 class="titles-2"> Conheça nossos outros experts </h3>
            <div class="space"></div>
        </div>
    </div>

    <div class="row padding">
      
        <div class="col-xl-1 col-lg-2 col-md-2 col-sm-1 col-xs-2"></div>
        
        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-10 col-xs-8 content_search_equipe no-padding"> 
                
            <?php while ( $dest->have_posts() ) { $dest->the_post(); ?>           
                
                <div class="text-center text-sm-left col-sm-6 col-lg-4 content"> 
                    <div class="img">
                         <a href="<?php echo get_permalink(); ?>"><?php echo wp_get_attachment_image(get_field('foto'), 'thumb-equipe', false, array( 'class' => 'img_bw img_bw_hover' )); ?></a>
                    </div>

                    <div class="cargo">
                        <?php the_field('cargo'); ?>
                    </div>

                    <div class="nome">
                         <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                </div>
              
          <?php }?>
        
        </div>
        
        <div class="col-xl-1 col-lg-2 col-md-2 col-sm-1 col-xs-2"></div>
        
    </div>

</div>
<?php */ ?>
<!-- \/home-content\/ -->

<script>
  jQuery(document).ready(function() { 
      img_scroll();
  });
</script>

<?php get_footer(); ?>
