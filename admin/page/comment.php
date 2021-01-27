<?php $lastComment = $database->getData("comment", 1, " INNER JOIN post ON comment.comment_post_id = post.post_id WHERE comment_top = 0"); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Gelen Yorumlar</h1>

    <!-- DataTables Example -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary bg-dark">
                <span class="float-left p-2">Gelen Yorumlar Listele</span>
            </h6>
            <div style="clear:both;"></div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kullanıcı</th>
                            <th>İlgili Yazı</th>
                            <th>Tarih</th>
                            <th>Durum</th>
                            <th>Cevap</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lastComment as $data) : ?>
                            <tr>
                                <td style="width:5px;"><?= $data['comment_id'] ?></td>
                                <td style="width:130px;"><?= $data['comment_user'] ?></td>
                                <td><?= $data['post_title'] ?></td>
                                <td><?= $data['comment_time'] ?></td>
                                <td style="width:10px;">
                                    <?php
                                    if ($data['comment_state'] == 1) :
                                        echo '<i style="font-size:22px" class="fas fa-check-circle text-success"></i>';
                                    else :
                                        echo '<i style="font-size:22px" class="fas fa-exclamation-circle text-danger"></i>';
                                    endif;
                                    ?>
                                </td>
                                <td style="width:10px;">
                                    <?php
                                    if ($data['comment_return'] == 1) :
                                        echo '<i style="font-size:22px" class="fas fa-check-circle text-success"></i>';
                                    else :
                                        echo '<i style="font-size:22px" class="fas fa-exclamation-circle text-danger"></i>';
                                    endif;
                                    ?>
                                </td>

                                <td style="width:250px;">
                                    <a href="operation/comment-return/<?= $data['comment_id'] ?>">
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fas fa-comment"></i>
                                            Cevapla
                                        </button>
                                    </a>
                                    <a href="operation/comment-update/<?= $data['comment_id'] ?>">
                                        <button class="btn btn-success btn-sm">
                                            <i class="fas fa-edit"></i>
                                            Güncelle
                                        </button>
                                    </a>
                                    <?php
                                    $lastA = $database->getData("comment", 1);
                                    foreach($lastA as $last):
                                    if ($last['comment_top'] == $data['comment_id'] &&  $data['comment_return'] == 1) :
                                    ?>
                                        <button type="button" data-admin="<?= $last['comment_id'] ?>" data-id="<?= $data['comment_id'] ?>" class="btn btn-danger btn-sm btnComDel">
                                            <i class="fas fa-trash"></i>
                                            Sil
                                        </button>
                                    <?php
                                    elseif(($last['comment_top'] != $data['comment_id']) && ( $data['comment_return'] == 0)) :
                                    ?>
                                    <button type="button" data-admin="<?= $data['comment_top'] != 0 ? $data['comment_top'] : null; ?>" data-id="<?= $data['comment_id'] ?>" class="btn btn-danger btn-sm btnComDel">
                                            <i class="fas fa-trash"></i>
                                            Sil
                                        </button>
                                    <?php
                                    break;
                                    endif;
                                endforeach;
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->