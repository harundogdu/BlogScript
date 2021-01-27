<?php
if (isset($_GET['id'])) :
    $userId = $_GET['id'];
endif;
$lastPost = $database->getData("post", 0, " INNER JOIN category ON post.post_cat_id = category.category_id WHERE post_id=$userId"); ?>
<?php $lastCategory = $database->getData("category", 1); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Yazı Ayarları</h1>

    <form action="data/islem.php?islem=postUpdate" method="post" id="updatePostForm" enctype="multipart/form-data">

        <div class="form-row">
            <div class="col-md-6">
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="post_img">Yazı Resim</label>
                            <br>
                            <input type="file" name="post_img" id="post_img">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="post_img">Güncel Resim</label>
                            <br>
                            <img width="100" src="<?= SITE . "img/" . $lastPost['post_img'] ?>" alt=" Güncel Resim">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="post_title">Yazı Başlık</label>
                    <input type="text" class="form-control" name="post_title" id="post_title" required placeholder="Yazı Başlığını Giriniz.." value="<?=$lastPost['post_title']?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="post_cat_id">Yazı Kategorisi</label>
                    <select name="post_cat_id" id="post_cat_id" class="form-control" required>
                        <?php
                        foreach ($lastCategory as $data) :
                            
                            if($data['category_title'] == $lastPost['category_title']):
                                echo '<option value="' . $data['category_id'] . '" selected="selected">' . $data['category_title'] . '</option>';
                            else:
                                echo '<option value="' . $data['category_id'] . '" >' . $data['category_title'] . '</option>';
                            endif;
                          
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
                    <textarea class="form-control" required placeholder="Yazı İçeriğini Giriniz.." name="post_content" id="post_content" cols="30" rows="10"><?=$lastPost['post_content']?>"</textarea>
                </div>
            </div>
        </div>
        <input type="hidden" name="post_img_old" value="<?= $lastPost['post_img'] ?>">
        <input type="hidden" name="post_id" value="<?= $lastPost['post_id'] ?>">
        <hr>
        <div class="form-row my-2">
            <div class="col-md-12 text-center">
                <button id="btnAddPost" type="submit" class="btn btn-primary btn-icon-split">
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