<?php
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="smart_farming";

$koneksi=mysqli_connect($db_host,$db_user,$db_pass,$db_name);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SFVM-LOGIN PENJUAL</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
	<body background="img/1.png">
    <div class="container">
	<div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                
         <div class="row ">
            <div class="col-lg-3 d-lg-block "></div>
                            <div class="col-lg-6">   
                  <div class="p-5">

									<div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">SFVM</h1>
                                    </div>
			<div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">REGISTER PENJUAL</h1>
           </div>
			
			</div>
			<div class="panel-body">
				<form method="post" class="form-horizontal">
					<div class="form-group">
						<label class="control-label col-md-4">Tanggal</label>
						<div class="">
							<input type="text" class="form-control" name="Tanggal" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">ID Penjual</label>
						<div class="">
							<input type="text" class="form-control" name="ID_Penjual" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">Nama</label>
						<div class="">
							<input type="text" class="form-control" name="Nama_Penjual" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">Nomor Handphone</label>
						<div class="">
							<input type="text" class="form-control" name="No_Handphone_Penjual" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">Username</label>
						<div class="">
							<input type="text" class="form-control" name="Username_Penjual" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">Password</label>
						<div class="">
							<input type="password" class="form-control" name="Password_Penjual" required>
						</div>
					</div>

					<div class="form-group">
                        <label> ID Kota </label>
                        <select class="form-control" name="ID_Kota_Penjual" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM kota ");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Kota'] ?>" > <?php echo $pecah['ID_Kota'] ?>--<?php echo $pecah['Nama_Kota'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

					<div class="form-group">
						<label class="control-label col-md-4">Alamat</label>
						<div class="">
							<input type="text" class="form-control" name="Alamat_Penjual" required>
						</div>
					</div>
					<div class="form-group">
                        <label>ID Bank </label>
                        <select class="form-control" name="ID_Bank" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM bank");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Bank'] ?>" > <?php echo $pecah['ID_Bank'] ?>--<?php echo $pecah['Nama_Bank'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
					<div class="form-group">
						<label class="control-label col-md-4">Nomor Rekening</label>
						<div class="">
							<input type="text" class="form-control" name="No_Rekening_Penjual" required>
						</div>
					</div>
					<div class="text-center">
						
							<button class="btn btn-primary" name="register">Register</button>
					
					</div>
					
				</form>
				           <?php if (isset($_POST["register"]))
                {
                    
                    $Username_Penjual=$_POST["Username_Penjual"];
                    $Password_Penjual=$_POST["Password_Penjual"];
                    $Tanggal=$_POST["Tanggal"];
                    $ID_Penjual=$_POST["ID_Penjual"];
                    $Nama_Penjual=$_POST["Nama_Penjual"];
                    $No_Handphone_Penjual=$_POST["No_Handphone_Penjual"];
                    $ID_Kota_Penjual=$_POST["ID_Kota_Penjual"];
                    $Alamat_Penjual=$_POST["Alamat_Penjual"];
                    $ID_Bank=$_POST["ID_Bank"];
                    $No_Rekening_Penjual=$_POST["No_Rekening_Penjual"];
                    $ambil=$koneksi->query("SELECT *FROM penjual WHERE Username_Penjual='$Username_Penjual'");
                    $yangcocok=$ambil->num_rows;
                    if($yangcocok==1)
                    {
                        echo"<script>alert('PROSES REGISTRASI GAGAL. Username sudah digunakan.');</script>";
                        echo "<script>location='register.php';</script>";
                    }
                    else
                    {
                        $koneksi->query("INSERT INTO penjual (Username_Penjual,Password_Penjual,Nama_Penjual,Tanggal,ID_Penjual,No_Handphone_Penjual,ID_Kota_Penjual,Alamat_Penjual,ID_Bank,No_Rekening_Penjual)
                        VALUES('$Username_Penjual','$Password_Penjual','$Nama_Penjual','$Tanggal','$ID_Penjual','$No_Handphone_Penjual','$ID_Kota_Penjual','$Alamat_Penjual','$ID_Bank','$No_Rekening_Penjual')");
                        echo"<script>alert('PROSES REGISTRASI SUKSES. Silahkan login.');</script>";
                        echo "<script>location='loginpenjual.php';</script>";
                    }
                
                }
                ?>
				
			<div>
							
</section>
</body>
</html>