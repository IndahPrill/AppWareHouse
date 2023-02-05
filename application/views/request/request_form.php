<div class="wrapper">
    <!-- Navbar -->
    <?php $this->load->view('Template/Navbar') ?>
    <!-- Navbar -->

    <!-- Sidebar-->
    <?php $this->load->view('Template/Sidebar') ?>
    <!-- Sidebar-->

    <div class="content-wrapper">
        <section class="content-header">
            <h1>Tambah <small>Permintaan Barang</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?= site_url('Dashboard/das') ?>"><i class="fa fa-dashboard"></i></a></li>
                <li>Permintaan Barang</li>
                <li class="active">Tambah</li>
            </ol>
        </section>

        <section class="content">
            <?php $this->view('messages') ?>
            <div class="row">

                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Barang</h3>
                        </div>
                        <form id="formBarang" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="kodeReq">Kode Permintaan</label>
                                    <input type="text" class="form-control" name="kodeReq" id="kodeReq" placeholder="Masukkan ..." value="<?= $getKdReq ?>" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="kodeBrg">Kode Barang</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="kodeBrg" id="kodeBrg" placeholder="Masukkan ..." autocomplete="off" readonly required>
										<input type="hidden" name="kodeSto" id="kodeSto">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-flat" data-toggle="modal" data-target="#list-kodebrg"><i class="fa fa-ellipsis-v"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nmBrg">Nama Barang</label>
                                    <textarea class="form-control" id="nmBarang" name="nmBarang" rows="2" placeholder="Masukkan ..." readonly required></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lengthSize">Panjang</label>
                                            <input type="text" class="form-control" name="lengthSize" id="lengthSize" placeholder="Masukkan ..." autocomplete="off" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="widthSize">Lebar</label>
                                            <input type="text" class="form-control" name="widthSize" id="widthSize" placeholder="Masukkan ..." autocomplete="off" readonly required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lumberType">Tipe Kayu</label>
                                            <input type="text" class="form-control" name="lumberType" id="lumberType" placeholder="Masukkan ..." autocomplete="off" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="speciesType">Jenis Kayu</label>
                                            <input type="text" class="form-control" name="speciesType" id="speciesType" placeholder="Masukkan ..." autocomplete="off" readonly required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="qtyReq">Jumlah</label>
                                    <input type="number" class="form-control" name="qtyReq" id="qtyReq" placeholder="Masukkan ..." autocomplete="off" required>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" id="tmbDataPembelian"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-8">
                    <!-- Form Element sizes -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Daftar Permintaan Barang</h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-striped" id="tblReqBrg">
                                <thead>
                                    <tr>
                                        <th rowspan="2">#</th>
                                        <th rowspan="2">Nama Barang</th>
                                        <th colspan="2">SIze</th>
                                        <th colspan="2">Kayu</th>
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
                                <tbody id="dtReqBrg"></tbody>
                                <tfoot id="totReqBrg"></tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <input type="hidden" id="getTotalQty">
                            <button type="button" class="btn btn-info" id="saveReqBrg" data-toggle="modal" data-target="#saveListReqBrg"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>

            </div>
        </section>
    </div>

    <!-- Footer -->
    <?php $this->load->view('Template/Footer') ?>
    <!-- Footer -->

	<!-- Modal Kode Barang -->
    <div class="modal fade" id="list-kodebrg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Daftar Kode Barang</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped" id="tblKdBrg">
                        <thead>
                            <th>#</th>
                            <th>Kode Stock</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Panjang</th>
                            <th>Lebar</th>
                            <th>Jenis</th>
                            <th>Tipe</th>
                            <th>Qty</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody id="dtKodeBrg">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

	<!-- Modal save barang -->
    <div class="modal fade" id="saveListReqBrg">
        <div class="modal-dialog">
			<span id="loadingSImpan"></span>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Konfirmasi</h4>
                </div>
				<form id="formSaveBrg" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label for="tglReqBrg">Tanggal Permintaan</label>
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control pull-right" id="tglReqBrg" name="tglReqBrg" placeholder="yyyy-mm-dd" required autocomplete="off">
							</div>
						</div>
						<!-- <div class="form-group">
							<label for="kdSup">Pemasok</label>
							<select class="form-control" id="kdSup" name="kdSup" required></select>
						</div> -->
						<div class="form-group">
							<label for="remark">Komentar</label>
							<textarea class="form-control" id="remark" name="remark" placeholder="Masukkan ..." rows="2"></textarea>
						</div>
						<input type="hidden" name="kdReq" value="<?= $getKdReq; ?>">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="closeSend"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Batal</button>
						<button type="submit" class="btn btn-success" id="sendBrg"><i class="fa fa-send"></i>&nbsp;&nbsp;Kirim</button>
					</div>
				</form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

</div>

<!-- Footer -->
<?php $this->load->view('Template/Script') ?>
<!-- Footer -->

<script src="<?= base_url() ?>assets/bower_components/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/jquery-validation/additional-methods.min.js"></script>

<script type="text/javaScript">
    $(function() {
		getDataMasterBarang()
		displayDetailBarang()
		getDataSupplier()

		$("#tblReqBrg").DataTable({
			"responsive": true,
			"autoWidth": false,
			"pageLength": 10,
			"lengthMenu": [5, 10, 20, 50],
		})
		
		$("#tblKdBrg").DataTable({
			"responsive": true,
			"autoWidth": false,
			"pageLength": 10,
			"lengthMenu": [5, 10, 20, 50],
		})

		$('#tglReqBrg').datepicker({
			autoclose: true,
			format: 'yyyy-dd-mm'
		})

		$("#formBarang").validate({
			rules: {
				kodeReq: "required",
				kodeBrg: "required",
				nmBarang: "required",
				lengthSize: "required",
				widthSize: "required",
				lumberType: "required",
				speciesType: "required",
				qtyReq: {
					required: true,
					min: 1,
					max: 100
				},
			},
			messages: {
				kodeReq: "Tidak Boleh Kosong",
				kodeBrg: "Tidak Boleh Kosong",
				nmBarang: "Tidak Boleh Kosong",
				lengthSize: "Tidak Boleh Kosong",
				widthSize: "Tidak Boleh Kosong",
				lumberType: "Tidak Boleh Kosong",
				speciesType: "Tidak Boleh Kosong",
				qtyReq: {
					required: "Quantity Tidak Boleh Kosong",
					min: "Harus Mengisi Mulai dari Angka 1",
					max: "Jangan Melebihi 100"
				},
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
				let kodeReq = $("#kodeReq").val();
				let kodeSto = $("#kodeSto").val();
				let kodeBrg = $("#kodeBrg").val();
				let nmBarang = $("#nmBarang").val();
				let lengthSize = $("#lengthSize").val();
				let widthSize = $("#widthSize").val();
				let lumberType = $("#lumberType").val();
				let speciesType = $("#speciesType").val();
				let qtyReq = $("#qtyReq").val();

				console.log("kodeBrg : " + kodeBrg);
				console.log("nmBarang : " + nmBarang);

				if (kodeBrg == "" && nmBarang == "") {
					Toast.fire({
						icon: 'error',
						title: 'Kode barang dan Nama barang harus di pilih!'
					});
				} else {
					$.ajax({
						type: "POST",
						data: {
							kodeReq: kodeReq,
							kodeSto: kodeSto,
							kodeBrg: kodeBrg,
							nmBarang: nmBarang,
							lengthSize: lengthSize,
							widthSize: widthSize,
							lumberType: lumberType,
							speciesType: speciesType,
							qtyReq: qtyReq,
						},
						url: "<?= site_url('Request/req/postTmpReq') ?>",
						dataType: "JSON",
						success: function(json) {
							displayDetailBarang()
							$("#kodeSto").val("");
							$("#kodeBrg").val("");
							$("#nmBarang").val("");
							$("#lengthSize").val("");
							$("#widthSize").val("");
							$("#lumberType").val("");
							$("#speciesType").val("");
							$("#qtyReq").val("");
						}
					});
				}

				return false;
			}
		});

		$("#formSaveBrg").validate({
			rules: {
				tglReqBrg: "required",
				// kdSup: "required",
				// remark: "required",
			},
			messages: {
				tglReqBrg: "Tanggal Tidak Boleh Kosong",
				// kdSup: "Supplier Tidak Boleh Kosong",
				// remark: "Remark Tidak Boleh Kosong",
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
				let kdReq = "<?= $getKdReq; ?>";
				let tglReqBrg = $("#tglReqBrg").val();
				// let kdSup = $("#kdSup").val();
				let remark = $("#remark").val();
				let totalQty = $("#getTotalQty").val();

				$.ajax({
					type: "POST",
					data: {
						kdReq: kdReq,
						tglReqBrg: tglReqBrg,
						// kdSup: kdSup,
						remark: remark,
						totalQty: totalQty
					},
					url: "<?= site_url('Request/req/postReq') ?>",
					dataType: "JSON",
					beforeSend: function() {
						$("#sendBrg").prop("disabled", true);
						$("#closeSend").prop("disabled", true);

						var loading = '<div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Loading...</div></div>';
						$("#loadingSImpan").html(loading);
					},
					success: function(res) {
						// console.log(hasil);
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

	function getDataSupplier() {
		$.ajax({
			url: "<?= site_url('Request/req/getSupplier') ?>",
			async: false,
			dataType: "json",
			success: function(dt) {
				// console.log(dt);
				let row = '<option value="">-- PILIH --</option>';
				for (let i = 0; i < dt.length; i++) {
					row += '<option value="' + dt[i].supplier_id + '">' + dt[i].name + '</option>';
				}
				// console.log(row);
				$("#kdSup").html(row);
			}
		});
		return false;
	}

	function getDataMasterBarang() {
		$.ajax({
			url: "<?= site_url('Request/req/getMstrBrg') ?>",
			async: false,
			dataType: "JSON",
			success: function (dt) {
				console.log(dt.data)
				let btnAdd = row = '';
				for (let i = 0; i < dt.data.length; i++) {
					// var kode = (dt.data[i].kode < 10) ? '0'+dt.data[i].kode : dt.data[i].kode;
					// var sub_kode = (dt.data[i].sub_kode < 10) ? '0'+dt.data[i].sub_kode : dt.data[i].sub_kode;
					// var sub_data = (dt.data[i].sub_data < 10) ? '0'+dt.data[i].sub_data : dt.data[i].sub_data;
					var kd_stock = (dt.data[i].kd_stock != "") ? dt.data[i].kd_stock : '-';
					var kd_barang = (dt.data[i].kd_barang != "") ? dt.data[i].kd_barang : '-';
					var nama_brg = (dt.data[i].nama_brg != "") ? dt.data[i].nama_brg : '-';
					var length_size = (dt.data[i].length_size != "") ? dt.data[i].length_size : '-';
					var width_size = (dt.data[i].width_size != "") ? dt.data[i].width_size : '-';
					var lumber_type = (dt.data[i].lumber_type != "") ? dt.data[i].lumber_type : '-';
					var species_type = (dt.data[i].species_type != "") ? dt.data[i].species_type : '-';
					var tot_qty = (dt.data[i].tot_qty != "") ? dt.data[i].tot_qty : '-';

					// console.log(nama_brg);

					btnAdd = '<button type="submit" class="btn btn-sm btn-success" onclick="getDisplayData(\'' + kd_stock + '\', \'' + kd_barang + '\', \'' + nama_brg + '\', \'' + length_size + '\', \'' + width_size + '\', \'' + lumber_type + '\', \'' + species_type + '\')"><i class="fa fa-plus"></i></button>';
					// if (dt.data[i].sub_kode != "*") {
					// 	if (dt.data[i].sub_kode != '*' && dt.data[i].sub_data != '*') {
							// kode_barang = 'BRG' + kode + sub_kode + sub_data;
						// } else {
							// kode_barang = 'BRG' + kode + sub_kode;
							// btnAdd = "";
						// }
					// } else {
						// kode_barang = 'BRG' + kode;
						// btnAdd = "";
					// }

					row += '<tr>' +
								'<td>' + (i + 1) + '</td>' +
								'<td>' + kd_stock + '</td>' +
								'<td>' + kd_barang + '</td>' +
								'<td>' + nama_brg + '</td>' +
								'<td>' + length_size + '</td>' +
								'<td>' + width_size + '</td>' +
								'<td>' + lumber_type + '</td>' +
								'<td>' + species_type + '</td>' +
								'<td>' + tot_qty + '</td>' +
								'<td style="text-align: center;">' + btnAdd + '</td>' +
							'</tr>';
				}
				$('#dtKodeBrg').html(row);
			}
		})
	}

	function getDisplayData(kd_stock, kode_barang, nama_brg, length_size, width_size, lumber_type, species_type) {
		$("#kodeSto").val(kd_stock);
		$("#kodeBrg").val(kode_barang);
		$("#nmBarang").val(nama_brg);
		$("#lengthSize").val(length_size);
		$("#widthSize").val(width_size);
		$("#lumberType").val(lumber_type);
		$("#speciesType").val(species_type);

		$("#list-kodebrg").modal("hide");
	}

	function displayDetailBarang() {
		let kodeReq = "<?= $getKdReq; ?>";
		$.ajax({
			type: "POST",
			url: "<?= site_url('Request/req/GetDtlBarang') ?>",
			data: {
				kodeReq: kodeReq
			},
			dataType: "json",
			async: false,
			success: function(dt) {
				// console.log(dt);
				if (!dt) {
					$("#simpan").addClass("disabled");
					$("#simpan").removeAttr("data-toggle");
				} else {
					$("#simpan").removeClass("disabled");
					$("#simpan").attr("data-toggle", "modal");
				}

				let row = rows = '';
				let sum = 0;
				for (let i = 0; i < dt.length; i++) {
					row += `<tr>
								<td>` + (i + 1) + `</td>
								<td>` + dt[i].nama_brg + `</td>
								<td>` + dt[i].length_size + `</td>
								<td>` + dt[i].width_size + `</td>
								<td>` + dt[i].lumber_type + `</td>
								<td>` + dt[i].species_type + `</td>
								<td>` + dt[i].qty + `</td>
								<td>
									<button type="button" class="btn btn-xs btn-danger" onclick="delTmpReq('` + dt[i].id_tem_req + `')"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus</button>
								</td>
							</tr>`;
					sum += parseInt(dt[i].qty);
				}
				$("#getTotalQty").val(sum);
				rows += `<tr>
							<th colspan="6" style="text-align: right;"><strong>Total Qty</strong></th>
							<th colspan="2" style="text-align: left;"><strong>` + sum + `</strong></th>
						</tr>`;
				$('#dtReqBrg').html(row);
				$('#totReqBrg').html(rows);
			}
		});
		return false;
	}

	function delTmpReq(id_tem_req) {
		$.ajax({
			type: "POST",
			data: {
				idTemReq: id_tem_req
			},
			url: "<?= site_url('Request/req/delTmpReq'); ?>",
			dataType: "JSON",
			success: function(a) {
				Toast.fire({
					icon: 'success',
					title: 'Berhasil Hapus Permintaan Barang!'
				});
				displayDetailBarang()
			}
		});
	}
</script>
