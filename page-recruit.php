<?php get_header(); ?>

<?php get_template_part( 'content', 'pageheading' ); ?>
<?php get_template_part( 'content', 'breadcrumbs' ); ?>

<!-- コンテンツ -->
<main id="mainBox">
	
	<div id="withSidebar">

		<!--  -->
		<section class="mainCntBox" id="_content-01">
			<div class="cntInner">
				<p class="cntText _Text">
					書類選考のうえ、面接をさせていただく方には、応募書類到達から10日以内を目途に電話ないしメールにてご連絡させていただきます。<br>
					なお、応募書類の返送は行いませんので、予めご了承ください。
				</p>
			</div>
		</section>

		<div>
			<!-- 採用情報 -->
			<section class="mainCntBox" id="_recruit">
				<div class="cntInner">
					<div id="_recruit-trainees" class="cntBox">
						<h2 class="cntTitle _Title-underline">弁護士採用-司法修習生の方-</h2>
						<ul class="cntList _Text">
							<li class="item">
								<h3 class="title">募集人数</h3>
								<p class="text">若干名</p>
							</li>
							<li class="item">
								<h3 class="title">応募方法</h3>
								<p class="text">
									履歴書、司法試験成績通知書、法科大学院の成績証明書を下記まで郵送にてお送りください。<br>
									〒460-0003<br>
									愛知県名古屋市中区錦1-11-20<br>
									平和不動産名古屋伏見ビル9階<br>
									弁護士法人GROWTH<br>
									南舘・北川・木村法律事務所　採用担当 宛
								</p>
							</li>
						</ul>
					</div>
					<div id="_recruit-lawyer" class="cntBox">
						<h2 class="cntTitle _Title-underline">弁護士採用-弁護士の方-</h2>
						<ul class="cntList _Text">
							<li class="item">
								<h3 class="title">募集人数</h3>
								<p class="text">若干名</p>
							</li>
							<li class="item">
								<h3 class="title">応募方法</h3>
								<p class="text">
									履歴書、司法試験成績通知書、法科大学院の成績証明書を下記まで郵送にてお送りください。<br>
									〒460-0003<br>
									愛知県名古屋市中区錦1-11-20<br>
									平和不動産名古屋伏見ビル9階<br>
									弁護士法人GROWTH<br>
									南舘・北川・木村法律事務所　採用担当 宛
								</p>
							</li>
						</ul>
					</div>
					<div id="_recruit-staff" class="cntBox">
						<h2 class="cntTitle _Title-underline">スタッフ採用</h2>
						<ul class="cntList _Text">
							<li class="item">
								<h3 class="title">募集人数</h3>
								<p class="text">若干名</p>
							</li>
							<li class="item">
								<p class="text">
									現在募集しておりません<br>
									募集再開の際は新着情報にてお知らせいたします
								</p>
							</li>
						</ul>
					</div>
				</div>
			</section>
		</div>
		
		<!-- サイドバー -->
		<nav id="sidebar" class="--h-opacity">
			<h2 class="cntTitle _Slider-tabsp --tab-sp">募集要項</h2>
			<div class="cntInner">
				<div class="cntBox -bg">
					<h2 class="title --pc">募集要項</h2>
					<ul class="cntList">
						<li><a class="link" href="#_recruit-trainees">弁護士採用　司法修習生の方</a></li>
						<li><a class="link" href="#_recruit-lawyer">弁護士採用　弁護士の方</a></li>
						<li><a class="link" href="#_recruit-staff">スタッフ採用</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</div>

	<?php get_template_part( 'content', 'access' ); ?>
	<?php get_template_part( 'content', 'contact' ); ?>

</main>

<?php get_footer(); ?>