<?php
class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('datatables');
		//pemanggilan model
		$this->load->model('admin_model', 'admin');
		$this->load->model('orang_model', 'orang');
		$this->load->model('m_crud', 'm_crud');
		$this->load->model('pengaturan_model', 'pengaturan');
		$this->load->model('konfirmasi_model', 'konfirmasi');
		$this->load->model('rekapkonfirmasi_model', 'rekapkonfirmasi');
		$this->load->model('rekaphadir_model', 'rekaphadir');
		$this->load->model('hadir_model', 'hadir');
		include APPPATH . 'third_party/PHPExcel.php';

		if (!$this->admin->logged_id()) {
			redirect('login');
		}
	}

	function index()
	{
		$data['data'] = $this->orang->get_all_orang();
		$data['jumlah'] = $this->orang->count_all_orang();
		$data['konfirmasi'] = $this->rekapkonfirmasi->query_all();
		$data['kehadiran'] = $this->rekaphadir->query_all();
		$this->load->view('admin/home', $data);
	}

	function daftartamu()
	{
		$data['data'] = $this->orang->get_all_orang();
		$this->load->view('admin/admin', $data);
	}

	function kirim_email($id)
	{
		$query = $this->orang->getById($id);
		$url = $query->qr_code;
		$receiver = $query->email;

		$row = $this->pengaturan->getById(1);
		$host = $row->smtp_host;
		$port = $row->smtp_port;
		$user = $row->smtp_user;
		$pass = $row->smtp_pass;

		$from = $user;
		$subject = 'QR Code Anda';
		$message = 'QR Code Anda, Terima Kasih';
		$attachment = base_url() . 'images/qrcode/' . $url;

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = $host;
		$config['smtp_port'] = $port;
		$config['smtp_user'] = $from;
		$config['smtp_pass'] = $pass;
		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = 'TRUE';
		$config['newline'] = "\r\n";

		$this->load->library('email', $config);
		$this->email->initialize($config);
		$this->email->from($from);
		$this->email->to($receiver);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->attach($attachment);

		if ($this->email->send()) {
			echo "sent to: " . $receiver . "<br>";
			echo "from: " . $from . "<br>";
			echo "protocol: " . $config['protocol'] . "<br>";
			echo "message: " . $message;
			//return true;
			redirect('admin');
		} else {
			echo "email send failed";

			//echo $this->email->print_debugger();

			return false;
		}
	}

	function simpan()
	{
		//$query = $this->db->query("select max(id) as last from orang");
		//$data = $query->row_array();
		//$last = $data['last'];
		//$nextNoUrut = $last + 1;
		//$id = sprintf('%04s', $nextNoUrut);

		$nama = $this->input->post('nama');
		$nohp = $this->input->post('nohp');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$jenkel = $this->input->post('jenis_kelamin');
		$nodaf = $this->orang->genNodaf($jenkel);

		$this->load->library('ciqrcode'); //pemanggilan library QR CODE

		$config['cacheable']	= true; //boolean, the default is true
		//$config['cachedir']		= './assets/'; //string, the default is application/cache/
		//$config['errorlog']		= './assets/'; //string, the default is application/logs/
		$config['imagedir']		= './images/qrcode/'; //direktori penyimpanan qr code
		$config['quality']		= true; //boolean, the default is true
		$config['size']			= '1024'; //interger, the default is 1024
		$config['black']		= array(224, 255, 255); // array, default is array(255,255,255)
		$config['white']		= array(70, 130, 180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$image_name = $nodaf . '.png'; //buat name dari qr code sesuai dengan nim

		$params['data'] = $nodaf; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 25;
		$params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		$result = $this->orang->simpan_orang($nodaf, $nama, $nohp, $jenkel, $email, $alamat, $image_name); //simpan ke database
		if ($result) {
			$this->session->set_flashdata('msg', '<div class="uk-alert-success" uk-alert>
    		<a class="uk-alert-close" uk-close></a>
    			<p>Data Tamu berhasil disimpan</p>
			</div>');
		}
		redirect('admin/daftartamu');
	}

	function edit_orang()
	{
		$id = $this->input->post('id', true);
		$nama = $this->input->post('nama', true);
		$nohp = $this->input->post('nohp', true);
		$email = $this->input->post('email', true);
		$alamat = $this->input->post('alamat', true);
		$jenkel = $this->input->post('jenis_kelamin', true);
		$tanggal = date('Y-m-d H:i:s');

		$result = $this->orang->edit_orang($id, $nama, $nohp, $email, $alamat, $tanggal, $jenkel);

		if ($result) {
			$this->session->set_flashdata('msg', '<div class="uk-alert-success" uk-alert>
    		<a class="uk-alert-close" uk-close></a>
    			<p>Data Tamu berhasil disimpan</p>
			</div>');
		}
		redirect('admin/daftartamu');
	}

	function hapus($id = null)
	{
		$result = $this->orang->hapus($id);
		if ($result) {
			unlink(realpath('images/qrcode/' . $id . '.png'));
			$this->session->set_flashdata('msg', '<div class="uk-alert-success" uk-alert>
    		<a class="uk-alert-close" uk-close></a>
    			<p>Data Tamu berhasil dihapus</p>
			</div>');
		}
		redirect('admin/daftartamu');
	}

	//function updatedata($id) {
	//if($this->input->post('submit')){
	//$this->orang->update($id);
	//redirect('admin');
	//}
	//$data['hasil'] = $this->orang->getById($id);
	//$this->load->view('admin_edit', $data);

	//}

	function lihatqr($id)
	{
		$data['hasil'] = $this->orang->getById($id);
		$data['setting'] = $this->pengaturan->getById(1);
		$this->load->view('admin/admin_lihat', $data);
	}

	public function konfirmasi()
	{
		$data['data'] = $this->konfirmasi->get_all();
		$this->load->view('admin/konfirmasi', $data);
	}

	public function kehadiran()
	{
		$data['data'] = $this->hadir->get_all();
		$this->load->view('admin/hadir', $data);
	}

	public function pengaturan()
	{
		$data['data'] = $this->pengaturan->get_all(1);
		$this->load->view('admin/pengaturan', $data);
	}

	public function pengaturan_simpan()
	{
		$id = $this->input->post('id');
		$data = array(
			'nama_web' => $this->input->post('nama_web'),
			'nama_pengantin' => $this->input->post('nama_pengantin'),
			'tempat_tanggal' => $this->input->post('tempat_tanggal'),
			'alamat' => $this->input->post('alamat'),
			'smtp_host' => $this->input->post('smtp_host'),
			'smtp_port' => $this->input->post('smtp_port'),
			'smtp_user' => $this->input->post('smtp_user'),
			'smtp_pass' => $this->input->post('smtp_pass')
		);

		$result = $this->m_crud->update('id', $id, $data, 'pengaturan');

		$this->session->set_flashdata('msg', '<div class="uk-alert-success" uk-alert>
    		<a class="uk-alert-close" uk-close></a>
    			<p>Pengaturan sistem berhasil disimpan</p>
			</div>');

		redirect('admin/pengaturan');
	}

	public function pengaturan_foto()
	{
		$data['data'] = $this->pengaturan->get_all(1);
		$this->load->view('admin/pengaturan_foto', $data);
	}

	public function pengaturan_background()
	{
		$data['data'] = $this->pengaturan->get_all(1);
		$this->load->view('admin/pengaturan_background', $data);
	}

	public function foto_simpan()
	{
		$id = $this->input->post('id');
		$foto = $this->input->post('foto');

		$result = $this->pengaturan->simpan_foto($id, $foto);
		if ($result) {
			$this->session->set_flashdata('msg', '<div class="uk-alert-success" uk-alert>
    		<a class="uk-alert-close" uk-close></a>
    			<p>Pengaturan sistem berhasil disimpan</p>
			</div>');
		}
		redirect('admin/pengaturan_foto');
	}

	public function background_simpan()
	{
		$id = $this->input->post('id');
		$background = $this->input->post('background');

		$result = $this->pengaturan->simpan_background($id, $background);
		if ($result) {
			$this->session->set_flashdata('msg', '<div class="uk-alert-success" uk-alert>
    		<a class="uk-alert-close" uk-close></a>
    			<p>Gambar Background berhasil disimpan</p>
			</div>');
		}
		redirect('admin/pengaturan_background');
	}

	function get_produk_json()
	{
		header('Content-Type: application/json');
		echo $this->konfirmasi->get_all();
	}

	function json()
	{
		header('Content-Type: application/json');
		echo $this->orang->json('*', 'orang',  array());
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	public function ganti_password()
	{
		if ($this->input->post('change_pass')) {
			$old_pass = $this->input->post('old_pass');
			$new_pass = $this->input->post('new_pass');
			$confirm_pass = $this->input->post('confirm_pass');
			$session_id = $this->session->userdata('id');
			$que = $this->db->query("select * from admin where id_admin='$session_id'");
			$row = $que->row();
			$pass = $row->password_admin;
			if ((!strcmp(md5($old_pass), $pass)) && (!strcmp($new_pass, $confirm_pass))) {
				$this->admin->change_pass($session_id, $new_pass);
				$this->session->set_flashdata('msg', '<div class="uk-alert-success" uk-alert>
					<a class="uk-alert-close" uk-close></a>
						<p>Password baru berhasil disimpan</p>
					</div>');
			} else {
				$this->session->set_flashdata('msg', '<div class="uk-alert-danger" uk-alert>
					<a class="uk-alert-close" uk-close></a>
						<p>Gagal</p>
					</div>');
			}
		}
		$this->load->view('admin/ganti_password');
	}

	public function excel_import()
	{
		$this->load->view('admin/import');
	}

	function excel_simpan()
	{
		$config['upload_path'] = realpath('excel');
		$config['allowed_types'] = 'xlsx|xls|csv';
		$config['max_size'] = '10000';
		$config['overwrite'] = false;
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload()) {
			//upload gagal
			$this->session->set_flashdata('notif', '<div class="uk-alert-warning" uk-alert><a class="uk-alert-close" uk-close></a><h3>PROSES IMPORT GAGAL!</h3><p>' . $this->upload->display_errors() . '</p></div>');
			//redirect halaman
			redirect('admin/excel_import');
		} else {
			$data_upload = $this->upload->data();

			$inputFileName = realpath('excel/' . $data_upload['file_name']);
			$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($inputFileName);

			$sheet = $objPHPExcel->getSheet(0);
			$highestRow = $sheet->getHighestRow();
			$highestColumn = $sheet->getHighestColumn();

			for ($row = 2; $row <= $highestRow; $row++) {                  //  Read a row of data into an array   
				//$query = $this->db->query("select max(id) as last from orang");
				//$data = $query->row_array();
				//$last = $data['last'];
				//$nextNoUrut = $last + 1;
				//$id = sprintf('%04s', $nextNoUrut);

				$rowData = $sheet->rangeToArray(
					'A' . $row . ':' . $highestColumn . $row,
					NULL,
					TRUE,
					FALSE
				);

				$jenkel = $rowData[0][2];
				$nodaf = $this->orang->genNodaf($jenkel);

				$this->load->library('ciqrcode'); //pemanggilan library QR CODE
				$config['cacheable']	= true; //boolean, the default is true
				//$config['cachedir']		= './assets/'; //string, the default is application/cache/
				//$config['errorlog']		= './assets/'; //string, the default is application/logs/
				$config['imagedir']		= './images/qrcode/'; //direktori penyimpanan qr code
				$config['quality']		= true; //boolean, the default is true
				$config['size']			= '1024'; //interger, the default is 1024
				$config['black']		= array(224, 255, 255); // array, default is array(255,255,255)
				$config['white']		= array(70, 130, 180); // array, default is array(0,0,0)
				$this->ciqrcode->initialize($config);
				$image_name = $nodaf . '.png'; //buat name dari qr code sesuai dengan nim
				$params['data'] = $nodaf; //data yang akan di jadikan QR CODE
				$params['level'] = 'H'; //H=High
				$params['size'] = 25;
				$params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
				$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE   

				// Sesuaikan key array dengan nama kolom di database                                                         
				$data = array(
					"id" => $nodaf,
					"nama" => $rowData[0][0],
					"nohp" => $rowData[0][1],
					"jenis_kelamin" => $jenkel,
					"alamat" => $rowData[0][3],
					"email" => $rowData[0][4],
					"qr_code" => 'images/qrcode/'.$image_name,
					"tgl_dibuat" => date('Y-m-d H:i:s')
				);
				$this->db->insert('orang', $data);
				//delete file from server
				//unlink(realpath('excel/' . $data_upload['file_name']));
			}

			//upload success
			$this->session->set_flashdata('notif', '<div class="uk-alert-success"  uk-alert><a class="uk-alert-close" uk-close></a><h3>PROSES IMPORT BERHASIL!</h3><p>Data berhasil diimport!</p></div>');
			//redirect halaman
			redirect('admin/excel_import');
		}
	}
}
