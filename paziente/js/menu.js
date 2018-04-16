$(document).ready(function(){
	$(".fa-times").click(function(){
		$(".sidemenu").addClass("nascondi");
		$(".toggle-menu").addClass("appari");
		$(".pagecontent").addClass("change");
		$(".into_page").addClass("changemargin");
	});

	$(".toggle-menu").click(function(){
		$(".sidemenu").removeClass("nascondi");
		$(".toggle-menu").removeClass("appari");
		$(".pagecontent").removeClass("change");
		$(".into_page").removeClass("changemargin");
	});
});
