<head>
	<title>İletişim - <?= $lastSettings['settings_title'] ?></title>
</head>
<!-- Column 1 -->
<div id="column-1">
	<!-- <div class="page-subject"> İletişim </div> -->
	<div class="page-cont box-shadow">
		<div id="page">
			<form action="" method="post" id="contactForm">
				<p class="cont">Lütfen aşağıdaki alanları eksiksiz doldurunuz.</p>
				<div class="fieldset">
					<input type="text" name="messages_name" placeholder="Adınız Soyadınız" />
				</div>
				<div class="fieldset">
					<input type="email" name="messages_mail" placeholder="Email Adresiniz" />
				</div>
				<div class="fieldset">
					<input type="text" name="messages_subject" placeholder="Mesaj Konusu" />
				</div>
				<div style="clear:both;"></div>
				<div class="fieldset-textarea">
					<textarea name="messages_message" rows="10" placeholder="Mesajınız"></textarea>
				</div>
				<button type="submit" class="submit" style="float:right; margin-right:3%; margin-top:3%; margin-bottom:5%;" id="btnContact">Gönder</button>
			</form>
		</div>
	</div>
	<div style="clear:both;"></div>
</div>
<!-- Column 1 END -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#btnContact').click(function(e) {
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: "data/add-messages.php",
				data: $('#contactForm').serialize(),
				success: function(response) {
					console.log(response);
					if (response == "empty") {
						swal("Dikkat ! ", "Lütfen Boş Bırakmayınız !", "warning");
					} else if (response == "no") {
						swal("Hata !", "Mesaj Gönderilirken Bir Hata Oluştu !", "warning");
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