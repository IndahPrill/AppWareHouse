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
                Pilih Form
                <small>Pilih form</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
                <li class="active">Stock Add</li>
            </ol>
        </section>

        <section class="content">
            
            <?php $this->view('messages') ?>
                <div class="row">

                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title" center>Form Barang</h3>
                            </div>
                                <div class="row">
			                        <div class="col-md-5">
                                        <a href="<?=site_url('Stock/stock_add_raw')?>" class="btn btn-primary btn-flat">
                                            <i class="fa fa-plus"></i> Barang Mentah
                                        </a>
                                    </div>
                                </div>
                                    <br>
                                <div class="row">
			                        <div class="col-md-5">
                                        <a href="<?=site_url('Stock/stock_add_done')?>" class="btn btn-primary btn-flat">
                                            <i class="fa fa-plus"></i> Barang Jadi
                                        </a>
                                    </div>
                                </div>  
                        </div>
                    </div>
                </div>                
        </section>
    </div>
</div>
    <!-- Footer -->
    <?php $this->load->view('Template/Footer') ?>
    <!-- Footer -->

	

