
jQuery(function($){
		$('#CollapseForm').click(function(event) {			
			event.preventDefault();
			if (!$(this).hasClass('Collapsed')) {				
				$(this).parent().children('div').slideUp();
				$(this).addClass('Collapsed');
			}
			else {				
				$(this).parent().children('div').slideDown(400, function() { $(this).find('input[type="text"]').eq(0).focus();});
				$(this).removeClass('Collapsed');
				
			}
		});
		
		$('#GeneralNav > li').click(function(event) {
			var submenu = $(this).children('ul');
			if (!$(this).hasClass('Active')) {
				$(this).addClass('Active').siblings().removeClass('Active');
				$('#GeneralNav > li > ul').hide();
				submenu.slideDown();
			}
			else {
				submenu.slideToggle();
			}
			
			var formTrigger = $('#CollapseForm');
			if (formTrigger.is('a') && !formTrigger.hasClass('Collapsed'))
				formTrigger.trigger('click');
		});
		$( document ).ready(function() {
            $('li.selected').parent('ul').parent('li').addClass('Active');
			$('li.selected').addClass('Active');
});
		
		
	
	
		
});