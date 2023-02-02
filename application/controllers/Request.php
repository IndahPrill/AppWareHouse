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
		$data['title'] 		= "Permintaan Barang";
		$data['row']		= $this->request_m->get();

		$this->template->load('Template/HomePage', 'request/request_data', $data);
	}

	public function add()
	{
		$item = new stdClass();
		$item->request_id = null;
		$item->getKdReq = null;
		$item->jenis = null;
		$item->jumlah = null;
		$item->keterangan = null;
        $item->ukuran = null;
        $item->date = null;
        $item->status = null;
		
		$getKdReq = $this->request_m->getKdReq();
		$data = array(
			'title' 	=> 'Tambah Permintaan Barang',
			'page' 		=> 'add',
			'row' 		=> $item,
			'getKdReq' 	=> $getKdReq
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

	public function getSupplier()
	{
		$data = $this->request_m->getSupplier();
        echo json_encode($data);
	}

	public function getMstrBrg()
	{
		$data = $this->request_m->getMstrBrg();
		echo json_encode($data);
	}

	public function postTmpReq()
	{
		$kodeReq		= $this->input->post('kodeReq');
        $kodeBrg		= $this->input->post('kodeBrg');
        $lengthSize		= $this->input->post('lengthSize');
        $widthSize		= $this->input->post('widthSize');
        $lumberType		= $this->input->post('lumberType');
        $speciesType	= $this->input->post('speciesType');
        $qtyReq			= $this->input->post('qtyReq');

        $data = array(
            'kd_req'		=> $kodeReq,
            'kd_barang'     => $kodeBrg,
            'length_size'	=> $lengthSize,
            'width_size'	=> $widthSize,
            'lumber_type'	=> $lumberType,
            'species_type'	=> $speciesType,
            'qty'			=> $qtyReq,
        );

        $response = $this->request_m->postData('tem_req', $data);

        echo json_encode($response);
	}

	public function GetDtlBarang()
	{
		$kodeReq = $this->input->post('kodeReq');
		$data = $this->request_m->GetDtlBarang($kodeReq);
        echo json_encode($data);
	}

	public function delTmpReq()
	{
		$idTemReq = $this->input->post('idTemReq');
		$data = $this->request_m->delTmpReq('tem_req',$idTemReq);
        echo json_encode($data);
	}

	public function postReq()
	{
		$kodeReq	= $this->input->post('kdReq');
		$tglReqBrg	= $this->input->post('tglReqBrg');
		$kdSup		= $this->input->post('kdSup');
		$remark		= $this->input->post('remark');
		$totalQty	= $this->input->post('totalQty');

		$action = $this->request_m->postReq($kodeReq, $tglReqBrg, $kdSup, $remark, $totalQty);

		if ($action) {
			$response = array(
				'status' => true,
				'msg' => 'success'
			);
		} else {
			$response = array(
				'status' => false,
				'msg' => 'fail'
			);
		}

		echo json_encode($response);
	}
}
