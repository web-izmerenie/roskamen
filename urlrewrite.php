<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/produktsiya/(.*).html#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "",
		"PATH" => "/produktsiya/detail.php",
	),
	array(
		"CONDITION" => "#^/robots.txt(\\?|\$)#",
		"RULE" => "",
		"ID" => "",
		"PATH" => "/robots.php",
	),
);

?>