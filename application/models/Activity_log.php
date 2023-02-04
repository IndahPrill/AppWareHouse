<?php

class Activity_log extends CI_Model
{
    public function posTmpReq($param)
    {
        $sql    = $this->db->insert_string('activity_log_req', $param);
        $ex     = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }

	public function posTmpBrg($param)
    {
        $sql    = $this->db->insert_string('activity_log_barang', $param);
        $ex     = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }
}
