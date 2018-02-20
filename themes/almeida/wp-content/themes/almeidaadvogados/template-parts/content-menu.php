<!-- nav-menu -->
<nav class="fixed-right-menu text-center">

      <i class="fa fa-bars open-menu" aria-hidden="true"></i>
            <i class="close-menu" style="display: none;">X</i>

            <ul class="social_menu"> <!-- Redes sociais -->
            
                <li>
                    <a href="https://www.facebook.com/almeida.advogados.1" target="_blank">
                      <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a> 
              </li>
                
                <li>
                    <a href="https://www.linkedin.com/company/110463/" target="_blank">
                      <i class="fa fa-linkedin" aria-hidden="true"></i>
                    </a> 
              </li>
                
            </ul> 

</nav>




<!-- Menu overlay principal -->      
<div class="overlay menu_scroll">

  <header class="container-fluid padding no-bg">
    
    <?php get_template_part('template-parts/content', 'language') ?>
  
    <div class="row xs-no-margin">
    
    <section class="container-fluid feature-block">
      
        <div class="row">
        
            <div class="col-md-12 logo-top">

                <a href="<?php echo site_url(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/files/img/logo-almeida-advogados-br-menu.png" title="Almeida Advogados" alt="Almeida Advogados - Brasil" />
                </a>
                
                <div class="row links-menu">
                    <?php $menu_main = wp_get_nav_menu_items('menu-principal'); ?>
                    <ul class="col-12">
                        <?php foreach($menu_main as $menu){ ?> 
                            <li class="col-12 col-lg-6 col-xxl-12"> <a href="<?php echo $menu->url; ?>"> <?php echo $menu->title; ?> </a> </li>
                        <?php }?>
                    </ul>
                </div>
                
            </div>
        
        </div>
        
    </section>
    
    </div>

     <div class="row row-locations">
                        
                        <div class="col-md-12">

                            <?php $locations = get_field("campos", "option"); ?>

                                <?php if($locations){ ?>
                        
                                    <div class="row menu-locations">
                                        
                                        <?php foreach($locations as $lts){ ?>

                                            <div class="col-md-5-custom">
                                                    
                                                    <h3><?php echo $lts['titulo'] ?></h3>
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

</header>

</div>
<!-- Menu overlay -->   
