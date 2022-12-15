<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Request_m extends CI_Model 
{
    public function get($id = null)
    {
        $this->db->from('request');
        if($id != null)
            {
                $this->db->where('request_id', $id);
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
        $this->db->insert('request', $params);
    }


public function confirm($id)
	{
        $params = 
        [
            'status' => 'Permintaan disetujui',
        ];
        $this->db->where('request_id', $id);
		$this->db->update('request', $params);
	}
}