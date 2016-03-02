<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>



<?
$previousLevel = 0;
foreach($arResult as $arItem):
?>
	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>
	<li<?if($arItem["CHILD_SELECTED"] !== true):?> class=""<?endif?>><a onClick="OpenMenuNode(this)" href="#"><img src="<?=$arItem["PARAMS"]["IMG"]?>" border="0" />
                <div class="folder"></div>
				<div class="item-text"><?=$arItem["TEXT"]?></div>				
				<ul style="display:none;">
	<?else:?>
 
		<?if ($arItem["SELECTED"]):?>
		
 <li class="selected"><a href="<?=$arItem["LINK"]?>"><img src="<?=$arItem["PARAMS"]["IMG"]?>" border="0" />
					<div class="page"></div>
					<div class="item-text"><?=$arItem["TEXT"]?></div></a>
				</li>
				<?else:?>
				<li class=""><a href="<?=$arItem["LINK"]?>"><img src="<?=$arItem["PARAMS"]["IMG"]?>" border="0" />
					<div class="page"></div>
					<div class="item-text"><?=$arItem["TEXT"]?></div></a>
				</li>
		<?endif?>
            
	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>




<?endif?>

 
 
