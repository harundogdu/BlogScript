<?php $lastComment = $database->getData("comment", 1, " INNER JOIN post ON comment.comment_post_id = post.post_id WHERE comment_top != 0"); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Yorum Cevapları</h1>

    <!-- DataTables Example -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary bg-dark">
                <span class="float-left p-2">Yorum Cevapları Listele</span>
            </h6>
            <div style="clear:both;"></div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th title="Cevaplanan Yorum Numarası">C. Yorum No</th>
                            <th>Kullanıcı</th>
                            <th>İlgili Yazı</th>
                            <th>Tarih</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lastComment as $data) : ?>
                            <tr>
                                <td><?= $data['comment_top'] ?></td>
                                <td><?=$data['comment_user']?></td>
                                <td><?= $data['post_title'] ?></td>
                                <td><?= $data['comment_time'] ?></td>                            
                                <td>                                    
                                    <a href="operation/comment-update/<?= $data['comment_id'] ?>">
                                        <button class="btn btn-success btn-sm">
                                            <i class="fas fa-edit"></i>
                                            Güncelle
                                        </button>
                                    </a>
                                    <button type="button" data-id="<?= $data['comment_id'] ?>" class="btn btn-danger btn-sm btnComDel">
                                        <i class="fas fa-trash"></i>
                                        Sil
                                    </button>
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