<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script src="./bitrix/templates/created-in-alerio/Plugins/Reestry/easypaginate.js"></script>
<script src="script.js"></script>

<?
//выводим форму фильтров
?>
<!--h1><?=$sTitle;?></h1>-->
<!--p style="color:red;">Уважаемые посетители сайта! Обращаем ваше внимание, что выдача реестра работает в тестовом режиме!</p>
<p style="color:red;">Реестры за период с 2010 года до первой половины 2012 года временно недоступны. Приносим свои извинения.</p-->

<?

/*----------------------------------------------------
	 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
	 * @description 	Вывод ошибок переносим после выбора документов
	 * 						
	 * 
	 *  --Начало--18.09.2013 18:31
	 ----------------------------------------------------*/

//if($arResult["error"]!="") echo "<p style=\"color: red\">".$arResult["error"]."</p>";


/*  --Конец--18.09.2013 18:31
	 ----------------------------------------------------*/	
?>
<!--p style="color: red">Уважаемые пользователи сайта!</p>
<p style="color: red">В связи с проведением обновления функциональности сервиса выдача перечня документов реестра может быть неполной!</p-->
<div class="Form">
                        <!-- Форма для страницы сервиса "Реестр выданных разрешений на строительство" : --начало-- -->
                        <div id="ResolutionCommissioning">
                            <div class="Container">
<p><i>Для просмотра реестра документов задайте, пожалуйста, хотя бы один фильтр и нажмите кнопку &laquo;Применить&raquo;:</i></p>
<form method="post" action="?<?=$_SERVER["QUERY_STRING"]?>" id="ResolutionProjectFilterForm">
<!--<br>-->
<table id="DocumentType" class="Fieldset" >
   <tbody>
	<tr>
		<td colspan="2"><input type="checkbox" name="DocumentType[0]" id="DocumentType[0]" value="1" <?if(in_array("1",$arResult["DocumentType"])) echo "checked";?> ><label for="DocumentType[0]">Разрешение на строительство</label></td><td></td>
<?
/*----------------------------------------------------
	 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
	 * @description 	Не выводим документ "Разрешение на снос"
	 * 						
	 * 
	 *  --Начало--18.09.2013 13:40
	 ----------------------------------------------------*/
?>
		<!-- td><input type="checkbox" name="DocumentType[1]" id="DocumentType[1]" value="2"  <?if(in_array("2",$arResult["DocumentType"])) echo "checked";?> ></td><td><label for="DocumentType[1]" class="DocumentType">Разрешение на снос</label></td-->
<?
/*  --Конец--18.09.2013 13:40
	 ----------------------------------------------------*/	
?>
		<td colspan="2"><input type="checkbox" name="DocumentType[2]"  id="DocumentType[2]" value="3"  <?if(in_array("3",$arResult["DocumentType"])) echo "checked";?>><label for="DocumentType[2]">Уведомление об отказе</label></td><td></td>

	</tr>	
	<tbody>
</table>
<?


if($arResult["error"]!="") 
{
	echo "<p class=\"error\">".$arResult["error"]."</p>";
}

if($_REQUEST["action"]!="filter")
{
?>
	
<?
}
else
{
/*----------------------------------------------------
	 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
	 * @description	    Здесь выводим кол-во найденых документов  
	 * 						
	 * 
	 *  --Начало--18.09.2013 17:22
	 ----------------------------------------------------*/
	if(count($arResult["ResolutionProjectItems"])==0) echo "<p id=\"CountResult\"><i>По Вашему запросу документов не найдено.</i></p>";
	else echo "<p id=\"CountResult\"><i>Найдено документов: <b>".count($arResult["ResolutionProjectItems"])."</b></i></p>";
	echo "<p>Чтобы получить новые результы, пожалуйста, измените значения фильтров и/или нажмите кнопку &laquo;Применить&raquo;.<br>Для получения реестра документов должен быть задан хотя бы один фильтр:</i></p>";
/*  --Конец--18.09.2013 17:22
 ----------------------------------------------------*/
}
?>
<!-- h5>Фильтры реестра:</h5-->
<label for="ObjectName">Наименование проекта строительства, прошедшего экспертизу: </label><br>
                                    <input autofocus type="text" placeholder="Введите название объекта строительства по проекту" id="ObjectName" class="text" value="<?=$arResult["filter"]["ObjectName"];?>" name="ObjectName"><br>
                                    <label for="ObjectAddress">Адрес объекта: </label><br>
                                    <input type="text" id="ObjectAddress" placeholder="Введите адрес объекта строительства" class="text" value="<?=$arResult["filter"]["ObjectAddress"];?>" name="ObjectAddress"><br>
                                    <label for="ZastroychikName">Наименование застройщика: </label><br>
                                    <input type="text" id="ZastroychikName" class="text" placeholder="Введите наименование затройщика" value="<?=$arResult["filter"]["ZastroychikName"];?>" name="ZastroychikName"><br>
                                    <label for="ObjectAddressRajon">Район:</label>
                                    <input type="text" id="ObjectAddressRajon" placeholder="Введите район, где расположен объект строительства" class="text" value="<?=$arResult["filter"]["ObjectAddressRajon"];?>" name="ObjectAddressRajon">
                                    <table class="Fieldset">
	                              <table class="Fieldset">
	                                    <tr>
	                                        <td><label for="DateFindFrom">Дата начала реестра: </label></td>
	                                        <td><input type="text" id="DateFindFrom" class="text" value="<?=$arResult["filter"]["DateFindFrom"];?>" name="DateFindFrom"></td>
	                                        <td></td>
	                                        <td><label for="DateFindTo">Дата окончания реестра:</label></td>
	                                        <td><input type="text" id="DateFindTo" class="text" value="<?=$arResult["filter"]["DateFindTo"];?>" name="DateFindTo"></td>
	                                    </tr>
                                    </table>
	
		
		
		
		
		
			
	
	                                <input type="hidden" name="action" value="filter">
                                    <input type="submit" class="button" value="Применить" name="filter">
</form>
           </div>
       </div>
	   <a href="#" id="CollapseForm"><i></i></a>
</div>

<?

if($_REQUEST["action"]=="filter" && $arResult["error"]=="")
{


/*----------------------------------------------------
	 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
	 * @description	    Здесь выводим только таблицу реестра, только если документов >0, а кол-во найденых документов перенесено выше  
	 * 						
	 * 
	 *  --Начало--18.09.2013 17:22
	 ----------------------------------------------------*/

	/*----------------------------------------------------
		 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
		 * @description 	1. Добавляем количество найденных документов
		 * 					2. Выводим таблицу реестра, только если документов >0  
		 * 						
		 * 
		 *  --Начало--13.09.2013 12:22
		 ----------------------------------------------------*/
	
	
	
		//echo "<p><i>Найдено документов</i>: ".count($arResult["ResolutionProjectItems"])."</p>";
	
	if(count($arResult["ResolutionProjectItems"])>0)
	{


	/*  --Конец--13.09.2013 12:22
		 ----------------------------------------------------*/

/*  --Конец--18.09.2013 17:22
 ----------------------------------------------------*/	
	
	//выводим таблицу реестра
		echo "<div class=\"Container ResolutionCommissioning\" id=\"ReestrContainer\" ><table class=\"ReestrHeader\">";
	

/*----------------------------------------------------
	 * @author		Lashkevich Anastasia <a.lashkevich@gmail.com>
	 * @description 	1.Добавляем столбцы:
	 * 			1) Район
	 * 			
	 *  --Начало--03.06.2014 23:33
	 ----------------------------------------------------*/	
	
//	/*----------------------------------------------------
//		 * @author			Lashkevich Anastasia <a.lashkevich@gmail.com>
//		 * @description 	1.Добавляем столбцы:
//		 * 						1) Документ
//		 * 						2) Поднадзорность
//		 * 
//		 * 					2.Объединяем и переименовываем столбцы:
//		 * 						Объединяем "Номер разрешения на строительство" и "Дата выдачи разрешения на строительство" в "Номер документа, дата выдачи"
//		 
//		 * 
//		 *  --Начало--13.09.2013 12:22
//		 ----------------------------------------------------*/
//	//  echo "<colgroup width=\"20px\"><colgroup width=\"160px\"><colgroup width=\"180px\"><colgroup width=\"180px\"><colgroup width=\"140px\"><colgroup width=\"80px\">";	
//	//	echo "<tr>
//	//			<th>No п/п</th>
//	//			<th>Наименование застройщика-юридического лица</th>
//	//			<th>Адрес строительной площадки</th>
//	//			<th>Наименование объекта</th>
//	//			<th>Номер разрешения на строительство</th>
//	//			<th>Дата выдачи разрешения на строительство</th>
//	//		</tr>
//	//		</table>";	
//
//			echo "<colgroup width=\"30px\"><colgroup width=\"120px\"><colgroup width=\"150px\"><colgroup width=\"155px\"><colgroup width=\"100px\"><colgroup width=\"100px\"><colgroup width=\"102px\">";
//			echo "<tr>
//					<th>No п/п</th>
//					<th>Наименование застройщика-юридического лица</th>
//					<th>Адрес строительной площадки</th>
//					<th>Наименование объекта</th>
//					<th>Документ</th>
//					<th>Номер документа,<br>дата выдачи</th>
//					<th>Поднадзорность</th>
//				</tr>
//				</table>";	
//	
//	/*  --Конец--13.09.2013 12:22
//		 ----------------------------------------------------*/
//
//
			//echo "<colgroup width=\"30px\"><colgroup width=\"170px\"><colgroup width=\"250px\"><colgroup  width=\"260px\"><colgroup width=\"100px\"><colgroup width=\"130px\"><colgroup width=\"120px\"><colgroup width=\"150px\">";
			echo "<tr>
					<th>No п/п</th>
					<th>Наименование застройщика-юридического лица</th>
					<th>Адрес строительной площадки</th>
					<th>Наименование проекта строительства, прошедшего экспертизу</th>
					<th>Документ</th>
					<th>Номер документа,<br>дата выдачи</th>
					<th>Под-<br>надзорность</th>
					<th>Район</th>
				</tr>
				</table>";	
/*  --Конец--03.06.2014 23:33
	 ----------------------------------------------------*/

		
		echo "<ul id=\"items\">";
		$i=0;
		foreach($arResult["ResolutionProjectItems"] as $arReestrItem)
		{
			$i++;
/*----------------------------------------------------
 * @author      Lashkevich Anastasia <a.lashkevich@gmail.com>
 * @description     Добавлена ссылка на сканы разрешений
 *          
 *  --Начало--30.10.2014 07:25
 ----------------------------------------------------*/			
			
//    /*----------------------------------------------------
//     * @author      Lashkevich Anastasia <a.lashkevich@gmail.com>
//     * @description     Добавлена ссылка на сканы разрешений
//     *          
//     *  --Начало--03.06.2014 23:33
//     ----------------------------------------------------*/
    			
//    //  /*----------------------------------------------------
//    //  		 * @author		Lashkevich Anastasia <a.lashkevich@gmail.com>
//    //  		 * @description 	1.Добавляем столбцы:
//    //  		 * 			1) Район
//    //  		 * 			
//    //  		 *  --Начало--03.06.2014 23:33
//    //  		 ----------------------------------------------------*/
//    //  //	/*----------------------------------------------------
//    //  //		 * @author		Lashkevich Anastasia <a.lashkevich@gmail.com>
//    //  //		 * @description 	1.Добавляем столбцы:
//    //  //		 * 				1) Документ
//    //  //		 * 				2) Поднадзорность
//    //  //		 * 
//    //  //		 * 			2.Объединяем и переименовываем столбцы:
//    //  //		 * 			Объединяем "Номер разрешения на строительство" и "Дата выдачи разрешения на строительство" в "Номер документа, дата выдачи"
//    //  //		 * 
//    //  //		 *  --Начало--13.09.2013 12:22
//    //  //		 ----------------------------------------------------*/
//    //  //	//			echo "<li>
//    //  //	//				<table>
//    //  //	//				<colgroup width=\"20px\"><colgroup width=\"160px\"><colgroup width=\"180px\"><colgroup width=\"180px\"><colgroup width=\"140px\"><colgroup width=\"80px\">
//    //  //	//				<tr>
//    //  //	//					<td>$i</td>
//    //  //	//					<td>$arReestrItem[BuilderName]</td>
//    //  //	//					<td>$arReestrItem[ObjectAddress]</td>
//    //  //	//					<td>$arReestrItem[ObjectName]</td>
//    //  //	//					<td>$arReestrItem[PermitID]</td>
//    //  //	//					<td>$arReestrItem[DateCreate]</td>
//    //  //	//				</tr>
//    //  //	//				</table>
//    //  //	//				</li>
//    //  //	//				";
//    //  //			
//    //  //				echo "<li><table class=\"Reestr\" width=\"755px\">
//    //  //					<colgroup width=\"30px\"><colgroup width=\"120px\"><colgroup width=\"150px\"><colgroup width=\"155px\"><colgroup width=\"100px\"><colgroup width=\"100px\"><colgroup width=\"102px\">
//    //  //					<tr>
//    //  //						<td>$i</td>
//    //  //						<td>$arReestrItem[BuilderName]</td>
//    //  //						<td>$arReestrItem[ObjectAddress]</td>
//    //  //						<td>$arReestrItem[ObjectName]</td>
//    //  //						<td>$arReestrItem[NameDocument]</td>
//    //  //						<td>$arReestrItem[PermitID]<br>от $arReestrItem[DateCreate]</td>
//    //  //						<td>$arReestrItem[ObjectPodnadzoren]</td>
//    //  //					</tr>
//    //	//                  </table>
//    //  //					</li>
//    //  //					";
//    //  //	/*  --Конец--13.09.2013 12:22
//    //  //		 ----------------------------------------------------*/
//    //  
//    //  					echo "<li><table class=\"Reestr\" width=\"755px\">
//    //  						<colgroup width=\"30px\"><colgroup width=\"100px\"><colgroup width=\"125px\"><colgroup 	width=\"140px\"><colgroup width=\"100px\"><colgroup width=\"100px\"><colgroup width=\"80px\"><colgroup width=\"100px\">
//    //  					<tr>
//    //  						<td>$i</td>
//    //  						<td>$arReestrItem[BuilderName]</td>
//    //  						<td>$arReestrItem[ObjectAddress]</td>
//    //  						<td>$arReestrItem[ObjectName]</td>
//    //  						<td>$arReestrItem[NameDocument]</td>
//    //  						<td>$arReestrItem[PermitID]<br>от $arReestrItem[DateCreate]<br></td>
//    //  						<td>$arReestrItem[ObjectPodnadzoren]</td>
//    //  						<td>$arReestrItem[ObjectAddressRajon]</td>
//    //  					</tr>
//    //  					</table>
//    //  					</li>
//    //  					";
//    //  /*  --Конец--03.06.2014 23:33
//    //  	 ----------------------------------------------------*/
    
    			
//    /*----------------------------------------------------
//     * @author          Lashkevich Anastasia <a.lashkevich@gmail.com>
//     * @description     временно скрываем показ сканов от всех
//     * 
//     *  --Начало--01.08.2014 11:12
//     ----------------------------------------------------*/			
//    //                    /*if(
//    //                        $_SERVER['REMOTE_ADDR']=="77.234.204.250" || 
//    //                        $_SERVER['REMOTE_ADDR']=="83.68.45.1" ||
//    //                        $_SERVER['REMOTE_ADDR']=="127.0.0.1" ||  
//    //                        $_SERVER['HTTP_X_FORWARDED_FOR']=="77.234.204.250" || 
//    //                        $_SERVER['HTTP_X_FORWARDED_FOR']=="83.68.45.1" ||
//    //                        $_SERVER['HTTP_X_FORWARDED_FOR']=="127.0.0.1" )   //ограничение на вывод ссылки только определенным IP*
//    //			         if(
//    //                        $_SERVER['REMOTE_ADDR']=="77.234.204.250" || 
//    //                        $_SERVER['REMOTE_ADDR']=="83.68.45.1" ||
//    //                        $_SERVER['HTTP_X_FORWARDED_FOR']=="77.234.204.250" || 
//    //                        $_SERVER['HTTP_X_FORWARDED_FOR']=="83.68.45.1")   //ограничение на вывод ссылки только определенным IP  
//    //                    {
//    //                       echo "<li><table class=\"Reestr\" width=\"755px\">
//    //                                    <colgroup width=\"30px\"><colgroup width=\"100px\"><colgroup width=\"125px\"><colgroup  width=\"140px\"><colgroup width=\"100px\"><colgroup width=\"100px\"><colgroup width=\"80px\"><colgroup width=\"100px\">
//    //                                    <tr>
//    //                                        <td>$i</td>
//    //                                        <td>$arReestrItem[BuilderName]</td>
//    //                                        <td>$arReestrItem[ObjectAddress]</td>
//    //                                        <td>$arReestrItem[ObjectName]</td>
//    //                                        <td>$arReestrItem[NameDocument]</td>
//    //                                        <td><a href=\"http://$_SERVER[SERVER_NAME]/?show=resolutionproject&id=$arReestrItem[PermitID]\">$arReestrItem[PermitID]<br>от $arReestrItem[DateCreate]</a></td>
//    //                                        <td>$arReestrItem[ObjectPodnadzoren]</td>
//    //                                        <td>$arReestrItem[ObjectAddressRajon]</td>
//    //                                    </tr>
//    //                                </table>
//    //                            </li>
//    //                        ";                    
//    //                    }
//    //                    else
//    /*------------------------------------------------------
//     *  --Конец--01.08.2014 11:12
//     -------------------------------------------------------*/                    
//                        {
//                            echo "<li><table class=\"Reestr\" width=\"755px\">
//                                        <colgroup width=\"30px\"><colgroup width=\"100px\"><colgroup width=\"125px\"><colgroup  width=\"140px\"><colgroup width=\"100px\"><colgroup width=\"100px\"><colgroup width=\"80px\"><colgroup width=\"100px\">
//                                        <tr>
//                                            <td>$i</td>
//                                            <td>$arReestrItem[BuilderName]</td>
//                                            <td>$arReestrItem[ObjectAddress]</td>
//                                            <td>$arReestrItem[ObjectName]</td>
//                                            <td>$arReestrItem[NameDocument]</td>
//                                            <td>$arReestrItem[PermitID]<br>от $arReestrItem[DateCreate]</td>
//                                            <td>$arReestrItem[ObjectPodnadzoren]</td>
//                                            <td>$arReestrItem[ObjectAddressRajon]</td>
//                                        </tr>
//                                    </table>
//                                </li>
//                            ";
//                        }
//                        
//    /*  --Конец--03.06.2014 23:33
//         ----------------------------------------------------*/
		  {
            echo "<li><table class=\"Reestr\">
                        <!--<colgroup width=\"30px\"><colgroup width=\"170px\"><colgroup width=\"250px\"><colgroup  width=\"260px\"><colgroup width=\"100px\"><colgroup width=\"130px\"><colgroup width=\"120px\"><colgroup width=\"150px\">-->
                        <tr>
                            <td>$i</td>
                            <td>$arReestrItem[BuilderName]</td>
                            <td>$arReestrItem[ObjectAddress]</td>
                            <td>$arReestrItem[ObjectName]</td>
                            <td>$arReestrItem[NameDocument]</td>
							<td><a href=\"$arParams[BLOCK_URL]/?id=$arReestrItem[PermitID]\">$arReestrItem[PermitID]<br>от $arReestrItem[DateCreate]</a></td>
							<!--<td><a href=\"http://$_SERVER[SERVER_NAME]/?show=resolutioncommissioning&id=$arReestrItem[PermitID]\">$arReestrItem[PermitID]<br>от $arReestrItem[DateCreate]</a></td>-->
                            <!--<td><a href=\"http://$_SERVER[SERVER_NAME]/?show=resolutionproject&id=$arReestrItem[PermitID]\">$arReestrItem[PermitID]<br>от $arReestrItem[DateCreate]</a></td>-->
                            <td>$arReestrItem[ObjectPodnadzoren]</td>
                            <td>$arReestrItem[ObjectAddressRajon]</td>
                        </tr>
                    </table>
                </li>
                ";
            }	
					
/*  --Конец--30.10.2014 07:14
     ----------------------------------------------------*/					
		}
		echo "</ul></div>";
	}
	
}
?>
