
<?php $banner = almd_banners(); ?>

<script>
    $(document).ready(function() { 
        //função slider banner
        banner_home( <?php echo json_encode($banner) ?> );
    });
</script>

<header class="container-fluid padding">

    <!-- scroll animation -->
    <!--<div id="mouse_scroll">
      <div class="mouse-icon">
        <span class="mouse-wheel"></span>
      </div>
    </div>-->

    <?php get_template_part('template-parts/content', 'language') ?>

    <div class="row xs-no-margin">

    <section id="main_banner_home" class="container-fluid dinamic-height feature-block bg-home">
    	
        <div id="main_title_circle"></div>

        <div id="main_title_banner_home" data-link="" class="col-lg-6 col-md-8 col-sm-8 quotes"></div>

        <div class="row">
        
            <div class="col-md-2 logo-top">
                <a href="<?php echo site_url(); ?>">
                    <img src="<?php echo get_template_directory_uri().'/files/img/logo-almeida-advogados-br-light.png'; ?>" title="Almeida Advogados" alt="Almeida Advogados - Brasil" />
                </a>
            </div>

        </div>

    </section>

    </div>

</header>