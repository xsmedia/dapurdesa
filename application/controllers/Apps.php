<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apps extends CI_Controller {
	var $url   = 'apps';
	var $model = 'Model_perangkat';
	var $model_kecamatan = 'Model_kecamatan';
	var $model_apps = 'Model_apps';
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Model_apps');
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
		$data = array(
			"data_perangkat" => $this->{$this->model}->get_all_perangkat(),
			"list_kecamatan" => $this->{$this->model}->get_all_kecamatan($post)
		);
		$this->load->view('common/header',$asset);
		$this->load->view('common/sidebar');
		$this->load->view('perangkat',$data);
		$this->load->view('common/footer',$asset);
	}

	function jabatan()
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
		$data = array(
			"jabatan" => $this->{$this->model_apps}->get_jabatan()
		);
		$this->load->view('common/header',$asset);
		$this->load->view('common/sidebar');
		$this->load->view('jabatan',$data);
		$this->load->view('common/footer',$asset);
	}
	function jabatan_add()
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
		if ( $post ) {
			$data = array(
				"nama_jabatan" => ucwords($post['nama_jabatan']),
				"kode_jabatan" => strtoupper($post['kode_jabatan'])
			);
			$save = $this->{$this->model_apps}->jabatan_add($data);
			if ( $save ) {
				$this->session->set_flashdata('success', 'Berhasil menyimpan data.');
				redirect('apps/jabatan');
			} else {
				$this->session->set_flashdata('warning', 'Gagal meyimpan data.');
			}
		}
		$data = array(
			"jabatan" => $this->{$this->model_apps}->get_jabatan()
		);
		$this->load->view('common/header',$asset);
		$this->load->view('common/sidebar');
		$this->load->view('jabatan_add',$data);
		$this->load->view('common/footer',$asset);
	}
	function jabatan_edit($id)
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
		if ( $post ) {
			$id = $post['id_jabatan'];
			$data = array(
				"nama_jabatan" => ucwords($post['nama_jabatan']),
				"kode_jabatan" => strtoupper($post['kode_jabatan'])
			);
			$save = $this->{$this->model_apps}->jabatan_edit($data,$id);
			if ( $save ) {
				$this->session->set_flashdata('success', 'Berhasil memperbaharui data.');
				redirect('apps/jabatan');
			} else {
				$this->session->set_flashdata('warning', 'Gagal memperbaharui data.');
			}
		}
		$data = array(
			"jabatan" => $this->{$this->model_apps}->get_jabatan_by_id($id)
		);
		$this->load->view('common/header',$asset);
		$this->load->view('common/sidebar');
		$this->load->view('jabatan_edit',$data);
		$this->load->view('common/footer',$asset);
	}
	function jabatan_delete($id)
	{
		$data = array(
			"status" => 0
		);
		$save = $this->{$this->model_apps}->jabatan_delete($data,$id);
		if ( $save ) {
			$this->session->set_flashdata('success', 'Berhasil Menghapus data.');
			redirect('apps/jabatan');
		} else {
			$this->session->set_flashdata('warning', 'Gagal Menghapus data.');
		}
		
	}


	function pendidikan()
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
		$data = array(
			"pendidikan" => $this->{$this->model_apps}->get_pendidikan()
		);
		$this->load->view('common/header',$asset);
		$this->load->view('common/sidebar');
		$this->load->view('pendidikan',$data);
		$this->load->view('common/footer',$asset);
	}
	function pendidikan_add()
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
		if ( $post ) {
			$data = array(
				"nama" => ucwords($post['nama_pendidikan']),
				"kode" => strtoupper($post['kode_pendidikan'])
			);
			$save = $this->{$this->model_apps}->jabatan_add($data);
			if ( $save ) {
				$this->session->set_flashdata('success', 'Berhasil menyimpan data.');
				redirect('apps/pendidikan');
			} else {
				$this->session->set_flashdata('warning', 'Gagal meyimpan data.');
			}
		}
		$this->load->view('common/header',$asset);
		$this->load->view('common/sidebar');
		$this->load->view('pendidikan_add',$data);
		$this->load->view('common/footer',$asset);
	}
	function pendidikan_edit($id)
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
		if ( $post ) {
			$id = $post['id_pendidikan'];
			$data = array(
				"nama" => ucwords($post['nama_pendidikan']),
				"kode" => strtoupper($post['kode_pendidikan'])
			);
			$save = $this->{$this->model_apps}->pendidikan_edit($data,$id);
			if ( $save ) {
				$this->session->set_flashdata('success', 'Berhasil memperbaharui data.');
				redirect('apps/pendidikan');
			} else {
				$this->session->set_flashdata('warning', 'Gagal memperbaharui data.');
			}
		}
		$data = array(
			"pendidikan" => $this->{$this->model_apps}->get_pendidikan_by_id($id)
		);
		$this->load->view('common/header',$asset);
		$this->load->view('common/sidebar');
		$this->load->view('pendidikan_edit',$data);
		$this->load->view('common/footer',$asset);
	}
	function pendidikan_delete($id)
	{
		$data = array(
			"status" => 0
		);
		$save = $this->{$this->model_apps}->pendidikan_delete($data,$id);
		if ( $save ) {
			$this->session->set_flashdata('success', 'Berhasil Menghapus data.');
			redirect('apps/pendidikan');
		} else {
			$this->session->set_flashdata('warning', 'Gagal Menghapus data.');
		}
		
	}
}