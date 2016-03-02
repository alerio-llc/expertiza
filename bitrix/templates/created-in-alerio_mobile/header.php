 <?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html>
<head>

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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <!-- Виджет начало -->
    <script type="text/javascript" src="http://esir.gov.spb.ru/static/widget/js/widget.js" charset="utf-8"></script>
    <!-- Виджет конец -->

    <!-- Подключение JS-библиотек : --начало-- -->
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/JSLibraries/DatePickerRussianInitialisation.js"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/JSLibraries/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
 <?
      CJSCore::Init(array("jquery"));
 ?>
    <!-- Подключение JS-библиотек : --конец-- -->

    <!-- Подключение CSS и скриптов компонентов : --начало-- -->
    
    <!-- AdditionalNav -->
   
    <!-- News -->
    <link href="<?=SITE_TEMPLATE_PATH?>/News/style.css" rel="stylesheet" type="text/css">   
    <link href="<?=SITE_TEMPLATE_PATH?>/JSLibraries/jquery-ui-customize.css" rel="stylesheet" type="text/css">    
    <!-- Подключение CSS компонентов : --конец-- -->

    <!-- Подключение JS-плагинов и их CSS : --начало-- -->
        <!--Easy paginate -->
        <link href="<?=SITE_TEMPLATE_PATH?>/Plugins/EasyPaginate/easyPaginate.css" rel="stylesheet" type="text/css">
        <script src="<?=SITE_TEMPLATE_PATH?>/Plugins/EasyPaginate/jquery.easyPaginate.js" type="text/javascript"></script>       
    <!-- Подключение JS-плагинов и их CSS : --начало-- -->

    <!-- Подключение JS-скриптов: --конец-- -->

        <!--Easy paginate -->        
        <script src="<?=SITE_TEMPLATE_PATH?>/Scripts/EasyPaginate/script.js" type="text/javascript"></script>
        <!-- ValidationCheckPermitionFilterForm -->        
        <script src="<?=SITE_TEMPLATE_PATH?>/Scripts/ValidationCheckPermitionFilterForm/script.js" type="text/javascript"></script>
        <!-- ValidationReestrZakluchenieExpFilterForm -->
        <script src="<?=SITE_TEMPLATE_PATH?>/Scripts/ValidationReestrZakluchenieExpFilterForm/script.js" type="text/javascript"></script>
        <!-- ValidationResolutionCommissioningFIlterForm -->
        <script src="<?=SITE_TEMPLATE_PATH?>/Scripts/ValidationResolutionCommissioningFIlterForm/script.js" type="text/javascript"></script>
        <!-- ValidationResolutionProjectFilterForm -->
        <script src="<?=SITE_TEMPLATE_PATH?>/Scripts/ValidationResolutionProjectFilterForm/script.js" type="text/javascript"></script>
        
        <script src="<?=SITE_TEMPLATE_PATH?>/Scripts/AddDatePickerToForm.js" type="text/javascript"></script>
        <script src="<?=SITE_TEMPLATE_PATH?>/Scripts/CollapseForm.js" type="text/javascript"></script>
                    
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
                <div id="Branding">
	                   
		                   <div class="Container">
		                       <a href="http://<?=$_SERVER["SERVER_NAME"]?>/m/index.php" title="на главную"><img src="<?=SITE_TEMPLATE_PATH?>/Images/logo.png"></a>
		                       <h1><span>Служба государственного строительного надзора и экспертизы Санкт-Петербурга</span></h1>
		                   </div>
		               
	                   </div>
	                   <div id="Date">
		                   <div class="Container">	                
		                       <i></i><p>01 сентября 2015, вторник</p>
		                   </div>
                </div>
            </div>
            <!-- Шапка : --конец-- --> 
            <!-- Основная часть страницы : --начало-- -->
            <div id="Content" class="Content2">  
                <!-- Верхняя панель : --начало-- -->
                <div id="TopBar">
                    <div class="Container">
                       <ul id="GeneralNav">
 <?$APPLICATION->IncludeComponent("bitrix:menu", "menu_mobile", array(
	"ROOT_MENU_TYPE" => "mobile",
	"MENU_CACHE_TYPE" => "N",
	"MENU_CACHE_TIME" => "3600",
	"MENU_CACHE_USE_GROUPS" => "Y",
	"MENU_CACHE_GET_VARS" => array(
	),
	"MAX_LEVEL" => "2",
	"CHILD_MENU_TYPE" => "subnav",
	"USE_EXT" => "N",
	"DELAY" => "N",
	"ALLOW_MULTI_SELECT" => "Y"
	),
	false
);?>
                        </ul>                      
                    </div>
                </div>
           <!-- Содержимое страницы : --начало-- --> 
                  
                <div id="MainContent">
                          	
             