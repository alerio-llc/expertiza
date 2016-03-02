$(document).ready(function() {
	
	$("#SectionNav > li.Active + ul").slideDown();
	
	$("#SectionNav > li").click(function(){
		$("#SectionNav > li + ul").slideUp();
		$("#SectionNav > li").removeClass("Active");
		$(this).addClass("Active");
		$(this).next("ul").slideDown();
		
		
	});
	
	
});