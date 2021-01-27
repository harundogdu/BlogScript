<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Sponsor Ayarları</h1>

    <form action="data/islem.php?islem=addPartner" method="post" id="aboutMeForm" enctype="multipart/form-data">
    
        <div class="form-row">
            <div class="col-md-5">
                <div class="form-row">                    
                    <div class="col">
                        <div class="form-group">
                            <label for="partner_img">Sponsor Resim </label>
                            <br>
                            <input type="file" name="partner_img" id="partner_img" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="form-group">
                    <label for="partner_link">Sponsor Link</label>
                    <input type="text" class="form-control" name="partner_link" id="partner_link" required placeholder="Sponsor Link Adresini Giriniz..">
                </div>
            </div>
        </div>                   
            <hr>
        <div class="form-row my-2">
            <div class="col-md-12 text-center">
                <button id="btnPartnerUpdate" type="submit" class="btn btn-success btn-icon-split">
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