<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		check_not_login();
        $this->load->model(['item_m', 'supplier_m', 'stock_m']);
	
	}

	public function getListStock()
	{
		$data['title'] = "Daftar Stock";
		// $data['row'] = $this->stock_m->get();
		$this->template->load('Template/HomePage', 'stock/daftar', $data);
	}

    public function stock_in_data()
    {
        $data['title'] = "Stock In";
        // $data['row'] = $this->stock_m->get_stock_in()->result();
        $data['row'] = '';
        $this->template->load('Template/HomePage', 'stock/stock_in/stock_in_data', $data);
    }

    public function stock_out_data()
    {
        $data['title'] = "Stock Out";
        $data['row'] = '';
        // $data['row'] = $this->stock_m->get_stock_out()->result();
        $this->template->load('Template/HomePage', 'stock/stock_out/stock_out_data', $data);
    }

    public function stock_out_add()
    {
        $item = $this->item_m->get()->result();
        $supplier = $this->supplier_m->get()->result();
        // $data = ['item' => $item, 'supplier' => $supplier];
        $data = ['item' => '', 'supplier' => ''];
        $this->template->load('Template/HomePage', 'stock/stock_out/stock_out_form', $data);
    }

    public function stock_in_add()
    {
		$supplier = $this->supplier_m->get()->result();
        $item = new stdClass();
		$item->request_id = null;
		$item->getKdReq = null;
		$item->jenis = null;
		$item->jumlah = null;
		$item->keterangan = null;
        $item->ukuran = null;
        $item->date = null;
        $item->status = null;
		
		$data = array(
			'title' 	=> 'Tambah Permintaan Barang',
			'page' 		=> 'add',
			'row' 		=> $item,
		
		);
        $this->template->load('Template/HomePage', 'stock/stock_in/stock_in_form', $data);
    }


    public function process() 
	{
        if(isset($_POST['in_add'])){
            $post = $this->input->post(null, TRUE);
            $this->stock_m->add_stock_in($post);
            $this->item_m->update_stock_in($post);
                if($this->db->affected_rows() >0){
                    $this->session->set_flashdata('success', "Data berhasil disimpan");
                }
                redirect('stock/in');	
        }
        if(isset($_POST['out_add'])){
            $post = $this->input->post(null, TRUE);
            $this->stock_m->add_stock_out($post);
            $this->item_m->update_stock_out($post);
                if($this->db->affected_rows() >0){
                    $this->session->set_flashdata('success', "Data berhasil disimpan");
                }
                redirect('stock/out');	
        }
    }

	
	public function getTimeline() 
	{
		$kd_req 	= $this->input->post('kd_req');
		$kd_barang 	= $this->input->post('kd_barang');
		$action = $this->request_m->getTimeline($kd_req, $kd_barang);
		if ($action) {
			$response = array(
				'status' => true,
				'msg' => 'success',
				'data' => $action
			);
		} else {
			$response = array(
				'status' => false,
				'msg' => 'fail',
				'data' => array()
			);
		}

		echo json_encode($response);
	}
 
}