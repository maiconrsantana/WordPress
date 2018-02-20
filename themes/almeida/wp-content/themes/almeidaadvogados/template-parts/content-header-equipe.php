<?php if(get_field('layout') == 'destaque'){ ?>

    <div class="col-md-12">
        
        <!-- seção 1 -->	
        <div class="row top">

            <div class="col-lg-5 order-lg-2 text-center hidden-lg-up">
                <?php echo wp_get_attachment_image(get_field('foto'), 'thumb-equipe', false, array( 'class' => 'img_bw' )); ?>
            </div> 

            <div class="col-lg-5 order-lg-4">
                <h3><?php the_field('cargo'); ?></h3>
                <h1><?php the_title(); ?></h1>

                <?php if(get_field('email')){ ?>
                    <a class="email" href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
                <?php }?>

                <?php if(get_field('telefone')){ ?>
                    <a class="fone" href="tel:<?php the_field('telefone'); ?>"><?php the_field('telefone'); ?></a>
                <?php }?>
            </div>

            <div class="col-lg-1 order-lg-1"></div>

            <div class="col-lg-5 order-lg-2 text-center hidden-lg-down">
                <?php echo wp_get_attachment_image(get_field('foto'), 'equipe', false, array( 'class' => 'img_bw' )); ?>
            </div> 

            <div class="col-lg-1 order-lg-3"></div>
        
        </div>

    </div>

<?php }?>