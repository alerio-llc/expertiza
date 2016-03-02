//alert("123");

//функции для форматирования даты - начало

/*
 * Date Format 1.2.3
 * (c) 2007-2009 Steven Levithan <stevenlevithan.com>
 * MIT license
 *
 * Includes enhancements by Scott Trenda <scott.trenda.net>
 * and Kris Kowal <cixar.com/~kris.kowal/>
 *
 * Accepts a date, a mask, or a date and a mask.
 * Returns a formatted version of the given date.
 * The date defaults to the current date/time.
 * The mask defaults to dateFormat.masks.default.
 */
//функции для форматирования даты - начало
var dateFormat = function () {
	var	token = /d{1,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|[LloSZ]|"[^"]*"|'[^']*'/g,
		timezone = /\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,
		timezoneClip = /[^-+\dA-Z]/g,
		pad = function (val, len) {
			val = String(val);
			len = len || 2;
			while (val.length < len) val = "0" + val;
			return val;
		};

	// Regexes and supporting functions are cached through closure
	return function (date, mask, utc) {
		var dF = dateFormat;

		// You can't provide utc if you skip other args (use the "UTC:" mask prefix)
		if (arguments.length == 1 && Object.prototype.toString.call(date) == "[object String]" && !/\d/.test(date)) {
			mask = date;
			date = undefined;
		}

		// Passing date through Date applies Date.parse, if necessary
		date = date ? new Date(date) : new Date;
		if (isNaN(date)) throw SyntaxError("invalid date");

		mask = String(dF.masks[mask] || mask || dF.masks["default"]);

		// Allow setting the utc argument via the mask
		if (mask.slice(0, 4) == "UTC:") {
			mask = mask.slice(4);
			utc = true;
		}

		var	_ = utc ? "getUTC" : "get",
			d = date[_ + "Date"](),
			D = date[_ + "Day"](),
			m = date[_ + "Month"](),
			y = date[_ + "FullYear"](),
			H = date[_ + "Hours"](),
			M = date[_ + "Minutes"](),
			s = date[_ + "Seconds"](),
			L = date[_ + "Milliseconds"](),
			o = utc ? 0 : date.getTimezoneOffset(),
			flags = {
				d:    d,
				dd:   pad(d),
				ddd:  dF.i18n.dayNames[D],
				dddd: dF.i18n.dayNames[D + 7],
				m:    m + 1,
				mm:   pad(m + 1),
				mmm:  dF.i18n.monthNames[m],
				mmmm: dF.i18n.monthNames[m + 12],
				yy:   String(y).slice(2),
				yyyy: y,
				h:    H % 12 || 12,
				hh:   pad(H % 12 || 12),
				H:    H,
				HH:   pad(H),
				M:    M,
				MM:   pad(M),
				s:    s,
				ss:   pad(s),
				l:    pad(L, 3),
				L:    pad(L > 99 ? Math.round(L / 10) : L),
				t:    H < 12 ? "a"  : "p",
				tt:   H < 12 ? "am" : "pm",
				T:    H < 12 ? "A"  : "P",
				TT:   H < 12 ? "AM" : "PM",
				Z:    utc ? "UTC" : (String(date).match(timezone) || [""]).pop().replace(timezoneClip, ""),
				o:    (o > 0 ? "-" : "+") + pad(Math.floor(Math.abs(o) / 60) * 100 + Math.abs(o) % 60, 4),
				S:    ["th", "st", "nd", "rd"][d % 10 > 3 ? 0 : (d % 100 - d % 10 != 10) * d % 10]
			};

		return mask.replace(token, function ($0) {
			return $0 in flags ? flags[$0] : $0.slice(1, $0.length - 1);
		});
	};
}();

// Some common format strings
dateFormat.masks = {
	"default":      "ddd mmm dd yyyy HH:MM:ss",
	shortDate:      "m/d/yy",
	mediumDate:     "mmm d, yyyy",
	longDate:       "mmmm d, yyyy",
	fullDate:       "dddd, mmmm d, yyyy",
	shortTime:      "h:MM TT",
	mediumTime:     "h:MM:ss TT",
	longTime:       "h:MM:ss TT Z",
	isoDate:        "yyyy-mm-dd",
	isoTime:        "HH:MM:ss",
	isoDateTime:    "yyyy-mm-dd'T'HH:MM:ss",
	isoUtcDateTime: "UTC:yyyy-mm-dd'T'HH:MM:ss'Z'"
};

// Internationalization strings
dateFormat.i18n = {
	dayNames: [
		"Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat",
		"Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
	],
	monthNames: [
		"Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",
		"January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
	]
};

// For convenience...
Date.prototype.format = function (mask, utc) {
	return dateFormat(this, mask, utc);
};

//функции для форматирования даты - конец

//функции для генерации GUID - начало
function s4() {
  return Math.floor((1 + Math.random()) * 0x10000)
             .toString(16)
             .substring(1);
};

function guid() {
	  return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
	         s4() + '-' + s4() + s4() + s4();
	}
//функции для генерации GUID - конец

//Функции для кодирования/раскодирования UTF8 в windows-1251 - начало
function utf8_encode(string) {
    string = string.replace(/rn/g,"n");
    var utftext = "";

    for (var n = 0; n < string.length; n++) {

        var c = string.charCodeAt(n);

        if (c < 128) {
            utftext += String.fromCharCode(c);
        }
        else if((c > 127) && (c < 2048)) {
            utftext += String.fromCharCode((c >> 6) | 192);
            utftext += String.fromCharCode((c & 63) | 128);
        }
        else {
            utftext += String.fromCharCode((c >> 12) | 224);
            utftext += String.fromCharCode(((c >> 6) & 63) | 128);
            utftext += String.fromCharCode((c & 63) | 128);
        }

    }

    return utftext;
}

function utf8_decode(utftext) {
    var string = "";
    var i = 0;
    var c = c1 = c2 = 0;

    while ( i < utftext.length ) {

        c = utftext.charCodeAt(i);

        if (c < 128) {
            string += String.fromCharCode(c);
            i++;
        }
        else if((c > 191) && (c < 224)) {
            c2 = utftext.charCodeAt(i+1);
            string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
            i += 2;
        }
        else {
            c2 = utftext.charCodeAt(i+1);
            c3 = utftext.charCodeAt(i+2);
            string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
            i += 3;
        }

    }

    return string;
}

//Функции для кодирования/раскодирования UTF8 в windows-1251 - конец

//получаем 
//ссылку на объект window айфрейма
var win;
//флаг окончания загрузки карты в айфрейм
var bMapLoad=false;


function CheckMapIframe()
{
//эти команы вынесены в отдельную функцию, т.к. в IE создание функции на лету не срабатывает
	window.bMapLoad = true;
	window.win = document.getElementById("Map").contentWindow;
   // console.log('load the iframe');
}

$(function() 
{
	//убираем предупреждение, что JavaScript отключен
	$("#JavaScriptIsMissing").css("display", "none");
	//показываем форму поиска и карту
	$("#JavaScriptIsPresent").css("display", "block");
	
	
	
	//1. проверяем готовность карты
	$('#Map').load(CheckMapIframe());
	/*$('#Map').load(function(){
		//$(this).show();
		window.bMapLoad = true;
		window.win = document.getElementById("Map").contentWindow;
        //console.log('load the iframe');
    });*/
	
	
	
	$('#ObjectsMapFilter').click(function() {
		//удаляем предыдущие ошибки при клике на любой элемент формы
		$("#ObjectsMapFilter p.error").remove();
		$("#ObjectsMapFilter input.error").removeClass("error");
		
	});
	
	$('#ObjectsMapFilter').submit(function() {
		//убираем предыдущие ошибки
		$("#ObjectsMapFilter p.error").remove();
		$("#ObjectsMapFilter input.error").removeClass("error");
		
		var sObjectName = $("#ObjectName").val();      			//наименование объекта
		var sObjectAddress = $("#ObjectAddress").val(); 		//адрес объекта
		var sObjectOrganizations = $("#ObjectOrganizations").val(); 		//адрес объекта
		
		
		//удаляем лишние пробелы внутри строки
		sObjectName = sObjectName.replace(/\s+/g," ");
		sObjectAddress = sObjectAddress.replace(/\s+/g," ");
		sObjectOrganizations = sObjectOrganizations.replace(/\s+/g," ");
		
		//удаляем лишние пробелы в начале и конце строки
		sObjectName=$.trim(sObjectName);
		sObjectAddress=$.trim(sObjectAddress);
		sObjectOrganizations=$.trim(sObjectOrganizations);
		
		//присваиваем скорректированные значения элементам формы
		$("#ObjectName").val(sObjectName);
		$("#ObjectAddress").val(sObjectAddress);
		$("#ObjectOrganizations").val(sObjectOrganizations);
		

		//если заплнен хотя бы один фильтр, то:
		if(sObjectName!="" || sObjectAddress!="" || sObjectOrganizations!="")
		{
			
			//1. проверяем загрузилась ли карта в айфрейм
			if(window.bMapLoad)
			{	
				//2. Формируем поисковый запрос к карте в JSON
				//2.1. генерируем GUID
				var sGUID=guid();
				//2.2. получаем текущее время 
				var objDateTimeOutput = new Date(); //year, month, date, hours, minutes, seconds);
				//2.3. форматируем время в формат: "2014-12-31 00:00:00"
				var sDateTimeOutput = objDateTimeOutput.format("yyyy-mm-dd HH:MM:ss");
				//console.log(sDateTimeOutput);
				
				//2.4. формируем запрос
				var sRequest = '{' +
						'"RequestGUID" : "' + sGUID + '",' +
						'"DateTimeOutput" : "' + sDateTimeOutput + '",' +
						'"Address" : "' + sObjectAddress + '",' +
						'"Name" : "' + sObjectName + '",' +
						'"Organizations" : "' + sObjectOrganizations + '"' +
						'}';
				
				
				//console.log(sRequest);
				
				//перекодируем запрос в UTF-8, если сервер работает в кодироке cp1251
				//sRequest = utf8_encode(sRequest);
				//console.log(sRequest);
				
				//3. Отправляем поисковый запрос к карте
				window.win.postMessage(
						sRequest,						//тело зароса
						//"http://testmap.alerio.ru" 	// целевой домен (для тестирования)
						//"http://toris.iac.spb.ru" 			// целевой домен
						//"http://gs.iac.spb.ru"			//целевой домен
						//"http://gis.iac.spb.ru/stroinadzor"	//целевой домен
						"http://gis.toris.kis.gov.spb.ru/stroinadzor" //целевой домен
					);
				
				//4. записываем запрос в журналы ajax'om
				$.ajax({
					url: "index.php",
					type: "POST",
					data: "show=createmaplog&request_type=запрос&request_date_time=" + sDateTimeOutput + "&request_message=" + sRequest,
					success: function(){
				    //alert( "Отправили данные!");
					}
				});
				
				
				
				
			}
			else 
			{
				$("#ObjectsMapFilter").prepend('<p class="error" >Карта загружается! Дождитесь, пожалуйста, полной загрузки  карты!</p>');
			}
			
			return false;
		}
		else //если не заполнен ни одного фильтра, то выводим пользлвателю сообщение об этом: 
		{
			$("#ObjectsMapFilter").prepend('<p class="error" >Необходимо задать хотя бы один фильтр!</p>');
			$("#ObjectsMapFilter input[type='text']").addClass("error");
			return false;
		}
	});	
	
	
	//записываем ответ в журналы
	
	
	function listener(event){
		//if ( event.origin !== "http://testmap.alerio.ru" ) //проверка домена с которого пришло сообщение (для тестирования)
		//if ( event.origin !== "http://toris.iac.spb.ru" ) //проверка домена с которого пришло сообщение
		//if ( event.origin !== "http://gs.iac.spb.ru" ) //проверка домена с которого пришло сообщение
		//if ( event.origin !== "http://gis.iac.spb.ru/stroinadzor" ) //проверка домена с которого пришло сообщение
		if ( event.origin !== "http://gis.toris.kis.gov.spb.ru/stroinadzor" ) //проверка домена с которого пришло сообщение
		
			return;

		//document.getElementById("test").innerHTML = event.origin + " прислал: " + event.data;
		
		//1. извлекаем время ответа
		var objReceive = eval("(" + event.data + ")");
		var sDateTimeOutput=objReceive["DateTimeOutput"];
		
		//2. записываем ответ в журналы ajax'om
		$.ajax({
			url: "index.php",
			type: "POST",
			data: "show=createmaplog&request_type=ответ&request_date_time=" + sDateTimeOutput + "&request_message=" + event.data,
			success: function(){
		    //alert( "Получили данные!");
			}
		});
		
	}
	
	

	if (window.addEventListener){
		window.addEventListener("message", listener,false);
	} else {
		window.attachEvent("onmessage", listener);
	}
	
});


