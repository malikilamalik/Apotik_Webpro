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
                            <a class="nav-link" href="<?php echo base_url('Admin/user_profile'); ?>">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('Admin/Apotek'); ?>">Daftar Apotek</a>
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
                    <h2>Tabel Profile</h2>
                </div>
                <div class="col-md-6">
                    <a href="<?php echo base_url('Admin/registrasi'); ?>"class="btn btn-info btn-lg btn-block" id="tambah-data"> Tambah Data<a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="table-data" class="table table-striped">
                    <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Nama Depan</th>
                                <th>Nama Belakang</th>
                                <th>Nomor HP</th>
                                <th>Role</th>
                                <th>Aktif</th>
                                <th>Detail</th>
                                <th>Hapus</th>
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
                    <h4 class="modal-title">Detail User</h4>
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
                        url: '<?php echo base_url(); ?>Admin/Ambil_Semua_User',
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
                                            + '<td>' + response[i].username  + '</td>'
                                            + '<td>' + response[i].nama_depan  + '</td>'
                                            + '<td>' + response[i].nama_belakang  + '</td>'
                                            + '<td>' + response[i].no_telp1  + '</td>'
                                            + '<td>' + response[i].role  + '</td>'
                                            + '<td>' + response[i].aktif  + '</td>'
                                            + '<td >' + '<span><button style="margin-left: 5px;" data-id="'+response[i].user_id+'" class="btn btn-info btn_detail">Detail</button></span></td>'
                                            + '<td>' + '<span><button style="margin-left: 5px;" data-id="'+response[i].user_id+'" class="btn btn-danger btn_hapus">Hapus</button></span></td>'
                                            + '</tr>';
                            }
                            $("#tbl_data").html(html);
                        }
        
                    });
                }
                //Menampilkan Data di tabel
                function tampil_data_modal(user_id){
                    $.ajax({
                        url: '<?php echo base_url(); ?>Admin/Ambil_User',
                        type: 'POST',
                        data: {user_id:user_id},
                        dataType: 'json',
                        success: function(response){
                            $("#detailModal").modal('show');
                            html =      '<div class="row">'
                                            +'<div class="col-md-6">' 
                                                +'<p>Nama : </p></div>'
                                            +'<div class="col-md-6">'
                                                + response.username
                                            +'</div>'
                                            +'<div class="col-md-6">' 
                                                +'<p>Nama Depan : </p></div>'
                                            +'<div class="col-md-6">'
                                                + response.nama_depan
                                            +'</div>'
                                            +'<div class="col-md-6">' 
                                                +'<p>Nama Tengah  : </p></div>'
                                            +'<div class="col-md-6">'
                                                + response.nama_tambahan
                                            +'</div>'
                                            +'<div class="col-md-6">' 
                                                +'<p>Nama Belakang  : </p></div>'
                                            +'<div class="col-md-6">'
                                                + response.nama_belakang
                                            +'</div>'
                                            +'<div class="col-md-6">' 
                                                +'<p>Nomor Telepon  :  </p></div>'
                                            +'<div class="col-md-6">'
                                                + response.no_telp1
                                            +'</div>'
                                            +'<div class="col-md-6">' 
                                                +'<p>Nomor Telepon (2)  : </p></div>'
                                            +'<div class="col-md-6">'
                                                + response.no_telp2
                                            +'</div>'
                                            +'<div class="col-md-6">' 
                                                +'<p>Alamat  : </p></div>'
                                            +'<div class="col-md-6">'
                                                + response.alamat
                                            +'</div>'
                                            +'<div class="col-md-6">' 
                                                +'<p>Alamat Tambahan  : </p></div>'
                                            +'<div class="col-md-6">'
                                                + response.alamat_tambahan
                                            +'</div>'
                                            +'<div class="col-md-6">' 
                                                +'<p>Kelurahan  : </p></div>'
                                            +'<div class="col-md-6">'
                                                + response.kelurahan
                                            +'</div>'
                                            +'<div class="col-md-6">' 
                                            +   '<p>Kecamatan  : </p></div>'
                                            +'<div class="col-md-6">'
                                                + response.kecamatan
                                            +'</div>'
                                            +'<div class="col-md-6">' 
                                                +'<p>Kota  : </p></div>'
                                            +'<div class="col-md-6">'
                                                + response.kota
                                            +'</div>'
                                            +'<div class="col-md-6">' 
                                                +'<p>Role  : </p></div>'
                                            +'<div class="col-md-6">'
                                                + response.role
                                            +'</div>'
                                            +'<div class="col-md-6">' 
                                                +'<p>Beli Obat Kustom  : </p></div>'
                                            +'<div class="col-md-6">'
                                                + response.obat_custom
                                            +'</div>'
                                            +'<div class="col-md-6">' 
                                                +'<p>Aktif  : </p></div>'
                                            +'<div class="col-md-6">'
                                                + response.aktif
                                            +'</div>'
                                        +'</div>'
                                    +'</div>'
                                    +'<div class="modal-footer">'
                                        +'<button type="button" class="btn btn-warning btn_reset_password" id="btn_reset_password" data-id="'+response.user_id+'">Reset Password</button>'
                                        +'<button type="button" class="btn btn-secondary btn_nonaktif_user" id="btn_nonaktif_user " data-id="'+response.user_id+'">Nonaktifkan</button>'
                                        +'<button type="button" class="btn btn-primary btn_aktif_user" id="btn_aktif_user " data-id="'+response.user_id+'">Aktifkan</button>'
                                    +'</div>';
                            $("#BodyDetailModel").html(html);
                        }
                    })
                }
                //Hapus Data dengan konfirmasi
                $("#tbl_data").on('click','.btn_hapus',function(){
                    var user_id = $(this).attr('data-id');
                    var status = confirm('Yakin ingin menghapus?');
                    if(status){
                        $.ajax({
                            url: '<?php echo base_url(); ?>Admin/hapusUser',
                            type: 'POST',
                            data: {user_id:user_id},
                            success: function(response){
                                tampil_data();
                            }
                        })
                    }
                })
                //Memunculkan modal 
                $("#tbl_data").on('click','.btn_detail',function(){
                    var user_id = $(this).attr('data-id');
                    tampil_data_modal(user_id);
                })
                //Nonaktifkan User dengan konfirmasi
                $("#BodyDetailModel").on('click','.btn_nonaktif_user',function(){
                    var user_id = $(this).attr('data-id');
                    var status = confirm('Yakin ingin menonaktifkan user?');
                    if(status){
                        $.ajax({
                            url: '<?php echo base_url(); ?>Admin/NonaktifkanUser',
                            type: 'POST',
                            data: {user_id:user_id},
                            success: function(response){
                                tampil_data_modal(user_id);
                            }
                        })
                    }
                })
                //Nonaktifkan User dengan konfirmasi
                $("#BodyDetailModel").on('click','.btn_aktif_user',function(){
                    var user_id = $(this).attr('data-id');
                    var status = confirm('Yakin ingin aktifkan user?');
                    if(status){
                        $.ajax({
                            url: '<?php echo base_url(); ?>Admin/AktifkanUser',
                            type: 'POST',
                            data: {user_id:user_id},
                            success: function(response){
                                tampil_data_modal(user_id);
                            }
                        })
                    }
                })
                //Nonaktifkan User dengan konfirmasi
                $("#BodyDetailModel").on('click','.btn_reset_password',function(){
                    var user_id = $(this).attr('data-id');
                    var status = confirm('Yakin ingin reset password user?');
                    if(status){
                        $.ajax({
                            url: '<?php echo base_url(); ?>Admin/ResetPassword',
                            type: 'POST',
                            data: {user_id:user_id},
                            success: function(response){
                                console.log(response)
                                alert('Harap Ditulis Password Diganti Menjadi orcaninjagoesrambo')
                                tampil_data_modal(user_id);
                            }
                        })
                    }
                })
            });
        </script>
    </body>
</html>