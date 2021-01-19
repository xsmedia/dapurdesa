<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bpd extends CI_Controller {
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
								'assets/plugins/jquery-datatable/dataTables.bootstrap4.min'
							),
					'js'   => array(
								'assets/bundles/datatablescripts.bundle',
								'assets/plugins/jquery-datatable/buttons/dataTables.buttons.min',
								'assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min',
								'assets/plugins/jquery-datatable/buttons/buttons.colVis.min',
								'assets/plugins/jquery-datatable/buttons/buttons.flash.min',
								'assets/plugins/jquery-datatable/buttons/buttons.html5.min',
								'assets/plugins/jquery-datatable/buttons/buttons.print.min',
								'assets/bundles/mainscripts.bundle',
								'assets/js/pages/tables/jquery-datatable'
							),
				 );

		$this->load->view('common/header',$asset);
		$this->load->view('common/sidebar');
		$this->load->view('perangkat');
		$this->load->view('common/footer',$asset);
	}

	function add()
	{
		$asset = array(
					// 'title' => $this->title,
					'css'   => array(
								'assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker',
								'assets/plugins/bootstrap-select/css/bootstrap-select'
							),
					'js'   => array(
								'assets/plugins/momentjs/moment',
								'assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker',
								'assets/bundles/mainscripts.bundle',
								'assets/js/pages/forms/basic-form-elements'
							),
				 );


		$post = $this->input->post();
		$data = array(
			// "resp" => $this->{$this->model}->get_all($post),
			"list_kecamatan" => $this->{$this->model}->get_all_kecamatan($post),
			"post" => $post,
		);
		$this->load->view('common/header',$asset);
		$this->load->view('common/sidebar');
		$this->load->view('perangkat_add',$data);
		$this->load->view('common/footer',$asset);
	}
	public function get_all_desa_by_kecamatan()
	{
		$id = urldecode($this->uri->segment(3));
		$data = $this->{$this->model}->get_all_desa_by_kecamatan($id);

		echo json_encode($data);
	}
}
