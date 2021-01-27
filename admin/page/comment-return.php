<?php
if (isset($_GET['id'])) :
    $userId = $_GET['id'];
endif;
$lastComment = $database->getData("comment", 0, " WHERE comment_id=$userId"); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Gelen Yorum Ayarları</h1>

    <form action="data/islem.php?islem=returnComment" method="post">

        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Yorum Kullanıcı İsmi</label>
                    <input type="text" class="form-control" required placeholder="Yorum Yapan Kişi İsmini Giriniz.." value="<?= $lastComment['comment_user'] ?>" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Yorum Zamanı</label>
                    <input type="text" class="form-control" required placeholder="Yorum Zamanını Giriniz.." disabled value="<?= $lastComment['comment_time'] ?>">
                </div>
            </div>
        </div>        

        <div class="form-row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Gelen Yorum</label>
                    <textarea cols="30" rows="10" required placeholder="Kullanıcı Yorumunu Giriniz..." class="form-control" disabled><?=$lastComment['comment_content']?></textarea>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="comment_content">Yorum Cevapla</label>
                    <textarea name="comment_content" id="comment_content" cols="30" rows="10" required class="form-control"></textarea>
                </div>
            </div>
        </div>

        <input type="hidden" name="comment_id" value="<?= $lastComment['comment_id'] ?>">
        <input type="hidden" name="comment_user" value="Admin">
        <input type="hidden" name="comment_mail" value="harundogdu@harundogdu.com.tr">
        <input type="hidden" name="comment_website" value="https://harundogdu.com.tr/">
        <input type="hidden" name="comment_post_id" value="<?= $lastComment['comment_post_id']?>">
        <hr>
        <div class="form-row my-2">
            <div class="col-md-12 text-center">
                <button id="btnPartnerUpdate" type="submit" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Cevapla</span>
                </button>
            </div>
        </div>

    </form>
</div>
<!-- /.container-fluid -->