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
                <a class="navbar-brand" href = "<?php echo base_url(); ?>"><img src="<?php echo base_url('assets/img/logo/logopanjangbirunav.png'); ?>" alt=""></a>
                <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link " href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                </ul>
                    <div class="form-inline my-2 my-lg-0">
                        <a class="btn btn-outline-secondary text-primary-color" href="<?php echo base_url('C_Home/login'); ?>" role="button" style="pading-left:50px">LOGIN</a>
                    </div>
            </nav>
            <div class="gridContent-2t3OFU">
                <div class="row">
                    <div class="col-sm">
                        <center><img src="<?php echo base_url('assets/img/logo/Logo-biru.png'); ?>" alt="Avapotek" style="width:300px;"></center>
                    </div>
                    <div class="col-sm">
                        <div class="card">
	                        <div class="card-body">
                                <h4>Registrasi</h4>
                                (*) Required
                                <form action="<?= site_url('C_Home/registrasi') ?>" method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <input id="nama_depan" name="nama_depan" placeholder="Nama depan*" class="form-control" type="text" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input id="nama_tengah" name="nama_tengah" placeholder="Nama tengah" class="form-control" type="text">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input id="nama_belakang" name="nama_belakang" placeholder="Nama belakang*" class="form-control" type="text" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input id="Username" name="Username" placeholder="Username*" class="form-control" type="text" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input id="Password" name="Password" placeholder="Password*" class="form-control" type="password" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input id="alamat" name="alamat" placeholder="Alamat*(Nama Jalan,Nama Gang)" class="form-control" type="text" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input id="alamat_tambahan" name="alamat_tambahan" placeholder="Alamat Tambahan(Gedung,Kamar)" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <input id="kelurahan" name="kelurahan" placeholder="Kelurahan*" class="form-control" type="text" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input id="kecamatan" name="kecamatan" placeholder="Kecamatan*" class="form-control" type="text" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input id="kota" name="kota" placeholder="Kota*" class="form-control" type="text" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input id="No_Telp1" name="no_telp1" placeholder="Nomor Telepon*" class="form-control" type="text" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input id="No_Telp2" name="no_telp2" placeholder="Nomor Telepon" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Registrasi</button>
                                </div>
                                </form>
                            </div>
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
        <script type="text/javascript">
            $(document).ready(function(){
                
            });
        </script>
    </body>
</html>