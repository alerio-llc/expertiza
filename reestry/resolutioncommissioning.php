<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Реестр разрешений на ввод объектов в эксплуатацию");
?> 
<div style="padding: 0px 20px 20px;"><?$APPLICATION->IncludeComponent(
	"alerio:resolutioncommissioning",
	".default",
	Array(
		"BLOCK_URL" => "reestr-razresheniy-na-vvod-obektov-download.php",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600"
	)
);?>


</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>