<?php
/**
 * Template Name: Setores Econômicos
 *
 * @package WordPress
 * @subpackage Amaral Aguiar
 * 
 */
?>

<?php get_header(); ?>

<?php almd_header( get_the_title(), get_field('banner'), 'Setores Econômicos' ) ?>

<div class="space"></div>

<div class="container-fluid mission no-padding-xs">
  
    <div class="row padding no-margin-xs">
      
        <div class="col-2 hidden-lg-down"></div>
        
        <div class="col-12 col-lg-8 content_setores interna"> 
                
          <?php while ( have_posts() ) { the_post(); ?>

              <?php $content = get_the_content(); ?>



              <div class="content">
                  <h1 class="titles"><?php the_field('descrição'); ?></h1>

                  <?php 
                    $html = '';
                    $tipo = get_field('numeros_em_destaque');
                    $numeros = get_field( $tipo ); 

                    if($numeros){
                      $html .= '<div class="destaque '.$tipo.'">';
                      foreach($numeros as $n){
                        $html .= '<div class="row">';
                        
                        if($tipo == 'tipo_1'){
                          $html .= '<span class="numero">'.$n['numero'].'</span>';
                          $html .= '<span class="texto">'.nl2br($n['texto']).'</span>';
                        }else{
                          $html .= '<span class="texto">'.nl2br($n['texto']).'</span>';
                          $html .= '<span class="numero">'.$n['numero'].'</span>';
                        }

                        $html .= '</div>';
                      }
                      $html .= '</div>';
                    }
                  ?>

                  <p>
                  <?php 
                    $content = str_replace("[numero_destaque]", $html, $content);
                    echo nl2br($content); 
                  ?>
                  </p>

                  <?php 
                    if(get_field('destaques')){
                      $array =get_field('destaques');

                      echo '<h3 class="titles">'.$array['titulo'].'</h3>';

                      if(count($array['lista'] > 0)){
                        echo '<ul class="destaques">';
                        foreach ($array['lista'] as $lista) {
                          echo '<li><p>'.$lista['linha'].'</p></li>';
                        }
                        echo '</ul>';
                      }
                    }
                  ?>


                  <?php $fonte = get_field('fonte'); ?>
                  <?php if( $fonte ){ ?>
                    <div class="fonte">
                      Fonte:
                      <br>
                      <?php foreach($fonte as $f){ ?> 
                        <a href="<?php echo $f['link']; ?>" target="_blank" ><?php echo $f['link']; ?></a> <?php echo $f['relacionar_informacao']; ?>
                        <br>
                      <?php }?>
                    </div>
                  <?php }?>

              </div>
          <?php }?>
        
        </div>
        
        <div class="col-2 hidden-lg-down"></div>
        
    </div>

</div>
<!-- Missão -->

<?php $master_page = end($post->ancestors); ?>
<?php $array = paginas_filhas( $master_page ); ?>

<div class="container-fluid padding last-news">
  
    <div class="row">
        <div class="col-md-12 text-center">
            <h3 class="titles-2"> Setores Econômicos </h3>
            </div>
    </div>
      
    <div class="row padding box-setores">
            
        <?php if(is_array($array) and count($array) > 0){ ?>
            <div class="col-12">
                
                <?php foreach($array as $ar){ ?>
                    <div class="col-12 col-md-6 col-lg-4 titles-3"> 
                      <a href="<?php echo  $ar['link']; ?>"><?php echo  $ar['title']; ?></a>  

                      <!-- verificar segundo nível de páginas filhas-->
                      <?php $child_array = paginas_filhas( $ar['id'] ); ?>

                      <?php if(is_array($child_array) and count($child_array) > 0){ ?>
                        <?php foreach($child_array as $ar){ ?>
                          <div class="col-12"><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="<?php echo  $ar['link']; ?>"><?php echo  $ar['title']; ?></a></div>
                        <?php }?>
                      <?php }?>
                    </div>
                <?php }?>
                    
            </div>
        <?php }?>
            
    </div>     
            
    <div class="space"></div>
    
</div>
<!-- Notícias -->
    

<!-- \/home-content\/ -->

<?php get_footer(); ?>
