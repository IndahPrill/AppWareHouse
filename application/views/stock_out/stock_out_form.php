<section class="content-header">
      <h1>
       Stock-Out
       <small>Barang Keluar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Stock-Out</li>
      </ol>
    </section>

<section class="content">
<?php $this->view('messages')?>
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Remove Stock</h3>
                <div class="pull-right">
                    <a href="<?=site_url('stock/out')?>" class="btn btn-warning btn-flat">
                       <i class="fa fa-user-undo"></i> Back
                    </a>
                </div>
        </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action = "<?=site_url ('stock/process') ?>" method="post">
                            <div class="form-group">
                                <label> Date </label>
                                <input type="date" name="date"  class="form-control" required>
                            </div>

                            <div class="form-group input-group">
                                <label for="kode"> Nama Barang </label>
                                    <input type="hidden" name="item_id" id="item_id">
                                    <select name="nama" class="form-control" required>
                                        <option value="">--PILIH--</option>
                                        <?php foreach($item as $i =>$data){
                                            echo'<option value="'.$data->item_id.'">'.$data->nama.'</option>';
                                        } ?>
                                    </select>
                            <div class="form-group">
                                    <label for="name">  Alasan </label>
                                    <input type="text" name="detail" class="form-control" required>
                            </div>

                            <div class="form-group">
                                    <label for="name">  Jumlah </label>
                                    <input type="number" name="jml" class="form-control" required>
                            </div>
                        
                            <div class="form-group">
                                <button type= "submit" name="out_add" class="btn btn-success btn-flat"> <i class="fa fa-paper-plane"></i>Save</button>
                                <button type= "reset"class="btn btn-warning btn-flat">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                    
            </div>

          
    </div>
</section>
