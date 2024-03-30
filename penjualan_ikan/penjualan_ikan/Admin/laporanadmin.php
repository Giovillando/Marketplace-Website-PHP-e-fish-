<?php
include ('koneksi.php');

if(isset($_POST['cari']))
{
    $_SESSION['session_pencarian']=$_POST["keyword"];
    $keyword=$_SESSION['session_pencarian'];
}
else
{
    $keyword=$_SESSION['session_pencarian'];
}

$query=mysqli_query($koneksi, "SELECT * FROM faktur_beli WHERE ID_Faktur_Beli LIKE '%$keyword%'")
?>


<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Faktur Beli</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_fakturbeli">
                                    <div class="col-md-3">
                                    <table border="0">
                                    <tr>
                                        <td><div class="form-group">
                                            <input type="text" class="form-control" name="keyword" placeholder="Masukkan Pencarian" autofocus autocomplete="off"></input>
                                        <td><button class="btn btn-primary" name="cari"> Search For ... </button>
                                        </div>
                                    </tr>
                                    </table>
                                    </div>
                                </form>

<br>
            <!-- form filter data berdasarkan range tanggal  -->
           <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_fakturbeli">
                <div class="card-header py-3">
                    <div class="col-auto">
                        <label class="m-0 font-weight-bold text-dark">Periode</label>
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" name="dari" required>
                    </div>
                    <div class="col-md-3">
                        -
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" name="ke" required>
                    </div>
                    <br>
                    <div class="col-md-3">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
<br>



                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50"style="background-color:olivedrab;">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                          <th>ID Faktur Beli</th>
                                          <th>ID Penjual</th>
                                          <th>ID Jasa Pembayaran</th>
                                          <th>Tanggal</th>
                                          <th>Kode Diskon</th>
                                          <th>ID Pembeli</th>
                                          <th>Keterangan Status Order</th>
                                          <th>Keterangan Status Pembayaran</th>
                                          <th>Total Barang</th>
                                          <th>QTY</th>
                                          <th>Total Bayar</th>
                                        </tr>
                                <tbody>

                                <?php $No=1; ?>
                                <?php 
                            //jika tanggal dari dan tanggal ke ada maka

                            if(isset($_POST['dari']) && isset($_POST['ke'])){
                                // tampilkan data yang sesuai dengan range tanggal yang dicari 
                                $ambildata = mysqli_query($koneksi, "SELECT * FROM faktur_beli  JOIN penjual ON faktur_beli.ID_Penjual =penjual.ID_Penjual JOIN jasa_pembayaran ON faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran JOIN diskon ON faktur_beli.Kode_Diskon=diskon.Kode_Diskon JOIN pembeli ON faktur_beli.ID_Pembeli =pembeli.ID_Pembeli JOIN status_order ON faktur_beli.ID_Status_Order=status_order.ID_Status_Order JOIN status_pembayaran ON faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran WHERE Tanggal_Faktur_Beli BETWEEN '".$_POST['dari']."' and '".$_POST['ke']."'");
                            }
                            else
                            {
                                //jika tidak ada tanggal dari dan tanggal ke maka tampilkan seluruh ambildata
                                $ambildata = mysqli_query($koneksi, "SELECT * FROM faktur_beli  JOIN penjual ON faktur_beli.ID_Penjual =penjual.ID_Penjual JOIN jasa_pembayaran ON faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran JOIN diskon ON faktur_beli.Kode_Diskon=diskon.Kode_Diskon JOIN pembeli ON faktur_beli.ID_Pembeli =pembeli.ID_Pembeli JOIN status_order ON faktur_beli.ID_Status_Order=status_order.ID_Status_Order JOIN status_pembayaran ON faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran");   
                            }
                            // $no digunakan sebagai penomoran 
                            $No = 1;
                            // while digunakan sebagai perulangan ambildata 
                            while($pecah = mysqli_fetch_array($ambildata)){
                        ?>

                                    <?php $ambildata=$koneksi->query("SELECT * FROM faktur_beli WHERE 
                                ID_Faktur_Beli LIKE '%$keyword%' OR
                                ID_Penjual LIKE '%$keyword%' OR
                                ID_Jasa_Pembayaran LIKE '%$keyword%' OR
                                Tanggal_Faktur_Beli LIKE '%$keyword%' OR
                                ID_Pembeli LIKE '%$keyword%' OR
                                ID_Status_Order LIKE '%$keyword%' OR
                                ID_Status_Pembayaran LIKE '%$keyword%' OR
                                Total_Barang LIKE '%$keyword%' OR
                                QTY LIKE '%$keyword%' OR
                                Total_Bayar LIKE '%$keyword%'");?>
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $pecah['ID_Faktur_Beli'];?></td>
                                                   <td><?php echo $pecah['ID_Penjual'];?></td>
                                                    <td><?php echo $pecah['ID_Jasa_Pembayaran'];?></td>
                                                     <td><?php echo $pecah['Tanggal_Faktur_Beli'];?></td>
                                                      <td><?php echo $pecah['Kode_Diskon'];?></td>
                                                      <td><?php echo $pecah['ID_Pembeli'];?></td>
                                                      <td><?php echo $pecah['ID_Status_Order'];?></td>
                                                      <td><?php echo $pecah['ID_Status_Pembayaran'];?></td>
                                                      <td><?php echo $pecah['Total_Barang'];?></td>
                                                      <td><?php echo $pecah['QTY'];?></td>
                                                      <td><?php echo $pecah['Total_Bayar'];?></td>
                                                    
                                                    <td>  <a href ="del_fakturbeli.php?ID_Faktur_Beli=<?php echo $pecah['ID_Faktur_Beli']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="edit_fakturbeli.php?halaman=edit_fakturbeli&ID_Faktur_Beli=<?php echo $pecah['ID_Faktur_Beli']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                    }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambah_fakturbeli" class = "btn btn-primary"> Tambah Data </a>
                            </div><?php
include ('koneksi.php');

if(isset($_POST['cari']))
{
    $_SESSION['session_pencarian']=$_POST["keyword"];
    $keyword=$_SESSION['session_pencarian'];
}
else
{
    $keyword=$_SESSION['session_pencarian'];
}

$query=mysqli_query($koneksi, "SELECT * FROM faktur_beli WHERE ID_Faktur_Beli LIKE '%$keyword%'")
?>


<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Faktur Beli</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_fakturbeli">
                                    <div class="col-md-3">
                                    <table border="0">
                                    <tr>
                                        <td><div class="form-group">
                                            <input type="text" class="form-control" name="keyword" placeholder="Masukkan Pencarian" autofocus autocomplete="off"></input>
                                        <td><button class="btn btn-primary" name="cari"> Search For ... </button>
                                        </div>
                                    </tr>
                                    </table>
                                    </div>
                                </form>

<br>
            <!-- form filter data berdasarkan range tanggal  -->
           <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_fakturbeli">
                <div class="card-header py-3">
                    <div class="col-auto">
                        <label class="m-0 font-weight-bold text-dark">Periode</label>
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" name="dari" required>
                    </div>
                    <div class="col-md-3">
                        -
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" name="ke" required>
                    </div>
                    <br>
                    <div class="col-md-3">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
<br>



                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50"style="background-color:olivedrab;">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                          <th>ID Faktur Beli</th>
                                          <th>ID Penjual</th>
                                          <th>ID Jasa Pembayaran</th>
                                          <th>Tanggal</th>
                                          <th>Kode Diskon</th>
                                          <th>ID Pembeli</th>
                                          <th>Keterangan Status Order</th>
                                          <th>Keterangan Status Pembayaran</th>
                                          <th>Total Barang</th>
                                          <th>QTY</th>
                                          <th>Total Bayar</th>
                                        </tr>
                                <tbody>

                                <?php $No=1; ?>
                                <?php 
                            //jika tanggal dari dan tanggal ke ada maka

                            if(isset($_POST['dari']) && isset($_POST['ke'])){
                                // tampilkan data yang sesuai dengan range tanggal yang dicari 
                                $ambildata = mysqli_query($koneksi, "SELECT * FROM faktur_beli  JOIN penjual ON faktur_beli.ID_Penjual =penjual.ID_Penjual JOIN jasa_pembayaran ON faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran JOIN diskon ON faktur_beli.Kode_Diskon=diskon.Kode_Diskon JOIN pembeli ON faktur_beli.ID_Pembeli =pembeli.ID_Pembeli JOIN status_order ON faktur_beli.ID_Status_Order=status_order.ID_Status_Order JOIN status_pembayaran ON faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran WHERE Tanggal_Faktur_Beli BETWEEN '".$_POST['dari']."' and '".$_POST['ke']."'");
                            }
                            else
                            {
                                //jika tidak ada tanggal dari dan tanggal ke maka tampilkan seluruh ambildata
                                $ambildata = mysqli_query($koneksi, "SELECT * FROM faktur_beli  JOIN penjual ON faktur_beli.ID_Penjual =penjual.ID_Penjual JOIN jasa_pembayaran ON faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran JOIN diskon ON faktur_beli.Kode_Diskon=diskon.Kode_Diskon JOIN pembeli ON faktur_beli.ID_Pembeli =pembeli.ID_Pembeli JOIN status_order ON faktur_beli.ID_Status_Order=status_order.ID_Status_Order JOIN status_pembayaran ON faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran");   
                            }
                            // $no digunakan sebagai penomoran 
                            $No = 1;
                            // while digunakan sebagai perulangan ambildata 
                            while($pecah = mysqli_fetch_array($ambildata)){
                        ?>

                                    <?php $ambildata=$koneksi->query("SELECT * FROM faktur_beli WHERE 
                                ID_Faktur_Beli LIKE '%$keyword%' OR
                                ID_Penjual LIKE '%$keyword%' OR
                                ID_Jasa_Pembayaran LIKE '%$keyword%' OR
                                Tanggal_Faktur_Beli LIKE '%$keyword%' OR
                                ID_Pembeli LIKE '%$keyword%' OR
                                ID_Status_Order LIKE '%$keyword%' OR
                                ID_Status_Pembayaran LIKE '%$keyword%' OR
                                Total_Barang LIKE '%$keyword%' OR
                                QTY LIKE '%$keyword%' OR
                                Total_Bayar LIKE '%$keyword%'");?>
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $pecah['ID_Faktur_Beli'];?></td>
                                                   <td><?php echo $pecah['ID_Penjual'];?></td>
                                                    <td><?php echo $pecah['ID_Jasa_Pembayaran'];?></td>
                                                     <td><?php echo $pecah['Tanggal_Faktur_Beli'];?></td>
                                                      <td><?php echo $pecah['Kode_Diskon'];?></td>
                                                      <td><?php echo $pecah['ID_Pembeli'];?></td>
                                                      <td><?php echo $pecah['ID_Status_Order'];?></td>
                                                      <td><?php echo $pecah['ID_Status_Pembayaran'];?></td>
                                                      <td><?php echo $pecah['Total_Barang'];?></td>
                                                      <td><?php echo $pecah['QTY'];?></td>
                                                      <td><?php echo $pecah['Total_Bayar'];?></td>
                                                    
                                                    <td>  <a href ="del_fakturbeli.php?ID_Faktur_Beli=<?php echo $pecah['ID_Faktur_Beli']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="edit_fakturbeli.php?halaman=edit_fakturbeli&ID_Faktur_Beli=<?php echo $pecah['ID_Faktur_Beli']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                    }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambah_fakturbeli" class = "btn btn-primary"> Tambah Data </a>
                            </div><?php
include ('koneksi.php');

if(isset($_POST['cari']))
{
    $_SESSION['session_pencarian']=$_POST["keyword"];
    $keyword=$_SESSION['session_pencarian'];
}
else
{
    $keyword=$_SESSION['session_pencarian'];
}

$query=mysqli_query($koneksi, "SELECT * FROM faktur_beli WHERE ID_Faktur_Beli LIKE '%$keyword%'")
?>


<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Faktur Beli</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_fakturbeli">
                                    <div class="col-md-3">
                                    <table border="0">
                                    <tr>
                                        <td><div class="form-group">
                                            <input type="text" class="form-control" name="keyword" placeholder="Masukkan Pencarian" autofocus autocomplete="off"></input>
                                        <td><button class="btn btn-primary" name="cari"> Search For ... </button>
                                        </div>
                                    </tr>
                                    </table>
                                    </div>
                                </form>

<br>
            <!-- form filter data berdasarkan range tanggal  -->
           <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_fakturbeli">
                <div class="card-header py-3">
                    <div class="col-auto">
                        <label class="m-0 font-weight-bold text-dark">Periode</label>
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" name="dari" required>
                    </div>
                    <div class="col-md-3">
                        -
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" name="ke" required>
                    </div>
                    <br>
                    <div class="col-md-3">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
<br>



                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50"style="background-color:olivedrab;">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                          <th>ID Faktur Beli</th>
                                          <th>ID Penjual</th>
                                          <th>ID Jasa Pembayaran</th>
                                          <th>Tanggal</th>
                                          <th>Kode Diskon</th>
                                          <th>ID Pembeli</th>
                                          <th>Keterangan Status Order</th>
                                          <th>Keterangan Status Pembayaran</th>
                                          <th>Total Barang</th>
                                          <th>QTY</th>
                                          <th>Total Bayar</th>
                                        </tr>
                                <tbody>

                                <?php $No=1; ?>
                                <?php 
                            //jika tanggal dari dan tanggal ke ada maka

                            if(isset($_POST['dari']) && isset($_POST['ke'])){
                                // tampilkan data yang sesuai dengan range tanggal yang dicari 
                                $ambildata = mysqli_query($koneksi, "SELECT * FROM faktur_beli  JOIN penjual ON faktur_beli.ID_Penjual =penjual.ID_Penjual JOIN jasa_pembayaran ON faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran JOIN diskon ON faktur_beli.Kode_Diskon=diskon.Kode_Diskon JOIN pembeli ON faktur_beli.ID_Pembeli =pembeli.ID_Pembeli JOIN status_order ON faktur_beli.ID_Status_Order=status_order.ID_Status_Order JOIN status_pembayaran ON faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran WHERE Tanggal_Faktur_Beli BETWEEN '".$_POST['dari']."' and '".$_POST['ke']."'");
                            }
                            else
                            {
                                //jika tidak ada tanggal dari dan tanggal ke maka tampilkan seluruh ambildata
                                $ambildata = mysqli_query($koneksi, "SELECT * FROM faktur_beli  JOIN penjual ON faktur_beli.ID_Penjual =penjual.ID_Penjual JOIN jasa_pembayaran ON faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran JOIN diskon ON faktur_beli.Kode_Diskon=diskon.Kode_Diskon JOIN pembeli ON faktur_beli.ID_Pembeli =pembeli.ID_Pembeli JOIN status_order ON faktur_beli.ID_Status_Order=status_order.ID_Status_Order JOIN status_pembayaran ON faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran");   
                            }
                            // $no digunakan sebagai penomoran 
                            $No = 1;
                            // while digunakan sebagai perulangan ambildata 
                            while($pecah = mysqli_fetch_array($ambildata)){
                        ?>

                                    <?php $ambildata=$koneksi->query("SELECT * FROM faktur_beli WHERE 
                                ID_Faktur_Beli LIKE '%$keyword%' OR
                                ID_Penjual LIKE '%$keyword%' OR
                                ID_Jasa_Pembayaran LIKE '%$keyword%' OR
                                Tanggal_Faktur_Beli LIKE '%$keyword%' OR
                                ID_Pembeli LIKE '%$keyword%' OR
                                ID_Status_Order LIKE '%$keyword%' OR
                                ID_Status_Pembayaran LIKE '%$keyword%' OR
                                Total_Barang LIKE '%$keyword%' OR
                                QTY LIKE '%$keyword%' OR
                                Total_Bayar LIKE '%$keyword%'");?>
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $pecah['ID_Faktur_Beli'];?></td>
                                                   <td><?php echo $pecah['ID_Penjual'];?></td>
                                                    <td><?php echo $pecah['ID_Jasa_Pembayaran'];?></td>
                                                     <td><?php echo $pecah['Tanggal_Faktur_Beli'];?></td>
                                                      <td><?php echo $pecah['Kode_Diskon'];?></td>
                                                      <td><?php echo $pecah['ID_Pembeli'];?></td>
                                                      <td><?php echo $pecah['ID_Status_Order'];?></td>
                                                      <td><?php echo $pecah['ID_Status_Pembayaran'];?></td>
                                                      <td><?php echo $pecah['Total_Barang'];?></td>
                                                      <td><?php echo $pecah['QTY'];?></td>
                                                      <td><?php echo $pecah['Total_Bayar'];?></td>
                                                    
                                                    <td>  <a href ="del_fakturbeli.php?ID_Faktur_Beli=<?php echo $pecah['ID_Faktur_Beli']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="edit_fakturbeli.php?halaman=edit_fakturbeli&ID_Faktur_Beli=<?php echo $pecah['ID_Faktur_Beli']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                    }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambah_fakturbeli" class = "btn btn-primary"> Tambah Data </a>
                            </div>