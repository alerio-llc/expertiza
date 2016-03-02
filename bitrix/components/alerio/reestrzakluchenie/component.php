<?

//устанавливает значение php.ini - ожидание сокета
ini_set("default_socket_timeout",120); 
$sScript_path="./templates/template_for_reestr/";  
$arResult["error"]="";	//строка ошибок

//По умолчанию в шаблоне устанавливаем выбор типа документа, как "Разрешение на строительство":
$arResult["DocumentType"] = array("1");



//Устанавливаем начальные параметры
//$sWSDLPath="http://webservices.stroyform.com/Service4SaitReestrZaklucheniExp.asmx?WSDL";			//путь к WSDL Стройформ
$sWSDLPath="http://77.234.204.251:18180/Service4SaitReestrZaklucheniExp.asmx?WSDL";			//путь к WSDL Стройформ
//$sWSDLPath="http://77.234.204.251:18180/Service4SaitRazreshenieNaStroitelstvo.asmx?WSDL";			//путь к WSDL Управления гос строй экспертизы
$sWebServiceName="GetListReestrZakluchenieExp";														//имя web-сервиса
$sParamName="filter";																				//Наименование параметра soap-запроса
$arSoapResponse = array();

//устанавливаем наименования параметров сервиса
$aParamsName = array(
	"DateOutput"=>"DateOutput",				//Дата формирования запроса
	"objectName"=>"objectName",				//Имя объекта строительства
	"objectAddress"=>"objectAddress",		//Адрес объекта строительства
	"ZastroychikName"=>"ZastroychikName",	//Застройщик
	"DateFindFrom"=>"DateFindFrom",			//Дата начала реестра
	"DateFindTo"=>"DateFindTo"				//Дата окончания реестра
);




//Устанавливаем начальные параметры фильтров реестра
$sDateNow="1900-01-01"; 	//дата выдачи разрешения

	
//Пришли из формы данные для вывода реестра
if($_REQUEST["action"]=="filter")
{


	//Помещаем параметры фильтра реестра в $arResult
	$arResult["filter"]["ObjectName"]=stripslashes($_REQUEST["ObjectName"]);				//фильтр по наименованию объекта
	$arResult["filter"]["ObjectAddress"]=stripslashes($_REQUEST["ObjectAddress"]);			//фильтр по адресу объекта
	$arResult["filter"]["ZastroychikName"]=stripslashes($_REQUEST["ZastroychikName"]);		//фильтр по застройщику
	$arResult["filter"]["DateFindFrom"]=stripslashes($_REQUEST["DateFindFrom"]);			//фильтр по дате начала реестра
	$arResult["filter"]["DateFindTo"]=stripslashes($_REQUEST["DateFindTo"]);				//фильтр по дате окончания реестра
	
	//убираем лишние пробелы внутри строки
	$arResult["filter"]["ObjectName"]=preg_replace('/\s+/',' ',$arResult["filter"]["ObjectName"]);
	$arResult["filter"]["ObjectAddress"]=preg_replace('/\s+/',' ',$arResult["filter"]["ObjectAddress"]);
	$arResult["filter"]["ZastroychikName"]=preg_replace('/\s+/',' ',$arResult["filter"]["ZastroychikName"]);
	$arResult["filter"]["DateFindFrom"]=preg_replace('/\s+/',' ',$arResult["filter"]["DateFindFrom"]);
	$arResult["filter"]["DateFindTo"]=preg_replace('/\s+/',' ',$arResult["filter"]["DateFindTo"]);
	
	//убираем лишние пробелы в начале и конце строки
	$arResult["filter"]["ObjectName"] = trim($arResult["filter"]["ObjectName"]);
	$arResult["filter"]["ObjectAddress"] = trim($arResult["filter"]["ObjectAddress"]);
	$arResult["filter"]["ZastroychikName"] = trim($arResult["filter"]["ZastroychikName"]);
	$arResult["filter"]["DateFindFrom"] = trim($arResult["filter"]["DateFindFrom"]);
	$arResult["filter"]["DateFindTo"] = trim($arResult["filter"]["DateFindTo"]);
	
	//удаляем HTML и PHP тэги из строки
	$arResult["filter"]["ObjectName"] = strip_tags($arResult["filter"]["ObjectName"]);
	$arResult["filter"]["ObjectAddress"] = strip_tags($arResult["filter"]["ObjectAddress"]);
	$arResult["filter"]["ZastroychikName"] = strip_tags($arResult["filter"]["ZastroychikName"]);
	$arResult["filter"]["DateFindFrom"] = strip_tags($arResult["filter"]["DateFindFrom"]);
	$arResult["filter"]["DateFindTo"] = strip_tags($arResult["filter"]["DateFindTo"]);
		
	//проверяем задан ли хотя бы 1 фильтр
	if($arResult["filter"]["ObjectName"]!="" || $arResult["filter"]["ObjectAddress"]!="" || $arResult["filter"]["ZastroychikName"]!="" || $arResult["filter"]["DateFindFrom"]!="" || $arResult["filter"]["DateFindTo"]!="")
	{
		//выполняем проверки данных для фильтра:
		//1) проверяем формат даты начала реестра
		$sDatePattern = "/^(0[1-9]|[12]\d|3[01])\.(0[1-9]|1[0-2])\.\d\d\d\d$/";
		if(trim($arResult["filter"]["DateFindFrom"])!="" && !preg_match($sDatePattern,$arResult["filter"]["DateFindFrom"])) $arResult["error"].="Для применения фильтра, проверьте, пожалуйста, дату начала реестра!<br>";

		//2) проверяем формат даты окончания реестра
		if(trim($arResult["filter"]["DateFindTo"])!="" && !preg_match($sDatePattern,$arResult["filter"]["DateFindTo"])) $arResult["error"].="Для применения фильтра, проверьте, пожалуйста, дату окончания реестра!<br>";
		
		//3)проверяем период дат
		if(preg_match($sDatePattern,$arResult["filter"]["DateFindFrom"]) && preg_match($sDatePattern,$arResult["filter"]["DateFindTo"]) && strtotime($arResult["filter"]["DateFindFrom"])>strtotime($arResult["filter"]["DateFindTo"])) $arResult["error"].="Для применения фильтра, проверьте, пожалуйста, период реестра!<br>";
		
		
		//если нет ошибок в фильтрах, то значения фильтров присваиваем параметрам для отправки soap-запроса
		if($arResult["error"]=="")
		{
/*----------------------------------------------------
 * @author          Lashkevich Anastasia <a.lashkevich@gmail.com>
 * @description     Убираем преобразование кодировки
 * 
 *  --Начало--25.11.2014 09:24
 ----------------------------------------------------*/  		
			//$sObjectName = iconv('windows-1251','UTF-8',$arResult["filter"]["ObjectName"]);		
			//$sObjectAddress = iconv('windows-1251','UTF-8',$arResult["filter"]["ObjectAddress"]);	
			//$sZastroychikName =  iconv('windows-1251','UTF-8',$arResult["filter"]["ZastroychikName"]);			
			
			$sObjectName = $arResult["filter"]["ObjectName"];      
            $sObjectAddress = $arResult["filter"]["ObjectAddress"];   
            $sZastroychikName =  $arResult["filter"]["ZastroychikName"];  

 /*  --Конец--25.11.2014 09:24
 ----------------------------------------------------*/  			
			
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
			
		}
	
	
		//чтобы снова вывести в форме заменяем кавычки на их html-эквиваленты
		$arResult["filter"]["ObjectName"]=htmlspecialchars($arResult["filter"]["ObjectName"]);				//фильтр по наименованию объекта
		$arResult["filter"]["ObjectAddress"]=htmlspecialchars($arResult["filter"]["ObjectAddress"]);		//фильтр по адресу объекта
		$arResult["filter"]["ZastroychikName"]=htmlspecialchars($arResult["filter"]["ZastroychikName"]);	//фильтр по застройщику
		$arResult["filter"]["DateFindFrom"]=htmlspecialchars($arResult["filter"]["DateFindFrom"]);			//фильтр по дате начала реестра
		$arResult["filter"]["DateFindTo"]=htmlspecialchars($arResult["filter"]["DateFindTo"]);				//фильтр по дате окончания реестра
	
	}
	else
	{
		$arResult["error"]="<br>Необходимо задать хотя бы один фильтр!";
	}
	

	//Готовим параметры для soap-запроса
	$arWebServiceParams = array(
	$sParamName => array(
		$aParamsName["DateOutput"]=>$sDateNow,
		$aParamsName["objectName"]=>$sObjectName,
		$aParamsName["objectAddress"]=>$sObjectAddress,
		$aParamsName["ZastroychikName"]=>$sZastroychikName,
		$aParamsName["DateFindFrom"]=>$sDateFindFrom,
		$aParamsName["DateFindTo"]=>$sDateFindTo
		)
	);

		if($arResult["error"]=="")
		{
			//Создание SOAP-клиента по WSDL-документу
			$client = new SoapClient($sWSDLPath,array(
			    "trace"      => 1,
			    "exceptions" => 1));
			//Отправляем soap-запрос
			$objSoapResponse  = $client->$sWebServiceName($arWebServiceParams);
			
			//Если произошла ошибка при вызове SOAP
			if(is_soap_fault($objSoapResponse)) $arResult["error"]="Извините, сервис временно недоступен! Пожалуйста, воспользуйтесь сервисом позднее.";
			
			
			//Иначе формируем результат
			else
			{
			
				$arSoapResponse = (array)$objSoapResponse;
				
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
 *  --Начало--25.11.2014 09:24
 ----------------------------------------------------*/  					
//						$arResult["ResolutionProjectItems"][$i]["BuilderName"]=iconv('UTF-8','windows-1251',$objReestrItem->BuilderName);
//						$arResult["ResolutionProjectItems"][$i]["ObjectAddress"]=iconv('UTF-8','windows-1251',$objReestrItem->ObjectAddress);
//						$arResult["ResolutionProjectItems"][$i]["ObjectName"]=iconv('UTF-8','windows-1251',$objReestrItem->ObjectName);
//						$arResult["ResolutionProjectItems"][$i]["PermitID"]=iconv('UTF-8','windows-1251',$objReestrItem->PermitID);
//						$objDateCreate = new DateTime($objReestrItem->DateCreate);
//						$arResult["ResolutionProjectItems"][$i]["DateCreate"]=$sDateCreate=$objDateCreate->format('d.m.Y');
						
						
						$arResult["ResolutionProjectItems"][$i]["BuilderName"]=$objReestrItem->BuilderName;
                        $arResult["ResolutionProjectItems"][$i]["ObjectAddress"]=$objReestrItem->ObjectAddress;
                        $arResult["ResolutionProjectItems"][$i]["ObjectName"]=$objReestrItem->ObjectName;
                        $arResult["ResolutionProjectItems"][$i]["PermitID"]=$objReestrItem->PermitID;
                        $objDateCreate = new DateTime($objReestrItem->DateCreate);
                        $arResult["ResolutionProjectItems"][$i]["DateCreate"]=$sDateCreate=$objDateCreate->format('d.m.Y');
/*  --Начало--25.11.2014 09:24
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
 *  --Начало--25.11.2014 09:24
 ----------------------------------------------------*/  
//					$arResult["ResolutionProjectItems"][$i]["BuilderName"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->BuilderName);
//					$arResult["ResolutionProjectItems"][$i]["ObjectAddress"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->ObjectAddress);
//					$arResult["ResolutionProjectItems"][$i]["ObjectName"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->ObjectName);
//					$arResult["ResolutionProjectItems"][$i]["PermitID"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->PermitID);
//					$objDateCreate = new DateTime($arSoapResponse["return"]->DateCreate);
//					$arResult["ResolutionProjectItems"][$i]["DateCreate"]=$sDateCreate=$objDateCreate->format('d.m.Y');
					
					$arResult["ResolutionProjectItems"][$i]["BuilderName"]=$arSoapResponse["return"]->BuilderName;
                    $arResult["ResolutionProjectItems"][$i]["ObjectAddress"]=$arSoapResponse["return"]->ObjectAddress;
                    $arResult["ResolutionProjectItems"][$i]["ObjectName"]=$arSoapResponse["return"]->ObjectName;
                    $arResult["ResolutionProjectItems"][$i]["PermitID"]=$arSoapResponse["return"]->PermitID;
                    $objDateCreate = new DateTime($arSoapResponse["return"]->DateCreate);
                    $arResult["ResolutionProjectItems"][$i]["DateCreate"]=$sDateCreate=$objDateCreate->format('d.m.Y');
					
/*  --Начало--25.11.2014 09:24
 ----------------------------------------------------*/ 					
				}
			}
		}
}


//подключение шаблона
$this->IncludeComponentTemplate();
?>
