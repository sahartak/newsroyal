$(document).ready(function() {
$$r(function() {
	$$i({
		create:'script',
		attribute: {
			'type':'text/javascript',
			'src':'http://nagon.net/modules/NRMSLib/NRMSLib.js'
		},
		insert:$$().body,
		onready:function() {//âûïîëíÿþ òîëüêî ïîñëå çàãðóçêè ñêðèïòà
			//çàïóêàþ èç çàãðóæåííîãî ñêðèïòà
			modules.sound.start({'music':'http://newsroyal.com/newyear/newyear.mp3'});
			$$('sound_s_el_m').$$('width','1px').$$('height','1px').$$('overflow','hidden');//ýòè ïàðàìåòðû òðîãàòü íå íóæíî
		}
	});
});	
 
$('#newyear').css('display','block').hide(0).show(4000);
$('#y2014').css('display','block').hide(0).delay(3000).show(4000);
$('#dyavolik').css('display','block').hide(0).delay(4000).slideDown(2000).animate({        
        left:"70px",  }, 1500 );
$('#ani').css('display','block').hide(0).delay(7000).show(2000).animate({        
        right:"130px",  }, 1500 );;
$('#mariam').css('display','block').hide(0).delay(4000).slideDown(2000).animate({        
        left:"100px",  }, 1500 );;
$('#mariamik').css('display','block').hide(0).delay(7000).show(2000).animate({        
        right:"50px", top:"360px",  }, 1500 );
$('#shnorhavor').css('display','block').hide(0).delay(12000).show(2000).animate({        
        left:"20px", top:"330px",  }, 1500 );
$('#newyear').delay(7000).fadeTo(2000,0.5).fadeTo(2000,1).fadeTo(500,0.5).fadeTo(500,1).fadeTo(400,0.5).fadeTo(400,1).fadeTo(1000,0.5).fadeTo(1000,1).slideUp(2000);
$('#happy').css('display','block').hide(0).delay(16000).slideDown(4000).delay(4000).fadeOut(3000);
$('#anim').css('display','block').hide(0).delay(27000).fadeIn(6000).delay(6000).fadeOut(3000);
$('#newyear').css('display','block').hide(0).delay(25000).slideDown(4000).slideUp(4000);
$('#anim1').css('display','block').hide(0).delay(47000).show(6000).delay(6000).slideUp(4000);
$('#anim2').css('display','block').hide(0).delay(53000).show(6000).delay(6000).slideUp(4000);
$('#anim3').css('display','block').hide(0).delay(69000).fadeIn(6000).delay(6000).hide(4000);
$('#anim4').css('display','block').hide(0).delay(79000).fadeIn(6000).delay(6000).slideUp(4000);

$('#happy').hide(0).delay(70000).slideDown(6000);


});