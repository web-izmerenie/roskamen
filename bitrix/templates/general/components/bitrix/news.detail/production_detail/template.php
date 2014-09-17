<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<img class="picture" alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]
	?>" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]
	?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]
	?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>">

<?$vals=$arResult["DISPLAY_PROPERTIES"]['key_val_couples']['VALUE']?>
<?if(is_array($vals)):?>
<div class="keyval">
	<?foreach($vals as $item):?>
		<?if(!stripos($item, '='))continue;?>
		<?$i = stripos($item, '=')?>
		<dl>
			<dt><?=substr($item, 0, $i)?></dt>
			<dd><?=substr($item, $i+1)?></dd>
		</dl>
	<?endforeach?>
</div>
<?endif?>
