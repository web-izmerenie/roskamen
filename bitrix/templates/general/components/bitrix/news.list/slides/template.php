<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<ul class="slides">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<li data-color="<?=$arItem["DISPLAY_PROPERTIES"]["color"]["~VALUE"]?>">
		<img alt="<?=$arItem["DETAIL_PICTURE"]["DESCRIPTION"]
			?>" src="<?=$arItem["DETAIL_PICTURE"]["SRC"]
			?>" width="<?=$arItem["DETAIL_PICTURE"]["WIDTH"]
			?>" height="<?=$arItem["DETAIL_PICTURE"]["HEIGHT"]
			?>">
		<h3><?=$arItem["~NAME"]?></h3>
	</li>
<?endforeach?>
</ul>
