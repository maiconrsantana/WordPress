<?php
/**
 * @package WordPress
 * @subpackage Amaral Aguiar
 *
 * Single Post Page
 */

get_header(); ?>

<!-- artigos-content -->
<section class="artigos-lista">
  <div class="container">
    <?php if ( has_post_thumbnail() ) { ?>
      <?php echo the_post_thumbnail( 'banner-atuacao', ['class' => 'img-fluid', 'title' => get_the_title()] ); ?>
    <?php }else{ ?>
      <img src="<?php echo get_template_directory_uri().'/files/img/banner-artigos.jpg'; ?>" class="img-fluid" />
    <?php }?>

    <h2 class="custom_amag">Artigos & Informativos</h2>
  </div>

  <div class="container">
    <div class="row">

    <div class="push-xs-0 push-md-8 push-lg-9 col-md-4 col-lg-3">
      <?php get_template_part('template-parts/content', 'sidebar-category'); ?>
    </div>

    <?php
        if ( have_posts() ) :

      		// Start the Loop.
      		while ( have_posts() ) : the_post();
      ?>
        <div class="content-article pull-xs-0 pull-md-4 pull-lg-3 col-sm">
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <span class="author">por <?php the_author(); ?>, <?php the_date(); ?></span>

            <h2><?php the_title(); ?></h2>

            <div class="content-post">
              <?php the_content(); ?>
            </div>

            <div class="content-category">
              <?php echo amrlagr_categoria(get_the_ID()); ?>
            </div>

            <div class="autor">
              <div class="row">
                <div class="col-md-3 col-lg-2"><?php echo get_avatar( get_the_author_meta( 'user_email' )); ?></div>
                <div class="col-xs-9">

                    <span class="name"><?php echo get_the_author(); ?></span>
                    <br>
                    <span class="email"><a href="mailto: <?php echo get_the_author_meta( 'user_email' ); ?>"><?php echo get_the_author_meta( 'user_email' ); ?></a></span>

                </div>
              </div>
            </div>
          </article>
        </div>
      <?php
          endwhile;
        endif;
      ?>
    </div>
  </div>
</section>
<!-- \/artigos-content\/ -->

<?php get_footer(); ?>
