<?php 

	$semuadata=array();
	$tgl_mulai = "-";
	$tgl_selesai = "-";
	$status="";

	if (isset($_POST["lihat"])) 
	{
		$tgl_mulai = $_POST["tglm"];
		$tgl_selesai = $_POST["tgls"];

		
		$ambildata=$koneksi->query("SELECT * FROM faktur_beli LEFT JOIN jenis_pembayaran ON faktur_beli.Kode_Jenis_Pembayaran=jenis_pembayaran.Kode_Jenis_Pembayaran JOIN diskon ON faktur_beli.Kode_Diskon=diskon.Kode_Diskon JOIN pembeli ON faktur_beli.ID_Pembeli =pembeli.ID_Pembeli JOIN status_order ON faktur_beli.ID_Status_Order=status_order.ID_Status_Order JOIN status_pembayaran ON faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran 
		
		WHERE (Ket_Status_Pembayaran='$_POST[status_pembayaran]' AND
	  tanggal BETWEEN '$tgl_mulai' AND '$tgl_selesai') OR  (Ket_Status_Pembayaran='$_POST[status_pembayaran]' AND
	  Ket_Status_Order='$_POST[status_order]') OR (Ket_Status_Order='$_POST[status_order]' AND
	  tanggal BETWEEN '$tgl_mulai' AND '$tgl_selesai')  ");
		
		while($value = $ambildata->fetch_assoc())
		{
			$semuadata[]=$value;
		}
	}
?>


<h2> Daftar Nota </h2>
</br>

<form class="form-horizontal" role="search" method="post" action="index.php?halaman=cari_nota">
	<div class="col-md-3">
<table border="0">
<tr>
	<td><div class="form-group">
		<input type="text" class="form-control" name="keyword" placeholder="Masukkan Pencarian" autofocus autocomplete="off"></input>
	<td><button class="btn btn-primary" name="cari"> Cari </button>
	</div>
</tr>
</table>
</div>
</form>
<br>
<form method="post">
	<div class="row">
		<div class ="col-md-3">   
			<label> <center>Tanggal Mulai </center></label>
			<input type="date" class="form-control" name= "tglm">
		</div>
		<div class ="col-md-3">
			<label><center>Tanggal Selesai</center> </label>
			<input type="date" class="form-control" name= "tgls">
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label>Status Pembayaran</label>
				<select class="form-control" name="status_pembayaran">
					<option value="">Pilih status</option>
					<option value="Belum Bayar">Belum Bayar</option>
					<option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
					<option value="Lunas">Lunas</option>
					<option value="Tidak Sesuai">Tidak Sesuai</option>
				</select>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label>Status Order</label>
				<select class="form-control" name="status_pengiriman">
					<option value="">Pilih status</option>
					<option value="Belum Dikirim"       >Sudah Dioerder</option>
					<option value="Dikemas">Dibatalkan</option>
					<option value="Dikirim">Selesai</option>
					<option value="Diterima">Diterima</option>
					<option value="Mengajukan Komplain">Mengajukan Komplain</option>
				</select>
			</div>
		</div>
		
		<div class ="col-md-12"> <br>
			<center><button class="btn btn-primary" name="lihat"> Lihat Laporan </button></center>
		</div>
		
	</div>
	
</form>



</br>

<div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50"style="background-color:OliveDrab;">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                          <th>ID Faktur Beli</th>
                                          <th>Kode Jenis Pembayaran</th>
                                          <th>Tanggal</th>
                                          <th>Kode Diskon</th>
                                          <th>ID Pembeli</th>
                                          <th>ID Status Order</th>
                                          <th>ID Status Pembayaran</th>
                                          <th>Total Barang</th>
                                          <th>QTY</th>
                                          <th>Total Bayar</th>
                                        </tr>
                                <tbody>
                                         <?php $No=1; ?>
												<?php foreach ($semuadata as $key => $db): ?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['ID_Faktur_Beli'];?></td>
                                                    <td><?php echo $db['Kode_Jenis_Pembayaran'];?></td>
                                                     <td><?php echo $db['Tanggal_Faktur_Beli'];?></td>
                                                      <td><?php echo $db['Kode_Diskon'];?></td>
                                                      <td><?php echo $db['ID_Pembeli'];?></td>
                                                      <td><?php echo $db['ID_Status_Order'];?></td>
                                                      <td><?php echo $db['ID_Status_Pembayaran'];?></td>
                                                      <td><?php echo $db['Total_Barang'];?></td>
                                                      <td><?php echo $db['QTY'];?></td>
                                                      <td>Rp.<?php echo number_format( $db['Total_Barang']);?></td>
                                                    
                                                    <td>  <a href ="del_fakturbeli.php?ID_Faktur_Beli=<?php echo $db['ID_Faktur_Beli']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="edit_fakturbeli.php?halaman=edit_fakturbeli&ID_Faktur_Beli=<?php echo $db['ID_Faktur_Beli']?>" class="btn btn- btn-info">Edit</a>
                                       <?php $No++; ?>
											<?php endforeach  ?>
                                   
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambah_fakturbeli" class = "btn btn-primary"> Tambah Data </a>
                            </div>
