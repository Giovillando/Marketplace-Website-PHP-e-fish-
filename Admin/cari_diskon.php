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

$query=mysqli_query($koneksi, "SELECT * FROM diskon WHERE Kode_Diskon LIKE '%$keyword%'")
?>

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Diskon</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_diskon">
                                    <div class="col-10">
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
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50"style="background-color:OliveDrab;">
                                    <thead>
                                        <tr>
                                          <th>No</th>
                                          <th>Kode Diskon</th>
                                          <th>Tanggal Diskon</th>
                                          <th>Jenis Diskon</th>
                                          <th>Jumlah Diskon</th>
                                        </tr>
                                <tbody>
                                <?php $No=1; ?>
                                    <?php $ambildata=$koneksi->query("SELECT * FROM diskon WHERE 
                                Kode_Diskon LIKE '%$keyword%' OR
                                Jenis_Diskon LIKE '%$keyword%' OR
                                Jumlah_Diskon LIKE '%$keyword%'");?>
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                               <td><?php echo $No?></td>
                                               <td><?php echo $pecah['Kode_Diskon'];?></td>
                                               td><?php echo $pecah['Tgl_Diskon'];?></td>
                                               <td><?php echo $pecah['Jenis_Diskon'];?></td>
                                               <td><?php echo $pecah['Jumlah_Diskon'];?></td>
                                                    
                                                    <td>  <a href ="del_diskon.php?Kode_Diskon=<?php echo $pecah['Kode_Diskon']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="edit_diskon.php?halaman=edit_diskon&Kode_Diskon=<?php echo $pecah['Kode_Diskon']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="tambah_diskon.php?halaman=tambah_diskon" class = "btn btn-primary"> Tambah Data </a>
                            </div>