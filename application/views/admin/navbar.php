<div uk-sticky class="uk-navbar-container tm-navbar-container uk-active">
    <div class="uk-container uk-container-expand">
        <nav uk-navbar>
            <div class="uk-navbar-left uk-light">
                <a id="sidebar_toggle" class="uk-navbar-toggle" uk-navbar-toggle-icon></a>
                <a href="./" class="uk-navbar-item uk-logo">
                    Guestbook
                </a>
            </div>

            <div class="uk-navbar-right uk-light">
                <ul class="uk-navbar-nav">
                    <li class="uk-active">
                        <a href="#"><span uk-icon="icon: user"></span>&nbsp; <?= $this->session->userdata('username'); ?> <span uk-icon="chevron-down"></span></a>
                        <div class="uk-navbar-dropdown" uk-dropdown="pos: bottom-right; mode: click; offset: -17;">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li><a href="<?= base_url() . 'admin/pengaturan' ?>"><span uk-icon="settings"></span> Pengaturan</a></li>
                                <li><a href="<?= base_url() . 'admin/ganti_password' ?>"><span uk-icon="settings"></span> Ganti Password</a></li>
                                <li><a href="<?= base_url() . 'admin/logout' ?>"><span uk-icon="sign-out"></span> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<div id="sidebar" class="tm-sidebar-left uk-background-default">
    <center>
        <div class="user">
            <img id="avatar" width="60" class="uk-border-circle" src="images/ava.jpg" />
            <div class="uk-margin-small-top"></div>
            <div id="name" class="uk-text-truncate"><?= $this->session->userdata('username'); ?></div>
            <span id="status" data-enabled="true" data-online-text="Online" data-away-text="Away" data-interval="10000" class="uk-margin-small-top uk-label uk-label-success"></span>
        </div>
        <br />
    </center>
    <ul class="uk-nav uk-nav-default">

        <li class="uk-nav-header">
            Menu
        </li>
        <li><a href="<?= base_url() . 'admin' ?>">Home</a></li>
        <li><a href="<?= base_url() . 'admin/daftartamu' ?>">Daftar Tamu Undangan</a></li>
        <li><a href="<?= base_url() . 'admin/konfirmasi' ?>">Data Konfirmasi</a></li>
        <li><a href="<?= base_url() . 'admin/kehadiran' ?>">Rekap Kehadiran</a></li>

        <li class="uk-nav-header">
            Pengaturan
        </li>
        <li><a href="<?= base_url() . 'admin/pengaturan_foto' ?>"><span uk-icon="image"></span> Foto Utama</a></li>
        <li><a href="<?= base_url() . 'admin/pengaturan_background' ?>"><span uk-icon="image"></span> Image Background</a></li>
        <li><a href="<?= base_url() . 'admin/pengaturan' ?>"><span uk-icon="settings"></span> Pengaturan Sistem</a></li>
        <li><a href="<?= base_url() . 'admin/ganti_password' ?>"><span uk-icon="settings"></span> Ganti Password</a></li>
        <li><a href="<?= base_url() . 'admin/logout' ?>"><span uk-icon="sign-out"></span> Logout</a></li>
    </ul>
</div>

<div class="content-padder content-background">
    <div class="uk-section-small">

        <div class="uk-container uk-container-large">
            <div class="uk-card">