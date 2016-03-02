$(function() {
	$('#ResolutionProjectFilterForm').click(function() {
		//удаляем предыдущие ошибки при клике на любой элемент формы
		$("#ResolutionProjectFilterForm p.error").remove();
		$("#ResolutionProjectFilterForm label.error").removeClass("error");
		$("#ResolutionProjectFilterForm input.error").removeClass("error");
		
	});
	
	
	
	$('#ResolutionProjectFilterForm').submit(function() {
		//удаляем предыдущие ошибки
		$("#ResolutionProjectFilterForm p.error").remove();
		$("#ResolutionProjectFilterForm input.error").removeClass("error");

		
		var bNotErrorDateFindFrom = true;
		var bNotErrorDateFindTo = true;
		var bNotErrorDatePeriod = true;
		
		
		//проверка на условие, что должен быть выбран хотя бы один документ
		if(!$("#DocumentType\\[0\\]").is(':checked') && !$("#DocumentType\\[1\\]").is(':checked') && !$("#DocumentType\\[2\\]").is(':checked'))
		{
			$('<p class="error" >Выберите типы документов реестра!</p>').insertAfter('table.DocumentType');
			$("#ResolutionProjectFilterForm label.DocumentType").addClass("error");
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
		else
		{
			var sObjectName = $("#ObjectName").val();      				//наименование объекта
			var sObjectAddress = $("#ObjectAddress").val(); 			//адрес объекта
			var sZastroychikName = $("#ZastroychikName").val(); 		//наименование застройщика
			var sObjectAddressRajon = $("#ObjectAddressRajon").val(); 	//район
			var sDateFindFrom = $("#DateFindFrom").val(); 				//дата начала реестра
			var sDateFindTo = $("#DateFindTo").val(); 					//дата окончания реестра
			
			
			//удаляем лишние пробелы внутри строки
			sObjectName = sObjectName.replace(/\s+/g," ");
			sObjectAddress = sObjectAddress.replace(/\s+/g," ");
			sZastroychikName = sZastroychikName.replace(/\s+/g," ");
			sObjectAddressRajon = sObjectAddressRajon.replace(/\s+/g," ");
			sDateFindFrom = sDateFindFrom.replace(/\s+/g," ");
			sDateFindTo = sDateFindTo.replace(/\s+/g," ");
			
			//удаляем лишние пробелы в начале и конце строки
			sObjectName=$.trim(sObjectName);
			sObjectAddress=$.trim(sObjectAddress);
			sZastroychikName=$.trim(sZastroychikName);
			sObjectAddressRajon=$.trim(sObjectAddressRajon);
			sDateFindFrom=$.trim(sDateFindFrom);
			sDateFindTo=$.trim(sDateFindTo);
			
			
			//присваиваем скорректированные значения элементам формы
			$("#ObjectName").val(sObjectName);
			$("#ObjectAddress").val(sObjectAddress);
			$("#ZastroychikName").val(sZastroychikName);
			$("#ObjectAddressRajon").val(sObjectAddressRajon);
			$("#DateFindFrom").val(sDateFindFrom);
			$("#DateFindTo").val(sDateFindTo);

			
			
			
			
			
			
			//проверяем, задан ли хотя бы один фильтр
			if(sObjectName!="" || sObjectAddress!="" || sZastroychikName!=""|| sObjectAddressRajon!="" || sDateFindFrom!="" || sDateFindTo!="")
			{
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

				//проверяем период, если заданы обе даты и в них нет ошибок
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
				$('<p class="error" >Необходимо задать хотя бы один фильтр!</p>').insertAfter('#DocumentType');
				$("#ResolutionProjectFilterForm input[type='text']").addClass("error");
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

		
	});
	

});


		

	


