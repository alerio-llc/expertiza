$(function() {
	$( "#DateFindFrom, #DateFindTo" ).datepicker({
	changeMonth: true,
	changeYear: true
	});
	
	$('#FilterForm').change(function() {
			
		//удаляем предыдущие ошибки
		$("#FilterForm p.error").remove();
		$("#FilterForm input.error").removeClass("error");
		
	});
	
	$('#FilterForm').submit(function() {
		//удаляем предыдущие ошибки
		$("#FilterForm p.error").remove();
		$("#FilterForm input.error").removeClass("error");

		
		var bNotErrorDateFindFrom = true;
		var bNotErrorDateFindTo = true;
		var bNotErrorDatePeriod = true;
		

		//проверяем формат даты начала реестра
		var sDateFindFrom = $("#DateFindFrom").val();
		if(!sDateFindFrom.match(/^(0[1-9]|[12]\d|3[01])\.(0[1-9]|1[0-2])\.\d\d\d\d$/))
		{  
			$("#DateFindFrom").addClass("error");
			$('<p class="error" >Проверьте, пожалуйста, дату!</p>').insertAfter('#DateFindFrom');
			bNotErrorDateFindFrom = false;
		}
		
		//проверяем форма даты окончания реестра
		var sDateFindTo = $("#DateFindTo").val();
		if(!sDateFindTo.match(/^(0[1-9]|[12]\d|3[01])\.(0[1-9]|1[0-2])\.\d\d\d\d$/))
		{  
			$("#DateFindTo").addClass("error");
			$('<p class="error" >Проверьте, пожалуйста, дату!</p>').insertAfter('#DateFindTo');
			bNotErrorDateFindTo = false;
		}
		
		
		//проверяем период реестра: дата начала должна быть меньше или равна даты окончания реестра 
		var arDateFindFrom = sDateFindFrom.split(".");
		var arDateFindTo = sDateFindTo.split(".");
		var dDateFindFrom = new Date(arDateFindFrom[1],arDateFindFrom[0],arDateFindFrom[2]);
		var dDateFindTo = new Date(arDateFindTo[1],arDateFindTo[0],arDateFindTo[2]);
		if(bNotErrorDateFindFrom && bNotErrorDateFindTo &&  dDateFindFrom>dDateFindTo)
		{
			$('<p class="error" >Проверьте, пожалуйста, период!</p>').insertBefore('input[name=filter]');
			bNotErrorDatePeriod = false;
		}

		
		if(bNotErrorDateFindFrom && bNotErrorDateFindTo && bNotErrorDatePeriod)
		{
			return true;
		}
		else
		{
			return false;
		}
	});
	
	
	
	
	
		
	$('ul#items').easyPaginate({
		step:10
	});

	$('<span  style="float: left; padding: 3px 0; font-weight: bold;color: #888888; font-size: 14px;">Страницы: </span>').insertBefore('#pagination');
	

});
/* Russian (UTF-8) initialisation for the jQuery UI date picker plugin. */
jQuery(function($){
        $.datepicker.regional['ru'] = {
                closeText: 'Закрыть',
                prevText: '&#x3c;Пред',
                nextText: 'След&#x3e;',
                currentText: 'Сегодня',
                monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
                'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
                'Июл','Авг','Сен','Окт','Ноя','Дек'],
                dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
                dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
                dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
                weekHeader: 'Не',
                dateFormat: 'dd.mm.yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''};
        $.datepicker.setDefaults($.datepicker.regional['ru']);

});
