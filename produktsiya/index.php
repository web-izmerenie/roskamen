<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Продукция");
?>

<?$APPLICATION->IncludeFile(
	'/inc/produktsiya/produktsiya.php',
	array(),
	array('SHOW_BORDER' => false)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
