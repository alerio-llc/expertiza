<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
	<ul  id="AdditionalNav">
<?$x=1;?>
<?foreach($arResult as $arItem):?>

<?if($x == 1) $sCLass="Left" ?>
<?if($x == 2) $sCLass="Center" ?>
<?if($x == 3) $sCLass="Right" ?>
	<?if ($arItem["PERMISSION"] > "D"):?>
		<li class="<?=$sCLass;?>"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
	<?endif?>
<?$x++;?>

<?endforeach?>

	</ul>
<?endif?>