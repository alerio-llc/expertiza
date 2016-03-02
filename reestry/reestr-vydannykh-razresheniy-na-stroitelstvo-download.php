<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
?><div style="padding: 0px 20px 20px;"><?$APPLICATION->IncludeComponent(
	"expertiza:ResolutionProjectDownloadFile",
	"",
	Array(
		"BLOCK_URL" => "resolutionproject.php",
		"SET_TITLE" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600"
	)
);?></div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>