<?php
/**
 * @package WordPress
 * @subpackage Votorantim
 */
?>

<?php $tipo_post = get_post_type();
	
	if($tipo_post != "produtos") {

?>

<?php if(!is_singular('post')){ get_template_part( 'template-parts/content', 'footer-default' ); } ?>

<?php } ?>

<footer>	
    <?php get_template_part( 'template-parts/content', 'footer-spectrum' ); ?>
</footer>

<?php wp_footer(); ?>
</body>
</html>

<?php get_template_part( 'template-parts/content', 'search-overlay' ); ?>

<?php get_template_part( 'template-parts/content', 'social' ); ?>