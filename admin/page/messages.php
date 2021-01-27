<?php $lastMessages = $database->getData("messages", 1); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Gelen Mesajlar</h1>

    <!-- DataTables Example -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary bg-dark">
                <span class="float-left p-2">Mesajlar Listele</span>
            </h6>
            <div style="clear:both;"></div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>İsim</th>
                            <th>Mail</th>
                            <th>Mesaj Konusu</th>
                            <th>Tarih</th>
                            <th>Okunma</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lastMessages as $data) : ?>
                            <tr>
                                <td><?= $data['messages_id'] ?></td>
                                <td><?= $data['messages_name'] ?></td>
                                <td><?= $data['messages_mail'] ?></td>
                                <td><?= $data['messages_subject'] ?></td>
                                <td><?= $data['messages_time'] ?></td>
                                <td>
                                    <?php
                                    if ($data['messages_see'] == 0) :
                                        echo '<i class="fa fa-eye"></i>';
                                    else:
                                        echo '<i class="fa fa-eye-slash"></i>';
                                    endif;
                                    ?>

                                </td>
                                <td>
                                    <a href="operation/messages-return/<?= $data['messages_id'] ?>">
                                        <button class="btn btn-success btn-sm">
                                            <i class="fas fa-retweet"></i>
                                            Cevapla
                                        </button>
                                    </a>
                                    <button type="button" data-id="<?= $data['messages_id'] ?>" class="btn btn-danger btn-sm btnMesDel">
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