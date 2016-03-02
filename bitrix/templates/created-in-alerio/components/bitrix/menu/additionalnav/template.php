<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
	<ul id="GeneralNav">

<?$x=1;?>
<?foreach($arResult as $arItem):?>

<?if($x == 1) $sImg="http://www.expertiza.spb.ru/Styles/Images/iconAbout.png"?>
<?if($x == 2) $sImg="http://www.expertiza.spb.ru/Styles/Images/iconNews.png"?>
<?if($x == 3) $sImg="http://www.expertiza.spb.ru/Styles/Images/iconCouncil.png"?>
<?if($x == 4) $sImg="http://www.expertiza.spb.ru/Styles/Images/iconPersonalArea.png"?>

	<?if ($arItem["PERMISSION"] > "D"):?>
		<li><p><a href="<?=$arItem["LINK"]?>"><img src="<?=$sImg;?>"><?=$arItem["TEXT"]?></a></p>
	<?endif?>
<?$x++;?>
<?endforeach?>

	</ul>
<?endif?>