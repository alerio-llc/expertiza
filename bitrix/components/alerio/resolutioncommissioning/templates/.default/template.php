<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script src="./bitrix/templates/created-in-alerio/Plugins/Reestry/easypaginate.js"></script>
<script src="script.js"></script>
<?
//выводим форму фильтров
?>
<!--<h1><?=$sTitle;?></h1>-->
<!-- p style="color:red;">Уважаемые посетители сайта! Обращаем ваше внимание, что выдача реестра работает в тестовом режиме!</p>
<p style="color:red;">Реестры за период с 2010 года до первой половины 2012 года временно недоступны. Приносим свои извинения.</p-->
<!-- p style="color: red">Уважаемые пользователи сайта!</p>
<p style="color: red">В связи с проведением обновления функциональности сервис может быть временно не доступен!</p-->
<h4>Фильтры реестра:</h4>
<?
if($arResult["error"]!="") echo "<p style=\"color: red\">".$arResult["error"]."</p>";
?>

<form method="post" action="?<?=$_SERVER["QUERY_STRING"]?>">
	<table class="fieldset">
		<tr>
			<td>
				Наименование объекта:
			</td>
			<td colspan="3">
				<input type="text" name="ObjectName" value="<?=$arResult["filter"]["ObjectName"];?>" class="text">
			</td>
		</tr>
		<tr>
			<td>
				Адрес объекта:
			</td>
			<td colspan="3">
				<input type="text" name="ObjectAddress" value="<?=$arResult["filter"]["ObjectAddress"];?>" class="text">
			</td>
		</tr>
		<tr>
			<td>
				Наименование застройщика:
			</td>
			<td colspan="3">
				<input type="text" name="ZastroychikName" value="<?=$arResult["filter"]["ZastroychikName"];?>" class="text">
			</td>
		</tr>
<?		
/*----------------------------------------------------
 * @author		Lashkevich Anastasia <a.lashkevich@gmail.com>
 * @description 	1.Добавляем столбцы:
 * 			1) Район
 * 			
 *  --Начало--17.10.2014 08:24
  ----------------------------------------------------*/			
?>		
		<tr>
			<td>
				Район:
			</td>
			<td colspan="3">
				<input type="text" name="ObjectAddressRajon" value="<?=$arResult["filter"]["ObjectAddressRajon"];?>" class="text">
			</td>
		</tr>				
<?
/*  --Конец--17.10.2014 08:24
 ----------------------------------------------------*/	
?>		
		<tr>
			<td>Дата начала реестра:</td>
			<td>
				<input type="text" name="DateFindFrom" value="<?=$arResult["filter"]["DateFindFrom"];?>" class="text" id="DateFindFrom">
			</td>
			<td style="text-align:right">Дата окончания реестра:</td>		
			<td>
				<input type="text" name="DateFindTo" value="<?=$arResult["filter"]["DateFindTo"];?>" class="text" id="DateFindTo">						
			</td>
		</tr>
		
	</table>
	<input type="hidden" name="action" value="filter">
	<input type="submit" name="filter" value="Применить" class="button">
</form>
<br>
<?

if($arResult["error"]=="")
{

	//выводим таблицу реестра
	echo "<table class=\"ReestrHeader\">";

/*----------------------------------------------------
 * @author		Lashkevich Anastasia <a.lashkevich@gmail.com>
 * @description 	1.Добавляем столбцы:
 * 			1) Район
 * 			
 *  --Начало--17.10.2014 08:24
  ----------------------------------------------------*/	
//	echo "<colgroup width=\"20px\"><colgroup width=\"200px\"><colgroup width=\"120px\"><colgroup width=\"220px\"><colgroup width=\"190px\">";
//	echo "<tr>
//			<th>No п/п</th>
//			<th>Строительный / милицейский адрес объекта</th>
//			<th>Номер разрешения</th>
//			<th>Застройщик</th>
//			<th>Наименование объекта</th>
//		</tr>
//	</table>";	


	echo "<colgroup width=\"30px\"><colgroup width=\"330px\"><colgroup width=\"190px\"><colgroup width=\"190px\"><colgroup width=\"330px\"><colgroup width=\"150px\">";
	echo "<tr>
			<th>No п/п</th>
			<th>Строительный / милицейский адрес объекта</th>
			<th>Номер разрешения</th>
			<th>Застройщик</th>
			<th>Наименование объекта</th>
			<th>Район</th>
		</tr>
	</table>";	

/*  --Конец--17.10.2014 08:24
 ----------------------------------------------------*/	
	
	if(count($arResult["ResolutionProjectItems"])>0)
	{	
		echo "<ul id=\"items\">";
		$i=0;
		foreach($arResult["ResolutionProjectItems"] as $arReestrItem)
		{
			$i++;
			
			
/*----------------------------------------------------
 * @author		Lashkevich Anastasia <a.lashkevich@gmail.com>
 * @description 	1.Добавляем столбцы:
 * 			1) Район
 * 			
 *  --Начало--17.10.2014 08:24
  ----------------------------------------------------*/				
//			echo "<li>
//				<table>
//				<colgroup width=\"20px\"><colgroup width=\"200px\"><colgroup width=\"120px\"><colgroup width=\"220px\"><colgroup width=\"190px\">
//				<tr>
//					<td>$i</td>
//					<td>$arReestrItem[ObjectAddress]</td>
//					<td>$arReestrItem[PermitID]<br>от $arReestrItem[DateCreate]</td>
//					<td>$arReestrItem[BuilderName]</td>
//					<td>$arReestrItem[ObjectName]</td>
//				</tr>
//				</table>
//				</li>
//				";
				
				
global $USER;
//if ($USER->IsAuthorized()){ echo "Вы авторизованы!";}else{echo "Вы не авторизированы";}

				
				echo "<li>
				<table class=\"Reestr\">
				<colgroup width=\"30px\"><colgroup width=\"330px\"><colgroup width=\"190px\"><colgroup width=\"190px\"><colgroup width=\"330px\"><colgroup width=\"150px\">
				<tr>
					<td>$i</td>
					<td>$arReestrItem[ObjectAddress]</td>
		            <td><a href=\"$arParams[BLOCK_URL]/?id=$arReestrItem[PermitID] \">$arReestrItem[PermitID]<br>от $arReestrItem[DateCreate]</a></td>
					<!--<td><a href=\"reestr-razresheniy-na-vvod-obektov-download.php/?id=$arReestrItem[PermitID]\">$arReestrItem[PermitID]<br>от $arReestrItem[DateCreate]</a></td>-->
					<!--<td><a href=\"http://$_SERVER[SERVER_NAME]/?show=resolutioncommissioning&id=$arReestrItem[PermitID]\">$arReestrItem[PermitID]<br>от $arReestrItem[DateCreate]</a></td>-->
					<td>$arReestrItem[BuilderName]</td>
					<td>$arReestrItem[ObjectName]</td>
					<td>$arReestrItem[ObjectAddressRajon]</td>
				</tr>
				</table>
				</li>
				";
/*  --Конец--17.10.2014 08:24
 ----------------------------------------------------*/				
		}
		echo "</ul>";
	}
	
}
?>