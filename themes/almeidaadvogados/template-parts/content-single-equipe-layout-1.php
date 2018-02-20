<div id="container" class="container-fluid padding">
  
    <!-- seção 2 -->
    <section class="bg-section section-citacao">
      <div class="row">
          
          <div class="col-lg-7"></div>

          <?php if(get_field('citacao')){ ?>
            <div class="col-lg-5">
                <div class="citacao">
                  <?php the_field('citacao'); ?>
                </div>
                <?php the_field('citacao_autor'); ?>
            </div>
          <?php }?>

      </div>
    </section>
    

    <!-- seção 3 -->
    <section class="bg-section">
      <div class="row first-line">
          <div class="col-lg-1"></div>

          <div class="col-lg-5">
              <div class="destaques">

                <?php if(get_field('destaques')){ ?>
                  <h4>Destaques</h4>

                  <?php the_field('destaques'); ?>
                <?php }?>

              </div>
          </div>
          
          <div class="col-lg-1"></div>

          <div class="col-lg-5">
              <h4>Sobre</h4>

              <?php the_field('sobre'); ?>
          </div>
      
      </div>
    </section>

    <!-- seção 4 -->
    <section class="bg-section">
      <div class="row">
          
          <div class="col-lg-7"></div>

          <div class="col-lg-5">
              <h4>Formação Acadêmica</h4>

              <?php the_field('formacao'); ?>
          </div>
      
      </div>
    </section>

    <!-- seção 5 -->
    <section class="bg-section">
      <div class="row">
          
          <div class="col-lg-7"></div>

          <div class="col-lg-5">
              <h4>Idiomas</h4>

              <?php the_field('idiomas'); ?>
          </div>
      
      </div>
    </section>

    <!-- seção 6 -->
    <section class="bg-section">
      <div class="row">
          
          <div class="col-lg-7"></div>

          <div class="col-lg-5">
              <h4>Associações</h4>

              <ul class="associacoes">
                <?php foreach(get_field('associacoes') as $field){ ?>
                    <li> <p><?php echo $field['linha']; ?></p> </li>
                <?php }?>
            </ul>
          </div>
       
      </div>
    </section>

</div>