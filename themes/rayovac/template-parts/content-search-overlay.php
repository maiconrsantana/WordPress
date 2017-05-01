<div class="search search_overlay">

    <div class="row">
        <form class="navbar-form page-search" method="get" action="<?php echo site_url(); ?>">
        	<span class="close_search">&larr;</span>
            <div class="input-group stylish-input-group">
                <input id="form_search_field" type="text" class="form-control" name="s" value="<?php echo esc_html( get_search_query() ); ?>" placeholder="O que você procura?" required>
                <span class="input-group-addon">
                    <button type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>  
                </span>
            </div>
        </form>
    </div>

</div>
