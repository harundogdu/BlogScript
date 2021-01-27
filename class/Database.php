<?php
ob_start();
@session_start();

class Database extends PDO
{
    var $hostName       = "localhost";
    var $databaseName   = "blog_script";
    var $username       = "root";
    var $passwordName   = "";

    function __construct()
    {
        parent::__construct("mysql:host=" . $this->hostName . ";dbname=" . $this->databaseName . ";charset=utf8;", $this->username, $this->passwordName);
    }

    /* Veri Getir */
    public function getData($tableName, $default = 0, $condition = "")
    {
        $sqlQuery = "SELECT * FROM " . $tableName;

        if ($condition != "") :
            $sqlQuery .= " " . $condition;
        endif;

        $sqlGetData = $this->prepare($sqlQuery);
        $sqlGetData->execute();

        if ($default == 0) :
            $last = $sqlGetData->fetch(PDO::FETCH_ASSOC);
        else :
            $last = $sqlGetData->fetchAll(PDO::FETCH_ASSOC);
        endif;

        return $last;
    }

    /* Filtreleme Fonksiyonu */
    public function filterSyntax($value, $tf = true)
    {
        if ($tf == true) {
            $value = strip_tags($value);
        }
        $value = addslashes(trim($value));
        return $value;
    }
    
    /* Sorgu Çalıştır */
    public function setQuery($query, $data, $arr)
    {
        $sqlQuery = $query . " " . $data;

        $lastQuery = $this->prepare($sqlQuery);
        $last = $lastQuery->execute($arr);
        if ($last) :
            return true;
        else :
            return false;
        endif;
    }

    /* login Control */
    public function loginControl($username, $password)
    {
        $password = md5($password);
        $sqlQuery = "SELECT * FROM admin WHERE admin_user = ? AND admin_psw = ? ";
        $lastLogin = $this->prepare($sqlQuery);
        $last = $lastLogin->execute(array($username, $password));

        if ($lastLogin->rowCount() > 0) :
            $_SESSION['login'] = true;
            return true;
            /* echo '<div class="alert alert-success">Başarıyla Giriş Yapılıyor</div>';
            header("Refresh:2, url=homepage.html"); */
        else :
           /*  echo '<div class="alert alert-danger">Hatalı Kulanıcı Adı / Parola</div>';
            header("Refresh:2, url=login.php"); */
            return false;
        endif;
    }

    /* RowCount */
    public function rowCountTable($tableName)
    {
        $last = $this->prepare("SELECT * FROM " . $tableName);
        $last->execute();

        $total = $last->rowCount();

        return $total;
    }
    /* Upload Function */
    public function uploadImage($file, $tableName, $uploadDir = "")
    {
        if (isset($_FILES[$file])) {
            if ($_FILES[$file]['size'] > 0 && $_FILES[$file]['size'] <= (1024 * 1024 * 5)) :
                $extension = pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION);
                $extensionArr = array("jpg", "png");
                if (in_array($extension, $extensionArr)) :
                    $filename = uniqid($tableName . "_") . "." . $extension;
                    if (move_uploaded_file($_FILES[$file]['tmp_name'], $uploadDir . $filename)) :
                        return $filename;
                    else :
                        return false;
                    endif;
                endif;
            endif;
        }
    }
    /* Seflink */
    public function seflink($val)
    {
        $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#', '?', '*', '!', '.', '(', ')');
        $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp', '', '', '', '', '', '');
        $string = strtolower(str_replace($find, $replace, $val));
        $string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
        $string = trim(preg_replace('/\s+/', ' ', $string));
        $string = str_replace(' ', '-', $string);
        return $string;
    }
}
