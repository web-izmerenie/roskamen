<?
define('MAIN_PAGE', 'Y');
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Главная страница");
?>

<!--<div class="bg_video">
	<video autoplay>
		<source src="/upload/main_page/movie.mp4" type='video/mp4; codecs="avc1.4D401E, mp4a.40.2"'>
		<source src="/upload/main_page/movie.webm" type='video/webm; codecs="vp8.0, vorbis"'>
		<source src="/upload/main_page/movie.ogg" type='video/ogg; codecs="theora, vorbis"'>
	</video>
</div>-->

<div class="slide">
	<div class="bg"></div>
	<div class="text"><div class="inside"></div></div>
	<a class="next"></a>
</div>

<ul class="slides">
	<li data-color="#eee77d">
		<img alt="" src="/upload/main_page/01.png">
		<h3>Наш щебень мы<br>добываем сами</h3>
	</li>
	<li data-color="#71e491">
		<img alt="" src="/upload/main_page/02.png">
		<h3>68 км от Ростова-на-Дону</h3>
	</li>
	<li data-color="#ee7e7b">
		<img alt="" src="/upload/main_page/03.png">
		<h3>Отгрузка щебня 24/7</h3>
	</li>
	<li data-color="#66b3c8">
		<img alt="" src="/upload/main_page/04.png">
		<h3>Лещадность щебня до 10%</h3>
	</li>
	<li data-color="#6bb397">
		<img alt="" src="/upload/main_page/05.png">
		<h3>Карьерная техника<br>от лучших производителей</h3>
	</li>
	<li data-color="#ee7e7b">
		<img alt="" src="/upload/main_page/06.png">
		<h3>Свой парк техники<br>грузоподъёмностью от 10 тонн</h3>
	</li>
	<li data-color="#b6dfea">
		<img alt="" src="/upload/main_page/07.png">
		<h3>Точный вес продукции<br>до 100 тонн</h3>
	</li>
</ul>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
