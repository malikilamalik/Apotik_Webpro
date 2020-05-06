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
        <div class="card">
            <div class="card-body">
                <div class="row" >
                    <div class="col-md-12"><h1><?php echo $user['username']?></h1></div>
                </div>
                <div class="row" style="padding: 10px;">
                    <div class="col-md-4">Nama Depan : <?php echo $user['nama_depan']?></div>
                    <div class="col-md-4">Nama Tengah :<?php echo $user['nama_tambahan']?></div>
                    <div class="col-md-4">Nama Belakang :<?php echo $user['nama_belakang']?></div>
                </div>
                <div class="row" style="padding: 10px;">
                    <div class="col-md-6">Nomor Telepon 1 : <?php echo $user['no_telp1']?></div>
                    <div class="col-md-6">Nomor Telepon 2 : <?php echo $user['no_telp2']?></div>
                </div>
                <div class="row" style="padding: 10px;">
                    <div class="col-md-6">Alamat : <?php echo $user['alamat']?></div>
                    <div class="col-md-6">Alamat Tambahan : <?php echo $user['alamat_tambahan']?></div>
                </div>
                <div class="row"style="padding: 10px;">
                    <div class="col-md-4">Kota : <?php echo $user['kota']?></div>
                    <div class="col-md-4">Kecamatan : <?php echo $user['kecamatan']?></div>
                    <div class="col-md-4">Kelurahan : <?php echo $user['kelurahan']?></div>
                </div>
                <div class="row"style="padding: 10px;">
                    <div class="col-md-1" ><a class="btn btn-warning" href="<?= base_url(); ?>Admin/edit_user/<?= $user['user_id'] ?>" role="button" style="pading-left:50px">EDIT</a></div>
                    <div class="col-md-1" id="btn_edit"><a class="btn btn-primary btn-edit-password" role="button" style="pading-left:50px">Ganti Password</a></div>
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
      <!-- Modal Edit-->
      <div id="editPassword" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title">Edit Password</h4>
          </div>
          <div class="modal-body">
            <form>
                <input type="hidden" name="password_lama" value='<?php echo $user['password'] ?>'></input>
                <input type="hidden" name="user_id" value='<?php echo $user['user_id'] ?>'></input>
                <div class="form-group">
                    <label for="password_lama">Password Lama</label>
                    <input type="password" name="password_lama_input" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label for="nama">Password Baru</label>
                    <input type="password_baru" name="password_baru" class="form-control"></input>
                </div>
            </form>
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-success" id="btn_update_password">Ganti</button>
          </div>
        </div>
 
      </div>
    </div>
    <script type="text/javascript">
    $("#btn_edit").on('click','.btn-edit-password',function(){
        $("#editPassword").modal('show');
    })
    
    //Meng-Update Data
    $("#btn_update_password").on('click',function(){
        var password_lama = $('input[name="password_lama"]').val();
        var user_id = $('input[name="user_id"]').val();
        var password_lama_input = $('input[name="password_lama_input"]').val();
        var password_baru = $('input[name="password_baru"]').val();
        if(password_lama_input == password_lama){
            $.ajax({
                url: '<?php echo base_url(); ?>Admin/perbaruiPassword',
                type: 'POST',
                data: {password:password_baru,user_id:user_id},
                success: function(response){
                    $("#btn_edit").modal('hide');
                    location.reload();
                }
            })
        }else{
            alert('Password Lama tidak sama');
        }
    });
    </script>
</html>