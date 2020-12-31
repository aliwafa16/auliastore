    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang!!</h1>
                                        <?php if ($this->session->flashdata('flashdata')) : ?>
                                            <div class="alert alert-success" role="alert">
                                                <h4 class="text-center"><?= $this->session->flashdata('flashdata')?></h4>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <form class="user" method="post" action="<?= base_url(); ?>login">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Masukan email..." value="<?= $this->form_validation->set_value('email'); ?>">
                                            <small class="form-text text-danger"><?= $this->form_validation->error('email'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukan password...">
                                            <small class="form-text text-danger"><?= $this->form_validation->error('password'); ?></small>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Lupa Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url() ?>login/registrasi">Belum punya akun? Daftar sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>