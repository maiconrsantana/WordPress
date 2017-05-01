<?php
/**
 * @package WordPress
 * @subpackage Amaral Aguiar
 *
 * Home Page
 */
?>

<?php get_header(); ?>

<!-- home-content -->
<section class="main-slider">
  <?php get_template_part('template-parts/content', 'slider'); ?>
</section>

<section class="main-carousel">
  <div class="container">
    <?php get_template_part('template-parts/content', 'carousel'); ?>
  </div>
</section>

<section class="row call-to-action d-xs-flex align-items-xs-center">
  <div class="col-xs-12">
    <h3>Estamos à disposição<br>para ajudá-lo</h3>
  </div>
  <div class="col-xs-12">
    <a href="<?php echo site_url('contato'); ?>" class="btn btn-primary">Consulte</a>
  </div>
</section>

<section class="artigos-lista">
  <div class="clearfix" style="height: 35px;"></div>

  <div class="container">
    <h2 class="custom_amag">Artigos & Informativos</h2>
  </div>

  <div class="container">

          <div class="row">
          <?php
            $artigos = amrlagr_artigos(3);
            if ( $artigos->have_posts() ) :

          		// Start the Loop.
          		while ( $artigos->have_posts() ) : $artigos->the_post();
          ?>
              <div class="content-article col-sm-4">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                  <span class="author">por <?php the_author(); ?>,  <?php echo get_the_date(); ?></span>

                  <div class="desc"><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></div>

                </article>
              </div>
          <?php
              endwhile;
            endif;
          ?>
          </div>

          <div class="clearfix" style="height: 30px;"></div>
          <a href="<?php echo site_url('artigos'); ?>" class="btn btn-primary">Todos Artigos</a>
          <div class="clearfix" style="height: 55px;"></div>
  </div>
</section>

<!-- \/home-content\/ -->

<?php get_footer(); ?>
