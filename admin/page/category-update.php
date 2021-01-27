<?php
if (isset($_GET['id'])) :
    $userId = $_GET['id'];
endif;
$lastCategory = $database->getData("category", 0, " WHERE category_id=$userId"); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kategori Ayarları</h1>

    <form action="data/islem.php?islem=updateCategory" method="post">

        <div class="form-row">
            <div class="col-md-6">
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="category_title">Kategori Başlık </label>
                            <input type="text" class="form-control" name="category_title" id="category_title" required placeholder="Kategori Link Adresini Giriniz.." value="<?= $lastCategory['category_title'] ?>">
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <input type="hidden" name="category_id" value="<?= $lastCategory['category_id'] ?>">
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