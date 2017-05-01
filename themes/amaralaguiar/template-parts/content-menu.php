<!-- nav-menu -->
<div class="container-full">
  <div class="container">
  <nav class="navbar navbar-toggleable-md navbar-light">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri().'/files/img/logo.png'; ?>" alt="Amaral Aguiar - Sociedade de Advogados"></a>


    <div class="row collapse navbar-collapse" id="navbarNavDropdown">

        <ul class="col-md-12 justify-content-md-end navbar-nav hidden-md-down">
          <li class="nav-item">
            <a class="nav-link-top" href="tel: <?php the_field('telefone', 122); ?>"><?php the_field('telefone', 122); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link-top" href="<?php echo site_url('contato'); ?>">Ligamos para você</a>
          </li>
        </ul>
        <ul class="col-md-12 justify-content-md-end navbar-nav">
        <li class="nav-item <?php if(amrlagr_active() == 'home'){?>active<?php }?>">
          <a class="nav-link" href="<?php echo site_url(); ?>">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item <?php if(amrlagr_active() == 'Escritório'){?>active<?php }?>">
          <a class="nav-link" href="<?php echo site_url('escritorio'); ?>">Escritório</a>
        </li>
        <li class="nav-item dropdown <?php if(amrlagr_active() == 'area_atuacao'){?>active<?php }?>">
          <a class="nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Atuação
          </a>

          <?php // exibe páginas de atuação
            $atuacao = amrlagr_atuacao();
            if ($atuacao->have_posts()) :
          ?>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

              <?php while ( $atuacao->have_posts() ) : $atuacao->the_post(); ?>
                <a class="dropdown-item" href="<?php the_permalink($atuacao->ID) ?>"><?php the_title($atuacao->ID); ?></a>
              <?php endwhile; ?>

              </div>
          <?php wp_reset_query(); endif;?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('equipe'); ?>">Equipe</a>
        </li>
        <li class="nav-item <?php if(amrlagr_active() == 'Artigos' or amrlagr_active() == 'post'){?>active<?php }?>">
          <a class="nav-link" href="<?php echo site_url('artigos'); ?>">Artigos</a>
        </li>
        <li class="nav-item <?php if(amrlagr_active() == 'duvida'){?>active<?php }?>">
          <a class="nav-link" href="<?php echo site_url('duvidas'); ?>">Dúvidas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('contato'); ?>">Contato</a>
        </li>
      </ul>

    </div>
  </nav>
</div>
</div>
<!-- \/nav-menu\/ -->
