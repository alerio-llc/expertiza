<?
//устанавливает значение php.ini - ожидание сокета
ini_set("default_socket_timeout",120); 
$sScript_path="./includes/";  
$arResult["error"]="";	//строка ошибок

//Устанавливаем начальные параметры
//$sWSDLPath="http://webservices.stroyform.com/Service4SaitRazreshenieNaStroitelstvo.asmx?WSDL";	//путь к WSDL Стройформ
$sWSDLPath="http://77.234.204.251:18180/Service4SaitRazreshenieNaStroitelstvo.asmx?WSDL";			//путь к WSDL Службы
$sWebServiceName="GetListResolutionCommissioning";													//имя web-сервиса
$sParamName="filter";																			//Наименование параметра soap-запроса
$arSoapResponse = array();


//устанавливаем наименования параметров сервиса

/*----------------------------------------------------
 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
 * @description 	Добавлены новые параметры soap-запроса:
 * 					1) район 
 * 
 *  --Начало--17.10.2014 07:59
 ----------------------------------------------------*/

////устанавливаем наименования параметров сервиса
//$aParamsName = array(
//	"DateOutput"=>"DateOutput",				//Дата формирования запроса
//	"objectName"=>"objectName",				//Имя объекта строительства
//	"objectAddress"=>"objectAddress",		//Адрес объекта строительства
//	"ZastroychikName"=>"ZastroychikName",	//Застройщик
//	"DateFindFrom"=>"DateFindFrom",			//Дата начала реестра
//	"DateFindTo"=>"DateFindTo"				//Дата окончания реестра
//);

$aParamsName = array(
	"DateOutput"=>"DateOutput",				        //Дата формирования запроса
	"objectName"=>"objectName",				        //Имя объекта строительства
	"objectAddress"=>"objectAddress",		        //Адрес объекта строительства
	"ZastroychikName"=>"ZastroychikName",	        //Застройщик
	"DateFindFrom"=>"DateFindFrom",			        //Дата начала реестра
	"DateFindTo"=>"DateFindTo",				        //Дата окончания реестра
	"ObjectAddressRajon"=>"ObjectAddressRajon"		//Район
);

/*  --Конец--17.10.2014 07:59
----------------------------------------------------*/

/*
//$sDateNow=date("Y-m-d"); 	//сегодняшняя дата
 * исправление 04.07.2013
 * $sDateNow, т.к. это не текущая дата, а дата выдачи разрешения
 * НАЧАЛО
 */
$sDateNow="1900-01-01"; 	//дата выдачи разрешения
/*КОНЕЦ*/
$sObjectName = "";							//Наименование объекта
$sObjectAddress = "";						//Адрес объекта
$sZastroychikName = "";						//Застройщик
$sDateFindFrom =  date("Y-m-d",mktime(0, 0, 0,date("m"),1,date("Y")));						//Дата начала реестра — начало текущего месяца
$arResult["filter"]["DateFindFrom"] = date("d.m.Y",mktime(0, 0, 0,date("m"),1,date("Y")));						//Дата начала реестра — начало текущего месяца
$sDateFindTo = date("Y-m-d",mktime(0, 0, 0,date("m"),date("t"),date("Y")));							//Дата окончания реестра — конец текущего месяца	
$arResult["filter"]["DateFindTo"] = date("d.m.Y",mktime(0, 0, 0,date("m"),date("t"),date("Y")));							//Дата окончания реестра — конец текущего месяца
/*----------------------------------------------------
 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
 * @description 	Добавлены новые параметры фильтра:
 * 					1) район 
 * 
 *  --Начало--17.10.2014 07:59
 ----------------------------------------------------*/
$sObjectAddressRajon = "";                //Район
/*  --Конец--17.10.2014 07:59
 ----------------------------------------------------*/

//Пришли данные для фильтра реестра из формы
if($_REQUEST["action"]=="filter")
{

	//Помещаем параметры фильтра реестра в $arResult
	$arResult["filter"]["ObjectName"]=stripslashes($_REQUEST["ObjectName"]);				//фильтр по наименованию объекта
	$arResult["filter"]["ObjectAddress"]=stripslashes($_REQUEST["ObjectAddress"]);		//фильтр по адресу объекта
	$arResult["filter"]["ZastroychikName"]=stripslashes($_REQUEST["ZastroychikName"]);	//фильтр по застройщику
	
/*----------------------------------------------------
 * @author          Lashkevich Anastasia <a.lashkevich@gmail.com>
 * @description     Добавлены новые параметры фильтра:
 *                  1) район 
 * 
 *  --Начало--17.10.2014 07:59
 ----------------------------------------------------*/
	$arResult["filter"]["ObjectAddressRajon"]=stripslashes($_REQUEST["ObjectAddressRajon"]);       //фильтр по району
/*  --Конец--17.10.2014 07:59
 ----------------------------------------------------*/
	$arResult["filter"]["DateFindFrom"]=stripslashes($_REQUEST["DateFindFrom"]);           //фильтр по дате начала реестра
	$arResult["filter"]["DateFindTo"]=stripslashes($_REQUEST["DateFindTo"]);				//фильтр по дате окончания реестра
	
	/*----------------------------------------------------
     * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
     * @description 	Добавлены новые параметры фильтра:
     * 					1) район 
     * 
     *  --Начало--17.10.2014 07:59
     ----------------------------------------------------*/
	$arResult["filter"]["ObjectAddressRajon"]=stripslashes($_REQUEST["ObjectAddressRajon"]);				//фильтр по дате окончания реестра
    /*  --Конец--17.10.2014 07:59
    ----------------------------------------------------*/
	
	//выполняем проверки данных для фильтра:
	//1) проверяем формат даты начала реестра
	$sDatePattern = "/^(0[1-9]|[12]\d|3[01])\.(0[1-9]|1[0-2])\.\d\d\d\d$/";
	if(!preg_match($sDatePattern,$arResult["filter"]["DateFindFrom"])) $arResult["error"].="Для применения фильтра, проверьте, пожалуйста, дату начала реестра!<br>";
	//2) проверяем формат даты окончания реестра
	if(!preg_match($sDatePattern,$arResult["filter"]["DateFindTo"])) $arResult["error"].="Для применения фильтра, проверьте, пожалуйста, дату окончания реестра!<br>";
	
	//проверяем период дат
	if(strtotime($arResult["filter"]["DateFindFrom"])>strtotime($arResult["filter"]["DateFindTo"])) $arResult["error"].="Для применения фильтра, проверьте, пожалуйста, период реестра!<br>"; 
	
	//если нет ошибок в фильтрах, то значения фильтров присваиваем параметрам для отправки soap-запроса
	if($arResult["error"]=="")
	{
/*----------------------------------------------------
 * @author           Lashkevich Anastasia <a.lashkevich@gmail.com>
 * @description      Убираем смену кодировки
 * 
 *  --Начало--25.11.2014 09:10
 * ----------------------------------------------------*/	
//		$sObjectName = iconv('windows-1251','UTF-8',$arResult["filter"]["ObjectName"]);		
//		$sObjectAddress = iconv('windows-1251','UTF-8',$arResult["filter"]["ObjectAddress"]);	
//		$sZastroychikName =  iconv('windows-1251','UTF-8',$arResult["filter"]["ZastroychikName"]);	
		
		$sObjectName = $arResult["filter"]["ObjectName"];       
        $sObjectAddress = $arResult["filter"]["ObjectAddress"];   
        $sZastroychikName =  $arResult["filter"]["ZastroychikName"];
/*  --Начало--25.11.2014 09:10
 * ----------------------------------------------------*/   		
		$arDateFindFrom = explode(".",$arResult["filter"]["DateFindFrom"]);
		$sDateFindFrom = date("Y-m-d",mktime(0, 0, 0,$arDateFindFrom[1],$arDateFindFrom[0],$arDateFindFrom[2]));
		$arDateFindTo = explode(".",$arResult["filter"]["DateFindTo"]);
		$sDateFindTo = date("Y-m-d",mktime(0, 0, 0,$arDateFindTo[1],$arDateFindTo[0],$arDateFindTo[2]));


/*----------------------------------------------------
 * @author           Lashkevich Anastasia <a.lashkevich@gmail.com>
 * @description      Убираем смену кодировки
 * 
 *  --Начало--25.11.2014 09:10
 * ----------------------------------------------------*/   
		
		
//		/*----------------------------------------------------
//         * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
//         * @description 	Добавлены новые параметры soap-запроса:
//         * 					1) район 
//         * 
//         *  --Начало--17.10.2014 07:59
//         ----------------------------------------------------*/
//		$sObjectAddressRajon = iconv('windows-1251','UTF-8',$arResult["filter"]["ObjectAddressRajon"]);
		
		
                
		
//		/*  --Конец--17.10.2014 07:59
//  		  ----------------------------------------------------*/
				
		$sObjectAddressRajon =  $arResult["filter"]["ObjectAddressRajon"];
		
/*  --Начало--25.11.2014 09:10
 * ----------------------------------------------------*/  		
	}
	
	
	//чтобы снова вывести в форме заменяем кавычки на их html-эквиваленты
	$arResult["filter"]["ObjectName"]=htmlspecialchars($arResult["filter"]["ObjectName"]);				//фильтр по наименованию объекта
	$arResult["filter"]["ObjectAddress"]=htmlspecialchars($arResult["filter"]["ObjectAddress"]);		//фильтр по адресу объекта
	$arResult["filter"]["ZastroychikName"]=htmlspecialchars($arResult["filter"]["ZastroychikName"]);	//фильтр по застройщику
	$arResult["filter"]["DateFindFrom"]=htmlspecialchars($arResult["filter"]["DateFindFrom"]);			//фильтр по дате начала реестра
	$arResult["filter"]["DateFindTo"]=htmlspecialchars($arResult["filter"]["DateFindTo"]);				//фильтр по дате окончания реестра
	
	/*----------------------------------------------------
     * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
     * @description 	Добавлены новые параметры soap-запроса:
     * 					1) район 
     * 
     *  --Начало--17.10.2014 07:59
     ----------------------------------------------------*/
    $arResult["filter"]["ObjectAddressRajon"] = htmlspecialchars($arResult["filter"]["ObjectAddressRajon"]);
	/*  --Конец--17.10.2014 07:59
  	----------------------------------------------------*/
}


/*----------------------------------------------------
 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
 * @description 	Добавлены новые параметры soap-запроса:
 * 					1) район 
 * 
 *  --Начало--17.10.2014 07:59
 ----------------------------------------------------*/
//Готовим параметры для soap-запроса
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

	
//Готовим параметры для soap-запроса
$arWebServiceParams = array(
	$sParamName => array(
		$aParamsName["DateOutput"]=>$sDateNow,
		$aParamsName["objectName"]=>$sObjectName,
		$aParamsName["objectAddress"]=>$sObjectAddress,
		$aParamsName["ZastroychikName"]=>$sZastroychikName,
		$aParamsName["DateFindFrom"]=>$sDateFindFrom,
		$aParamsName["DateFindTo"]=>$sDateFindTo,
		$aParamsName["ObjectAddressRajon"]=>$sObjectAddressRajon
		)
	);
/*  --Конец--17.10.2014 07:59
 ----------------------------------------------------*/	
	
	
//Создание SOAP-клиента по WSDL-документу
$client = new SoapClient($sWSDLPath,array(
    "trace"      => 1,
    "exceptions" => 0));
//Отправляем soap-запрос
$objSoapResponse  = $client->$sWebServiceName($arWebServiceParams);

//Если произошла ошибка при вызове SOAP
if(is_soap_fault($objSoapResponse)) $arResult["error"]="Извините, сервис временно недоступен!";
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
			//echo $i."<br>"
/*----------------------------------------------------
 * @author           Lashkevich Anastasia <a.lashkevich@gmail.com>
 * @description      Убираем смену кодировки
 * 
 *  --Начало--25.11.2014 09:10
 * ----------------------------------------------------*/
//			$arResult["ResolutionProjectItems"][$i]["BuilderName"]=iconv('UTF-8','windows-1251',$objReestrItem->BuilderName);
//			$arResult["ResolutionProjectItems"][$i]["ObjectAddress"]=iconv('UTF-8','windows-1251',$objReestrItem->ObjectAddress);
//			$arResult["ResolutionProjectItems"][$i]["ObjectName"]=iconv('UTF-8','windows-1251',$objReestrItem->ObjectName);
//			$arResult["ResolutionProjectItems"][$i]["PermitID"]=iconv('UTF-8','windows-1251',$objReestrItem->PermitID);
//			$objDateCreate = new DateTime($objReestrItem->DateCreate);
//			$arResult["ResolutionProjectItems"][$i]["DateCreate"]=$sDateCreate=$objDateCreate->format('d.m.Y');
//			/*----------------------------------------------------
//            * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
//            * @description 	Добавлены новые параметры soap-запроса:
//            * 					1) район 
//            * 
//            *  --Начало--17.10.2014 07:59
//            ----------------------------------------------------*/
//			$arResult["ResolutionProjectItems"][$i]["ObjectAddressRajon"]=iconv('UTF-8','windows-1251',$objReestrItem->ObjectAddressRajon);
//			/*  --Конец--17.10.2014 07:59
//			 ----------------------------------------------------*/
			
			$arResult["ResolutionProjectItems"][$i]["BuilderName"]=$objReestrItem->BuilderName;
            $arResult["ResolutionProjectItems"][$i]["ObjectAddress"]=$objReestrItem->ObjectAddress;
            $arResult["ResolutionProjectItems"][$i]["ObjectName"]=$objReestrItem->ObjectName;
            $arResult["ResolutionProjectItems"][$i]["PermitID"]=$objReestrItem->PermitID;
            $objDateCreate = new DateTime($objReestrItem->DateCreate);
            $arResult["ResolutionProjectItems"][$i]["DateCreate"]=$sDateCreate=$objDateCreate->format('d.m.Y');
            $arResult["ResolutionProjectItems"][$i]["ObjectAddressRajon"]=$objReestrItem->ObjectAddressRajon;

/*  --Конец--25.11.2014 09:10
 ----------------------------------------------------*/
			
			$i++;
			
		}
	}
	else if(is_object($arSoapResponse["return"]))
	{
	//или объект
/*----------------------------------------------------
 * @author           Lashkevich Anastasia <a.lashkevich@gmail.com>
 * @description      Убираем смену кодировки
 * 
 *  --Начало--25.11.2014 09:10
 * ----------------------------------------------------*/	
//		$arResult["ResolutionProjectItems"][$i]["BuilderName"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->BuilderName);
//		$arResult["ResolutionProjectItems"][$i]["ObjectAddress"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->ObjectAddress);
//		$arResult["ResolutionProjectItems"][$i]["ObjectName"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->ObjectName);
//		$arResult["ResolutionProjectItems"][$i]["PermitID"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->PermitID);
//		$objDateCreate = new DateTime($arSoapResponse["return"]->DateCreate);
//		$arResult["ResolutionProjectItems"][$i]["DateCreate"]=$sDateCreate=$objDateCreate->format('d.m.Y');
//		$arResult["ResolutionProjectItems"][$i]["DateCreate"]=$sDateCreate=$objDateCreate->format('d.m.Y');
//		/*----------------------------------------------------
//        * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
//        * @description 	Добавлены новые параметры soap-запроса:
//        * 					1) район 
//        * 
//        *  --Начало--17.10.2014 07:59
//        ----------------------------------------------------*/
//		$arResult["ResolutionProjectItems"][$i]["ObjectAddressRajon"]=iconv('UTF-8','windows-1251',$objReestrItem->ObjectAddressRajon);
//		/*  --Конец--17.10.2014 07:59
//		 ----------------------------------------------------*/		
		$arResult["ResolutionProjectItems"][$i]["BuilderName"]=$arSoapResponse["return"]->BuilderName;
        $arResult["ResolutionProjectItems"][$i]["ObjectAddress"]=$arSoapResponse["return"]->ObjectAddress;
        $arResult["ResolutionProjectItems"][$i]["ObjectName"]=$arSoapResponse["return"]->ObjectName;
        $arResult["ResolutionProjectItems"][$i]["PermitID"]=$arSoapResponse["return"]->PermitID;
        $objDateCreate = new DateTime($arSoapResponse["return"]->DateCreate);
        $arResult["ResolutionProjectItems"][$i]["DateCreate"]=$sDateCreate=$objDateCreate->format('d.m.Y');
        $arResult["ResolutionProjectItems"][$i]["DateCreate"]=$sDateCreate=$objDateCreate->format('d.m.Y');
        $arResult["ResolutionProjectItems"][$i]["ObjectAddressRajon"]=$objReestrItem->ObjectAddressRajon;		
/*  --Конец--25.11.2014 09:10
 ----------------------------------------------------*/		
	}
}



//Подключаем шаблон
$this->IncludeComponentTemplate();
?>