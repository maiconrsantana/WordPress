<?php
/**
 * The template part for displaying blog index posts
 *
 * @package WordPress
 * @subpackage Almeida Advogados
 * 
 */
?>

<!--<script type="text/javascript">
    function popup_link(link) {
        // janela de compartilhamento
    
        var altura  = jQuery(window).height();
        var largura = jQuery(window).width();

        window.open(link, "Compartilhar", "toolbar=no,scrollbars=yes,resizable=yes,top=200,left=200,width="+(largura-400)+",height="+(altura-200));
        
        return false;
        
    };
</script>-->

<?php
    $page = $_POST['page']; 
    $term = $_POST['term'];
    $type = $_POST['type'];
    
    $loop = almd_artigos_index($page, $term, $type); 
?>

<?php if ($loop->have_posts()) : ?>

        <div class="row">

            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                <div class="col-xs-12 col-lg-6 col-xl-3 box-news">
                
                    <div class="col-md-12 padding">
                            <h3 class="categ"> <?php echo strip_tags( get_the_category_list() ); ?> <?php echo get_the_date() ?> </h3>
                            <a href="<?php the_permalink() ?>"><h2 class="titles-3"> <?php the_title() ?> </h2></a>
                            <?php the_excerpt() ?>
                            <a href="<?php the_permalink() ?>" class="read-more"> LEIA MAIS </a>
                        </div>
                        
                </div>
            <?php endwhile; ?>

        </div>

<?php else: ?>
        
        <div class="row">
            <div class="col-12 text-center box-news">
                <h2>nenhum artigo encontrado</h2>
            </div>
        </div>

<?php endif; ?>