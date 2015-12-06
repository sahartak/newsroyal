tinyMCE.init({
	mode : "exact",
	elements: "text_editor",
	theme : "advanced",
	plugins: "imagemanager,paste,autolink,preview,media,contextmenu,inlinepopups,spellchecker",
	plugin_preview_width : "700",
	paste_text_sticky: true,
	paste_text_sticky_default: true,
	theme_advanced_buttons1 : "bold,italic,underline,|,"
							 +"strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,undo,redo,link,unlink,|,"
							 +"spellchecker,image,media,charmap,preview,code",
	theme_advanced_buttons2 : "",
	theme_advanced_buttons3 : "",
	theme_advanced_toolbar_location: "top",
	template_replace_values : {
		username : "Some User",
		staffid : "991234"
	}
});
$(function(){
	if( $("#img_or_no").find("img").length ) {
		tinyMCE['preview_img'] = $("#img_or_no").find("img").attr("src");
		tinyMCE['post_title'] = $(".post_title").html();
	}else{
		tinyMCE['preview_img'] = false;
		tinyMCE['post_title'] = '';
	}
});