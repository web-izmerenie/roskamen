<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<ul class="advantages">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<li>
		<img alt="<?=$arItem["PREVIEW_PICTURE"]["DESCRIPTION"]
			?>" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]
			?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]
			?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]
			?>">
		<p><?=$arItem["~NAME"]?></p>
	</li>
<?endforeach?>
</ul>
