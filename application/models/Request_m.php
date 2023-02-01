<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Request_m extends CI_Model 
{
    public function get($id = null)
    {
        $this->db->from('m_request');
        if($id != null)
            {
                $this->db->where('kd_req', $id);
            }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = 
        [
            'jenis_kayu' => $post['jenis'],
            'jumlah' => $post['jumlah'],
            'keterangan' => $post['alasan'],
            'ukuran' => $post['ukuran'],
            'date' => $post['date'],
            'status' => 'Menunggu persetujuan',
        ];
        $this->db->insert('m_request', $params);
    }

	public function confirm($id)
	{
        $params = 
        [
            'status' => 'Permintaan disetujui',
        ];
        $this->db->where('kd_req', $id);
		$this->db->update('m_request', $params);
	}

	public function getSupplier()
	{
		$qry = $this->db->query("SELECT supplier_id,`name` FROM supplier WHERE is_active = '0'")->result_array();
        if ($qry) {
            return $qry;
        } else {
            return false;
        }
	}

	public function getMstrBrg()
	{
		$qry = $this->db->query(
			"SELECT 
				kode
				, sub_kode
				, sub_data
				, `name`
				, length_size
				, width_size
				, lumber_type
				, species_type 
			FROM 
				m_barang
			WHERE 
				is_active = '0'
				AND sub_kode != '*'
				AND sub_data != '*'
			"
		)->result_array();

		$response = [];
		foreach ($qry as $val) {
			$data = array(
				'kode' 			=> $val['kode'],
				'sub_kode' 		=> $val['sub_kode'],
				'sub_data' 		=> $val['sub_data'],
				'name' 			=> $val['name'],
				'length_size' 	=> $val['length_size'],
				'width_size' 	=> $val['width_size'],
				'lumber_type' 	=> $val['lumber_type'],
				'species_type' 	=> $val['species_type'],
			);
			array_push($response, $data);
		}

        return $response;
	}

	public function getKdReq()
	{
		// Hapus data temporary hari sebelumnya
		$qry = $this->db->query(
            "SELECT 
                id_tem_req
            FROM tem_req
            WHERE 
                SUBSTR(kd_req, 4, 2) != if( DAY(CURDATE()) < 10, CONCAT('0',DAY(CURDATE())),DAY(CURDATE()))
                AND SUBSTR(kd_req, 6, 2) != if( MONTH(CURDATE()) < 10, CONCAT('0',MONTH(CURDATE())),MONTH(CURDATE()))"
        )->result_array();

		if ($qry) {
            for ($i = 0; $i < count($qry); $i++) {
                $this->db->delete("tem_req", array("id_tem_req" => $qry[$i]['id_tem_req']));
            }
        }

		// Ambil kode pembelian terbaru
        $qry2 = $this->db->query(
            "SELECT 
                MAX(SUBSTR(kd_req, 10, 5)) AS kode,
                SUBSTR(kd_req, 4, 2) AS day,
                SUBSTR(kd_req, 6, 2) AS month,
                SUBSTR(kd_req, 8, 2) as year
            FROM m_request
            WHERE 
                SUBSTR(kd_req, 4, 2) = if( DAY(CURDATE()) < 10, CONCAT('0',DAY(CURDATE())),DAY(CURDATE()))
                AND SUBSTR(kd_req, 6, 2) = if( MONTH(CURDATE()) < 10, CONCAT('0',MONTH(CURDATE())),MONTH(CURDATE()))
                AND SUBSTR(kd_req, 8, 2) = SUBSTR(YEAR(CURDATE()), 3,2)"
        )->result_array();

        $urutan = (int) $qry2[0]['kode'];
        $urutan++;

        $kode = "REQ";
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

	public function postData($table, $data)
	{
		$insert = $this->db->insert($table, $data);
        if ($insert) {
            return $insert;
        } else {
            return false;
        }
	}

	public function GetDtlBarang($kodeReq)
	{
		$qry = $this->db->get_where("tem_req", array("kd_req" => $kodeReq))->result_array();

        if ($qry) {
            return $qry;
        } else {
            return false;
        }
	}

	public function delTmpReq($table, $idTemReq)
	{
		$data = $this->db->get_where($table, array('id_tem' => $idTem))->result_array();
        if ($this->db->affected_rows() > 0) {
            activity_log("Tambah permintaan barang", "Delete", $data[0]["kd_req"]);
            $action = $this->db->delete($table, array('id_tem' => $idTem));
            return $action;
        } else {
            return false;
        }
	}
}
