$(document).ready(function () {
    /* ckeditor */
    CKEDITOR.replace('settings_desc');
    CKEDITOR.replace('post_content');
    CKEDITOR.replace('aboutme_content');
    CKEDITOR.replace('comment_content');

    /* Partner Delete */
    $('.btnPartnerDelete').click(function (e) {
        e.preventDefault();
        var dataID = $(this).attr("data-id");
        var dataImg = $(this).attr("data-image");

        swal({
                title: "Emin Misiniz ?",
                text: "Seçtiğiniz Alan Silinecek ! Onaylıyor Musunuz ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "data/islem.php?islem=deletePartner",
                        data: {
                            dataID: dataID,
                            dataImg: dataImg
                        },
                        success: function (response) {

                            swal("Başarıyla Silindi !", {
                                icon: "success",
                                html: true,
                                timer: 2000,
                            });

                        }
                    });
                } else {
                    swal("Silmekten Vazgeçtiniz !");
                }
            }).then(function () {
                setTimeout(function () {
                    location.reload(1);
                }, 1000);
            });
    });

    /* Post Delete  */
    $('.btnPostDelete').click(function (e) {
        e.preventDefault();
        var dataID = $(this).attr("data-id");
        var dataImg = $(this).attr("data-image");

        swal({
                title: "Emin Misiniz ?",
                text: "Seçtiğiniz Alan Silinecek ! Onaylıyor Musunuz ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "data/islem.php?islem=deletePost",
                        data: {
                            dataID: dataID,
                            dataImg: dataImg
                        },
                        success: function (response) {

                            swal("Başarıyla Silindi !", {
                                icon: "success",
                                html: true,
                                timer: 2000,
                            });

                        }
                    });
                } else {
                    swal("Silmekten Vazgeçtiniz !");
                }
            }).then(function () {
                setTimeout(function () {
                    location.reload(1);
                }, 1000);
            });
    });

    /* Category Delete  */
    $('.btnCatDel').click(function (e) {
        e.preventDefault();
        var dataID = $(this).attr("data-id");
        swal({
                title: "Emin Misiniz ?",
                text: "Seçtiğiniz Alan Silinecek ! Onaylıyor Musunuz ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "data/islem.php?islem=deleteCategory",
                        data: {
                            dataID: dataID
                        },
                        success: function (response) {

                            swal("Başarıyla Silindi !", {
                                icon: "success",
                                html: true,
                                timer: 2000,
                            });

                        }
                    });
                } else {
                    swal("Silmekten Vazgeçtiniz !");
                }
            }).then(function () {
                setTimeout(function () {
                    location.reload(1);
                }, 1000);
            });
    });

    /* Comment Delete  */
    $('.btnComDel').click(function (e) {
        e.preventDefault();
        var dataID = $(this).attr("data-id");
        var dataAdmin = $(this).attr("data-admin");
        swal({
                title: "Emin Misiniz ?",
                text: "Seçtiğiniz Alan Silinecek ! Onaylıyor Musunuz ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "data/islem.php?islem=deleteComment",
                        data: {
                            dataID: dataID,
                            dataAdmin: dataAdmin
                        },
                        success: function (response) {

                            swal("Başarıyla Silindi !", {
                                icon: "success",
                                html: true,
                                timer: 2000,
                            });

                        }
                    });
                } else {
                    swal("Silmekten Vazgeçtiniz !");
                }
            }).then(function () {
                setTimeout(function () {
                    location.reload(1);
                }, 1000);
            });
    });

    /* Messages Delete  */
    $('.btnMesDel').click(function (e) {
        e.preventDefault();
        var dataID = $(this).attr("data-id");
        swal({
                title: "Emin Misiniz ?",
                text: "Seçtiğiniz Alan Silinecek ! Onaylıyor Musunuz ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "data/islem.php?islem=deleteMessages",
                        data: {
                            dataID: dataID
                        },
                        success: function (response) {

                            swal("Başarıyla Silindi !", {
                                icon: "success",
                                html: true,
                                timer: 2000,
                            });

                        }
                    });
                } else {
                    swal("Silmekten Vazgeçtiniz !");
                }
            }).then(function () {
                setTimeout(function () {
                    location.reload(1);
                }, 1000);
            });
    });

    /* Messages Answer  */

    $('#btnSaveMessages').click(function (e) {
        e.preventDefault();
        var messagesData = $("#messagesForm").serialize();
        $.ajax({
            type: "POST",
            url: "data/mesaj-gonder.php",
            data: messagesData,
            success: function (response) {
                console.log(response);
                if (response == "yes") {
                    swal({
                        title: "Tebrikler!",
                        text: "Mesajınız Başarıyla Gönderildi !",
                        icon: "success",
                        buttons: true,
                        dangerMode: true,
                        timer: 2000
                    }).then(function () {
                       location.reload(); 
                    });
                } else if (response == "no") {
                    swal("Hata!", "Mesaj Gönderilemedi !", "warning");
                }else {
                    swal("Hata!", "Mesaj Gönderilemedi2 !", "warning");
                }
            }
        });

    });

});