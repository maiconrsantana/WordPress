<?php
/**
 * @package WordPress
 * @subpackage Amaral Aguiar
 */
?>

<!-- footer -->
<div class="container-full container-footer">
  <div class="container">
  <footer>
    <div class="row link-bar">
      <div class="d-xs-flex justify-content-xs-center mb-xs-3  justify-content-lg-start mb-lg-0 col-lg-5 row">
        <a class="img-responsive" href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri().'/files/img/logo.png'; ?>" alt="Amaral Aguiar - Sociedade de Advogados"></a>
      </div>
      <div class="col-xs-12 text-xs-center mb-xs-5 text-md-left col-md-5 mb-md-0  col-lg-4 row">
        <ul class="navbar-nav col-xs-6 col-md-6">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('escritorio'); ?>">Escritório</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('atuacao'); ?>">Atuação</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('equipe'); ?>">Equipe</a>
          </li>
        </ul>
        <ul class="navbar-nav col-xs-6 col-md-6">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('artigos'); ?>">Artigos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('duvidas'); ?>">Dúvidas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('contato'); ?>">Contato</a>
          </li>
        </ul>
      </div>
      <div class="col-xs-12 text-xs-center text-md-left  col-md-6 col-lg-3 row no-padding">
        <div class="col-xs-12 no-padding">
            <?php the_field('endereco', 122); ?>
        </div>
        <div class="col-xs-12 no-padding">
           <a class="nav-link mail no-padding" href="mailto: <?php the_field('email', 122); ?>"><?php the_field('email', 122); ?></a>
           <a class="nav-link tel no-padding" href="tel: <?php the_field('telefone', 122); ?>"><?php the_field('telefone', 122); ?></a>
        </div>
      </div>
    </div>
    <div class="row copyright">
      <div class="col-xs-12 text-xs-center mb-xs-3  col-lg-6 mb-lg-0">
        © 2017 - Amaral | Aguiar - Sociedade de Advogados - Todos os Direitos Reservados
      </div>
      <div class="d-xs-flex col-xs-12 justify-content-xs-center  col-lg-6 justify-content-lg-end">
          <img src="http://www.sopadeideias.com.br/secure/sopa_de_ideias/bottom_sopa_black.gif" alt="desenvolvido por Sopa de Ideias"/>
      </div>
  </footer>
</div>
</div>
<!-- \/footer\/ -->

<?php wp_footer(); ?>
</body>
</html>
