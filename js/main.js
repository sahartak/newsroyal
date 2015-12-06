$(function () {

	$pane = $('.scroll-pane');
	$pane.jScrollPane({
		showArrows: true
	});
	var api = $pane.data('jsp');
    

	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
		BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
		iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
		Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
		Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
		any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};


	/* jscroll */
	if (isMobile.iOS() || isMobile.Android()) {
		$('.timelineBig')
			.bind('jsp-initialised', function () {
				$('.jspVerticalBar').css({display: 'none !important'});
			})
			.jScrollPane({showArrows: true});
	} else {
		$('.timelineBig').jScrollPane({showArrows: true});
	}

	
	/* general slider */
	$('#generalSL').carouFredSel({
		auto: {
			delay : 0,
			pauseDuration : 6000
		},
		scroll: {
			items: 1,
			pauseOnHover: "resume",
			fx: "crossfade",
			duration: 500
		},
		prev: '#gen-prev',
		next: '#gen-next',
		swipe: {
			onMouse: true,
			onTouch: true
		}
	});

	
});

$(document).ready(function() {
    
    $('.close').click(function() {
		$('#shadow').hide();
		$('#window').hide();
        $('#window2').hide();        
	});
	
    setTimeout(function(){
        $('#shadow').show();
		$('#window').slideToggle(500);
    },7000);
	

});
