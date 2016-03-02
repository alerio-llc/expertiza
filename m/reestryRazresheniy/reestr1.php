<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("reestr1");
?>

<h1 class="Title"><div class="Container">Реестр выданных разрешений на строительство</div></h1>


<?$APPLICATION->IncludeComponent("alerio:resolutionproject", "template", Array(
	"BLOCK_URL" => "",	// URL
	"CACHE_TYPE" => "A",	// Тип кеширования
	"CACHE_TIME" => "3600",	// Время кеширования (сек.)
	"CACHE_NOTES" => ""
	),
	false
);?>                 
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>