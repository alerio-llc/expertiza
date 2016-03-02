<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Реестр положительных заключений экспертизы");
?><div style="padding: 0px 20px 20px;"><?$APPLICATION->IncludeComponent(
	"alerio:reestrzakluchenie",
	".default",
	Array(
		"SET_TITLE" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_NOTES" => ""
	)
);?> </div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>