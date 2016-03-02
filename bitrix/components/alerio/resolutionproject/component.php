<?
//устанавливает значение php.ini - ожидание сокета
ini_set("default_socket_timeout",120); 
$sScript_path="./includes/";  
$arResult["error"]="";	//строка ошибок

/*----------------------------------------------------
	 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
	 * @description 	По умолчанию в шаблоне устанавливаем выбор типа документа, как "Разрешение на строительство"
	 * 
	 *  --Начало--10.09.2013 17:47
	 ----------------------------------------------------*/
$arResult["DocumentType"] = array("1");

/*      --Конец--10.09.2013 17:47
	 ----------------------------------------------------*/





//Устанавливаем начальные параметры
//$sWSDLPath="http://webservices.stroyform.com/Service4SaitRazreshenieNaStroitelstvo.asmx?WSDL";	//путь к WSDL Стройформ
$sWSDLPath="http://77.234.204.251:18180/Service4SaitRazreshenieNaStroitelstvo.asmx?WSDL";			//путь к WSDL Службы
$sWebServiceName="GetListResolutionProject";														//имя web-сервиса
$sParamName="filter";																				//Наименование параметра soap-запроса
$arSoapResponse = array();






//устанавливаем наименования параметров сервиса

/*----------------------------------------------------
 * @author		Lashkevich Anastasia <a.lashkevich@gmail.com>
 * @description 	Добавлены новые параметры soap-запроса:
 * 			2) район 
 * 
 *  --Начало--04.06.2014 06:22
 ----------------------------------------------------*/
	/*----------------------------------------------------
	 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
	 * @description 	Добавлены новые параметры soap-запроса:
	 * 					1) тип документа 
	 * 
	 *  --Начало--06.09.2013 16:25
	 ----------------------------------------------------*/
	


	//$aParamsName = array(
	//	"DateOutput"=>"DateOutput",				//Дата формирования запроса
	//	"objectName"=>"objectName",				//Имя объекта строительства
	//	"objectAddress"=>"objectAddress",		//Адрес объекта строительства
	//	"ZastroychikName"=>"ZastroychikName",	//Застройщик
	//	"DateFindFrom"=>"DateFindFrom",			//Дата начала реестра
	//	"DateFindTo"=>"DateFindTo"				//Дата окончания реестра
	//);


//	$aParamsName = array(
//		"DateOutput"=>"DateOutput",				//Дата формирования запроса
//		"objectName"=>"objectName",				//Имя объекта строительства
//		"objectAddress"=>"objectAddress",		//Адрес объекта строительства
//		"ZastroychikName"=>"ZastroychikName",	//Застройщик
//		"DateFindFrom"=>"DateFindFrom",			//Дата начала реестра
//		"DateFindTo"=>"DateFindTo",				//Дата окончания реестра
//		"TypeDocument"=>"TypeDocument"			//Тип запрашиваемых документов строка, где запрашиваемые документы перечисляются номерами через знак "/", где
												//1 обозначает документ "Разрешение на строительство"
												//2 - "Разрешение на снос"
												//3- "Уведомление об отказе"
												//4 - "Разрешение на ввод"	
//	);

$aParamsName = array(
		"DateOutput"=>"DateOutput",				       //Дата формирования запроса
		"objectName"=>"objectName",				       //Имя объекта строительства
		"objectAddress"=>"objectAddress",		       //Адрес объекта строительства
		"ZastroychikName"=>"ZastroychikName",	       //Застройщик
		"DateFindFrom"=>"DateFindFrom",			       //Дата начала реестра
		"DateFindTo"=>"DateFindTo",				       //Дата окончания реестра
		"TypeDocument"=>"TypeDocument",			        //Тип запрашиваемых документов строка, где запрашиваемые документы перечисляются номерами через знак "/", где
												        //1 обозначает документ "Разрешение на строительство"
												        //2 - "Разрешение на снос"
												        //3- "Уведомление об отказе"
												        //4 - "Разрешение на ввод"	
		"ObjectAddressRajon"=>"ObjectAddressRajon"		//Район								
	);

	/*  --Конец--06.09.2013 16:25
	----------------------------------------------------*/
/*  --Конец--04.06.2014 06:22
----------------------------------------------------*/	

	


//Устанавливаем начальные параметры фильтров реестра

/*
//$sDateNow=date("Y-m-d"); 	//сегодняшняя дата
 * исправление 04.07.2013
 * $sDateNow, т.к. это не текущая дата, а дата выдачи разрешения
 * НАЧАЛО
 */
$sDateNow="1900-01-01"; 	//дата выдачи разрешения
/*КОНЕЦ*/

/*----------------------------------------------------
	 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
	 * @description 	начальные значения не нужны, т.к. soap-запрос не выполняется пока не получены данные из формы
	 * 
	 *  --Начало--23.09.2013 15:49
	 ----------------------------------------------------*/

//$sObjectName = "";							//Наименование объекта
//$sObjectAddress = "";						//Адрес объекта
//$sZastroychikName = "";						//Застройщик

/*  --Конец--23.09.2013 15:49
	 ----------------------------------------------------*/

/*----------------------------------------------------
	 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
	 * @description 	дата начала реестра приходит из формы
	 * 
	 *  --Начало--23.09.2013 15:43
	 ----------------------------------------------------*/
//$sDateFindFrom =  date("Y-m-d",mktime(0, 0, 0,date("m"),1,date("Y")));								//Дата начала реестра — начало текущего месяца
/*  --Конец--23.09.2013 14:38
	 ----------------------------------------------------*/

/*----------------------------------------------------
	 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
	 * @description 	по умолчанию дата начала реестра не задана
	 * 
	 *  --Начало--23.09.2013 14:38
	 ----------------------------------------------------*/
//$arResult["filter"]["DateFindFrom"] = date("d.m.Y",mktime(0, 0, 0,date("m"),1,date("Y")));			//Дата начала реестра — начало текущего месяца

/*  --Конец--23.09.2013 14:38
----------------------------------------------------*/

/*----------------------------------------------------
	 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
	 * @description 	дата окончания реестра приходит из формы
	 * 
	 *  --Начало--23.09.2013 15:43
	 ----------------------------------------------------*/
//$sDateFindTo = date("Y-m-d",mktime(0, 0, 0,date("m"),date("t"),date("Y")));							//Дата окончания реестра — конец текущего месяца
/*  --Конец--23.09.2013 15:43
----------------------------------------------------*/


/*----------------------------------------------------
	 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
	 * @description 	по умолчанию дата окончания реестра не задана
	 * 
	 *  --Начало--23.09.2013 14:38
	 ----------------------------------------------------*/
//$arResult["filter"]["DateFindTo"] = date("d.m.Y",mktime(0, 0, 0,date("m"),date("t"),date("Y")));	//Дата окончания реестра — конец текущего месяца

/*  --Конец--23.09.2013 14:38
	 ----------------------------------------------------*/


/*----------------------------------------------------
	 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
	 * @description 	параметр Тип документа приходит из формы, при пустой строке выбираются документы типа 4 - "Разрешение на ввод объекта в эксплуатацию"
	 * 
	 *  --Начало--23.09.2013 17:46
	 ----------------------------------------------------*/


	/*----------------------------------------------------
		 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
		 * @description 	устанавливаем начальное значение параметра Тип документа, при пустой строке выбираются документы типа 4 - "Разрешение на ввод объекта в эксплуатацию"
		 * 
		 *  --Начало--10.09.2013 17:47
		 ----------------------------------------------------*/
//	$sDocumentType="";
	/*  --Конец--10.09.2013 17:47
		 ----------------------------------------------------*/
/*  --Конец--23.09.2013 17:46
	 ----------------------------------------------------*/
	
	
//Пришли из формы данные для вывода реестра
if($_REQUEST["action"]=="filter")
{

	/*----------------------------------------------------
	 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
	 * @description 	Чтобы не пропадали введенные значения параметров фильтров при ошибках сразу помезаем их в $arResult
	 * 
	 *  --Начало--23.09.2013 16:35
	 ----------------------------------------------------*/

	//Помещаем параметры фильтра реестра в $arResult
	$arResult["filter"]["ObjectName"]=stripslashes($_REQUEST["ObjectName"]);                       //фильтр по наименованию объекта
	$arResult["filter"]["ObjectAddress"]=stripslashes($_REQUEST["ObjectAddress"]);                 //фильтр по адресу объекта
	$arResult["filter"]["ZastroychikName"]=stripslashes($_REQUEST["ZastroychikName"]);             //фильтр по застройщику
	$arResult["filter"]["ObjectAddressRajon"]=stripslashes($_REQUEST["ObjectAddressRajon"]);       //фильтр по району
	$arResult["filter"]["DateFindFrom"]=stripslashes($_REQUEST["DateFindFrom"]);                   //фильтр по дате начала реестра
	$arResult["filter"]["DateFindTo"]=stripslashes($_REQUEST["DateFindTo"]);                       //фильтр по дате окончания реестра
	
	//убираем лишние пробелы внутри строки
	$arResult["filter"]["ObjectName"]=preg_replace('/\s+/',' ',$arResult["filter"]["ObjectName"]);
	$arResult["filter"]["ObjectAddress"]=preg_replace('/\s+/',' ',$arResult["filter"]["ObjectAddress"]);
	$arResult["filter"]["ZastroychikName"]=preg_replace('/\s+/',' ',$arResult["filter"]["ZastroychikName"]);
	$arResult["filter"]["ObjectAddressRajon"]=preg_replace('/\s+/',' ',$arResult["filter"]["ObjectAddressRajon"]);
	$arResult["filter"]["DateFindFrom"]=preg_replace('/\s+/',' ',$arResult["filter"]["DateFindFrom"]);
	$arResult["filter"]["DateFindTo"]=preg_replace('/\s+/',' ',$arResult["filter"]["DateFindTo"]);
	
	//убираем лишние пробелы в начале и конце строки
	$arResult["filter"]["ObjectName"] = trim($arResult["filter"]["ObjectName"]);
	$arResult["filter"]["ObjectAddress"] = trim($arResult["filter"]["ObjectAddress"]);
	$arResult["filter"]["ZastroychikName"] = trim($arResult["filter"]["ZastroychikName"]);
	$arResult["filter"]["ObjectAddressRajon"] = trim($arResult["filter"]["ObjectAddressRajon"]);
	$arResult["filter"]["DateFindFrom"] = trim($arResult["filter"]["DateFindFrom"]);
	$arResult["filter"]["DateFindTo"] = trim($arResult["filter"]["DateFindTo"]);
	
	
	/*  --Конец--23.09.2013 16:35
			 ----------------------------------------------------*/	

	/*----------------------------------------------------
	 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
	 * @description 	В $arResult["DocumentType"] помещаем пуcтой массив - пользователь не выбрал ни одного документа в реестр
	 * 
	 *  --Начало--10.09.2013 17:47
	 ----------------------------------------------------*/

	//Проверяем, заданы ли типы документов или выбор не был сделан
	if(isset($_REQUEST["DocumentType"]))
	{
		
	
		//Помещаем выбор типов документов реестра в $arResult	
		$arResult["DocumentType"]=$_REQUEST["DocumentType"];
		
		
		//оставляем только уникальные значения а массиве выбора типов документов
		$arResult["DocumentType"]=array_unique($arResult["DocumentType"]);
		
		//Формиуем параметр  soap-запроса для
		//выбора типов документа 
		//в виде строки, 
		//где через знак «/» пишутся 
		//номера выбранных документов:
		//1 - «Разрешение на строительство»
		//2 - «Разрешение на снос»
		//3 - «Уведомление об отказе»
		//4 - «Разрешение на ввод»
		$sDocumentType=implode("/",$arResult["DocumentType"]);
		

		
/*----------------------------------------------------
 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
 * @description 	переносим проверку фильтров в ветку, когда проверка на выбор документов реестра пройдена успешно
 * 
 *  --Начало--23.09.2013 14:22
 ----------------------------------------------------*/

		


		/*----------------------------------------------------
		 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
		 * @description 	добавили проверку на заполненность фильтров
		 * 
		 *  --Начало--23.09.2013 14:22
		 ----------------------------------------------------*/
		
		//проверяем задан ли хотя бы 1 фильтр
		if($arResult["filter"]["ObjectName"]!="" || $arResult["filter"]["ObjectAddress"]!="" || $arResult["filter"]["ZastroychikName"]!="" || $arResult["filter"]["ObjectAddressRajon"]!="" || $arResult["filter"]["DateFindFrom"]!="" || $arResult["filter"]["DateFindTo"]!="")
		{
		/*  --Конец--23.09.2013 14:22
			 ----------------------------------------------------*/	
			
			/*----------------------------------------------------
			 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
			 * @description 	переносим размещение параметров фильтра в $arResult в начало обработки формы
			 * 
			 *  --Начало--23.09.2013 16:31
			 ----------------------------------------------------*/
		/*
			//Помещаем параметры фильтра реестра в $arResult
			$arResult["filter"]["ObjectName"]=stripslashes($_REQUEST["ObjectName"]);				//фильтр по наименованию объекта
			$arResult["filter"]["ObjectAddress"]=stripslashes($_REQUEST["ObjectAddress"]);			//фильтр по адресу объекта
			$arResult["filter"]["ZastroychikName"]=stripslashes($_REQUEST["ZastroychikName"]);		//фильтр по застройщику
			$arResult["filter"]["DateFindFrom"]=stripslashes($_REQUEST["DateFindFrom"]);			//фильтр по дате начала реестра
			$arResult["filter"]["DateFindTo"]=stripslashes($_REQUEST["DateFindTo"]);				//фильтр по дате окончания реестра
		*/	
			/*  --Конец--23.09.2013 16:31
			 ----------------------------------------------------*/	
			
	
		
			//выполняем проверки данных для фильтра:
			//1) проверяем формат даты начала реестра
			$sDatePattern = "/^(0[1-9]|[12]\d|3[01])\.(0[1-9]|1[0-2])\.\d\d\d\d$/";
			
			/*----------------------------------------------------
		 	* @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
		 	* @description 		проверяем коррекность даты, если она заполнена
		 	* 
		 	*  --Начало--23.09.2013 15:03
		 	----------------------------------------------------*/
			//if(!preg_match($sDatePattern,$arResult["filter"]["DateFindFrom"])) $arResult["error"].="Для применения фильтра, проверьте, пожалуйста, дату начала реестра!<br>";
			if(trim($arResult["filter"]["DateFindFrom"])!="" && !preg_match($sDatePattern,$arResult["filter"]["DateFindFrom"])) $arResult["error"].="Для применения фильтра, проверьте, пожалуйста, дату начала реестра!<br>";
			/*  --Конец--23.09.2013 15:03
			 ----------------------------------------------------*/
			
			
			//2) проверяем формат даты окончания реестра
			/*----------------------------------------------------
		 	* @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
		 	* @description 		проверяем коррекность даты, если она заполнена
		 	* 
		 	*  --Начало--23.09.2013 15:03
		 	----------------------------------------------------*/
			//if(!preg_match($sDatePattern,$arResult["filter"]["DateFindTo"])) $arResult["error"].="Для применения фильтра, проверьте, пожалуйста, дату окончания реестра!<br>";
			if(trim($arResult["filter"]["DateFindTo"])!="" && !preg_match($sDatePattern,$arResult["filter"]["DateFindTo"])) $arResult["error"].="Для применения фильтра, проверьте, пожалуйста, дату окончания реестра!<br>";
			/*  --Конец--23.09.2013 15:03
			 ----------------------------------------------------*/
			
			
			//3)проверяем период дат
			/*----------------------------------------------------
		 	* @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
		 	* @description 		добавили в дополнение условие, что формат даты задан верно
		 	* 
		 	*  --Начало--23.09.2013 15:03
		 	----------------------------------------------------*/
			//if(strtotime($arResult["filter"]["DateFindFrom"])>strtotime($arResult["filter"]["DateFindTo"])) $arResult["error"].="Для применения фильтра, проверьте, пожалуйста, период реестра!<br>"; 
			if(preg_match($sDatePattern,$arResult["filter"]["DateFindFrom"]) && preg_match($sDatePattern,$arResult["filter"]["DateFindTo"]) && strtotime($arResult["filter"]["DateFindFrom"])>strtotime($arResult["filter"]["DateFindTo"])) $arResult["error"].="Для применения фильтра, проверьте, пожалуйста, период реестра!<br>";
			/*  --Конец--23.09.2013 15:03
			 ----------------------------------------------------*/
			
			
			//если нет ошибок в фильтрах, то значения фильтров присваиваем параметрам для отправки soap-запроса
			if($arResult["error"]=="")
			{
				
			
				/*----------------------------------------------------
 				* @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
 				* @description 		устанавливаем даты как 1900-01-01, дата не задана
 				* 
 				*  --Начало--23.09.2013 15:53
 				----------------------------------------------------*/
			
			
			
				/*			
				$sObjectName = iconv('windows-1251','UTF-8',$arResult["filter"]["ObjectName"]);		
				$sObjectAddress = iconv('windows-1251','UTF-8',$arResult["filter"]["ObjectAddress"]);	
				$sZastroychikName =  iconv('windows-1251','UTF-8',$arResult["filter"]["ZastroychikName"]);			
				
				$arDateFindFrom = explode(".",$arResult["filter"]["DateFindFrom"]);
				$sDateFindFrom = date("Y-m-d",mktime(0, 0, 0,$arDateFindFrom[1],$arDateFindFrom[0],$arDateFindFrom[2]));
				
				$arDateFindTo = explode(".",$arResult["filter"]["DateFindTo"]);
				$sDateFindTo = date("Y-m-d",mktime(0, 0, 0,$arDateFindTo[1],$arDateFindTo[0],$arDateFindTo[2]));	
				
				*/
				
/*----------------------------------------------------
 * @author           Lashkevich Anastasia <a.lashkevich@gmail.com>
 * @description      Убираем смену кодировки
 * 
 *  --Начало--25.11.2014 09:34
 * ----------------------------------------------------*/   
//				$sObjectName = iconv('windows-1251','UTF-8',$arResult["filter"]["ObjectName"]);		
//				$sObjectAddress = iconv('windows-1251','UTF-8',$arResult["filter"]["ObjectAddress"]);	
//				$sObjectAddressRajon =  iconv('windows-1251','UTF-8',$arResult["filter"]["ObjectAddressRajon"]);
//				$sZastroychikName =  iconv('windows-1251','UTF-8',$arResult["filter"]["ZastroychikName"]); 

				$sObjectName = $arResult["filter"]["ObjectName"];     
                $sObjectAddress = $arResult["filter"]["ObjectAddress"];   
                $sObjectAddressRajon =  $arResult["filter"]["ObjectAddressRajon"];
                $sZastroychikName =  $arResult["filter"]["ZastroychikName"];
				
/*  --Начало--25.11.2014 09:34
 * ----------------------------------------------------*/  				
				if($arResult["filter"]["DateFindFrom"]!="")
				{
					$arDateFindFrom = explode(".",$arResult["filter"]["DateFindFrom"]);
					$sDateFindFrom = date("Y-m-d",mktime(0, 0, 0,$arDateFindFrom[1],$arDateFindFrom[0],$arDateFindFrom[2]));
				}
				else
				{
					$sDateFindFrom = "1900-01-01";
				}
				
				if($arResult["filter"]["DateFindTo"]!="")
				{
					$arDateFindTo = explode(".",$arResult["filter"]["DateFindTo"]);
					$sDateFindTo = date("Y-m-d",mktime(0, 0, 0,$arDateFindTo[1],$arDateFindTo[0],$arDateFindTo[2]));	
				}
				else
				{
					$sDateFindTo = "1900-01-01";
				}
				
				/*  --Конец--23.09.2013 15:52
	 			----------------------------------------------------*/
				
			}
		
		
			//чтобы снова вывести в форме заменяем кавычки на их html-эквиваленты
			$arResult["filter"]["ObjectName"]=htmlspecialchars($arResult["filter"]["ObjectName"]);                   //фильтр по наименованию объекта
			$arResult["filter"]["ObjectAddress"]=htmlspecialchars($arResult["filter"]["ObjectAddress"]);             //фильтр по адресу объекта
			$arResult["filter"]["ZastroychikName"]=htmlspecialchars($arResult["filter"]["ZastroychikName"]);         //фильтр по застройщику
			$arResult["filter"]["ObjectAddressRajon"]=htmlspecialchars($arResult["filter"]["ObjectAddressRajon"]);   //фильтр по району
			$arResult["filter"]["DateFindFrom"]=htmlspecialchars($arResult["filter"]["DateFindFrom"]);               //фильтр по дате начала реестра
			$arResult["filter"]["DateFindTo"]=htmlspecialchars($arResult["filter"]["DateFindTo"]);                   //фильтр по дате окончания реестра
		
		}
		else
		{
			$arResult["error"]="<br>Необходимо задать хотя бы один фильтр!";
		}
		
		
		
/*  --Конец--23.09.2013 14:22
	 ----------------------------------------------------*/
		
		
		
		
	}
	else 
	{
		$arResult["error"]="<br>Выберите типы документов реестра!";
		$arResult["DocumentType"] = array();		//пользователь не выбрал ни одного документа		
	}
	/*  --Конец--10.09.2013 17:47
	 ----------------------------------------------------*/
	
/*----------------------------------------------------
 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
 * @description 	переносим проверку фильтров в ветку, когда проверка на выбор документов реестра пройдена успешно
 * 
 *  --Начало--23.09.2013 14:22
 ----------------------------------------------------*/


//	//Помещаем параметры фильтра реестра в $arResult
//	$arResult["filter"]["ObjectName"]=stripslashes($_REQUEST["ObjectName"]);				//фильтр по наименованию объекта
//	$arResult["filter"]["ObjectAddress"]=stripslashes($_REQUEST["ObjectAddress"]);		//фильтр по адресу объекта
//	$arResult["filter"]["ZastroychikName"]=stripslashes($_REQUEST["ZastroychikName"]);	//фильтр по застройщику
//	$arResult["filter"]["DateFindFrom"]=stripslashes($_REQUEST["DateFindFrom"]);			//фильтр по дате начала реестра
//	$arResult["filter"]["DateFindTo"]=stripslashes($_REQUEST["DateFindTo"]);				//фильтр по дате окончания реестра


	
//	//выполняем проверки данных для фильтра:
//	//1) проверяем формат даты начала реестра
//	$sDatePattern = "/^(0[1-9]|[12]\d|3[01])\.(0[1-9]|1[0-2])\.\d\d\d\d$/";
//	if(!preg_match($sDatePattern,$arResult["filter"]["DateFindFrom"])) $arResult["error"].="Для применения фильтра, проверьте, пожалуйста, дату начала реестра!<br>";
//	//2) проверяем формат даты окончания реестра
//	if(!preg_match($sDatePattern,$arResult["filter"]["DateFindTo"])) $arResult["error"].="Для применения фильтра, проверьте, пожалуйста, дату окончания реестра!<br>";
	
//	//проверяем период дат
//	if(strtotime($arResult["filter"]["DateFindFrom"])>strtotime($arResult["filter"]["DateFindTo"])) $arResult["error"].="Для применения фильтра, проверьте, пожалуйста, период реестра!<br>"; 
	
//	//если нет ошибок в фильтрах, то значения фильтров присваиваем параметрам для отправки soap-запроса
//	if($arResult["error"]=="")
//	{
//		$sObjectName = iconv('windows-1251','UTF-8',$arResult["filter"]["ObjectName"]);		
//		$sObjectAddress = iconv('windows-1251','UTF-8',$arResult["filter"]["ObjectAddress"]);	
//		$sZastroychikName =  iconv('windows-1251','UTF-8',$arResult["filter"]["ZastroychikName"]);			
//		$arDateFindFrom = explode(".",$arResult["filter"]["DateFindFrom"]);
//		$sDateFindFrom = date("Y-m-d",mktime(0, 0, 0,$arDateFindFrom[1],$arDateFindFrom[0],$arDateFindFrom[2]));
//		$arDateFindTo = explode(".",$arResult["filter"]["DateFindTo"]);
//		$sDateFindTo = date("Y-m-d",mktime(0, 0, 0,$arDateFindTo[1],$arDateFindTo[0],$arDateFindTo[2]));	
//	}
	
	
//	//чтобы снова вывести в форме заменяем кавычки на их html-эквиваленты
//	$arResult["filter"]["ObjectName"]=htmlspecialchars($arResult["filter"]["ObjectName"]);				//фильтр по наименованию объекта
//	$arResult["filter"]["ObjectAddress"]=htmlspecialchars($arResult["filter"]["ObjectAddress"]);		//фильтр по адресу объекта
//	$arResult["filter"]["ZastroychikName"]=htmlspecialchars($arResult["filter"]["ZastroychikName"]);	//фильтр по застройщику
//	$arResult["filter"]["DateFindFrom"]=htmlspecialchars($arResult["filter"]["DateFindFrom"]);			//фильтр по дате начала реестра
//	$arResult["filter"]["DateFindTo"]=htmlspecialchars($arResult["filter"]["DateFindTo"]);				//фильтр по дате окончания реестра
	
	
/*  --Конец--23.09.2013 14:24
	 ----------------------------------------------------*/



	//Готовим параметры для soap-запроса
	
	
/*----------------------------------------------------
	 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
	 * @description 	добавляем в параметры soap-запроса тип документа
	 * 
	 *  --Начало--10.09.2013 17:47
	 ----------------------------------------------------*/
//$arWebServiceParams = array(
//	$sParamName => array(
//		$aParamsName["DateOutput"]=>$sDateNow,
//		$aParamsName["objectName"]=>$sObjectName,
//		$aParamsName["objectAddress"]=>$sObjectAddress,
//		$aParamsName["ZastroychikName"]=>$sZastroychikName,
//		$aParamsName["DateFindFrom"]=>$sDateFindFrom,
//		$aParamsName["DateFindTo"]=>$sDateFindTo
//		)
//	);
	
/*  --Конец--10.09.2013 17:47
	 ----------------------------------------------------*/
	
	$arWebServiceParams = array(
	$sParamName => array(
		$aParamsName["DateOutput"]=>$sDateNow,
		$aParamsName["objectName"]=>$sObjectName,
		$aParamsName["objectAddress"]=>$sObjectAddress,
		$aParamsName["ZastroychikName"]=>$sZastroychikName,
		$aParamsName["DateFindFrom"]=>$sDateFindFrom,
		$aParamsName["DateFindTo"]=>$sDateFindTo,
		$aParamsName["TypeDocument"]=>$sDocumentType,
		$aParamsName["ObjectAddressRajon"]=>$sObjectAddressRajon
		)
	);
	

		
		
		
		/*----------------------------------------------------
			 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
			 * @description 	добавили условие: если нет ошибок, тогда выполняем soap-запрос
			 * 
			 *  --Начало--23.09.2013 15:17
			 ----------------------------------------------------*/
		if($arResult["error"]=="")
		{
		/*  --Конец--10.09.2013 17:47
		 ----------------------------------------------------*/
			
			//Создание SOAP-клиента по WSDL-документу
			$client = new SoapClient($sWSDLPath,array(
			    "trace"      => 1,
			    "exceptions" => 0));
			//Отправляем soap-запрос
			$objSoapResponse  = $client->$sWebServiceName($arWebServiceParams);
			
			//Если произошла ошибка при вызове SOAP
			if(is_soap_fault($objSoapResponse)) $arResult["error"]="Извините, сервис временно недоступен! Пожалуйста, воспользуйтесь сервисом позднее.";
			
			
			//Иначе формируем результат
			else
			{
			
				$arSoapResponse = (array)$objSoapResponse;
				
				/*
				print "<pre>\n";
				print "Запрос :\n".htmlspecialchars($client->__getLastRequest()) ."\n";
				print "Ответ:\n".htmlspecialchars($client->__getLastResponse())."\n";
				print "</pre>";
				*/
				
				
				//Помещаем данные sosp-ответа в $arResult
				$i=0;
				
				
				
				if(is_array($arSoapResponse["return"]) && count($arSoapResponse["return"]>0))
				{
				//получаем или масиво объектов в качестве результата
					foreach($arSoapResponse["return"] as $objReestrItem)
					{
/*----------------------------------------------------
 * @author          Lashkevich Anastasia <a.lashkevich@gmail.com>
 * @description     Убираем преобразование кодировки
 * 
 *  --Начало--25.11.2014 08:50
 ----------------------------------------------------*/     						
//						$arResult["ResolutionProjectItems"][$i]["BuilderName"]=iconv('UTF-8','windows-1251',$objReestrItem->BuilderName);
//						$arResult["ResolutionProjectItems"][$i]["ObjectAddress"]=iconv('UTF-8','windows-1251',$objReestrItem->ObjectAddress);
//						$arResult["ResolutionProjectItems"][$i]["ObjectName"]=iconv('UTF-8','windows-1251',$objReestrItem->ObjectName);
//						$arResult["ResolutionProjectItems"][$i]["PermitID"]=iconv('UTF-8','windows-1251',$objReestrItem->PermitID);
//						$objDateCreate = new DateTime($objReestrItem->DateCreate);
//						$arResult["ResolutionProjectItems"][$i]["DateCreate"]=$sDateCreate=$objDateCreate->format('d.m.Y');
//			/*----------------------------------------------------
//			 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
//			 * @description 	добавляем извлечение из ответа на soap-запрос параметры:
//			 * 					1) "Имя документа"
//			 * 					2) "Поднадзорность" 
//			 * 
//			 *  --Начало--13.09.2013 12:05
//			 ----------------------------------------------------*/			
//						$arResult["ResolutionProjectItems"][$i]["NameDocument"]=iconv('UTF-8','windows-1251',$objReestrItem->NameDocument);
//						$arResult["ResolutionProjectItems"][$i]["ObjectPodnadzoren"]=iconv('UTF-8','windows-1251',$objReestrItem->ObjectPodnadzoren);
//						
//			/*  --Конец--13.09.2013 12:05
//			 ----------------------------------------------------*/	

//			/*----------------------------------------------------
//			 * @author		Lashkevich Anastasia <a.lashkevich@gmail.com>
//			 * @description 	добавляем извлечение из ответа на soap-запрос параметры:
//			 * 			1) "Район"
//			 * 
//			 *  --Начало--04.06.2014 06:22
//			 ----------------------------------------------------*/	
//						$arResult["ResolutionProjectItems"][$i]["ObjectAddressRajon"]=iconv('UTF-8','windows-1251',$objReestrItem->ObjectAddressRajon);
		

//			/*  --Конец--04.06.2014 06:22
//			 ----------------------------------------------------*/	

	
											
						$arResult["ResolutionProjectItems"][$i]["BuilderName"]=$objReestrItem->BuilderName;
                        $arResult["ResolutionProjectItems"][$i]["ObjectAddress"]=$objReestrItem->ObjectAddress;
                        $arResult["ResolutionProjectItems"][$i]["ObjectName"]=$objReestrItem->ObjectName;
                        $arResult["ResolutionProjectItems"][$i]["PermitID"]=$objReestrItem->PermitID;
                        $objDateCreate = new DateTime($objReestrItem->DateCreate);
                        $arResult["ResolutionProjectItems"][$i]["DateCreate"]=$sDateCreate=$objDateCreate->format('d.m.Y');        
                        $arResult["ResolutionProjectItems"][$i]["NameDocument"]=$objReestrItem->NameDocument;
                        $arResult["ResolutionProjectItems"][$i]["ObjectPodnadzoren"]=$objReestrItem->ObjectPodnadzoren;
                        $arResult["ResolutionProjectItems"][$i]["ObjectAddressRajon"]=$objReestrItem->ObjectAddressRajon;
        					
/*  --Конец--25.11.2014 08:50
 ----------------------------------------------------*/ 
						$i++;
					}
				}
				else if(is_object($arSoapResponse["return"]))
				{
				//или объект
/*----------------------------------------------------
 * @author          Lashkevich Anastasia <a.lashkevich@gmail.com>
 * @description     Убираем преобразование кодировки
 * 
 *  --Начало--24.12.2014 16:47
 ----------------------------------------------------*/				
//   /*----------------------------------------------------
//    * @author          Lashkevich Anastasia <a.lashkevich@gmail.com>
//     * @description     Убираем преобразование кодировки
//     * 
//     *  --Начало--25.11.2014 08:50
//     ----------------------------------------------------*/    
//    //					$arResult["ResolutionProjectItems"][$i]["BuilderName"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->BuilderName);
//    //					$arResult["ResolutionProjectItems"][$i]["ObjectAddress"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->ObjectAddress);
//    //					$arResult["ResolutionProjectItems"][$i]["ObjectName"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->ObjectName);
//    //					$arResult["ResolutionProjectItems"][$i]["PermitID"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->PermitID);
//    //					$objDateCreate = new DateTime($arSoapResponse["return"]->DateCreate);
//    //					$arResult["ResolutionProjectItems"][$i]["DateCreate"]=$sDateCreate=$objDateCreate->format('d.m.Y');
//    //			/*----------------------------------------------------
//    //				 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
//    //				 * @description 	добавляем извлечение из ответа на soap-запрос параметры:
//    //				 * 					1) "Имя документа"
//    //				 * 					2) "Поднадзорность" 
//    //				 * 
//    //				 *  --Начало--13.09.2013 12:05
//    //				 ----------------------------------------------------*/				
//    //					$arResult["ResolutionProjectItems"][$i]["NameDocument"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->NameDocument);
//    //					$arResult["ResolutionProjectItems"][$i]["ObjectPodnadzoren"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->ObjectPodnadzoren);
//    //			/*  --Конец--13.09.2013 12:05
//    //				 ----------------------------------------------------*/	
//    //			/*----------------------------------------------------
//    //			 * @author		Lashkevich Anastasia <a.lashkevich@gmail.com>
//    //			 * @description 	добавляем извлечение из ответа на soap-запрос параметры:
//    //			 * 			1) "Район"
//    //			 * 
//    //			 *  --Начало--04.06.2014 06:22
//    //			 ----------------------------------------------------*/		
//    //					$arResult["ResolutionProjectItems"][$i]["ObjectAddressRajon"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->ObjectAddressRajon);
//    //			/*  --Конец--04.06.2014 06:22
//    //				 ----------------------------------------------------*/	
    
//    /*  --Конец--25.11.2014 08:50
//     ----------------------------------------------------*/ 	
//     					  $arResult["ResolutionProjectItems"][$i]["BuilderName"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->BuilderName);
//                        $arResult["ResolutionProjectItems"][$i]["ObjectAddress"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->ObjectAddress);
//                        $arResult["ResolutionProjectItems"][$i]["ObjectName"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->ObjectName);
//                        $arResult["ResolutionProjectItems"][$i]["PermitID"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->PermitID);
//                        $objDateCreate = new DateTime($arSoapResponse["return"]->DateCreate);
//                        $arResult["ResolutionProjectItems"][$i]["DateCreate"]=$sDateCreate=$objDateCreate->format('d.m.Y');
//                        $arResult["ResolutionProjectItems"][$i]["NameDocument"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->NameDocument);
//                        $arResult["ResolutionProjectItems"][$i]["ObjectPodnadzoren"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->ObjectPodnadzoren);
//                        $arResult["ResolutionProjectItems"][$i]["ObjectAddressRajon"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->ObjectAddressRajon);
                    
                    $arResult["ResolutionProjectItems"][$i]["BuilderName"]=$arSoapResponse["return"]->BuilderName;
                    $arResult["ResolutionProjectItems"][$i]["ObjectAddress"]=$arSoapResponse["return"]->ObjectAddress;
                    $arResult["ResolutionProjectItems"][$i]["ObjectName"]=$arSoapResponse["return"]->ObjectName;
                    $arResult["ResolutionProjectItems"][$i]["PermitID"]=$arSoapResponse["return"]->PermitID;
                    $objDateCreate = new DateTime($arSoapResponse["return"]->DateCreate);
                    $arResult["ResolutionProjectItems"][$i]["DateCreate"]=$sDateCreate=$objDateCreate->format('d.m.Y');
                    $arResult["ResolutionProjectItems"][$i]["NameDocument"]=$arSoapResponse["return"]->NameDocument;
                    $arResult["ResolutionProjectItems"][$i]["ObjectPodnadzoren"]=$arSoapResponse["return"]->ObjectPodnadzoren;
                    $arResult["ResolutionProjectItems"][$i]["ObjectAddressRajon"]=$arSoapResponse["return"]->ObjectAddressRajon;
                    
/*  --Конец--25.11.2014 08:50
 ----------------------------------------------------*/
				}
			}
		}
}


//Подключаем шаблон
$this->IncludeComponentTemplate(); 
?>
