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
                    < <?php if($this->session->userdata('level') == 2){?>
                    <div class="pull-right">
                        <a href="<?=site_url('Stock/add_choice')?>" class="btn btn-primary btn-flat">
                            <i class="fa fa-plus"></i> Add New Item
                        </a>
                    </div>
                    <?php }?> 
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
							'</tr>';
				}
				$('#dtStock').html(row);
			}
		});
		return false;
	}
	
</script>
