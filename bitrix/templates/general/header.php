<?
	// values
	$revision = 5;
	$debug = false;
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

	<link rel="stylesheet" href="<?=$tplPath?>/styles/build/build.css?v=<?=$revision?>">
	<script src="<?=$tplPath?>/scripts/src/libs/require.js?v=<?=$revision?>"></script>

	<?if($USER->IsAuthorized()):?>
		<?$APPLICATION->ShowHead()?>
	<?endif?>

	<!--[if IE 8]>
		<script>document.getElementsByTagName('html')[0].className += ' ie8';</script>
	<![endif]-->
	<!--[if IE 9]>
		<script>document.getElementsByTagName('html')[0].className += ' ie9';</script>
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
			getVal.set('clientSide', <?=($debug||1===1)?'true':'false'?>);
			getVal.set('lang', '<?=LANGUAGE_ID?>');
			getVal.set('revision', '<?=$revision?>');
			getVal.set('tplPath', '<?=$tplPath?>');
			require(['main']);
		});
	</script>
</head>

<body>
	<div id="bitrix-panel"><?$APPLICATION->ShowPanel()?></div>
	<div class="top-part">
		<header itemscope itemtype="http://schema.org/LocalBusiness">
			<div class="site-name" itemprop="name">
				<?if(!defined('MAIN_PAGE')):?>
				<a href="/" title="<?=$MESS['GOTO_MAIN_PAGE']?>">
				<?endif?>
					<?=$arSite['SITE_NAME']?>
				<?if(!defined('MAIN_PAGE')):?>
				</a>
				<?endif?>
			</div>
			<div class="schema-data">
				<div itemprop="description">
					Крупный производитель и поставщик щебня
					в Ростове-на-Дону и области.
				</div>
				<address itemprop="address">
					<?$APPLICATION->IncludeFile(
						'/inc/address.php',
						array(),
						array('SHOW_BORDER' => false)
					);?>
				</address>
			</div>
			<a href="tel:+79034892159" class="phone" itemprop="telephone">+7 903 489-21-59</a>
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
