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
									<!-- <th>Pemasok</th> -->
									<th>Status</th>
									<th>Jumlah</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody id="dataListReq"></tbody>
						</table>
					</div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <?php $this->load->view('Template/Footer') ?>
    <!-- Footer -->

    <div class="modal fade" id="modal-cencel" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-md">
			<div class="overlay-wrapper">
				<span id="loadingCencel"></span>
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
                                <label for="remarkCencel">Komentar</label>
                                <textarea class="form-control" name="remarkCencel" id="remarkCencel" placeholder="Masukkan Deskripsi"></textarea>
                            </div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-primary" id="btnCencelSend">Simpan</button>
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

<script src="<?= base_url() ?>assets/bower_components/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/jquery-validation/additional-methods.min.js"></script>

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

	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
		didOpen: (toast) => {
			toast.addEventListener('mouseenter', Swal.stopTimer)
			toast.addEventListener('mouseleave', Swal.resumeTimer)
		}
	})

	function displayData() {
		let usr = "<?= $this->session->userdata("level") ?>";
		$.ajax({
			type: "GET",
			url: "<?= site_url('Request/req/getDataReq') ?>",
			dataType: "json",
			async: false,
			success: function(dt) {
				console.log(dt.data);
				let row = "";
				for (let i = 0; i < dt.data.length; i++) {

					if (dt.data[i].date_req != "") {
						var date = new Date(dt.data[i].date_req);
						var date_req = ("00" + date.getDate()).slice(-2) + "-" + ("00" + (date.getMonth() + 1)).slice(-2) + "-" + date.getFullYear() + " " +
							("00" + date.getHours()).slice(-2) + ":" + ("00" + date.getMinutes()).slice(-2) + ":" + ("00" + date.getSeconds()).slice(-2);
					} else {
						date_req = "";
					}

					if (dt.data[i].qty_tot == dt.data[i].qty_confir || dt.data[i].qty_confir != '0') {
						btnHideDtl = "";
						btnHideBtl = "disabled";
					} else {
						if (usr == '3') {
							btnHideDtl = "";
							btnHideBtl = "disabled";
						} else {
							btnHideDtl = "";
							btnHideBtl = "";
						}
					}

					row += `<tr> 
							<td>` + (i + 1) + `</td>
							<td>` + dt.data[i].kd_req + `</td>
							<td>` + date_req + `</td>
							<td style="widt.datah: 20%">`;

						if (dt.data[i].qty_tot == dt.data[i].qty_req && dt.data[i].qty_confir == '0') {
							row += `<button class="btn btn-xs btn-info"><span class="badge">Pengiriman</span></button>`;
						} else if (dt.data[i].qty_confir == dt.data[i].qty_tot) {
							row += `<button class="btn btn-xs btn-success"><span class="badge badge-success">Terpenuhi</span></button>`;
						} else if (dt.data[i].qty_tot != dt.data[i].qty_confir && dt.data[i].qty_cancel != '0' ) {
							row += `<button class="btn btn-xs btn-warning"><span class="badge badge-warning">Masih ada sisa dan batal sebagian</span></button>`;
						}

					row += `&nbsp;[` + dt.data[i].qty_tot + `/` + dt.data[i].qty_confir + `]&nbsp;<button type="button" class="btn btn-xs btn-default" data-toggle="popover" title="Rincian Jumlah" data-content="Total Permintaan = ` + dt.data[i].qty_tot + ` <br> Total Setuju = ` + dt.data[i].qty_confir + `" data-trigger="focus" onclick="showInfoQty(this)"><i class="fa fa-info-circle"></i></button>`;
					row += `</td>
							<td>` + dt.data[i].total_req + `</td>
							<td>
								<button class="btn btn-xs btn-primary" `+ btnHideDtl +` onclick="openDetail('` + dt.data[i].kd_req + `')"><i class="fa fa-folder"></i>&nbsp;&nbsp;Detil</button>&nbsp;&nbsp;
								<button class="btn btn-xs btn-danger" `+ btnHideBtl +` onclick="cencelAll('` + dt.data[i].kd_req + `')" data-toggle="modal" data-target="#modal-cencel"><i class="fa fa-trash"></i>&nbsp;&nbsp;Batal</button>
							</td>
						</tr>`;
				}
				$('#dataListReq').html(row);
			},
			error: function(jqXHR, textStatus, e) {
				console.log('fail');
				console.log(jqXHR);
				console.log(textStatus);
				console.log(e);
			}
		})
	}

	function showInfoQty(obj) {
		$(obj).popover({
			html: true
		});
		$(obj).popover('show');
	}

	function openDetail(kd_req) {
		if (kd_req) {
			sessionStorage.setItem("kd_req", kd_req);
			location.href = "<?= site_url("Request/req/dtlReq") ?>";
		}
	}

	function cencelAll(kd_req) {
		console.log(kd_req)
		$("#formCencel").validate({
			rules: {
				tglcencel: "required",
				remarkCencel: "required",
			},
			messages: {
				tglcencel: "Tanggal Tidak Boleh Kosong",
				remarkCencel: "Deskripsi Tidak Boleh Kosong",
			},
			errorElement: 'span',
			errorPlacement: function(error, element) {
				error.addClass('help-block');
				element.closest('.form-group').append(error);
			},
			highlight: function(element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			},
			submitHandler: function(form) {
				let tglcencel = $("#tglcencel").val();
				let remarkCencel = $("#remarkCencel").val();

				console.log(kd_req);

				$.ajax({
					type: "post",
					data: {
						kd_req: kd_req,
						dateCancel: tglcencel,
						remarkCancel: remarkCencel
					},
					url: "<?= site_url('Request/req/cancelReq') ?>",
					dataType: "json",
					async: false,
					beforeSend: function() {
						$("#btnCencelSend").prop("disabled", true);
						$("#closeCencel").prop("disabled", true);

						var loading = '<div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Loading...</div></div>';
						$("#loadingCencel").html(loading);
					},
					success: function(hasil) {
						// console.log(hasil);
						if (hasil.status) {
							Toast.fire({
								icon: 'success',
								title: 'Berhasil Cancel Permintaan Barang!'
							});
							setInterval(function() {
								location.reload();
							}, 3000);
						} else {
							Toast.fire({
								icon: 'error',
								title: 'Gagal Membatalkan Permintaan Barang!'
							});
							setInterval(function() {
								location.reload();
							}, 3000);
						}

					},
					error: function(jqXHR, textStatus, e) {
						console.log('fail');
						console.log(jqXHR);
						console.log(textStatus);
						console.log(e);
						$("#btnCencel").prop("disabled", true);
						$("#closeCencel").prop("disabled", true);

						var loading = '<div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Loading...</div></div>';
						$("#loadingCencel").html(loading);
					}
				});
			}
		});
	}
</script>
