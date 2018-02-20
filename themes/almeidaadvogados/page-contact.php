<?php
/**
 * Template Name: Vagas
 *
 * @package WordPress
 * @subpackage Almeida Advogados
 * 
 */
?>

<?php get_header(); ?>

<?php almd_header( get_the_title(), get_field('banner') ) ?>

<div class="container-fluid">
    
    <?php $locations = get_field("campos", "option"); ?>

    <?php if($locations){ ?>

        <div class="row addresses-header">
            
            <?php foreach($locations as $lts){ ?>
                <div class="col-md-3 text-center no-padding"> <strong><?php echo $lts['abreviacao'] ?></strong> &nbsp; | &nbsp; <?php echo $lts['telefone'] ?> </div>
            <?php }?>
        
        </div>
    <?php }?>
             
</div>

<div class="space"></div>

<div class="space"></div>

<?php echo do_shortcode( '[mrs_contact template="template_2_en"]' ); ?>


<div class="space"></div>

<!-- \/home-content\/ -->

<?php get_footer(); ?>
