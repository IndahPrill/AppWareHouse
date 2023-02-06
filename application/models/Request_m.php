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
				a.kd_stock,
				a.kd_barang,
				SUM(a.qty) tot_qty,
				a.nama_brg,
				a.length_size,
				a.width_size,
				a.lumber_type,
				a.species_type
			FROM
				m_stock a
			WHERE
				a.is_active != '1' 
				AND a.qty > 0
			GROUP BY 
				a.kd_barang
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
		$data = $this->db->get_where($table, array('id_tem_req' => $idTem))->result_array();
        if ($this->db->affected_rows() > 0) {
            activity_log("Tambah permintaan barang", "Delete", $data[0]["kd_req"]);
            $action = $this->db->delete($table, array('id_tem_req' => $idTem));
            return $action;
        } else {
            return false;
        }
	}

	// public function postReq($kodeReq, $tglReqBrg, $kdSup, $remark, $totalQty)
	public function postReq($kodeReq, $tglReqBrg, $remark, $totalQty)
	{
		$getTemReq = $this->db->query(
			"SELECT 
				kd_req,
				kd_stock,
				kd_barang,
				nama_brg,
				length_size,
				width_size,
				lumber_type,
				species_type,
				qty
			FROM
				tem_req
			WHERE
				kd_req = '$kodeReq'"
		)->result_array();

		$dateNow = date("Y-m-d H:i:s");

        $tglReq = $tglReqBrg . " " . date("H:i:s");

		$dataMaster = array(
            'kd_req'		=> $kodeReq,
            'date_req'		=> $tglReq,
            // 'supplier_id'	=> $kdSup,
            'total_req'		=> $totalQty,
            'created_at'	=> $dateNow,
			'created_by'	=> $this->session->userdata('name')
        );

		$datadetail = array();
        for ($i = 0; $i < count($getTemReq); $i++) {
            $detail = array(
                'kd_req' 		=> $getTemReq[$i]['kd_req'],
                'kd_stock' 		=> $getTemReq[$i]['kd_stock'],
                'kd_barang'    	=> $getTemReq[$i]['kd_barang'],
                'length_size'	=> $getTemReq[$i]['length_size'],
                'length_size'	=> $getTemReq[$i]['length_size'],
                'width_size'   	=> $getTemReq[$i]['width_size'],
                'lumber_type'	=> $getTemReq[$i]['lumber_type'],
                'species_type'	=> $getTemReq[$i]['species_type'],
                'qty_tot'		=> $getTemReq[$i]['qty'],
                'qty_req'		=> $getTemReq[$i]['qty']
            );
            array_push($datadetail, $detail);
        }

		$insMater  = $this->db->insert("m_request", $dataMaster); // insert ke tabel m_request
        $insdetail = $this->db->insert_batch("d_request", $datadetail); // insert ke tabel d_request

        if ($insMater && $insdetail) {
            if ($this->db->affected_rows() > 0) {
                for ($i = 0; $i < count($getTemReq); $i++) {
					// Insert to log
                    activity_log_req(
						$tglReq
						, $kodeReq
						, $getTemReq[$i]['kd_stock']
						, $getTemReq[$i]['kd_barang']
						, $getTemReq[$i]['length_size']
						, $getTemReq[$i]['width_size']
						, $getTemReq[$i]['lumber_type']
						, $getTemReq[$i]['species_type']
						, $getTemReq[$i]['qty']
						, '0'
						, $getTemReq[$i]['qty']
						, '0'
						, $remark
						, '0');
                }
            }

            $this->db->delete("tem_req", array('kd_req' => $kodeReq)); // hapus data di tabel sementara
            return true;
        } else {
            return false;
        }
	}

	public function getDataReq()
	{
		$qry = $this->db->query(
            "SELECT 
                a.kd_req
                , a.date_req
                , c.name
                , sum(b.qty_tot) qty_tot
                , sum(b.qty_confir) qty_confir
                , sum(b.qty_req) qty_req
                , sum(b.qty_cancel) qty_cancel
                , a.total_req
                , b.status_req
            FROM 
                m_request a
                LEFT JOIN d_request b ON a.kd_req = b.kd_req
                LEFT JOIN supplier c ON a.supplier_id = c.supplier_id
            WHERE a.is_active != '1'
            GROUP BY a.kd_req
            ORDER BY a.date_req DESC, b.status_req ASC"
        )->result_array();

        if ($qry) {
            return $qry;
        } else {
            return false;
        }
	}

	public function cancelReq($kd_req, $dateCancel, $remarkCancel)
	{
		$qry = "SELECT 
                    a.kd_req
                    , a.kd_barang
					, sum(b.qty_tot) qty_tot
					, sum(b.qty_confir) qty_confir
					, sum(b.qty_req) qty_req
                    , b.supplier_id
                FROM 
					d_request a
                    LEFT JOIN m_request b ON b.kd_req = a.kd_req
                WHERE
                    a.is_active != ?
                    AND a.kd_req = ?";
        $res = $this->db->query($qry, array('1', $kd_req))->row();

        $kdBarang   = $res->kd_barang;
        $supplierId = $res->supplier_id;
        $qtyTot  	= $res->qty_tot;
        $qtyConfir  = $res->qty_confir;
        $qtyReq   	= $res->qty_req;
        $date_log 	= $dateCancel . " " . date("H:i:s");

        if ($qtyTot != '0' && $qtyConfir != '0' && $qtyReq == '0') {
            $this->db->where('kd_req', $kd_req);
            $req = $this->db->update('m_request', array('status' => '1'));
            if ($req) {
                if ($this->db->affected_rows() > 0) {
                    activity_log_barang($date_log, $supplierId, $kd_req, $kdBarang, $qtyTot, $qtyConfir, $qtyReq, '0', $remarkCancel, '0');
                    return true;
                } else {
                    return false;
                }
            } else {
                false;
            }
        } else {
            return false;
        }
	}

	public function getMasterReq($kd_req)
	{
		$qry = "SELECT 
					a.kd_req
					, a.date_req
					, b.name
				FROM
					m_request a
					LEFT JOIN supplier b ON b.supplier_id = a.supplier_id
				WHERE
					a.is_active != ?
					AND a.kd_req = ?";
        $res = $this->db->query($qry, array('1', $kd_req))->row();

        if ($res) {
            return $res;
        } else {
            return false;
        }
	}

	public function getDtlReq($kd_req)
	{
		$qry = "SELECT 
					a.id_dtl_req
					, a.kd_req
					, a.kd_stock
					, a.kd_barang	
					, a.nama_brg
					, a.length_size
					, a.width_size
					, a.lumber_type
					, a.species_type
					, a.qty_tot
					, a.qty_confir
					, a.qty_req
					, a.qty_cancel
					, a.status_req
				FROM
					d_request a
					-- LEFT JOIN (
					-- 	SELECT  
					-- 		CASE 
					-- 			WHEN kode < 10 THEN
					-- 				CONCAT('0',kode)
					-- 			ELSE
					-- 				kode
					-- 		END AS kode
					-- 		, CASE 
					-- 			WHEN sub_kode < 10 THEN
					-- 				CONCAT('0',sub_kode)
					-- 			ELSE
					-- 				sub_kode
					-- 		END AS sub_kode
					-- 		, CASE 
					-- 			WHEN sub_data < 10 THEN
					-- 				CONCAT('0',sub_data)
					-- 			ELSE
					-- 				sub_data
					-- 		END AS sub_data
					-- 		, nama_brg
					-- 	FROM m_barang
					-- 	WHERE is_active != '1'
					-- ) b ON concat('BRG',b.kode,b.sub_kode,b.sub_data) = a.kd_barang
				WHERE
					a.is_active != ?
					AND a.kd_req = ?";
        $res = $this->db->query($qry, array('1', $kd_req))->result_array();

        if ($res) {
            return $res;
        } else {
            return false;
        }
	}

	// public function getQtyReq($id_dtl_req, $kd_req, $kd_stock, $kd_barang)
	public function getQtyReq($kd_stock, $kd_barang)
	{
		$qry = $this->db->query(
			"SELECT 
				a.id_dtl_req
				, a.kd_req
				, a.kd_stock
				, a.kd_barang
				, a.qty_req
				, b.t_qty
			FROM
				d_request a
				LEFT JOIN (
					SELECT SUM(qty) t_qty, kd_stock, kd_barang 
					FROM m_stock GROUP BY kd_barang
				) b ON a.kd_stock = b.kd_stock AND a.kd_barang = b.kd_barang 
			WHERE
				a.kd_stock = '$kd_stock'
				AND a.kd_barang = '$kd_barang'
			"
		)->result_array();

        if ($qry) {
            return $qry;
        } else {
            return false;
        }
	}

	public function insertReq($id_dtl_req, $qtySendReq, $dateSendReq, $remark, $kd_req, $kd_stock, $kd_barang)
	{
		// $qry = $this->db->query(
        //     "SELECT 
        //         MAX(SUBSTR(kd_req, 10, 5)) AS kode,
        //         SUBSTR(kd_req, 4, 2) AS day,
        //         SUBSTR(kd_req, 6, 2) AS month,
        //         SUBSTR(kd_req, 8, 2) as year
        //     FROM m_stock
        //     WHERE 
        //         SUBSTR(kd_req, 4, 2) = if( DAY(CURDATE()) < 10, CONCAT('0',DAY(CURDATE())),DAY(CURDATE()))
        //         AND SUBSTR(kd_req, 6, 2) = if( MONTH(CURDATE()) < 10, CONCAT('0',MONTH(CURDATE())),MONTH(CURDATE()))
        //         AND SUBSTR(kd_req, 8, 2) = SUBSTR(YEAR(CURDATE()), 3,2)"
        // )->result_array();

        // $urutan = (int) $qry[0]['kode'];
        // $urutan++;

        // $kode		= "STK";
        // $day        = date("d");
        // $month      = date("m");
        // $year       = substr(date("Y"), 2, 2);
        // $kdStock   	= $kode . $day . $month . $year . sprintf("%04s", $urutan);

        // Query Bindings
        $qry = "SELECT 
					a.kd_req
					, a.kd_stock
					, a.kd_barang
					, a.nama_brg
					, a.length_size
					, a.width_size
					, a.lumber_type
					, a.species_type
					, a.qty_tot
					, a.qty_confir
					, a.qty_req
					, a.qty_cancel
					, a.is_active
					, b.qty
					, b.supplier_id
				FROM d_request a
					LEFT JOIN m_stock b ON a.kd_stock = b.kd_stock AND a.kd_barang = b.kd_barang 
				WHERE
                    a.is_active != ?
                    AND a.kd_req = ?
                    AND a.kd_stock = ?
					AND a.kd_barang = ?
				ORDER BY b.created_at";
        $get = $this->db->query($qry, array('1', $kd_req, $kd_stock, $kd_barang))->row();

		$date_log 	= $dateSendReq . " " . date("H:i:s");
        $dateNow	= date("Y-m-d H:i:s");

        // $data = array(
        //     'supplier_id'		=> $get->supplier_id,
        //     'kd_req'			=> $get->kd_req,
        //     'kd_barang'         => $get->kd_barang,
        //     'nama_brg'  		=> $get->nama_brg,
		// 	'length_size'		=> $get->length_size,
		// 	'width_size'		=> $get->width_size,
		// 	'lumber_type'		=> $get->lumber_type,
		// 	'species_type'		=> $get->species_type,
		// 	'qty'				=> $qtySendReq,
        //     'created_at'        => $dateNow
        // );

        // $insert = $this->db->insert("m_stock", $data);

		$kd_req 		= $get->kd_req;
		$supplier_id	= $get->supplier_id;
		$kd_barang 		= $get->kd_barang;
		$qtyTot 		= $get->qty_tot;
		$qtyBatal 		= $get->qty_cancel;
		$qtyReq 		= $get->qty_req - $qtySendReq;
		$qtyConfir 		= $get->qty_confir + $qtySendReq;
		$qty	 		= $get->qty - $qtySendReq;

		if ($qtyBatal != '0' && $qtyReq != '0' && $qtyConfir != '0') {
			$statusReq = '5'; // ada barang yang di batal dan barang masuk gudang
		} else if ($qtyConfir != $qtyTot && $qtyReq != '0') {
			$statusReq = '1'; // masuk gudang sebagian
		} else if ($qtyConfir == $qtyTot && $qtyReq == '0' || $qtyBatal != '0' && $qtyConfir != '0' && $qtyReq == '0') {
			$statusReq = '2'; // masuk gudang semua barang
		} else {
			$statusReq = '6'; // logika error
		}

		$data = array(
			'qty_req'		=> $qtyReq,
			'qty_confir'    => $qtyConfir,
			'status_req'	=> $statusReq
		);
		$this->db->where('kd_req', $kd_req);
		$this->db->where('kd_stock', $kd_stock);
		$this->db->where('kd_barang', $kd_barang);
		$qry2 = $this->db->update('d_request', $data);
		
		if ($qry2) {
			if ($this->db->affected_rows() > 0) {
				$this->db->where('kd_stock', $kd_stock);
				$this->db->where('kd_barang', $kd_barang);
				$qry3 = $this->db->update('m_stock', array('qty' => $qty));

				activity_log_barang($date_log, $supplier_id, $kd_req, $kd_stock, $kd_barang, $qtyTot, $qtyConfir, $qtyReq, '0', $remark, $statusReq); // log barang
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
        // if ($insert) {
        // } else {
        //     return false;
        // }
	}
}
