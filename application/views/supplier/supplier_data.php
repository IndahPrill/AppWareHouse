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
                Suppliers
                <small>Pemasok Barang</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
                <li class="active">Suppliers</li>
            </ol>
        </section>

        <section class="content">
            <div class="box">

                <div class="box-header">
                    <h3 class="box-title">Data Supplier</h3>
                    <div class="pull-right">
                        <a href="<?=site_url('supplier/add')?>" class="btn btn-primary btn-flat">
                            <i class="fa fa-plus"></i> Create
                        </a>
                    </div>
                </div>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                                foreach($row->result() as $key => $data) {?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data->name?></td>
                                <td><?=$data->phone?></td>
                                <td><?=$data->address?></td>
                                <td><?=$data->description?></td>
                                <td class="text-center" width="160px">
                                    <a href="<?=site_url('supplier/edit/'.$data->supplier_id)?>"
                                        class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil"></i> Update
                                    </a>
                                    <a href="<?=site_url('supplier/del/'.$data->supplier_id)?>"
                                        onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                                    </form>
                                </td>
                            </tr>
                            <?php 
                                } ?>
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