<?php $this->load->view('orang/header'); ?>

<div>

  <div class="uk-container uk-container-small">

    <?php $this->load->view('orang/navbar'); ?>

    <div class="uk-container uk-background-default">


      <div class="uk-padding-small">
        <?php if ($this->session->flashdata('msg')) : ?>
          <?= $this->session->flashdata('msg'); ?>
        <?php endif; ?>
        <form class="uk-form-horizontal" enctype="multipart/form-data" method="post" action="<?= base_url() . 'eticket/ui/' . $hasil->id; ?>">
          <legend class="uk-legend text-grey-900">Ganti Foto</legend>

          <div class="uk-form-controls">
            <input name="id" value="<?= $hasil->id; ?>" type="hidden">
          </div>

          <div class="uk-width-4-5@m" id="uploadFoto">
            <label class="uk-form-label text-grey-900"><strong>Pilih foto:</strong></label>
            <div class="uk-form-controls">
              <input type="hidden" name="old_foto" value="<?= $hasil->foto ?>">
              <input class="dropify" data-height="100" type="file" id="foto" name="foto">
            </div>
          </div>


      </div>

      <div>

        <button type="submit" class="uk-button uk-button-primary uk-width-1-1">SIMPAN <span uk-icon="icon: check"></span></button>

      </div>
      </form>
    </div>


  </div>

</div>
</div>

<?php $this->load->view('orang/footer'); ?>