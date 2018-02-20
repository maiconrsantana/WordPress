<div class="<?php echo $header_page ?> quote_title">
                	      
    <?php if($header_page){ ?>

        <?php if($header_page == 'equipe_index'){ ?>
            <div id="title-3" class="quotes">
                <div class="rounded-bg"><small><?php echo $header_page ?></small><br><?php echo $header_title ?></div>
            </div>
        <?php }elseif($header_page == 'Práticas e Especialidades'){ ?>
            <div id="title-6" class="quotes">
                <div class="rounded-bg"><!--<small><?php echo $header_page ?></small><br>--><?php echo $header_title ?></div>
            </div>
        <?php }else{?>
            <div id="title-5" class="quotes">
                <div class="rounded-bg"><!--<small><?php echo $header_page ?></small><br>--><?php echo $header_title ?></div>
            </div>
        <?php }?>
    <?php }?>
    
    <?php if(!$header_page){ ?>
        <div id="title-4" class="quotes">
            <span class="rounded-bg"><?php echo $header_title ?></span>
        </div>
    <?php }?>
        
</div>