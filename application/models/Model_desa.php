<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_desa extends CI_Model {

	public function get_all()
	{

		if ( $this->session->userdata('role') == 2 ) {
			$this->db->where('desa.kec_id', $this->session->userdata('kec_id'));
		} elseif ( $this->session->userdata('role') == 3 ) {
			$this->db->where('desa.id', $this->session->userdata('desa_id'));
		}

		$this->db->select('desa.id, desa.nama, kecamatan.nama as nama_kecamatan'); 

		$this->db->join('kecamatan', 'desa.kec_id = kecamatan.id');
		$this->db->order_by('desa.id', 'desc');
		$query = $this->db->get('desa')->result_array();

		return $query;
	}	
	
	public function get_detail($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('desa')->row_array();

		return $query;
    }	
    
    public function delete( $post )
	{
		foreach ($post as $id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('desa');
		}

		return $delete;
	}

	function add($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	function update($table, $data, $where)
	{
		$this->db->where($where);
		return $this->db->update($table, $data);
	}	
}

/* End of file Model_asset.php */
/* Location: ./application/models/Model_asset.php */