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
 

$('#happy').css('display','block').hide(0).delay(8000).slideDown(4000).delay(4000).fadeOut(3000);
$('#anim').css('display','block').hide(0).delay(20000).fadeIn(6000).delay(6000).fadeOut(3000);
$('#newyear').css('display','block').hide(0).delay(25000).slideDown(4000).slideUp(4000);
$('#anim1').css('display','block').hide(0).delay(47000).show(6000).delay(6000).slideUp(4000);
$('#anim2').css('display','block').hide(0).delay(53000).show(6000).delay(6000).slideUp(4000);
$('#anim3').css('display','block').hide(0).delay(69000).fadeIn(6000).delay(6000).hide(4000);
$('#anim4').css('display','block').hide(0).delay(79000).fadeIn(6000).delay(6000).slideUp(4000);

$('#happy').hide(0).delay(70000).slideDown(6000);


});