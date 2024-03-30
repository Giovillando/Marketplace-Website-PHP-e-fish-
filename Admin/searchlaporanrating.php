<?php 
$semuadata=array();

if(isset($_POST["lihat"]))
{

    $status=$_POST["status"];
    
    $ambil=$koneksi->query("SELECT *, count(Bintang) AS jumlah_rating FROM faktur_rinci JOIN penjual on faktur_rinci.ID_Penjual=penjual.ID_Penjual
          JOIN faktur_beli on faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli
          Join pembeli on faktur_beli.ID_Pembeli=pembeli.ID_Pembeli 
                            WHERE Bintang='$status'   ");
    while($pecah = $ambil->fetch_assoc())
    {
        $semuadata[]=$pecah;
    }
}



?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           <center> <h5 class="m-0 font-weight-bold text-dark">LAPORAN RATING</h5></center>
                        </div>
                        </ol>
                        <form method="post" >
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
            <button class="btn btn-primary" name="lihat">Lihat</button>
        </div>
    </div>
</form>
<br>

<div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50" style="background-color:olivedrab;">
                                    <thead>
        <tr>
            <th> No. </th>
            <th> Nama Penjual </th>
            <th> Nama Pembeli </th>
            
            <th> Rating </th>
            <th> Ulasan </th>
      <th> Jumlah </th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1;?>
        
    <?php foreach ($semuadata as $key =>$value):?>
        <tr>
            <tr>
            <td><?php echo $nomor; ?></td>
            <td> <?php echo $value['Nama_Penjual']; ?></td>
            <td> <?php echo $value['Nama_Pembeli']; ?></td>
            
            
            <td><?php echo $value['Bintang']; ?></td>
            <td><?php echo $value['Penilaian']; ?></td>
      <td><?php echo $value['jumlah_rating']; ?></td>
        </tr>
        <?php $nomor++; ?>
        
    <?php endforeach ?>
    </tbody>

  
</table>
<span><button type="button" class="btn btn-success btn-rounded btn-fw" 
                     onclick="location.href='index.php?halaman=laporanrating'" data-toggle="tooltip" data-placement="top" title="Kembali">
                    Kembali
                    </button>
                    <button  onclick="window.print()"  class="btn btn-success"><i class="fa fa-print"></i> Cetak</button>
                    </span>
                            </div>
                        </div>
                    </div>