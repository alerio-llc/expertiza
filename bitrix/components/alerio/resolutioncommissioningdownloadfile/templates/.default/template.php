<?
//если пользователь не авторизирован, то появляется поле авторизации
if(!$USER->IsAuthorized())
//да
{
    $APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	".default",
	Array(
		"REGISTER_URL" => "",
		"FORGOT_PASSWORD_URL" => "",
		"PROFILE_URL" => "",
		"SHOW_ERRORS" => "N"
	),
false
);	

}
//если пользователь не состоит в нужной группе
else if(!CSite::InGroup( array(1,5) ))
{
    echo "<p>Просмотр сканированных копий разрешений доступен только для уполномоченных представителей исполнительных органов власти Санкт-Петербурга и Администраций Санкт-Петербурга.</p>";
}
?>
