<?php
include 'koneksi.php';
$ID_Kota="";
$Kode_Jenis_Barang="";
$Kode_Kelompok_Barang="";
$strq="";
$strw="";
$jmlh=0;

if (isset($_POST['ID_Kota']))
{
    $ID_Kota=$_POST['ID_Kota'];
    $strc[]="penjual.kota='$ID_Kota'";
    $jmlh++;
}
if (isset($_POST['Kode_Kelompok_Barang']))
{
    $Kode_Kelompok_Barang=$_POST['Kode_Kelompok_Barang'];
    $strc[]="barang.Kode_Kelompok_Barang='$Kode_Kelompok_Barang'";
    $jmlh++;
} 
if (isset($_POST['Kode_Jenis_Barang']))
{
    $Kode_Jenis_Barang=$_POST['Kode_Jenis_Barang'];
    $strc[]="kelompok_barang.Kode_Jenis_Barang='$Kode_Jenis_Barang'";
    $jmlh++;
}  
$i=1;
if($jmlh>0)
{
    $strw="WHERE ";
    foreach ($strc as $strs)
    {
        $strw .=$strs;
        if($i<$jmlh)
        {
            $strw .=" AND ";
            $i++;
        }
    }
}
$query="SELECT Nama_Jenis_Barang, count(barang.ID_Penjual) 
AS jumlah FROM barang JOIN kelompok_barang ON barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang JOIN penjual ON barang.ID_Penjual=penjual.ID_Penjual
JOIN jenis_barang ON kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang $strw GROUP BY kelompok_barang.Kode_Jenis_Barang";
$query1="SELECT Nama_Kelompok_Barang, count(barang.ID_Penjual) 
AS jumlah FROM barang JOIN kelompok_barang ON barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang JOIN penjual ON barang.ID_Penjual=penjual.ID_Penjual
JOIN jenis_barang ON kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang $strw GROUP BY kelompok_barang.Kode_Jenis_Barang";
$result=mysqli_query($koneksi, $query);
$resnum=mysqli_num_rows($result);  
$result1=mysqli_query($koneksi, $query1);
$resnum1=mysqli_num_rows($result1);                 
$pecah2=$koneksi->query("SELECT * From kota");                                 
?>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/table/css'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="table/css/style.css">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <center> <h5 class="m-0 font-weight-bold text-dark">LAPORAN DATA PENJUAL BERDASARKAN JUMLAH PENJUAL </h5></center>
    </div>
    </ol>
</div>
<form action="index.php?halaman=laporan_data_penjual_jumlah" method="post" class="form">
    <input type="radio" name="rekap1" value="kelompok"/> Kelompok Barang
    <input type="radio" name="rekap2" value="jenis"/> Jenis Barang
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label>Kota :</label>
                <select class="form-control" name="ID_Kota">
                    <option selected disabled>-- PILIH KOTA -- </option>
                    <?php while($row = mysqli_fetch_assoc($pecah2)) { ?>
                        <option value="<?php echo $row['ID_Kota']; ?>"> <?php echo $row['Nama_Kota']; $kota=$row['Nama_Kota']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <br/>
            <input type="submit" class="btn btn-primary mb-4" name="submit" value="Search">
        </div>
    </div>
</form>
<h2>
  <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50"style="background-color:OliveDrab;">
                                    <thead>
                <?php
                 if (isset ( $_POST['submit']) and isset($_POST['rekap1']))
                 { ?>
                    <thead>
                <tr>
                    <th><p style="text-align: center ; color:#fffff">No</th>
                    <th><p style="text-align: center ; color:#fffff">Kelompok</th>
                    <th><p style="text-align: center ; color:#fffff">Jumlah Penjual</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php $nomor=1;
                     $total=0;
                    while($db1=$result1->fetch_assoc()){ ?>
                        <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $db1['Nama_Kelompok_Barang'];?></td>
                        <td><?php echo $db1['jumlah'];?></td>
                        </tr>
                        </tr>
                
                    <?php }  ?>
                 <?php }
                 else if (isset ( $_POST['submit']) and isset($_POST['rekap2']))
                 { ?>
                    <thead class="thead-primary">
                <tr>
                    <th><p style="text-align: center ; color:#fffff">No</th>
                    <th><p style="text-align: center ; color:#fffff">Jenis</th>
                    <th><p style="text-align: center ; color:#fffff">Jumlah Penjual</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php $nomor=1;
                     $total=0;
                    while($db=$result->fetch_assoc()){ ?>
                        <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $db['Nama_Jenis_Barang'];?></td>
                        <td><?php echo $db['jumlah'];?></td>
                        </tr>
                        </tr>
                
                    <?php }  ?>
                 <?php }

                 else
                 { ?>
                <thead >
                <tr>
                  <th scope="col"><p style="text-align: center ; color:#fffff">KOTA</p></th>
                  <th scope="col"><p style="text-align: center ; color:#fffff">Jumlah</p> </th>                
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php
                    $i=0;
                $query1 = mysqli_query($koneksi,"SELECT * FROM kota ");
                $persen= mysqli_num_rows ($query1);
                $sql = "SELECT * FROM kota";
                $query = mysqli_query($koneksi, $sql);
                
                while($data = mysqli_fetch_array($query)){ 
                  echo" <td> $data[Nama_Kota] </td>";
                  $total=0;
                  $kp = $data["ID_Kota"];
                  $sql2 = "SELECT * FROM penjual";
                  $query2 = mysqli_query($koneksi, $sql2);
                  $data2=mysqli_fetch_array($query2);
                      $st=$data2["ID_Kota"];
                    $n = mysqli_query ($koneksi, "SELECT * FROM penjual where ID_Kota='$kp' "); 
                    $jn = mysqli_num_rows ($n);  
                    echo" <td> $jn </td>";
                    $total=$total+$jn;
                echo "</tr>";
                 }
                 }
                ?>
            </tr></tbody></table></div>  
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>