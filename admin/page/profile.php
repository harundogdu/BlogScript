 <?php $lastProfile = $database->getData("admin"); ?>
 <!-- Begin Page Content -->
 <div class="container-fluid">
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Profil Ayarları</h1>
     <form action="data/islem.php?islem=updateProfileName" method="post">
         <div class="form-row">             
             <div class="col-md-12">
                 <div class="form-group">
                     <label for="admin_user">Kullanıcı Adı</label>
                     <input type="text" class="form-control" name="admin_user" id="admin_user" required placeholder="Site Kullanıcı Adını Giriniz.." value="<?= $lastProfile['admin_user'] ?>">
                 </div>
             </div>
         </div>       

         <div class="form-row my-2">
             <div class="col-md-12 text-center">
                 <button id="updateProfileName" type="submit" class="btn btn-success btn-icon-split">
                     <span class="icon text-white-50">
                         <i class="fas fa-check"></i>
                     </span>
                     <span class="text">Güncelle</span>
                 </button>
             </div>
         </div>

     </form>
     <hr>
     <form action="data/islem.php?islem=updateProfilePassword" method="post">
         <div class="form-row">             
             <div class="col-md-4">
                 <div class="form-group">
                     <label for="admin_user">Kullanıcı Eski Şifre</label>
                     <input type="password" class="form-control" name="admin_psw" id="admin_psw" required placeholder="Kullanıcı Eski Şifresini Giriniz..">
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="form-group">
                     <label for="admin_user">Kullanıcı Yeni Şifre</label>
                     <input type="password" class="form-control" name="admin_psw_new" id="admin_psw_new" required placeholder="Kullanıcı Yeni Şifresini Giriniz..">
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="form-group">
                     <label for="admin_user">Kullanıcı Yeni Şifre Tekrar</label>
                     <input type="password" class="form-control" name="admin_psw_again" id="admin_psw_again" required placeholder="Kullanıcı Yeni Şifresini Giriniz..">
                 </div>
             </div>
         </div>       

         <div class="form-row my-2">
             <div class="col-md-12 text-center">
                 <button id="btnProfilePassword" type="submit" class="btn btn-success btn-icon-split">
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