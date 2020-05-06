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
                        <li class="nav-item active">
                            <a class="nav-link " href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('C_ObatV/index');?>">Obat & Vitamin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Produk Medis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('C_Home/apotek_terdekat'); ?>">Temukan Apotek Terdekat</a>
                        </li>
                    </ul>
                    <div class="form-inline my-2 my-lg-0">
                        <a class="btn btn-outline-secondary text-primary-color" href="<?php echo base_url('C_Home/login'); ?>" role="button" style="pading-left:50px">LOGIN</a>
                    </div>
                </div>
            </nav>
            <div class="gridContent-3t3OFU">
                <div class="row">
                    <div class="col-sm">
                        <img src="<?php echo base_url('assets/img/pharmacy.png'); ?>" alt="">
                    </div>
                    <div class="col-sm">
                        <h2>Cara baru untuk membeli obat dengan mudah</h2>
                        <p>Avapotek adalah website untuk membeli obat dengan resep dokter,obat generik,vitamin dan produk kedokteran.</p>
                        <center><a href="<?php echo base_url('C_Home/Registrasi'); ?>" class="btn btn-primary btn-lg btn-block" style="width:50%">Sign Up</a></center>
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