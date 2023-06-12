<?php $this->load->view('orang/header'); ?>

<div>
    <div class="uk-container uk-container-small">
        <?php $this->load->view('orang/navbar'); ?>
        <div class="uk-container uk-background-default">
            <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s" uk-grid>
                <div class="uk-card-body uk-padding">
                    <h3 class="uk-card-title">QR Code Anda</h3>
                    <p class="uk-text-center"><img src="<?= base_url() ?><?= $hasil->qr_code; ?>?<?= random_string('alnum', 8); ?>"><br /><?php echo $hasil->id; ?></p>
                    <h3 class="uk-card-title">Nama Anda</h3>
                    <p><?php echo $hasil->nama; ?></p>
                    <h3 class="uk-card-title">Konfirmasi</h3>
                    <p><?php echo $hasil->konfirmasi2; ?></p>
                    <h3 class="uk-card-title">Ucapan/Doa</h3>
                    <p><?php echo $hasil->ucapan ?></p>
                </div>
                <div class="uk-card-media-right uk-cover-container">
                    <?php if (isset($hasil->foto) && !empty($hasil->foto)) { ?>
                        <img src="<?= base_url() ?><?= $hasil->foto ?>" uk-cover>
                    <?php } else { ?>
                        <img src="<?= base_url() ?>images/ava.jpg" uk-cover>
                    <?php } ?>
                    <canvas width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('orang/footer'); ?>