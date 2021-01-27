<?php
if (isset($_GET['id'])) :
    $userId = $_GET['id'];
endif;
$lastComment = $database->getData("comment", 0, " WHERE comment_id=$userId"); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Gelen Yorum Ayarları</h1>

    <form action="data/islem.php?islem=updateComment" method="post">

        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="comment_user">Yorum Kullanıcı İsmi</label>
                    <input type="text" class="form-control" name="comment_user" id="comment_user" required placeholder="Yorum Yapan Kişi İsmini Giriniz.." value="<?= $lastComment['comment_user'] ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="comment_mail">Yorum Kullanıcı Mail Adresi</label>
                    <input type="text" class="form-control" name="comment_mail" id="comment_mail" required placeholder="Yorum Yapan Kişi Mailini Giriniz.." value="<?= $lastComment['comment_mail'] ?>">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="comment_time">Yorum Zamanı</label>
                    <input type="text" class="form-control" name="comment_time" id="comment_time" required placeholder="Yorum Zamanını Giriniz.." disabled value="<?= $lastComment['comment_time'] ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="comment_mail">Yorum Onay Durumu</label>
                    <select name="comment_state" id="comment_state" required class="form-control">
                        <option value="0" <?php echo $lastComment['comment_state']==0 ? "selected" : "" ; ?>>Onaylı Değil</option>
                        <option value="1" <?php echo $lastComment['comment_state']==1 ? "selected" : "" ; ?>>Onaylı</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="comment_content">Yorum</label>
                    <textarea name="comment_content" id="comment_content" cols="30" rows="10" required placeholder="Kullanıcı Yorumunu Giriniz..." class="form-control"><?=$lastComment['comment_content']?></textarea>
                </div>
            </div>
        </div>

        <input type="hidden" name="comment_id" value="<?= $lastComment['comment_id'] ?>">
        <hr>
        <div class="form-row my-2">
            <div class="col-md-12 text-center">
                <button id="btnPartnerUpdate" type="submit" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Güncelle</span>
                </button>
            </div>
        </div>

    </form>
</div>
<!-- /.container-fluid -->