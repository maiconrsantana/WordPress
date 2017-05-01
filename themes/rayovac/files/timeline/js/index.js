
// variables
var $header_top = $('.header-top');
var $nav = $('nav');
var $fpnav = $('.fp-nav');


// toggle menu 
$header_top.find('a').on('click', function() {
  $(this).parent().toggleClass('open-menu');
});



// fullpage customization
$('#fullpage').fullpage({
  //sectionsColor: ['#fff', '#fff', '#F2AE72', '#5C832F', '#B8B89F'],
  sectionSelector: '.vertical-scrolling',
  slideSelector: '.horizontal-scrolling',
  navigation: true,
  autoScrolling: true,
  slidesNavigation: true,
  controlArrows: false,
  anchors: ['inicio', 'ano-1906', 'ano-1919', 'ano-1921'],
  menu: '#menu',

  afterLoad: function(anchorLink, index) {
    //$header_top.css('background', 'rgba(0, 47, 77, .3)');
    //$nav.css('background', 'rgba(0, 47, 77, .25)');
	$('a.active').parent().addClass('active');
	
	if(anchorLink == 'inicio'){
		$('#fp-nav').hide();
		$('.navbar-fixed-top').css('top', '0px');
	}else{
		$('#fp-nav').show();
		$('.navbar-fixed-top').css('top', '-200px');
	}
    
  },

  onLeave: function(index, nextIndex, direction) {
	
  },

  afterSlideLoad: function( anchorLink, index, slideAnchor, slideIndex) {
    
	if(anchorLink == 'fifthSection' && slideIndex == 1) {
      $.fn.fullpage.setAllowScrolling(false, 'up');
      $header_top.css('background', 'transparent');
      $nav.css('background', 'transparent');
      $(this).css('background', '#374140');
      $(this).find('h2').css('color', 'white');
      $(this).find('h3').css('color', 'white');
      $(this).find('p').css(
        {
          'color': '#DC3522',
          'opacity': 1,
          'transform': 'translateY(0)'
        }
      );
    }
  },

  onSlideLeave: function( anchorLink, index, slideIndex, direction) {
 
	if(anchorLink == 'fifthSection' && slideIndex == 1) {
      $.fn.fullpage.setAllowScrolling(true, 'up');
      $header_top.css('background', 'rgba(0, 47, 77, .3)');
      $nav.css('background', 'rgba(0, 47, 77, .25)');
    }
  } 
});