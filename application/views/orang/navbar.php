<nav class="uk-navbar-container uk-navbar-transparent uk-background-secondary uk-light" uk-navbar>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="<?php echo base_url() . 'eticket/qr/' . $hasil->id; ?>">Ubah Data</a></li>
            <li class="uk-active"><a href="<?php echo base_url() . 'eticket/u/' . $hasil->id; ?>">Profil Saya</a></li>
            <li class="uk-active"><a href="<?php echo base_url() . 'eticket/ui/' . $hasil->id; ?>">Ganti Foto</a></li>
        </ul>
    </div>
    <div class="uk-navbar-right">
        <div class="uk-navbar-item">
            <?php if (isset($hasil->foto) && !empty($hasil->foto)) { ?>
                <a href="<?php echo base_url() . 'eticket/ui/' . $hasil->id; ?>"><img class="uk-border-rounded" src="<?= base_url() ?><?= $hasil->foto ?>" width="50"></a>
            <?php } else { ?>
                <a href="<?php echo base_url() . 'eticket/ui/' . $hasil->id; ?>"><img class="uk-border-rounded" src="<?= base_url() ?>images/ava.jpg" width="60"></a>
            <?php } ?>
        </div>

    </div>
</nav>