<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_m extends CI_Model 
{
    public function get($id = null)
    {
        $this->db->from('supplier');
        if($id != null)
            {
                $this->db->where('supplier_id', $id);
            }
        $query = $this->db->get();
        return $query;
    }


    public function add($post)
    {
        $params = 
        [
            'name' => $post['sup_name'],
            'phone' => $post['sup_phone'],
            'address' => $post['sup_add'],
            'description' => empty($post['sup_desc'])? null: $post['sup_desc'],
        ];
        $this->db->insert('supplier', $params);
    }

    public function edit($post)
    {
        $params = 
        [
            'name' => $post['sup_name'],
            'phone' => $post['sup_phone'],
            'address' => $post['sup_add'],
            'description' => empty($post['sup_desc'])? null: $post['sup_desc'],
        ];
        $this->db->where('supplier_id', $post['id']);
        $this->db->update('supplier', $params);
    }
 
    public function del($id)
	{
        $this->db->where('supplier_id', $id);
		$this->db->delete('supplier');
	}
}