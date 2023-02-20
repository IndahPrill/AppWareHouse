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

	public function getTimeline($kd_stock)
	{
		$qry = $this->db->query(
			"SELECT
				date_log
				, supplier_id
				, kd_req
				, kd_stock
				, kd_barang
				, qty_tot
				, qty_confir
				, qty_req
				, qty_cancel
				, remark
				, status_log
				, status_in_out
			FROM activity_log_barang 
			WHERE 
				kd_stock = '$kd_stock'
			ORDER BY date_log DESC"
		)->result_array();

		$arry = array(); 
		for ($x=0; $x < count($qry) ; $x++) { 
			$data = array(
				'date_log' => $qry[$x]['date_log'],
				'supplier_id' => $qry[$x]['supplier_id'],
				'kd_req' => $qry[$x]['kd_req'],
				'kd_stock' => $qry[$x]['kd_stock'],
				'kd_barang' => $qry[$x]['kd_barang'],
				'qty_tot' => $qry[$x]['qty_tot'],
				'qty_confir' => $qry[$x]['qty_confir'],
				'qty_req' => $qry[$x]['qty_req'],
				'qty_cancel' => $qry[$x]['qty_cancel'],
				'remark' => $qry[$x]['remark'],
				'status_log' => $qry[$x]['status_log'],
				'status_in_out' => $qry[$x]['status_in_out']
			);
			array_push($arry, $data);
		}
		
		return $qry;
	}

	public function postStock($table, $data)
	{
        $dateNow = date('Y-m-d H:i:s');
		$insert = $this->db->insert($table, $data);
        if ($insert) {
            activity_log_barang($dateNow, $data['supplier_id'], "", $data['kd_stock'], $data['kd_barang'], $data['qty'], '0', '0', '0', "", '0', '2');
            return $insert;
        } else {
            return false;
        }
	}

    public function GetStock()
	{
		$qry = $this->db->query(
			"SELECT
				a.kd_stock,
				a.kd_barang,
				-- SUM(a.qty) tot_qty,
                a.qty tot_qty,
				a.nama_brg,
				a.length_size,
				a.width_size,
				a.lumber_type,
				a.species_type
			FROM
				m_stock a
			-- WHERE
			-- 	a.is_active != '1' 
			-- 	AND a.qty > 0
			-- GROUP BY 
			-- 	a.kd_barang
			ORDER BY
				a.created_at
			"
		)->result_array();

		$response = [];
		foreach ($qry as $val) {
			$data = array(
				'kd_stock'		=> $val['kd_stock'],
				'kd_barang'		=> $val['kd_barang'],
				'tot_qty' 		=> $val['tot_qty'],
				'nama_brg'		=> $val['nama_brg'],
				'length_size' 	=> $val['length_size'],
				'width_size' 	=> $val['width_size'],
				'lumber_type' 	=> $val['lumber_type'],
				'species_type' 	=> $val['species_type'],
			);
			array_push($response, $data);
		}

        return $response;
	}
}
