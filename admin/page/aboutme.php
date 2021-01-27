<?php $lastAbout = $database->getData("aboutme"); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Hakkımda Ayarları</h1>

    <form action="data/islem.php?islem=updateAbout" method="post" id="aboutMeForm" enctype="multipart/form-data">
    
        <div class="form-row">
            <div class="col-md-8">
                <div class="form-row">
                    <div class="col">
                        <label for="">Güncel Resim</label>
                        <br>
                        <img width="125" src="<?= SITE . "img/" .  $lastAbout['aboutme_img'] ?>" alt="Güncel Resim">
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="aboutme_img">Hakkımda Resim </label>
                            <br>
                            <input type="file" name="aboutme_img" id="aboutme_img">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="aboutme_name">Hakkımda İsim</label>
                    <input type="text" class="form-control" name="aboutme_name" id="aboutme_name" required placeholder="Site Title Adresini Giriniz.." value="<?= $lastAbout['aboutme_name'] ?>">
                </div>
            </div>
        </div>

        <div class="form-row mt-3">
            <div class="col-md-12">
                <label for="aboutme_content">Hakkımda Açıklama</label>
                <textarea name="aboutme_content" id="aboutme_content" cols="30" rows="10" class="form-control" placeholder="Site Açıklaması Giriniz.." required><?= $lastAbout['aboutme_content'] ?></textarea>
            </div>
        </div>
            <input type="hidden" name="aboutme_img_old" value="<?=$lastAbout['aboutme_img']?>">
            <input type="hidden" name="aboutme_id" value="<?=$lastAbout['aboutme_id']?>">
        <div class="form-row my-2">
            <div class="col-md-12 text-center">
                <button id="btnAboutMe" type="submit" class="btn btn-success btn-icon-split">
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