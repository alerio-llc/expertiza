<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script src="./bitrix/templates/created-in-alerio/Plugins/Reestry/easypaginate.js"></script>
<script src="script.js"></script>


<div class="Form">
	                    <!-- Форма для страницы сервиса "Проверь разрешение" : --начало-- -->
	                    <div id="CheckPermissionForm">
	                        <div class="Container" id="JavaScriptIsPresent">
                                <p><i>Задайте, пожалуйста, хотя бы один фильтр и нажмите кнопку &laquo;Начать поиск&raquo;.</i></p>
                                <form id="ObjectsMapFilter" method="post">
                                    <label for="ObjectName">Название объекта: </label><br>
                                    <input id="ObjectName"  class="text" type="text" value="" name="ObjectName" placeholder="Введите название объекта" autofocus="autofocus"><br>
                                    <label for="ObjectAddress">Адрес: </label><br>
                                    <input type="text" id="ObjectAddress" class="text" placeholder="Введите адрес объекта строительства" value="" name="ObjectAddress"><br>
                                    <label for="ObjectOrganizations">Застройщик: </label><br>
                                    <input type="text" id="ObjectOrganizations" class="text" placeholder="Введите наименование застройщика" value="" name="ObjectOrganizations"><br>
                                    <input type="submit" class="Button" value="Начать поиск" name="filter">
                                    <input type="hidden" name="action" value="filter">
                                </form>
		                        <p><i>Если Вы обнаружили несоответствия или у Вас есть предложения по работе сервиса, просим сообщить по телефонам:<br>
		                            (812) 576-15-15,<br>
		                            (812) 576-15-91,<br>
                                    или электронной почте:<br>
                                    <a href="mailto:prover_razreshenie@gne.gov.spb.ru">prover_razreshenie@gne.gov.spb.ru</a></i>
                                </p>
                            </div>
                        </div>
                        <!-- Форма для страницы сервиса "Проверь разрешение" : --конец-- -->                                  
                        <a href="#" id="CollapseForm"></a>
                    </div>   
					<iframe src ="http://gis.toris.kis.gov.spb.ru/stroinadzor" id="Map"></iframe>
                                            
                                 
      
            
            
        
   
	
    <!--<iframe src ="http://gis.toris.kis.gov.spb.ru/stroinadzor" width="1215" height="1000" id="Map"></iframe>
	<iframe src="http://gis.iac.spb.ru/stroinadzor" id="Map"> </iframe> -->

	