<!-- Footer -->
<div id="footer">
	<div class="container">
		<div class="menu">
			<?php wp_nav_menu( array('menu' => 'Menu [Footer]' )); ?>
		</div>
		<?php dynamic_sidebar( 'footer-social' ); ?>
		<div class="logo"><a href="/"><span>Kredit ohne Schufa</span></a></div>
		<div id="top" class="top">
			<a href="#header"></a>
		</div>
	</div>
	<div class="copyright">
		&copy; <?php echo date("Y");?>, «Kredit ohne Schufa»
	</div>
</div>
<?php if(is_page( array(10,47))): ?>
<script type='text/javascript' src='/wp-content/plugins/easy-responsive-tabs/assets/js/bootstrap-tab.js?ver=3.0'></script>
<?php endif;?>
<script type="text/javascript">
$(document).ready(function(){
	$("#top").on("click","a", function (event) {
		//отменяем стандартную обработку нажатия по ссылке
		event.preventDefault();

		//забираем идентификатор бока с атрибута href
		var id  = $(this).attr('href'),

		//узнаем высоту от начала страницы до блока на который ссылается якорь
			top = $(id).offset().top;
		
		//анимируем переход на расстояние - top за 1500 мс
		$('body,html').animate({scrollTop: top}, 1500);
	});
});
</script>
</body>
</html>