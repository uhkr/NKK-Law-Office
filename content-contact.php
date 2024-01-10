<!-- Contact -->
<section class="mainCntBox" id="_contact">
	<div class="cntInner _Inner">
		<div class="cntTitle _Title-bg -white"><h1 class="ja">お問い合わせ</h1><small class="en">CONTACT</small></div>
		<p class="cntText _Text">
			弁護士法人GROWTH　南舘・北川・木村法律事務所へのご意見・ご質問等を含む全てのお問い合わせを<span class="--d-ib">受け付けております。</span><br>
				お気軽にお問い合わせ下さい。
		</p>
		<div class="cntBtns --h-opacity">
			<a href="tel:0522218450" class="cntBtn -tel">
				<div class="large">TEL 052-221-8450</div>
				<small class="small">受付時間　平日9:15～18:30</small>
			</a>
			<?php $url = get_page_url("contact"); if($url): ?>
			<a href="<?php echo $url; ?>" class="cntBtn -email"><div><span class="icon"><img src="<?php echo img_url(); ?>/common/icon_email-bk.svg" class="--img-contain" alt="✉"></span><span class="large">メールでのお問い合わせ</span></div></a>
			<?php endif; ?>
		</div>
	</div>
</section>