<?php
if(isset($_POST['cari']))
{
  $_SESSION['session_pencarian'] = $_POST["keyword"];
  $keyword=$_SESSION['session_pencarian'];
}
else
{
  $keyword=$_SESSION['session_pencarian'];
}
$query= mysqli_query ($koneksi,"SELECT * FROM penjual
where Nama_Penjual LIKE '%$keyword%'");
?>

<?php
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="smart_farming";

$koneksi=mysqli_connect($db_host,$db_user,$db_pass,$db_name);


  $semuadata=array();
  $tgl_mulai = "-";
  $tgl_selesai = "-";

if (isset($_POST["kirim"])) 
  {
    $tgl_mulai = $_POST["tglm"];
    $tgl_selesai = $_POST["tgls"];
    $jenis=$_POST['jenis'];
    $kelompok=$_POST['kelompok'];
    $penjual=$_POST['penjual'];
    $kota=$_POST['kota'];
    $ambil=$koneksi->query("SELECT * FROM transaksi LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
    LEFT JOIN faktur_rinci ON transaksi.Kode_Faktur_Rinci=faktur_rinci.Kode_Faktur_Rinci
    JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
    JOIN jenis_barang On kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang
    JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
    JOIN kota on penjual.ID_Kota=kota.ID_KotaINNER 
    
    WHERE Nama_Jenis_Barang=$jenis AND Nama_Kelompok_Barang=$kelompok AND tanggal BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");
    
    while($pecah = $ambil->fetch_assoc())
    {
      $semuadata[]=$pecah;
    }
    //echo "<pre>";
     print_r($semuadata);
    //echo "</pre>";
  }
?>

<div class="container-fluid px-4">
                        <h1 class="mt-4">LAPORAN PRODUK TERLARIS</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">LAPORAN PRODUK TERLARIS</li>
                        </ol>
</p> 

  <table table class="table table-bordered border-dark" >
    <thead class="bg-primary">
      <tr>
      <th>No.</th>
      <th>Nama Barang</th>
      <th>Jenis Barang</th>
      <th>Kelompok Barang</th>
      <th>Penjual</th>
      <th>Kota</th>
      <th>Harga </th>
      <th>Jumlah Terjual</th>
      <th>Total Harga Produk</th>
    </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      
      <?php $ambil= mysqli_query ($koneksi,"SELECT *, sum(QTY_Barang) AS QTY FROM transaksi 
    LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
    LEFT JOIN faktur_rinci ON transaksi.Kode_Faktur_Rinci=faktur_rinci.Kode_Faktur_Rinci
    JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
    JOIN jenis_barang On kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang
    JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
    JOIN kota on penjual.ID_Kota=kota.ID_Kota
    WHERE Nama_Penjual LIKE '%$keyword%'GROUP BY penjual.ID_Penjual order by QTY desc limit 10");?>
      <?php while($row=mysqli_fetch_array($ambil)){?>
      
      <tr>
        <td><?php echo $nomor; ?> </td>
        <td><?php echo $row['Nama_Barang']; ?> </td>
        <td><?php echo $row['Nama_Jenis_Barang']; ?> </td>
        <td><?php echo $row['Nama_Kelompok_Barang']; ?> </td>
        <td><?php echo $row['Nama_Penjual']; ?> </td>
        <td><?php echo $row['Nama_Kota']; ?> </td>
        <td>Rp. <?php echo number_format ($row['Harga_Barang']); ?></td>
        <td><?php echo $row['QTY']; ?></td>
        <td>Rp. <?php echo number_format($row['Harga_Barang']*$row['QTY']); ?> </td>
      </tr>
      <?php $total+=($row['Harga_Barang']*$row['QTY']);?>
      <?php $nomor++ ?>
      <?php } ?>
    </tbody>
  <tfoot>
    <tr>
      <th colspan="8"><center> Total </th>
      <th>Rp.<?php echo number_format( $total)?>
    </tr>
    </tfoot>
  </table>



    <table>
      <tr>
                <td colspan="8" align="center"> 
                <?php
                  //jika pencarian data tidak ditemukan
                  if(mysqli_num_rows($ambil)==0)
                  {
                    echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
                  }
              ?>
                </td>
            </tr> 
        </table>


        <button  onclick="window.print()"  class="btn btn-success"><i class="fa fa-print"></i> Cetak</button>
        <span><button type="button" class="btn btn-success btn-rounded btn-fw" 
           onclick="location.href='index.php?halaman=laporanbarang'" data-toggle="tooltip" data-placement="top" title="Kembali">
          Kembal
          </button>
          </span>

  
  </div>
    </div>
