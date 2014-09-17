<?
define('ERROR_404', 'Y');
define('NO_CONTENT', 'Y');
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
CHTTP::SetStatus("404 Not Found");
$APPLICATION->SetTitle("Ошибка 404");
?>

<div class="error_404">
	<h1>Ошибка 404</h1>
	<p>Введён неверный адрес, или такой страницы больше нет.</p>
	<p>Вернитесь на <a href="/">главную</a></p>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
