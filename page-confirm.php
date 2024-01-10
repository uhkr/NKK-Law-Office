<?php get_header(); ?>

<?php get_template_part( 'content', 'pageheading' ); ?>
<?php get_template_part( 'content', 'breadcrumbs' ); ?>

<!-- コンテンツ -->
<main id="mainBox">

	<!-- お問い合わせ -->
	<section class="mainCntBox js-contact-form" id="_contact-form">
		<div class="cntInner">
			<p class="cntText _Text">以下の内容でよろしければ、「送信する」ボタンを押してください。</p>
			<ul class="cntList">
				<li class="item"><span class="txt">入力</span></li>
				<li class="item active"><span class="txt">確認</span></li>
				<li class="item"><span class="txt">完了</span></li>
			</ul>
			<?php the_content(); ?>
		</div>
	</section>

	<?php get_template_part( 'content', 'access' ); ?>
	<?php get_template_part( 'content', 'contact' ); ?>

</main>

<?php get_footer(); ?>