<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class User_m extends CI_Model {

    public function login($post)
    {
        // $this->db->select('*');
        // $this->db->from('users');
        // $this->db->where('username', $post['username']);
        // $this->db->where('password', sha1($post['password']));
        // $this->db->where('is_active', 1);
        // $query = $this->db->get();
        // return $query;

        $get = $this->db->get_where('users', array('username' => $post['username'], 'password' => sha1($post['password'])));

        foreach ($get->result_array() as $q) {
            $data = array(
                'user_id'       => $q['user_id'],
                'username'      => $q['username'],
                'name'          => $q['name'],
                'level'         => $q['level'],
                'is_active'     => $q['is_active'],
                'date_login'    => $q['date_login'],
                'status_login'  => $q['status_login']
            );
            $this->session->set_userdata($data);
            $valid = $data['is_active'];
        }

        if ($valid == 0) {
            if ($get->num_rows() > 0) {
                $date = date("Y-m-d H:i:s");
                $data = array('date_login' => $date, 'status_login' => '1');

                $this->db->where('username', $post['username']);
                $this->db->update('users', $data);

                if ($this->db->affected_rows() > 0) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function logout($username)
    {
        $this->db->set('status_login', 0);
        $this->db->where('username', $username);
        $this->db->update('users');

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get($id = null)
    {
        $this->db->from('users');
        if($id != null){
            $this->db->where('user_id', $id);
        }

        $query = $this->db->get();
        return $query;

    }

    public function add($post)
    {
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        $params['password'] = sha1 ($post['password']);
        $params['level'] = $post['level'];
        $this->db->insert('users',$params);
    }

    public function del($id)
	{
        $this->db->where('user_id', $id);
		$this->db->delete('users');
	}


    public function edit($post)
    {
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        if(!empty($post['password'])){
            $params['password'] = sha1 ($post['password']);
        }
        
        $params['level'] = $post['level'];
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('users',$params);
    }

}
