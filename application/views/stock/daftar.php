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
                    <!-- <?php if($this->session->userdata('level') == 2){?>
                    <div class="pull-right">
                        <a href="<?=site_url('stock/in/add')?>" class="btn btn-primary btn-flat">
                            <i class="fa fa-plus"></i> Add Stock In
                        </a>
                    </div>
                    <?php }?> -->
                </div>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="tblDftrStock">
                        <thead>
                            <tr>
								<th>#</th>
								<th>Kode Stock</th>
								<th>Kode Barang</th>
								<th>Nama Barang</th>
								<th>Panjang</th>
								<th>Lebar</th>
								<th>Jenis</th>
								<th>Tipe</th>
								<th>Qty</th>
                            </tr>
                        </thead>
                        <tbody id="dtStock">
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <?php $this->load->view('Template/Footer') ?>
    <!-- Footer -->

	<!-- Modal Timeline -->
    <div class="modal fade" id="modal-timeline">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><span class="oi oi-graph"></span> Linimasa Stock Barang</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- The time line -->
                            <div class="timeline" id="isiTimeLine"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-md btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Close</button>
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

<script type="text/javascript">
	$(function() {
		displayData()

		let dateStart = moment();

		$("#tblDftrStock").DataTable({
			"responsive": true,
			"autoWidth": false,
			"pageLength": 10,
			"lengthMenu": [5, 10, 20, 50],
		})
	})

	function displayData() {
		$.ajax({
			url: "<?= site_url('Stock/sto/GetStock') ?>",
			dataType: "json",
			async: false,
			success: function(dt) {
				console.log(dt)
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

					row += `<tr>
								<td>` + (i + 1) + `</td>
								<td><a style="color: #0470db; cursor: pointer;" onclick="modalLogStock('` + kd_stock + `');" data-toggle="modal" data-target="#modal-timeline">` + kd_stock + `</a></td>
								<td>` + kd_barang + `</td>
								<td>` + nama_brg + `</td>
								<td>` + length_size + `</td>
								<td>` + width_size + `</td>
								<td>` + lumber_type + `</td>
								<td>` + species_type + `</td>
								<td>` + tot_qty + `</td>
							</tr>`;
				}
				$('#dtStock').html(row);
			}
		});
		return false;
	}

	function modalLogStock(kd_stock) {
		$.ajax({
			type: "POST",
			url: "<?= site_url('Stock/sto/getTimeline') ?>",
			data: { kd_stock: kd_stock },
			dataType: "JSON",
			async: false,
			success: function(dt) {
				console.log(dt);
				let row = colorDate = iconList = header = '';
				let setDate = date = time = '';
				for (let i = 0; i < dt.data.length; i++) {
					if (dt.data[i].date_log) {
						setDate = new Date(dt.data[i].date_log);
						date = ("00" + setDate.getDate()).slice(-2) + "-" + ("00" + (setDate.getMonth() + 1)).slice(-2) + "-" + setDate.getFullYear();
						time = ("00" + setDate.getHours()).slice(-2) + ":" + ("00" + setDate.getMinutes()).slice(-2) + ":" + ("00" + setDate.getSeconds()).slice(-2);
					}

					if (dt.data[i].status_in_out == 1) {
						if (dt.data[i].status_log == 0) {
							colorDate = "bg-blue";
							iconList = '<i class="fa fa-truck bg-blue"></i>';
							header = "PENGIRIMAN";
						} else if (dt.data[i].status_log == 1) {
							colorDate = "bg-yellow";
							iconList = '<i class="fa fa-inbox bg-yellow"></i>';
							header = "MASUK GUDANG SEBAGIAN";
						} else if (dt.data[i].status_log == 2) {
							colorDate = "bg-green";
							iconList = '<i class="fa fa-thumbs-up bg-green"></i>';
							header = "MASUK GUDANG";
						} else if (dt.data[i].status_log == 3) {
							colorDate = "bg-red";
							iconList = '<i class="fa fa-ban bg-red"></i>';
							header = "CENCEL SEBAGIAN";
						} else if (dt.data[i].status_log == 4) {
							colorDate = "bg-red";
							iconList = '<i class="fa fa-ban bg-red"></i>';
							header = "CENCEL";
						} else if (dt.data[i].status_log == 5) {
							colorDate = "bg-red";
							iconList = '<i class="fa fa-inbox bg-red"></i>';
							header = "MASUK GUDANG SEBAGIAN DAN CENCEL SEBAGIAN";
						} else {
							colorDate = "bg-gray";
							iconList = '<i class="fa fa-star bg-gray"></i>';
							header = "&nbsp;&nbsp;&nbsp;";
						}
					} else if (dt.data[i].status_in_out == 2) {
						if (dt.data[i].status_log == 0) {
							colorDate = "bg-blue";
							iconList = '<i class="fa fa-truck bg-blue"></i>';
							header = "PENAMBAHAN BARANG";
						}
					}

					remark = (dt.data[i].remark) ? dt.data[i].remark : "Menunggu Pengiriman .....";

					row += `<ul class="timeline">
								<li class="time-label">
									<span class="` + colorDate + `">` + date + `</span>
								</li>
								<li>
									` + iconList + `
									<div class="timeline-item">
										<span class="time"><i class="fa fa-clock-o"></i> ` + time + `</span>
										<h3 class="timeline-header"><strong>[` + dt.data[i].kd_stock + `]</strong> ` + header + `</h3>
										<div class="timeline-body">` + remark + `</div>
									</div>
								</li>
							</ul>`;
					// row += `<div class="time-label col-md-8">
					// 			<span class="` + colorDate + `">` + date + `</span>
					// 		</div>
					// 		<div>
					// 			` + iconList + `
					// 			<div class="timeline-item">
					// 				<span class="time"><i class="fas fa-clock"></i> ` + time + `</span>
					// 				<h3 class="timeline-header no-border"><strong>[` + dt.data[i].kd_stock + `]</strong> ` + header + `</h3>
					// 				<div class="timeline-body">` + remark + `</div>
					// 			</div>
					// 		</div>`;
				}

				row += `<li>
							<i class="fa fa-play bg-gray"></i>
						</li>`;

                $("#isiTimeLine").html(row);
			},
			error: function(jqXHR, textStatus, e) {
				console.log('fail');
				console.log(jqXHR);
				console.log(textStatus);
				console.log(e);
			}
		})
	}
	
</script>
