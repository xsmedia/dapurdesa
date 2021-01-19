<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perangkat extends CI_Controller {
	var $url   = 'perangkat';
	var $model = 'Model_perangkat';
	var $model_kecamatan = 'Model_kecamatan';
	var $model_desa = 'Model_desa';
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Model_perangkat');
		$this->load->model('Model_kecamatan');
		$this->load->model('Model_desa');
	}
	public function index()
	{
		$asset = array(
			// 'title' => $this->title,
			'css'   => array(
						'assets/css/dataTables.bootstrap4'
						// 'assets/plugins/bootstrap-select/css/bootstrap-select'
					),
			'js'   => array(
						'assets/js/jquery.min',
					    'assets/js/popper.min',
					    'assets/js/moment.min',
					    'assets/js/bootstrap.min',
					    'assets/js/simplebar.min',
					    'assets/js/daterangepicker',
					    'assets/js/jquery.stickOnScroll',
					    'assets/js/tinycolor-min',
					    'assets/js/config',
						'assets/js/jquery.dataTables.min',
						'assets/js/dataTables.bootstrap4.min',
					    'assets/js/apps'
					    // 'assets/js/dapurdesa'
						
					),
		 );
		$post = $this->input->post();
		if ($post) {
			if (isset($post['reset']) ) {
				redirect('perangkat');
				
				unset($post['filter']);
				unset($post['reset']);
			}
		}
		
		$data = array(
			"data_perangkat" => $this->{$this->model}->get_all_perangkat(),
			"list_kecamatan" => $this->{$this->model}->get_all_kecamatan($post),
			"post" => $post
		);
		$this->load->view('common/header',$asset);
		$this->load->view('common/sidebar');
		$this->load->view('perangkat',$data);
		$this->load->view('common/footer',$asset);
	}

	function add()
	{
		$asset = array(
					// 'title' => $this->title,
					'css'   => array(
								
							),
					'js'   => array(
								
								'assets/js/jquery.min',
							    'assets/js/popper.min',
							    'assets/js/moment.min',
							    'assets/js/bootstrap.min',
							    'assets/js/simplebar.min',
							    'assets/js/daterangepicker',
							    'assets/js/jquery.stickOnScroll',
							    'assets/js/tinycolor-min',
							    'assets/js/config',
							    'assets/js/jquery.mask.min',
							    'assets/js/select2.min',
							    'assets/js/jquery.steps.min',
							    'assets/js/jquery.validate.min',
							    'assets/js/jquery.timepicker',
							    'assets/js/dropzone.min',
							    'assets/js/uppy.min',
							    'assets/js/quill.min',
							   
							    'assets/js/apps',
							     'assets/js/dapurdesa'
							),
				 );


		$post = $this->input->post();

		if ( $post ) {
			$data = array(
				"desa_id" => $post['desa_id'],
				"nama_lengkap" => $post['nama_lengkap'],
				"tgl_lahir" => $post['tgl_lahir'],
				"jenis_kelamin"	=> $post['jenis_kelamin'],
				"pendidikan_id"	=> $post['pendidikan_id'],
				"no_sk" => $post['no_sk'],
				"tgl_sk" => $post['tgl_sk'],
				"jabatan_id" => $post['jabatan_id'],
				"pns"	=> $post['pns'],
				"status"	=> 1,
				"created_by" => 1,
				"created_dt" => date('Y-m-d H:i:s')
			);
			$save = $this->{$this->model}->add_perangkat($data);
			if ( $save ) {
				$this->session->set_flashdata('success', 'Berhasil menyimpan data.');
				redirect('perangkat');
			} else {
				$this->session->set_flashdata('warning', 'Gagal meyimpan data.');
			}
		}

		$data = array(
			// "resp" => $this->{$this->model}->get_all($post),
			"list_kecamatan" => $this->{$this->model}->get_all_kecamatan($post),
			'list_jabatan' => $this->{$this->model}->get_jabatan(),
			"list_pendidikan" => $this->{$this->model}->get_pendidikan(),
			"post" => $post,
		);
		$this->load->view('common/header',$asset);
		$this->load->view('common/sidebar');
		$this->load->view('perangkat_add',$data);
		$this->load->view('common/footer',$asset);
	}
	function edit($id)
	{	
		$asset = array(
			// 'title' => $this->title,
			'css'   => array(
						
					),
			'js'   => array(
						
						'assets/js/jquery.min',
					    'assets/js/popper.min',
					    'assets/js/moment.min',
					    'assets/js/bootstrap.min',
					    'assets/js/simplebar.min',
					    'assets/js/daterangepicker',
					    'assets/js/jquery.stickOnScroll',
					    'assets/js/tinycolor-min',
					    'assets/js/config',
					    'assets/js/jquery.mask.min',
					    'assets/js/select2.min',
					    'assets/js/jquery.steps.min',
					    'assets/js/jquery.validate.min',
					    'assets/js/jquery.timepicker',
					    'assets/js/dropzone.min',
					    'assets/js/uppy.min',
					    'assets/js/quill.min',
					    'assets/js/apps',
					     'assets/js/dapurdesa'
					),
		 );
		$post = $this->input->post();
		$cek_desa = $this->{$this->model}->get_perangkat_by_id($id);
		$kode_kec = 0;
		$kode_desa = 0;
		foreach ($cek_desa as $dat) {
			$kode_desa = $dat['desa_id'];
		}
		$cek_kec = $this->{$this->model}->get_desa_by_id($kode_desa);
		foreach ($cek_kec as $dt) {
			$kode_kec = $dt['kode_kec'];
		}
		// echo $kode_kec;

		// if ( $post ) {
		// 	if (isset($post['reset']) ) {
		// 		redirect('home');
		// 	}
		// 	unset($post['filter']);
		// 	unset($post['reset']);
		// } else {
		// 	$post['kec_id'] = $kode_kec;
		// 	$post['desa_id'] = $kode_desa;
		// }
		if (isset($post['update'])) {

			$data = array(
				"desa_id" => $post['desa_id'],
				"nama_lengkap" => strtoupper($post['nama_lengkap']),
				"tgl_lahir" => $post['tgl_lahir'],
				"jenis_kelamin"	=> $post['jenis_kelamin'],
				"pendidikan_id"	=> $post['pendidikan_id'],
				"no_sk" => $post['no_sk'],
				"tgl_sk" => $post['tgl_sk'],
				"jabatan_id" => $post['jabatan_id'],
				"pns"	=> $post['pns'],
				"status"	=> 1,
				"update_by" => 1,
				"update_dt" => date('Y-m-d H:i:s')
			);
			$save = $this->{$this->model}->perangkat_update($data,$id);
			if ( $save ) {
				$this->session->set_flashdata('success', 'Berhasil memperbaharui data.');
				redirect('perangkat');
			} else {
				$this->session->set_flashdata('warning', 'Gagal memperbaharui data.');
			}
		}
		$data = array(
			"list_kecamatan" => $this->{$this->model}->get_all_kecamatan($post),
			'list_jabatan' => $this->{$this->model}->get_jabatan(),
			"list_pendidikan" => $this->{$this->model}->get_pendidikan(),
			"data_perangkat" => $this->{$this->model}->get_perangkat_by_id($id),
			"kode_kec" => $kode_kec,
			"kode_desa" => $kode_desa,
			"post" => $post,
		);
		$this->load->view('common/header',$asset);
		$this->load->view('common/sidebar');
		$this->load->view('perangkat_edit',$data);
		$this->load->view('common/footer',$asset);
	}

	function delete($id)
	{
		$data = array(
			"status" => 0
		);
		$save = $this->{$this->model}->perangkat_delete($data,$id);
		if ( $save ) {
			$this->session->set_flashdata('success', 'Berhasil Menghapus data.');
			redirect('perangkat');
		} else {
			$this->session->set_flashdata('warning', 'Gagal Menghapus data.');
		}
	}
	public function get_all_desa_by_kecamatan($kec_id)
	{
		$id = urldecode($this->uri->segment(3));
		$data = $this->{$this->model}->get_all_desa_by_kecamatan($id);

		echo json_encode($data);
	}
}
