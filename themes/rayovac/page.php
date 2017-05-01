<?php
/**
 * @package WordPress
 * @subpackage rayovac
 */

get_header();


get_template_part( 'template-parts/page', $post->post_name );

?>



<?php get_footer(); ?>