<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("reestr-razresheniy-na-vvod-obektov-download");
?>

<?$APPLICATION->IncludeComponent("alerio:resolutioncommissioningdownloadfile", "template", array(
	"BLOCK_URL" => "resolutioncommissioning.php",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"SET_TITLE" => "Y"
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>