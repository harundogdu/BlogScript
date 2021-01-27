<?php $lastPartner = $database->getData("partner", 1); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Sponsorlar</h1>

    <!-- DataTables Example -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary bg-dark">
                <span class="float-left p-2">Sponsorlar Listele</span>
                <a href="partner-add.html" class="btn btn-info float-right p-2 text-white"><i class="fas fa-plus"></i> Ekle</a>
            </h6>
            <div style="clear:both;"></div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Resim</th>
                            <th>Link</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>                    
                    <tbody>
                        <?php foreach ($lastPartner as $data) : ?>
                            <tr>
                                <td><?= $data['partner_id'] ?></td>
                                <td><img width="75" src="../img/<?= $data['partner_img'] ?>" alt="<?= $data['partner_link'] ?>"></td>
                                <td><?= $data['partner_link'] ?></td>
                                <td>
                                    <a href="operation/partner-update/<?= $data['partner_id'] ?>">
                                        <button class="btn btn-success btn-sm">
                                            <i class="fas fa-edit"></i>
                                            Güncelle
                                        </button>
                                    </a>
                                    <button type="button" data-image="<?= $data['partner_img'] ?>" data-id="<?= $data['partner_id'] ?>" class="btn btn-danger btn-sm btnPartnerDelete">
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