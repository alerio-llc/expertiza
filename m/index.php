<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Официальный сайт Службы государственного строительного надзора и экспертизы Санкт-Петербурга");
?><style>
.Content2{
position:absolute !important;//это нужно чтобы карта прилипла к футеру
}
</style>
<?$APPLICATION->IncludeComponent("alerio:checkpermissions", "template", Array(
	"SET_TITLE" => "Y",	// Устанавливать заголовок страницы	
	),
	false
);?>

 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>