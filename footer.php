<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package nkk
 */
wp_reset_postdata();
?>

<!-- フッター -->
<footer id="footer">
	<div class="cntInner">
		<ul class="cntList --h-opacity">
			<?php $url = get_page_url("about"); if($url): ?>
			<li><a href="<?php echo $url; ?>"><span class="txt">事務所概要</span></a></li>
			<?php endif; ?>
			<li><a href="<?php echo home_url("lawyer"); ?>"><span class="txt">弁護士紹介</span></a></li>
			<li><a href="<?php echo home_url("service"); ?>"><span class="txt">取扱業務</span></a></li>
			<li><a href="<?php echo home_url("information"); ?>"><span class="txt">新着情報</span></a></li>
			<?php $url = get_page_url("about"); if($url): ?>
			<li><a href="<?php echo $url."#_about-access"; ?>"><span class="txt">アクセス</span></a></li>
			<?php endif; ?>
			<?php $url = get_page_url("privacy"); if($url): ?>
			<li><a href="<?php echo $url; ?>"><span class="txt shrink">プライバシーポリシー</span></a></li>
			<?php endif; ?>
		</ul>
		<div id="footerLogo">弁護士法人GROWTH<br>南舘・北川・木村法律事務所<br><small class="small">（愛知県弁護士会）</small></div>
		<div class="cntBottom">
			<p class="cntText">〒460-0003　<br class="--tab-sp">愛知県名古屋市中区錦1-11-20<br>平和不動産名古屋伏見ビル（旧 大永ビル）9階</p>
			<small id="copyright">© Nankan, Kitagawa, Kimura Law Office</small>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
