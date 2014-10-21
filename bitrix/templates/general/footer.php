		<?if(!defined('NO_CONTENT')):?>
			</main>
		<?else:?>
			</div><!--.main_block-->
		<?endif?>
	</div><!-- .top-part -->
	<footer>
		<div class="developer">
			<a href="http://web-izmerenie.ru" title="Web izmerenie" target="_blank">
				<span><?=$MESS['MADE_IN']?></span>
				<span>Web izmerenie</span>
			</a>
		</div>
		<?require $_SERVER['DOCUMENT_ROOT'].'/allowed_domains.php';?>
		<?if(in_array($_SERVER['HTTP_HOST'], $ALLOWED_DOMAINS)):?>
			<!-- Yandex.Metrika counter -->
			<script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript"></script>
			<script type="text/javascript">
			try {
				var yaCounter26415228 = new Ya.Metrika({
					id:26415228,
					webvisor:true,
					clickmap:true,
					trackLinks:true,
					accurateTrackBounce:true
				});
			} catch(e) { }
			</script>
			<noscript><div><img src="//mc.yandex.ru/watch/26415228" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
			<!-- /Yandex.Metrika counter -->
		<?endif?>
	</footer>
</body>
</html>
