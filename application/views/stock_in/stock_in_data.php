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
                <?php if($this->session->userdata('level') == 2){?>
                <div class="pull-right">
                    <a href="<?=site_url('stock/in/add')?>" class="btn btn-primary btn-flat">
                       <i class="fa fa-plus"></i> Add Stock In
                    </a>
                </div>
                <?php }?>
            </div>
            
            <div class="box-body table-responsive">
                <table class = "table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1;
                        foreach($row as $key => $data) {?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$data->kode?></td>
                            <td><?=$data->nama_item?></td>
                            <td class="text-right"><?=$data->jumlah?></td>
                            <td class="text-center"><?=indo_date($data->date)?></td>
                            <td class="text-center" width="160px">
                                <a class="btn btn-default " data-toggle="modal" data-target="#modal-deail"
                                data-kode="<?=$data->kode?>"
                                data-itemname="<?=$data->nama_item?>"
                                data-suppliername="<?=$data->nama_supplier?>"
                                data-jumlah="<?=$data->jumlah?>"
                                data-date="<?=indo_date($data->date)?>">
                                    <i class="fa fa-eye"></i> Detail
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

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close>
                        <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Detail Barang</h4>
                </div>
                <div class="modal-body table responsive">
                        <table class="table table-bordered no-margin">
                            <body>
                                <tr>
                                    <th style="">Kode Barang</th>
                                </tr>
                </div>
            </div>
        </div>
     </div>