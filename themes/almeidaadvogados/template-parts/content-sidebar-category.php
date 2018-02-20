<?php
/**
 * @package WordPress
 * @subpackage Amaral Aguiar
 * Sidebar Category
 */
?>

<section class="cat_sidebar">
  <h3>Por Atuação</h3>
  <?php
      $cat = get_query_var('cat');

      //if(isset($current[0])){ $cat = $current[0]; }else{ $cat = false; }
  ?>
  <?php echo amrlagr_categoria(false, $cat); ?>
</section>
