<div class="container-fluid contato">
  
    <div class="row padding">
        
        <div class="col-xl-6 padding"> 
                
          <?php while ( have_posts() ) { the_post(); ?>

              <?php the_content(); ?>

          <?php }?>
        
        </div>

        <div class="col-xl-6 padding">
        	
        	<form id="form_contato" action="<?php echo site_url()?>/wp-admin/admin-ajax.php" method="post" class="scrool-line form_contato">
              
              <div class="input_box">
                <input type="text" placeholder="Nome" name="nome" required />
              </div>

              <div class="input_box">
                <input type="text" placeholder="Empresa" name="empresa" />
              </div>

              <div class="input_box">
                <input type="text" placeholder="E-Mail" name="email" required/>
              </div>

              <div class="input_box">
                <input type="text" placeholder="Telefone" name="telefone" required/>
              </div>

              <div class="input_box full">
                <input type="text" placeholder="Assunto" name="assunto" required/>
              </div>

              <div class="input_box full">
                <textarea placeholder="Mensagem" name="mensagem" required></textarea>
              </div>

              <div class="space"></div>
              
              <div class="input_box send">
                <label class="check">
                  <input type="checkbox" name="news" value="1" checked style="-webkit-appearance: checkbox;" />
                  Quero receber emails sobre o Almeida Advogados
                </label>
              </div>

              <div class="input_box send">
                <input id="send_form" type="submit" class="links-more" value="ENVIAR"/>
              </div>

              <input type="hidden" name="action" value="mrs_contact_getForm" />
              <input type="hidden" name="return" value="<?php echo site_url('contato') ?>" />
              <input type="hidden" name="tipo" value="contato" />

          </form>

        </div>
        
    </div>

</div>

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