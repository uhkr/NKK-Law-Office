<?php get_header(); ?>

<div class="js-contact-check" style="display:none;">
	<?php $args = ["title_ja" => "メールフォームに関するお問い合わせ注意事項"]; get_template_part( 'content', 'pageheading', $args ); ?>
	<?php $args = ["current" => "メールフォームに関するお問い合わせ注意事項"]; get_template_part( 'content', 'breadcrumbs', $args ); ?>
</div>
<div class="js-contact-form">
	<?php get_template_part( 'content', 'pageheading' ); ?>
	<?php get_template_part( 'content', 'breadcrumbs' ); ?>
</div>

<!-- コンテンツ -->
<main id="mainBox">

	<!-- メールフォームに関するお問い合わせ注意事項 -->
	<section class="mainCntBox js-contact-check" id="_contact-check" style="display:none;">
		<div class="cntInner _Inner">
			<p class="cntText _Text">
				お問い合わせをいただきありがとうございます。<br>
				お問い合わせフォームをご利用いただくにあたり、下記のプライバシーポリシーをお読みになり、<br>
				ご理解の上で同意いただける場合は「同意する」ボタンを押して入力ページへお進みください。
			</p>
			<div id="_post">
				<div class="cntBox _Text">
					<?php 
					$pp_id = get_option('wp_page_for_privacy_policy');
					$pp_post = "";
					if(!$pp_id){
						$pp_obj = get_page_by_path('privacy');
						$pp_post = get_post($pp_obj);
					}else{
						$pp_post = get_post($pp_id);
					}
					if($pp_post != ""){
						setup_postdata($pp_post);
						the_content();
						wp_reset_postdata(); ?>

						<p>
							TEL　052-221-8450<br>
							受付時間　平日9:15～18:30
						</p>
						<p class="address">
							〒460-0003<br>
							愛知県名古屋市中区錦1丁目11番20号<br>
							平和不動産名古屋伏見ビル（旧 大永ビル）<br>
							弁護士法人GROWTH<br>
							南舘・北川・木村法律事務所<br>
							代表社員　弁護士　南舘　欣也
						</p><?php
					}
					?>
				</div>
			</div>
			<div class="cntBox-check mw_wp_form">
				<span class="mwform-checkbox-field horizontal-item">
					<label for="input-privacy">
						<input type="checkbox" value="同意する" id="input-privacy">
						<span class="mwform-checkbox-field-text">同意する</span>
					</label>
				</span><span id="error-privacy" class="error" style="display: none;">チェックしてください</span>
			</div>
			<button id="button-privacy" class="cntBtn _Btn"><span class="txt">お問い合わせフォームへ進む</span><span class="arrow"></span></button>
		</div>
	</section>

	<!-- お問い合わせ -->
	<section class="mainCntBox js-contact-form" id="_contact-form" style="display:none;">
		<div class="cntInner">
			<p class="cntText _Text">各項目に内容を入力後【確認画面へ】をクリックしてください。</p>
			<ul class="cntList">
				<li class="item active"><span class="txt">入力</span></li>
				<li class="item"><span class="txt">確認</span></li>
				<li class="item"><span class="txt">完了</span></li>
			</ul>
			<?php the_content(); ?>
		</div>
	</section>

	<?php get_template_part( 'content', 'access' ); ?>
	<?php get_template_part( 'content', 'contact' ); ?>

</main>

<?php get_footer(); ?>