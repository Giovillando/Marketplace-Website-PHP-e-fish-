<?php
session_start();
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="smart_farming";

$koneksi=mysqli_connect($db_host,$db_user, $db_pass,$db_name);

if($koneksi&&$db_name)
{}
else 
{echo "Gagal Koneksi";}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>SMART FARMING VILLAGE MAREKT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/foto.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/foto.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <?php include 'header.php'; ?>

<section class="container py-1">
	    <div class="row text-center pt-5">
            <div class="col-lg-4 m-auto">
                <h1 class="h1"><strong>Registrasi</h1></strong>
				<br> <br>
            </div>
        </div>
		
		
		
		<?php 
			$query=mysqli_query($koneksi, "SELECT max(ID_Pembeli) as kodeTerbesar FROM pembeli");
			$data=mysqli_fetch_array($query);
				
			$ID_Pembeli=$data['kodeTerbesar'];
			$urutan=(int) substr($ID_Pembeli,2,3);
			$urutan++;
			$huruf="P";
			$ID_Pembeli = $huruf . sprintf("%03s", $urutan);
		?>
			
			
<form method = "post" enctype ="multipart/form-data">
	<div class="form-group">
		<label> ID Pengguna </label>
		<input type="text" class="form-control" name="ID_Pembeli">
	</div>
	<div class="form-group">
		<label> Nama Pengguna </label>
		<input type="text" class="form-control" name="Nama_Pembeli">
	</div>
	<div class="form-group">
		<label> Alamat </label>
		<input type="text" class="form-control" name="Alamat_Pembeli">
	</div>
	<div class="form-group">
		<label> No Telpon </label>
		<input type="text" class="form-control" name="No_Handphone_Pembeli">
	</div>
	<div class="form-group">
		<label> Username </label>
		<input type="text" class="form-control" name="Username_Pembeli">
	</div>
	<div class="form-group">
		<label> Password </label>
		<input type="password" class="form-control" name="Password_Pembeli">
	</div>
	<div class="form-group">
		<label> No Rekening </label>
		<input type="text" class="form-control" name="No_Rekening_Pembeli">
	</div>
	<div class="form-group">
                        <label> Kode Jenis Pembeli </label>
                        <select class="form-control" name="Kode_Jenis_Pembeli" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM jenis_pembeli");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['Kode_Jenis_Pembeli'] ?>" > <?php echo $pecah['Kode_Jenis_Pembeli'] ?>--<?php echo $pecah['Nama_Jenis_Pembeli'] ?></option>
                        <?php } ?>
                        </select>
    </div>
	<br>
	<center><button class="btn btn-primary" name="save"> Simpan </button></center>
	<br> <br>
</form>

<?php
if (isset($_POST['save']))
{
	$Username_Pembeli=$_POST["Username_Pembeli"];
	$ambil=$koneksi->query("SELECT * FROM pembeli WHERE Username_Pembeli='$Username_Pembeli'");
	$cocok=$ambil->num_rows;
	if($cocok==1)
	{
		echo "<script>alert('Pendaftaran GAGAL, email sudah digunakan');</script>";
		echo "<meta http-equiv='refresh' content='1;url=registrasi.php?'>";
	}
	else 
	{
		$koneksi->query("INSERT INTO pembeli (ID_Pembeli,Nama_Pembeli,Alamat_Pembeli,No_Handphone_Pembeli,Username_Pembeli,Password_Pembeli,No_Rekening_Pembeli,Kode_Jenis_Pembeli) 
				  VALUES ('$ID_Pembeli','$_POST[Nama_Pembeli]','$_POST[Alamat_Pembeli]','$_POST[No_Handphone_Pembeli]','$_POST[Username_Pembeli]','$_POST[Password_Pembeli]','$_POST[No_Rekening_Pembeli]','$_POST[Kode_Jenis_Pembeli]')");
		echo "<script>alert('Pendaftaran Berhasil, Silahkan Login');</script>";
		echo "<meta http-equiv='refresh' content='1;url=login.php?'>";	
	}
	
}
?>
</section>


    <!-- Start Footer -->
    <?php include 'footer.php'; ?>
</body>