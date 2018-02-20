<?php 
    
    $dest = almd_team('sim');
    $assc = almd_team();

    //var_dump($dest); 

?>

<div class="container-fluid equipe">
  
    <div class="row padding no-padding-md no-margin-xs">
      
        <div class="hidden-xlg-down col-xl-1 col-lg-2 col-md-2 col-sm-1 col-xs-2"></div>
        
        <div class="content_search_equipe no-padding"> 

            <div class="row no-padding no-margin-xs">
                <div class="text-center text-md-left col-xs-12 col-md-5 no-padding-md">
                    <input placeholder="Buscar por nome" id="box_equipe" type="text" /><i class="fa fa-search" aria-hidden="true"></i>
                </div>

                <div class="col-xs-12 col-md-7 text-center d-flex justify-content-center justify-content-md-end no-padding-md">
                    <a id="andre_de_almeida" class="filter_equipe">André de Almeida</a> 
                    <a id="socios" class="filter_equipe">Líderes</a>
                    <!--<a id="filter_equipe_seniors" class="filter_equipe">Advogados Sêniors</a>-->
                </div>
            </div>

            <div class="space sessenta"></div>
            

            <div class="row no-padding-md no-margin-xs">    
            <?php while ( $dest->have_posts() ) { $dest->the_post(); ?>           
                
                <div class="text-center text-sm-left col-sm-6 col-lg-4 content main no-padding-xs no-margin-xs" data-search-category="<?php echo get_field('cargo'); ?>" data-search-equipe="<?php the_title(); ?>"> 
                    <div class="img">
                         <a href="<?php echo get_permalink(); ?>"><?php echo wp_get_attachment_image(get_field('foto'), 'thumb-equipe', false,  array( 'class' => 'img_bw img_bw_hover' )); ?></a>
                    </div>

                    <div class="cargo">
                        <?php the_field('cargo'); ?>
                    </div>

                    <div class="nome">
                         <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                    </div>

                    <div class="space"></div>

                </div>
              
          <?php }?>

          </div>
        
        </div>
        
        <div class="hidden-xlg-down col-xl-1 col-lg-2 col-md-2 col-sm-1 col-xs-2"></div>
        
    </div>

</div>


<!-- Advogados Sêniors -->
<div id="content_equipe_seniors"  class="container-fluid equipe seniors">
  
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="titles-2"> Advogados </h3>
        </div>
    </div>

    <div class="row padding">
      
        <div class="hidden-xlg-down col-xl-1 col-lg-2 col-md-2 col-sm-1 col-xs-2"></div>
        
        <div class="text-center text-sm-left content_search_equipe no-padding"> 
                
            <?php while ( $assc->have_posts() ) { $assc->the_post(); ?>           
                
                <div class="col-sm-6 col-lg-4 content"> 

                    <div class="nome">
                         <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                </div>
              
          <?php }?>
        
        </div>
        
        <div class="hidden-xlg-down col-xl-1 col-lg-2 col-md-2 col-sm-1 col-xs-2"></div>
        
    </div>

</div>