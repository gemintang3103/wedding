<?php $this->load->view('admin/header'); ?>
<body>
	<?php $this->load->view('admin/navbar'); ?>
	<div class="uk-container uk-container-large">
		<div class="uk-card uk-card-default uk-card-body">
			<h2>Pengaturan Foto</h2>
			<?php if ($this->session->flashdata('msg')) : ?>
				<p><?= $this->session->flashdata('msg'); ?></p>
			<?php endif; ?>

			<?php
			foreach ($data->result_array() as $i)
				$id = $i['id'];
			$foto = $i['foto'];
			?>

			<form class="uk-form-horizontal" method="post" enctype="multipart/form-data" action="<?= base_url() . 'admin/foto_simpan' ?>">
				<input name="id" value="<?= $id; ?>" type="hidden">
				<div class="uk-margin">
					<label class="uk-form-label">FOTO</label>
					<div class="uk-form-controls">
						<input type="hidden" name="old_foto" value="<?= $foto ?>">
						<?php if (isset($foto) && !empty($foto)) { ?>
							<img src="<?= base_url() ?><?= $foto ?>" width="150">
						<?php } else { ?>
							<img src="<?= base_url() ?>images/ava.jpg" width="150">
						<?php } ?>
						<br />
						Upload foto anda:<br />
						<input type="file" name="foto"><br />
						<small>Ukuran Foto maksimal 10 MB. Format foto: jpg, jpeg, png</small>
					</div>
					<div class="uk-margin">
						<button class="uk-button uk-button-primary">Update</button>
					</div>
			</form>
		</div>
	</div>
<?php $this->load->view('admin/footer'); ?>