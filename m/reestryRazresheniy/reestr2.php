<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("reestr2");?><h1 class="Title"><div class="Container">Реестр выданных разрешений на ввод объектов в эксплуатацию</div></h1><?$APPLICATION->IncludeComponent(
	"alerio:resolutioncommissioning",
	"template",
	Array(
		"BLOCK_URL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_NOTES" => ""
	)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>