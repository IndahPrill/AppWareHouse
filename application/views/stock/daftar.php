<div class="wrapper">
    <!-- Navbar -->
    <?php $this->load->view('Template/Navbar') ?>
    <!-- Navbar -->

    <!-- Sidebar-->
    <?php $this->load->view('Template/Sidebar') ?>
    <!-- Sidebar-->

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Stock-In
                <small>Barang Masuk</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
                <li class="active">Stock-in</li>
            </ol>
        </section>

        <section class="content">
            <?php $this->view('messages')?>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Daftar Stok</h3>
                    <?php if($this->session->userdata('level') == 2){?>
                    <div class="pull-right">
                        <a href="<?=site_url('stock/in/add')?>" class="btn btn-primary btn-flat">
                            <i class="fa fa-plus"></i> Add Stock In
                        </a>
                    </div>
                    <?php }?>
                </div>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <table class="table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th  rowspan="2">#</th>
                                <th  rowspan="2">Kode Barang</th>
                                <th  rowspan="2">Riwayat Barang</th>
                                <th  rowspan="2">Nama Barang</th>
                                <th  colspan="2">Ukuran</th>
                                <th  colspan="2">Kayu</th>
                                <th  rowspan="2">Jumlah</th>
                            </tr>
                                <th >Panjang</th>
                                <th >Lebar</th>
                                <th >Tipe Kayu</th>
                                <th >Jumlah Kayu</th>
                        </thead>
                        <tbody>
                           <!-- <?php $no = 1;
                                foreach($row as $key => $data) {?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data->kode?></td>
                                <td><?=$data->nama_item?></td>
                                <td class="text-right"><?=$data->jumlah?></td>
                                <td class="text-center"><?=indo_date($data->date)?></td>
                                <td class="text-center" width="160px">
                                    <a class="btn btn-default " data-toggle="modal" data-target="#modal-deail"
                                        data-kode="<?=$data->kode?>" data-itemname="<?=$data->nama_item?>"
                                        data-suppliername="<?=$data->nama_supplier?>" data-jumlah="<?=$data->jumlah?>"
                                        data-date="<?=indo_date($data->date)?>">
                                        <i class="fa fa-eye"></i> Detail
                                    </a>
                                    </form>
                                </td>
                            </tr>
                            <?php 
                                } ?>-->
                        </tbody>

                    </table>
                        </thead>
                        <tbody>
                            <!--<?php $no = 1;
                                foreach($row as $key => $data) {?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data->kode?></td>
                                <td><?=$data->nama_item?></td>
                                <td class="text-right"><?=$data->jumlah?></td>
                                <td class="text-center"><?=indo_date($data->date)?></td>
                                <td class="text-center" width="160px">
                                    <a class="btn btn-default " data-toggle="modal" data-target="#modal-deail"
                                        data-kode="<?=$data->kode?>" data-itemname="<?=$data->nama_item?>"
                                        data-suppliername="<?=$data->nama_supplier?>" data-jumlah="<?=$data->jumlah?>"
                                        data-date="<?=indo_date($data->date)?>">
                                        <i class="fa fa-eye"></i> Detail
                                    </a>
                                    </form>
                                </td>
                            </tr>
                            <?php 
                                } ?>-->
                        </tbody>

                    </table>
                </div>
            </div>
        </section>

        <div class="modal fade" id="modal-detail">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="close>
                                <span aria-hidden=" true">&times;</span>
                        </button>
                        <h4 class="modal-title">Detail Barang</h4>
                    </div>
                    <div class="modal-body table responsive">
                        <table class="table table-bordered no-margin">

                            <body>
                                <tr>
                                    <th style="">Kode Barang</th>
                                </tr>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php $this->load->view('Template/Footer') ?>
    <!-- Footer -->

</div>

<!-- Footer -->
<?php $this->load->view('Template/Script') ?>
<!-- Footer -->

<!-- Modal -->
<div class="modal fade" id="modal-timeline">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><span class="oi oi-graph"></span> Riwayat Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- The time line -->
                            <div class="timeline" id="isiTimeline"></div>

                        </div>
                    </div>
                </div>
    
                
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Close</button>
                </div>
        </div>
    
    <!-- END timeline item -->

<script type="text/javascript">
	$(function() {
		displayData()

		let dateStart = moment();

		$("#tblListReq").DataTable({
			"responsive": true,
			"autoWidth": false,
			"pageLength": 10,
			"lengthMenu": [5, 10, 20, 50],
		})
		
		$('#tglcencel').datepicker({
			autoclose: true
		})
	})