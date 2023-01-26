<?php defined('BASEPATH') OR exit('No direct script access allowed');

class item_m extends CI_Model 
{
    public function get($id = null)
    {
        $this->db->from('m_stock');
        if($id != null) {
            $this->db->where('kd_req', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = array(
                    'kode'      => $post['kode'],
                    'kategori'  => $post['category'],
                    'nama'      => $post['nama'],
                    'ukuran'    => $post['ukuran'],
                );
        $this->db->insert('item', $params);
    }

    public function edit($post)
    {
        $params = array(
                    'kode'      => $post['kode'],
                    'kategori'  => $post['category'],
                    'nama'      => $post['nama'],
                    'ukuran'    => $post['ukuran'],
                );
        $this->db->where('item_id', $post['id']);
        $this->db->update('item', $params);
    }

    public function check_kode($code, $id = null) {
        $this->db->from('item');
        $this->db->where('kode', $code);
        if($id != null){
            $this->db->where('item_id !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
	{
        $this->db->where('item_id', $id);
		$this->db->delete('item');
	}

    function update_stock_in($data)
    {
        $jml = $data['jml'];
        $id = $data['nama'];
        $sql = "UPDATE item SET stock = stock + '$jml' WHERE item_id = '$id'";
        $this->db->query($sql); 
    }

    function update_stock_out($data)
    {
        $jml = $data['jml'];
        $id = $data['nama'];
        $sql = "UPDATE item SET stock = stock - '$jml' WHERE item_id = '$id'";
        $this->db->query($sql); 
    }
    
}