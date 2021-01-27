<?php
require_once '../config.php';
require_once '../include/header.php';
if (isset($_GET)) : $search = $_GET['search'];
endif;

/* Sayfalama */
$sayfa = @$_GET['sayfa'];
if (!$sayfa || $sayfa < 1) :
	$sayfa = 1;
endif;
$limit = 6;
$lastCategory = $database->getData("category", 1, " INNER JOIN post ON category.category_id = post.post_cat_id WHERE post.post_title LIKE '%$search%' OR category.category_title LIKE '%$search%' ORDER BY post_id DESC");
$toplamSayfa =  count($lastCategory);
$sayfaSayisi = ceil($toplamSayfa / $limit);
$goster = $sayfa * $limit - $limit;
$gosterilecekSayfalama = 3;

$lastCategory = $database->getData("category", 1, " INNER JOIN post ON category.category_id = post.post_cat_id WHERE post.post_title LIKE '%$search%' OR category.category_title LIKE '%$search%' ORDER BY post_id DESC LIMIT $goster,$limit");
?>

<head>
	<title><?= strtoupper($search) ?> Sonuçları - <?= $lastSettings['settings_title'] ?></title>
</head>
<!-- Column 1 -->
<div id="column-1">
	<div class="page-subject">
		<span style="color: orange;"><?= $search ?></span> ile ilgili sonuçlar..
	</div>

	<?php foreach ($lastCategory as $data) :
		$okunmaDurumu = @$_COOKIE[$data['post_id']];
		if (!$okunmaDurumu) {
			$okunmaDurumu = $database->setQuery("UPDATE post SET", "post_see=? WHERE post_id =?", array($data['post_see'] + 1, $data['post_id']));
			@setcookie("" . $data['post_id'], "_", time() + 3600);
		}
	?>
		<div class="post-column">
			<a href="<?= $data['category_link'] ?>/post/<?= $data['post_seolink'] ?>" title="<?= $data['post_title'] ?>">
				<img src="img/<?= $data['post_img'] ?>" alt="<?= $data['post_title'] ?>" style="object-fit: cover;" width="440px" height="260px" />
			</a>
			<div class="post-column-bottom">
				<h1>
					<a href="<?= $data['category_link'] ?>/post/<?= $data['post_seolink'] ?>" title="<?= $data['post_title'] ?>">
						<?= $data['post_title'] ?>
					</a>
				</h1>
				<div class="post-column-meta">
					<span>
						<a href="category/<?= $data['category_link'] ?>" title="<?= $data['category_title'] ?>">
							<i class="mdi mdi-pound-box"></i>
							<?= $data['category_title'] ?>
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
	<?php
	if (count($lastCategory) > 0) :
	?>
		<div style="clear:both;"></div>
		<div id="page-numbers" class="box-shadow">
			<ul style="margin-left: 8px;">
				<?php if ($sayfa != 1) : ?>
					<li><a href="data/<?= $search ?>/1">
							<< İlk</a> </li> <li><a href="data/<?= $search ?>/<?= $sayfa - 1 ?>">
									< Önceki</a> </li> <?php endif; ?> <?php
																		for ($i = ($sayfa - $gosterilecekSayfalama); $i < ($sayfa + $gosterilecekSayfalama); $i++) :
																			if ($i > 0 and $i <= $sayfaSayisi) :
																				if ($i == $sayfa) :
																					echo '<li><a style="background-color:darkblue;color:white;">' . $i . '</a></li>';
																				else :
																		?><li><a href="data/<?= $search ?>/<?= $i ?>"><?= $i ?></a></li>
		<?php
																				endif;
																			endif;
																		endfor;
		?>
		<?php if ($sayfa != $sayfaSayisi) : ?>
			<li><a href="data/<?= $search ?>/<?= $sayfa + 1 ?>">Sonraki ></a></li>
			<li><a href="data/<?= $search ?>/<?= $sayfaSayisi ?>">Son >></a></li>
		<?php endif; ?>
			</ul>
			<div style="clear:both;"></div>
		</div>
	<?php
	else :
		echo '<div style="color:red;font-size:36px;font-weight:bold;"> Sonuç Bulunamadı !</div>';
	endif;
	?>
</div>
<!-- Column 1 END -->
<?php require_once '../include/menu.php'; ?>
<?php require_once '../include/footer.php'; ?>