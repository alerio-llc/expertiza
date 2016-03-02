<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Электронное приложение «Проверь разрешение!»");
?><div style="padding: 0px 20px 20px;"><?$APPLICATION->IncludeComponent("alerio:checkpermissions", ".default", array(
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"SET_TITLE" => "Y"
	),
	false
);?></div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>