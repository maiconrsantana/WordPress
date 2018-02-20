<?php
/**
 * Template Name: Áreas de atuação
 *
 * @package WordPress
 * @subpackage Amaral Aguiar
 * 
 */
?>

<?php get_header(); ?>

<?php almd_header( get_the_title(), get_field('banner'), 'Áreas de Atuação', get_field('logo') ) ?>

<div class="space"></div>

<div class="container-fluid no-padding-xs">
  
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

                      if($tipo == 'tipo_3'){
                        $html .= '<div class="row">';
                      }

                      foreach($numeros as $n){
                        if($tipo != 'tipo_3'){
                          $html .= '<div class="row">';
                        }

                        if($tipo == 'tipo_1'){
                          $html .= '<div class="col-12 no-padding"><span class="numero">'.$n['numero'].'</span></div>';
                          $html .= '<span class="texto">'.nl2br($n['texto']).'</span>';
                        }elseif($tipo == 'tipo_2'){
                          $html .= '<span class="texto">'.nl2br($n['texto']).'</span>';
                          $html .= '<span class="numero">'.$n['numero'].'</span>';
                        }else{
                          $html .= '<div class="col-md-6"><span class="numero">'.$n['numero'].'</span>';
                          $html .= '<span class="texto padding_left">'.nl2br($n['texto']).'</span></div>';
                        }

                        if($tipo != 'tipo_3'){
                          $html .= '</div>';
                        }
                      }

                      if($tipo == 'tipo_3'){
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

                  <!-- subáreas -->
                  <?php $subarea = get_field('subarea'); ?>

                  <?php if($subarea){ ?>
                    <?php foreach($subarea as $sa){ ?>

                      <a id="<?php echo sanitize_title($sa['titulo']) ?>" href="javascript: show_subarea('<?php echo sanitize_title($sa['titulo']) ?>');" class="links-more subarea"> <?php echo $sa['titulo'] ?> </a>

                    <?php } ?>
                  
                    <div class="subarea_content subarea_<?php echo sanitize_title($sa['titulo']) ?>">

                      <?php foreach($subarea as $sa){
                       
                        if(count($array['lista'] > 0)){
                          echo '<ul class="destaques subarea_destaques subarea_destaques_'.sanitize_title($sa['titulo']).'">';
                          foreach ($sa['lista'] as $lista) {
                            echo '<li><p>'.$lista['linha'].'</p></li>';
                          }
                          echo '</ul>';
                        }
                      }?>
                    
                    </div>
                  <?php }?>


                  <?php /*$fonte = get_field('fonte'); ?>
                  <?php if( $fonte ){ ?>
                    <div class="fonte">
                      Fonte:
                      <br>
                      <?php foreach($fonte as $f){ ?> 
                         <?php echo $f['relacionar_informacao']; ?> <a href="<?php echo $f['link']; ?>" target="_blank" ><?php echo $f['link']; ?></a>
                        <br><br>
                      <?php }?>
                    </div>
                  <?php }*/?>

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
            <h3 class="titles-2"> Áreas de Atuação </h3>
            </div>
    </div>
      
     <div class="row padding box-setores">
            
        <?php if(is_array($array) and count($array) > 0){ ?>
                 
            <?php foreach($array as $ar){ ?>
                <div class="col-12 col-md-6 col-lg-4 titles-3"> 
                  <a href="<?php echo  $ar['link']; ?>"><?php echo  $ar['title']; ?></a> 

                  <!-- subáreas -->
                  <?php $subarea = get_field('subarea', $ar['id']); ?>

                  <?php if($subarea){ ?>
                    <table class="subarea">
                      <tr>
                        <?php foreach($subarea as $sa){ ?>
                          <td>
                            <span><?php echo  $sa['titulo']; ?></span>
                          </td>
                        <?php }?>
                      </tr>
                    </table>
                  <?php }?>
                </div>
            <?php }?>    
            
        <?php }?>
            
    </div>     
            
    <div class="space"></div>
    
</div>
<!-- Notícias -->
    

<!-- \/home-content\/ -->

<?php get_footer(); ?>


<script type="text/javascript">
  
  function show_subarea(area){
    
    $('.links-more.subarea').removeClass('active');
    $('#'+area).addClass('active');

    $('.subarea_destaques').hide();
    $('.subarea_destaques_'+area).fadeIn();
  }

</script>
