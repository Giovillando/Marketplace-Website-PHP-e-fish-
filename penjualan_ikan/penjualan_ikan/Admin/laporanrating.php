<div class="container-fluid px-4">
                        <h1 class="mt-4">RATING </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">RATING</li>
                        </ol>
                        <form method="post" action ="index.php?halaman=searchlaporanrating">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
            <label> Rating </label>
                <select class="form-control" name="status">
                    <option value="">Pilih Rating</option>
                    <option value="0" >0</option>
                    <option value="1" >1 </option>
                    <option value="2" >2 </option>
                    <option value="3" >3 </option>
                    <option value="4" >4 </option>
                    <option value="5" >5 </option>
                
                </select>
            </div>
        </div>
        
        <div class="col-md-2">
            <br>
            <button class="btn btn-primary" name="cari">Cari</button>
        </div>
    </div>
</form>
 
<br>

<table class="table table-bordered border-dark "background="bgtable.PNG">
    <thead>
        <tr>
            <th> No. </th>
            <th> Rating </th>
            <th> Jumlah </th>
        </tr>
    </thead>
    <tbody>
    <?php $total=0; ?>
        <?php $nomor=1;?>
        <?php $ambil=$koneksi->query("SELECT faktur_rinci.Bintang,count(faktur_rinci.Bintang) AS Jumlah FROM faktur_rinci
			    GROUP BY faktur_rinci.Bintang order by Jumlah desc limit 5"); ?>
			<?php while($pecah=$ambil->fetch_assoc()){?>
              <tr>
				 <td><?php echo $nomor; ?></td>
                 <td><?php echo $pecah['Bintang']; ?> </td>
                 <td><?php echo $pecah['Jumlah']; ?> </td>
				
              </tr>
			  <?php $total+=($pecah['Jumlah']);?>
			  <?php $nomor++; ?>
			<?php }?>
    </tbody>
</table>