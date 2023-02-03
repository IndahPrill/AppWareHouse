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
                                    <input type="text" class="form-control" id="kd_req" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Permintaan</label>
                                    <input type="text" class="form-control" id="date_req" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Supplier</label>
                                    <input type="text" class="form-control" id="nameSup" readonly>
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

	<div class="modal fade" id="modal-kirimBarang" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="overlay-wrapper">
                <span id="loadingKirim"></span>
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Konfirmasi Pengiriman</h4>
                    </div>
                    <form method="post" id="formMasuk">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="qtyReq">Jumlah Permintaan</label>
                                <input type="number" class="form-control" name="qtyReq" id="qtyReq" disabled>
                                <input type="hidden" id="id_dtl_req">
                            </div>
                            <div class="form-group">
                                <label for="qtySendReq">Jumlah Pengiriman</label>
                                <input type="number" class="form-control" name="qtySendReq" id="qtySendReq" autocomplete="off" placeholder="Masukkan Quantity">
                            </div>
                            <div class="form-group">
                                <label for="dateSendReq">Tanggal</label>
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control pull-right" id="dateSendReq" name="dateSendReq" placeholder="yyyy-mm-dd" required autocomplete="off">
								</div>
                            </div>
                            <div class="form-group">
                                <label for="remarkReq">Deskripsi <span style="font-size: 11px;">(Opsional)</span></label>
                                <textarea class="form-control" name="remarkReq" id="remarkReq" placeholder="Masukkan Deskripsi"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-sm btn-default" id="closeSendBarang" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Close</button>
                            <button type="submit" class="btn btn-sm btn-primary" id="sendBarang"><i class="fa fa-share"></i>&nbsp;&nbsp;Send</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-batalBarang" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="overlay-wrapper">
                <span id="loadingBatal"></span>
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Konfirmasi Pembatalan</h4>
                    </div>
                    <form method="post" id="formBatal">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="qtyReqBtl">Jumlah Permintaan</label>
                                <input type="number" class="form-control" name="qtyReqBtl" id="qtyReqBtl" readonly>
                                <input type="hidden" id="id_dtl_btl">
                            </div>
                            <div class="form-group">
                                <label for="qtyBatal">Jumlah Pembatalan</label>
                                <input type="number" class="form-control" name="qtyBatal" id="qtyBatal" autocomplete="off" placeholder="Masukkan Quantity" required>
                            </div>
                            <div class="form-group">
                                <label for="dateBtlReq">Tanggal</label>
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control pull-right" id="dateBtlReq" name="dateBtlReq" placeholder="yyyy-mm-dd" required autocomplete="off">
								</div>
                            </div>
                            <div class="form-group">
                                <label for="remarkBatal">Deskripsi <span style="font-size: 11px;">(Opsional)</span></label>
                                <textarea class="form-control" name="remarkBatal" id="remarkBatal" placeholder="Masukkan Deskripsi"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-sm btn-default" id="closeBtlBarang" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp;&nbsp;Close</button>
                            <button type="submit" class="btn btn-sm btn-primary" id="btlBarang"><i class="fas fa-share"></i>&nbsp;&nbsp;Send</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- ./wrapper -->

</div>

<!-- Footer -->
<?php $this->load->view('Template/Script') ?>
<!-- Footer -->

<script src="<?= base_url() ?>assets/bower_components/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/jquery-validation/additional-methods.min.js"></script>

<script>
	$(function() {
		masterReq()
		displayData()

		$("#tblListReq").DataTable({
			"responsive": true,
			"autoWidth": false,
			"pageLength": 10,
			"lengthMenu": [5, 10, 20, 50],
		})

		$('#dateSendReq').datepicker({
			autoclose: true,
			format: 'yyyy-dd-mm'
		})
	})

	function masterReq() {
		let kd_req = sessionStorage.getItem("kd_req");
		$.ajax({
			type: "POST",
			data: {
				kd_req: kd_req
			},
			url: "<?= site_url('Request/req/getMasterReq') ?>",
			dataType: "json",
			async: false,
			success: function(dt) {
				// console.log(dt)
				var date_req = "";

				if (dt.data.date_req != "") {
					var date = new Date(dt.data.date_req);
					var date_req = ("00" + date.getDate()).slice(-2) + "-" + ("00" + (date.getMonth() + 1)).slice(-2) + "-" + date.getFullYear();
				}

				$("#kd_req").val(dt.data.kd_req);
				$("#date_req").val(date_req);
				$("#nameSup").val(dt.data.name);
			}
		})
	}

	function displayData() {
		let kd_req = sessionStorage.getItem("kd_req");
		$.ajax({
			type: "POST",
			data: {
				kd_req: kd_req
			},
			url: "<?= site_url('Request/req/getDtlReq') ?>",
			dataType: "json",
			async: false,
			success: function(dt) {
				// console.log(dt.data);
				let row = rows = "";
				let sum = 0;
				for (let i = 0; i < dt.data.length; i++) {
					if (dt.data[i].qty_req == '0') {
						btnHide = "disabled";
					} else {
						btnHide = "";
					}

					row += `<tr>
								<td>` + (i + 1) + `</td>
								<td>` + dt.data[i].name + `</td>
								<td>` + dt.data[i].length_size + `</td>
								<td>` + dt.data[i].width_size + `</td>
								<td>` + dt.data[i].lumber_type + `</td>
								<td>` + dt.data[i].species_type + `</td>
								<td style="widt.datah: 30%;">`;

						if (dt.data[i].status_req == '0') {
							row += `<span class="badge badge-info">Pengiriman</span>&nbsp;`;
						}
						if (dt.data[i].status_req == '1') {
							row += `<span class="badge badge-warning">Masih ada sisa</span>&nbsp;`;
						}
						if (dt.data[i].status_req == '2') {
							row += `<span class="badge badge-success">Terpenuhi</span>&nbsp;`;
						}
						if (dt.data[i].status_req == '3') {
							row += `<span class="badge badge-warning">Batal sebagian</span>&nbsp;`;
						}
						if (dt.data[i].status_req == '4') {
							row += `<span class="badge badge-danger">Batal</span>&nbsp;`;
						}
						if (dt.data[i].status_req == '5') {
							row += `<span class="badge badge-warning">Masih ada sisa dan batal sebagian</span>`;
						}

					row += `&nbsp;[` + dt.data[i].qty_req + `/` + dt.data[i].qty_confir + `/` + dt.data[i].qty_cancel + `/` + dt.data[i].qty_tot + `]&nbsp;<button type="button" class="btn btn-xs btn-default" data-toggle="popover" title="Rincian Quantity" data-content="Qty Permintaan = ` + dt.data[i].qty_req + `<br> Qty Konfirmasi = ` + dt.data[i].qty_confir + `<br> Qty Batal = ` + dt.data[i].qty_cancel + `<br> Qty Total = ` + dt.data[i].qty_tot + `" data-trigger="focus" onclick="showInfoQty(this)"><i class="fa fa-info-circle"></i></button>`;

					row += `</td>
								<td>` + dt.data[i].qty_tot + `</td>
								<td style="widt.datah: 15%; text-align: center;">
									<button type="button" class="btn btn-xs btn-success" ` + btnHide + ` onclick="getQtyBeli('` + dt.data[i].id_dtl_req + `')" data-toggle="modal" data-target="#modal-kirimBarang"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Terima</button>&nbsp;
									<button type="button" class="btn btn-xs btn-danger" ` + btnHide + ` onclick="getQtyBeli('` + dt.data[i].id_dtl_req + `')" data-toggle="modal" data-target="#modal-batalBarang"><i class="fa fa-times-circle"></i>&nbsp;&nbsp;Retur</button>
								</td>
							</tr>`;
					sum += parseInt(dt.data[i].qty_tot);
				}
				rows += `<tr>
							<th colspan="7" style="text-align: right;"><strong>Total</strong></th>
							<th colspan="2" style="text-align: left;"><strong>` + sum + `</strong></th>
						</tr>`;
				$('#dtReqBrg').html(row);
				$('#totReqBrg').html(rows);
			}
		});
	}

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

	function showInfoQty(obj) {
		$(obj).popover({
			html: true
		});
		$(obj).popover('show');
	}

	function btnrRturn() {
		sessionStorage.removeItem("kd_req");
		location.href = "<?= site_url('Request/req/getListReq') ?>";
	}

	function getQtyBeli(id_dtl_req) {
		$.ajax({
			type: "POST",
			data: {
				id_dtl_req: id_dtl_req
			},
			url: "<?= site_url('Request/req/getQtyReq') ?>",
			dataType: "json",
			async: false,
			success: function(dt) {
				console.log(dt.data);
				$("#qtyReq").val(dt.data[0].qty_req);
				$("#id_dtl_req").val(dt.data[0].id_dtl_req);
				$("#qtyReqBtl").val(dt.data[0].qty_req);
				$("#id_dtl_btl").val(dt.data[0].id_dtl_req);

				let qtyReq = parseInt(dt.data[0].qty_req);

				console.log(qtyReq)

				$("#formMasuk").validate({
					rules: {
						qtySendReq: {
							required: true,
							min: 1,
							max: qtyReq
						},
						dateSendReq: "required",
						remarkReq: "required"
					},
					messages: {
						qtySendReq: {
							required: "Tidak Boleh Kosong",
							min: "Harus Mengisi Mulai dari Angka 1",
							max: "Jangan Melebihi Jumlah Permintaan " + qtyReq
						},
						dateSendReq: "Tidak Boleh Kosong",
						remarkReq: "Tidak Boleh Kosong",
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
						let id_dtl_req = $("#id_dtl_req").val();
						let qtySendReq = $("#qtySendReq").val();
						let dateSendReq = $("#dateSendReq").val();
						let remarkReq = $("#remarkReq").val();

						$.ajax({
							type: "POST",
							data: {
								id_dtl_req: id_dtl_req,
								qtySendReq: qtySendReq,
								dateSendReq: dateSendReq,
								remarkReq: remarkReq
							},
							url: "<?= site_url('Request/req/insertReq') ?>",
							dataType: "JSON",
							beforeSend: function() {
								$("#sendBarang").prop("disabled", true);
								$("#closeSendBarang").prop("disabled", true);

								var loading = '<div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Loading...</div></div>';
								$("#loadingKirim").html(loading);
							},
							success: function(res) {
								console.log(res);

								if (res.status) {
									Toast.fire({
										icon: 'success',
										title: 'Berhasil Simpan Permintaan Barang!'
									});
									setInterval(function() {
										location.reload();
									}, 3000);
								} else {
									Toast.fire({
										icon: 'error',
										title: 'Gagal Simpan Permintaan Barang!'
									});
									setInterval(function() {
										location.reload();
									}, 3000);
								}
							}
						});
					}
				});

				$("#formBatal").validate({
					rules: {
						qtyBatal: {
							required: true,
							min: 1,
							max: qtyReq
						},
						dateBtlReq: "required",
						remarkBatal: "required",
					},
					messages: {
						qtyBatal: {
							required: "Tidak Boleh Kosong",
							min: "Harus Mengisi Mulai dari Angka 1",
							max: "Jangan Melebihi Jumlah Permintaan " + qtyReq
						},
						dateBtlReq: "Tidak Boleh Kosong",
						remarkBatal: "Tidak Boleh Kosong",
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
						let id_dtl_btl = $("#id_dtl_btl").val();
						let qtyBatal = $("#qtyBatal").val();
						let dateBtlReq = $("#dateBtlReq").val();
						let remarkBatal = $("#remarkBatal").val();

						$.ajax({
							type: "POST",
							data: {
								id_dtl_btl: id_dtl_btl,
								qtyBatal: qtyBatal,
								dateBtlReq: dateBtlReq,
								remarkBatal: remarkBatal
							},
							url: "<?= site_url('Request/req/batalReq') ?>",
							dataType: "JSON",
							beforeSend: function() {
								$("#btlBarang").prop("disabled", true);
								$("#closeBtlBarang").prop("disabled", true);

								var loading = '<div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Loading...</div></div>';
								$("#loadingBatal").html(loading);
							},
							success: function(res) {
								console.log(res);

								if (res.status) {
									Toast.fire({
										icon: 'success',
										title: 'Berhasil Membatalkan Permintaan Barang!'
									});
									setInterval(function() {
										location.reload();
									}, 3000);
								} else {
									Toast.fire({
										icon: 'success',
										title: 'Gagal Membatalkan Permintaan Barang!'
									});
									setInterval(function() {
										location.reload();
									}, 3000);
								}
							}
						});
					}
				});
			}
		})

	}
</script>
