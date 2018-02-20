<div id="container" class="container-fluid padding">
    
    <div class="row">

        <div class="col-lg-5">

            <!-- seção 1 -->    
            <div class="row top">
                
                <div class="col-lg-1"></div>

                <div class="col-lg-11">
                    <h3><?php the_field('cargo'); ?></h3>
                    <h1><?php the_title(); ?></h1>

                    <a class="email" href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
                    <a class="fone" href="tel:<?php the_field('telefone'); ?>"><?php the_field('telefone'); ?></a>
                </div>
            
            </div>

        </div>

        <div class="col-lg-7">

          <div class="row top bg">

            <!-- seção 2 -->
            <?php if(get_field('citacao')){ ?>
              <section class="bg-section">
                <div class="row">
                    
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
            <?php }?>

            <!-- seção 3 -->
            <section class="bg-section">
              <div class="row first-line">

                  <div class="col-lg-12">
                      <h4>Sobre</h4>

                      <?php the_field('sobre'); ?>
                  </div>
              
              </div>
            </section>

            <!-- seção 4 -->
            <section class="bg-section">
              <div class="row">

                  <div class="col-lg-12">
                      <h4>Formação Acadêmica</h4>

                      <?php the_field('formacao'); ?>
                  </div>
              
              </div>
            </section>

            <!-- seção 5 -->
            <section class="bg-section">
              <div class="row">

                  <div class="col-lg-12">
                      <h4>Idiomas</h4>

                      <?php the_field('idiomas'); ?>
                  </div>
              
              </div>
            </section>

            <!-- seção 6 -->
            <section class="bg-section">
              <div class="row">

                  <div class="col-lg-12">
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

        </div>

    </div>

</div>