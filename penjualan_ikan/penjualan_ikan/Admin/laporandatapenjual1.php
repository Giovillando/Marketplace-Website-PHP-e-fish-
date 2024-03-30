<?php
include 'koneksi.php';
$ID_Kota="";
$strq="";
$strw="";
$jmlh=0;
$tgl_mulai="";
$tgl_selesai="";


if (isset($_POST['tgl_mulai']))
{
    $tgl_mulai=$_POST['tgl_mulai'];
} 
if (isset($_POST['tgl_selesai']))
{
    $tgl_selesai=$_POST['tgl_selesai'];
} 
if (isset($_POST['ID_Kota']))
{
    $ID_Kota=$_POST['ID_Kota'];
    $strc[]="penjual.ID_Kota='$ID_Kota'";
    $jmlh++;
}
if (isset($_POST['keyword']))
{
    $Nama_Penjual=$_POST['keyword'];
    $strc[]="penjual.Nama_Penjual LIKE '%$Nama_Penjual%'";
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
$query="SELECT * FROM penjual inner join kota on penjual.ID_Kota=kota.ID_Kota $strw AND Tanggal BETWEEN '$tgl_mulai' AND '$tgl_selesai'";
$result=mysqli_query($koneksi,$query);
$resnum=mysqli_num_rows($result);                   
$pecah2=$koneksi->query("SELECT * From kota");                                  
?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                           <center> <h5 class="m-0 font-weight-bold text-dark">LAPORAN DATA PENJUAL BERDASARKAN TANGGAL</h5></center>
                        </div>
                        </ol>
</p> 

<form action="index.php?halaman=laporandatapenjual1" method="post" class="form">
    <br/>
    
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label>Tanggal Mulai :</label>
                <input type="date" class="form-control" name="tgl_mulai" value="<?php echo $tgl_mulai?>" required >
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Tanggal Selesai :</label>
                <input type="date" class="form-control" name="tgl_selesai" value="<?php echo $tgl_selesai?>" required >
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>Kota :</label>
                <select class="form-control" name="ID_Kota">
                    <option selected disabled>-- PILIH KOTA -- </option>
                    <?php while($row = mysqli_fetch_assoc($pecah2)) { ?>
                        <option value="<?php echo $row['ID_Kota']; ?>"> <?php echo $row['Nama_Kota']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <br/>
            <input type="submit" class="btn btn-primary mb-4" name="submit" value="Search">
        </div>
    </div>
    <br/><br/>
</form>
<div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50" style="background-color:olivedrab;">
    <thead>
            <th>Nomor</th>
            <th>Tanggal</th>
            <th>Nama Penjual</th>
            <th>Kota Penjual </th>
    </thead>
    <tbody>
        <?php
        $nomor=1;
        while($perproduk=$result->fetch_assoc()){
            ?>
            <tr>
                <th><?php echo $nomor++; ?></th>
                <th><?php echo $perproduk['Tanggal']; ?></th>
                <th><?php echo $perproduk['Nama_Penjual']; ?></th>
                <th><?php echo $perproduk['Nama_Kota']; ?></th>
            </tr>
        <?php } ?>
    </tbody>
</table>