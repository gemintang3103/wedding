<?php $this->load->view('admin/header'); ?>

<body>
	<?php $this->load->view('admin/navbar'); ?>
	<div class="uk-container uk-container-large">

		<div class="uk-card uk-card-default uk-card-body">

			<h2>Daftar Tamu Undangan <button type="button" class="uk-button uk-button-primary" uk-toggle="target: #modal-example" alt="Tambah Data Tamu" title="Tambah Data Tamu" uk-tooltip="Tambah Data Tamu"><span uk-icon="plus"></span> Tambah</button> <a href="admin/excel_import" class="uk-button uk-button-default" alt="Import Excel" title="Import Excel" uk-tooltip="Import Excel" style="background-color: #32D296;color: #f2f2f2"><span uk-icon="file-text"></span> Import Excel</a></h2>

			<?php if ($this->session->flashdata('msg')) : ?>
				<p><?= $this->session->flashdata('msg'); ?></p>
			<?php endif; ?>

			<div class="uk-overflow-auto">
				<table id="myTable" class="table table-striped table-sm" style="width:100%">

					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>NAMA</th>
							<th>NO.HP</th>
							<th>JENKEL</th>
							<th>LINK TAMU</th>
							<th>QR CODE</th>
							<th>OPSI</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal add new Orang-->
	<div id="modal-example" uk-modal>
		<div class="uk-modal-dialog uk-modal-body">
			<h2 class="uk-modal-title">Tambah Data Tamu</h2>
			<button class="uk-modal-close-default" type="button" uk-close></button>
			<form action="<?= base_url() . 'admin/simpan' ?>" method="post">

				<div class="uk-margin">
					<label for="nama" class="control-label">NAMA:</label>
					<input type="text" name="nama" class="uk-input" id="nama" required>
				</div>
				<div class="uk-margin">
					<label for="nohp" class="control-label">NO HP (Format 62):</label>
					<input type="text" name="nohp" class="uk-input" id="nohp" required>
				</div>
				<div class="uk-margin">
					<label for="jenis_kelamin" class="control-label">JENIS KELAMIN:</label>
					<select name="jenis_kelamin" class="uk-select" required>
						<option value="Pria">Pria</option>
						<option value="Wanita">Wanita</option>
					</select>
				</div>
				<div class="uk-margin">
					<label for="email" class="control-label">EMAIL:</label>
					<input type="text" name="email" class="uk-input" id="email" required>
				</div>
				<div class="uk-margin">
					<label for="alamat" class="control-label">ALAMAT:</label>
					<textarea name="alamat" class="uk-input" id="alamat"></textarea>
				</div>


				<p class="uk-text-right">
					<button class="uk-button uk-button-default uk-modal-close" type="button">Tutup</button>
					<button type="submit" class="uk-button uk-button-primary">Simpan</button>
				</p>
			</form>

		</div>
	</div>

	<!-- ============ MODAL EDIT =============== -->
	<?php
	foreach ($data->result_array() as $i) :
		$id = $i['id'];
		$nama = $i['nama'];
		$nohp = $i['nohp'];
		$email = $i['email'];
		$alamat = $i['alamat'];
		$jenkel = $i['jenis_kelamin'];
	?>

		<div id="modal_edit<?= $id; ?>" uk-modal>
			<div class="uk-modal-dialog uk-modal-body">
				<h2 class="uk-modal-title">Edit Data</h2>
				<button class="uk-modal-close-default" type="button" uk-close></button>
				<form class="form-horizontal" method="post" action="<?= base_url() . 'admin/edit_orang' ?>">
					<input name="id" value="<?= $id; ?>" type="hidden">
					<div class="uk-margin">
						<label class="control-label col-xs-3">QR ID</label>
						<div class="col-xs-8">
							<input value="<?= $id; ?>" class="uk-input" type="text" placeholder="" disabled>
						</div>
					</div>

					<div class="uk-margin">
						<label class="control-label col-xs-3">NAMA</label>
						<div class="col-xs-8">
							<input name="nama" value="<?= $nama; ?>" class="uk-input" type="text" placeholder="" required>
						</div>
					</div>

					<div class="uk-margin">
						<label class="control-label col-xs-3">NO. HP (FORMAT 62)</label>
						<div class="col-xs-8">
							<input name="nohp" value="<?= $nohp; ?>" class="uk-input" type="text" placeholder="" required>
						</div>
					</div>

					<div class="uk-margin">
						<label for="jenis_kelamin" class="control-label">JENIS KELAMIN:</label>
						<select name="jenis_kelamin" class="uk-select" required>
							<option value="Pria" <?php if ($jenkel == 'Pria') : echo 'selected=selected';
													endif ?>>Pria</option>
							<option value="Wanita" <?php if ($jenkel == 'Wanita') : echo 'selected=selected';
													endif ?>>Wanita</option>
						</select>
					</div>

					<div class="uk-margin">
						<label class="control-label col-xs-3">EMAIL</label>
						<div class="col-xs-8">
							<input name="email" value="<?= $email; ?>" class="uk-input" type="text" placeholder="" required>
						</div>
					</div>

					<div class="uk-margin">
						<label class="control-label col-xs-3">ALAMAT</label>
						<div class="col-xs-8">
							<textarea name="alamat" class="uk-input" type="text"><?= $alamat; ?></textarea>
						</div>
					</div>


					<p class="uk-text-right">
						<button class="uk-button uk-button-default uk-modal-close" type="button">Tutup</button>
						<button class="uk-button uk-button-primary">Update</button>
					</p>
				</form>
			</div>
		</div>


	<?php endforeach; ?>
	<!--END MODAL-->

	<?php $this->load->view('admin/footer'); ?>