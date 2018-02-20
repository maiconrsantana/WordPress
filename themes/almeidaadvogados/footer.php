<?php
/**
 * @package WordPress
 * @subpackage Almeida Advogados
 */
?>

<!-- footer -->
<?php //echo pll_current_language(); die(); ?>

<footer>
    
  <div class="container-fluid padding">
  
        <div class="row xs-no-margin">
        
            <div class="col-xl-3 col-md-12 col-sm-12 col-xs-12 foot-menu no-padding-sm">
              
                <div class="row padding">
                    
                    <div class="col-md-12">
                        
                        <div class="space"></div>
                        <div class="space"></div>
                        <div class="row logo-foot"></div>
                        <div class="space"></div>

                        <div class="row links-foot">
                            
                            <?php $menu_footer = wp_get_nav_menu_items('menu-rodape'); ?>
                          
                            <ul>
                                <?php foreach($menu_footer as $menu){ ?>
                                    <?php if($menu->menu_item_parent == 0){ ?> 
                                        <li> <a onclick="show_sublink(<?php echo $menu->ID; ?>);" <?php if(!empty($menu->url)){ echo 'href="'.$menu->url.'"'; } ?> ><?php echo $menu->title; ?> </a> </li>
                                    <?php }else{ ?>
                                        <li class="link sub_link_<?php echo $menu->menu_item_parent; ?>"> <small><a href="<?php echo $menu->url; ?>"> <?php echo $menu->title; ?> </a></small> </li>
                                    <?php }?>
                                <?php }?>
                            </ul>
                            
                        </div>
                    
                    </div>
                    
                </div>
            
            </div>
            
            <div class="col-xl-9 col-md-12 col-sm-12 col-xs-12 foot-locations">
                
                <?php $locations = get_field("campos", "option"); ?>

                <?php if($locations){ ?>

                    <div class="row padding">
                    
                        <?php foreach($locations as $lts){ ?>

                            <div class="col-xl-5-custom col-lg-3 col-md-6 col-sm-12 col-xs-12 box-loc">
                                    
                                    <h3><?php echo $lts['titulo'] ?></h3> <br />
                                    <?php echo $lts['logradouro'] ?><br />
                                    <?php echo $lts['complemento'] ?><br />
                                    <?php echo $lts['cep'] ?> •  <?php echo $lts['cidade__estado'] ?>
                                    <br />
                                    <?php echo $lts['telefone'] ?>
                                    <br /><br />
                                    
                                    <a href="<?php echo $lts['link_mapa'] ?>" target="_blank" class="link-location">como chegar</a>
                                
                            </div>

                        <?php }?>
                    
                    </div>

                <?php }?>
                
            </div>
            
        
        </div>
            
  </div>
    
</footer> 

<?php wp_footer(); ?>
</body>
</html>

<script>
    
    function show_sublink(id){
        jQuery('.links-foot .link').hide();

        jQuery('.links-foot .sub_link_'+id).fadeIn();
    };

</script>