<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');
$idpengguna=$_SESSION['idpengguna'];
?>

<head>
    <link rel="stylesheet" href="css/kemaskinitopikstyle.css?v=<?php echo time(); ?>">
    <title>Kemas Kini Topik</title>
</head>
    <!-- header mula -->
        <div class="space">
            <div class="header">
                <h2>Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</h2>
                <div class="logoutbutton"><a href="logout.php">Log Keluar</a></div>
            </div>
    <!-- header tamat -->
            <div class="maincontent">
                <div class="title">KEMAS KINI TOPIK</div>
                <div class="balik"><a href="koleksikuizguru.php">Balik</a></div>
                <div class="separator"></div>
                <div class="detailbox">    
                    <!-- output borang pengemaskinian kuiz -->
                    <h3>
                    <?php
                        $idtopik = $_GET['idtopik'];
                        $res = "SELECT * FROM topik WHERE idtopik='$idtopik'";
                        $update = mysqli_query($conn,$res);
                        
                        //semak
                        if($update==TRUE){
                            $count = mysqli_num_rows($update);
                            if($count==1){
                                $rows = mysqli_fetch_assoc($update);
                                $topik = $rows['topik'];
                            }else{
                                header ("Location: koleksikuizguru.php");
                            }
                        }

                        if(isset($_POST['update'])) {
                            $topik = $_POST['topik'];
                            //kemaskini topik dengan data baharu
                            $sql = "UPDATE topik SET topik='$topik' WHERE idtopik='$idtopik'";
                            $update = mysqli_query($conn,$sql);
                            //pastikan topik sudah berjaya dikemaskinikan
                            echo"<script>alert('Butiran topik berjaya dikemaskinikan.');window.location='koleksikuizguru.php'</script>";
                        }
                    ?>
                    
                    <form class="quizform" action="" method="post" spellcheck="false">
                        <div class="forminputtopik">
                            <input class="topik" type="text" name="topik" placeholder="Topik asal: <?php echo $topik; ?>"
                            onkeypress='return event.charCode>=32 && event.charCode<=125' required></input>
                        </div>

                        <div class="button">
                            <button class="submit" type="submit" name="update">Kemas Kini</button>
                            <button class="reset" type="reset">Reset</button>
                        </div>
                    </form>                           
                    </h3>
                    <!-- borang pengemaskinian kuiz tamat -->
                </div>
            </div>
        </div>
</body>
</html>