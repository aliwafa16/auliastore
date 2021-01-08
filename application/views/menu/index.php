                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Menu management</h1>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-info" type="button" id="button-addon2">Button</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-info tombolTambahMenu" data-toggle="modal" data-target="#menuModal">Tambah menu</button>
                            <small class="form-text text-danger"><?= $this->form_validation->error('nama_menu'); ?></small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <?php if ($this->session->flashdata('flashdata')) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><?= $this->session->flashdata('flashdata') ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Menu</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($user_menu as $usr_mn) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $usr_mn['nama_menu'] ?></td>
                                            <td>
                                                <a href="<?= base_url() ?>menu/edit/<?= $usr_mn['id_menu'] ?>" class="badge badge-primary tombolEditMenu" data-toggle="modal" data-target="#menuModal" data-id_menu="<?= $usr_mn['id_menu'] ?>">Edit</a>
                                                <a href="<?= base_url() ?>menu/hapus/<?= $usr_mn['id_menu'] ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus menu ?')">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->


                <!-- Button trigger modal -->

                <!-- Modal Menu-->
                <div>
                    <div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="menuModalLabel">Form Tambah Menu</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url() ?>menu/tambahMenu" method="post">
                                        <div class="form-group">
                                            <input type="hidden" name="id_menu" id="id_menu">
                                            <label for="nama_menu">Nama Menu</label>
                                            <input type="text" class="form-control" id="nama_menu" name="nama_menu">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Tambah menu</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>