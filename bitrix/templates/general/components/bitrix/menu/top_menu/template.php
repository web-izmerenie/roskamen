<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if(!empty($arResult)):?>

<?foreach($arResult as $arItem):?>
	<?if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) continue;?>
	<?if($arItem["PERMISSION"] > "D"):?>
		<?if($APPLICATION->GetCurPage(0) == $arItem["LINK"]):?>
			<span><?=$arItem["TEXT"]?></span>
		<?elseif($arItem["SELECTED"]):?>
			<a href="<?=$arItem["LINK"]?>" class="active"><?=$arItem["TEXT"]?></a>
		<?else:?>
			<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
		<?endif?>
	<?endif?>
<?endforeach?>

<?endif?>
