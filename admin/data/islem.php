<?php
require_once '../../config.php';
require_once '../include/header.php';
require_once '../include/menu.php';
require_once '../include/footer.php';

if (isset($_GET['islem'])) :
    $operation = $database->filterSyntax($_GET['islem']);
endif;

switch ($operation):
    case 'updateSettings':
        if ($_POST['settings_base']) :
            extract($_POST);
            if (!$settings_base || !$settings_title || !$settings_keyw || !$settings_desc || !$settings_owner || !$settings_author || !$settings_blogTitle || !$settings_facebook || !$settings_youtube || !$settings_instagram) :
                echo "empty";
            else :
                $updateSettings = $database->setQuery("UPDATE settings SET ", "settings_base=?,settings_title=?,settings_keyw=?,settings_desc=?,settings_owner=?,settings_author=?,settings_blogTitle=?,settings_facebook=?,settings_youtube=?,settings_instagram=?", array($settings_base, $settings_title, $settings_keyw, $settings_desc, $settings_owner, $settings_author, $settings_blogTitle, $settings_facebook, $settings_youtube, $settings_instagram));
                if ($updateSettings) :
                    echo '
                    <script>
                        swal({
                            title: "Tebrikler",
                            text: "Başarıyla Güncellendi !",
                            icon: "success",
                            html: true,
                            timer: 2000
                        }).then(() => {
                            window.location = "settings.html";
                        });
                    </script>';
                else :
                    echo '
                    <script>
                        swal({
                            title: "Dikkat !",
                            text: "Güncelleme Sırasında Bir Sorun Oluştu !",
                            icon: "warning",
                            html: true,
                            timer: 2000
                        }).then(() => {
                            window.location = "settings.html";
                        });
                    </script>';
                endif;
            endif;
        endif;
        break;
    case 'updateAbout':
        if ($_FILES['aboutme_img'] && $_FILES['aboutme_img']['size'] > 0) :
            $aboutme_img_old = $database->filterSyntax($_POST['aboutme_img_old']);
            if (file_exists("../../img/" . $aboutme_img_old)) :
                unlink("../../img/" . $aboutme_img_old);
            endif;
            $filename = $database->uploadImage("aboutme_img", "aboutme", "../../img/");
            extract($_POST);
            $updateAbout = $database->setQuery("UPDATE aboutme", " SET aboutme_img=?,aboutme_name=?,aboutme_content=? WHERE aboutme_id=?", array(
                $filename,
                $database->filterSyntax($aboutme_name, true),
                $aboutme_content,
                $aboutme_id
            ));
            if ($updateAbout && $filename != false) :
                echo '
                <script>
                    swal({
                        title: "Tebrikler",
                        text: "Başarıyla Güncellendi !",
                        icon: "success",
                        html: true,
                        timer: 2000
                    }).then(() => {
                        window.location = "aboutme.html";
                    });
                </script>';
            else :
                echo '
                <script>
                    swal({
                        title: "Dikkat !",
                        text: "Güncelleme Sırasında Bir Sorun Oluştu !",
                        icon: "warning",
                        html: true,
                        timer: 2000
                    }).then(() => {
                        window.location = "aboutme.html";
                    });
                </script>';
            endif;
        else :
            extract($_POST);
            $updateAbout = $database->setQuery("UPDATE aboutme", " SET aboutme_name=?,aboutme_content=? WHERE aboutme_id=?", array(
                $database->filterSyntax($aboutme_name, true),
                $aboutme_content,
                $aboutme_id
            ));
            if ($updateAbout) :
                echo '
                <script>
                    swal({
                        title: "Tebrikler",
                        text: "Başarıyla Güncellendi !",
                        icon: "success",
                        html: true,
                        timer: 2000
                    }).then(() => {
                        window.location = "aboutme.html";
                    });
                </script>';
            else :
                echo '
                <script>
                    swal({
                        title: "Dikkat !",
                        text: "Güncelleme Sırasında Bir Sorun Oluştu !",
                        icon: "warning",
                        html: true,
                        timer: 2000
                    }).then(() => {
                        window.location = "aboutme.html";
                    });
                </script>';
            endif;
        endif;
        break;
    case 'addPartner':
        if ($_FILES['partner_img'] && $_FILES['partner_img']['size'] > 0) :
            $filename = $database->uploadImage("partner_img", "partner", "../../img/");
            extract($_POST);
            $addPartner = $database->setQuery("INSERT INTO partner ", " (partner_img,partner_link) VALUES (?,?)", array(
                $filename,
                $database->filterSyntax($partner_link, true)
            ));
            if ($addPartner && $filename != false) :
                echo '
                <script>
                    swal({
                        title: "Tebrikler",
                        text: "Başarıyla Eklendi !",
                        icon: "success",
                        html: true,
                        timer: 2000
                    }).then(() => {
                        window.location = "partner.html";
                    });
                </script>';
            else :
                echo '
                <script>
                    swal({
                        title: "Dikkat !",
                        text: "Ekleme Sırasında Bir Sorun Oluştu !",
                        icon: "warning",
                        html: true,
                        timer: 2000
                    }).then(() => {
                        window.location = "partner.html";
                    });
                </script>';
            endif;
        endif;
        break;
    case 'updatePartner':
        if ($_FILES['partner_img'] && $_FILES['partner_img']['size'] > 0) :
            $partner_img_old = $database->filterSyntax($_POST['partner_img_old']);
            if (file_exists("../../img/" . $partner_img_old)) :
                unlink("../../img/" . $partner_img_old);
            endif;
            $filename = $database->uploadImage("partner_img", "partner", "../../img/");
            extract($_POST);
            $updatePartner = $database->setQuery("UPDATE partner", " SET partner_img=?,partner_link=? WHERE partner_id=?", array(
                $filename,
                $database->filterSyntax($partner_link, true),
                $partner_id
            ));
            if ($updatePartner && $filename != false) :
                echo '
                <script>
                    swal({
                        title: "Tebrikler",
                        text: "Başarıyla Güncellendi !",
                        icon: "success",
                        html: true,
                        timer: 2000
                    }).then(() => {
                        window.location = "partner.html";
                    });
                </script>';
            else :
                echo '
                <script>
                    swal({
                        title: "Dikkat !",
                        text: "Güncelleme Sırasında Bir Sorun Oluştu !",
                        icon: "warning",
                        html: true,
                        timer: 2000
                    }).then(() => {
                        window.location = "partner.html";
                    });
                </script>';
            endif;
        else :
            extract($_POST);
            $updatePartner = $database->setQuery("UPDATE partner", " SET partner_link=? WHERE partner_id=?", array(
                $database->filterSyntax($partner_link, true),
                $partner_id
            ));
            if ($updatePartner) :
                echo '
                <script>
                    swal({
                        title: "Tebrikler",
                        text: "Başarıyla Güncellendi !",
                        icon: "success",
                        html: true,
                        timer: 2000
                    }).then(() => {
                        window.location = "partner.html";
                    });
                </script>';
            else :
                echo '
                <script>
                    swal({
                        title: "Dikkat !",
                        text: "Güncelleme Sırasında Bir Sorun Oluştu !",
                        icon: "warning",
                        html: true,
                        timer: 2000
                    }).then(() => {
                        window.location = "partner.html";
                    });
                </script>';
            endif;
        endif;
        break;
    case 'deletePartner':
        if (isset($_POST)) :
            extract($_POST);
            if ($database->setQuery("DELETE FROM partner WHERE ", " partner_id =?", array($dataID))) :
                if (file_exists("../../img/" . $dataImg)) :
                    unlink("../../img/" . $dataImg);
                    echo "yes";
                endif;
            else :
                echo "no";
            endif;
        endif;
        break;
    case 'updateCategory':
        if ($_POST) :
            extract($_POST);
            $updateCategory = $database->setQuery("UPDATE category", " SET category_title=?,category_link=? WHERE category_id=? ", array($category_title, $database->seflink($category_title), $category_id));
            if ($updateCategory) :
                echo '
                <script>
                    swal({
                        title: "Tebrikler",
                        text: "Başarıyla Güncellendi !",
                        icon: "success",
                        html: true,
                        timer: 2000
                    }).then(() => {
                        window.location = "category.html";
                    });
                </script>';
            else :
                echo '
                <script>
                    swal({
                        title: "Dikkat !",
                        text: "Güncelleme Sırasında Bir Sorun Oluştu !",
                        icon: "warning",
                        html: true,
                        timer: 2000
                    }).then(() => {
                        window.location = "category.html";
                    });
                </script>';
            endif;
        endif;
        break;
    case 'addCategory':
        if ($_POST) :
            extract($_POST);
            $addCategory = $database->setQuery("INSERT INTO category", "(category_title,category_link) VALUES (?,?) ", array($category_title, $database->seflink($category_title)));
            if ($addCategory) :
                echo '
                <script>
                    swal({
                        title: "Tebrikler",
                        text: "Başarıyla Eklendi !",
                        icon: "success",
                        html: true,
                        timer: 2000
                    }).then(() => {
                        window.location = "category.html";
                    });
                </script>';

            else :
                echo '
                <script>
                    swal({
                        title: "Dikkat !",
                        text: "Ekleme Sırasında Bir Sorun Oluştu !",
                        icon: "warning",
                        html: true,
                        timer: 2000
                    }).then(() => {
                        window.location = "category.html";
                    });
                </script>';
            endif;
        endif;
        break;
    case 'deleteCategory':
        if (isset($_POST)) :
            extract($_POST);
            if ($database->setQuery("DELETE FROM category WHERE ", " category_id=?", array($dataID))) : echo "yes";
            else :
                echo "no";
            endif;
        endif;
        break;
    case 'addPost':
        if ($_FILES['post_img'] && $_FILES['post_img']['size'] > 0) :
            $filename = $database->uploadImage("post_img", "post", "../../img/");
            extract($_POST);
            $addPost = $database->setQuery("INSERT INTO post ", " (post_img,post_title,post_content,post_cat_id,post_seolink) VALUES (?,?,?,?,?)", array(
                $filename,
                $database->filterSyntax($post_title, true),
                $post_content,
                $database->filterSyntax($post_cat_id, true),
                $database->seflink($database->filterSyntax($post_title, true))
            ));
            if ($addPost && $filename != false) :
                echo '
                    <script>
                        swal({
                            title: "Tebrikler",
                            text: "Başarıyla Eklendi !",
                            icon: "success",
                            html: true,
                            timer: 2000
                        }).then(() => {
                            window.location = "post.html";
                        });
                    </script>';
            else :
                echo '
                    <script>
                        swal({
                            title: "Dikkat !",
                            text: "Ekleme Sırasında Bir Sorun Oluştu !",
                            icon: "warning",
                            html: true,
                            timer: 2000
                        }).then(() => {
                            window.location = "post.html";
                        });
                    </script>';
            endif;
        endif;
        break;
    case 'postUpdate':
        if ($_FILES['post_img'] && $_FILES['post_img']['size'] > 0) :
            $post_img_old = $database->filterSyntax($_POST['post_img_old']);
            if (file_exists("../../img/" . $post_img_old)) :
                unlink("../../img/" . $post_img_old);
            endif;
            $filename = $database->uploadImage("post_img", "post", "../../img/");
            extract($_POST);
            $postUpdate = $database->setQuery("UPDATE post", " SET post_img=?,post_title=?,post_content=?,post_cat_id=?,post_seolink=? WHERE post_id=?", array(
                $filename,
                $database->filterSyntax($post_title, true),
                $post_content,
                $database->filterSyntax($post_cat_id, true),
                $database->seflink($database->filterSyntax($post_title, true)),
                $database->filterSyntax($post_id, true)
            ));
            if ($postUpdate && $filename != false) :
                echo '
                    <script>
                        swal({
                            title: "Tebrikler",
                            text: "Başarıyla Güncellendi !",
                            icon: "success",
                            html: true,
                            timer: 2000
                        }).then(() => {
                            window.location = "post.html";
                        });
                    </script>';
            else :
                echo '
                    <script>
                        swal({
                            title: "Dikkat !",
                            text: "Güncelleme Sırasında Bir Sorun Oluştu !",
                            icon: "warning",
                            html: true,
                            timer: 2000
                        }).then(() => {
                            window.location = "post.html";
                        });
                    </script>';
            endif;
        else :
            extract($_POST);
            $postUpdate = $database->setQuery("UPDATE post", " SET post_title=?,post_content=?,post_cat_id=?,post_seolink=? WHERE post_id=?", array(
                $database->filterSyntax($post_title, true),
                $database->filterSyntax($post_content, true),
                $database->filterSyntax($post_cat_id, true),
                $database->seflink($database->filterSyntax($post_title, true)),
                $database->filterSyntax($post_id, true)
            ));
            if ($postUpdate) :
                echo '
                    <script>
                        swal({
                            title: "Tebrikler",
                            text: "Başarıyla Güncellendi !",
                            icon: "success",
                            html: true,
                            timer: 2000
                        }).then(() => {
                            window.location = "post.html";
                        });
                    </script>';
            else :
                echo '
                    <script>
                        swal({
                            title: "Dikkat !",
                            text: "Güncelleme Sırasında Bir Sorun Oluştu !",
                            icon: "warning",
                            html: true,
                            timer: 2000
                        }).then(() => {
                            window.location = "post.html";
                        });
                    </script>';
            endif;
        endif;
        break;
    case 'deletePost':
        if (isset($_POST)) :
            extract($_POST);
            if ($database->setQuery("DELETE FROM post WHERE ", " post_id =?", array($dataID))) :
                if (file_exists("../../img/" . $dataImg)) :
                    unlink("../../img/" . $dataImg);
                    echo "yes";
                endif;
            else :
                echo "no";
            endif;
        endif;
        break;


    case 'updateComment':
        if ($_POST) :
            extract($_POST);
            $updateComment = $database->setQuery("UPDATE comment SET ", "comment_user=?,comment_mail=?,comment_content=?,comment_state=? WHERE comment_id=?", array($comment_user, $comment_mail, $comment_content, $comment_state, $comment_id));
            if ($updateComment) :
                echo '
                    <script>
                        swal({
                            title: "Tebrikler",
                            text: "Başarıyla Güncellendi !",
                            icon: "success",
                            html: true,
                            timer: 2000
                        }).then(() => {
                            window.location = "comment.html";
                        });
                    </script>';
            else :
                echo '
                    <script>
                        swal({
                            title: "Dikkat !",
                            text: "Güncelleme Sırasında Bir Sorun Oluştu !",
                            icon: "warning",
                            html: true,
                            timer: 2000
                        }).then(() => {
                            window.location = "comment.html";
                        });
                    </script>';
            endif;
        endif;
        break;
    case 'deleteComment':
        if (isset($_POST)) :
            extract($_POST);
            if ($database->setQuery("DELETE FROM comment WHERE ", " comment_id=?", array($dataID))) :
                if ($dataAdmin != null && $dataAdmin != 0) :
                    $database->setQuery("DELETE FROM comment WHERE ", " comment_id=?", array($dataAdmin));
                endif;
                echo "yes";
            else :
                echo "no";
            endif;
        endif;
        break;

    case 'returnComment':
        if ($_POST) :
            extract($_POST);
            $returnComment = $database->setQuery("INSERT INTO comment ", "(comment_user,comment_mail,comment_content,comment_website,comment_top,comment_post_id,comment_state) VALUES (?,?,?,?,?,?,?)", array($comment_user, $comment_mail, $comment_content, $comment_website, $comment_id, $comment_post_id, 1));
            if ($returnComment) :
                $database->query("UPDATE comment SET comment_return = 1,comment_state=1  WHERE comment_id = " . $comment_id);
                echo '<script>
                    swal({
                        title: "Tebrikler !",
                        text: "Yorum Başarıyla Cevaplandı !",
                        icon: "success",
                        html: true,
                        timer: 2000
                    }).then(function() {
                        window.location = "comment.html";
                    });
                </script>';
            else :
                echo '<script>
                    swal({
                        title: "Hata !",
                        text: "Yorum Gönderirken Bir Sorun Oluştu !",
                        icon: "warning",
                        html: true,
                        timer: 2000
                    }).then(function() {
                        window.location = "comment.html";
                    });
                </script>';
            endif;
        endif;
        break;

    case 'deleteMessages':
        if (isset($_POST)) :
            extract($_POST);
            if ($database->setQuery("DELETE FROM messages WHERE ", " messages_id=?", array($dataID))) :
                echo "yes";
            else :
                echo "no";
            endif;
        endif;
        break;
    case 'updateProfileName':
        if ($_POST) :
            extract($_POST);
            $updateProfileName = $database->setQuery("UPDATE admin SET ", "admin_user=?", array($admin_user));
            if ($updateProfileName) :
                echo '
                        <script>
                            swal({
                                title: "Tebrikler",
                                text: "Başarıyla Güncellendi !",
                                icon: "success",
                                html: true,
                                timer: 2000
                            }).then(() => {
                                window.location = "profile.html";
                            });
                        </script>';
            else :
                echo '
                        <script>
                            swal({
                                title: "Dikkat !",
                                text: "Güncelleme Sırasında Bir Sorun Oluştu !",
                                icon: "warning",
                                html: true,
                                timer: 2000
                            }).then(() => {
                                window.location = "profile.html";
                            });
                        </script>';
            endif;
        endif;
        break;
    case 'updateProfilePassword':
        if ($_POST) :
            extract($_POST);
            $nowPass = $database->prepare("SELECT * FROM admin WHERE admin_psw = ?");
            $nowPass->execute(array(md5($admin_psw)));
            $last = $nowPass->rowCount();
            if ($last > 0) :
                if ($admin_psw_new === $admin_psw_again) :
                    $updateProfilePassword = $database->setQuery("UPDATE admin SET ", "admin_psw=?", array(md5($admin_psw_new)));
                    if ($updateProfilePassword) :
                        echo '
                                    <script>
                                        swal({
                                            title: "Tebrikler",
                                            text: "Başarıyla Güncellendi !",
                                            icon: "success",
                                            html: true,
                                            timer: 2000
                                        }).then(() => {
                                            window.location = "profile.html";
                                        });
                                    </script>';
                    else :
                        echo '
                                    <script>
                                        swal({
                                            title: "Dikkat !",
                                            text: "Güncelleme Sırasında Bir Sorun Oluştu !",
                                            icon: "warning",
                                            html: true,
                                            timer: 2000
                                        }).then(() => {
                                            window.location = "profile.html";
                                        });
                                    </script>';
                    endif;
                else :
                    echo '
                            <script>
                                swal({
                                    title: "Dikkat !",
                                    text: "Yeni Şifreler Uyuşmuyor !",
                                    icon: "warning",
                                    html: true,
                                    timer: 2000
                                }).then(() => {
                                    window.location = "profile.html";
                                });
                            </script>';
                endif;
            else :
                echo '
                            <script>
                                swal({
                                    title: "Dikkat !",
                                    text: "Eski Şifre Hatalı !",
                                    icon: "warning",
                                    html: true,
                                    timer: 2000
                                }).then(() => {
                                    window.location = "profile.html";
                                });
                            </script>';
            endif;
        endif;
        break;
    default:
        header("location:" . SITE);
        break;
endswitch;
