<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<ul class="production_list">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<li>
		<img alt="<?=$arItem["DETAIL_PICTURE"]["DESCRIPTION"]
			?>" src="<?=$arItem["DETAIL_PICTURE"]["SRC"]
			?>" width="<?=$arItem["DETAIL_PICTURE"]["WIDTH"]
			?>" height="<?=$arItem["DETAIL_PICTURE"]["HEIGHT"]
			?>">
		<h3><a href="<?=$arItem["DETAIL_PAGE_URL"]
			?>"><?=$arItem["~NAME"]?></a></h3>
	</li>
<?endforeach?>
</ul>
