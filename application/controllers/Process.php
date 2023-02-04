<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class process extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		check_not_login();
        $this->load->model('item_m');
	}

    public function getDataStock()
    {
        $data = $this->item_m->getMasterReq();
        echo json_encode($data);
    }
}