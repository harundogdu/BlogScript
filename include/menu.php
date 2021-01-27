<?php
$lastSettings = $database->getData("settings");
$lastCategory = $database->getData("category", 1, " ORDER BY category_id ASC");
$lastPost = $database->getData("post", 1, " INNER JOIN category ON post.post_cat_id = category.category_id ORDER BY post_see DESC LIMIT 5");
?>
<!-- Column 2 -->
<div id="column-2">
	<div class="sidebar">
		<form action="data/search.php" method="get">
		<input type="search" class="search-field" placeholder="Arama …" name="search" title="Arama:">
		</form>

	</div>
	<div class="sidebar">
		<h4>Popüler Yazılarım</h4>

		<?php foreach ($lastPost as $data) : ?>
			<div class="sidebar-post">
				<a href="<?= $data['category_link'] ?>/post/<?= $data['post_seolink'] ?>"><img src="img/<?= $data['post_img'] ?>" alt="<?= $data['post_title'] ?>" /></a>
				<div class="sidebar-post-info">
					<h3><a href="<?= $data['category_link'] ?>/post/<?= $data['post_seolink'] ?>"><?= $data['post_title'] ?></a></h3>
				</div>
				<div class="sidebar-post-meta">
					<?= $data['post_time'] ?>
				</div>
			</div>
		<?php endforeach; ?>



	</div>

	<div class="sidebar">
		<h4>KATEGORİLER</h4>

		<ul class="social list">
			<?php

			foreach ($lastCategory as $data) :
			?>
				<li class="border" style="text-align:right;">
					<a href="category/<?= $data['category_link'] ?>/1">
						<i class="mdi mdi-pound-box mdi-24px" style="float:left; margin-right: 5px; color: lightblue;"></i>
						<span style="float:left;"><?= $data['category_title'] ?></span>
						<?php
						$last = $database->prepare("SELECT * FROM post WHERE post_cat_id = ?");
						$last->execute(array($data['category_id']));
						$last->fetchAll(PDO::FETCH_ASSOC);
						$total = $last->rowCount();
						?>
						<span style="padding-left: 3px; padding-right: 3px; background-color: lightblue; color: white; border-radius: 5px;"> <?= $total ?> </span>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>

	<div class="sidebar">
		<h4>Sosyal Aglar</h4>
		<ul class="social list">
			<li class="border">
				<a href="<?= $lastSettings['settings_facebook'] ?>"><img src="img/socials/facebook.png" alt="Facebook" /><span>Facebook</span></a>
			</li>
			<li class="border">
				<a href="<?= $lastSettings['settings_youtube'] ?>"><img src="img/socials/youtube.png" alt="Youtube" /><span>Youtube</span></a>
			</li>
			<li style="padding-bottom:0 !important;">
				<a href="<?= $lastSettings['settings_instagram'] ?>"><img src="img/socials/instagram.png" alt="Instagram" /><span>Instagram</span></a>
			</li>
		</ul>
	</div>
</div>
<!-- Column 2 END -->
<div style="clear:both;"></div>
</div>