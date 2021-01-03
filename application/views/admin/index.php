                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Selamat datang administrator!</h1>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url() ?>asset/img/profil/<?= $user['image_user']; ?>" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $user['nama_user']?></h5>
                                    <p class="card-text"><?= $user['email_user'] ?></p>
                                    <p class="card-text"><small class="text-muted">Tanggal bergabung : <?= date('d F Y',$user['date']);?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->