<?php get_header(); ?>

<?php get_template_part( 'content', 'pageheading' ); ?>
<?php get_template_part( 'content', 'breadcrumbs' ); ?>

<!-- コンテンツ -->
<main id="mainBox">

	<section class="mainCntBox" id="_post">
		<div class="cntInner _Inner-s">
			<div class="cntBox">
        <?php the_content(); ?>
			</div>
		</div>
	</section>

	<?php get_template_part( 'content', 'access' ); ?>
	<?php get_template_part( 'content', 'contact' ); ?>

</main>

<?php get_footer(); ?>