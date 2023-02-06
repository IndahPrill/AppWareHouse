<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_m extends CI_Model 
{
    
    public function getListStock()
    {
        $this->db->select('kd_barang, nama_brg, length_size, width_size, lumber_type, species_type, qty, created_at');
        $this->db->from('m_stock');
        $this->db->order_by('date', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function get_stock_out()
    {
        $this->db->select('stock.stock_id, item.kode, item.nama as nama_item, jumlah, date, detail, item.item_id');
        $this->db->from('stock');
        $this->db->join('item', 'stock.item_id = item.item_id');
        $this->db->where('type', 'out');
        $this->db->order_by('date', 'asc');
        $query = $this->db->get();
        return $query;
    }
    public function add_stock_in($post)
    {
        $supplier = $this->supplier_m->get()->result();
        $params = 
        [
            'item_id' => $post['nama'],
            'type' => 'in',
            'detail' => $post['detail'],
            'supplier_id' => $post['supplier'] == '' ? null : $post['supplier'],
            'jumlah' => $post['jml'],
            'date' => $post['date'],
            'user_id' => $this->session->userdata('userid'),
        ];
        $this->db->insert('stock', $params);
    }

    public function add_stock_out($post)
    {
        $params = 
        [
            'item_id' => $post['nama'],
            'type' => 'out',
            'detail' => $post['detail'],
            'jumlah' => $post['jml'],
            'date' => $post['date'],
            'user_id' => $this->session->userdata('userid'),
        ];
        $this->db->insert('stock', $params);
    }

	public function getTimeline($kd_req, $kd_barang)
	{
		$qry = $this->db->query(
			"SELECT * FROM activity_log_barang 
			WHERE 
					kd_req = '$kd_req'
					AND kd_barang = '$kd_barang'
			ORDER BY date_log DESC"
		)->result_array();
		
		if ($qry) {
            return $qry;
        } else {
            return false;
        }
	}
}
