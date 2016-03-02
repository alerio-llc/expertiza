<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Реестр выданных разрешений на строительство");
?><div style="padding:0 20px 20px 20px;">
<?$APPLICATION->IncludeComponent(
	"alerio:resolutionproject",
	".default",
	Array(
		"BLOCK_URL" => "reestr-vydannykh-razresheniy-na-stroitelstvo-download.php",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600"
	)
);?></div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>