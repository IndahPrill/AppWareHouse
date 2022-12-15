<section class="content-header">
      <h1>
       Stock-Out
       <small>Barang Keluar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Stock-Keluar</li>
      </ol>
    </section>

    <section class="content">
        <?php $this->view('messages')?>
      <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Barang Keluar</h3>
                <?php if($this->session->userdata('level') == 2){?>
                <div class="pull-right">
                    <a href="<?=site_url('stock/out/add')?>" class="btn btn-primary btn-flat">
                       <i class="fa fa-plus"></i> Add Stock Out
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
                                <a class="btn btn-default ">
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