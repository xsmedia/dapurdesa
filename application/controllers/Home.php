<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$asset = array(
					// 'title' => $this->title,
					'css'   => array(
								// 'assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min',
								// 'assets/plugins/charts-c3/plugin',
								// 'assets/plugins/morrisjs/morris.min'
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
							    'assets/js/d3.min',
							    'assets/js/topojson.min',
							    'assets/js/datamaps.all.min',
							    'assets/js/datamaps-zoomto',
							    'assets/js/datamaps.custom',
							    'assets/js/Chart.min',
							    'assets/js/gauge.min',
							    'assets/js/jquery.sparkline.min',
							    'assets/js/apexcharts.min',
							    'assets/js/apexcharts.custom',
							    'assets/js/apps'
							),
				 );
		$this->load->view('common/header',$asset);
		$this->load->view('common/sidebar');
		$this->load->view('home');
		$this->load->view('common/footer',$asset);
	}
}
