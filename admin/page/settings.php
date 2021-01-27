 <?php $lastSettings = $database->getData("settings"); ?>
 <!-- Begin Page Content -->
 <div class="container-fluid">
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Site Ayarları</h1>
     <form action="data/islem.php?islem=updateSettings" method="post" id="settingsForm">
         <div class="form-row">
             <div class="col-md-6">
                 <div class="form-group">
                     <label for="settings_base">Site Base</label>
                     <input type="text" class="form-control" name="settings_base" id="settings_base" required placeholder="Site Url Adresini Giriniz.." value="<?= $lastSettings['settings_base'] ?>">
                 </div>
             </div>
             <div class="col-md-6">
                 <div class="form-group">
                     <label for="settings_title">Site Title</label>
                     <input type="text" class="form-control" name="settings_title" id="settings_title" required placeholder="Site Title Adresini Giriniz.." value="<?= $lastSettings['settings_title'] ?>">
                 </div>
             </div>
         </div>

         <div class="form-row">
             <div class="col-md-6">
                 <div class="form-group">
                     <label for="settings_keyw">Site Keywords</label>
                     <input type="text" class="form-control" name="settings_keyw" id="settings_keyw" required placeholder="Site Keywords Giriniz.." value="<?= $lastSettings['settings_keyw'] ?>">
                 </div>
             </div>
             <div class="col-md-6">
                 <div class="form-group">
                     <label for="settings_instagram">Site İnstagram Adresi</label>
                     <input type="text" class="form-control" name="settings_instagram" id="settings_instagram" required placeholder="Site İnstagram Adresini Giriniz.." value="<?= $lastSettings['settings_instagram'] ?>">
                 </div>

             </div>
         </div>

         <div class="form-row">
             <div class="col-md-6">
                 <div class="form-group">
                     <label for="settings_facebook">Site Facebook Adresi</label>
                     <input type="text" class="form-control" name="settings_facebook" id="settings_facebook" required placeholder="Site Facebook Adresini Giriniz.." value="<?= $lastSettings['settings_facebook'] ?>">
                 </div>

             </div>
             <div class="col-md-6">
                 <div class="form-group">
                     <label for="settings_youtube">Site Youtube Adresi</label>
                     <input type="text" class="form-control" name="settings_youtube" id="settings_youtube" required placeholder="Site Youtube Adresini Giriniz.." value="<?= $lastSettings['settings_youtube'] ?>">
                 </div>
             </div>
         </div>

         <div class="form-row">
             <div class="col-md-4">
                 <div class="form-group">
                     <label for="settings_owner">Site Kurucusu</label>
                     <input type="text" class="form-control" name="settings_owner" id="settings_owner" required placeholder="Site Kurucu İsmini Giriniz.." value="<?= $lastSettings['settings_owner'] ?>">
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="form-group">
                     <label for="settings_author">Site Yazar</label>
                     <input type="text" class="form-control" name="settings_author" id="settings_author" required placeholder="Site Yazar İsmini Giriniz.." value="<?= $lastSettings['settings_author'] ?>">
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="form-group">
                     <label for="settings_blogTitle">Site Logo Yazısı</label>
                     <input type="text" class="form-control" name="settings_blogTitle" id="settings_blogTitle" required placeholder="Site Logo Yazısını Giriniz.." value="<?= $lastSettings['settings_blogTitle'] ?>">
                 </div>
             </div>
         </div>

         <div class="form-row">
             <div class="col-md-12">
                 <label for="">Site Açıklama</label>
                 <textarea name="settings_desc" cols="30" rows="10" class="form-control" placeholder="Site Açıklaması Giriniz.." required><?= $lastSettings['settings_desc'] ?></textarea>
             </div>
         </div>

         <div class="form-row my-2">
             <div class="col-md-12 text-center">
                 <button id="btnSettings" type="submit" class="btn btn-success btn-icon-split">
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