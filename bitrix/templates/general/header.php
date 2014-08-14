<?
	// values
	$revision = 1;
	$debug = true;
	$tplPath = SITE_TEMPLATE_PATH;

	IncludeTemplateLangFile(__FILE__);

	$rsSite = CSite::GetByID(SITE_ID);
	$arSite = $rsSite->Fetch();

	if ($USER->IsAdmin()) $debug = true;
	if ($debug) $revision = 'dev' . mktime();

	$html_classes = array();
	$main_classes = array();

	if (defined('MAIN_PAGE')) $html_classes[] = 'main_page';

	$html_classes = implode(' ', $html_classes);
	$main_classes = implode(' ', $main_classes);

?><!doctype html>
<html lang="<?=LANGUAGE_ID?>" class="<?=$html_classes?>">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=980">
	<title><?
		if(defined('MAIN_PAGE')):
			echo $arSite['SITE_NAME'];
		else:
			$APPLICATION->ShowTitle();
		endif;
	?></title>

	<!--[if lt IE 8]>
		<meta http-equiv="refresh" content="0; url=/ie_old/<?=LANGUAGE_ID?>.html">
		<style>* { display: none !important; }</style>
		<script>throw new Error('IE less than 8');</script>
	<![endif]-->

	<!--<link href="/favicon.ico?v=<?=$revision?>" rel="shortcut icon" type="image/x-icon">-->

	<?if($debug):?><script>var less = { env: 'development' };</script><?endif?>

	<link rel="stylesheet/less" type="text/css" href="<?=$tplPath?>/styles/src/main.less?v=<?=$revision?>">
	<!--<link rel="stylesheet" href="<?=$tplPath?>/styles/build/build.css?v=<?=$revision?>">-->
	<script src="<?=$tplPath?>/scripts/src/libs/require.js?v=<?=$revision?>"></script>

	<?if($USER->IsAuthorized()):?>
		<?$APPLICATION->ShowHead()?>
	<?endif?>

	<!--[if IE 8]>
		<script>document.getElementsByTagName('html')[0].className += ' ie8';</script>
	<![endif]-->

	<!-- Pulled from http://code.google.com/p/html5shiv/ -->
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<script>
		require.config({
			baseUrl: '<?=$tplPath?>/scripts/src/',
			urlArgs: 'v=<?=$revision?>',
		});
		require(['basics/get_val'], function (getVal) {
			getVal.set('clientSide', <?=($debug)?'true':'false'?>);
			getVal.set('lang', '<?=LANGUAGE_ID?>');
			getVal.set('revision', '<?=$revision?>');
			getVal.set('tplPath', '<?=$tplPath?>');
			require(['main']);
		});
	</script>
</head>

<body>
	<div id="bitrix-panel"><?$APPLICATION->ShowPanel()?></div>
	<div class="top_part">
		<header>
			<div class="site_name">
				<a href="/" title="<?=$MESS['GOTO_MAIN_PAGE']?>">
					<?=$arSite['SITE_NAME']?>
				</a>
			</div>
			<a href="tel:+79034892159" class="phone">+7 903 489-21-59</a>
			<nav class="top_menu">
				<?$APPLICATION->IncludeComponent("bitrix:menu", "top_menu", Array(
	"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
	"MENU_CACHE_TYPE" => "A",	// Тип кеширования
	"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
	"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
	"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
		0 => "",
	),
	"MAX_LEVEL" => "1",	// Уровень вложенности меню
	"CHILD_MENU_TYPE" => "",	// Тип меню для остальных уровней
	"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
	"DELAY" => "N",	// Откладывать выполнение шаблона меню
	"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
	),
	false
);?>
			</nav>
		</header>
		<?if(!defined('MAIN_PAGE')):?>
			<h1><?$APPLICATION->ShowTitle()?></h1>
		<?endif?>
		<main>
			<section class="contacts">
				<div class="imap" id="imap1"></div>
				<div class="two_columns">
					<div class="col">
						<dl>
							<dt><h3>По вопросам стоимости и заказа:</h3></dt>
							<dd>
								<a href="tel:+79034892159" class="phone">+7 903 489-21-59</a>
								<a href="tel:+79613314048" class="phone">+7 961 331-40-48</a>
								<span class="office_hours">Круглосуточно</span>
							</dd>
						</dl>
						<dl>
							<dt><h3>По другим вопросам:</h3></dt>
							<dd>
								<a href="tel:+7" class="phone">+7 </a>
								<a href="tel:+7" class="phone">+7 </a>
								<span class="office_hours">ПН—ПТ с 9:00 до 18:00</span>
							</dd>
						</dl>
						<a href="mailto:roskamen2014@mail.ru">roskamen2014@mail.ru</a>
					</div>
					<div class="col">
						<dl>
							<dt><h3>Наш офис:</h3></dt>
							<dd>
								<address>
									г. Ростов-на-Дону, пр. Стачки, 25<br>
									<a href="#imap1" class="on_map">на карте</a>
								</address>
							</dd>
						</dl>
					</div>
				</div>
			</section>
		</main>
	</div>
	<footer>
		<div class="developer">
			<a href="http://web-izmerenie.ru" title="Web izmerenie" target="_blank">
				<span><?=$MESS['MADE_IN']?></span>
				<span>Web izmerenie</span>
			</a>
		</div>
	</footer>
