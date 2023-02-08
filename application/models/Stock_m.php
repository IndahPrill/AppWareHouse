<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_m extends CI_Model 
{
    public function getKdSto()
	{
		// Ambil kode pembelian terbaru
        $qry2 = $this->db->query(
            "SELECT 
				MAX(SUBSTR(kd_stock, 10, 4)) kode,
				SUBSTR(kd_stock, 4,2) year,
				SUBSTR(kd_stock, 6,2) month,
				SUBSTR(kd_stock, 8,2) day,
				if( DAY(CURDATE()) < 10, CONCAT('0',DAY(CURDATE())),DAY(CURDATE()))
			FROM m_stock
			WHERE 
				SUBSTR(kd_stock, 4, 2) = SUBSTR(YEAR(CURDATE()), 3,2)
				AND SUBSTR(kd_stock, 6, 2) = if( MONTH(CURDATE()) < 10, CONCAT('0',MONTH(CURDATE())),MONTH(CURDATE()))"
        )->result_array();

        $urutan = (int) $qry2[0]['kode'];
        $urutan++;

        $kode = "STO";
        $day   = date("d");
        $month = date("m");
        $year  = substr(date("Y"), 2, 2);

        $getKode = $kode . $year . $month . $day . sprintf("%04s", $urutan);

        if ($getKode) {
            return $getKode;
        } else {
            return false;
        }
	}

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

	public function postStock($table, $data)
	{
		$insert = $this->db->insert($table, $data);
        if ($insert) {
            return $insert;
        } else {
            return false;
        }
	}
}
