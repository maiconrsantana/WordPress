/*$(document).on('submit', '#form_contact #send_form', function (e) {
    alert('ok');
    return false;
    
	var data = jQuery('#FrmjackroseRsvp').serializeArray();

	jQuery( '#FrmjackroseRsvp #SendBtn').val('enviando...');
	jQuery( '#FrmjackroseRsvp #SendBtn').attr('disabled', true);

	  jQuery.ajax({
	    method: "POST",
	    url: BASE_URL + "/wp-admin/admin-ajax.php" ,
	    data: {
	        action: "mrs_contact_getForm",
	        post: data,
	    },
	    async: true,
		}).done(function(result) {
			alert(result);

			jQuery( '#FrmContatoGshock .alert' ).addClass('hidden');

			if(result == 'enviado'){
				jQuery( '#FrmContatoGshock .alert-success' ).removeClass('hidden');
				jQuery( '#FrmContatoGshock #send_button' ).hide();
			}else{
				jQuery( '#FrmContatoGshock .alert-danger' ).removeClass('hidden');
				jQuery( '#FrmContatoGshock #send_button' ).val('enviar');
				jQuery( '#FrmContatoGshock #send_button' ).attr('disabled', false);
			}
		    
		});

	return false;
});*/


$('#vaga_curriculo').change(function() {
  	var file = $('#vaga_curriculo').val();

  	if(file != ''){
  		$('#vaga_curriculo_btn').html(file);
  	}
});

function candidatar(id) {

    $('html, body').animate({
        scrollTop: $("#vagas_content").offset().top
    }, 800);

    $('#vaga_cargo option[value='+id+']').attr('selected','selected');

};

function arquivo() {

    $('#vaga_curriculo').trigger( "click" );

};


function retorno_contato(tipo) {


    $('html, body').animate({
        scrollTop: $(".scrool-line").offset().top
    }, 800);

    var msg_div = $('#message');
	var msg 	= $('#message span');

    switch (tipo) {
        case 'sucesso':
        	msg.html('<strong>Mensagem enviada com sucesso!</strong>')
            msg_div.addClass('alert-success').show();
            break;
        case 'erro':
        	msg.html('<strong>Erro ao enviar mensagem!</strong> Por favor, tente novamente em instantes.')
            msg_div.addClass('alert-danger').show();
            break;
		case 'erro_anexo':
        	msg.html('<strong>Erro ao enviar arquivo!</strong> Apenas arquivos em PDF são aceitos.  Por favor, verifique e tente novamente em instantes.')
            msg_div.addClass('alert-danger').show();
            break;
    }

};