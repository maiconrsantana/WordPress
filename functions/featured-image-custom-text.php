<?php
//texto instrução imagem destacada
function add_featured_image_instruction( $content ) {
    return $content .= '<p>Texto Personalizado para campo Imagem Destacada</p>';
}
add_filter( 'admin_post_thumbnail_html', 'add_featured_image_instruction');
?>
