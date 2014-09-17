<?
define('MAIN_PAGE', 'Y');
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Главная страница");
?>

<?$APPLICATION->IncludeFile(
	'/inc/main_page/main_page.php',
	array(),
	array('SHOW_BORDER' => false)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
