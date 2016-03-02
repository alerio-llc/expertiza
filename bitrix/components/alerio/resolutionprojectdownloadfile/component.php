<?

/*----------------------------------------------------
 * @author          Lashkevich Anastasia <a.lashkevich@gmail.com>
 * @description     Добавлена ссылка на сканы разрешений (теперь сканы разрешений будут выдаваться после авторизации)
 * 
 *  --Начало--30.10.2014 07:34
 ----------------------------------------------------*/

//    /*----------------------------------------------------
//     * @author          Lashkevich Anastasia <a.lashkevich@gmail.com>
//     * @description     временно скрываем показ сканов от всех
//     * 
//     *  --Начало--01.08.2014 11:03
//     ----------------------------------------------------*/
    
//     //   //ограничение на IP-хоста, с которого просматривается данная страница
//     //   /*if(
//     //       $_SERVER['REMOTE_ADDR']=="77.234.204.250" || 
//     //       $_SERVER['REMOTE_ADDR']=="83.68.45.1" ||
//     //       $_SERVER['REMOTE_ADDR']=="127.0.0.1" ||  
//     //       $_SERVER['HTTP_X_FORWARDED_FOR']=="77.234.204.250" || 
//     //       $_SERVER['HTTP_X_FORWARDED_FOR']=="83.68.45.1" ||
//     //       $_SERVER['HTTP_X_FORWARDED_FOR']=="127.0.0.1")
//     //   {*/
        
//     //   /*if( 
//     //       $_SERVER['REMOTE_ADDR']=="77.234.204.250" || 
//     //       $_SERVER['REMOTE_ADDR']=="83.68.45.1" ||
//     //       $_SERVER['HTTP_X_FORWARDED_FOR']=="77.234.204.250" || 
//     //       $_SERVER['HTTP_X_FORWARDED_FOR']=="83.68.45.1")
//     //   {*/
        
        
//    //    //УСТАНАВЛИВАЕМ НАЧАЛЬНЫЕ ЗНАЧЕНИЯ
//    //    $sScript_path="./includes/";    //путь к модулям сайта относительно текущей папки (на уровень вверх)
//    //    $arResult["ErrorText"]="";      //строка ошибок
//    //    $sHostName="77.234.204.250";    //IP FTP-сервера
//    //    $nPortNumber = 23456;           //номер порта FTP-сервера
//    //    $nTimeOut = 120;                //таймаут для всех последующих сетевых операций (по умолчанию 90с)
//    //    $sFtpUserName = "uis-site";     //логин FTP-пользователя
//    //    $sFtpUserPass = "ts7TNlpNB6";   //пароль FTP-пользователя
//    //    $bErrorNotExists = true;        //флаг отсутствия ошибок
//    //    //$sWSDLPath="http://webservices.stroyform.com/Service4SaitRazreshenieNaStroitelstvo.asmx?WSDL";    //путь к WSDL Стройформ
//    //    $sWSDLPath="http://77.234.204.251:18180/Service4SaitRazreshenieNaStroitelstvo.asmx?WSDL";           //путь к WSDL Службы
//    //    $sWebServiceName="PackResolutionProject";                                                           //имя web-сервиса
//    //    $sParamName="filter";                                                                               //наименование параметра soap-запроса
//    //    $arSoapResponse = array();     //массив ранения результата ответа
        
        
//    //    //УСТАНАВЛИВАЕТ ЗНАЧЕНИЕ php.ini - ОЖИДАНИЕ СОКЕТА
//    //    ini_set("default_socket_timeout",120);  
        
        
//    //    //УСТАНАВЛИВАЕМ НАИМЕНОВАНИЯ ПАРАМЕТРОВ СЕРВИСА
//    //    $aParamsName = array(
//    //            "PermitID"=>"PermitID"  //номер разрешения на строительство                        
//    //        );
        
//    //    if(!empty($_REQUEST["id"])) 
//    //    {
        
        
        
//    //        //ПОМЕЩАЕМ В РЕЗУЛЬТИРУЮЩИЙ МАССИВ НОМЕР РАЗРЕШЕНИЯ НА СТРОИТЕЛЬСТВО
//    //        $arResult["PermitID"]=$_REQUEST["id"];
            
//    //        //ГОТОВИМ ПАРАМЕТРЫ ДЛЯ SOAP-ЗАПРОСА
//    //        $arWebServiceParams = array(
//    //        $sParamName => array(
//    //            $aParamsName["PermitID"]=>$arResult["PermitID"]
//    //            )
//    //        );
            
           
//    //        //СОЗДАЕМ SOAP-КЛИЕНТА ПО WSDL-ДОКУМЕНТУ
//    //        $client = new SoapClient($sWSDLPath,array(
//    //            "trace"      => 1,
//    //            "exceptions" => 0));
            
//    //        //ОТПРАВЛЯЕМ SOAP-ЗАПРОС
//    //        $objSoapResponse  = $client->$sWebServiceName($arWebServiceParams);
           
//    //        //ПРОИЗОШЛА ОШИБКА ПРИ ВЫЗОВЕ SOAP?
//    //        if(is_soap_fault($objSoapResponse))
//    //        //ДА 
//    //        {
//    //            $arResult["ErrorText"]="Извините, сервис временно недоступен! Пожалуйста, воспользуйтесь сервисом позднее.";
                  
//    //        }
//    //        //НЕТ
//    //        {
//    //            $arSoapResponse = (array)$objSoapResponse;
                
//    //            $i=0;      
                
                
                  
//    //            //ПОМЕЩАЕМ ДАННЫЕ SOAP-ОТВЕТА В $arResult
//    //            if(is_array($arSoapResponse["return"]) && count($arSoapResponse["return"]>0))
//    //            {
//    //                //ПОЛУЧАЕМ ИЛИ МАССИВ ОБЪЕКТОВ В КАЧЕСТВЕ РЕЗУЛЬТАТА
//    //                //массив оборабатывается только для исключения ошибки, т.к. должен быть толучен только один результат, а ,следовательно, объект     
//    //                //возможно, что предыдущее утверждление неверно, когда несколько сканкопий, тогда должен быть массив 
//    //                foreach($arSoapResponse["return"] as $objFileItem)
//    //                {                   
//    //                    $arResult["ResolutionProjectFiles"][$i]["errorCode"]=iconv('UTF-8','windows-1251',$objFileItem->errorCode);
//    //                    $arResult["ResolutionProjectFiles"][$i]["linkID"]=iconv('UTF-8','windows-1251',$objFileItem->linkID);
//    //                    $arResult["ResolutionProjectFiles"][$i]["fileSize"]=iconv('UTF-8','windows-1251',$objFileItem->fileSize);
//    //                    $arResult["ResolutionProjectFiles"][$i]["fileFormat"]=iconv('UTF-8','windows-1251',$objFileItem->fileFormat);
//    //                    $arResult["ResolutionProjectFiles"][$i]["loadLink"]=iconv('UTF-8','windows-1251',$objFileItem->loadLink);   //ссылка на файл сейчас не используется
//    //                    $i++;
//    //                }
//    //            }
//    //            else if(is_object($arSoapResponse["return"]))
//    //            {
//    //                //ИЛИ ОБЪЕКТ
//    //                $arResult["ResolutionProjectFiles"][$i]["errorCode"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->errorCode);
//    //                $arResult["ResolutionProjectFiles"][$i]["linkID"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->linkID);
//    //                $arResult["ResolutionProjectFiles"][$i]["fileSize"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->fileSize);
//    //                $arResult["ResolutionProjectFiles"][$i]["fileFormat"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->fileFormat);
//    //                $arResult["ResolutionProjectFiles"][$i]["loadLink"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->loadLink); //ссылка на файл сейчас не используется
//    //            }
//    //            else
//    //            {
//    //                $bErrorNotExists = $bErrorNotExists && false; 
//    //                $arResult["ErrorText"]="Извините, не удалось найти сканированную копию разрешения! Пожалуйста, воспользуйтесь сервисом позднее.";
//    //            }
                
            
                
//    //            //НЕТ ОШИБОК ПРИ ПОЛУЧЕНИИ ФАЙЛА?
//    //            if(!empty($arResult["ResolutionProjectFiles"]) && $arResult["ResolutionProjectFiles"][0]["errorCode"]==0)
//    //            {
//    //                $sLocalFileName = $arResult["ResolutionProjectFiles"][0]["linkID"].".".$arResult["ResolutionProjectFiles"][0]["fileFormat"];
//    //                $sServerFileName = $arResult["ResolutionProjectFiles"][0]["linkID"]; //на сервере файлы хранятся без расширения
//    //                $sLocalDirName =  "ResolutionProjectFiles"; //путь к директории пробуем менять
                    
//    //                //ЕСЛИ НЕ СУЩЕСТВУЕТ ДИРЕКТОРИЯ ДЛЯ ХРАНЕНИЯ ФАЙЛОВ СКАНИРОВАННЫХ КОПИЙ РАЗРЕШЕНИЙ НА СТРОИТЕЛЬСТВО, ТО СОЗДАЕМ ЕЕ?
//    //                if(!is_dir($sLocalDirName)) mkdir($sLocalDirName);
                    
                    
                    
//    //                //ОТКРЫВАЕМ ФАЙЛ ДЛЯ ЗАПИСИ
//    //                $handle = fopen($sLocalDirName."/".$sLocalFileName, 'w');
        
//    //                if(flock($handle,LOCK_EX))
//    //                {
//    //                    //УСТАНАВЛИАЕМ СЕОДИНЕНИЕ С FTP-сервером
//    //                    $nConnectionId = ftp_connect($sHostName,$nPortNumber,$nTimeOut);
//    //                    //УДАЛОСЬ УСТАНОВИТЬ СОЕДИНЕНИЕ С FTP-СЕРВЕРОМ?
//    //                    if($nConnectionId) 
//   //                    //ДА
//    //                    {
//    //                        //ОСУЩЕСТВЛЯЕМ ВХОД НА FTP-СЕРВЕР С ЛОГИНОМ И ПАРОЛЕМ 
//    //                        $bLoginResult = ftp_login($nConnectionId, $sFtpUserName, $sFtpUserPass);
                            
//    //                        //ВКЛЮЧАЕМ ПАССИВНЫЙ РЕЖИМ РАБОТЫ FTP-СЕРВЕРА
//    //                        ftp_pasv($nConnectionId, true);
                            
//    //                        //УДАЛОСЬ ОСУЩЕСТВИТЬ ВХОД НА FTP-СЕРВЕР С ЛОГИНОМ И ПАРОЛЕМ
//    //                        if($bLoginResult) 
//    //                        {
//    //                            /*----------------------------------------------------
//    //                             * @author			  lakhmostova irina <irina.lakhmostova@gmail.com>
//    //                             * @description 	меняем режим передачи файла т.к.
//    //                                              "Аргумент mode, задающий режим пересылки файлов, 
//    //                                              должен быть указан как константа FTP_BINARY или FTP_ASCII. 
//    //                                              Режим FTP_ASCII используется для пересылки файлов, 
//    //                                              состоящих только из ASCII-символов (т. е. текстовых файлов),
//    //                                              а двоичный режим - для пересылки всех остальных файлов."
                                                  
//    //                             *  --Начало--18.07.2014 11:50
//    //                             ----------------------------------------------------*/
//    //                            //УДАЛОСЬ СКАЧАТЬ $server_file И СОХРАНИТЬ ЕГО в $local_file ?
//    //                            //if(ftp_fget($nConnectionId, $handle, $sServerFileName,FTP_ASCII,0))
//    //                            if(ftp_fget($nConnectionId, $handle, $sServerFileName,FTP_BINARY,0))
//    //                            //ДА 
//    //                            /*------------------------------------------------------
//    //                             *  --Конец--18.07.2014 11:50
//    //                             -------------------------------------------------------*/  
//    //                            {
//    //                                //Отправляем файл в поток. Будем передавать PDF
                                    
//    //                                $file=$sLocalDirName.'/'.$sLocalFileName;
                                    
        
//    //                                //СБРАСЫВАЕМ БУФЕР ВЫВОДА PHP, ЧТОБЫ ИЗБЕЖАТЬ ПЕРЕПОЛНЕНИЯ ПАМЯТИ ВЫДЕЛЕННОЙ ПОД СКРИПТ.  
//    //                                //ЕСЛИ ЭТОГО НЕ СДЕЛАТЬ ФАЙЛ БУДЕТ ЧИТАТЬСЯ В ПАМЯТЬ ПОЛНОСТЬЮ!
                                    
                                                        
//    //                                if (ob_get_level()) {
//    //                                  ob_end_clean();
//    //                                }
//    //                                //ЗАСТАВЛЯЕМ БРАУЗЕР ПОКАЗАТЬ ОКНО СОХРАНЕНИЯ ФАЙЛА
//    //                                header('Content-Description: File Transfer');
//    //                                header('Content-Type: application/octet-stream');
//    //                                header("Content-Type: application/force-download");
//    //                                header('Content-Disposition: attachment; filename=' . basename($file));
//    //                                header('Content-Transfer-Encoding: binary');
//    //                                header('Expires: 0');
//    //                                header('Cache-Control: must-revalidate');
//    //                                header('Pragma: public');
//    //                                header('Content-Length: ' . filesize($file));
//    //                                //ЧИТАЕМ ФАЙЛ И ОТПРАВЛЯЕМ ЕГО ПОЛЬЗОВАТЕЛЮ
//    //                                readfile($file);
                                    
                                    
                                    
                                    
//    //                            }
//    //                            //НЕТ 
//    //                            else 
//    //                            {
//    //                                $bErrorNotExists = $bErrorNotExists && false;
//    //                                $arResult["ErrorText"]="Извините! Не удалось получить доступ к файлу! Попробуйте, пожалуйста, позднее!";
//    //                            }
                                    
//    //                        }
//    //                        //НЕТ
//    //                        else 
//    //                        {
//    //                            $bErrorNotExists = $bErrorNotExists && false;
//    //                            $arResult["ErrorText"]= "Извините! Не удалось зайти на FTP-сервер! Попробуйте, пожалуйста, позднее!";
//    //                        }
//    //                        //ЗАКРЫВАЕМ FTP-СОЕДИНЕНИЕ
//    //                        ftp_close($nConnectionId);
//    //                    }
//    //                    //НЕТ
//    //                    else 
//    //                    {
//    //                        $bErrorNotExists = $bErrorNotExists && false;
//    //                        $arResult["ErrorText"]= "Извините! Не удалось соединиться в FTP-сервером! Попробуйте, пожалуйста, позднее!";
//    //                    }
//    //                }
                    
//    //                //СНИМАЕМ БЛОКИРОВКУ ФАЙЛА
//    //                flock($handle,LOCK_UN);
//    //                //ЗАКРЫВАЕМ ФАЙЛ
//    //                fclose($handle);
//    //                //УДАЛЯЕМ С ХОСТИНГА ОТПРАВЛЕННЫЙ ПОЛЬЗОВАТЕЛЮ ДЛЯ ПРОСМОТРА ФАЙЛ
//    //                /*----------------------------------------------------
//    //                 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
//    //                 * @description 	для отладки временно закомментируем удаление файла с сервера
//    //                 * 
//    //                 *  --Начало--16.07.2014 10:56
//    //                 ----------------------------------------------------*/
//    //                unlink($sLocalDirName."/".$sLocalFileName);
//    //                /*------------------------------------------------------
//    //                 *  --Конец--16.07.2014 10:56
//    //                 -------------------------------------------------------*/  
                    
//    //            }
//    //        }
        
//    //    }
        
//    //    //ВОЗНИКЛИ ОШИБКИ
//    //    if(!$bErrorNotExists)
//    //    //ДА
//    //    {
           
//    //        //ПОДКЛЮЧАЕМ ШАБЛОН
//    //        if(file_exists($sScript_path."subsection/ResolutionProject/ResolutionProject_view.php"))
//    //        {
//    //        	ob_start();
//    //        	require_once($sScript_path."subsection/ResolutionProject/ResolutionProject_view.php");
//    //        	$out_text=ob_get_clean();
//    //        	ob_get_clean();
            	
//    //        }
//    //    } 
        
        
//    //    /*}//конец ограничения по IP */
    
    
    
//    /*------------------------------------------------------
//     *  --Конец--01.08.2014 11:04
//     -------------------------------------------------------*/  


$sScript_path="./includes/";  

$arResult["ModeDocumentViewing"]=FALSE;    //по умолчанию флаг режима "Просмотр документов" снят

//unset($_SESSION["user"]); //TODO: удалить после отладки

//пришли данные для авторизации?
if($_REQUEST["action"]=="login")
//да
{
    if(($_REQUEST["login"]=="info@alerio.ru" && $_REQUEST["password"]=="ipu5Mixa") ||                   /*Реководство Алерио*/
        ($_REQUEST["login"]=="kulakov@gne.gov.spb.ru" && $_REQUEST["password"]=="PE1SpZZ") ||           /*Реководство Службы*/
        ($_REQUEST["login"]=="kim@gne.gov.spb.ru" && $_REQUEST["password"]=="NFDTy8K") ||               /*Реководство Службы*/
        ($_REQUEST["login"]=="annap@kstr.gov.spb.ru" && $_REQUEST["password"]=="fhEMAda") ||            /*Комитет по строительству*/
        ($_REQUEST["login"]=="kocheryaeva@kstr.gov.spb.ru" && $_REQUEST["password"]=="mk553bf") ||      /*Комитет по строительству*/
        ($_REQUEST["login"]=="str@tufruns.gov.spb.ru" && $_REQUEST["password"]=="GiZWTop") ||           /*Администрация Фрунзенского р-на*/
        ($_REQUEST["login"]=="bulak@tufruns.gov.spb.ru" && $_REQUEST["password"]=="5dvUBss") ||         /*Администрация Фрунзенского р-на*/
        ($_REQUEST["login"]=="vera@tupush.gov.spb.ru" && $_REQUEST["password"]=="JwakrKi") ||          /*Администрация Пушкинского р-на*/
        ($_REQUEST["login"]=="ano@tupush.gov.spb.ru" && $_REQUEST["password"]=="Ltq5uQu") ||            /*Администрация Пушкинского р-на*/
        ($_REQUEST["login"]=="galanova@tukur.gov.spb.ru" && $_REQUEST["password"]=="ypxbzOR") ||        /*Администрация Курортного р-на*/
        ($_REQUEST["login"]=="savchenko@tukur.gov.spb.ru" && $_REQUEST["password"]=="flfOpA7") ||       /*Администрация Курортного р-на*/
        ($_REQUEST["login"]=="soboleva@tunev.gov.spb.ru" && $_REQUEST["password"]=="gqfz4Cv") ||        /*Администрация Невского р-на*/
        ($_REQUEST["login"]=="jakovleva@tunev.gov.spb.ru" && $_REQUEST["password"]=="ucBmO2r") ||       /*Администрация Невского р-на*/
        ($_REQUEST["login"]=="invest@tuadm.gov.spb.ru" && $_REQUEST["password"]=="gUN1i7E") ||          /*Администрация Адмиралтейского р-на*/
        ($_REQUEST["login"]=="invest3@tuadm.gov.spb.ru" && $_REQUEST["password"]=="FquTpS3") ||         /*Администрация Адмиралтейского р-на*/
        ($_REQUEST["login"]=="s_kuznetsov@voadm.gov.spb.ru" && $_REQUEST["password"]=="QereiRO") ||     /*Администрация Васильевского р-на*/
        ($_REQUEST["login"]=="kaz@voadm.gov.spb.ru" && $_REQUEST["password"]=="Q78qiU3") ||             /*Администрация Васильевского р-на*/
        ($_REQUEST["login"]=="evgenia@tumos.gov.spb.ru" && $_REQUEST["password"]=="0liRKYm") ||         /*Администрация Московского р-на*/
        ($_REQUEST["login"]=="maslova@tumos.gov.spb.ru" && $_REQUEST["password"]=="1xRUGia") ||         /*Администрация Московского р-на*/
        ($_REQUEST["login"]=="girin@tuvyb.gov.spb.ru" && $_REQUEST["password"]=="73aCc5D") ||           /*Администрация Выборгского р-на*/
        ($_REQUEST["login"]=="erin@tuvyb.gov.spb.ru" && $_REQUEST["password"]=="E5LQQeZ")  ||           /*Администрация Выборгского р-на*/
        ($_REQUEST["login"]=="shumeyko@tucentr.gov.spb.ru" && $_REQUEST["password"]=="BocGM3c")  ||     /*Администрация Центрального р-на*/
        ($_REQUEST["login"]=="morozova@tucentr.gov.spb.ru" && $_REQUEST["password"]=="qjELbGr")  ||     /*Администрация Центрального р-на*/
        ($_REQUEST["login"]=="t.volkova@tukalin.gov.spb.ru" && $_REQUEST["password"]=="CuBNCye")  ||    /*Администрация Калининского р-на*/
        ($_REQUEST["login"]=="p.a.zadorin@tukalin.gov.spb.ru" && $_REQUEST["password"]=="Eh7ypAT")  ||  /*Администрация Калининского р-на*/
        ($_REQUEST["login"]=="stroi-1@tupetr.gov.spb.ru" && $_REQUEST["password"]=="G7aFcI8")  ||       /*Администрация Петроградского р-на*/
        ($_REQUEST["login"]=="ais@tupetr.gov.spb.ru" && $_REQUEST["password"]=="16f9P18")  ||           /*Администрация Петроградского р-на*/
        ($_REQUEST["login"]=="tushina@tuptrdv.gov.spb.ru" && $_REQUEST["password"]=="0blH06p")  ||      /*Администрация Петродворцового р-на*/
        ($_REQUEST["login"]=="pnv@tuptrdv.gov.spb.ru" && $_REQUEST["password"]=="zjcz2Gy")  ||          /*Администрация Петродворцового р-на*/
        ($_REQUEST["login"]=="belyakova@tuprim.gov.spb.ru" && $_REQUEST["password"]=="U7PJZqC")  ||     /*Администрация Приморского р-на*/
        ($_REQUEST["login"]=="senchenkova@tuprim.gov.spb.ru" && $_REQUEST["password"]=="M7kjPqX")  ||   /*Администрация Приморского р-на*/
        ($_REQUEST["login"]=="str@tukrsl.gov.spb.ru" && $_REQUEST["password"]=="6RphORS")  ||           /*Администрация Красносельского р-на*/
        ($_REQUEST["login"]=="kolesova@tukrsl.gov.spb.ru" && $_REQUEST["password"]=="vm2MrlS") ||       /*Администрация Красносельского р-на*/
        ($_REQUEST["login"]=="azf@tukrgv.gov.spb.ru" && $_REQUEST["password"]=="luKWKpS")  ||           /*Администрация Красногвардейского р-на*/
        ($_REQUEST["login"]=="ija@tukrgv.gov.spb.ru" && $_REQUEST["password"]=="jLFYjBC")  ||           /*Администрация Красногвардейского р-на*/
        ($_REQUEST["login"]=="gruzdeva@tukir.gov.spb.ru" && $_REQUEST["password"]=="H2Mgpna")  ||       /*Администрация Кировского р-на*/
        ($_REQUEST["login"]=="gubanova@tukir.gov.spb.ru" && $_REQUEST["password"]=="mLj8AtW")  ||       /*Администрация Кировского р-на*/
        ($_REQUEST["login"]=="zam@tukrns.gov.spb.ru" && $_REQUEST["password"]=="Nbo24aV")  ||           /*Администрация Кронштадского р-на*/
        ($_REQUEST["login"]=="sdb@tukrns.gov.spb.ru" && $_REQUEST["password"]=="PrZxzTM") ||            /*Администрация Кронштадского р-на*/
        ($_REQUEST["login"]=="volkov@gne.gov.spb.ru" && $_REQUEST["password"]=="6dQrMeD") ||                 /*Сотрудники Службы*/
        ($_REQUEST["login"]=="dudina@gne.gov.spb.ru" && $_REQUEST["password"]=="jvmNr8C")   ||          /*Сотрудники Службы*/
        ($_REQUEST["login"]=="OVBuzinina@gbr.ru" && $_REQUEST["password"]=="r41qTuj")       ||          /*Управление Федеральной службы государственной регистраци*/
        ($_REQUEST["login"]=="vladimirova@stateinvest.spb.ru" && $_REQUEST["password"]=="cBk2Vx1")  ||  /*СПб ГБУ "Управление инвестиций"*/
        ($_REQUEST["login"]=="stanislav@stateinvest.spb.ru" && $_REQUEST["password"]=="hx68OzD")    ||  /*СПб ГБУ "Управление инвестиций"*/
        ($_REQUEST["login"]=="turenkov@stateinvest.spb.ru" && $_REQUEST["password"]=="r90QRvc")     ||  /*СПб ГБУ "Управление инвестиций"*/
        ($_REQUEST["login"]=="savina@stateinvest.spb.ru" && $_REQUEST["password"]=="28hQbtR")       ||  /*СПб ГБУ "Управление инвестиций"*/
        ($_REQUEST["login"]=="demidenko@kstr.gov.spb.ru" && $_REQUEST["password"]=="XppqRE7")       ||  /*Комитет по строительству*/
        ($_REQUEST["login"]=="pchelkina@kstr.gov.spb.ru" && $_REQUEST["password"]=="ieQ5xVg")       ||  /*Комитет по строительству*/
        ($_REQUEST["login"]=="sokratilin@kstr.gov.spb.ru" && $_REQUEST["password"]=="AUV8be2")      ||  /*Комитет по строительству*/
        ($_REQUEST["login"]=="melnikovra@stateinvest.spb.ru" && $_REQUEST["password"]=="isGF9hQ")   ||  /*Комитет по строительству*/
        ($_REQUEST["login"]=="mihailova@kstr.gov.spb.ru" && $_REQUEST["password"]=="kfTn4YOB")      ||  /*Комитет по строительству*/
        ($_REQUEST["login"]=="eas@tukolp.gov.spb.ru" && $_REQUEST["password"]=="nvQ1HpY")   ||  /*Администрация колпинского района*/
        ($_REQUEST["login"]=="kgn@tukolp.gov.spb.ru" && $_REQUEST["password"]=="F3yTxAy")   ||  /*Администрация колпинского района*/
        ($_REQUEST["login"]=="kuchumovs@commim.spb.ru" && $_REQUEST["password"]=="8x9zH2V")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="petrushenko@commim.spb.ru" && $_REQUEST["password"]=="OGe3Z16")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="demin@commim.spb.ru" && $_REQUEST["password"]=="7A70mwm")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="timofeeva@commim.spb.ru" && $_REQUEST["password"]=="jSwT523")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="ruleyeva@commim.spb.ru" && $_REQUEST["password"]=="03YMb1g")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="aksenovM2@commim.spb.ru" && $_REQUEST["password"]=="gc4x5G1")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="nekipelova@commim.spb.ru" && $_REQUEST["password"]=="M2T6Ke6")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="koch@commim.spb.ru" && $_REQUEST["password"]=="O3H8QZ4")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="iriskinas@commim.spb.ru" && $_REQUEST["password"]=="8dWsb97")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="chuhonceva@commim.spb.ru" && $_REQUEST["password"]=="d486fUP")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="babaeva@commim.spb.ru" && $_REQUEST["password"]=="4FhbC18")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="galancevan@commim.spb.ru" && $_REQUEST["password"]=="8H4L7Hr")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="salnikoval@commim.spb.ru" && $_REQUEST["password"]=="0nu3y3o")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="yashericyna@commim.spb.ru" && $_REQUEST["password"]=="4PuB35a")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="svininae@commim.spb.ru" && $_REQUEST["password"]=="424nvcF")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="sachko@commim.spb.ru" && $_REQUEST["password"]=="v2hx66V")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="galahova@commim.spb.ru" && $_REQUEST["password"]=="LX9W6G0")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="gubina@commim.spb.ru" && $_REQUEST["password"]=="5FL59OJ")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="chumakov@commim.spb.ru" && $_REQUEST["password"]=="v83kO7N")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="akcenovM@commim.spb.ru" && $_REQUEST["password"]=="t41YmM1")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="mihailov@commim.spb.ru" && $_REQUEST["password"]=="h1oN10X")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="kosenko@commim.spb.ru" && $_REQUEST["password"]=="tV6wO68")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="nikolaeva1@commim.spb.ru" && $_REQUEST["password"]=="P979uLL")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="chernomorez@commim.spb.ru" && $_REQUEST["password"]=="61xhpL4")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="chernenko1@commim.spb.ru" && $_REQUEST["password"]=="CT7y1a7")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="leonova@commim.spb.ru" && $_REQUEST["password"]=="0PQRX62")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="malov@commim.spb.ru" && $_REQUEST["password"]=="6NHw31s")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="barkova@kzr.gov.spb.ru" && $_REQUEST["password"]=="6r3z2Jm")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="pahomova@kzr.gov.spb.ru" && $_REQUEST["password"]=="23OBG0j")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="hmeleva@kzr.gov.spb.ru" && $_REQUEST["password"]=="Gx25d4p")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="artemieva@kzr.gov.spb.ru" && $_REQUEST["password"]=="vCY3U56")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="grigorev@kzr.gov.spb.ru" && $_REQUEST["password"]=="ygM58y5")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="araslanova@kzr.gov.spb.ru" && $_REQUEST["password"]=="P48YET3")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="gulceva@commim.spb.ru" && $_REQUEST["password"]=="cZt95o5")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="turkin@kzr.gov.spb.ru" && $_REQUEST["password"]=="Qzvj139")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="levkova@kzr.gov.spb.ru" && $_REQUEST["password"]=="4N6v1oG")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="gavrilov2@commim.spb.ru" && $_REQUEST["password"]=="r569grH")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="volkova@commim.spb.ru" && $_REQUEST["password"]=="t3Lh35w")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="krysanova@commim.spb.ru" && $_REQUEST["password"]=="cZ54Qi3")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="goncharova@commim.spb.ru" && $_REQUEST["password"]=="n0W26Fb")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="zelenkova@kzr.gov.spb.ru" && $_REQUEST["password"]=="HOy3f33")   ||      /* Комитет имущественных отношений */
        ($_REQUEST["login"]=="chauzovaGS@u78.rosreestr.ru" && $_REQUEST["password"]=="F3OO86Y")   ||      /* Филиал ФГБУ "Федеральная кадастровая палата Федеральной службы государственной регистрации, кадастра и картографии» */
        ($_REQUEST["login"]=="virki@u78.rosreestr.ru" && $_REQUEST["password"]=="2Tt69ao")   ||      /* Филиал ФГБУ "Федеральная кадастровая палата Федеральной службы государственной регистрации, кадастра и картографии» */
        ($_REQUEST["login"]=="deordievaui@u78.rosreestr.ru" && $_REQUEST["password"]=="3VP2hH0")   ||      /* Филиал ФГБУ "Федеральная кадастровая палата Федеральной службы государственной регистрации, кадастра и картографии» */
        ($_REQUEST["login"]=="osipovaee@u78.rosreestr.ru" && $_REQUEST["password"]=="8B6K9OU")   ||      /* Филиал ФГБУ "Федеральная кадастровая палата Федеральной службы государственной регистрации, кадастра и картографии» */
        ($_REQUEST["login"]=="shiryevda@u78.rosreestr.ru" && $_REQUEST["password"]=="PLa129B")   ||      /* Филиал ФГБУ "Федеральная кадастровая палата Федеральной службы государственной регистрации, кадастра и картографии» */
        ($_REQUEST["login"]=="petuhov@ku.gov.spb.ru" && $_REQUEST["password"]=="TAMrvrB")     ||      /* Контрольное управление Администрации Губернатора Санкт-Петербурга  */
        ($_REQUEST["login"]=="zinchenko@ku.gov.spb.ru" && $_REQUEST["password"]=="mgVmT1u")   ||      /* Контрольное управление Администрации Губернатора Санкт-Петербурга  */
        ($_REQUEST["login"]=="bogomolov@ku.gov.spb.ru" && $_REQUEST["password"]=="NamCYfi")   ||      /* Контрольное управление Администрации Губернатора Санкт-Петербурга  */
        ($_REQUEST["login"]=="kofanova@ku.gov.spb.ru" && $_REQUEST["password"]=="PYGxU4N")    ||        /* Контрольное управление Администрации Губернатора Санкт-Петербурга  */
        ($_REQUEST["login"]=="kuzin_ye@gzhi.gov.spb.ru" && $_REQUEST["password"]=="MrVHdSn")    ||      /* Государственная жилищная инспекция Cанкт-Петербурга */
        ($_REQUEST["login"]=="vologa_yv@gzhi.gov.spb.ru" && $_REQUEST["password"]=="hic5odK")    ||      /* Государственная жилищная инспекция Cанкт-Петербурга */
        ($_REQUEST["login"]=="krikorovN@gzhi.gov.spb.ru" && $_REQUEST["password"]=="r1zETDa")    ||      /* Государственная жилищная инспекция Cанкт-Петербурга */
        ($_REQUEST["login"]=="gvozdev_DN@gzhi.gov.spb.ru" && $_REQUEST["password"]=="43XVW0p")    ||      /* Государственная жилищная инспекция Cанкт-Петербурга */
        ($_REQUEST["login"]=="viteev_am@gzhi.gov.spb.ru" && $_REQUEST["password"]=="fF0W0pE")   ||       /* Государственная жилищная инспекция Cанкт-Петербурга */
        ($_REQUEST["login"]=="a.gubarev@cppi.gov.spb.ru" && $_REQUEST["password"]=="OG4ZpMy")   ||       /* Комитет по промышленной политике и инновациям Санкт-Петербурга */
        ($_REQUEST["login"]=="a.radzinskaya@cppi.gov.spb.ru" && $_REQUEST["password"]=="p9WunM")   ||       /* Комитет по промышленной политике и инновациям Санкт-Петербурга */
        ($_REQUEST["login"]=="e.matsovkina@cppi.gov.spb.ru" && $_REQUEST["password"]=="2aRbfpX")   ||       /* Комитет по промышленной политике и инновациям Санкт-Петербурга */
        ($_REQUEST["login"]=="a.norkin@cppi.gov.spb.ru" && $_REQUEST["password"]=="KNGQepd")   ||       /* Комитет по промышленной политике и инновациям Санкт-Петербурга */
        ($_REQUEST["login"]=="e.kuznecova@cppi.gov.spb.ru " && $_REQUEST["password"]=="R1CVmCq")          /* Комитет по промышленной политике и инновациям Санкт-Петербурга */
      )
        $_SESSION["user"]["id"]=1;  //TODO: удалить после отладки     
}

/*----------------------------------------------------
 * @author          Lashkevich Anastasia <a.lashkevich@gmail.com>
 * @description     По просьбе начальника Службы Кулакова Леонида
 *                  для работников Службы снимается авторизация путем проверки внешнего IP ЛВС Службы
 * 
 *  --Начало--01.10.2015 17:39
 ----------------------------------------------------*/
if($_SERVER['REMOTE_ADDR']=="77.234.204.250" || 
    $_SERVER['HTTP_X_FORWARDED_FOR']=="77.234.204.250" ||
    $_SERVER['REMOTE_ADDR']=="83.68.45.1" ||
	//$_SERVER['REMOTE_ADDR']=="127.0.0.1" ||
    $_SERVER['HTTP_X_FORWARDED_FOR']=="83.68.45.1"
    )  
{
     $_SESSION["user"]["id"]=1;  //TODO: удалить после отладки  
}
/*------------------------------------------------------
 *  --Конец--01.10.2015 17:39
 -------------------------------------------------------*/

//пользователь не авторизован?
//да
if(intval($_SESSION["user"]["id"])<=0) 
{
    
    //снимаем флаг режима "Просмотр документов"
    $arResult["ModeDocumentViewing"]=FALSE;
    
    //ПОДКЛЮЧАЕМ ШАБЛОН
$this->IncludeComponentTemplate();
    
}
//нет, авторизован
else
{
    //устаналиваем флаг режима "Просмотр документов"
    $arResult["ModeDocumentViewing"]=TRUE;
     
    //УСТАНАВЛИВАЕМ НАЧАЛЬНЫЕ ЗНАЧЕНИЯ
    $sScript_path="./includes/";    //путь к модулям сайта относительно текущей папки (на уровень вверх)
    $arResult["ErrorText"]="";      //строка ошибок
    $sHostName="77.234.204.250";    //IP FTP-сервера
    $nPortNumber = 23456;           //номер порта FTP-сервера
    $nTimeOut = 120;                //таймаут для всех последующих сетевых операций (по умолчанию 90с)
    $sFtpUserName = "uis-site";     //логин FTP-пользователя
    $sFtpUserPass = "ts7TNlpNB6";   //пароль FTP-пользователя
    $bErrorNotExists = true;        //флаг отсутствия ошибок
    $sWSDLPath="http://77.234.204.251:18180/Service4SaitRazreshenieNaStroitelstvo.asmx?WSDL";           //путь к WSDL Службы
    $sWebServiceName="PackResolutionProject";                                                           //имя web-сервиса
    $sParamName="filter";                                                                               //наименование параметра soap-запроса
    $arSoapResponse = array();     //массив ранения результата ответа
    
    
    //УСТАНАВЛИВАЕТ ЗНАЧЕНИЕ php.ini - ОЖИДАНИЕ СОКЕТА
    ini_set("default_socket_timeout",120);  
    
    
    //УСТАНАВЛИВАЕМ НАИМЕНОВАНИЯ ПАРАМЕТРОВ СЕРВИСА
    $aParamsName = array(
            "PermitID"=>"PermitID"  //номер разрешения на строительство                        
        );
    
    if(!empty($_REQUEST["id"])) 
    {
    
    
    
        //ПОМЕЩАЕМ В РЕЗУЛЬТИРУЮЩИЙ МАССИВ НОМЕР РАЗРЕШЕНИЯ НА СТРОИТЕЛЬСТВО
        //$arResult["PermitID"]=$_REQUEST["id"];
		$arResult["PermitID"]=$_GET["id"];
        
        //ГОТОВИМ ПАРАМЕТРЫ ДЛЯ SOAP-ЗАПРОСА
        $arWebServiceParams = array(
        $sParamName => array(
            $aParamsName["PermitID"]=>$arResult["PermitID"]
            )
        );
        
       
        //СОЗДАЕМ SOAP-КЛИЕНТА ПО WSDL-ДОКУМЕНТУ
        $client = new SoapClient($sWSDLPath,array(
            "trace"      => 1,
            "exceptions" => 0));
       
        //ОТПРАВЛЯЕМ SOAP-ЗАПРОС
        $objSoapResponse  = $client->$sWebServiceName($arWebServiceParams);
       
        //ПРОИЗОШЛА ОШИБКА ПРИ ВЫЗОВЕ SOAP?
        if(is_soap_fault($objSoapResponse))
        //ДА 
        {
            $arResult["ErrorText"]="Извините, сервис временно недоступен! Пожалуйста, воспользуйтесь сервисом позднее.";
              
        }
        //НЕТ
        {
            $arSoapResponse = (array)$objSoapResponse;
            
            $i=0;      
            
            
              
            //ПОМЕЩАЕМ ДАННЫЕ SOAP-ОТВЕТА В $arResult
            if(is_array($arSoapResponse["return"]) && count($arSoapResponse["return"]>0))
            {
                //ПОЛУЧАЕМ ИЛИ МАССИВ ОБЪЕКТОВ В КАЧЕСТВЕ РЕЗУЛЬТАТА
                //массив оборабатывается только для исключения ошибки, т.к. должен быть толучен только один результат, а ,следовательно, объект     
                //возможно, что предыдущее утверждление неверно, когда несколько сканкопий, тогда должен быть массив 
                foreach($arSoapResponse["return"] as $objFileItem)
                {                   
                    $arResult["ResolutionProjectFiles"][$i]["errorCode"]=iconv('UTF-8','windows-1251',$objFileItem->errorCode);
                    $arResult["ResolutionProjectFiles"][$i]["linkID"]=iconv('UTF-8','windows-1251',$objFileItem->linkID);
                    $arResult["ResolutionProjectFiles"][$i]["fileSize"]=iconv('UTF-8','windows-1251',$objFileItem->fileSize);
                    $arResult["ResolutionProjectFiles"][$i]["fileFormat"]=iconv('UTF-8','windows-1251',$objFileItem->fileFormat);
                    $arResult["ResolutionProjectFiles"][$i]["loadLink"]=iconv('UTF-8','windows-1251',$objFileItem->loadLink);   //ссылка на файл сейчас не используется
                    $i++;
                }
            }
            else if(is_object($arSoapResponse["return"]))
            {
                //ИЛИ ОБЪЕКТ
                $arResult["ResolutionProjectFiles"][$i]["errorCode"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->errorCode);
                $arResult["ResolutionProjectFiles"][$i]["linkID"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->linkID);
                $arResult["ResolutionProjectFiles"][$i]["fileSize"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->fileSize);
                $arResult["ResolutionProjectFiles"][$i]["fileFormat"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->fileFormat);
                $arResult["ResolutionProjectFiles"][$i]["loadLink"]=iconv('UTF-8','windows-1251',$arSoapResponse["return"]->loadLink); //ссылка на файл сейчас не используется
            }
            else
            {
                $bErrorNotExists = $bErrorNotExists && false; 
                $arResult["ErrorText"]="Извините, не удалось найти сканированную копию разрешения! Пожалуйста, воспользуйтесь сервисом позднее.";
            }
           
        
            
            //НЕТ ОШИБОК ПРИ ПОЛУЧЕНИИ ФАЙЛА?
            if(!empty($arResult["ResolutionProjectFiles"]) && $arResult["ResolutionProjectFiles"][0]["errorCode"]==0)
            {
                $sLocalFileName = $arResult["ResolutionProjectFiles"][0]["linkID"].".".$arResult["ResolutionProjectFiles"][0]["fileFormat"];
                $sServerFileName = $arResult["ResolutionProjectFiles"][0]["linkID"]; //на сервере файлы хранятся без расширения
                $sLocalDirName =  "ResolutionProjectFiles"; //путь к директории пробуем менять
                
                //ЕСЛИ НЕ СУЩЕСТВУЕТ ДИРЕКТОРИЯ ДЛЯ ХРАНЕНИЯ ФАЙЛОВ СКАНИРОВАННЫХ КОПИЙ РАЗРЕШЕНИЙ НА СТРОИТЕЛЬСТВО, ТО СОЗДАЕМ ЕЕ?
                if(!is_dir($sLocalDirName)) mkdir($sLocalDirName);
                
                
                
                //ОТКРЫВАЕМ ФАЙЛ ДЛЯ ЗАПИСИ
                $handle = fopen($sLocalDirName."/".$sLocalFileName, 'w');
    
                if(flock($handle,LOCK_EX))
                {
                    //УСТАНАВЛИАЕМ СЕОДИНЕНИЕ С FTP-сервером
                    $nConnectionId = ftp_connect($sHostName,$nPortNumber,$nTimeOut);
                    //УДАЛОСЬ УСТАНОВИТЬ СОЕДИНЕНИЕ С FTP-СЕРВЕРОМ?
                    if($nConnectionId) 
                    //ДА
                    {
                        //ОСУЩЕСТВЛЯЕМ ВХОД НА FTP-СЕРВЕР С ЛОГИНОМ И ПАРОЛЕМ 
                        $bLoginResult = ftp_login($nConnectionId, $sFtpUserName, $sFtpUserPass);
                        
                        //ВКЛЮЧАЕМ ПАССИВНЫЙ РЕЖИМ РАБОТЫ FTP-СЕРВЕРА
                        ftp_pasv($nConnectionId, true);
                        
                        //УДАЛОСЬ ОСУЩЕСТВИТЬ ВХОД НА FTP-СЕРВЕР С ЛОГИНОМ И ПАРОЛЕМ
                        if($bLoginResult) 
                        {
                            /*----------------------------------------------------
                             * @author              lakhmostova irina <irina.lakhmostova@gmail.com>
                             * @description   меняем режим передачи файла т.к.
                                              "Аргумент mode, задающий режим пересылки файлов, 
                                              должен быть указан как константа FTP_BINARY или FTP_ASCII. 
                                              Режим FTP_ASCII используется для пересылки файлов, 
                                              состоящих только из ASCII-символов (т. е. текстовых файлов),
                                              а двоичный режим - для пересылки всех остальных файлов."
                                              
                             *  --Начало--18.07.2014 11:50
                             ----------------------------------------------------*/
                            //УДАЛОСЬ СКАЧАТЬ $server_file И СОХРАНИТЬ ЕГО в $local_file ?
                            //if(ftp_fget($nConnectionId, $handle, $sServerFileName,FTP_ASCII,0))
                            if(ftp_fget($nConnectionId, $handle, $sServerFileName,FTP_BINARY,0))
                            //ДА 
                            /*------------------------------------------------------
                             *  --Конец--18.07.2014 11:50
                             -------------------------------------------------------*/  
                            {
                                //Отправляем файл в поток. Будем передавать PDF
                               
                                $file=$sLocalDirName.'/'.$sLocalFileName;
                                
    
                                //СБРАСЫВАЕМ БУФЕР ВЫВОДА PHP, ЧТОБЫ ИЗБЕЖАТЬ ПЕРЕПОЛНЕНИЯ ПАМЯТИ ВЫДЕЛЕННОЙ ПОД СКРИПТ.  
                                //ЕСЛИ ЭТОГО НЕ СДЕЛАТЬ ФАЙЛ БУДЕТ ЧИТАТЬСЯ В ПАМЯТЬ ПОЛНОСТЬЮ!
                                
                                                    
                                if (ob_get_level()) {
                                  ob_end_clean();
                                }
                                //ЗАСТАВЛЯЕМ БРАУЗЕР ПОКАЗАТЬ ОКНО СОХРАНЕНИЯ ФАЙЛА
                                header('Content-Description: File Transfer');
                                /*header('Content-Type: application/octet-stream');
                                header("Content-Type: application/force-download");*/
                                header('Content-Type: application/pdf');
                                header('Content-Disposition: attachment; filename=' . basename($file));
                                header('Content-Transfer-Encoding: binary');
                                header('Expires: 0');
                                header('Cache-Control: must-revalidate');
                                header('Pragma: public');
                                header('Content-Length: ' . filesize($file));
                                //ЧИТАЕМ ФАЙЛ И ОТПРАВЛЯЕМ ЕГО ПОЛЬЗОВАТЕЛЮ
                                readfile($file);
                                
                                
                                
                                
                            }
                            //НЕТ 
                            else 
                            {
                                $bErrorNotExists = $bErrorNotExists && false;
                                $arResult["ErrorText"]="Извините! Не удалось получить доступ к файлу! Попробуйте, пожалуйста, позднее!";
                            }
                                
                        }
                        //НЕТ
                        else 
                        {
                            $bErrorNotExists = $bErrorNotExists && false;
                            $arResult["ErrorText"]= "Извините! Не удалось зайти на FTP-сервер! Попробуйте, пожалуйста, позднее!";
                        }
                        //ЗАКРЫВАЕМ FTP-СОЕДИНЕНИЕ
                        ftp_close($nConnectionId);
                    }
                    //НЕТ
                    else 
                    {
                        $bErrorNotExists = $bErrorNotExists && false;
                        $arResult["ErrorText"]= "Извините! Не удалось соединиться в FTP-сервером! Попробуйте, пожалуйста, позднее!";
                    }
                }
               
                //СНИМАЕМ БЛОКИРОВКУ ФАЙЛА
                flock($handle,LOCK_UN);
                //ЗАКРЫВАЕМ ФАЙЛ
                fclose($handle);
                //УДАЛЯЕМ С ХОСТИНГА ОТПРАВЛЕННЫЙ ПОЛЬЗОВАТЕЛЮ ДЛЯ ПРОСМОТРА ФАЙЛ
                /*----------------------------------------------------
                 * @author            Lashkevich Anastasia <a.lashkevich@gmail.com>
                 * @description   для отладки временно закомментируем удаление файла с сервера
                 * 
                 *  --Начало--16.07.2014 10:56
                 ----------------------------------------------------*/
                unlink($sLocalDirName."/".$sLocalFileName);
                /*------------------------------------------------------
                 *  --Конец--16.07.2014 10:56
                 -------------------------------------------------------*/  
                //header("Location: http://www.expertiza.spb.ru/?show=resolutionproject");
                die(); 
            }
        }
    
    }
    
    //ВОЗНИКЛИ ОШИБКИ
    if(!$bErrorNotExists)
    //ДА
    {
       
        //ПОДКЛЮЧАЕМ ШАБЛОН
		$this->IncludeComponentTemplate();
    } 
}
/*------------------------------------------------------
 *  --Конец--30.10.2014 07:34
 -------------------------------------------------------*/


?>
