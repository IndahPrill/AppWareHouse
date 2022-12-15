<section class="content-header">
      <h1>
       Items
       <small>Data Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Items</li>
      </ol>
    </section>

<section class="content">
<?php $this->view('messages')?>
    <div class="box">

        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> Item</h3>
                <div class="pull-right">
                    <a href="<?=site_url('item')?>" class="btn btn-warning btn-flat">
                       <i class="fa fa-user-undo"></i> Back
                    </a>
                </div>
        </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action = "<?=site_url ('item/process') ?>" method="post">
                            <div class="form-group">
                                <label> Kode Barang </label>
                                <input type="hidden" name="id" value="<?=$row->item_id?>">
                                <input type="text" name="kode" value="<?=$row->kode ?>" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label> Kategori Barang</label>
                                <select name="category" class="form-control" required>
                                <option value ="">--Pilih--</option>
                                <option value ="Barang Mentah">Barang mentah</option>
                                <option value ="Barang Jadi">Barang jadi</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label> Nama Barang</label>
                                <input type="text" name="nama" value="<?=$row->nama ?>" class="form-control" required>
                            </div>
                        
                            <div class="form-group">
                                <label> Ukuran</label>
                                <input type="text" name="ukuran" value="<?=$row->ukuran ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type= "submit" name=<?=$page?> class="btn btn-success btn-flat"> <i class="fa fa-paper-plane"></i>Save</button>
                                <button type= "reset"class="btn btn-warning btn-flat">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                    
            </div>

          
    </div>
</section>