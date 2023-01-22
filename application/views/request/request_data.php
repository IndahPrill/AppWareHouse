<div class="wrapper">
    <!-- Navbar -->
    <?php $this->load->view('Template/Navbar') ?>
    <!-- Navbar -->

    <!-- Sidebar-->
    <?php $this->load->view('Template/Sidebar') ?>
    <!-- Sidebar-->

    <div class="content-wrapper">
        <section class="content-header">
            <h1>Daftar <small>Permintaan Barang</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?= site_url('Dashboard/das') ?>"><i class="fa fa-dashboard"></i></a></li>
                <li>Permintaan Barang</li>
                <li class="active">Daftar</li>
            </ol>
        </section>

        <section class="content">
            <?php $this->view('messages')?>
            <div class="box box-primary">

                <div class="box-header">
                    <!-- <h3 class="box-title">Daftar Permintaan</h3> -->
					<!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-cancel">Launch Default Modal</button> -->
                    <div class="pull-right">
                        <?php if($this->session->userdata('level') == 3){?>
                        <a href="<?=site_url('Request/req/createReq')?>" class="btn btn-primary btn-flat">
                            <i class="fa fa-plus"></i> Tambah
                        </a><?php }?>
                    </div>
                </div>

                <div class="box-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped" id="tblListReq">
							<thead>
								<tr>
									<th>#</th>
									<th>Kode</th>
									<th>Tanggal</th>
									<th>Nama</th>
									<th>Jumlah</th>
									<th>Status</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody id="dataListReq">
							</tbody>
						</table>
					</div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <?php $this->load->view('Template/Footer') ?>
    <!-- Footer -->

    <div class="modal fade" id="modal-cancel" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-md">
			<div class="overlay-wrapper">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Konfirmasi Pembatalan</h4>
					</div>
					<form method="post" id="formCencel">
						<div class="modal-body">
							<div class="form-group">
                                <label for="tglcencel">Tanggal</label>
                                <input type="text" class="form-control datetimepicker-input" name="tglcencel" id="tglcencel" data-toggle="datetimepicker" data-target="#datetimepicker5" placeholder="dd-mm-yyyy">
                            </div>
                            <div class="form-group">
                                <label for="remarkCencel">Deskripsi <span style="font-size: 11px;">(Opsional)</span></label>
                                <textarea class="form-control" name="remarkCencel" id="remarkCencel" placeholder="Masukkan Deskripsi"></textarea>
                            </div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
							<button type="button" class="btn btn-primary" id="btnSend">Simpan</button>
						</div>
					</from>
				</div>
			</div>
        </div>
    </div>

</div>

<!-- Footer -->
<?php $this->load->view('Template/Script') ?>
<!-- Footer -->

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

	function displayData() {
		
	}
</script>
