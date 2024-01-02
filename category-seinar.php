<?php get_header(); ?>

<div id="pageHeading">
	<div class="cntInner _Inner">
		<div class="cntTitle">
			<small class="en">SEMINAR</small>
			<h2 class="ja">セミナー</h2>
		</div>
	</div>
</div>
<nav id="breadcrumbs">
	<ul class="cntInner cntList --h-opacity">
		<li class="item"><a href="" class="txt">HOME</a></li>
		<li class="item"><span class="txt">セミナー</span></li>
	</ul>
</nav>

<!-- コンテンツ -->
<main id="mainBox">

	<!-- セミナー -->
	<section class="mainCntBox" id="_archive-seminar">
		<div class="cntInner _Inner">
			<div class="cntList">
      <?php if(have_posts()): while(have_posts()): the_post(); $id = get_the_ID(); ?>
				<a href="<?php the_permalink(); ?>" class="item" target="_blank" rel="noopener">
					<div class="image"><img src="./img/seminar/seminar_img.jpg" class="--img-cover --absolute" alt=""></div>
					<h2 class="title">セミナータイトルが入りますセミナータイトルが入ります</h2>
					<p class="text _Text">簡単な説明文が入ります。2～3行が望ましいです。簡単な説明文が入ります。2～3行が望ましいです。簡単な説明文が入ります。2～3行が望ましいです。</p>
					<div class="details">
						<div>
							<h3 class="dtitle">開催日</h3>
							<p class="dtext">○○年○○月○○</p>
						</div>
						<div>
							<h3 class="dtitle">受講料</h3>
							<p class="dtext">X,XXX円</p>
						</div>
					</div>
					<div class="button _Btn-en -right"><span class="txt">VIEW MORE</span><span class="blank"></span></div>
				</a>
      <?php endwhile; endif; ?>
			</div>
		</div>
		
		<div id="pagination">
			<nav class="navigation pagination" role="navigation" aria-label="投稿">
				<div class="nav-links">
					<!-- <a class="prev page-numbers" href="">前へ</a> -->
					<span aria-current="page" class="page-numbers current">1</span>
					<a class="page-numbers" href="">2</a>
					<a class="page-numbers" href="">3</a>
					<a class="next page-numbers" href="">次へ</a>
				</div>
			</nav> 
		</div>
	</section>

	<?php get_template_part( 'content', 'access' ); ?>
	<?php get_template_part( 'content', 'contact' ); ?>

</main>

<?php get_footer(); ?>