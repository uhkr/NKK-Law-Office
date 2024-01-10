<?php get_header(); ?>

<?php get_template_part( 'content', 'pageheading' ); ?>
<?php get_template_part( 'content', 'breadcrumbs' ); ?>

<!-- コンテンツ -->
<main id="mainBox">

	<section class="mainCntBox" id="_post">
		<div class="cntInner _Inner-s">
			<div class="cntBox">
        <?php the_content(); ?>
				<a href="tel:0522218450" class="cntBtn-tel">
					<small class="small">お問い合わせはお電話から<span class="--d-ib">お願いいたします</span></small>
					<div>TEL 052-221-8450</div>
					<small class="detail">受付時間　平日9:15～18:30</small>
				</a>
				<p>
					〒460-0003<br>
					愛知県名古屋市中区錦1丁目11番20号<br>
					平和不動産名古屋伏見ビル（旧 大永ビル）<br>
					弁護士法人GROWTH<br>
					南舘・北川・木村法律事務所<br>
					代表社員　弁護士　南舘　欣也
				</p>
			</div>
		</div>
	</section>

	<?php get_template_part( 'content', 'access' ); ?>
	<?php get_template_part( 'content', 'contact' ); ?>

</main>

<?php get_footer(); ?>