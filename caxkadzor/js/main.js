function openPopup() {
	$.fancybox.open({
		href: '#popupBox',
		modal: true
	}, {
		fitToView	: false,
		width		: '480px',
		height		: '320px',
		autoSize	: false,
		closeClick	: true,
		openEffect	: 'none',
		closeEffect	: 'none'
	});
}

function closePopup() {
	$.fancybox.close();
}

$(function () {
	// openPopup();
	// $('#popupClose').click(closePopup);

	/* photo gallery box */
	$(".fp").fancybox({
		openEffect	: 'none',
		closeEffect	: 'none'
	});

	$('#important-blog').carouFredSel({
		width: 650,
		height: '100%',
		direction: 'up',
		items: 1,
		scroll: {
			duration: 600,
			pauseOnHover: "resume",
			onBefore: function( data ) {
				data.items.visible.children().css( 'opacity', 0 ).delay( 200 ).fadeTo( 400, 1 );
				data.items.old.children().fadeTo( 400, 0 );
			}
		}
	});
	
	/* ---------------------------------------------
					    Video Slider 
	 -----------------------------------------------*/
	$('.smallVideo').carouFredSel({
		auto : {
			timeoutDuration : 8000,

		},
	});
	

	/* player */
	if($('#mediaplayer').length) {
		var id = $('#mediaplayer').data('url');
		jwplayer('mediaplayer').setup({
		   'flashplayer': htmDIR + 'player/player.swf',
		   'id': 'playerID',
		   'width': '630',
		   'height': '400',
		   'skin': htmDIR + "player/skins/newtube/NewTube.xml",
		   'file': 'http://www.youtube.com/watch?v=' + id
		});
	}

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

	/* menu open */
	$('.sub-open').click(function() {
		$('.dropDownMenuBox').toggle();
	});
	$('.rate-open').click(function() {
		$('.rateBox').toggle();
	});
	
	// weather
	$('.weather').weatherfeed(['AMXX0003']);
	
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

	/* captcha reload */
	$("#reload-send-img").click(function(e) {
		e.preventDefault();
		reCaptcha();
	});

	function reCaptcha() {
		var sesID = 'haha';
		$(".captch  img").remove();
		$(".captch").append("<img src='"+htmDIR+"captcha/?PHPSESSID="+sesID+"&date="+new Date()+"' />");
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

	/* pressBlog */
	$('#pressBlogSL').carouFredSel({
		scroll: {
			items: 3,
			pauseOnHover: "resume",
			duration: 1000
		},
		auto: true,
		prev: '#pressBlog-prev',
		next: '#pressBlog-next',
		swipe: {
			onMouse: true,
			onTouch: true
		}
	});

	/* pressBlog */
	$('#featuredSL').carouFredSel({
		scroll: {
			items: 1,
			pauseOnHover: "resume",
			duration: 300
		},
		auto: {
			delay : 0,
			pauseDuration : 8000
		},
		direction: 'up',
		prev: '#featured-prev',
		next: '#featured-next',
		swipe: {
			onMouse: true,
			onTouch: true
		}
	});
	
	/* fancybox youtube */
	$('.fbframe').fancybox({
		width: '600px',
		height: '400px'
	});

	/* rate */
	
	
	/* clock */
	setInterval( function() {
		$("#sec").fadeOut().fadeIn();	
	},1000);
	setInterval( function() {
		var minutes = new Date().getMinutes();
		$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
	},1000);
	setInterval( function() {
		var hours = new Date().getHours();
		$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
	}, 1000);
	
	// datepicker
	$('.calendar')
	.datePicker({
		startDate: '12/01/2013',
		endDate: (new Date()).asString(),
		createButton: false
	})
	.on('click', function() {
		$(this).dpDisplay();
		this.blur();
		return false;
	})
	.on('dateSelected', function(e, selectedDate, $td){
		window.location.href ="date.php?date="+selectedDate;
	})
	.dpSetOffset(25, 0)
	.dpSetPosition($.dpConst.POS_TOP, $.dpConst.POS_RIGHT);


	/* setCookie */
	if ($('#make-count').length) {
		var post_id = $('#make-count').data('id');
		if (typeof getCookie(post_id) === "undefined" ) {
			var url = htmDIR + '?to=hitcounter';
			$.post(url, { 
				id: post_id
			});
			console.log('setting now');
			setCookie(post_id, 'default', 3);
		}
	}


	
});

/* set/get cookie interface */	
function setCookie(c_name,value,exhours) {
	var exdate=new Date();
	exdate.setHours(exdate.getHours() + exhours);
	var c_value=escape(value) + ((exhours==null) ? "" : "; expires="+exdate.toUTCString());
	document.cookie=c_name + "=" + c_value;
}
function getCookie(c_name){
	var i,x,y,ARRcookies=document.cookie.split(";");
	for (i=0;i<ARRcookies.length;i++){
		x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
		y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
		x=x.replace(/^\s+|\s+$/g,"");
		if (x==c_name){
			return unescape(y);
		}
	}
}