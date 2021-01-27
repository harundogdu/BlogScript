<?php
@session_start();
if(isset($_SESSION['login'])):
header("Location:homepage.html");
endif;
require_once '../config.php';
require_once INC . 'header.php';
$lastSettings = $database->getData("settings");
?>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
</head>
<body class="bg-gradient-info">

  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <?php
      if ($_POST) :
        extract($_POST);
        if ($database->loginControl($admin_user, $admin_psw)) :
          echo '
          <script>
            swal({
              title: "Başarılı!",
              text: "Başarıyla Giriş Yaptınız!",
              icon: "success",
              html: true,
              timer: 2000
            }).then(() => {
              window.location = "homepage.html";
            });
          </script>';
        else :
          echo '
          <script>
            swal({
              title: "Hata!",
              text: "Giriş Yaparken Bir Sorun Oluştu! Lütfen Tekrar Deneyin !",
              icon: "warning",
              html: true,
              timer: 1500
            }).then(() => {
              window.location = "login.php";
            });
          </script>';
        endif;
      else :
      ?>
        <div class="col-xl-10 col-lg-12 col-md-9">
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row" style="height: 80vh;">
                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                <div class="col-lg-6" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4"><?= $lastSettings['settings_title'] ?> - Yönetim Paneli</h1>
                    </div>
                    <form class="user" method="POST">
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="admin_user" aria-describedby="admin_user" name="admin_user" placeholder="Kullanıcı Adınızı Giriniz.." required>
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="admin_psw" placeholder="Şifre Giriniz.." name="admin_psw" required>
                      </div>
                      <button name="btnLogin" type="submit" class="btn btn-primary btn-user btn-block">
                        Giriş Yap
                      </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
 
</body>

</html>