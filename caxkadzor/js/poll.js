/**
 * Cookie plugin
 *
 * Copyright (c) 2006 Klaus Hartl (stilbuero.de)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 */
jQuery.cookie=function(B,I,L){if(typeof I!="undefined"){L=L||{};if(I===null){I="";L.expires=-1}var E="";if(L.expires&&(typeof L.expires=="number"||L.expires.toUTCString)){var F;if(typeof L.expires=="number"){F=new Date();F.setTime(F.getTime()+(L.expires*24*60*60*1000))}else{F=L.expires}E="; expires="+F.toUTCString()}var K=L.path?"; path="+(L.path):"";var G=L.domain?"; domain="+(L.domain):"";var A=L.secure?"; secure":"";document.cookie=[B,"=",encodeURIComponent(I),E,K,G,A].join("")}else{var D=null;if(document.cookie&&document.cookie!=""){var J=document.cookie.split(";");for(var H=0;H<J.length;H++){var C=jQuery.trim(J[H]);if(C.substring(0,B.length+1)==(B+"=")){D=decodeURIComponent(C.substring(B.length+1));break}}}return D}};

// poll captcha plugin
// Global variable definitions
// DB column numbers
var OPT_ID = 'id';
var OPT_TITLE = 'vote_option';
var OPT_VOTES = 'votes';

var votedID, title_text;

$(function() {
	title_text = $("#poll .title").html();
	var sesID = document.cookie.match(/PHPSESSID=[^;]+/);
	
	if ($("#poll-results").length > 0 ) {
		animateResults();
	}
	if ($.cookie('vote_id') && title_text!=null) {
		$("#poll-container").empty();
		votedID = $.cookie('vote_id');
		$.getJSON(htmDIR+"?to=poll&vote=none",loadResults);
	}
	var recaptchaWidget = $("#recaptcha_widget"),
		poll = $("#poll");
	$("#vote").bind('click', function(event) {
		event.preventDefault();
		if ($("input[name='poll']:checked").length) {		
			$("#recaptcha_image").append("<img id='captchaImage' src='../"+htmDIR+"actions/kcaptcha/index.php?PHPSESSID="+sesID+"' />");
			recaptchaWidget.toggle();
			poll.toggle();
		}
	});
	$("#submit").bind('click', function(event) {
		event.preventDefault();
		var id = $("input[name='poll']:checked").attr("value");
		votedID = id.replace("opt",'');
		$.ajax({
			type: 'POST',
			url: htmDIR+"?to=poll&l="+DBL,
			dataType: "json",
			data: {
				keystring: $("#key").val(),
				vote: votedID
			},
			success: function(data) {	
				console.log(data);
				if( data == 'fail' ) {
					reCaptcha();
				}else{
					$.cookie('vote_id', votedID, {expires: 1});
					recaptchaWidget.remove();
					loadResults(data);
				}
			}
		});
	});

	$("#reload").bind('click', function(event) {
		event.preventDefault();
		reCaptcha();
	});
	function reCaptcha() {
		$("#captchaImage").remove();
		$("#recaptcha_image").append("<img id='captchaImage' src='../"+htmDIR+"actions/kcaptcha/index.php?PHPSESSID="+sesID+"&date="+new Date()+"' />");
		$("#key").val('');
	}
});

function animateResults(){
	$("#poll-results .bar").each(function(){
		var percentage = $(this).next().text();
		$(this).css({width: "0%"}).animate({width: percentage}, 'slow');
	});
}

function loadResults(data) {
	var total_votes = 0,
		percent;
	
	for (id in data) {
		total_votes = total_votes+parseInt(data[id][OPT_VOTES]);
	}
	
	var results_html = "<div id='poll-results'><h3>"+title_text+"</h3>\n<dl class='graph'>\n";
	for (id in data) {
		percent = Math.round((parseInt(data[id][OPT_VOTES])/parseInt(total_votes))*100);
		if (data[id][OPT_ID] !== votedID) {
			results_html = results_html+"<div class='divspan clearfix'><dt class='bar-title'>"+data[id][OPT_TITLE]+"</dt><dd class='bar-container'><div id='bar"+data[id][OPT_ID]+"'style='width:0%;' class='bar'> </div><strong>"+percent+"%</strong></dd></div>\n";
		} else {
			results_html = results_html+"<div class='divspan clearfix'><dt class='bar-title'>"+data[id][OPT_TITLE]+"</dt><dd class='bar-container'><div id='bar"+data[id][OPT_ID]+"'style='width:0%;background-color:#0066cc;' class='bar'> </div><strong>"+percent+"%</strong></dd></div>\n";
		}
	}
  
	results_html = results_html+"</dl></div>\n";
  
	$("#poll-container").append(results_html).fadeIn("slow",function(){animateResults();});
}