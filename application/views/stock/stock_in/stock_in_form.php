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

                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Barang</h3>
                        </div>
                        <form id="formBarang" method="post">
                            <div class="box-body">
                                
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
								
								<div class="form-group">
                                        <label for="name"> Supplier </label>
                                        <select name="supplier" class="form-control">
                                            <option value="">--PILIH--</option>
                                            <?php foreach($supplier as $i =>$data){
                                                    echo'<option value="'.$data->supplier_id.'">'.$data->name.'</option>';
                                                } ?>
                                        </select>
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
                            <h3 class="box-title">Daftar Barang Masuk</h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-striped" id="formBarang">
                                <thead>
                                    <tr>
                                        <th rowspan="2">#</th>
                                        <th rowspan="2">Nama Barang</th>
                                        <th colspan="2">Size</th>
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
							<label for="tglReqBrg">Tanggal Masuk</label>
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

