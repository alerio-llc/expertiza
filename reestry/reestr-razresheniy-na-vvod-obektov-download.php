<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
?><div style="padding: 0px 20px 20px;">
<?$APPLICATION->IncludeComponent("alerio:resolutioncommissioningdownloadfile", ".default", array(
	"BLOCK_URL" => "resolutioncommissioning.php",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"SET_TITLE" => "Y"
	),
	false
);?></div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>