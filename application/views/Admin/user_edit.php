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
                            <a class="nav-link" href="<?php echo base_url('Admin/user_profile'); ?>">Profile</a>
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
                                <h4>Edit Profile User</h4>
                                (*) Required
                                <form action="<?= site_url('Admin/ubah/') ?>" method="post">
                                <div class="form-row">
                                    <input id="user_id" name="user_id" type="text" value="<?php echo $user['user_id'] ?>" hidden>
                                    <div class="form-group col-md-4">
                                        <input id="nama_depan" name="nama_depan" placeholder="Nama depan*" class="form-control" type="text" value="<?php echo $user['nama_depan'] ?>"required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input id="nama_tengah" name="nama_tengah" placeholder="Nama tengah" class="form-control" type="text" value="<?php echo $user['nama_tambahan'] ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input id="nama_belakang" name="nama_belakang" placeholder="Nama belakang*" class="form-control" type="text" required value="<?php echo $user['nama_belakang'] ?>">
                                    </div>
                                </div> 
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input id="alamat" name="alamat" placeholder="Alamat*(Nama Jalan,Nama Gang)" class="form-control" type="text" value="<?php echo $user['alamat'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input id="alamat_tambahan" name="alamat_tambahan" placeholder="Alamat Tambahan(Gedung,Kamar)" class="form-control" type="text" value="<?php echo $user['alamat_tambahan'] ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <input id="kelurahan" name="kelurahan" placeholder="Kelurahan*" class="form-control" type="text" required value="<?php echo $user['kelurahan'] ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input id="kecamatan" name="kecamatan" placeholder="Kecamatan*" class="form-control" type="text" required value="<?php echo $user['kecamatan'] ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input id="kota" name="kota" placeholder="Kota*" class="form-control" type="text" required value="<?php echo $user['kota'] ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input id="No_Telp1" name="no_telp1" placeholder="Nomor Telepon*" class="form-control" type="text" required value="<?php echo $user['no_telp1'] ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input id="No_Telp2" name="no_telp2" placeholder="Nomor Telepon" class="form-control" type="text" value="<?php echo $user['no_telp2'] ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Ubah</button>
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
    </body>
</html>