<?php
if (isset($_GET['id'])) :
    $userId = $_GET['id'];
endif;
$lastMessages = $database->getData("messages", 0, " WHERE messages_id=$userId"); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Mesaj Yanıtla</h1>
     <!-- Form items-->
     <div class="form-row">
            <div class="col-md-6">
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="messages_name">Mesaj Gönderici İsim </label>
                            <input type="text" class="form-control" id="messages_name" required disabled placeholder="Mesaj Gönderici İsim Adresini Giriniz.." value="<?= $lastMessages['messages_name'] ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="messages_mail">Mesaj Gönderici Mail </label>
                            <input type="text" class="form-control" id="messages_mail" required placeholder="Mesaj Gönderici Mail Adresini Giriniz.." disabled value="<?= $lastMessages['messages_mail'] ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form items-->
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="messages_subject">Mesaj Gönderim Konusu </label>
                            <input type="text" class="form-control" id="messages_subject" required disabled placeholder="Mesaj Gönderim Konusunu Giriniz.." value="<?= $lastMessages['messages_subject'] ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="messages_time">Mesaj Gönderim Zamanı </label>
                            <input type="text" class="form-control" id="messages_time" required placeholder="Gönderim Zamanını Giriniz.." disabled value="<?= $lastMessages['messages_time'] ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form items-->
    <form action="" method="post" id="messagesForm" >       
        <div class="form-row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="messages_return">Yanıt Gönder (<?= $lastMessages['messages_mail'] ?>) </label>
                    <textarea class="form-control" name="messages_return" id="messages_return" cols="30" rows="10" required placeholder="Mesajınızı Giriniz.."></textarea>
                </div>
            </div>
        </div>
        <!-- Form End -->
        <!-- Hidden Inputs -->
        <input type="hidden" name="messages_subject" value="<?=$lastMessages['messages_subject']?>">
        <input type="hidden" name="messages_name" value="HarunDoğdu">
        <input type="hidden" name="messages_mail" value="harundogdu06@yandex.com">
        <input type="hidden" name="messages_send_mail" value="<?=$lastMessages['messages_mail']?>">
        <input type="hidden" name="messages_id" value="<?=$lastMessages['messages_id']?>">
        <hr>
        <div class="form-row my-2">
            <div class="col-md-12 text-center">
                <button id="btnSaveMessages" type="button" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Yanıtla</span>
                </button>
            </div>
        </div>
    </form>
</div>
<!-- /.container-fluid -->