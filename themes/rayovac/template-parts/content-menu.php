<?php 
	$cat_pilhas 	= get_posts(array(
		'post_type' => 'produtos',
		'orderby' => 'ID',
		'order' => 'ASC',
		'tax_query' => array(array(
			'taxonomy' => 'category_prod',
			'field' => 'slug',
			'terms' => array('pilhas'),
			'operator' => 'IN',
		 ))
	));

	$cat_lanternas 	= get_posts(array(
		'post_type' => 'produtos',
		'orderby' => 'ID',
		'order' => 'ASC',
		'tax_query' => array(array(
			'taxonomy' => 'category_prod',
			'field' => 'slug',
			'terms' => array('lanternas'),
			'operator' => 'IN'
		 ))
	));

	$cat_lampadas 	= get_posts(array(
		'post_type' => 'produtos',
		'orderby' => 'ID',
		'order' => 'ASC',
		'tax_query' => array(array(
			'taxonomy' => 'category_prod',
			'field' => 'slug',
			'terms' => array('lampadas'),
			'operator' => 'IN'
		 ))
	));
?>


<div class="container">
        <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="menu-container search-bar">           
            <form class="navbar-form navbar-right" method="get" >
                <div class="input-group stylish-input-group">
                    <input type="text" class="form-control open_search" placeholder="O que você procura?" >
                    <span class="input-group-addon">
                        <button type="button" class="open_search">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>  
                    </span>
                </div>
            </form>
            <a class="nav-logo" href="<?php echo site_url(); ?>"><img class="img-responsive" src="<?php echo get_template_directory_uri().'/files/img/logo.png'; ?>" alt="<?php bloginfo('name'); ?>"></a>
          </div>
          <div class="menu-container main-menu">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-mobile" aria-expanded="false" aria-controls="navbar-mobile">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div data-nav-content="navbar-mobile">
            	<div id="navbar-mobile" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                      <a <?php if(count($cat_pilhas) > 0){ ?>class="dropdown-toggle" data-toggle="dropdown" role="button"<?php }?> href="#" >Pilhas <?php if(count($cat_pilhas) > 0){ ?><span class="caret"></span><?php }?></a>
                      <?php if(count($cat_pilhas) > 0){ ?>
                          <ul class="dropdown-menu">
                          	<?php foreach($cat_pilhas as $cat){ ?>
                                <li class="dropdown-header"><a href="<?php echo site_url().'/produtos/pilhas/'.$cat->post_name; ?>"><?php echo $cat->post_title; ?></a></li>
								<?php $array = get_field('tamanho_grupo', $cat->ID); $field = 'tamanho'; ?>
                                <?php if($array == NULL){ $array = get_field('modelo_grupo', $cat->ID); $field = 'modelo'; } ?>
                                <?php if($array == NULL){ $array = get_field('formato_grupo', $cat->ID); $field = 'formato'; } ?>
                                
                                <?php foreach($array as $a){?>
                                    <li><a href="<?php echo site_url().'/produtos/pilhas/'.$cat->post_name.'?'.$field.'='.ry_to_slug($a[$field.'_nome']); ?>"><?php echo $a[$field.'_nome'] ?></a></li>
                                <?php }?>
                                <li role="separator" class="divider"></li>                             
                      		<?php }?>
                          </ul>
                      <?php }?>
                    </li>
                    <li class="dropdown">
                        <a <?php if(count($cat_lanternas) > 0){ ?>class="dropdown-toggle" data-toggle="dropdown" role="button"<?php }?> href="#" >Lanternas <?php if(count($cat_lanternas) > 0){ ?><span class="caret"></span><?php }?></a>
						<?php if(count($cat_lanternas) > 0){ ?>
                          <ul class="dropdown-menu">
                          	<?php foreach($cat_lanternas as $cat){ ?>
                                <li class="dropdown-header"><a href="<?php echo site_url().'/produtos/pilhas/'.$cat->post_name; ?>"><?php echo $cat->post_title; ?></a></li>
								<?php $array = get_field('tamanho_grupo', $cat->ID); $field = 'tamanho'; ?>
                                <?php if($array == NULL){ $array = get_field('modelo_grupo', $cat->ID); $field = 'modelo'; } ?>
                                <?php if($array == NULL){ $array = get_field('formato_grupo', $cat->ID); $field = 'formato'; } ?>
                                
                                <?php foreach($array as $a){?>
                                    <li><a href="<?php echo site_url().'/produtos/lanternas/'.$cat->post_name.'?'.$field.'='.ry_to_slug($a[$field.'_nome']); ?>"><?php echo $a[$field.'_nome'] ?></a></li>
                                <?php }?>
                    			<li role="separator" class="divider"></li>            
                      		<?php }?>
                          </ul>
						<?php }?>
                    </li>
                    <li class="dropdown">
                      <a <?php if(count($cat_lampadas) > 0){ ?>class="dropdown-toggle" data-toggle="dropdown" role="button"<?php }?> href="#" >Lâmpadas <?php if(count($cat_lampadas) > 0){ ?><span class="caret"></span><?php }?></a>
						<?php if(count($cat_lampadas) > 0){ ?>
                          <ul class="dropdown-menu">
                          	<?php foreach($cat_lampadas as $cat){ ?>
                                <li class="dropdown-header"><a href="<?php echo site_url().'/produtos/lampadas/'.$cat->post_name; ?>"><?php echo $cat->post_title; ?></a></li>
								<?php $array = get_field('tamanho_grupo', $cat->ID); $field = 'tamanho'; ?>
                                <?php if($array == NULL){ $array = get_field('modelo_grupo', $cat->ID); $field = 'modelo'; } ?>
                                <?php if($array == NULL){ $array = get_field('formato_grupo', $cat->ID); $field = 'formato'; } ?>
                                
                                <?php foreach($array as $a){?>
                                    <li><a href="<?php echo site_url().'/produtos/lampadas/'.$cat->post_name.'?'.$field.'='.ry_to_slug($a[$field.'_nome']); ?>"><?php echo $a[$field.'_nome'] ?></a></li>
                                <?php }?>
                    			<li role="separator" class="divider"></li>            
                      		<?php }?>
                          </ul>
						<?php }?>

                    </li>
                    <li><a href="<?php echo site_url('/a-rayovac');?>">A Rayovac</a></li>
                    <li><a href="<?php echo site_url('/dicas');?>">Dicas</a></li>
                    <li><a href="<?php echo site_url('/contato');?>">Contato</a></li>
                    <li><a href="<?php echo site_url('/onde-encontrar');?>">Onde Encontrar</a></li>  
                  </ul>
            	</div>
            </div><!--/.nav-collapse -->    
          </div>

          <?php global $pagename;
                $pagename = $post->post_name;

          ?>
          

          <!-- nav desktop -->  
          <div data-nav-content="navbar">
          	<div id="navbar" class="menu-container navbar-collapse">
                <div class="menu-container-desktop">	
                  <ul class="nav navbar-nav navbar-right nav-desktop">
                    <li><a href="<?php echo site_url() ?>"  <?php if(is_home()) echo ' class="active"'; ?>>Home</a></li>
                    <li><a <?php if(count($cat_pilhas) > 0){ ?>class="drop" data-menu="pilhas"<?php }?> href="#">Pilhas</a></li>
                    <li><a <?php if(count($cat_lanternas) > 0){ ?>class="drop" data-menu="lanternas"<?php }?> href="#">Lanternas</a></li>
                    <li><a <?php if(count($cat_lampadas) > 0){ ?>class="drop" data-menu="lampadas"<?php }?> href="#">Lâmpadas</a></li>
                    <li><a href="<?php echo site_url('/a-rayovac');?>" class="<?php if($pagename == 'a-rayovac') echo 'active'; ?>">A Rayovac</a></li>
                    <li><a href="<?php echo site_url('/dicas');?>" class="<?php if($pagename == '260') echo 'active'; ?>">Dicas</a></li>
                    <li><a href="<?php echo site_url('/contato');?>" class="<?php if($pagename == 'contato') echo 'active'; ?>">Contato</a></li>
                    <li><a href="<?php echo site_url('/onde-encontrar');?>" class="<?php if($pagename == 'onde-encontrar') echo 'active'; ?>">Onde Encontrar</a></li>  
                  </ul>
                  
                  <!--dropdown -->
                  <?php if(count($cat_pilhas) > 0){ ?>
                  <ul class="dropdown-full-menu drop" data-menu-open="pilhas">
                    <li class="dropdown-title">Pilhas</li>
                    
                    <ul class="dropdown-content featured">
                        <?php foreach($cat_pilhas as $cat){ ?>
                        <ul class="dropdown-list">
                            <li class="dropdown-header"><a href="<?php echo site_url().'/produtos/pilhas/'.$cat->post_name; ?>"><?php echo ucfirst($cat->post_title); ?></a></li>
                            <?php $array = get_field('tamanho_grupo', $cat->ID); $field = 'tamanho'; ?>
                            <?php if($array == NULL){ $array = get_field('modelo_grupo', $cat->ID); $field = 'modelo'; } ?>
                            <?php if($array == NULL){ $array = get_field('formato_grupo', $cat->ID); $field = 'formato'; } ?>
                            
                            <?php foreach($array as $a){?>
                                <li><a href="<?php echo site_url().'/produtos/pilhas/'.$cat->post_name.'?'.$field.'='.ry_to_slug($a[$field.'_nome']); ?>"><?php echo $a[$field.'_nome'] ?></a></li>
                            <?php }?>
                        </ul>
                        <?php }?>
                        
                        <!--chamada menu -->
                        <ul class="dropdown-list pull-right">
                            <li class="dropdown-header">
                            <li><a class="featured" href="http://rayovac.ionz.com.br/dicas/2017/02/16/cinco-coisas-que-voce-precisa-saber-sobre-pilhas/"><img class="img-responsive" src="<?php echo get_template_directory_uri().'/files/img/chamada_menu.png'; ?>"></a></li>
                            <li><a class="featured" href="http://rayovac.ionz.com.br/dicas/2017/02/16/cinco-coisas-que-voce-precisa-saber-sobre-pilhas/">Sabia que é errado comparar o funcionamento de pilhas comuns e alcalinas? Saiba a diferença entre elas aqui.</a></li>
                        </ul>
                        
                    </ul>      
                  </ul>
                  <?php }?>
                  
                  <?php if(count($cat_lanternas) > 0){ ?>
                  <ul class="dropdown-full-menu drop" data-menu-open="lanternas">
                    <li class="dropdown-title">Lanternas</li>
                    
                    <ul class="dropdown-content">
                        <?php foreach($cat_lanternas as $cat){ ?>
                        <ul class="dropdown-list">
                            <li class="dropdown-header"><a href="<?php echo site_url().'/produtos/lanternas/'.$cat->post_name; ?>"><?php echo ucfirst($cat->post_title); ?></a></li>
                            <?php $array = get_field('tamanho_grupo', $cat->ID); $field = 'tamanho'; ?>
                            <?php if($array == NULL){ $array = get_field('modelo_grupo', $cat->ID); $field = 'modelo'; } ?>
                            <?php if($array == NULL){ $array = get_field('formato_grupo', $cat->ID); $field = 'formato'; } ?>
                            
                            <?php foreach($array as $a){?>
                                <li><a href="<?php echo site_url().'/produtos/lanternas/'.$cat->post_name.'?'.$field.'='.ry_to_slug($a[$field.'_nome']); ?>"><?php echo $a[$field.'_nome'] ?></a></li>
                            <?php }?>
                        </ul>
                        <?php }?>
                    </ul>      
                  </ul>
                  <?php }?>
    
                  <?php if(count($cat_lampadas) > 0){ ?>
                  <ul class="dropdown-full-menu drop" data-menu-open="lampadas">
                    <li class="dropdown-title">Lâmpadas</li>
                    
                    <ul class="dropdown-content">
                        <?php foreach($cat_lampadas as $cat){ ?>
                        <ul class="dropdown-list">
                            <li class="dropdown-header"><a href="<?php echo site_url().'/produtos/lampadas/'.$cat->post_name; ?>"><?php echo ucfirst($cat->post_title); ?></a></li>
                            <?php $array = get_field('tamanho_grupo', $cat->ID); $field = 'tamanho'; ?>
                            <?php if($array == NULL){ $array = get_field('modelo_grupo', $cat->ID); $field = 'modelo'; } ?>
                            <?php if($array == NULL){ $array = get_field('formato_grupo', $cat->ID); $field = 'formato'; } ?>
                            
                            <?php foreach($array as $a){?>
                                <li><a href="<?php echo site_url().'/produtos/lampadas/'.$cat->post_name.'?'.$field.'='.ry_to_slug($a[$field.'_nome']); ?>"><?php echo $a[$field.'_nome'] ?></a></li>
                            <?php }?>
                        </ul>
                        <?php }?>
                    </ul>      
    
                  </ul>
                  <?php }?>
                
                </div>   
            </div><!--/.nav desktop -->
          </div>
        </nav>
      </div>