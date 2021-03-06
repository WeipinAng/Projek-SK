<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="template/sidebar.css?v=<?php echo time(); ?>">
</head>

<?php
if ($_SESSION['idpengguna']=="G0000"){
?>
<body>
    <!-- sidebar untuk admin mula -->
    <div class="wrapper">
        <div class="dashboard">
            <h2>Laman Utama</h2>
            <div class="icon">
                <img src="images/Buku.png" alt="">
            </div>
            <h5>Admin</h5>
            <ul>
                <li><a href="lamanutamaguru.php"><i class="fas fa-info-circle"></i>Profil</a></li>
                <li><a href="senaraiguru.php"><i class="fas fa-table"></i>Senarai Guru</a></li>
                <li><a href="senaraimurid.php"><i class="fas fa-table"></i>Senarai Murid</a></li>
                <li><a href="laporanstatistikadmin.php"><i class="fas fa-database"></i>Statistik</a></li>
            </ul>
        </div>
    <!-- sidebar untuk admin tamat -->

<?php
} else if($_SESSION['peranan']=="guru") {
?>
<body>
    <!-- sidebar untuk guru mula -->
    <div class="wrapper">
        <div class="dashboard">
            <h2>Laman Utama</h2>
            <div class="icon">
                <img src="images/Buku.png" alt="">
            </div>
            <h5>Guru</h5>
            <ul>
                <li><a href="lamanutamaguru.php"><i class="fas fa-info-circle"></i>Profil</a></li>
                <li><a href="koleksikuizguru.php"><i class="fab fa-wpforms"></i>Koleksi Kuiz</a></li>
                <li><a href="prestasitopik.php"><i class="fas fa-table"></i>Prestasi</a></li>
                <li><a href="importmurid.php"><i class="fas fa-file-import"></i>Import</a></li>
            </ul>
        </div>
    <!-- sidebar untuk guru tamat -->

<?php
} else {
?>
<body>
    <!-- sidebar untuk murid mula -->
    <div class="wrapper">
        <div class="dashboard">
            <h2>Laman Utama</h2>
            <div class="icon">
                <img src="images/Daftar2.png" alt="">
            </div>
            <h5>Murid</h5>
            <ul>
                <li><a href="lamanutamamurid.php"><i class="fas fa-info-circle"></i>Profil</a></li>
                <li><a href="koleksikuizmurid.php"><i class="fab fa-wpforms"></i>Koleksi Kuiz</a></li>
                <li><a href="skorindividu.php"><i class="fas fa-table"></i>Prestasi</a></li>
            </ul>
        </div>
    <!-- sidebar untuk murid tamat -->
<?php
}
?>