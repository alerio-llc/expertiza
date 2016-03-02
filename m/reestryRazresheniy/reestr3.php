<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("reestr3");
?>
<h1 class="Title">
  <div class="Container">Реестр положительных заключений экспертизы проектной документации</div></h1>


<?$APPLICATION->IncludeComponent("alerio:reestrzakluchenie", "template", Array(
	"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
	"CACHE_TYPE" => "A",	// Тип кеширования
	"CACHE_TIME" => "3600",	// Время кеширования (сек.)
	"CACHE_NOTES" => ""
	),
	false
);?>
 	 

 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>