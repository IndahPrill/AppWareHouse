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
                                    <input type="text" class="form-control" name="kodeReq" id="kodeReq" placeholder="Masukkan ..." value="<?= $row->getKdReq ?>" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="kodeBrg">Kode Barang</label>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" name="kodeBrg" id="kodeBrg" placeholder="Masukkan ..." autocomplete="off" readonly required>
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
                                            <input type="number" class="form-control" name="lengthSize" id="lengthSize" placeholder="Masukkan ..." autocomplete="off" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="widthSize">Lebar</label>
                                            <input type="number" class="form-control" name="widthSize" id="widthSize" placeholder="Masukkan ..." autocomplete="off" readonly required>
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
                                        <th rowspan="2">Nama</th>
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
                            <input type="hidden" id="getSubTotal">
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
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Panjang</th>
                            <th>Lebar</th>
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
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Konfirmasi</h4>
                </div>
				<form id="formSaveBrg" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label for="tglReqBrg">Tanggal</label>
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control pull-right" id="tglReqBrg" name="tglReqBrg" required>
							</div>
						</div>
						<div class="form-group">
							<label for="kdSup">Pemasok</label>
							<select class="form-control" id="kdSup" name="kdSup" required></select>
						</div>
						<div class="form-group">
							<label for="remark">Komentar</label>
							<textarea class="form-control" id="remark" name="remark" placeholder="Masukkan ..." rows="2" required></textarea>
						</div>
						<input type="hidden" name="kdPembelian" value="<?= $row->getKdReq; ?>">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Batal</button>
						<button type="button" class="btn btn-success"><i class="fa fa-send"></i>&nbsp;&nbsp;Kirim</button>
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

<script type="text/javaScript">
    $(function() {
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
			"pageLength": 5,
			"lengthMenu": [5, 10, 20, 50],
		})

		$('#tglReqBrg').datepicker({
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
</script>
