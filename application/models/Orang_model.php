<?php
class Orang_model extends CI_Model
{

	function get_all_orang()
	{
		$hasil = $this->db->get('orang');
		return $hasil;
	}

	function count_all_orang()
	{
		$hasil = $this->db->count_all('orang');
		return $hasil;
	}

	function genNodaf($jenkel, $startnum = '0001')
	{
		if ($jenkel == 'Pria') {
			$kode = '1';
		} else {
			$kode = '2';
		}

		$this->db->select("max(right(id,4))+1 as id");
		$this->db->from('orang');
		$hasil = $this->db->get()->row_array();

		$nodafe = '';
		if (is_null($hasil['id'])) {
			$nodafe = $kode . $startnum;
		} else {
			$id = sprintf('%04s', $hasil['id']);
			$nodafe = $kode . $id;
		}
		return $nodafe;
	}

	function simpan_orang($id, $nama, $nohp, $jenkel, $email, $alamat, $image_name)
	{
		$data = array(
			'id' 			=> $id,
			'nama' 			=> $nama,
			'nohp' 			=> $nohp,
			'jenis_kelamin' => $jenkel,
			'email'     	=> $email,
			'alamat' 		=> $alamat,
			'qr_code' 		=> 'images/qrcode/'.$image_name,
			'tgl_dibuat' 	=> date('Y-m-d H:i:s')
		);
		$this->db->insert('orang', $data);
	}

	function edit_orang($id, $nama, $nohp, $email, $alamat, $tanggal, $jenkel)
	{
		$hasil = $this->db->query("UPDATE orang SET nama='$nama', nohp='$nohp', email='$email', alamat='$alamat', jenis_kelamin='$jenkel', tgl_diubah='$tanggal' WHERE id='$id'");
		return $hasil;
	}

	function update($id)
	{
		$id = $this->input->post('id');
		$nama  = $this->input->post('nama');
		$ucapan = $this->input->post('ucapan');
		$konfirmasi = $this->input->post('konfirmasi');

		$data = array(
			'id' => $id,
			'nama'  => $nama,
			'ucapan' => $ucapan,
			'konfirmasi2' => $konfirmasi
		);
		$this->db->where('id', $id);
		$this->db->update('orang', $data);
	}


	function update_image($id)
	{
		$id = $this->input->post('id');

		$config['upload_path'] = './images/photos/';
		$config['max_size'] = 10240;
		$config['allowed_types'] = "JPEG|JPG|png|jpg|jpeg|gif";
		$config['remove_spaces'] = TRUE;
		$config['overwrite'] = TRUE;
		$config['encrypt_name']  = TRUE;

		$this->load->library('upload', $config);
		//check if a file is being uploaded
		if (strlen($_FILES["foto"]["name"]) > 0) {

			if (!$this->upload->do_upload("foto")) //Check if upload is unsuccessful
			{
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
			} else {
				$config['image_library'] = 'gd2';
				$config['source_image'] = $this->upload->upload_path . $this->upload->file_name;
				$filename = $_FILES['foto']['tmp_name'];

				$imgdata = exif_read_data($this->upload->upload_path . $this->upload->file_name, 'IFD0');

				list($width, $height) = getimagesize($filename);
				if ($width >= $height) {
					$config['width'] = 400;
				} else {
					$config['height'] = 400;
				}
				$config['master_dim'] = 'auto';

				$this->load->library('image_lib', $config);

				if (!$this->image_lib->resize()) {
					echo "error";
				} else {
					$this->image_lib->clear();
					$config = array();
					$config['image_library'] = 'gd2';
					$config['source_image'] = $this->upload->upload_path . $this->upload->file_name;
					switch ($imgdata['Orientation']) {
						case 3:
							$config['rotation_angle'] = '180';
							break;
						case 6:
							$config['rotation_angle'] = '270';
							break;
						case 8:
							$config['rotation_angle'] = '90';
							break;
					}

					$this->image_lib->initialize($config);
					$this->image_lib->rotate();
					$data_image = $this->upload->data('file_name');
					$picture = $data_image;
				}
			}
		} else {
			$picture = $this->input->post('old_foto');
		}

		$data = array(
			'id' => $id,
			'foto' => 'images/photos/' . $picture
		);
		$this->db->where('id', $id);
		$this->db->update('orang', $data);
	}


	function getById($id)
	{
		return $this->db->get_where('orang', array('id' => $id))->row();
	}

	function hapus($id)
	{
		return $this->db->delete('orang', array('id' => $id));;
	}

	function json($select, $table, $where)
	{
		$this->datatables->select($select);
		$this->datatables->from($table);
		$this->datatables->where($where);
		$this->db->order_by("tgl_dibuat", "ASC");
		return $this->datatables->generate();
	}
}
