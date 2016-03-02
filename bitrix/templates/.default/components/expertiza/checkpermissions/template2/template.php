<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script src="./bitrix/templates/created-in-alerio/Plugins/Reestry/easypaginate.js"></script>
<script src="script.js"></script>
<div id="JavaScriptIsMissing">
    <div class="Warning">
        <p>Для работы с сервисом необходимо включить поддержку JavaScript в вашем браузере.</p>
    </div>
</div>
<div id="JavaScriptIsPresent">
    <p style="color: red; font-weight: bold;"><!--Уважаемые пользователи сайта! Обращаем Ваше внимание, что сервис работает в тестовом режиме!--></p>
    <p><b>Уважаемые пользователи! В связи обновлением оборудования для работы электронного приложения "Проверь разрешение" возможно некорректное отображение информации. Приносим свои извинения.</b></p>
    <form id="ObjectsMapFilter" method="post">  
    
    <table class="fieldset" style="width: 1210px !important;">
    <colgroup width="130px"></colgroup><colgroup width="560px"></colgroup><colgroup width="30px"></colgroup><colgroup width="490px"></colgroup>
        <tr>
            <td colspan="2">
            <p><i>Задайте, пожалуйста, хотя бы один фильтр и нажмите кнопку &laquo;Применить&raquo;:</i></p>
            </td>
            <td>
            </td>
            
            <td rowspan="3">
                <p>
                <i>Если Вы обнаружили несоответствия или у Вас есть предложения <br>
                по работе сервиса, просим сообщить по электронной почте:  <a href="mailto:prover_razreshenie@gne.gov.spb.ru">prover_razreshenie@gne.gov.spb.ru</a></i>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                Название объекта:
            </td>
            <td>
                <input type="text" name="ObjectName" value="" class="text" id="ObjectName" autofocus="autofocus" placeholder="Введите название объекта">
            </td>
            <td>
                
            </td>
            
        </tr>
        <tr>
            <td>
                Застройщик:
            </td>
            <td>
                <input type="text" name="ObjectOrganizations" value="" class="text" id="ObjectOrganizations" placeholder="Введите наименование застройщика">
            </td>
            <td>
                
            </td>
            
        </tr>
        <tr>
            <td style="vertical-align: middle">
                Адрес:
            </td>
            <td style="vertical-align: middle">
                <input type="text" name="ObjectAddress" value="" class="text" id="ObjectAddress" placeholder="Введите адрес объекта строительства">
            </td>
            <td style="vertical-align: middle">
                <input type="submit" name="filter" value="Начать поиск" class="Button" >
            </td>
            
        </tr>
    </table>
    <input type="hidden" name="action" value="filter">
    
    </form>
	<!-- iframe src="http://testmap.alerio.ru/receive.html" id="Map" style="width:400px;height:100px"></iframe-->
    
    <?
/*----------------------------------------------------
 * @author          Lashkevich Anastasia <a.lashkevich@gmail.com>
 * @description     попросьбе Александра Куницина изменяем адрес приложения
 *                  Куницин Александр Владимирович начальник отдела ГИС, СПб ГУП «Санкт-Петербургский информационно-аналитический центр»,
 *  --Начало--26.01.2016 18:56
 ----------------------------------------------------*/ 
    
//    /*----------------------------------------------------
//    * @author          Lashkevich Anastasia <a.lashkevich@gmail.com>
//    * @description     попросьбе Александра Куницина изменяем адрес приложения
//    *                  Куницин Александр Владимирович начальник отдела ГИС, СПб ГУП «Санкт-Петербургский информационно-аналитический центр»,
//    *  --Начало--22.07.2015 11:30
//    ----------------------------------------------------*/ 
//    //   /*----------------------------------------------------
//    //    * @author          Lashkevich Anastasia <a.lashkevich@gmail.com>
//    //    * @description     попросьбе главного специалиста-программиста отдела геоинформационных систем, СПб ГУП «СПб ИАЦ» Тимонина Данила Александровича
//    //    *                  изменяем адрес фрейма, чтобы он был нацелен на ЦОД
//    //    * 
//    //    *  --Начало--22.07.2013 11:30
//    //    ----------------------------------------------------*/
//    //   ?>
    <!--<!--<!-- iframe src ="http://toris.iac.spb.ru/viewer/build_ctl" width="1215" height="1000" id="Map"></iframe--> 
    <!--<!-- iframe src ="http://gs.iac.spb.ru/viewer/build_ctl/" width="1215" height="1000" id="Map"></iframe-->
    <?
//    //    /*------------------------------------------------------
//    //     *  --Конец--29.01.2013 12:02
//    //     -------------------------------------------------------*/ 
?>
    <!--iframe src ="http://gis.iac.spb.ru/stroinadzor" width="1215" height="1000" id="Map"></iframe-->
<?   
//    /*------------------------------------------------------
//    *  --Конец--22.07.2015 11:30
//    -------------------------------------------------------*/ 
?>
    <iframe src ="http://gis.toris.kis.gov.spb.ru/stroinadzor" width="1215" height="1000" id="Map"></iframe>
<?   
/*------------------------------------------------------
 *  --Конец--26.01.2016 18:56
 -------------------------------------------------------*/ 
?>
    <!--div id="test">Пришли мне сообщение!</div-->
	</div>