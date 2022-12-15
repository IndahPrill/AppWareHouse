<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_m extends CI_Model 
{
    
    public function get_stock_in()
    {
        $this->db->select('stock.stock_id, item.kode, item.nama as nama_item, jumlah, date, detail,
        supplier.name as nama_supplier, item.item_id');
        $this->db->from('stock');
        $this->db->join('item', 'stock.item_id = item.item_id');
        $this->db->join('supplier', 'stock.supplier_id = supplier.supplier_id', 'left');
        $this->db->where('type', 'in');
        $this->db->order_by('date', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function get_stock_out()
    {
        $this->db->select('stock.stock_id, item.kode, item.nama as nama_item, jumlah, date, detail, item.item_id');
        $this->db->from('stock');
        $this->db->join('item', 'stock.item_id = item.item_id');
        $this->db->where('type', 'out');
        $this->db->order_by('date', 'asc');
        $query = $this->db->get();
        return $query;
    }
    public function add_stock_in($post)
    {
        $params = 
        [
            'item_id' => $post['nama'],
            'type' => 'in',
            'detail' => $post['detail'],
            'supplier_id' => $post['supplier'] == '' ? null : $post['supplier'],
            'jumlah' => $post['jml'],
            'date' => $post['date'],
            'user_id' => $this->session->userdata('userid'),
        ];
        $this->db->insert('stock', $params);
    }

    public function add_stock_out($post)
    {
        $params = 
        [
            'item_id' => $post['nama'],
            'type' => 'out',
            'detail' => $post['detail'],
            'jumlah' => $post['jml'],
            'date' => $post['date'],
            'user_id' => $this->session->userdata('userid'),
        ];
        $this->db->insert('stock', $params);
    }
}