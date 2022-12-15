<section class="content-header">
      <h1>
       Request
       <small>Permintaan Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Request</li>
      </ol>
    </section>


<section class="content">
<?php $this->view('messages')?>
    <div class="box">

        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> Request</h3>
                <div class="pull-right">
                    <a href="<?=site_url('request')?>" class="btn btn-warning btn-flat">
                       <i class="fa fa-user-undo"></i> Back
                    </a>
                </div>
        </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action = "<?=site_url ('Request/process') ?>" method="post">
                        <div class="form-group">
                                <label> Tanggal </label>
                                <input type="date" name="date"  class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label> Jenis Kayu </label>
                                <input type="hidden" name="id" value="<?=$row->request_id?>">
                                <input type="text" name="jenis" value="<?=$row->jenis?>" class="form-control" required>
                            </div>
                        
                            <div class="form-group">
                                <label> Ukuran</label>
                                <input type="text" name="ukuran" value="<?=$row->ukuran ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label> Alasan </label>
                                <input type="text" name="alasan" value="<?=$row->keterangan ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                    <label>  Jumlah </label>
                                    <input type="number" name="jumlah" class="form-control" required>
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