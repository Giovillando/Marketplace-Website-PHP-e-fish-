
<div class="row">
	<div class="col-md-12">
		<h2>Laporan Penjualan Barang Terlaris</h2>
	</div>
	
	<br>
	<br>
	<hr>
	<div class="col-md-12">
		<form method="POST" class="form-inline">
			<div class="form-group">
				<input type="date" class="form-control" name="tgl1">
			</div>
			<div class="form-group">
				<label>  Sampai  </label>
				<input type="date" class="form-control" name="tgl2">
			</div>
			<div class="form-group">
				<button  name="cari" class="btn btn-primary"><i class="fa fa-play-circle-o"></i> Cari</button>
			</div>
		</form>
	</div>
</div>
</hr>

<?php
            //cari jika sudah klik tombol pencarian data
            if(isset($_POST['cari'])){
            //menangkap nilai form
            $tglm=$_POST['tglm'];
            $tgls=$_POST['tgls'];
            if(empty($tglm) || empty($tgls)){
            //jika data tanggal kosong
?>
			<script language="JavaScript">
                alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
                document.location='barangterlaris.php';
            </script>
			
            <?php
            }else{
            ?><br><i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo $_POST['tglm']?></b> s/d <b><?php echo $_POST['tgls']?></b></i>
            <?php
            $ambil= mysqli_query ($koneksi,"SELECT *, sum(Stok) AS total FROM transaksi inner join barang
										on transaksi.Kode_Barang = barang.Kode_Barang inner join faktur_beli on transaksi.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli where Tanggal_Faktur_Beli BETWEEN '$tglm' AND'$tgls'  
										GROUP BY barang.Kode_Barang order by total desc limit 5");
            }?>
        </p> 

	
<br>
			<table class="table table-bordered" >
				<thead>
					<tr>
					<th>NO.</th>
					<th>NAMA BARANG</th>
					<th>HARGA</th>
					<th>JUMLAH TERJUAL</th>
					<th>TOTAL HARGA TERJUAL</th>
				</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php while($pecah=mysqli_fetch_array($ambil)){?>
						
					<tr>
						<td><?php echo $nomor; ?> </td>
						<td><?php echo $pecah['Nama_Barang']; ?> </td>
						<td>Rp. <?php echo number_format ($pecah['Harga_Barang']); ?></td>
						<td><?php echo $pecah['QTY']; ?></td>
						<td>Rp. <?php echo number_format($pecah['Harga_Barang']*$pecah['QTY']); ?> </td>
					</tr>
					<?php $total+=($pecah['Harga_Barang']*$pecah['QTY']);?>
					<?php $nomor++ ?>
					<?php } ?>
				</tbody>
			<tfoot>
				<tr>
					<th colspan="4"> Total </th>
					<th>Rp.<?php echo number_format( $total)?>
				</tr>
				</tfoot>
			</table>
	
<tr>
                <td colspan="4" align="center"> 
                <?php
                //jika pencarian data tidak ditemukan
                if(mysqli_num_rows($ambil)==0){
                  echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
                }
                ?>
                </td>
            </tr> 
        </table>
        <?php
        }
        else{
            unset($_POST['cari']);
        }
        ?>