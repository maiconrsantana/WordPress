<?php

//remover do menu Páginas e Posts
function remove_menus() 
{
     remove_menu_page( 'edit.php' );                   //Posts
     remove_menu_page( 'edit.php?post_type=page' );    //Pages
   
}
add_action( 'admin_menu', 'remove_menus' );
