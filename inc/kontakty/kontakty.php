<section class="contacts">
	<?$APPLICATION->IncludeFile(
		'/inc/kontakty/imap.php',
		array(),
		array(
			'SHOW_BORDER' => true,
			'MODE' => 'php',
		)
	);?>
	<div class="two-columns">
		<div class="col">
			<?$APPLICATION->IncludeFile(
				'/inc/kontakty/left-column.php',
				array(),
				array(
					'SHOW_BORDER' => true,
					'MODE' => 'php',
				)
			);?>
		</div>
		<div class="col">
			<?$APPLICATION->IncludeFile(
				'/inc/kontakty/right-column.php',
				array(),
				array(
					'SHOW_BORDER' => true,
					'MODE' => 'php',
				)
			);?>
		</div>
		<?$APPLICATION->IncludeFile(
			'/inc/kontakty/contact-email.php',
			array(),
			array(
				'SHOW_BORDER' => true,
				'MODE' => 'php',
			)
		);?>
	</div><!-- .two-columns -->
</section>
