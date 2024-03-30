<?php
include 'koneksi.php';
?> 
<?php
include ('koneksi.php');
$Kode_Jenis_Barang="";
$Kode_Kelompok_Barang="";
$strq="";
$strw="";
$jmlh=0;


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
$query="SELECT * FROM barang JOIN kelompok_barang ON barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang JOIN penjual ON barang.ID_Penjual=penjual.ID_Penjual JOIN kota ON penjual.ID_Kota_Penjual=kota.ID_Kota JOIN jenis_barang ON kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang 
$strw ";
$result=mysqli_query($koneksi,$query);
$resnum=mysqli_num_rows($result);                     
$pecah3=$koneksi->query("SELECT * From kelompok_barang");
$pecah2=$koneksi->query("SELECT * From jenis_barang"); 
?>

      <!-- Content -->
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           <center> <h5 class="m-0 font-weight-bold text-dark">LAPORAN DATA PENJUALAN BERDASARKAN KELOMPOK DAN JENIS BARANG</h5></center>
                        </div>
                        </ol>

    <form  method="POST">
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
        <label>  Kelompok Barang  </label>
                <div class="products-sort-by mt-2 mt-lg-0" width="15">
                      <select name="Kode_Kelompok_Barang" class="form-control">
                        <option selected disabled>-- KELOMPOK BARANG-- </option>
                             <?php while($row = mysqli_fetch_assoc($pecah3)) { ?>
                                <option value="<?php echo $row['Kode_Kelompok_Barang']; ?>"> <?php echo $row['Nama_Kelompok_Barang']; ?></option>
                             <?php } ?>
                        </select>
                      </div></div></div>
              

        <div class="col-md-3">
        <div class="form-group">
        <label>  Jenis Barang  </label>
                <div class="products-sort-by mt-2 mt-lg-0" width="15">
                      <select name="Kode_Jenis_Barang" class="form-control">
                        <option selected disabled>-- JENIS BARANG-- </option>
                             <?php while($row = mysqli_fetch_assoc($pecah2)) { ?>
                                <option value="<?php echo $row['Kode_Jenis_Barang']; ?>"> <?php echo $row['Nama_Jenis_Barang']; ?></option>
                             <?php } ?>
                        </select>
                      </div>
                  </div></div>

            <div class="col-md-2">
                <br/>
                <input type="submit" class="btn btn-primary mb-4" name="submit" value="Search">
           </div>
      </div>
    <br/><br/>
  </div>
</form>
</div>

<div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50" style="background-color:olivedrab;">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                             <th>Nama Penjual</th>
                                             <th>Jenis Barang</th>
                                             <th>Kelompok Barang</th>
                                             <th>Nama Kota</th>
                                        </tr>
                                <tbody>
                               <?php
                                 $nomor=1;
                                 while($db=$result->fetch_assoc()){
                                ?>

                                               <tr>
                                                   <td><?php echo $nomor++; ?></td>
                                                   <td><?php echo $db['Nama_Penjual'];?></td>
                                                   <td><?php echo $db['Nama_Jenis_Barang'];?></td>
                                                   <td><?php echo $db['Nama_Kelompok_Barang'];?></td>
                                                   <td><?php echo $db['Nama_Kota'];?></td>
                                          
                                            </tr>
                                        <?php } ?> 
                                        </tbody>
                                        <tfoot>
              <tr>
                <th colspan="4">Total</th>
                <th><?php echo number_format($nomor-1)?></th>
              </tr>
            </tfoot>

                                    </thead>
                                </table>