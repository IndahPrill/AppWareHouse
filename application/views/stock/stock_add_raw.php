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
                Item Add
                <small>Tambah Barang Mentah</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
                <li class="active">Item Add</li>
            </ol>
        </section>

        <section class="content">
            <?php $this->view('messages') ?>
            <div class="row">

                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Form Barang</h3>
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
                                        <input type="text" class="form-control" name="kodeBrg" id="kodeBrg" placeholder="Masukkan ..." autocomplete="off"  required>
					
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nmBrg">Nama Barang</label>
                                    <textarea class="form-control" id="nmBarang" name="nmBarang" rows="2" placeholder="Masukkan ..." required></textarea>
                                </div>
								
                                <div class="row">
									<div class="col-md-6">
                                        <div class="form-group">
											<label for="lengthSize">Panjang</label>
                                            <input type="text" class="form-control" name="lengthSize" id="lengthSize" placeholder="Masukkan ..." autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="widthSize">Lebar</label>
                                            <input type="text" class="form-control" name="widthSize" id="widthSize" placeholder="Masukkan ..." autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
									<div class="col-md-6">
										<div class="form-group">
                                            <label for="lumberType">Tipe Kayu</label>
                                            <input type="text" class="form-control" name="lumberType" id="lumberType" placeholder="Masukkan ..." autocomplete="off"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="speciesType">Jenis Kayu</label>
                                            <input type="text" class="form-control" name="speciesType" id="speciesType" placeholder="Masukkan ..." autocomplete="off"  required>
                                        </div>
                                    </div>
                                </div>
								
							
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" id="tmbDataRaw"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</button>
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

	


    <?php $this->load->view('Template/Script') ?>
<!-- Footer -->

<script src="<?= base_url() ?>assets/bower_components/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/jquery-validation/additional-methods.min.js"></script>

<script type="text/javaScript">
	
    $(function() {


		$("#formBarang").validate({
			rules: {
				
				kodeBrg: "required",
				nmBarang: "required",
				lengthSize: "required",
				widthSize: "required",
				lumberType: "required",
				speciesType: "required",
				
			},
			messages: {
				
				kodeBrg: "Tidak Boleh Kosong",
				nmBarang: "Tidak Boleh Kosong",
				lengthSize: "Tidak Boleh Kosong",
				widthSize: "Tidak Boleh Kosong",
				lumberType: "Tidak Boleh Kosong",
				speciesType: "Tidak Boleh Kosong",
				
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
						speciesType: speciesType
						
					},
					url: "<?= site_url('Stock/sto/postItem') ?>",
					dataType: "JSON",
					success: function(res) {
						// displayDetailBarang()
						$("#kodeSto").val("");
						$("#kodeBarang").val("");
						$("#nmBarang").val("");
						$("#lengthSize").val("");
						$("#widthSize").val("");
						$("#lumberType").val("");
						$("#speciesType").val("");
						
						if (res.status) {
							Toast.fire({
								icon: 'success',
								title: 'Berhasil Simpan Barang!'
							});
							setInterval(function() {
								location.reload();
							}, 3000);
						} else {
							Toast.fire({
								icon: 'error',
								title: 'Gagal Simpan Barang!'
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
   
    </script>