<header class="container-fluid padding">

    <?php get_template_part('template-parts/content', 'language') ?>


    <div class="row xs-no-margin">
    <?php if($header_title == 'post'){ ?>
        <?php $logo = get_template_directory_uri().'/files/img/logo-almeida-advogados-br.png'; ?>
         <?php $section = 'class="container-fluid dinamic-height feature-block post" style="background-image: url('.$header_image.')"'; ?>    
    <?php }else if($header_title == 'equipe'){ ?>
        <?php $logo = get_template_directory_uri().'/files/img/logo-almeida-advogados-br-dark.png'; ?>
        <?php $section = 'class="container-fluid"'; ?>
    <?php }else{ ?>
        <?php $logo = get_template_directory_uri().'/files/img/logo-almeida-advogados-br.png'; ?>
        <?php $section = 'class="container-fluid dinamic-height feature-block" style="background-image: url('.$header_image.')"'; ?>
    <?php }?>


    <?php 
        if($header_logo == 'claro'){
            $logo = get_template_directory_uri().'/files/img/logo-almeida-advogados-br-light.png';
        }else if($header_logo == 'escuro'){
            $logo = get_template_directory_uri().'/files/img/logo-almeida-advogados-br-dark.png';
        } 
    ?>

    <section <?php echo $section ?> >
    	
        <div class="row">
        
            <div class="col-md-2 logo-top">

                <a href="<?php echo site_url(); ?>">
                    <img src="<?php echo $logo ?>" title="Almeida Advogados" alt="Almeida Advogados - Brasil" />
                </a>
            </div>
            
            <?php if($header_title != 'equipe'){ ?>

                <?php include('content-header-title.php'); ?>

            <?php }else{ ?>

                <?php include('content-header-equipe.php'); ?>

            <?php }?>

        </div>
        
    </section>

    </div>

</header>