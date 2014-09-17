<?header('Content-Type: text/plain; charset=utf-8')?>
<?if($_SERVER['HTTP_HOST'] !== 'roskamen.com'):?>
User-Agent: *
Disallow: /
<?else:?>
User-Agent: *
Allow: /bitrix/templates/
Disallow: /bitrix/
Disallow: /node_modules/
Disallow: /ie_old/
Host: roskamen.com
<?endif?>
