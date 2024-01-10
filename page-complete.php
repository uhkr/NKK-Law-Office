<?php get_header(); ?>

<?php get_template_part( 'content', 'pageheading' ); ?>
<?php get_template_part( 'content', 'breadcrumbs' ); ?>

<!-- コンテンツ -->
<main id="mainBox">

	<!-- お問い合わせ 完了 -->
	<section class="mainCntBox" id="_contact-form">
		<div class="cntInner">
			<div class="cntText _Text">
				<?php the_content(); ?>
			</div>
			<ul class="cntList">
				<li class="item"><span class="txt">入力</span></li>
				<li class="item"><span class="txt">確認</span></li>
				<li class="item active"><span class="txt">完了</span></li>
			</ul>
			<a href="<?php echo home_url(); ?>" class="cntBtn-complete _Btn -prev"><span class="arrow"></span><span class="txt">サイトトップへ戻る</span></a>
		</div>
	</section>

	<?php get_template_part( 'content', 'access' ); ?>
	<?php get_template_part( 'content', 'contact' ); ?>

</main>

<?php get_footer(); ?>