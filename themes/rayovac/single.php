<?php
/**
 * @package WordPress
 * @subpackage rayovac
 */

get_header();

get_template_part( 'template-parts/content', get_post_type() );

get_footer(); 

?>
