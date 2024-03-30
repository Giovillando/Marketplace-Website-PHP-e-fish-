<div class="container-fluid px-4 text-light " style="background-color:rebeccapurple;">
<i><b><h5> Berdasarkan : </h5></b></i>
                   <form method="post">
                <input type="radio" name="jenis_barang"/> JENIS BARANG 
                <input type="radio" name="kelompok_barang"/> KELOMPOK BARANG
                <input type="radio" name="barang"/> BARANG
                <button type="submit" class="btn btn-danger" name="tampil" value="lihat">Lihat
                  </form>
      <?php
    if(isset($_POST["tampil"]))
    {
      if(isset($_POST["jenis_barang"]))
      {
          echo "<script>location='index.php?halaman=laporanpenjualan1';</script>"; 
      }
      elseif(isset($_POST["kelompok_barang"]))
      {
          echo "<script>location='index.php?halaman=laporanpenjualan2';</script>"; 
      }
      elseif(isset($_POST["barang"]))
      {
          echo "<script>location='index.php?halaman=laporanpenjualan3';</script>"; 
      }
     }?>