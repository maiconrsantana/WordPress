window.addEventListener( 'load', function() {

    $('.item_timeline').click(function(){
        var item = $(this);
        var year = item.data('year');
        $(document).scrollTo(year, 800);
    }); 

    var countItems = 0;
    $(".items_timeline").find(".item_timeline").each(function(){
        var item = $(this);
        item.attr('data-number', countItems);
        item.addClass('item_number_'+countItems);
        countItems++;
    });

    //altura do documento
    var docHeight = document.documentElement.offsetHeight;

    //posicao do scroll
    var scrolled = window.scrollY / ( docHeight - window.innerHeight );

    //inicia a animação
    timeline(scrolled, window.scrollY, (countItems-1));
  
    //evento scroll
    window.addEventListener( 'scroll', function() {
     
        //normaliza a posição entre 0 e 1
        var scrolled = window.scrollY / ( docHeight - window.innerHeight );

        //inicia a animação com o scroll
        timeline(scrolled, window.scrollY, (countItems-1));
    
    }, false);



});

var windowY = 0;
var direction = 'UP';
function timeline(scrolled, posY, countItems){

    if(scrolled>=windowY){
        direction = 'DOWN';
    }else{
        direction = 'UP';
    }
    windowY = scrolled;

    if(scrolled>=0.95){
        $(".line_guide").css({'position':'absolute', 'top':(posMenu+260)+'px'});
    }else{
        $(".line_guide").css({'position':'fixed', 'top':'260px'});
        posMenu = posY;
    }

    $(".timeline").find(".content_timeline").each(function(){
        var item = $(this);
        var itemY = item.position();
        var itemYear = item.data('year');
        
        if(item.isOnScreen()){
            
            var itemNumber = $(".nav_timeline_"+itemYear).data('number'); 

            var j;
            for(j=0; j<=itemNumber; j++) {
                cssMenuTimeLine('.item_number_'+j, '#000000', '#000000');
            }

            if(direction=='DOWN'){
                cssMenuTimeLine(".nav_timeline_"+itemYear, '#000000', '#000000');
            }else if(direction=='UP'){
                cssMenuTimeLine(".nav_timeline_"+itemYear, '#bcbdc1', '#FFFFFF');
            }
        }            
    });

}

function cssMenuTimeLine(item, color, color2){
    $(item).css({
        'border-right': '1px solid '+color,
        'color': color
    });
    $(item+' > span').css({
        'border': '1px solid '+color,
        'background-color': color2
    });
}