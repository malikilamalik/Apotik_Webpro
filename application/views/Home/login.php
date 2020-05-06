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
            </nav>
            <div class="gridContent-2t3OFU">
                <div class="row">
                    <div class="col-sm">
                        <center><img src="<?php echo base_url('assets/img/logo/Logo-biru.png'); ?>" alt="Avapotek" style="width:300px;"></center>
                    </div>
                    <div class="col-sm">
                        <div class="card">
	                        <div class="card-body">
                                <h4>Log In</h4>
                                <div class="login-form mt-4">
                                <form action="<?= site_url('C_Home/login') ?>" method="post">
                                <?php if($error_message) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error_message ?>
                                    </div>
                                <?php } ?>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                            <input id="username" name="username" placeholder="Username" class="form-control" type="text">
                                            </div>
                                            <div class="form-group col-md-12">
                                            <input type="password" class="form-control" id="pass" placeholder="Password" name="password">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="logi-forgot text-right mt-2">
                                    <a href="<?php echo base_url('C_Home/Registrasi'); ?>">Registrasi</a>
                                </div>
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