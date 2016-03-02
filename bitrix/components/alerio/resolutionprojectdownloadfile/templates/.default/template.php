<?
//Флаг режима "Просмотр документов" снят?
if($arResult["ModeDocumentViewing"]!=TRUE)
//да
{
    //выводим форму авторизации
	$APPLICATION->SetTitle("Просмотр разрешения на строительство"); 
    //echo "<h1>Просмотр разрешения на строительство</h1>";
    echo "<p>Просмотр разрешений с использованием учетных данных сервиса «Личный кабинет» невозможен.</p>";  
    echo "<p>Просмотр сканированных копий разрешений доступен только для уполномоченных представителей исполнительных органов власти Санкт-Петербурга и Администраций Санкт-Петербурга.</p>";
    echo "<p>Для просмотра документа, пожалуйта, введите свой логин и пароль.</p>";
    echo "<form action=\"".$_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"]."\" method=\"post\">";
    echo "<table class=\"fieldset\">";
    echo "<colgroup width=\"50px\"><colgroup>";
    echo "  <tr>";
    echo "      <td><label>Логин:</labael></td>";
    echo "      <td>";
    echo "          <input type=\"text\" name=\"login\" style=\"width: 200px\">";
    echo "      </td>";
    echo "</tr>";
    echo "<tr>";
    echo "      <td><label>Пароль:</labael></td>";
    echo "      <td>";
    echo "          <input type=\"password\" name=\"password\" style=\"width: 200px\">";
    echo "      </td>";
    echo "</tr>";
    echo "<tr>";
    echo "      <td>";
    echo "<input type=\"hidden\" name=\"action\" value=\"login\">";
    echo "<input type=\"submit\" value=\"войти\">";
    echo "      </td><td></td>";
    echo "  </tr>";
    echo "</table>";
    echo "</form>";
    echo "<a href=\"//expertiza/reestry/$arParams[BLOCK_URL]\">Вернуться в реестр</a>";
}
//нет
else
{
    echo intval($_SESSION["user"]["id"]);
    //при наличии ошибок выводим ошибки, иначе это окно у нас не оторажается, а сразу идет загрузка PDF-документа.
    $arResult["ErrorText"];
}
?>
