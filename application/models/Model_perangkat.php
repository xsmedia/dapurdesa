<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_perangkat extends CI_Model {

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
			if ( @$post['kode_kec'] != "" ) {
				$this->db->where('kode_kec', $post['kode_kec']);
			}
		}
	
		$this->db->order_by('name', 'asc');
		$query = $this->db->get('master.tb_kec')->result_array();
		// pre(json_encode($resp));

		return $query;
    }
    function get_desa_by_id($id)
    {
    	$this->db->where('kode_desa',$id);
    	$query = $this->db->get('master.tb_desa')->result_array();
		return $query;
    }
    function get_all_perangkat()
    {
    	$this->db->select('*');
    	$this->db->join('master.tb_desa', 'tb_desa.kode_desa = perangkat.desa_id');
    	$this->db->join('master.tb_kec', 'tb_kec.kode_kec = tb_desa.kode_kec' );
    	$this->db->join('public.tb_jabatan', 'tb_jabatan.id_jabatan = perangkat.jabatan_id' );
    	$this->db->select('tb_kec.*, tb_kec.name as nama_kec'); 
    	$this->db->select('tb_desa.*, tb_desa.name as nama_desa');
    	$this->db->where('perangkat.status',1); 
    	$this->db->order_by('id_prkt', 'asc');
		$query = $this->db->get('aplikasi.perangkat')->result_array();
		return $query;
    }
    function get_perangkat_by_id($id)
    {
    	$this->db->where('id_prkt',$id);
    	$query = $this->db->get('aplikasi.perangkat')->result_array();
		return $query;
    }
    function get_jabatan()
    {
    	$this->db->order_by('id_jabatan', 'asc');
		$query = $this->db->get('public.tb_jabatan')->result_array();
		return $query;
    }
    function get_pendidikan()
    {
    	$this->db->order_by('id_pendidikan', 'asc');
		$query = $this->db->get('public.tb_pendidikan')->result_array();
		return $query;
    }


    function add_perangkat($data)
    {
    	$this->db->insert('aplikasi.perangkat', $data);
		return $this->db->affected_rows() > 0;
    }
    function perangkat_update($data,$id)
    {
    	$this->db->where('id_prkt', $id);
        $this->db->update('aplikasi.perangkat', $data);
        return $this->db->affected_rows();
    }
    function perangkat_delete($data,$id)
    {
    	$this->db->where('id_prkt', $id);
        $this->db->update('aplikasi.perangkat', $data);
        return $this->db->affected_rows();
    }

}