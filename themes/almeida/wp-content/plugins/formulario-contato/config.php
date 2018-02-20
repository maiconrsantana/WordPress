<?php if(isset($_POST['submit'])){

	unset($_POST['submit']);

	$json = json_encode($_POST);

	//atualizar dados no banco
	update_option( GSKOPTION, $json );

?>
<div class="updated notice">
    <p>Dados alterados com sucesso!</p>
</div>
<?php }?>

<?php $data = json_decode(get_option(GSKOPTION)); ?>

<?php wp_enqueue_script( 'gshock-contato-script', plugins_url('gshock-contato/files/script.js') ); ?>

<div class="wrap">
<h1>Configurações Fale Conosco</h1>

<form id="config_fale_conosco" method="post" action="">
    
    <h2>Destinatários por Assunto</h2>

    <table id="assuntos" class="form-table" >
    	<?php if(isset($data->assunto)){ ?>
    		<?php for($i=0; $i < count($data->assunto); $i++){ ?>
		        <tr align="center">
			        <th scope="row">Assunto</th>
			        <td><input type="text" name="assunto[]" value="<?php echo $data->assunto[$i] ?>" autocomplete="off" required="required" /></td>
			        <th scope="row">Enviar para o Email:
			        </th>
			        <td><input type="email" name="email[]" value="<?php echo $data->email[$i] ?>" autocomplete="off" required="required" /></td>
			        <td><input name="remove_line" id="remove_line" class="button button-primary" value="remover" type="button"></td>
		        </tr>
		    <?php }?>
        <?php }else{?>
        	<tr align="center">
		        <th scope="row">Assunto</th>
		        <td><input type="text" name="assunto[]" value="" autocomplete="off" required="required" /></td>
		        <th scope="row">Enviar para o Email:
		        </th>
		        <td><input type="email" name="email[]" value="" autocomplete="off" required="required" /></td>
		        <td><input name="remove_line" id="remove_line" class="button button-primary" value="remover" type="button"></td>
	        </tr>
        <?php }?>
    </table>

    <p class="submit"><input name="new_line" id="new_line" class="button button-primary" value="Adicionar Assunto" type="button"></p>
    
    <h2>Dados para envio</h2>

    <table id="assuntos" class="form-table" style="width: 50%" >
		<tr align="center">
	        <th scope="row">Enviar cópia para:</th>
	        <td><input type="text" name="copia" autocomplete="off" value="<?php if(isset($data->copia)){ echo $data->copia; } ?>" /></td>
        </tr>
    </table>

    <?php submit_button(); ?>

</form>
</div>