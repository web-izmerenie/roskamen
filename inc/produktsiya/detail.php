<section class="production_detail">
	<?$APPLICATION->IncludeComponent(
		"bitrix:news.detail",
		"production_detail",
		Array(
			"IBLOCK_TYPE" => "content",
			"IBLOCK_ID" => "4",
			"ELEMENT_ID" => "",
			"ELEMENT_CODE" => $_REQUEST["ELEMENT_CODE"],
			"CHECK_DATES" => "Y",
			"FIELD_CODE" => array("NAME","SORT","DETAIL_PICTURE",""),
			"PROPERTY_CODE" => array("key_val_couples",""),
			"IBLOCK_URL" => "",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "N",
			"AJAX_OPTION_HISTORY" => "N",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "36000000",
			"CACHE_GROUPS" => "Y",
			"SET_TITLE" => "Y",
			"SET_BROWSER_TITLE" => "N",
			"BROWSER_TITLE" => "-",
			"SET_META_KEYWORDS" => "N",
			"META_KEYWORDS" => "-",
			"SET_META_DESCRIPTION" => "N",
			"META_DESCRIPTION" => "-",
			"SET_STATUS_404" => "N",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
			"ADD_SECTIONS_CHAIN" => "Y",
			"ADD_ELEMENT_CHAIN" => "N",
			"ACTIVE_DATE_FORMAT" => "",
			"USE_PERMISSIONS" => "N",
			"DISPLAY_DATE" => "N",
			"DISPLAY_NAME" => "N",
			"DISPLAY_PICTURE" => "N",
			"DISPLAY_PREVIEW_TEXT" => "N",
			"USE_SHARE" => "N",
			"PAGER_TEMPLATE" => "",
			"DISPLAY_TOP_PAGER" => "N",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"PAGER_TITLE" => "",
			"PAGER_SHOW_ALL" => "N"
		)
	);?>

	<?$APPLICATION->IncludeComponent("bitrix:news.list", "production_detail_advantages", Array(
		"IBLOCK_TYPE" => "service",	// Тип информационного блока (используется только для проверки)
			"IBLOCK_ID" => "5",	// Код информационного блока
			"NEWS_COUNT" => "4",	// Количество новостей на странице
			"SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
			"SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
			"SORT_BY2" => "",	// Поле для второй сортировки новостей
			"SORT_ORDER2" => "",	// Направление для второй сортировки новостей
			"FILTER_NAME" => "",	// Фильтр
			"FIELD_CODE" => array(	// Поля
				0 => "NAME",
				1 => "SORT",
				2 => "PREVIEW_PICTURE",
				3 => "",
			),
			"PROPERTY_CODE" => array(	// Свойства
				0 => "",
				1 => "",
			),
			"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
			"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
			"AJAX_MODE" => "N",	// Включить режим AJAX
			"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
			"AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
			"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
			"CACHE_TYPE" => "A",	// Тип кеширования
			"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
			"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
			"CACHE_GROUPS" => "Y",	// Учитывать права доступа
			"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
			"ACTIVE_DATE_FORMAT" => "",	// Формат показа даты
			"SET_TITLE" => "N",	// Устанавливать заголовок страницы
			"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
			"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
			"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
			"SET_STATUS_404" => "N",	// Устанавливать статус 404, если не найдены элемент или раздел
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
			"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
			"PARENT_SECTION" => "",	// ID раздела
			"PARENT_SECTION_CODE" => "",	// Код раздела
			"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
			"DISPLAY_DATE" => "N",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "N",
			"PAGER_TEMPLATE" => "",	// Шаблон постраничной навигации
			"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
			"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
			"PAGER_TITLE" => "",	// Название категорий
			"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
			"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "",	// Время кеширования страниц для обратной навигации
			"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
			"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		),
		false
	);?>

	<blockquote class="blue">
		<p>Узнать о стоимости продукции и заказать щебень вы можете,<br>
		позвонив по круглосуточному телефону
		<?$APPLICATION->IncludeFile(
			'/inc/phone_link.php',
			array(),
			array('SHOW_BORDER' => false)
		);?></p>
	</blockquote>
</section>
