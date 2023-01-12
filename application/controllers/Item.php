<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
        $this->load->model('item_m');
	}

	public function index()
	{
		$data['title'] = "Daftar Stock";
		// $data['row'] = $this->item_m->get();
		$this->template->load('Template/HomePage', 'item/item_data', $data);
	}

	public function add()
	{
		$item = new stdClass();
		$item->item_id = null;
		$item->kode = null;
		$item->kategori = null;
		$item->nama = null;
        $item->ukuran = null;
		$data = array(
			"title" => 'Tambah Stock',
			"page" 	=> 'add',
			"row" 	=> $item
		);
		$this->template->load('Template/HomePage', 'item/item_form', $data);
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
            if ($this->item_m->check_kode($post['kode'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "kode $post[kode] sudah dipakai");
                redirect('item/add');
            }
			$this->item_m->add($post);
		} else if(isset($_POST['edit'])) {
			$this->item_m->edit($post);
		}
		
		if($this->db->affected_rows() >0) {
			$this->session->set_flashdata('success', "Data berhasil disimpan");
		}
		redirect('item');	
	}

	public function edit($id)
	{
		$query = $this->item_m->get($id);
		if($query->num_rows() > 0)
		{
			$item = $query->row();
			$data = array
			(
				'page' => 'edit', 
				'row' => $item
			); 
			$this->template->load('Template/HomePage', 'item/item_form', $data);
		} else {
			echo "<script>alert('Data Tidak Ditemukan');";
			echo "<script>window.location='".site_url('user')."';</script>";
		}
	}

	public function del($id)
	{
		$this->item_m->del($id);
		if($this->db->affected_rows() >0){
			echo "<script>alert('Data Berhasil Dihapus');</script>";
		}
		echo "<script>window.location='".site_url('item')."';</script>";	
	}
}
