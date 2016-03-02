<?
if(!$USER->IsAuthorized()){//проверка на авторизацию пользователя
	$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	"template",
	Array(
		"REGISTER_URL" => "",
		"FORGOT_PASSWORD_URL" => "",
		"PROFILE_URL" => "",
		"SHOW_ERRORS" => "N"
	),
false
);	
}else if(!CSite::InGroup( array(1,5) )) {
	echo "<h1 class=\"Title\"><div class=\"Container\">У вас нет доступа</div></h1> ";
	$APPLICATION->IncludeComponent("bitrix:system.auth.form", "template", array(
	"REGISTER_URL" => "",
	"FORGOT_PASSWORD_URL" => "",
	"PROFILE_URL" => "",
	"SHOW_ERRORS" => "N"
	),
	false
);	
} 

/*global $USER;
else if(CSite::InGroup( array(1,5) ) && !$USER->IsAuthorized()){
	
$redicet = $_SERVER['HTTP_REFERER'];
header ("Location: $redicet");
}*/
?>
