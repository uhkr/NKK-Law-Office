<?php
/**
 * The header for our theme.
 *
 * @package nkk
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- フォント -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@400;500;600;700&family=Fjalla+One&family=Noto+Sans+JP:wght@300;400;500;700&family=Noto+Serif+JP:wght@400;500;600;700&display=swap" rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- ロード -->
<!-- <div id="loading"></div> -->

<!-- スマホメニュー -->
<div id="nav" class="--tab-sp">
	<!-- ナビメニュー -->
	<nav class="cntInner">
		<div class="cntBox --h-opacity">
			<ul id="navList-01" class="cntList">
				<?php $url = get_page_url("about"); if($url): ?>
				<li><a href="<?php echo $url; ?>" class="item"><span class="txt">事務所概要</span></a></li>
				<?php endif; ?>
				<li><a href="<?php echo home_url("lawyer"); ?>" class="item"><span class="txt">弁護士紹介</span></a></li>
				<li><div class="item _Slider"><a href="<?php echo home_url("service"); ?>" class="txt">取扱業務</a></div>
					<ul class="child" style="display: none;">
						<li><a href="<?php echo home_url("service/#_corporate"); ?>" class="item"><span class="txt">企業法務 一覧</span></a></li>
						<li><a href="<?php echo get_permalink(82); ?>" class="item"><span class="txt">- 内部通報</span></a></li>
						<li><a href="<?php echo get_permalink(76); ?>" class="item"><span class="txt">- 人事労務</span></a></li>
						<li><a href="<?php echo get_permalink(80); ?>" class="item"><span class="txt">- カスタマー法務</span></a></li>
						<li><a href="<?php echo home_url("service/#_individual"); ?>" class="item"><span class="txt">個人法務 一覧</span></a></li>
					</ul>
				</li>
				<li><a href="<?php echo home_url("information"); ?>" class="item"><span class="txt">新着情報</span></a></li>
				<?php $url = get_page_url("about"); if($url): ?>
				<li><a href="<?php echo $url."#_about-access"; ?>" class="item"><span class="txt">アクセス</span></a></li>
				<?php endif; ?>
				<?php $url = get_page_url("privacy"); if($url): ?>
				<li><a href="<?php echo $url; ?>" class="item"><span class="txt small">プライバシーポリシー</span></a></li>
				<?php endif; ?>
			</ul>
			<?php $url = get_page_url("contact"); if($url): ?>
			<a href="<?php echo $url; ?>" class="cntBtn"><span class="icon"><img src="<?php echo img_url(); ?>/common/icon_email-bk.svg" alt=""></span><span class="txt">メールでのお問い合わせ</span></a>
			<?php endif; ?>
		</div>
	</nav>
</div>

<!-- ヘッダー -->
<header id="header">
	<div class="cntInner">
		<a id="headerLogo" href="<?php echo home_url(); ?>" class="--h-opacity"><h1>弁護士法人GROWTH<br>南舘・北川・木村法律事務所</h1></a>
		<!-- ナビメニュー -->
		<div class="cntBox">
			<ul class="cntList-01 --pc">
				<?php $url = get_page_url("about"); if($url): ?>
				<li><a href="<?php echo $url; ?>"><span class="txt">事務所概要</span></a></li>
				<?php endif; ?>
				<li><a href="<?php echo home_url("lawyer"); ?>"><span class="txt">弁護士紹介</span></a></li>
				<li><a href="<?php echo home_url("service"); ?>"><span class="txt">取扱業務</span></a>
					<ul class="child --h-opacity">
						<li><a href="<?php echo home_url("service/#_corporate"); ?>"><span class="txt">企業法務 一覧</span></a></li>
						<li><a href="<?php echo get_permalink(82); ?>"><span class="txt">- 内部通報</span></a></li>
						<li><a href="<?php echo get_permalink(76); ?>"><span class="txt">- 人事労務</span></a></li>
						<li><a href="<?php echo get_permalink(80); ?>"><span class="txt">- カスタマー法務</span></a></li>
						<li><a href="<?php echo home_url("service/#_individual"); ?>"><span class="txt">個人法務 一覧</span></a></li>
					</ul>
				</li>
				<li><a href="<?php echo home_url("information"); ?>"><span class="txt">新着情報</span></a></li>
				<?php $url = get_page_url("about"); if($url): ?>
				<li><a href="<?php echo $url."#_about-access"; ?>"><span class="txt">アクセス</span></a></li>
				<?php endif; ?>
			</ul>
			<ul class="cntList-02">
				<li class="--pc"><a href="<?php echo home_url("contact"); ?>" class="item"><span class="icon"><img src="<?php echo img_url(); ?>/common/icon_email-bk.svg" alt=""></span><span class="txt">お問い合わせ</span></a></li>
				<li id="headerBtn" class="--tab-sp"><span></span><span></span><span></span></li>
			</ul>
		</div>
	</div>
</header>
