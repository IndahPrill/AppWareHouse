<div class="wrapper">
    <!-- Navbar -->
    <?php $this->load->view('Template/Navbar') ?>
    <!-- Navbar -->
    
    <!-- Sidebar-->
    <?php $this->load->view('Template/Sidebar') ?>
    <!-- Sidebar-->

    <div class="content-wrapper">
        <section class="content-header">
            <h1>Daftar <small>Stok Barang</small> </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
                <li class="active">Daftar</li>
            </ol>
        </section>

        <section class="content">
            <?php $this->view('messages')?>
            <div class="box">

                <div class="box-header">
                    <!-- <h3 class="box-title">Daftar Stok</h3> -->
                    <div class="pull-right">
                        <?php if($this->session->userdata('level') == 2) { ?>
                        <a href="<?= site_url('item/add')?>" class="btn btn-primary btn-flat">
                            <i class="fa fa-plus"></i> Create Items
                        </a>
                        <?php } ?>
                    </div>
                </div>

                <div class="box-body">
                    <table class="table table-bordered table-striped" id="getDataStock">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Request</th>
                                <th>Tanggal Request</th>
                                <th>Nama Barang</th>
                                <th>Type Kayu</th>
                                <th>Jenis Kayu</th>
                                <th>Stock</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
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

<script src="<?= base_url(); ?>processJS/item_data.js"></script>