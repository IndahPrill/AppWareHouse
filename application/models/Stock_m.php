<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_m extends CI_Model 
{
    
    public function get_stock_in()
    {
        $this->db->select('stock.stock_id, item.kode, item.nama as nama_item, jumlah, date, detail,
        supplier.name as nama_supplier, item.item_id');
        $this->db->from('stock');
        $this->db->join('item', 'stock.item_id = item.item_id');
        $this->db->join('supplier', 'stock.supplier_id = supplier.supplier_id', 'left');
        $this->db->where('type', 'in');
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

	public function getMstrStock()
	{
		$qry = $this->db->query(
			"SELECT
				a.kd_req
				, a.kd_barang
				, date(a.created_at) date_in
				, a.length_size
				, a.width_size
				, a.lumber_type
				, a.species_type
				, SUM(a.qty) total
				, a.qty
				, b.nama_brg
			FROM 
				m_stock a
				LEFT JOIN (
					SELECT  
						CASE 
							WHEN kode < 10 THEN
								CONCAT('0',kode)
							ELSE
								kode
						END AS kode
						, CASE 
							WHEN sub_kode < 10 THEN
								CONCAT('0',sub_kode)
							ELSE
								sub_kode
						END AS sub_kode
						, CASE 
							WHEN sub_data < 10 THEN
								CONCAT('0',sub_data)
							ELSE
								sub_data
						END AS sub_data
						, nama_brg
					FROM m_barang
					WHERE is_active != '1'
				) b ON concat('BRG',b.kode,b.sub_kode,b.sub_data) = a.kd_barang
				LEFT JOIN d_request c ON a.kd_req = c.kd_req AND a.kd_barang = c.kd_barang
			WHERE
				a.is_active = '0'
			GROUP BY a.kd_barang
			ORDER BY a.created_at ASC"
		)->result_array();

		if ($qry) {
            return $qry;
        } else {
            return false;
        }
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
