<?php $array = busca_vagas(); ?>

<div class="container-fluid padding last-news no-margin">
      
    <div class="row padding box-setores vagas">
            
        <?php if(isset($array) and count($array) > 0){ ?>
            <div class="col-12">

                <?php foreach($array as $ar){ ?>
                    <?php 
                      $array_cargo[$ar['id']] = $ar['title'].'('.$ar['setor'].')';
                    ?>

                    <div class="col-lg-4 titles-3">
                      <small><?php echo  $ar['setor']; ?></small>

                      <h4><?php echo  $ar['title']; ?></h4>

                      <p><?php echo  $ar['desc']; ?></p>  

                      <a href="javascript: candidatar('<?php echo $ar['id']?>');" class="links-more"> QUERO ME CANDIDATAR </a>
                    </div>
                <?php }?>
                    
            </div>
        <?php }?>
            
    </div>     
            
    
</div>

<div class="space"></div>

<!-- Vagas -->

<div class="container-fluid padding">
        
        <div id="vagas_content" class="scrool-line row padding box-setores vagas no-margin-xs">
        
          <div class="col-12 content_setores"> 

              <div class="space"></div>        
                     
              <div class="row content vagas">

                  <div class="col-lg-6">
                    <h1 style="margin-top: 0" class="titles">Envie seu currículo</h1>

                    <p style="margin-top: 0">
                    Nos conte um pouco mais sobre você enviando seu currículo.
                    </p>
                  </div>
                  
                  

                  <div class="col-lg-6">
                    <form id="form_contact" action="<?php echo site_url()?>/wp-admin/admin-ajax.php" method="post" enctype="multipart/form-data" class="form_curriculo">
                      <div class="input_box">
                        <input type="text" placeholder="Nome" name="nome" required />
                      </div>

                      <div class="input_box">
                        <input type="text" placeholder="E-Mail" name="email" required/>
                      </div>

                      <div class="input_box">
                          <select name="cargo" id="vaga_cargo" required>
                            <option value="">Cargo</option>
                            <?php if(is_array($array_cargo)){  foreach($array_cargo as $key => $cargo){ ?>
                                 <option value="<?php echo $key ?>"><?php echo $cargo ?></option>
                            <?php } }?>
                          <select>
                      </div>

                      <div class="input_box">
                           <input id="vaga_curriculo" type="file" name="curriculo" accept=".pdf" required />
                           <a id="vaga_curriculo_btn" href="javascript: arquivo();">Anexar Currículo</a>
                      </div>

                      <div class="space"></div>
                      
                      <div class="input_box send">
                        <label class="check">
                          <input type="checkbox" name="news" value="1" checked style="-webkit-appearance: checkbox;" />
                          Quero receber emails sobre o Almeida Advogados
                        </label>
                      </div>

                      <div class="input_box send">
                        <input id="send_form" type="submit" class="links-more" value="Enviar"/>
                      </div>

                      <input type="hidden" name="action" value="mrs_contact_getForm" />
                      <input type="hidden" name="return" value="<?php echo site_url('vagas') ?>" />
                      <input type="hidden" name="tipo" value="vagas" />
                    </form>
                  </div>
              </div>
              
              <div class="space"></div>

          </div>
        
        </div>

        
</div>
<!--  form curriculo -->

<div class="space"></div>

<div class="container-fluid padding">
  <div id="message" class="alert alert-dismissable hidden">
    <span></span>
  </div>
</div>


<?php if(isset($_GET['envio'])){ ?>
  <script>
    $( document ).ready(function() {
         retorno_contato('<?php echo $_GET['envio'] ?>');
    });  
  </script>
<?php }?>