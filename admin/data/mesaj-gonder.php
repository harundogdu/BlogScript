<?php
if ($_POST) :
    extract($_POST);
    /* Php Mailer  */
    require("class.phpmailer.php");
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 1; // Hata ayıklama değişkeni: 1 = hata ve mesaj gösterir, 2 = sadece mesaj gösterir
    $mail->SMTPAuth = true; //SMTP doğrulama olmalı ve bu değer değişmemeli
    $mail->SMTPSecure = 'tls'; // Normal bağlantı için tls , güvenli bağlantı için ssl yazın
    $mail->Host = "smtp.yandex.com"; // Mail sunucusunun adresi (IP de olabilir)
    $mail->Port = 587; // Normal bağlantı için 587, güvenli bağlantı için 465 yazın
    $mail->IsHTML(true);
    $mail->SetLanguage("tr", "phpmailer/language");
    $mail->CharSet  = "utf-8";
    $mail->Username = $messages_mail; // Gönderici adresinizin sunucudaki kullanıcı adı (e-posta adresiniz)
    $mail->Password = 'Harun123*'; // Mail adresimizin sifresi
    $mail->SetFrom($messages_mail, $messages_name); // Mail atıldığında gorulecek isim ve email (genelde yukarıdaki username kullanılır)
    $mail->AddAddress($messages_send_mail); // Mailin gönderileceği alıcı adres
    $mail->Subject = $messages_subject . "'e Yanıt Olarak"; // Email konu başlığı
    $mail->Body = $messages_return; // Mailin içeriği
    if (!$mail->Send()) {
        echo 'no';
    } else {
        $database->query("UPDATE messages SET messages_see = 1  WHERE messages_id = " . $messages_id);
        echo 'yes';
    }
/* Php mailer end */
endif;
