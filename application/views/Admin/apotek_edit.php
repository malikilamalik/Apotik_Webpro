<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>"/>
        <script src="<?php echo base_url('assets/js/jquery-3.4.1.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <link rel="icon" href="<?php echo base_url('assets/img/logo/Logo-biru-ico.png'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Avapotek</title>
	</head>
    <body>
       <div class="container-flex" style="padding-bottom:100px; background-color: #124f67 !important;">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Gey" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href = "<?php echo base_url(); ?>"><img src="<?php echo base_url('assets/img/logo/logopanjangbirunav.png'); ?>" alt=""></a>

                <div class="collapse navbar-collapse" id="Gey">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link " href="<?php echo base_url('Admin'); ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo base_url('Admin/Apotek'); ?>">Apotek</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container" style="padding:30px;width:70%">
        <div class="gridContent-2t3OFU">
                <div class="row">
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                                <h4>Registrasi</h4>
                                (*) Required
                                <form action="<?= site_url('Admin/edit_apotek/') ?>" method="post">
                                <div class="form-row">
                                    <input id="id_apotek" name="id_apotek" type="text" value="<?php echo $apotek['id_apotek'] ?>" hidden>
                                    <div class="form-group col-md-4">
                                        <input id="nama_apotek" name="nama_apotek" placeholder="Nama apotek*" class="form-control" type="text" value="<?php echo $apotek['nama_apotek'] ?>"required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input id="jalan" name="jalan" placeholder="Jalan" class="form-control" type="text" value="<?php echo $apotek['jalan'] ?>">
                                    </div>
                                    <div class="form-row">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Ubah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<footer class="footer">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Avapotek</h4>
                <h6 class="card-subtitle mb-2 text-muted">PT. TEMAN IBU PROFEN </h6>
                <p class="card-text">Follow us </p>
            </div>
        </div>
        </footer>
    </body>
</html>