<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script src="./bitrix/templates/created-in-alerio/Plugins/Reestry/easypaginate.js"></script>
<script src="script.js"></script>

<?
//выводим форму фильтров
?>
<!--<h1><?=$sTitle;?></h1>-->
<!-- p style="color:red;">Уважаемые посетители сайта! Обращаем ваше внимание, что выдача реестра работает в тестовом режиме!</p-->
<div class="Form">
                        
                        <!-- Форма для страницы сервиса "Реестр положительных заключений экспертизы проектной документации" : --начало-- --> 
                        <div id="PositiveConclusion">
                            <div class="Container">							  	                              					               
                              <form method="post" action="?<?=$_SERVER["QUERY_STRING"]?>" id="ReestrZakluchenieExpFilterForm">

<?


if($arResult["error"]!="") 
{
	echo "<p class=\"error\">".$arResult["error"]."</p>";
}

if($_REQUEST["action"]!="filter")
{
?>
	<p><i>Для просмотра реестра документов задайте, пожалуйста, хотя бы один фильтр и нажмите кнопку &laquo;Применить&raquo;:</i></p>
<?
}
else
{
	if(count($arResult["ResolutionProjectItems"])==0) echo "<p id=\"CountResult\"><i>По Вашему запросу документов не найдено.</i></p>";
	else echo "<p id=\"CountResult\"><i>Найдено документов: <b>".count($arResult["ResolutionProjectItems"])."</b></i></p>";
	echo "<p>Чтобы получить новые результаты, пожалуйста, измените значения фильтров и/или нажмите кнопку &laquo;Применить&raquo;.<br>Для получения реестра документов должен быть задан хотя бы один фильтр:</i></p>";
}
?>

 <label for="ObjectName">Наименование проекта строительства, прошедшего экспертизу:</label><br/>       
					                <input autofocus type="text" name="ObjectName" value="<?=$arResult["filter"]["ObjectName"];?>" placeholder="Введите название объекта строительства по проекту"  class="text" id="ObjectName">        
					                <label for="ObjectAddress">Адрес объекта:</label><br/>           
					                <input type="text" placeholder="Введите адрес объекта строительства" name="ObjectAddress" value="<?=$arResult["filter"]["ObjectAddress"];?>" class="text" id="ObjectAddress">          
					                <label for="ZastroychikName">Наименование застройщика:</label><br/>           
					                <input type="text" placeholder="Введите наименование затройщика" name="ZastroychikName" value="<?=$arResult["filter"]["ZastroychikName"];?>" class="text" id="ZastroychikName">
								    <table class="Fieldset">  
								        <tr>
								            <td><label for="DateFindFrom">Дата начала реестра:</label></td>
								            <td>
								                <input type="text" name="DateFindFrom" value="<?=$arResult["filter"]["DateFindFrom"];?>" class="text" id="DateFindFrom">
								            </td>
								            <td></td>
								            <td><label for="DateFindTo">Дата окончания реестра:</label></td>       
								            <td>
								                <input type="text" name="DateFindTo" value="<?=$arResult["filter"]["DateFindTo"];?>" class="text" id="DateFindTo">                       
								            </td>
								        </tr>
								    </table>
					                <input type="hidden" name="action" value="filter">
					                <input type="submit" name="filter" value="Применить" class="button">
	                            </form>
                            </div>
                        </div>
                        <!-- Форма для страницы сервиса "Реестр положительных заключений экспертизы проектной документации" : --конец-- -->                                   
                        <a href="#" id="CollapseForm"></a>
                    </div>
									
<?
if($_REQUEST["action"]=="filter" && $arResult["error"]=="")
{

	if(count($arResult["ResolutionProjectItems"])>0)
	{
		//выводим таблицу реестра
		echo "<div class=\"Container PositiveConclusion\" id=\"ReestrContainer\" ><table id=\"ReestrHeader\" >";
		//echo "<colgroup width=\"30px\"><colgroup width=\"102px\"><colgroup width=\"100px\"><colgroup width=\"380px\"><colgroup width=\"300px\"><colgroup width=\"300px\">";
		echo "<tr>
				<th>No п/п</th>
				<th>Реестровый номер</th>
				<th>Дата выдачи</th>
				<th>Наименование проекта строительства, прошедшего экспертизу</th>
				<th>Адрес</th>
				<th>Застройщик</th>
			</tr>
			</table>";	
	
		
		echo "<ul id=\"items\">";
		$i=0;
		foreach($arResult["ResolutionProjectItems"] as $arReestrItem)
		{
			$i++;
			echo "<li><table class=\"Reestr\" >
				<!--<colgroup width=\"30px\"><colgroup width=\"102px\"><colgroup width=\"100px\"><colgroup width=\"380px\"><colgroup width=\"300px\"><colgroup width=\"300px\">-->
				<tr>
					<td>$i</td>
					<td>$arReestrItem[PermitID]</td>
					<td>$arReestrItem[DateCreate]</td>
					<td>$arReestrItem[ObjectName]</td>
					<td>$arReestrItem[ObjectAddress]</td>
					<td>$arReestrItem[BuilderName]</td>
				</tr>
				</table>
				</li>
				";
		}
		echo "</ul></div>";
	}
	
}
?>
