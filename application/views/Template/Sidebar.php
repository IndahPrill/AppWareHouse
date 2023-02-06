<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU NAVIGATION</li>
            <li <?= $this->uri->segment(2) == "das" ? 'class="active"' : ''; ?> >
                <a href="<?= site_url('Dashboard/das') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            
			

			<<li class="<?= $this->uri->segment(2) == "sto" ? 'active' : ''; ?> treeview">
                <a href="#">
                    <i class="fa fa-cube"></i> <span>Stock Barang</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
					<li <?= $this->uri->segment(3) == "getListStock" ? 'class="active"' : ''; ?> >
						<a href="<?= site_url('Stock/sto/getListStock') ?>"><i class="fa fa-circle-o"></i> Daftar Stock</a>
					</li>
					<?php if ($this->session->userdata('level') <= 2) { ?>
                    <li <?= $this->uri->segment(3) == "stockIn" ? 'class="active"' : ''; ?> >
                        <a href="<?= site_url('Stock/sto/stockIn') ?>"><i class="fa fa-circle-o"></i> Stock Masuk</a>
                    </li>
					<?php } ?>
					<?php if ($this->session->userdata('level') <= 2) { ?>
                    <li <?= $this->uri->segment(3) == "stockOut" ? 'class="active"' : ''; ?> >
                        <a href="<?= site_url('Stock/sto/stockOut') ?>"><i class="fa fa-circle-o"></i> Stock Keluar</a>
                    </li>
					<?php } ?>
                </ul>
            </li> 

            <li class="<?= $this->uri->segment(2) == "req" ? 'active' : ''; ?> treeview">
                <a href="#">
					<i class="fa fa-exchange"></i> <span>Permintaan Barang</span>
                    <span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
					<li <?= in_array($this->uri->segment(3), array("getListReq", "dtlReq")) ? 'class="active"' : ''; ?> >
						<a href="<?= site_url('Request/req/getListReq') ?>"><i class="fa fa-circle-o"></i> Daftar</a>
					</li>
					<?php if (in_array($this->session->userdata('level'), array(1,3))) { ?>
					<li <?= $this->uri->segment(3) == "createReq" ? 'class="active"' : ''; ?> >
						<a href="<?= site_url('Request/req/createReq') ?>"><i class="fa fa-circle-o"></i> Tambah</a>
					</li>
					<?php } ?>
                </ul>
            </li>
			
			<?php if ($this->session->userdata('level') <= 2) { ?>
			<li class="<?= $this->uri->segment(2) == "sup" ? 'active' : ''; ?> treeview">
                <a href="#">
                    <i class="fa fa-send"></i> <span>Supplier</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?= $this->uri->segment(3) == "getListSup" ? 'class="active"' : ''; ?> >
                        <a href="<?= site_url('Supplier/sup/getListSup') ?>"><i class="fa fa-circle-o"></i> Daftar</a>
                    </li>
                    <li <?= $this->uri->segment(3) == "createSup" ? 'class="active"' : ''; ?> >
                        <a href="<?= site_url('Supplier/sup/createSup') ?>"><i class="fa fa-circle-o"></i> Tambah</a>
                    </li>
                </ul>
            </li>
            <?php } ?>

            <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <li class="header">Settings</li>
            <li <?= $this->uri->segment(2) == "usr" ? 'class="active"' : ''; ?> >
                <a href="<?= site_url('User/usr') ?>"><i class="fa fa-user"></i> <span>List User</span></a>
            </li>
            <?php } ?>

            <li class="treeview"></li>
        </ul>
    </section>
</aside>
