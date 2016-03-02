 <?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html>
<head>
<? 
$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone"); 
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android"); 
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS"); 
$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry"); 
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod"); 
$mobile = strpos($_SERVER['HTTP_USER_AGENT'],"Mobile"); 
$symb = strpos($_SERVER['HTTP_USER_AGENT'],"Symbian"); 
$operam = strpos($_SERVER['HTTP_USER_AGENT'],"Opera M"); 
$htc = strpos($_SERVER['HTTP_USER_AGENT'],"HTC_"); 
$fennec = strpos($_SERVER['HTTP_USER_AGENT'],"Fennec/"); 
$winphone = strpos($_SERVER['HTTP_USER_AGENT'],"WindowsPhone"); 
$wp7 = strpos($_SERVER['HTTP_USER_AGENT'],"WP7"); 
$wp8 = strpos($_SERVER['HTTP_USER_AGENT'],"WP8"); 


$VISITOR_ID = $APPLICATION->get_cookie("MOBILE_VISITOR_MB"); 
if ($ipad || $iphone || $android || $palmpre || $ipod || $berry || $mobile || $symb || $operam || $htc || $fennec || $winphone || $wp7 || $wp8) {
	//if (!preg_match("/^http:\/\/(www\.)?expertiza\.spb\.ru.*/", $_SERVER["HTTP_REFERER"]))
	if (!preg_match("/^http:\/\/(www\.)?expertiza.*/", $_SERVER["HTTP_REFERER"]))
    {
        header("Location: http://expertiza/m/");
        exit;
    }
}
?>
<?$APPLICATION->ShowHead();?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><? $APPLICATION->ShowTitle();?></title>
    <!--<meta name="Description" content="">-->
    <!--<meta name="Keywords" content="">-->
    <!--<meta http-equiv="pragma" content="no-cache">-->
    <meta name="Author" content="Компания Алерио">
    <meta name="Reply-to" content="info@alerio.ru">
    <meta name="Address" content="Санкт-Петербург, пр.Стачек, д.47, лит.А, офис 313. Тел.: 680 07 64">
    <link href="<?=SITE_TEMPLATE_PATH?>/template_styles.css" rel="stylesheet" type="text/css">
    <!-- Виджет начало -->
    <script type="text/javascript" src="http://esir.gov.spb.ru/static/widget/js/widget.js" charset="utf-8"></script>
    <!-- Виджет конец -->

    <!-- Подключение JS-библиотек : --начало-- -->
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/JSLibraries/jquery.cycle.all.js"></script>
 <?
      CJSCore::Init(array("jquery"));
 ?>
    <!-- Подключение JS-библиотек : --конец-- -->

    <!-- Подключение CSS и скриптов компонентов : --начало-- -->
    <link href="<?=SITE_TEMPLATE_PATH?>/GeneralNav/style.css" rel="stylesheet" type="text/css">
    <!-- AdditionalNav -->
    <link href="<?=SITE_TEMPLATE_PATH?>/AdditionalNav/style.css" rel="stylesheet" type="text/css">
    <!-- News -->
    <link href="<?=SITE_TEMPLATE_PATH?>/News/style.css" rel="stylesheet" type="text/css">
    <link href="<?=SITE_TEMPLATE_PATH?>/SubNav/style.css" rel="stylesheet" type="text/css">
    <!-- Massmedia -->
    <link href="<?=SITE_TEMPLATE_PATH?>/Massmedia/style.css" rel="stylesheet" type="text/css">
    <!-- ThirdLevelMenu -->
    <link href="<?=SITE_TEMPLATE_PATH?>/ThirdLevelMenu/style.css" rel="stylesheet" type="text/css">
    <!-- Подключение CSS компонентов : --конец-- -->

    <!-- Подключение JS-плагинов и их CSS : --начало-- -->
        <!-- Slider -->
        <link href="<?=SITE_TEMPLATE_PATH?>/Plugins/Slider/Slider.css" rel="stylesheet" type="text/css">
        <script src="<?=SITE_TEMPLATE_PATH?>/Plugins/Slider/Slider.js" type="text/javascript"></script>
        <!-- TinyScrollbar -->
        <link href="<?=SITE_TEMPLATE_PATH?>/Plugins/TinyScrollbar/tinyscrollbar.css" rel="stylesheet" type="text/css">
        <script src="<?=SITE_TEMPLATE_PATH?>/Plugins/TinyScrollbar/jquery.tinyscrollbar.min.js" type="text/javascript"></script>
    <!-- Подключение JS-плагинов и их CSS : --начало-- -->

    <!-- Подключение JS-скриптов: --конец-- -->

        <!-- RealTimer -->
        <link href="<?=SITE_TEMPLATE_PATH?>/Scripts/RealTimer/RealTimer.css" rel="stylesheet" type="text/css">
        <script src="<?=SITE_TEMPLATE_PATH?>/Scripts/RealTimer/RealTimer.js" type="text/javascript"></script>
        <!-- TagLine -->
        <link href="<?=SITE_TEMPLATE_PATH?>/Scripts/TagLine/TagLine.css" rel="stylesheet" type="text/css">
        <script src="<?=SITE_TEMPLATE_PATH?>/Scripts/TagLine/TagLine.js" type="text/javascript"></script>
        <!-- Slider -->
        <link href="<?=SITE_TEMPLATE_PATH?>/Scripts/Slider/SliderCustomized.css" rel="stylesheet" type="text/css">
        <!-- TinyScrollbar -->
        <link href="<?=SITE_TEMPLATE_PATH?>/Scripts/TinyScrollbar/TinyScrollbarCusomized.css" rel="stylesheet" type="text/css">
        <script src="<?=SITE_TEMPLATE_PATH?>/Scripts/TinyScrollbar/script.js" type="text/javascript"></script>
    <!-- Подключение JS-скриптов: --конец-- -->
    <link rel="icon" href="<?=SITE_TEMPLATE_PATH?>/Images/favicon.ico">
</head>
<body>
<?$APPLICATION->ShowPanel();?>

    <div class="PseudoBody">
        <!-- Обертка : --начало-- -->
                <div id="Wrapper">
            <!-- Шапка : --начало-- -->
            <div id="Header">
                <div id="Branding" style="">
                    <p id="Symbol" class="FloatLeft"><a href="http://<?=$_SERVER["SERVER_NAME"]?>/index.php" title="на главную"><img src="<?=SITE_TEMPLATE_PATH?>/Images/Symbol.png"></a></p>
                    <h1 id="Logo" class="FloatLeft">Служба государственного строительного надзора<br>и экспертизы Санкт-Петербурга</h1>
                    <div id="TagLine" class="FloatLeft" >
                        <h2 style="display: block">Государственная экспертиза проектов и инженерных изысканий</h2>
                        <h2>Выдача разрешений на строительство и реконструкцию</h2>
                        <h2>Выдача разрешений на капитальный ремонт автомобильных дорог общего пользования</h2>
                        <h2>Государственный строительный надзор с выдачей заключений о соответствии</h2>
                        <h2>Выдача разрешений на ввод объектов в эксплуатацию</h2>
                        <h2>Рассмотрение административных дел</h2>
                    </div>
                </div>
                <!-- Верхняя панель : --начало-- -->
                <div id="TopBar">
                    <div id="RealTimer">3 февраля 2016, среда</div>
                    <div id="ControlButtons">
                        <p>
                        <a href="http://<?=$_SERVER["SERVER_NAME"]?>/index.php"><img src="<?=SITE_TEMPLATE_PATH?>/Images/iconHome.png"></a>
                        <a href="http://<?=$_SERVER["SERVER_NAME"]?>/m/index.php"><img src="<?=SITE_TEMPLATE_PATH?>/Images/iconMobile.png"></a>
                        <a href="javascript:window.print()" title="Печать"><img src="<?=SITE_TEMPLATE_PATH?>/Images/iconPrint.png"></a>
                        <a href="http://<?=$_SERVER["SERVER_NAME"]?>/rss.php" title="RSS"><img src="<?=SITE_TEMPLATE_PATH?>/Images/iconRSS.png"></a>
                        <a href="http://<?=$_SERVER["SERVER_NAME"]?>/poisk.php"><img src="<?=SITE_TEMPLATE_PATH?>/Images/iconSearch.png"></a>
                        </p>
                    </div>
                     <div id="Metcast">
                        <?$APPLICATION->IncludeFile(
			SITE_DIR."bitrix/php_interface/getweather.php",
			Array(),
			Array("MODE"=>"html")
			);
			?>
                    </div>
                 <!--   <div id="Metcast"><img src="http://img.gismeteo.ru/images/icons/new/d.sun.c3.png" ><font size="4">-1..1 С</font>, 735..737 мм рт.ст.</div>-->
                </div>
                <!-- Верхняя панель : --конец-- -->
            </div>

<?/* Если мы находимся на главной */?> 
<? if ($APPLICATION->GetCurPage(false) === '/'): ?> 

            <!-- Шапка : --конец-- -->
                        <!-- Слайдер : --начало-- -->

            <div id="slider-wrap">
                <div id="slider">
                    <div class="slide"><img src="<?=SITE_TEMPLATE_PATH?>/Img/Slide1.png"></div>
                    <div class="slide"><img src="<?=SITE_TEMPLATE_PATH?>/Img/Slide2.png"></div>
                    <div class="slide"><img src="<?=SITE_TEMPLATE_PATH?>/Img/Slide3.png"></div>
                    <div class="slide"><img src="<?=SITE_TEMPLATE_PATH?>/Img/Slide4.png"></div>
                    <div class="slide"><img src="<?=SITE_TEMPLATE_PATH?>/Img/Slide5.png"></div>
                </div>
                <div id="CheckPermissionsTitleBG"></div>
                <h1 id="CheckPermissionsTitle"><a href="checkpermissions">Электронный сервис <span>&laquo;Проверь разрешение&raquo;</span></a></h1>
                <a href="checkpermissions" id="Button">Начать работу</a>
            </div>
            <!-- Слайдер : --конец-- -->

<? endif; ?> <!--заканчиваем проверку нахождения на главной странице-->
                                    <!-- Дополнительное меню : --начало-- -->
<?
$page = $APPLICATION->GetCurPage(); //определяем директорию страницы
$findme   = 'reestry'; //директория реестров
$pos = strpos($page, $findme); //проверяем, лежит ли данный файл в директории реестров.
if (($APPLICATION->GetCurPage(false) === '/') or($pos === 1)): ?> <!--если главная страница или страница реестров-->								
 <?$APPLICATION->IncludeComponent("bitrix:menu", "blue_tabs1", Array(
    "ROOT_MENU_TYPE" => "top",  // Тип меню для первого уровня
    "MENU_CACHE_TYPE" => "N",   // Тип кеширования
    "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
    "MENU_CACHE_USE_GROUPS" => "Y", // Учитывать права доступа
    "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
    "MAX_LEVEL" => "1", // Уровень вложенности меню
    "CHILD_MENU_TYPE" => "left",    // Тип меню для остальных уровней
    "USE_EXT" => "N",   // Подключать файлы с именами вида .тип_меню.menu_ext.php
    "DELAY" => "N", // Откладывать выполнение шаблона меню
    "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
    ),
    false
);?>
<? endif; ?>


            <div id="Content">
                <!-- Главное меню : --начало-- -->
 <?$APPLICATION->IncludeComponent("bitrix:menu", "additionalnav", Array(
    "ROOT_MENU_TYPE" => "left", // Тип меню для первого уровня
    "MENU_CACHE_TYPE" => "N",   // Тип кеширования
    "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
    "MENU_CACHE_USE_GROUPS" => "Y", // Учитывать права доступа
    "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
    "MAX_LEVEL" => "1", // Уровень вложенности меню
    "CHILD_MENU_TYPE" => "left",    // Тип меню для остальных уровней
    "USE_EXT" => "N",   // Подключать файлы с именами вида .тип_меню.menu_ext.php
    "DELAY" => "N", // Откладывать выполнение шаблона меню
    "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
    ),
    false
);?>
                <!-- Главное меню главной страницы : --конец-- -->
                                                                <!-- Содержимое страницы главной страницы : --конец-- -->
            <!-- Основная часть страницы главной страницы: --конец-- -->
        <!-- Обертка главной страницы : --конец-- -->        <!-- Нижняя панель главной страницы : --конец-- -->




<?/* Если мы НЕ находимся на главной и НЕ на странице реестров*/ ?> 

<? if ($APPLICATION->GetCurPage(false) !== '/' && !CSite::InDir('/checkpermissions.php')): ?>
<?
if ($pos === false): ?>

                <!-- Главное меню : --начало-- -->
                <!-- Главное меню : --конец-- -->
                <!-- Левая боковая панель : --начало-- -->
				
                <div id="LeftSidebar">
 <?
 $APPLICATION->IncludeComponent("bitrix:menu", "SectionNav", array(
    "ROOT_MENU_TYPE" => "sectionnav",
    "MENU_CACHE_TYPE" => "N",
    "MENU_CACHE_TIME" => "3600",
    "MENU_CACHE_USE_GROUPS" => "Y",
    "MENU_CACHE_GET_VARS" => array(
    ),
    "MAX_LEVEL" => "2",
    "CHILD_MENU_TYPE" => "subnav",
    "USE_EXT" => "N",
    "DELAY" => "N",
    "ALLOW_MULTI_SELECT" => "N"
    ),
    false
);?>               
                </div>
                <!-- Левая боковая панель : --конец-- -->
                <!-- Правая боковая панель : --начало-- -->
                <div id="RightSidebar">
                    <h3><a href="http://www.expertiza.spb.ru?show=statics&amp;id=229" style="text-decoration: none"><img src="http://www.expertiza.spb.ru/Styles/Images/iconAddress.png" style="vertical-align: top"> Схема проезда</a></h3><h3>
                    </h3><h6>Главный корпус:</h6>
                    <p>191023, Санкт-Петербург,<br>ул. Зодчего Росси, 1/3</p>
                    <h6>Канцелярия:</h6>
                    <p>Телефон:576-15-12,<br>факс: 576-15-13,<br>кабинет: 101 </p>
                    <h6>Дежурный телефон Службы:</h6>
                    <p>571-72-47 - в выходные, праздничные дни и нерабочее время (с 18.00 до 09.00)</p>
                    <p><a href="mailto:gne@gov.spb.ru">gne@gov.spb.ru</a></p>
                    <p><br><br>По всем техническим вопросам, связанным с работой официального сайта Службы, просим обращаться по электронной почте: <a href="mailto:techsupport@gne.gov.spb.ru">techsupport@gne.gov.spb.ru</a>.</p>
                    <img src="http://www.expertiza.spb.ru/Styles/Images/QRCode.png">
                </div>
                <? endif; ?>
                <!-- Правая боковая панель : --конец-- -->
<?php endif ?>
                <div id="MainContent" style="<? if ($APPLICATION->GetCurPage(false) === '/') {echo 'display:none';}?>">
                    <!-- Здесь выводим контент страницы : --начало-- -->

<?/* Если мы НЕ находимся на главной */?> 
<? if (($APPLICATION->GetCurPage(false) !== '/') and ($pos === false)): ?>
<h1><?$APPLICATION->ShowTitle(false);?></h1>
        <? endif; ?>
<?if (($APPLICATION->GetCurPage(false) === '/') or ($pos === 1)): ?> <!-- Если мы находимся НЕ на главной и на странице реестров то делаем отступ у TITLE-->
<div style="padding-left:20px;padding-top:20px;"><h1><?$APPLICATION->ShowTitle(false);?></h1></div>
        <? endif; ?>
