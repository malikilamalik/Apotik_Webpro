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
                            <a class="nav-link " href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo base_url('C_ObatV/index');?>">Obat & Vitamin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Produk Medis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('C_Home/apotek_terdekat'); ?>">Temukan Apotek Terdekat</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>


        <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="#">
                <img src="<?php echo base_url('assets/img/obat.jpg'); ?>" width="30" height="30" class="d-inline-block align-top" alt="">
                     List Obat & Vitamin
                </a>
        </nav> 
            <div class="table-responsive">
                <table id="table-data" class="table table-striped">
                    <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Obat</th>
                                <th>Stok Obat</th>
                            </tr>
                    </thead>
                        <tbody id="tbl_data">             
                        </tbody>
                </table>
            </div>
        </div>
        
        <script type="text/javascript">
            $(document).ready(function(){
                tampil_data();
                //Menampilkan Data di tabel
                function tampil_data(){
                    $.ajax({
                        url: '<?php echo base_url(); ?>C_ObatV/Ambil_Semua_Obat',
                        type: 'POST',
                        dataType: 'json',
                        success: function(response){
                            console.log(response);
                            var i;
                            var html = "";
                            for(i=0;i < response.length ; i++){
                                html = html + '<tr>'
                                            + '<td>' + response[i].id_obat  + '</td>'
                                            + '<td>' + response[i].nama_obat  + '</td>'
                                            + '<td>' + response[i].stok  + '</td>'
                                            + '</tr>';
                            }
                            $("#tbl_data").html(html);
                        }
        
                    });
                }
                 
            });
        </script>
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

