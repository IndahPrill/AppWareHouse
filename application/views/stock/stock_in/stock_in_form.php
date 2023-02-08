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
            <?php $this->view('messages') ?>
            <div class="row">

                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Barang</h3>
                        </div>
                        <form id="formBarang" method="post">
                            <div class="box-body">
								<div class="form-group">
                                    <label for="kodeReq">Kode Stock</label>
                                    <input type="text" class="form-control" name="kodeSto" id="kodeSto" placeholder="Masukkan ..." value="<?= $getKdSto ?>" readonly required>
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
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="name"> Supplier </label>
											<select class="form-control" id="kdSup" name="kdSup" required></select>
										</div>
									</div>
									<div class="col-md-6">
										<!-- <div class="form-group">
											<label for="tglReqBrg">Tanggal Stock In</label>
											<div class="input-group date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="tglReqBrg" name="tglReqBrg" placeholder="yyyy-mm-dd" required autocomplete="off">
											</div>
										</div> -->
										<div class="form-group">
											<label for="qtyReq">Jumlah</label>
											<input type="number" class="form-control" name="qtyReq" id="qtyReq" placeholder="Masukkan ..." autocomplete="off" required>
										</div>
									</div>
								</div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" id="tmbDataPembelian"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</button>
                            </div>
                        </form>
                    </div>
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

</div>

<!-- Footer -->
<?php $this->load->view('Template/Script') ?>
<!-- Footer -->

<script src="<?= base_url() ?>assets/bower_components/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/jquery-validation/additional-methods.min.js"></script>

<script type="text/javaScript">
	$(function() {
		getDataMasterBarang()
		getDataSupplier()

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
				kdSup: "required",
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
				kdSup: "Tidak Boleh Kosong",
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
				let kodeSto = $("#kodeSto").val();
				let kodeBrg = $("#kodeBrg").val();
				let nmBarang = $("#nmBarang").val();
				let lengthSize = $("#lengthSize").val();
				let widthSize = $("#widthSize").val();
				let lumberType = $("#lumberType").val();
				let speciesType = $("#speciesType").val();
				let qtyReq = $("#qtyReq").val();
				let kdSup = $("#kdSup").val();

				console.log("kodeBrg : " + kodeBrg);
				console.log("nmBarang : " + nmBarang);

				$.ajax({
					type: "POST",
					data: {
						kodeSto: kodeSto,
						kodeBrg: kodeBrg,
						nmBarang: nmBarang,
						lengthSize: lengthSize,
						widthSize: widthSize,
						lumberType: lumberType,
						speciesType: speciesType,
						qtyReq: qtyReq,
						kdSup: kdSup
					},
					url: "<?= site_url('Stock/sto/postStock') ?>",
					dataType: "JSON",
					success: function(res) {
						// displayDetailBarang()
						$("#kodeSto").val("");
						$("#kodeBrg").val("");
						$("#nmBarang").val("");
						$("#lengthSize").val("");
						$("#widthSize").val("");
						$("#lumberType").val("");
						$("#speciesType").val("");
						$("#qtyReq").val("");

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

				return false;
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
			url: "<?= site_url('Stock/sto/getMstrBrg') ?>",
			async: false,
			dataType: "JSON",
			success: function (dt) {
				console.log(dt.data)
				let btnAdd = row = '';
				for (let i = 0; i < dt.data.length; i++) {
					var kd_stock = (dt.data[i].kd_stock != "") ? dt.data[i].kd_stock : '-';
					var kd_barang = (dt.data[i].kd_barang != "") ? dt.data[i].kd_barang : '-';
					var nama_brg = (dt.data[i].nama_brg != "") ? dt.data[i].nama_brg : '-';
					var length_size = (dt.data[i].length_size != "") ? dt.data[i].length_size : '-';
					var width_size = (dt.data[i].width_size != "") ? dt.data[i].width_size : '-';
					var lumber_type = (dt.data[i].lumber_type != "") ? dt.data[i].lumber_type : '-';
					var species_type = (dt.data[i].species_type != "") ? dt.data[i].species_type : '-';
					var tot_qty = (dt.data[i].tot_qty != "") ? dt.data[i].tot_qty : '-';

					btnAdd = '<button type="submit" class="btn btn-sm btn-success" onclick="getDisplayData(\'' + kd_stock + '\', \'' + kd_barang + '\', \'' + nama_brg + '\', \'' + length_size + '\', \'' + width_size + '\', \'' + lumber_type + '\', \'' + species_type + '\')"><i class="fa fa-plus"></i></button>';

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
</script>

