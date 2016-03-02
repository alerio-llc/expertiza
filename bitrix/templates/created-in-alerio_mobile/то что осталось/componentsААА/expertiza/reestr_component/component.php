<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?> 

<? 

 //Проверяем и инициализируем входящие параметры компонента 

if ($arParams["LINK"]=="")  $arParams["LINK"] = $_SERVER["PHP_SELF"];

//Если нет валидного кеша (то есть нужно запросить

// данные и сделать валидный кеш)

if ($this->StartResultCache())

{ 

//Запрос данных и формирование массива $arResult в соответствии 

$arResult[“TEXT”] =”Hello World!”;

//подключение шаблона

$this->IncludeComponentTemplate(); 

} 

?>