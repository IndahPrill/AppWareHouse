<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
        $this->load->model('request_m');
	}

	public function index()
	{
		$data['title'] = "Permintaan Barang";
		$data['row']=$this->request_m->get();
		$this->template->load('Template/HomePage', 'request/request_data', $data);
	}

	public function add()
	{
		$item = new stdClass();
		$item->request_id = null;
		$item->jenis = null;
		$item->jumlah = null;
		$item->keterangan = null;
        $item->ukuran = null;
        $item->date = null;
        $item->status = null;
		$data = array(
			'page' => 'add',
			'row' => $item
		);
		$this->template->load('Template/HomePage', 'request/request_form', $data);
	}


public function process()
	{
		$post= $this->input->post(null, TRUE);
		
			$this->request_m->add($post);
    
    
        if($this->db->affected_rows() >0){
            $this->session->set_flashdata('success', "Data berhasil disimpan");
        }
        redirect('request');	
    }
    public function confirm($id)
	{
		$this->request_m->confirm($id);
		if($this->db->affected_rows() >0){
			echo "<script>alert('Data Berhasil Diubah');</script>";
		}
		echo "<script>window.location='".site_url('request')."';</script>";	
	}
}
