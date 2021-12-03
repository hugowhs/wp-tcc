<?php
get_header();
?>

<section id="primary" class="content-area">
	<main id="main" class="site__main">

		<div class="error-404 not-found">
			<header class="entry__header">
				<h1 class="page-title">Oops! <small>Erro 404</small></h1>
			</header><!-- .entry-header -->

			<div class="entry__content">
				<h2>Página não encontrada</h2>
				<p>O conteúdo que você está procurando não foi encontrado ou deixou de existir. Utilize o campo abaixo para encontrar algo relacionado.</p>
				<?php get_search_form(); ?>
			</div><!-- .entry__content -->

		</div><!-- .error-404 -->

	</main> <!-- #main -->
</section><!-- .content-area -->

<?php
get_footer();
