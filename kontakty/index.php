<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>

<section class="contacts">
	<div class="imap" id="imap1"></div>
	<div class="two-columns">
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
					<a href="tel:+78632362023" class="phone">+7 (863) 236-20-23</a>
					<a href="tel:+78632362024" class="phone">+7 (863) 236-20-24</a>
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
	</div><!-- .two-columns -->
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
