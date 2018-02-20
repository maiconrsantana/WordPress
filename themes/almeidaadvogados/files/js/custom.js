/** theme custom scripts **/

$(document).ready(function() {

  $('.open-menu').on('click', function() {
	 $('.overlay').addClass('open');
	 $('.open-menu').hide();
	 $('.close-menu').show();
	 $('.social_menu').addClass('mobile');
	 
	 $('.lang-top').addClass('mobile');

	 $(".nicescroll-rails").hide();

	 window.getSelection().removeAllRanges();
  });

  $('.close-menu').on('click', function() {
	$('.overlay').removeClass('open');
	$('.open-menu').show();
	$('.close-menu').hide();
	$('.social_menu').removeClass('mobile');

	$('.lang-top').removeClass('mobile');

	$(".nicescroll-rails").show();

  });			  
});

$(document).ready(function() { 

	$("html").niceScroll({cursorwidth: '7px', autohidemode: true, emulatetouch: true, zindex: 99999, horizrailenabled: false});

	$(".scroll").niceScroll({cursorwidth: '7px', autohidemode: true, zindex: 99999, horizrailenabled: false});

	$(".menu_scroll").niceScroll({cursorwidth: '0px', autohidemode: true, zindex: 99999, horizrailenabled: false});

	mouse_scroll();

	banner_height();
});

$( window ).resize(function() {
	mouse_scroll();

	banner_height();
});



/* funções banner home */
function banner_home(array){
	//alert( JSON.stringify(array, null, 2) );

	//alert(array.length);

	//alert(array[0].img);

	show_banner(array[0].img, array[0].title, array[0].link);

	var total = (array.length) - 1;
	var i=1;

	if(total >= i){

		play = setInterval(function(){ 

			show_banner(array[i].img, array[i].title, array[i].link);
			
			i++;
			while(i > total){
				i=0;
			}

		},9000);
	}
	
};

function show_banner(img, title, link){
	
	$('#main_banner_home').css('background-image', 'url('+img+')');
	$('#main_title_banner_home').html(title);
	$('#main_link_banner_home').attr('href', link);
	//alert(img);
}

$("#main_title_banner_home").mouseover(function() {
  	clearInterval(play);
});

/* funções de scroll imagem equipe */

function img_scroll(){


	var img 		= $('.single-equipe .top img');
	var dest		= $('.single-equipe .first-line .destaques');
	var container	= $('.single-equipe #container');
	var overlay		= $('.overlay').height();
	
	$("html").niceScroll().scrollend(function(){


		if ( $(window).width() >= 1024 ){ //desktop

			img.css('position', 'absolute');
			//img.css('left', 'calc(50% - 225px)');
			img.css('left', '0');

			dest.css('position', 'absolute');

			var scroll  = $(document).scrollTop();

			var limit = (container.height() - 50);

			if (scroll >= '860' && scroll < limit){
				dest.hide();
				
				var top = ( scroll - 260 ) + 'px';

				img.css('top', top);
			}else if (scroll >= limit){
				img.css('top', ( container.height() - img.height() - 320 ) );
				
				//img.css('top', scroll);
			}else{
				dest.show();

				img.css('top', '0px');
			}

		}else{ //mobile
			img.css('position', 'relative');
			img.css('top', '0px');
			img.css('left', 'auto');

			dest.css('position', 'relative');
			dest.show();
		}

	});

}

function mouse_scroll(){
	var $el 	= $('#mouse_scroll');
	
	if($el.length){
		var $ht 	= $(window).height() - $el.height() - 50;

		$el.css('top', $ht+'px');
	}

};

function banner_height(){
	var $dh = $('.dinamic-height');
	var $el = $('.links-menu');
	var $ht = $(window).height();

	//ajustes menu
	if ( $(window).width() >= 1024 ){ //desktop
		$dh.height($ht-115);

		var $over_h = $('.overlay').height();
		var $loca_h = $('.menu-locations').height();
		var $logo_h = $('.logo-top').height();

		var $margin = (($over_h - $loca_h - $logo_h)/3) - 30;

		$el.css('margin-top', $margin + 'px');
	}else{
		$dh.height($ht);

		var $over_h = $('.overlay').height();
		var $logo_h = $('.logo-top').height();

		var $margin = (($over_h - $logo_h)/3) - 30;

		$el.css('margin-left', '0px');
		$el.css('margin-right', '0px');

		if($margin > 0){
			$el.css('margin-top',  $margin + 'px');
		}else{
			$el.css('margin-top',  '10px');	
		}
		
		
	}

	//desativar altura automática do header se variavel existir
	if (typeof disable_header_height !== 'undefined') {
		$dh.height('');
	}

	/*if ( $(window).height() >= 500 ){
		$('.social_menu').show();
		
	}else{
		$('.social_menu').hide();
	}*/

	if ( $(window).height() >= 700 ){
		$('.row-locations').addClass('absolute');
	}else{
		$('.row-locations').removeClass('absolute');
	}

	/*if ( $(window).width() >= 1024 ){ //desktop
		var $ht = $(window).height();

		$el.height($ht-115);
	}else{
		$el.height('');
	}*/



	/*if ( $(window).width() <= 992 ){ //title position
		var $ht = $('.dinamic-height').height();
		var $top = ($ht-400);

		$('.equipe_index.quote_title').css('top', $top+'px');
	}else{
		$('.equipe_index.quote_title').css('top', 'inherit');
	}*/
};


/* buscar membros da equipe */
$(document).ready(function() {
	$('#box_equipe').keyup(function(){

		var valThis = removerAcentos($(this).val().toLowerCase());
	    if(valThis == ""){
	        $('.content_search_equipe .content').show();
	    }else{
	        $('.content_search_equipe .content').each(function(){
	            //var text = $(this).data('search-equipe').toLowerCase();
	            var text = removerAcentos($(this).data('searchEquipe').toLowerCase());
	            //alert(text.indexOf(valThis)); return false;
	            (text.indexOf(valThis) >= 0) ? $(this).show() : $(this).hide();
	        });
	   };

	});

	$('#andre_de_almeida').click(function(){
		
		var valThis = 'andre de almeida';
        $('.content_search_equipe .content').each(function(){
            //var text = $(this).data('search-equipe').toLowerCase();
            var text = removerAcentos($(this).data('searchEquipe').toLowerCase());
            //alert(text.indexOf(valThis)); return false;
            (text.indexOf(valThis) >= 0) ? $(this).show() : $(this).hide();
        });
	  
	});

	$('#socios').click(function(){
		
		var valThis1 = 'socia';
		var valThis2 = 'socio';
        $('.content_search_equipe .content').each(function(){
            //var text = $(this).data('search-equipe').toLowerCase();
            var text = removerAcentos($(this).data('searchCategory').toLowerCase());
            //alert(text.indexOf(valThis)); return false;
            (text.indexOf(valThis1) >= 0 || text.indexOf(valThis2) >= 0) ? $(this).show() : $(this).hide();
        });
	  
	});

	$('#filter_equipe_seniors').click(function(){

		$('html, body').animate({
        	scrollTop: $("#content_equipe_seniors").offset().top
    	}, 800);

	});


});


/*fim funções busca de equipe*/


/**
 * Remove acentos de caracteres
 * @param  {String} stringComAcento [string que contem os acentos]
 * @return {String}                 [string sem acentos]
 */
function removerAcentos( newStringComAcento ) {
  var string = newStringComAcento;
	var mapaAcentosHex 	= {
		a : /[\xE0-\xE6]/g,
		e : /[\xE8-\xEB]/g,
		i : /[\xEC-\xEF]/g,
		o : /[\xF2-\xF6]/g,
		u : /[\xF9-\xFC]/g,
		c : /\xE7/g,
		n : /\xF1/g
	};

	for ( var letra in mapaAcentosHex ) {
		var expressaoRegular = mapaAcentosHex[letra];
		string = string.replace( expressaoRegular, letra );
	}

	return string;
}




//funções página artigos

function pagination(){
	var this_pg = $('#btn_ver_mais').data('page');
	var this_type = $('#btn_ver_mais').data('type');
	var this_term = $('#btn_ver_mais').data('term');
	
	$('#btn_ver_mais').data('page', this_pg+1);

	set_page(this_pg);

	get_posts(this_type, this_term);
}

function set_page(page){
	pag = page;
}

function get_posts(type, term){
	$("#loading").show();
	$(".menu_news a").removeClass('active');
	$("#btn_ver_mais").text('CARREGANDO...');
	$('#btn_ver_mais').data('term', term);
 	
	var append = true;

 	//verificar tipo, caso diferente limpa tela e seta como página 1
 	if(typeof term_control !== 'undefined' && term_control != term){
 		$("#div_busca").html('');
 		$('#btn_ver_mais').data('page', 2);
 		pag = 1;
 		var append = false;
 	}else{
 		if(typeof pag_control !== 'undefined' && pag_control == pag){
 			var append = false;
 		}
 	}
 	term_control = term;
 	pag_control = pag;
 	

 	//adicionar valor da pagina na url
	if(type == 'category'){
		$(".menu_news #"+term).addClass('active');
		$('#btn_ver_mais').data('type', 'category');
 		var pagina = "/midia/pagina/" + pag + "?categoria=" + term;
 	}else if(type == 'todos'){
 		$(".menu_news #todos").addClass('active');
 		$('#btn_ver_mais').data('type', 'todos');
 		var pagina = "/midia/pagina/" + pag + "/";
 	}else if(type == 'andrealmeida'){
 		$(".menu_news #andrealmeida").addClass('active');
 		$('#btn_ver_mais').data('type', 'andrealmeida');
 		var pagina = "/midia/pagina/" + pag + "/";
 	}else{
 		var pagina = "/midia/pagina/" + pag + "/";
 	}

	// muda a url
	window.history.pushState('Object', 'Busca', BASE_URL + pagina);	


	$.ajax({
    method: "POST",
    url: BASE_URL + "/wp-admin/admin-ajax.php" ,
    data: {
        action: "almd_get_artigos",
        page: pag,
        term: term,
        type: type,
    },
    async: true,
	}).done(function(result) {

		if(append){
			$(result).load(function(){}).appendTo("#div_busca");
		}else{
			$("#div_busca").html(result);
		}

		$("#loading").hide();
    	$("#btn_ver_mais").text('VER MAIS');
	    
	});

	//verificar se todos os posts foram exibidos para ocultar botão
	$.post( BASE_URL + "/wp-admin/admin-ajax.php", { action: "getPostsFinish", page: pag, term: term, type: type })
	  .done(function( data ) {
	    if(data == '0'){
	    	$("#btn_ver_mais").hide();
	    }else{
	    	$("#btn_ver_mais").show();
	    }
	});
}