<?php $this->load->view('orang/header'); ?>

<div>

    <div class="uk-container uk-container-small">

        <?php $this->load->view('orang/navbar'); ?>

        <div class="uk-container uk-background-default">

            <div class="uk-padding-small">
                <?php if ($this->session->flashdata('msg')) : ?>
                    <?= $this->session->flashdata('msg'); ?>
                <?php endif; ?>
                <form class="uk-form-horizontal" enctype="multipart/form-data" method="post" action="<?= base_url() . 'eticket/u/' . $hasil->id; ?>">
                    <legend class="uk-legend text-grey-900">Ucapan &amp; Kehadiran</legend>
                    <div class="uk-margin">
                        <label class="uk-form-label text-grey-900"><strong>QR Code ID:</strong></label>
                        <div class="uk-form-controls">
                            <input name="id" value="<?= $hasil->id; ?>" class="uk-input" type="text" placeholder="" readonly>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label text-grey-900"><strong>Nama Anda:</strong></label>
                        <div class="uk-form-controls">
                            <input name="nama" value="<?= $hasil->nama; ?>" class="uk-input" type="text" placeholder="">
                        </div>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label text-grey-900"><strong>Konfirmasi Kehadiran:</strong></label>
                        <div class="uk-form-controls">
                            <input id="konfirmasi" name="konfirmasi" type="radio" class="" <?php if ($hasil->konfirmasi2 == 'Hadir') echo "checked='checked'"; ?> value="Hadir" />
                            <label for="konfirmasi" class="text-grey-900">Insya Allah Hadir</label><br>

                            <input id="konfirmasi" name="konfirmasi" type="radio" class="" <?php if ($hasil->konfirmasi2 == 'Tidak Bisa') echo "checked='checked'"; ?> value="Tidak Bisa" />
                            <label for="konfirmasi" class="text-grey-900">Tidak Bisa Hadir</label><br>

                            <input id="konfirmasi" name="konfirmasi" type="radio" class="" <?php if ($hasil->konfirmasi2 == 'Masih Dalam Pertimbangan') echo "checked='checked'"; ?> value="Masih Dalam Pertimbangan" />
                            <label for="konfirmasi" class="text-grey-900">Masih Dalam Pertimbangan</label>
                        </div>

                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label text-grey-900"><strong>Ucapan/Doa Kepada Mempelai:</strong></label>

                        <div class="uk-form-controls">
                            <textarea name="ucapan" class="uk-textarea uk-form-large" rows="2" placeholder=""><?= $hasil->ucapan ?></textarea>
                        </div>
                    </div>

            </div>

            <div>

                <button type="submit" class="uk-button uk-button-primary uk-width-1-1">KIRIM <span uk-icon="icon: check"></span></button>

            </div>
            </form>
        </div>


    </div>

</div>
</div>

<?php $this->load->view('orang/footer'); ?>