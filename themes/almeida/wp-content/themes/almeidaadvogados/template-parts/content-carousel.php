<?php
  //register scripts
  wp_enqueue_style( 'jCarousel', get_template_directory_uri() . '/files/css/jcarousel.skeleton.css' );

  wp_enqueue_script( 'jCarousel', get_template_directory_uri() . '/files/js/jcarousel.min.js', array( 'jquery' ) );

  wp_enqueue_script( 'jCarouselSkeleton', get_template_directory_uri() . '/files/js/jcarousel.skeleton.js', array( 'jCarousel' ) );
?>

<script>
 $(function() {
     $('.jcarousel')
         .jcarousel({
             // Core configuration goes here
         })
         .jcarouselAutoscroll({
             interval: 8000,
             target: '+=1',
             autostart: true
         })
     ;
 });
 </script>

<div class="row jcarousel-title">
  <div class="col-sm-6">
    <h2 class="custom_amag">Áreas de Atuação</h2>
  </div>

<div class="d-xs-flex justify-content-xs-end col-sm-6 ">

    <!-- Prev/next controls -->
    <a href="#" class="jcarousel-control-prev control"><img src="<?php echo get_template_directory_uri().'/files/img/arrow-left.png'; ?>" ></a>
    <a href="#" class="jcarousel-control-next control"><img src="<?php echo get_template_directory_uri().'/files/img/arrow-right.png'; ?>" ></a>

</div>

</div>

<?php // exibe páginas de atuação
  $carousel_atuacao = amrlagr_atuacao(true);
  if ($carousel_atuacao->have_posts()) :
?>
  <div class="jcarousel-wrapper">

       <!-- Carousel -->
       <div class="jcarousel">
           <ul>
              <?php while ( $carousel_atuacao->have_posts() ) : $carousel_atuacao->the_post(); ?>
                <li>
                  <a href="<?php the_permalink(); ?>">
                    <div class="content">
                        <div class="icon"><img src="<?php the_field('dest_icone'); ?>" ></div>
                        <div class="title"><?php the_title(); ?></div>
                        <div class="desc"><?php the_field('dest_descricao'); ?></div>
                    </div>
                  </a>
                  <img src="<?php the_field('dest_imagem_de_fundo'); ?>">
                </li>
              <?php endwhile; ?>
           </ul>
       </div>

       <!-- Pagination -->
       <!--<p class="jcarousel-pagination">-->
           <!-- Pagination items will be generated in here -->
       <!--</p>-->

       <!--<a href="<?php echo site_url('atuacao'); ?>" class="btn btn-primary">Ver Todas</a>-->
  </div>
<?php
  endif;
?>
