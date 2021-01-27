<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kategori Ayarları</h1>

    <form action="data/islem.php?islem=addCategory" method="post">

        <div class="form-row">
            <div class="col-md-6">
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="category_title">Kategori Başlık </label>
                            <input type="text" class="form-control" name="category_title" id="category_title" required placeholder="Kategori Başlığı Giriniz..">
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <input type="hidden" name="category_id" value="<?= $lastCategory['category_id'] ?>">
        <hr>
        <div class="form-row my-2">
            <div class="col-md-12 text-center">
                <button id="btnCatAdd" type="submit" class="btn btn-danger btn-icon-split">
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