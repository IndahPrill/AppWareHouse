<?php
date_default_timezone_set('Asia/Jakarta');

function activity_log_req($date_log, $kd_req, $supplier_id, $kd_barang, $length_size, $width_size, $lumber_type, $species_type, $qty_tot, $qty_confir, $qty_req, $qty_cancel, $remark, $status_req)
{
    $CI = &get_instance();
    if ($date_log == "") {
        $date_log = date("Y-m-d H:i:s");
    }

    $param = array(
        'date_log'      => $date_log,
        'user_id'		=> (int) $CI->session->userdata('name'),
        'kd_req'		=> $kd_req,
        'supplier_id'   => $supplier_id,
        'kd_barang'     => $kd_barang,
        'length_size'	=> $length_size,
        'width_size'	=> $width_size,
		'lumber_type'	=> $lumber_type,
        'species_type'	=> $species_type,
        'qty_tot'      	=> $qty_tot,
        'qty_confir'    => $qty_confir,
        'qty_req'		=> $qty_req,
        'qty_cancel'    => $qty_cancel,
        'remark'        => $remark,
        'status_req'	=> $status_req
    );

    //load model log
    $CI->load->model('Activity_log');

    //save to database
    $CI->Activity_log->posTmpReq($param);
}

function activity_log_barang($date_log, $kd_req, $supplier_id, $kd_barang, $qty_tot, $qty_confir, $qty_req, $qty_cancel, $remark, $status_log)
{
    $CI = &get_instance();
    if ($date_log == "") {
        $date_log = date("Y-m-d H:i:s");
    }

    $param = array(
        'date_log'      => $date_log,
        'user_id'		=> (int) $CI->session->userdata('name'),
        'kd_req'		=> $kd_req,
        'supplier_id'   => $supplier_id,
        'kd_barang'     => $kd_barang,
        'qty_tot'      	=> $qty_tot,
        'qty_confir'    => $qty_confir,
        'qty_req'		=> $qty_req,
        'qty_cancel'    => $qty_cancel,
        'remark'        => $remark,
        'status_log'	=> $status_log
    );

    //load model log
    $CI->load->model('Activity_log');

    //save to database
    $CI->Activity_log->posTmpBrg($param);
}

function tgl_indo($tanggal)
{
    $bulan = array(
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 =>'Juni',
        7 =>'Juli',
        8 =>'Agustus',
        9 =>'September',
        10 =>'Oktober',
        11 =>'November',
        12 =>'Desember'
    );

    $pecahkan = explode('-', $tanggal);
    $setdata = $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];

    return $setdata;
}

function tgl_indo_bsr($tanggal)
{
    $bulan = array(
        1 => 'JANUARI',
        'FEBRUARI',
        'MARET',
        'APRIL',
        'MEI',
        'JUNI',
        'JULI',
        'AGUSTUS',
        'SEPTEMBER',
        'OKTOBER',
        'NOVEMBER',
        'DESEMBER'
    );

    $pecahkan = explode('-', $tanggal);
    $setData = $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];

    return $setData;
}
