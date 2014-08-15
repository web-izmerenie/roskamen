<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Карьер");
?>

<section class="pit">
	<blockquote class="yellow">
		<p>Компания ООО &laquo;Роскамень&raquo; является крупным производителем<br>
		и&nbsp;поставщиком щебня в&nbsp;Ростове-на-Дону и&nbsp;области</p>
	</blockquote>

	<div class="video_block">
		<a class="play"><span>Воспроизвести</span></a>
		<video poster="/upload/karier/video_poster.jpg">
			<source src="/upload/main_page/movie.mp4" type='video/mp4; codecs="avc1.4D401E, mp4a.40.2"'>
			<source src="/upload/main_page/movie.webm" type='video/webm; codecs="vp8.0, vorbis"'>
			<source src="/upload/main_page/movie.ogg" type='video/ogg; codecs="theora, vorbis"'>
			<p>Обновите ваш браузер чтобы просмотреть видео.</p>
		</video>
	</div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
