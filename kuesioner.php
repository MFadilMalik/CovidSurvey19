<?php 
    session_start();
    error_reporting(0);
    include 'config/koneksi.php';
    for($i = 0; $i < count($_POST['q']); ++$i){
       if ($_POST['q'][$i] == 'yes') {
          ++$yes;
        }
    }   
    if ($yes <= 7) {
        $status = "Rendah";
    } elseif ($yes <= 14) {
        $status = "Sedang";
    } else {
        $status = "Tinggi";
    }
    $_SESSION['nama'] = $_POST['nama'];
    $_SESSION['status'] = $status;
   if (isset($_POST['submit'])) {
       $sql = mysqli_query($con, "INSERT INTO hasil_survey VALUES('','$_POST[nama]','$_POST[asal]','$yes', '$status')");
       if ($sql) {
           echo "<script>document.location.href='hasil.php';</script>";
       }else {
        echo "<script>alert('Data Gagal Terkirim');document.location.href='hasil.php';</script>";
       }
   }
?>
<html>
    <head>
        <title>Kuesioner</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>   
    <style type="text/css">
        .bio{
            background-color: #138496;
            padding: 5%;
        }
    </style> 
    <body>
    <center>
    <form action="" method="post">
        <div class="bio">
        <h4>ISI DATA DIRI TERLEBIH DAHULU YA!</h4>
        <tr>
            <td>Nama Lengkap</td>
            <br>
            <td><input type="text" name="nama" autocomplete="off"></td>
        </tr>
        <br><br>
        <tr>
            <td>Asal(Sekolah/Tempat Tinggal)</td>
            <br>
            <td><input type="text" name="asal" autocomplete="off"></td>
        </tr>
        </div>
        <h3>PENILAIAN RESIKO PRIBADI TERKAIT COVID-19</h3>
        <br>
        <h4 style="text-decoration: underline;">POTENSI TERTULAR DI LUAR RUMAH</h4>

        <h5>Saya pergi keluar rumah.</h5>
        <input type="radio" name="q[0]" id="q_1_yes" value="yes">
        <label for="q_1_yes">YA</label>
        <input type="radio" name="q[0]" id="q_1_no" value="no">
        <label for="q_1_no">TIDAK</label>

        <h5>Saya menggunakan transportasi umum : online, angkot, bus, taksi, kereta api.</h5>
        <input type="radio" name="q[1]" id="q_2_yes" value="yes">
        <label for="q_2_yes">YA</label>
        <input type="radio" name="q[1]" id="q_2_no" value="no">
        <label for="q_2_no">TIDAK</label>

        <h5>Saya tidak memakai masker saat berkumpul dengan orang lain</h5>
        <input type="radio" name="q[2]" id="q_3_yes" value="yes">
        <label for="q_3_yes">YA</label>
        <input type="radio" name="q[2]" id="q_3_no" value="no">
        <label for="q_3_no">TIDAK</label>

        <h5>Saya berjabat tangan dengan orang lain.</h5>
        <input type="radio" name="q[3]" id="q_4_yes" value="yes">
        <label for="q_4_yes">YA</label>
        <input type="radio" name="q[3]" id="q_4_no" value="no">
        <label for="q_4_no">TIDAK</label>

        <h5>Saya tidak membersihkan tangan dengan hand sanitizer / tissue basah sebelum pegang kemudi mobil / motor.</h5>
        <input type="radio" name="q[4]" id="q_5_yes" value="yes">
        <label for="q_5_yes">YA</label>
        <input type="radio" name="q[4]" id="q_5_no" value="no">
        <label for="q_5_no">TIDAK</label>

        <h5>Saya menyentuh benda / uang yang juga disentuh oran lain.</h5>
        <input type="radio" name="q[5]" id="q_6_yes" value="yes">
        <label for="q_6_yes">YA</label>
        <input type="radio" name="q[5]" id="q_6_no" value="no">
        <label for="q_6_no">TIDAK</label>

        <h5>Saya tidak menjaga jarak 1,5 meter dengan orang lain ketika (belanja, bekerja, belajar, ibadah).</h5>
        <input type="radio" name="q[6]" id="q_7_yes" value="yes">
        <label for="q_7_yes">YA</label>
        <input type="radio" name="q[6]" id="q_7_no" value="no">
        <label for="q_7_no">TIDAK</label>

        <h5>Saya makan diluar rumah (warung / restaurant).</h5>
        <input type="radio" name="q[7]" id="q_8_yes" value="yes">
        <label for="q_8_yes">YA</label>
        <input type="radio" name="q[7]" id="q_8_no" value="no">
        <label for="q_8_no">TIDAK</label>

        <h5>Saya tidak minum hangat & cuci tangan dengan sabun setelah tiba di tujuan.</h5>
        <input type="radio" name="q[8]" id="q_9_yes" value="yes">
        <label for="q_9_yes">YA</label>
        <input type="radio" name="q[8]" id="q_9_no" value="no">
        <label for="q_9_no">TIDAK</label>

        <h5>Saya berada di wilayah kelurahan tempat pasien tertular.</h5>
        <input type="radio" name="q[9]" id="q_10_yes" value="yes">
        <label for="q_10_yes">YA</label>
        <input type="radio" name="q[9]" id="q_10_no" value="no">
        <label for="q_10_no">TIDAK</label>

        <br><br>
        <h4 style="text-decoration: underline;">POTENSI TERTULAR DI DALAM RUMAH</h4>

        <h5>Saya tidak pasang hand sanitizer di depan pintu masuk, untuk bersihkan tangan sebelum pegang gagang (handle) pintu rumah.</h5>
        <input type="radio" name="q[10]" id="q_11_yes" value="yes">
        <label for="q_11_yes">YA</label>
        <input type="radio" name="q[10]" id="q_11_no" value="no">
        <label for="q_11_no">TIDAK</label>

        <h5>Saya tidak mencuci tangan dengan sabun setelah tiba dirumah.</h5>
        <input type="radio" name="q[11]" id="q_12_yes" value="yes">
        <label for="q_12_yes">YA</label>
        <input type="radio" name="q[11]" id="q_12_no" value="no">
        <label for="q_12_no">TIDAK</label>

        <h5>Saya tidak menyediakan : tissue basah/antiseptic, masker, sabun antiseptic bagi keluarga dirumah.</h5>
        <input type="radio" name="q[12]" id="q_13_yes" value="yes">
        <label for="q_13_yes">YA</label>
        <input type="radio" name="q[12]" id="q_13_no" value="no">
        <label for="q_13_no">TIDAK</label>

        <h5>Saya tidak segera merendam baju & celana bekas pakai luar rumah kedalam air panas/sabun.</h5>
        <input type="radio" name="q[13]" id="q_14_yes" value="yes">
        <label for="q_14_yes">YA</label>
        <input type="radio" name="q[13]" id="q_14_no" value="no">
        <label for="q_14_no">TIDAK</label>

        <h5>Saya tidak segera mandi keramas setelah saya tiba dirumah.</h5>
        <input type="radio" name="q[14]" id="q_15_yes" value="yes">
        <label for="q_15_yes">YA</label>
        <input type="radio" name="q[14]" id="q_15_no" value="no">
        <label for="q_15_no">TIDAK</label>

        <h5>Saya tidak mensosialisasikan check list penilaian resiko pribadi ini kepada keluarga dirumah.</h5>
        <input type="radio" name="q[15]" id="q_16_yes" value="yes">
        <label for="q_16_yes">YA</label>
        <input type="radio" name="q[15]" id="q_16_no" value="no">
        <label for="q_16_no">TIDAK</label>

        <br><br>
        <h4 style="text-decoration: underline;">DAYA TAHAN TUBUH (IMUNITAS)</h4>

        <h5>Saya dalam sehari tidak kena cahaya matahari minimal 15 menit.</h5>
        <input type="radio" name="q[16]" id="q_17_yes" value="yes">
        <label for="q_17_yes">YA</label>
        <input type="radio" name="q[16]" id="q_17_no" value="no">
        <label for="q_17_no">TIDAK</label>

        <h5>Saya tidak jalan kaki / berolah raga minimal 30 menit setiap hari.</h5>
        <input type="radio" name="q[17]" id="q_18_yes" value="yes">
        <label for="q_18_yes">YA</label>
        <input type="radio" name="q[17]" id="q_18_no" value="no">
        <label for="q_18_no">TIDAK</label>

        <h5>Saya jarang minum vitamin C & E, dan kurang tidur.</h5>
        <input type="radio" name="q[18]" id="q_19_yes" value="yes">
        <label for="q_19_yes">YA</label>
        <input type="radio" name="q[18]" id="q_19_no" value="no">
        <label for="q_19_no">TIDAK</label>

        <h5>Usia saya diatas 60 tahun.</h5>
        <input type="radio" name="q[19]" id="q_20_yes" value="yes">
        <label for="q_20_yes">YA</label>
        <input type="radio" name="q[19]" id="q_20_no" value="no">
        <label for="q_20_no">TIDAK</label>

        <h5>Saya mempunyai penyakit : jantung/diabetes/gangguan pernafasan kronik.</h5>
        <input type="radio" name="q[20]" id="q_21_yes" value="yes">
        <label for="q_21_yes">YA</label>
        <input type="radio" name="q[20]" id="q_21_no" value="no">
        <label for="q_21_no">TIDAK</label>

        <br><br>
        <div class="foot">
        <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Lihat Hasil">
        </div>
        </form>
        </center>
    </body>
    
</html>