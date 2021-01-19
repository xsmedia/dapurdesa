<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_apps extends CI_Model {

	public function get_all_desa_by_kecamatan($kec_id)
	{
		$resp = array();

		$this->db->where('kode_kec', $kec_id);
		$this->db->order_by('name', 'asc');
		$query = $this->db->get('master.tb_desa')->result_array();

		return $query;
	}
	public function get_all_kecamatan($post)
	{
		$resp = array();

		if ($this->session->userdata('role') != 1 ) {
			if ( @$post['kec_id'] != "" ) {
				$this->db->where('id', $post['kec_id']);
			}
		}
	
		$this->db->order_by('name', 'asc');
		$query = $this->db->get('master.tb_kec')->result_array();
		// pre(json_encode($resp));

		return $query;
    }
    function get_jabatan()
    {
    	$this->db->where('status',1);
    	$this->db->order_by('id_jabatan', 'asc');
		$query = $this->db->get('public.tb_jabatan')->result_array();
		return $query;
    }
    function get_jabatan_by_id($id)
    {
    	$this->db->where('id_jabatan',$id);
    	$query = $this->db->get('public.tb_jabatan')->result_array();
		return $query;
    }
    function jabatan_add($data)
    {
    	$this->db->insert('public.tb_jabatan', $data);
		return $this->db->affected_rows() > 0;
    }
    function jabatan_edit($data,$id)
    {
    	$this->db->where('id_jabatan', $id);
        $this->db->update('public.tb_jabatan', $data);
        return $this->db->affected_rows();
    }
    function jabatan_delete($data,$id)
    {
    	$this->db->where('id_jabatan', $id);
        $this->db->update('public.tb_jabatan', $data);
        return $this->db->affected_rows();
    }

    function get_pendidikan()
    {
    	$this->db->where('status',1);
    	$this->db->order_by('id_pendidikan', 'asc');
		$query = $this->db->get('public.tb_pendidikan')->result_array();
		return $query;
    }
    function get_pendidikan_by_id($id)
    {
    	$this->db->where('id_pendidikan',$id);
    	$query = $this->db->get('public.tb_pendidikan')->result_array();
		return $query;
    }

    function pendidikan_add($data)
    {
    	$this->db->insert('public.tb_pendidikan', $data);
		return $this->db->affected_rows() > 0;
    }
    function pendidikan_edit($data,$id)
    {
    	$this->db->where('id_pendidikan', $id);
        $this->db->update('public.tb_pendidikan', $data);
        return $this->db->affected_rows();
    }
    function pendidikan_delete($data,$id)
    {
    	$this->db->where('id_pendidikan', $id);
        $this->db->update('public.tb_pendidikan', $data);
        return $this->db->affected_rows();
    }

}