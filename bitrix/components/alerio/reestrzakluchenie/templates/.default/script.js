$(function() {


            $('#DateFindFrom, #DateFindTo').datepicker($.extend({
                inline: true,
                changeYear: true,
                changeMonth: true,
            },
             $.datepicker.regional['ru']
           ));
   
    jQuery(function ($) {
        $.datepicker.regional['ru'] = {
            closeText: 'Закрыть',
            prevText: '&#x3c;Пред',
            nextText: 'След&#x3e;',
            currentText: 'Сегодня',
            monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
            'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
            monthNamesShort: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
            'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
            dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
            dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
            dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
            weekHeader: 'Нед',
            dateFormat: 'dd.mm.yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['ru']);
    });
	
	$('#FilterForm').click(function() {
		//удаляем предыдущие ошибки при клике на любой элемент формы
		$("#FilterForm p.error").remove();
		$("#FilterForm label.error").removeClass("error");
		$("#FilterForm input.error").removeClass("error");
		
	});
	
	
	
	$('#FilterForm').submit(function() {
		//удаляем предыдущие ошибки
		$("#FilterForm p.error").remove();
		$("#FilterForm input.error").removeClass("error");

		
		var bNotErrorDateFindFrom = true;
		var bNotErrorDateFindTo = true;
		var bNotErrorDatePeriod = true;
		
		

		
		var sObjectName = $("#ObjectName").val();      			//наименование объекта
		var sObjectAddress = $("#ObjectAddress").val(); 		//адрес объекта
		var sZastroychikName = $("#ZastroychikName").val(); 	//наименование застройщика
		var sDateFindFrom = $("#DateFindFrom").val(); 			//дата начала реестра
		var sDateFindTo = $("#DateFindTo").val(); 				//дата окончания реестра
		
		

		
		//удаляем лишние пробелы внутри строки
		sObjectName = sObjectName.replace(/\s+/g," ");
		sObjectAddress = sObjectAddress.replace(/\s+/g," ");
		sZastroychikName = sZastroychikName.replace(/\s+/g," ");
		sDateFindFrom = sDateFindFrom.replace(/\s+/g," ");
		sDateFindTo = sDateFindTo.replace(/\s+/g," ");
		
		//удаляем лишние пробелы в начале и конце строки
		sObjectName=$.trim(sObjectName);
		sObjectAddress=$.trim(sObjectAddress);
		sZastroychikName=$.trim(sZastroychikName);
		sDateFindFrom=$.trim(sDateFindFrom);
		sDateFindTo=$.trim(sDateFindTo);
		
		
		//присваиваем скорректированные значения элементам формы
		$("#ObjectName").val(sObjectName);
		$("#ObjectAddress").val(sObjectAddress);
		$("#ZastroychikName").val(sZastroychikName);
		$("#DateFindFrom").val(sDateFindFrom);
		$("#DateFindTo").val(sDateFindTo);
		
		
		
		
		/*----------------------------------------------------
		 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
		 * @description 	проверяем, задан ли хотя бы один фильтр
		 * 
		 *  --Начало--23.09.2013 18:45
		 ----------------------------------------------------*/
		if(sObjectName!="" || sObjectAddress!="" || sZastroychikName!="" || sDateFindFrom!="" || sDateFindTo!="")
		{
		/*  --Конец--23.09.2013 18:45
		 ----------------------------------------------------*/

			//проверяем формат даты начала реестра
			
			if(sDateFindFrom!="" && !sDateFindFrom.match(/^(0[1-9]|[12]\d|3[01])\.(0[1-9]|1[0-2])\.\d\d\d\d$/))
			{  
				$("#DateFindFrom").addClass("error");
				$('<p class="error" >Проверьте, пожалуйста, дату!</p>').insertAfter('#DateFindFrom');
				bNotErrorDateFindFrom = false;
			}
			
			//проверяем форма даты окончания реестра
			if(sDateFindTo!="" && !sDateFindTo.match(/^(0[1-9]|[12]\d|3[01])\.(0[1-9]|1[0-2])\.\d\d\d\d$/))
			{  
				$("#DateFindTo").addClass("error");
				$('<p class="error" >Проверьте, пожалуйста, дату!</p>').insertAfter('#DateFindTo');
				bNotErrorDateFindTo = false;
			}
			
			
			//проверяем период реестра: дата начала должна быть меньше или равна даты окончания реестра 
			var arDateFindFrom = sDateFindFrom.split(".");
			var arDateFindTo = sDateFindTo.split(".");
			var dDateFindFrom = new Date(arDateFindFrom[2],arDateFindFrom[1],arDateFindFrom[0]);
			var dDateFindTo = new Date(arDateFindTo[2],arDateFindTo[1],arDateFindTo[0]);
			if(sDateFindFrom!="" && sDateFindTo!="" && bNotErrorDateFindFrom && bNotErrorDateFindTo &&  dDateFindFrom>dDateFindTo)
			{
				$('<p class="error" style="text-align:center">Проверьте, пожалуйста, период!</p>').insertBefore('input[name=filter]');
				$("#DateFindFrom").addClass("error");
				$("#DateFindTo").addClass("error")
				bNotErrorDatePeriod = false;
			}
			
			
			if(bNotErrorDateFindFrom && bNotErrorDateFindTo && bNotErrorDatePeriod)
			{
				return true;
			}
			else
			{
				//удаляем количество найденных в прошлый раз документов
				$("#CountResult").remove();
				//удаляем таблицу, если она ранее была выведена
				$("#ReestrHeader").remove();	//шапка таблицы
				$("#items").remove();			//содержимое таблицы
				//удаляем постраничную навигацию
				$("#PaginationTitle").remove();		//заголовок постраничной навигации
				$("#pagination").remove();			//страницы
				return false;
			}
		}
		else
		{
			$("#FilterForm").prepend('<p class="error" >Необходимо задать хотя бы один фильтр!</p>');
			$("#FilterForm input[type='text']").addClass("error");
			//удаляем количество найденных в прошлый раз документов
			$("#CountResult").remove();
			//удаляем таблицу, если она ранее была выведена
			$("#ReestrHeader").remove();	//шапка таблицы
			$("#items").remove();			//содержимое таблицы
			//удаляем постраничную навигацию
			$("#PaginationTitle").remove();		//заголовок постраничной навигации
			$("#pagination").remove();			//страницы
			return false;
		}
	
	
		
	});
	
	
	
	
	
		
	$('ul#items').easyPaginate({
		step:10
	});

	$('<span id="PaginationTitle">Страницы: </span>').insertBefore('#pagination');
	

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