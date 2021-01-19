<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kecamatan extends CI_Model {

	public function get_all()
	{
		if ( $this->session->userdata('role') == 2 ) {
			$this->db->where('kecamatan.id', $this->session->userdata('kec_id'));
		} 

		$query = $this->db->get('kecamatan')->result_array();

		return $query;
	}	
	
	public function get_detail($id)
	{
		$query = $this->db->where('id', $id);
		$query = $this->db->get('kecamatan')->row_array();

		return $query;
    }	
    
    public function delete( $post )
	{
		foreach ($post as $id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('kecamatan');
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