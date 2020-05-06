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
                            <a class="nav-link " href="<?php echo base_url('Admin'); ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                    </ul>
                    <div class="form-inline my-2 my-lg-0">
                        <a class="btn btn-secondary text-primary-color" href="<?php echo base_url('Admin/logout'); ?>" role="button" style="pading-left:50px">LOGOUT</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container-flex">
            <div class="row" style="padding:30px 20px">
                <div class="col-md-6">
                    <h2>Tabel Apotek</h2>
                </div>
                <div class="col-md-6">
                    <a href="<?php echo base_url('Admin/daftar_apotek'); ?>"class="btn btn-info btn-lg btn-block" id="tambah-data"> Tambah Data<a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="table-data" class="table table-striped">
                    <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Apotek</th>
                                <th>Jalan</th>
                            </tr>
                    </thead>
                        <tbody id="tbl_data">             
                        </tbody>
                </table>
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
                tampil_data();
                //Menampilkan Data di tabel
                function tampil_data(){
                    $.ajax({
                        url: '<?php echo base_url(); ?>Admin/ambil_semua_apotek_admin',
                        type: 'POST',
                        dataType: 'json',
                        success: function(response){
                            console.log(response);
                            var i;
                            var no = 0;
                            var html = "";
                            for(i=0;i < response.length ; i++){
                                no++;
                                html = html + '<tr>'
                                            + '<td>' + no  + '</td>'
                                            + '<td>' + response[i].nama_apotek  + '</td>'
                                            + '<td>' + response[i].jalan + '</td>'
                                            + '<td>' + '<span><button style="margin-left: 5px;" data-id="'+response[i].id_apotek+'" class="btn btn-secondary btn_edit">Edit</button></span></td>'
                                            + '<td>' + '<span><button style="margin-left: 5px;" data-id="'+response[i].id_apotek+'" class="btn btn-danger btn_hapus">Hapus</button></span></td>'
                            }
                            $("#tbl_data").html(html);
                        }

                    });  
                }
                $("#tbl_data").on('click','.btn_hapus',function(){
                    var id_apotek = $(this).attr('data-id');
                    var status = confirm('Yakin ingin menghapus?');
                    if(status){
                        $.ajax({
                            url: '<?php echo base_url(); ?>Admin/hapusApotek',
                            type: 'POST',
                            data: {id_apotek:id_apotek},
                            success: function(response){
                                tampil_data();
                            }
                        })
                    }
                })
                
             });
        </script>
    </body>
</html>