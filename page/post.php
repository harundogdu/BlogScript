<?php
if (isset($_GET)) :
	$seoLink = $_GET['postTitle'];
	$categoryLink = $_GET['categoryName'];
endif;
$lastPost = $database->getData("post", 0, " INNER JOIN category ON post.post_cat_id = category.category_id WHERE post_seolink='$seoLink' ");
$lastArticles = $database->getData("post", 1, " INNER JOIN category ON post.post_cat_id = category.category_id WHERE category_link='$categoryLink' AND NOT post_seolink='$seoLink' ORDER BY post.post_id DESC LIMIT 4");
$lastPostId = $lastPost['post_id'];
$lastComment = $database->getData("post", 1, " INNER JOIN comment ON post.post_id = comment.comment_post_id WHERE (comment.comment_post_id = $lastPostId) AND (comment.comment_state = 1) AND (comment.comment_top = 0) ");

$okunmaDurumu = @$_COOKIE[$lastPost['post_id']];
if (!$okunmaDurumu) {
	$okunmaDurumu = $database->setQuery("UPDATE post SET", "post_see=? WHERE post_id =?", array($lastPost['post_see'] + 1, $lastPost['post_id']));
	@setcookie("" . $lastPost['post_id'], "_", time() + 3600);
}
?>

<head>
	<title><?= $lastPost['post_title'] ?> - <?= $lastSettings['settings_title'] ?></title>
</head>
<!-- Column 1 -->
<div id="column-1">
	<!-- Post -->
	<div class="post">
		<div class="post-header">
			<h1><?= $lastPost['post_title'] ?></h1>
		</div>
		<div class="post-meta">
			<p>
				<span>
					<a title="Admin">
						<i class="mdi mdi-account-circle"></i>
						<?php $lastAdmin = $database->getData("admin");
						echo $lastAdmin['admin_user']; ?>
					</a>
				</span>
				<span>
					<a href="<?= "category/" . $lastPost['category_link'] ?>/1" title="#">
						<i class="mdi mdi-pound-box"></i>
						<?= $lastPost['category_title'] ?>
					</a>
				</span>
				<span>
					<i class="mdi mdi-calendar-clock"></i>
					<?= $lastPost['post_time'] ?>
				</span>
				<span>
					<i class="mdi mdi-comment"></i>
					<?php
					$lastCom = $database->getData("comment", 1, "INNER JOIN post ON post.post_id = comment.comment_post_id WHERE comment.comment_state = 1  AND comment.comment_top=0 AND post.post_id = " . $lastPost['post_id']);
					echo count($lastCom);
					?> Yorum
				</span>
				<span style="border:0;">
					<i class="mdi mdi-eye"></i>
					<?= $lastPost['post_see'] ?>
				</span>
			</p>
		</div>
		<div class="post-thumbnail">
			<img src="img/<?= $lastPost['post_img'] ?>" alt="<?= $lastPost['post_title'] ?>">
		</div>
		<div class="post-text">
			<?= $lastPost['post_content'] ?>
		</div>
		<div style="clear:both;"></div>
		<div class="post-info">
			<p>Yazıya yorum yapmayı unutmayınız...</p>
			<div style="clear:both;"></div>
		</div>

	</div>
	<!-- Post -->
	<!-- Related Post-->
	<div class="related-post">
		<h2>Benzer Yazılar</h2>
		<?php foreach ($lastArticles as $data) : ?>

			<div class="related-post-item">
				<a href="<?= $data['category_link'] ?>/post/<?= $data['post_seolink'] ?>"><img src="img/<?= $data['post_img'] ?>" /></a>
				<h3><a href="<?= $data['category_link'] ?>/post/<?= $data['post_seolink'] ?>"><?= $data['post_title'] ?></a></h3>
				<p><?= $data['post_time'] ?></p>
			</div>
		<?php endforeach; ?>
	</div>
	<!-- Related Post End -->

	<!-- Yorumlar-->
	<div class="related-post">
		<h2>Yapılan Yorumlar</h2>
		<div class="sidebar-post" style="height: auto;">
			<?php if (count($lastComment) > 0) : ?>
				<?php foreach ($lastComment as $data) : ?>
					<div class="sidebar-post-info">
						<b style="text-transform: capitalize;"><?= $data['comment_user'] ?></b>
						<span style="float:right;"><?= $data['comment_time'] ?></span>
					</div>
					<div class="sidebar-post-meta">
						<p><big><i><?= $data['comment_content'] ?></i></big></p>
					</div>
					<!-- cevap -->
					<?php
					$lastAnswer = $database->getData("comment", 1, "WHERE comment_top =" . $data['comment_id']);
					foreach ($lastAnswer as $row) :
					?>
						<div class="sidebar-post" style="height: auto; background-color: #ddd; margin: 20px 0;">
							<div class="sidebar-post-info">
								<b style="text-transform: capitalize;"><?= $row['comment_user'] ?></b>
								<span style="float:right;"><?= $row['comment_time'] ?></span>
							</div>
							<div class="sidebar-post-meta">
								<p><big><?= $row['comment_content'] ?></i></big></p>
							</div>
						</div>
					<?php
					endforeach; ?>
					<!-- end cevap -->
				<?php endforeach; ?>
			<?php
			else : ?>
				<div class="sidebar-post-info">
					<b style="text-transform: capitalize;">Henüz Yorum Yok !</b>
					<span style="float:right;">Ne duruyorsun , Yorum yapsana !</span>
				</div>
			<?php
			endif; ?>
		</div>
	</div>
	<!-- Yorumlar End -->

	<!-- Yorum Yap-->
	<div class="related-post" style="padding-bottom: 0;">
		<h2>Yorum Yap</h2>
		<div id="page" style="padding: 0; margin-left: 15px; width: 100%;">
			<form action="data/add-comment.php" method="post" id="commentForm">
				<input type="hidden" name="comment_post_id" value="<?= $lastPost['post_id'] ?>">
				<p class="cont">Lütfen aşağıdaki alanları eksiksiz doldurunuz.</p>
				<div class="fieldset">
					<input type="text" name="comment_user" placeholder="Adınız Soyadınız" required />
				</div>
				<div class="fieldset">
					<input type="email" name="comment_mail" placeholder="Email Adresiniz" required />
				</div>
				<div class="fieldset">
					<input type="text" name="comment_website" placeholder="https:/www.harundogdu.com.tr" required />
				</div>
				<div style="clear:both;"></div>
				<div class="fieldset-textarea">
					<textarea name="comment_content" rows="10" placeholder="Yorumunuzz..." required></textarea>
				</div>
				<button id="btnSave" type="submit" class="submit" style="float:right; margin-right:3%; margin-top:3%; margin-bottom:5%;">Gönder</button>
			</form>
		</div>
	</div>
	<!-- Yorum Yap End -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('#btnSave').click(function(e) {
				e.preventDefault();
				$.ajax({
					type: "POST",
					url: "data/add-comment.php",
					data: $('#commentForm').serialize(),
					success: function(response) {
						console.log(response);
						if (response == "empty") {
							swal("Dikkat!", "Lütfen Boş Geçmeyiniz!", "warning");
						} else if (response == "no") {
							swal("Hata !", "Yorum Gönderilirken Bir Sorun Oluştu !", "warning");
						} else if (response == "yes") {
							swal({
								title: "Tebrikler !",
								text: "Yorumunuz Başarıyla Gönderilmiştir !",
								icon: "success",
								html: true,
								timer: 2000
							}).then(() => {
								location.reload();
							});
						}
					}
				});
			});
		});
	</script>
</div>