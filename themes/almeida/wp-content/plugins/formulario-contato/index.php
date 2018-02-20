<?php if(isset($_POST['submit'])){

	unset($_POST['submit']);

	$json = json_encode($_POST);

	//atualizar dados no banco
	update_option( MRSOPTION, $json );

?>
<div class="updated notice">
    <p>Dados alterados com sucesso!</p>
</div>
<?php }?>

<?php $data = json_decode(get_option(MRSOPTION)); ?>


<?php wp_enqueue_script( 'mrs_contact-script', plugin_dir_url( __FILE__ ) . 'files/scripts.js', array( 'jquery' ) ); ?>

<div class="wrap">
<h1>Configurações Mensagens</h1>

<form id="config_fale_conosco" method="post" action="">
    
    <h2>Destinatários Contato</h2>

    <table id="assuntos" class="form-table" >
    	<?php if(isset($data->email)){ ?>
    		<?php for($i=0; $i < count($data->email); $i++){ ?>
		        <tr align="center">
			        <th scope="row">Enviar para:</th>
			        <td><input type="email" name="email" value="<?php echo $data->email ?>" autocomplete="off" required="required" /></td>
			        <th scope="row">Enviar cópia para:</th>
			        <td><input type="email" name="email_cc" value="<?php echo $data->email_cc ?>" autocomplete="off" /></td>
			        
		        </tr>
		    <?php }?>
        <?php }else{?>
        	<tr align="center">
		        <th scope="row">Enviar para:</th>
		        <td><input type="email" name="email" value="" autocomplete="off" required="required" /></td>
		        <th scope="row">Enviar cópia para:</th>
		        <td><input type="email" name="email_cc" value="" autocomplete="off" /></td>
		        
	        </tr>
        <?php }?>
    </table>
    
    <h2>Destinatários Trabalhe Conosco</h2>

    <table id="assuntos" class="form-table" >
    	<?php if(isset($data->vg_email)){ ?>
    		<?php for($i=0; $i < count($data->vg_email); $i++){ ?>
		        <tr align="center">
			        <th scope="row">Enviar para:</th>
			        <td><input type="email" name="vg_email" value="<?php echo $data->vg_email ?>" autocomplete="off" required="required" /></td>
			        <th scope="row">Enviar cópia para:</th>
			        <td><input type="email" name="vg_email_cc" value="<?php echo $data->vg_email_cc ?>" autocomplete="off" /></td>
			        
		        </tr>
		    <?php }?>
        <?php }else{?>
        	<tr align="center">
		        <th scope="row">Enviar para:</th>
		        <td><input type="email" name="vg_email" value="" autocomplete="off" required="required" /></td>
		        <th scope="row">Enviar cópia para:</th>
		        <td><input type="email" name="vg_email_cc" value="" autocomplete="off" /></td>
		        
	        </tr>
        <?php }?>
    </table>

    <?php submit_button(); ?>

</form>
</div>