	<!-- Sayfalama -->
	<?php
	$sayfa = @$_GET['sayfa'];
	if (!$sayfa || $sayfa < 1) {
		$sayfa = 1;
	}
	$toplamKayitSayisi = $database->rowCountTable("post");
	$limit = 6;
	$sayfaSayisi = ceil($toplamKayitSayisi / $limit);
	$goster = ($sayfa * $limit) - $limit;
	$gosterilecekSayfalama = 3;

	/* Ana Sorgular  */

	$post = $database->prepare("SELECT * FROM post INNER JOIN category ON category.category_id = post.post_cat_id ORDER BY post_id DESC LIMIT $goster,$limit");
	$post->execute();
	$lastPost = $post->fetchAll(PDO::FETCH_ASSOC);

	?>
	<head>
		<title>Anasayfa - <?= $lastSettings['settings_title'] ?></title>
	</head>
	<!-- Column 1 -->
	<div id="column-1">
		<!-- Posts -->
		<?php foreach ($lastPost as $data) :?>
			<div class="post-column">
				<a href="<?= $data['category_link'] ?>/post/<?= $data['post_seolink'] ?>" title="<?= $data['post_title'] ?>">
					<img src="img/<?= $data['post_img'] ?>" alt="deneme" width="440px" height="260px" />
				</a>
				<div class="post-column-bottom">
					<h1><a href="<?= $data['category_link'] ?>/post/<?= $data['post_seolink'] ?>" title="<?= $data['post_title'] ?>"><?= $data['post_title'] ?></a></h1>
					<div class="post-column-meta">
						<span>
							<a href="category/<?= $data['category_link'] ?>/1" title="<?= $data['post_title'] ?>">
								<i class="mdi mdi-pound-box"></i>
								<?= strtoupper($data['category_title']) ?>
							</a>
						</span>
						<span>
							<i class="mdi mdi-calendar-clock"></i>
							<?= $data['post_time'] ?>
						</span>
						<span>
							<i class="mdi mdi-comment"></i>
							<?php
							$lastCom = $database->getData("comment", 1, "INNER JOIN post ON post.post_id = comment.comment_post_id WHERE comment.comment_state = 1  AND comment.comment_top=0 AND post.post_id = " . $data['post_id']);
							echo count($lastCom);
							?> Yorum
						</span>
						<span style="border:0;">
							<i class="mdi mdi-eye"></i>
							<?= $data['post_see'] ?>
						</span>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		<div style="clear:both;"></div>
		<div id="page-numbers" class="box-shadow">
			<ul style="margin-left: 8px;">
				<?php if ($sayfa != 1) : ?>
					<li>
						<a href="sayfa/1">
							İlk
						</a>
					</li>
					<li>
						<a href="sayfa/<?= $sayfa - 1 ?>">
							Önceki
						</a>
					</li>
				<?php endif; ?>
				<?php
				for ($i = ($sayfa - $gosterilecekSayfalama); $i < ($sayfa + $gosterilecekSayfalama); $i++) :
					if ($i > 0 and $i <= $sayfaSayisi) :
						if ($i == $sayfa) :
							echo '<li><a style="background-color:darkblue;color:white;">' . $i . '</a></li>';
						else :
							echo '<li><a href="sayfa/' . $i . '">' . $i . '</a></li>';
						endif;
					endif;
				endfor;
				?>
				<?php
				if ($sayfa != $sayfaSayisi) :
				?>
					<li>
						<a href="sayfa/<?= $sayfa + 1 ?>">
							Sonraki
						</a>
					</li>
					<li>
						<a href="sayfa/<?= $sayfaSayisi ?>">
							Son
						</a>
					</li>
				<?php endif; ?>
			</ul>
			<div style="clear:both;"></div>
		</div>

		<?php /* include_once 'include/paging.php'  */ ?>
	</div>
	<!-- Column 1 END -->