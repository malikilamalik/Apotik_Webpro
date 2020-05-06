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
                <a class="navbar-brand" href = "<?php echo base_url('Pelayan/index'); ?>"><img src="<?php echo base_url('assets/img/logo/logopanjangbirunav.png'); ?>" alt=""></a>

                <div class="collapse navbar-collapse" id="Gey">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link " href="<?php echo base_url('Pelayan/index'); ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('Pelayan/profile'); ?>">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('Pelayan/ShowResep'); ?>">Resep</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo base_url('Pelayan/ShowTransaksi'); ?>">Transaksi</a>
                        </li>
                    </ul>
                    <div class="form-inline my-2 my-lg-0">
                        <a class="btn btn-secondary text-primary-color" href="<?php echo base_url('Pelayan/logout'); ?>" role="button" style="pading-left:50px">LOGOUT</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container-flex">
            <div class="row" style="padding:30px 20px">
                <div class="col-md-6">
                    <h2>List Transaksi</h2>
                </div>
                <div class="col-md-6">
                    <a href="<?php echo base_url('Pelayan/InsertTransaksi'); ?>"class="btn btn-info btn-lg btn-block" id="tambah-data"> Input Transaksi Baru<a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="table-data" class="table table-striped">
                    <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Transaksi</th>
                                <th>ID Resep</th>
                                <th>Isi Resep</th>
                                <th>Total Harga Transaksi</th>
                                <th>Status Transaksi</th>
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
        <!-- Modal Detail-->
        <div id="detailModal" class="modal fade bg-light" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Detail Transaksi</h4>
                </div>
                <div class="modal-body" id="BodyDetailModel">


            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                tampil_data();
                //Menampilkan Data di tabel
                function tampil_data(){
                    $.ajax({
                        url: '<?php echo base_url(); ?>Pelayan/Get_dbtransaksi',
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
                                            + '<td>' + response[i].id_transaksi  + '</td>'
                                            + '<td>' + response[i].id_resep  + '</td>'
                                             + '<td>' + response[i].isi_resep  + '</td>'
                                            + '<td>' + 'Rp. ' + response[i].harga  + '</td>'
                                            + '<td>' + response[i].status_transaksi  + '</td>'
                                            + '<td >' + '<span><button style="margin-left: 5px;" data-id="'+response[i].id_transaksi+'" class="btn btn-info btn_detail">Detail</button></span></td>'
                                            + '<td>' + '<span><button style="margin-left: 5px;" data-id="'+response[i].id_transaksi+'" class="btn btn-danger btn_hapus">Hapus</button></span></td>'
                                            + '</tr>';
                            }
                            $("#tbl_data").html(html);
                        }
        
                    });
                }
                //Menampilkan Data di tabel
                function tampil_data_modal(id_transaksi){
                    $.ajax({
                        url: '<?php echo base_url(); ?>Pelayan/Get_idtransaksi',
                        type: 'POST',
                        data: {id_transaksi:id_transaksi},
                        dataType: 'json',
                        success: function(response){
                            $("#detailModal").modal('show');
                            html =      '<div class="row">'
                                            +'<div class="col-md-6">' 
                                                +'<p>ID Transaksi : </p></div>'
                                            +'<div class="col-md-6">'
                                                + response.id_transaksi
                                            +'</div>'
                                            +'<div class="col-md-6">' 
                                                +'<p>ID Resep : </p></div>'
                                            +'<div class="col-md-6">'
                                                + response.id_resep
                                            +'</div>'
                                            +'<div class="col-md-6">' 
                                                +'<p>Isi Resep : </p></div>'
                                            +'<div class="col-md-6">'
                                                + response.isi_resep
                                            +'</div>'
                                            +'<div class="col-md-6">' 
                                                +'<p>Total Harga Transaksi  : Rp.</p></div>'
                                            +'<div class="col-md-6">'
                                                + response.harga
                                            +'</div>'
                                            +'<div class="col-md-6">' 
                                                +'<p>Status Transaksi  : </p></div>'
                                            +'<div class="col-md-6">'
                                                + response.status_transaksi
                                            +'</div>'
                                        +'</div>'
                                    +'</div>'
                                    +'<div class="modal-footer">'
                                        +'<a class="btn btn-warning" href="<?php echo base_url(); ?>Pelayan/EditTransaksi/'+response.id_transaksi +'" role="button" style="pading-left:50px">Edit Resep</a>'
                                    +'</div>';
                            $("#BodyDetailModel").html(html);
                        }
                    })
                }
                //Hapus Data dengan konfirmasi
                $("#tbl_data").on('click','.btn_hapus',function(){
                    var id_transaksi = $(this).attr('data-id');
                    var status = confirm('Hapus Transaksi ini?');
                    if(status){
                        $.ajax({
                            url: '<?php echo base_url(); ?>Pelayan/DeleteTransaksi',
                            type: 'POST',
                            data: {id_transaksi:id_transaksi},
                            success: function(response){
                                tampil_data();
                            }
                        })
                    }
                })
                //Memunculkan modal edit
                $("#tbl_data").on('click','.btn_detail',function(){
                    var id_transaksi = $(this).attr('data-id');
                    tampil_data_modal(id_transaksi);
                })

            });
        </script>
    </body>
</html>