<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Карьер");
?>

<?$APPLICATION->IncludeFile(
	'/inc/karier/karier.php',
	array(),
	array('SHOW_BORDER' => false)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
