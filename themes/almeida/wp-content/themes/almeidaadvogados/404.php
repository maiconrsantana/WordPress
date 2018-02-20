<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Almeida Advogados
 * 
 */

get_header(); ?>

<?php almd_header( 'Página não encontrada', get_field('imagem', 'option') ) ?>


<div class="space"></div>
<div class="space"></div>
<div class="space"></div>

<div class="container-fluid mission">
  
    <div class="row padding">
      
        <div class="col-xl-3 col-lg-2 col-md-2 col-sm-1 col-xs-2"></div>
        
        <div class="col-xl-6 col-lg-8 col-md-8 col-sm-10 col-xs-8 content_setores interna no-padding"> 

        	<div class="content">
                <h1 class="titles">404 - Página não encontrada</h1>

                <a href="<?php echo site_url() ?>"><p>clique aqui para ver acessar página inicial</p></a>
            </div>

        </div>

    </div>

</div>

<div class="space"></div>
<div class="space"></div>
<div class="space"></div>

<?php get_footer(); ?>