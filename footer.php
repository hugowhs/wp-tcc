	</div><!-- #content -->

	<footer class="site__footer">
		<div class="footer__inner">


			<div class="footer__copyright" itemscope itemtype="http://schema.org/CreativeWork">
				<p>© <span itemprop="copyrightYear">2019</span> - <span itemprop="copyrightHolder"><?php bloginfo( 'name' ); ?></span> - Todos os direitos reservados</p>
				<a itemprop="author" href="http://waiodev.w2z.com.br" title="Desenvolvido pela [waioDev] W2Z Soluções em TI" rel="author" ><span class="show-for-sr">Desenvolvido pela [waioDev] W2Z Soluções em TI</span></a>
			</div><!--.copyright-->

		</div><!-- footer_innder -->
	</footer> <!--footer -->
</div><!-- #page -->
<?php wp_footer(); // js scripts are inserted using this function ?>

<?php
if ( function_exists( 'register_page_scripts' ) ) {
	register_page_scripts(); // Page js scripts load
}
?>

</body>
</html>
