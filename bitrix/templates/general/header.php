<?
	IncludeTemplateLangFile(__FILE__);

	$revision = 3;
	$debug = true;

	if ($USER->IsAdmin()) $debug = true;
	if ($debug) $revision = 'dev' . mktime();

	$html_classes = array();
	$main_classes = array();

	$html_classes = implode(' ', $html_classes);
	$main_classes = implode(' ', $main_classes);

	$tplPath = SITE_TEMPLATE_PATH;

?><!doctype html>
<html lang="<?=LANGUAGE_ID?>" class="<?=$html_classes?>">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=980">
	<title><?$APPLICATION->ShowTitle()?></title>

	<!--[if lt IE 8]>
		<meta http-equiv="refresh" content="0; url=/ie_old/<?=LANGUAGE_ID?>.html">
		<style>* { display: none !important; }</style>
		<script>throw new Error('IE less than 8');</script>
	<![endif]-->

	<!--<link href="/favicon.ico?v=<?=$revision?>" rel="shortcut icon" type="image/x-icon">-->

	<?if($debug):?><script>var less = { env: 'development' };</script><?endif?>

	<link rel="stylesheet/less" type="text/css" href="<?=$tplPath?>/styles/src/main.less?v=<?=$revision?>">
	<?/*<link rel="stylesheet" href="<?=$tplPath?>/styles/build/build.css?v=<?=$revision?>">*/?>
	<script src="<?=$tplPath?>/scripts/src/libs/require.js?v=<?=$revision?>"></script>
	<?$APPLICATION->ShowCSS()?>
	<?$APPLICATION->ShowHeadStrings()?>
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
