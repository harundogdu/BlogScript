<?php
$lastSettings 	= $database->getData("settings");
$lastAbout 		= $database->getData("aboutme");
?>
	<head>
	<title>Hakkımda - <?= $lastSettings['settings_title'] ?></title>
	</head>
<!-- Column 1 -->
	<div id="column-1">
		<div class="page-cont box-shadow">
			<div id="hakkimda" style="text-align:center;">
				<img src="img/<?=$lastAbout['aboutme_img']?>" alt="<?=$lastAbout['aboutme_name']?>" width="100%" height="400px" />

				<h1 style="margin-top: 10px;"><?=$lastAbout['aboutme_name']?></h1>
				<p style="padding: 10px;"> 
				<?=$lastAbout['aboutme_content']?>
				</p>
				<ul style="margin-top: 20px;">

					<a style="text-decoration:none; color: white;" href="<?php echo $lastSettings["settings_facebook"]; ?>" target="_blank">
						<li style="border: 1px solid #4267b2; padding: 10px; background-color: #4267b2; margin-top: 10px;">Facebook</li>
					</a>				

					<a style="text-decoration:none; color: white;" href="<?php echo $lastSettings["settings_youtube"]; ?>" target="_blank">
						<li style="border: 1px solid #ff0019; padding: 10px; background-color: #ff0019; margin-top: 10px;">Youtube</li>
					</a>

					<a style="text-decoration:none; color: white;;" href="<?php echo $lastSettings["settings_instagram"]; ?>" target="_blank">
						<li style="border: 1px solid #d10869; padding: 10px; background-color: #d10869;  margin-top: 10px;">Instagram</li>
					</a>

				</ul>
			</div>
		</div>
		<div style="clear:both;"></div>
	</div>
	<!-- Column 1 END -->