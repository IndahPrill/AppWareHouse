<div class="wrapper">
    <!-- Navbar -->
    <?php $this->load->view('Template/Navbar') ?>
    <!-- Navbar -->

    <!-- Sidebar-->
    <?php $this->load->view('Template/Sidebar') ?>
    <!-- Sidebar-->

    <div class="content-wrapper">
    <section class="content-header">
            <h1>Daftar <small>Detail Permintaan Barang</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?= site_url('Dashboard/das') ?>"><i class="fa fa-dashboard"></i></a></li>
                <li>Detail Permintaan Barang</li>
                <li class="active">Daftar</li>
            </ol>
        </section>

        <section class="content">
            <?php $this->view('messages')?>
            <div class="row">

                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Permintan Barang</h3>
                        </div>
                        <form id="" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="">Kode Permintaan</label>
                                    <input type="text" class="form-control" name="" id="" value="" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Permintaan</label>
                                    <input type="text" class="form-control" name="" id="" value="" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Supplier</label>
                                    <input type="text" class="form-control" name="" id="" value="" readonly>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button class="btn btn-sm btn-primary" type="button" onclick="btnrRturn()"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</button>
                            </div>    
                        </form>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="box box-info">
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="tblListReq">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Nama</th>
                                            <th colspan="2">Size</th>
                                            <th colspan="2">Kayu</th>
                                            <th rowspan="2">Status</th>
                                            <th rowspan="2">Jumlah</th>
                                            <th rowspan="2">Aksi</th>
                                        </tr>
                                        <tr> 
                                            <th>Panjang</th>
                                            <th>Lebar</th>
                                            <th>Type</th>
                                            <th>Jenis</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dtReqBrg">
                                        <tr>
                                            <td>1</td>
                                            <td>Meja Bundar</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Kayu Mahogani</td>
                                            <td><span class="badge badge-info">Pengiriman</span> [20/20/5/0] <button type="button" class="btn btn-xs btn-default" data-toggle="popover" title="Rincian Jumlah" data-content="Total = 15 <br> Total Sisa = 0" data-trigger="focus" onclick=""><i class="fa fa-info-circle"></i></button></td>
                                            <td>5</td>   
                                            <td>
                                                <button class="btn btn-xs btn-success"><i class="fa fa-trash"></i>&nbsp;&nbsp;Terima&nbsp;&nbsp;</button>
                                                <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>&nbsp;&nbsp;Batal&nbsp;&nbsp;</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot id="totReqBrg">
                                        <tr>
                                            <td colspan="7" style="text-align: right;"><b>Total Jumlah</b></td>
                                            <td colspan="2" style="text-align: left;"><b>20</b></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

    <!-- Footer -->
    <?php $this->load->view('Template/Footer') ?>
    <!-- Footer -->

</div>

<!-- Footer -->
<?php $this->load->view('Template/Script') ?>
<!-- Footer -->