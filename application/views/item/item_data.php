<section class="content-header">
      <h1>
       items
       <small>Stok Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">items</li>
      </ol>
    </section>

    <section class="content">
        <?php $this->view('messages')?>
      <div class="box">

            <div class="box-header">
                <h3 class="box-title">Daftar Stok</h3>
                <div class="pull-right">
                <?php if($this->session->userdata('level') == 2){?>
                    <a href="<?=site_url('item/add')?>" class="btn btn-primary btn-flat">
                       <i class="fa fa-plus"></i> Create Items
                    </a><?php }?>
                </div>
            </div>
            
            <div class="box-body table-responsive">
                <table class = "table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Barang</th>
                            <th>Kategori Barang</th>
                            <th>Nama Barang</th>
                            <th>Ukuran (satuan meter)</th>
                            <th>Stock</th>
                            <?php if($this->session->userdata('level') == 2){?><th>Action</th><?php }?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach($row->result() as $key => $data) {?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$data->kode?></td>
                            <td><?=$data->kategori?></td>
                            <td><?=$data->nama?></td>
                            <td><?=$data->ukuran?></td>
                            <td><?=$data->stock?></td>
                            <?php if($this->session->userdata('level') == 2){?>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('item/edit/'.$data->item_id)?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <a href="<?=site_url('item/del/'.$data->item_id)?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                                <?php }?>
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