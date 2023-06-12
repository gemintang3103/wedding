<?php $this->load->view('admin/header'); ?>
<body>
	<?php $this->load->view('admin/navbar'); ?>

	<div class="uk-container uk-container-large">

		<div class="uk-card uk-card-default uk-card-body">

			<h2>Pengaturan Sistem</h2>
			<?php if ($this->session->flashdata('msg')) : ?>
				<p><?= $this->session->flashdata('msg'); ?></p>
			<?php endif; ?>

			<?php
			foreach ($data->result_array() as $i)
				$id = $i['id'];
			$nama_web = $i['nama_web'];
			$nama_pengantin = $i['nama_pengantin'];
			$tempat_tanggal = $i['tempat_tanggal'];
			$alamat = $i['alamat'];
			$smtp_host = $i['smtp_host'];
			$smtp_port = $i['smtp_port'];
			$smtp_user = $i['smtp_user'];
			$smtp_pass = $i['smtp_pass'];

			?>

			<form class="uk-form-horizontal" method="post" action="<?= base_url() . 'admin/pengaturan_simpan' ?>">
				<input name="id" value="<?= $id; ?>" type="hidden">
				<div class="uk-margin">
					<label class="uk-form-label">NAMA WEB</label>
					<div class="uk-form-controls">
						<input name="nama_web" value="<?= $nama_web; ?>" class="uk-input" type="text" placeholder="" required>
					</div>
				</div>

				<div class="uk-margin">
					<label class="uk-form-label">NAMA PENGANTIN</label>
					<div class="uk-form-controls">
						<input name="nama_pengantin" value="<?= $nama_pengantin; ?>" class="uk-input" type="text" placeholder="" required>
					</div>
				</div>

				<div class="uk-margin">
					<label class="uk-form-label">TEMPAT &amp; TANGGAL</label>
					<div class="uk-form-controls">
						<input name="tempat_tanggal" value="<?= $tempat_tanggal; ?>" class="uk-input" type="text" placeholder="" required>
					</div>
				</div>

				<div class="uk-margin">
					<label class="uk-form-label">ALAMAT ACARA</label>
					<div class="uk-form-controls">
						<textarea name="alamat" class="uk-textarea"><?= $alamat; ?></textarea>
					</div>
				</div>

				<div class="uk-margin">
					<label class="uk-form-label">SMTP HOST</label>
					<div class="uk-form-controls">
						<input name="smtp_host" value="<?= $smtp_host; ?>" class="uk-input" type="text" placeholder="">
					</div>
				</div>

				<div class="uk-margin">
					<label class="uk-form-label">SMTP PORT</label>
					<div class="uk-form-controls">
						<input name="smtp_port" value="<?= $smtp_port; ?>" class="uk-input" type="text" placeholder="">
					</div>
				</div>

				<div class="uk-margin">
					<label class="uk-form-label">SMTP USER</label>
					<div class="uk-form-controls">
						<input name="smtp_user" value="<?= $smtp_user; ?>" class="uk-input" type="text" placeholder="">
					</div>
				</div>

				<div class="uk-margin">
					<label class="uk-form-label">SMTP PASSWORD</label>
					<div class="uk-form-controls">
						<input name="smtp_pass" value="<?= $smtp_pass; ?>" class="uk-input" type="text" placeholder="">
					</div>
				</div>
				<button class="uk-button uk-button-primary">Update</button>
			</form>
		</div>
	</div>
<?php $this->load->view('admin/footer'); ?>