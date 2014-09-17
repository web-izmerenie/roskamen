<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Детальная страница");
?>

<?$APPLICATION->IncludeFile(
	'/inc/produktsiya/detail.php',
	array(),
	array('SHOW_BORDER' => false)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
