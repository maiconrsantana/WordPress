  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css">-->

<script type="text/javascript">

</script>

<?php if(isset($_GET['filtro'])){
	$filtro = $GET['filtro'];
}else{
	$filtro = 'vagas';
}
?>

<div class="wrap">
	
	<h2>Currículos enviados</h2> 
	
	<div id="poststuff">
    <form method="post" action="?page=<?php echo $_GET['page']; ?>">
        
    
    <br class="clear">
    <br class="clear">
	
		<div id="post-body" class="metabox-holder">
		
			<!-- main content -->
			<div id="post-body-content">
	
				<table cellspacing="0" class="wp-list-table widefat fixed subscribers">
                  <thead>
                    <tr>
                        <th class="column-nome" id="nome" scope="col">Nome</th>
                        <th class="column-email" id="email" scope="col">Email</th>
                        <th class="column-cargo" id="cargo" scope="col"><span>Cargo</span></th>
                        <th class="column-curriculo" id="curriculo" scope="col"><span>Currículo</span>
                        <th class="column-newsletter" id="newsletter" scope="col"><span>Newsletter</span></th>
                    </thead>
                                                
                    <tbody id="the-list">
                            
                        <?php 
                        	$total = 0;
							$results = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."mrscontact WHERE `type` = '".$filtro."' AND `delete` = 0");
							if (count($results)<1) echo '<tr class="no-items"><td colspan="5" class="colspanchange">Não há mensagens.</td></tr>';
							else {
								foreach($results as $row) {
									if($row->news){ $news = 'sim'; }else{ $news = 'não'; }
									echo '<tr>
												<td>'.$row->name.'</td>
												<td>'.$row->email.'</td>
												<td><a href="'.get_edit_post_link($row->cargo).'" target="_blank">'.get_the_title( $row->cargo ).'</a></td>
												<td><a href="'.$row->file.'" target="_blank">visualizar</a></td>
												<td>'.$news.'</td>
										  </tr>';
										  
								}
							}; 
						
						?>
                            
                                
                            </tbody>
                        </table>
                        <br class="clear">
						<!--<input class="button" name="submit" type="submit" value="Atualizar" />-->
				
				<br class="clear">
                <br class="clear">
                
					<!--<div class="meta-box-sortables">
			               <div class="postbox">

			                     	<h3><span>Observação:</span></h3>
			                        <div class="inside">
										<p>O formulário é exibido na página <a target="_blank" href="<?php echo site_url('fale-conosco') ?>">Fale Conosco</a> através do shortcode <b>&lt;?php echo gshock_contato(); ?&gt;</b> 
										</p>
									</div>
							</div>
			  		</div>-->

         
                
			</div> 
			
			
			 
            </div>
            
    </form>
	</div>
	
</div> 