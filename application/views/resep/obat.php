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
                <a class="navbar-brand" href = "<?php echo base_url('Apoteker'); ?>"><img src="<?php echo base_url('assets/img/logo/logopanjangbirunav.png'); ?>" alt=""></a>

                <div class="collapse navbar-collapse" id="Gey">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link " href="<?php echo base_url('Apoteker'); ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link " href="<?php echo base_url('Apoteker/Obat'); ?>">Obat <span class="sr-only">(current)</span></a>
                        </li>
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
                    <h2>Tabel Obat</h2>
                </div>
                <div class="col-md-6">
                    <a href="<?php echo base_url('Apoteker/TambahDataObat'); ?>"class="btn btn-info btn-lg btn-block" id="tambah-data"> Tambah Data<a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="table-data" class="table table-striped">
                    <thead>
                            <tr>
                                <th>Id Obat</th>
                                <th>Nama Obat</th>
                                <th>Stock</th>
                                <th>Tambah Stock</th>
                                <th>Hapus</th>
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
                        url: '<?php echo base_url(); ?>Apoteker/Ambil_Semua_Obat',
                        type: 'POST',
                        dataType: 'json',
                        success: function(response){
                            console.log(response);
                            var i;
                            var html = "";
                            for(i=0;i < response.length ; i++){
                                html = html + '<tr>'
                                            + '<td>' + response[i].id_obat + '</td>'
                                            + '<td>' + response[i].nama_obat  + '</td>'
                                            + '<td>' + response[i].stok  + '</td>'
                                            + '<td >' + '<span><button style="margin-left: 5px;" data-id="'+response[i].id_obat+'" class="btn btn-info btn_detail">Detail</button></span></td>'
                                            + '<td>' + '<span><button style="margin-left: 5px;" data-id="'+response[i].id_obat+'" class="btn btn-danger btn_hapus">Hapus</button></span></td>'
                                            + '</tr>';
                            }
                            $("#tbl_data").html(html);
                        }
        
                    });
                }
                //Hapus Data dengan konfirmasi
                $("#tbl_data").on('click','.btn_hapus',function(){
                    var id_obat = $(this).attr('data-id');
                    var status = confirm('Yakin ingin menghapus?');
                    if(status){
                        $.ajax({
                            url: '<?php echo base_url(); ?>Apoteker/hapusObat',
                            type: 'POST',
                            data: {id_obat:id_obat},
                            success: function(response){
                                tampil_data();
                            }
                        })
                    }
                })
                //Memunculkan modal edit
                $("#tbl_data").on('click','.btn_detail',function(){
                    var id_obat = $(this).attr('data-id');
                    tampil_data_modal(id_obat);
                })
                //Menampilkan Data di tabel
                function tampil_data_modal(id_obat){
                    $.ajax({
                        url: '<?php echo base_url(); ?>Apoteker/Ambil_Obat',
                        type: 'POST',
                        data: {id_obat:id_obat},
                        dataType: 'json',
                        success: function(response){
                            $("#detailModal").modal('show');
                            html =      '<div class="row">'
                                            +'<div class="col-md-6">' 
                                                +'<p>Nama Obat : </p></div>'
                                            +'<div class="col-md-6">'
                                                + response.nama_obat
                                            +'</div>'
                                            +'<div class="col-md-6">' 
                                                +'<p>Stok Obat : </p></div>'
                                            +'<div class="col-md-6">'
                                                + response.stok
                                            +'</div>'
                                            +'<br><div class="col-md-6">' 
                                                +'<p>Tambah Obat : </p></div>'
                                            +'<div class="col-md-6">'
                                                + `<form action="<?= site_url('Apoteker/TambahObat/') ?>" method="POST">
                                                    <input id="id_obat" name="id_obat" class="form-control" type="text" value="`+ response.id_obat + `" hidden>
                                                    <input id="stok" name="stok" placeholder="Stok" class="form-control" type="text" value="`+ response.stok + `" hidden>
                                                    <input id="tambah_stok" name="tambah_stok" placeholder="Tambah Stok" class="form-control" type="text" required>
                                                `                                                + '<br><button type="submit" class="btn btn-success btn-lg btn-block">Update</button></form>'
                                            +'</div>'
                                            +'<div class="col-md-6">'
                                            +'</div>'
                                            +'<div class="col-md-6">'

                                            +'</div>'
                                        +'</div>';
                            $("#BodyDetailModel").html(html);
                        }
                    })
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
        <!-- Modal Detail-->
        <div id="detailModal" class="modal fade bg-light" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Tambah Stock Obatr</h4>
                </div>
                <div class="modal-body" id="BodyDetailModel">


            </div>
        </div>
    </body>
</html>

