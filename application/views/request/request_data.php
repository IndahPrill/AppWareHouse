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
                <h3 class="box-title">Daftar Request</h3>
                <div class="pull-right">
                <?php if($this->session->userdata('level') == 3){?>
                    <a href="<?=site_url('request/add')?>" class="btn btn-primary btn-flat">
                       <i class="fa fa-plus"></i> Add Request
                    </a><?php }?>
                </div>
            </div>
            
            <div class="box-body table-responsive">
                <table class = "table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Alasan</th>
                            <th>Jenis Kayu</th>
                            <th>Ukuran (satuan meter)</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <?php if($this->session->userdata('level') == 2){?><th>Action</th><?php }?>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1;
                        foreach($row->result() as $key => $data) {?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$data->date?></td>
                            <td><?=$data->keterangan?></td>
                            <td><?=$data->jenis_kayu?></td>
                            <td><?=$data->ukuran?></td>
                            <td><?=$data->jumlah?></td>
                            <td><?=$data->status?></td>
                            <?php if($this->session->userdata('level') == 2){?>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('request/confirm/'.$data->request_id)?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Konfirmasi Permintaan
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

