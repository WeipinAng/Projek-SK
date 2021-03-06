<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');
$idpengguna=$_SESSION['idpengguna'];
?>

<head>
    <link rel="stylesheet" href="css/tambahkuizstyle.css?v=<?php echo time(); ?>">
    <title>Penambahan Topik</title>
</head>
        <div class="space">
            <div class="header">
                <h2>Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</h2>
                <div class="logoutbutton"><a href="logout.php">Log Keluar</a></div>
            </div>
            <div class="maincontent">
                <div class="title">PENDAFTARAN TOPIK BAHARU</div>
                <div class="balik"><a href="koleksikuizguru.php">Balik</a></div>
                <div class="separator"></div>
                <div class="detailbox">                     
                    <!-- borang penambahan topik mula -->
                    <h3>
                    <form class="quizform" action="" method="post" spellcheck="false">
                        <div class="forminputtopik">
                            <input class="topik" type="text" name="topik" placeholder="Topik"
                            onkeypress='return event.charCode>=32 && event.charCode<=125' required></input>
                        </div>

                        <div class="forminput">
                            <label class="col-md-12 control-label " for="total"></label>
                            <input type="number" class="form-control input-md" min="1" name="jumlahsoalan" placeholder="Jumlah Soalan" maxlength="3"
                            onkeypress='return event.charCode>=48 && event.charCode<=57' required>
                        </div>

                        <div class="button">
                            <button class="submit" type="submit" name="submit">Tambah Topik</button>
                            <button class="reset" type="reset">Reset</button>
                        </div>
                    </form>                           
                    </h3>
                    <!-- borang penambahan topik tamat -->

                    <?php
                        if(isset($_POST['submit'])){
                            $topik = $_POST['topik'];
                            $query = mysqli_query($conn, "SELECT idtopik FROM topik ORDER BY CAST(substr(idtopik,2,6) AS int) DESC LIMIT 1");
                            $fetch = mysqli_fetch_assoc($query);
                            $idtopiksebelum = $fetch['idtopik'];
                            $pengubah = (int)substr($idtopiksebelum,1);
                            $pengubah ++;
                            
                            if ($pengubah<10) {
                                $idtopikbaharu = "T0".$pengubah;
                            }else{
                                $idtopikbaharu = "T".$pengubah;
                            }

                            $tambah = "INSERT INTO topik (idpengguna,idtopik,topik) VALUES ('$idpengguna','$idtopikbaharu','$topik')";
                            $lastid = mysqli_insert_id($conn);
                            $jumlahsoalan=$_POST['jumlahsoalan'];

                            $hasil=mysqli_query($conn,$tambah);
                            if ($hasil){
                                header("location:daftarsoalan.php?jumlahsoalan=$jumlahsoalan&idtopik=$idtopikbaharu&topik=$topik");
                            }else{
                                echo"<script>alert('Pendaftaran Topik Gagal.');window.location='tambahkuiz.php'</script>";
                            }
                        }                   
                    ?>                  
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>