<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости");
?><h1 class="Title"><div class="Container">Новости</div></h1>
<div class="Container">
<?$APPLICATION->IncludeComponent("bitrix:news", "template3", Array(
	"DISPLAY_DATE" => "Y",	// Выводить дату элемента
	"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
	"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
	"USE_SHARE" => "N",	// Отображать панель соц. закладок
	"SEF_MODE" => "N",	// Включить поддержку ЧПУ
	"AJAX_MODE" => "N",	// Включить режим AJAX
	"IBLOCK_TYPE" => "news",	// Тип инфоблока
	"IBLOCK_ID" => "",	// Инфоблок
	"NEWS_COUNT" => "20",	// Количество новостей на странице
	"USE_SEARCH" => "N",	// Разрешить поиск
	"USE_RSS" => "N",	// Разрешить RSS
	"USE_RATING" => "N",	// Разрешить голосование
	"USE_CATEGORIES" => "N",	// Выводить материалы по теме
	"USE_FILTER" => "N",	// Показывать фильтр
	"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
	"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
	"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
	"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
	"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
	"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
	"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
	"LIST_FIELD_CODE" => "",	// Поля
	"LIST_PROPERTY_CODE" => "",	// Свойства
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
	"DISPLAY_NAME" => "Y",	// Выводить название элемента
	"META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
	"META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
	"BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
	"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
	"DETAIL_FIELD_CODE" => "",	// Поля
	"DETAIL_PROPERTY_CODE" => "",	// Свойства
	"DETAIL_DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
	"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
	"DETAIL_PAGER_TITLE" => "Страница",	// Название категорий
	"DETAIL_PAGER_TEMPLATE" => "",	// Название шаблона
	"DETAIL_PAGER_SHOW_ALL" => "Y",	// Показывать ссылку "Все"
	"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
	"SET_STATUS_404" => "N",	// Устанавливать статус 404, если не найдены элемент или раздел
	"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
	"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
	"USE_PERMISSIONS" => "N",	// Использовать дополнительное ограничение доступа
	"CACHE_TYPE" => "A",	// Тип кеширования
	"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
	"CACHE_NOTES" => "",
	"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
	"CACHE_GROUPS" => "Y",	// Учитывать права доступа
	"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
	"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
	"PAGER_TITLE" => "Новости",	// Название категорий
	"PAGER_SHOW_ALWAYS" => "Y",	// Выводить всегда
	"PAGER_TEMPLATE" => "",	// Название шаблона
	"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
	"PAGER_SHOW_ALL" => "Y",	// Показывать ссылку "Все"
	"VARIABLE_ALIASES" => array(
		"SECTION_ID" => "SECTION_ID",
		"ELEMENT_ID" => "ELEMENT_ID",
	),
	"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
	"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
	"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
	),
	false
);?>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>