<?php $lastPost = $database->getData("category",1); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Yazı Ayarları</h1>

    <form action="data/islem.php?islem=addPost" method="post" id="adPostForm" enctype="multipart/form-data">

        <div class="form-row">
            <div class="col-md-12">
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="post_img">Yazı Resim</label>
                            <br>
                            <input type="file" name="post_img" id="post_img" required>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="post_title">Yazı Başlık</label>
                    <input type="text" class="form-control" name="post_title" id="post_title" required placeholder="Yazı Başlığını Giriniz..">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="partner_link">Yazı Kategorisi</label>
                    <select name="post_cat_id" id="post_cat_id" class="form-control" required>
                       <?php
                       foreach($lastPost as $data):
                        echo '<option value="'.$data['category_id'].'">'.$data['category_title'].'</option>';
                       endforeach;
                       
                       ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="post_content">Yazı İçerik</label>
                    <textarea class="form-control" required placeholder="Yazı İçeriğini Giriniz.." name="post_content" id="post_content" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>

        <div class="form-row my-2">
            <div class="col-md-12 text-center">
                <button id="btnAddPost" type="submit" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Ekle</span>
                </button>
            </div>
        </div>

    </form>
</div>
<!-- /.container-fluid -->