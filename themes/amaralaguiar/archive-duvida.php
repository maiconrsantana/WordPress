<?php
/**
 * @package WordPress
 * @subpackage Amaral Aguiar
 *
 * Content Page for Post Type duvida
 */

  //get scripts
  wp_enqueue_script( 'Accordeon',get_template_directory_uri() . '/files/js/accordeon.js', array( 'jquery' ) );

  get_header();

?>

  <!-- duvidas-content -->
  <section class="main-atuacao">
    <div class="container">
      <img src="<?php echo get_template_directory_uri().'/files/img/banner-duvidas.jpg'; ?>" class="img-fluid" />

      <h2 class="custom_amag">Entenda seus Direitos</h2>
    </div>

    <div class="container duvidas">
        <?php
			$args['post_type'] = 'duvida';
			$args['posts_per_page'] = -1;

			$posts = new WP_Query( $args ); 
	
            if ( $posts->have_posts() ) :
              $i=0;
          		// Start the Loop.
          		while ( $posts->have_posts() ) : $posts->the_post();
        ?>
            <div class="panel-group wrap" id="bs-collapse">

                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#bs-collapse" href="#<?php echo 'content-'.$i; ?>"><?php the_title(); ?></a>
                        </h4>
                    </div>
                    <div id="<?php echo 'content-'.$i; ?>" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php the_field('resposta'); ?>
                        </div>
                    </div>
                </div>
                <!-- end of panel -->

        <?php
            $i++;
            endwhile;
          endif;
        ?>



            </div>
            <!-- end of #bs-collapse  -->

    </div>
    <!-- end of container -->

  </section>
  <!-- \/duvidas-content\/ -->

<?php get_footer(); ?>

