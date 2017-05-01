<?php
/**
 * @package WordPress
 * @subpackage Rayovac
 */

get_header(); ?>

<?php if ( is_home() ) {
	get_template_part('template-parts/content', 'slider');
	get_template_part( 'template-parts/content', 'featured' );
	get_template_part( 'template-parts/content', 'slider-posts' );
}?>


<?php get_footer(); ?>
