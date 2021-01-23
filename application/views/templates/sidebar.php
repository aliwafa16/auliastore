<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Aulia Store</div>
    </a>



    <?php foreach ($menu as $mn) : ?>
        <div class="sidebar-heading">
            <?= $mn['nama_menu']; ?>
        </div>
        <?php $Submenu = $this->db->get_where('user_submenu', ['id_menu' => $mn['id_menu']])->result_array(); ?>
        <?php foreach ($Submenu as $smenu) : ?>
            <?php if ($judul == $smenu['nama_submenu']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url()?><?= $smenu['url_submenu'] ?>">
                    <i class="<?= $smenu['icon_submenu'] ?>"></i>
                    <span><?= $smenu['nama_submenu'] ?></span></a>
                </li>
            <?php endforeach; ?>
            <hr class="sidebar-divider">

        <?php endforeach; ?>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>login/logout" data-toggle="modal" data-target="#logoutModal">
                <i class=" fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>


        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
</ul>
<!-- End of Sidebar -->