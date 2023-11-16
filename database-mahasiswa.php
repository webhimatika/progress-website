<?php

session_start();

function getDataMhs($key)
{
    //ambil semua data mahasiswa jika tidak ada kata kunci
    if ($key == '') {
        $jsonData = file_get_contents('assets/mhs_aktif.json');
        $dataMhs = json_decode($jsonData, true);
        return $dataMhs;
    }
    $hasil = [];
    $jsonData = file_get_contents('assets/mhs_aktif.json');
    $dataMhs = json_decode($jsonData, true);

    foreach ($dataMhs as $data) {
        foreach ($data as $value) {
            if (strpos(strtolower($value), strtolower($key)) !== false) {
                array_push($hasil, $data);
            }
        }
    }

    //jika pencarian tidak ditemukan 
    if (empty($hasil)) {
        $hasil[0] = [
            "nim" => "",
            "nama" => "Tidak Ditemukan",
            "status" => "",
            "id" => 1

        ];
    }

    return $hasil;
}


if (isset($_GET['keyword'])) {
    $_SESSION['keyword'] = $_GET['keyword'];
}

$keyword = isset($_SESSION['keyword']) ? $_SESSION['keyword'] : '';

$dataMhs = getDataMhs($keyword);

//komponen pagination
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$items_per_page = 25; // Jumlah item per halaman

$total_data = count($dataMhs);
$total_pages = ceil($total_data / $items_per_page);

$start = ($current_page - 1) * $items_per_page;
if ($current_page == $total_pages) {
    $end = count($dataMhs) - 1;
} else {
    $end = $start + $items_per_page - 1;
}

// Pagination 
$indexPrint = floor($current_page / 5);
if ($indexPrint == 0) {
    $startPrint = $indexPrint * 5 + 1;
} else {
    $startPrint = $indexPrint * 5;
}
$endPrint = $startPrint + 5;
if ($endPrint > $total_pages) {
    $endPrint = $total_pages;
    $startPrint = $endPrint - 5;
    if ($startPrint <= 0) {
        $startPrint = 1;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa Aktif | HIMATIKA FMIPA UNS</title>
    <link rel="shortcut icon" href="assets/logo himatika.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/style-nav.css" />
    <link rel="stylesheet" href="css/data-mahasiswa.css" />
    <link rel="stylesheet" href="css/style-footer.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet" />
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <!-- Feather Icons-->
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <!--navigasi bar start-->
    <nav class="navbar">
        <div class="navbar-logo">
            <a href="index.html">
                <img src="assets/logo-indo.png" class="logo-nav" alt="Logo Himatika FMIPA UNS" />
            </a>
        </div>
        <div class="navbar-menu">
            <ul>
                <li class="menu">
                    <div class="menu-item">
                        <i id="icon-menu" class="menu-icon" data-feather="home"></i>
                        <a href="index.html">Beranda</a>
                        <ul class="dropdown-beranda">
                            <!--Hiasan Drop menu(drop-line)-->
                            <li class="drop-line-beranda"></li>
                        </ul>
                    </div>
                </li>
                <li class="menu">
                    <div class="menu-item">
                        <i id="icon-menu" class="menu-icon" data-feather="users"></i>
                        <a href="#">Tentang Kami</a>
                        <ul class="dropdown">
                            <!--Hiasan Drop menu(drop-line)-->
                            <li class="drop-line"></li>
                            <li class="dropdown-content">
                                <a href="visi-misi.html"><i id="icon-menu" data-feather="user"></i></a>
                                <a href="visi-misi.html">Visi Misi</a>
                            </li>
                            <li class="dropdown-content">
                                <a href="susunan-pengurus.html"><i id="icon-menu" data-feather="users"></i></a>
                                <a href="susunan-pengurus.html">Susunan Pengurus</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="menu">
                    <div class="menu-item">
                        <i id="icon-menu" class="menu-icon" data-feather="book-open"></i>
                        <a href="#">Akademik</a>
                        <ul class="dropdown dropdown--animated-2">
                            <!--Hiasan Drop menu(drop-line)-->
                            <li class="drop-line"></li>
                            <li class="dropdown-content">
                                <a href="aksioma.html"><i id="icon-menu" data-feather="book"></i></a>
                                <a href="aksioma.html">Aksioma</a>
                            </li>
                            <li class="dropdown-content">
                                <a href="https://drive.google.com/drive/folders/1iYcbjDgGIirnWdzUl4jQ6gX1yXAtf5eQ"><i id="icon-menu" data-feather="book"></i></a>
                                <a href="https://drive.google.com/drive/folders/1iYcbjDgGIirnWdzUl4jQ6gX1yXAtf5eQ">Bank
                                    Soal</a>
                            </li>
                            <li class="dropdown-content">
                                <a href="https://drive.google.com/drive/folders/17Hz4_oWF9XgJzrRDMaZ8wYRz3mOzm-53"><i id="icon-menu" data-feather="book"></i></a>
                                <a href="https://drive.google.com/drive/folders/17Hz4_oWF9XgJzrRDMaZ8wYRz3mOzm-53">Buku
                                    Modus</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="menu">
                    <div class="menu-item">
                        <i id="icon-menu" class="menu-icon" data-feather="calendar"></i>
                        <a href="#">Kegiatan</a>
                        <ul class="dropdown">
                            <!--Hiasan Drop menu(drop-line)-->
                            <li class="drop-line"></li>
                            <li class="dropdown-content">
                                <a href="berita acara.html"><i id="icon-menu" data-feather="calendar"></i></a>
                                <a href="berita acara.html">Review Kegiatan</a>
                            </li>
                            <li class="dropdown-content">
                                <a href="starfm.html"><i id="icon-menu" data-feather="calendar"></i></a>
                                <a href="starfm.html">STAR FM</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="menu">
                    <div class="menu-item  nav-visit">
                        <i id="icon-menu" class="menu-icon" data-feather="info"></i>
                        <a href="#">Informasi</a>
                        <ul class="dropdown dropdown--animated-3">
                            <!--Hiasan Drop menu(drop-line)-->
                            <li class="drop-line"></li>
                            <li class="blank">
                                <a href="informasi-kuliah.html"><i id="icon-menu" data-feather="info"></i></a>
                                <a href="informasi-kuliah.html">Informasi Kuliah</a>
                            </li>
                            <li class="blank">
                                <a href="informasi-kampus.html"><i id="icon-menu" data-feather="info"></i></a>
                                <a href="informasi-kampus.html">Informasi Kampus</a>
                            </li>
                            <li class="dropdown-content">
                                <a href="http://uns.id/AspirasiMahasiswaMatematika"><i id="icon-menu" data-feather="info"></i></a>
                                <a href="http://uns.id/AspirasiMahasiswaMatematika">Aspirasi Mahasiswa</a>
                            </li>
                            <li class="dropdown-content">
                                <a href="https://docs.google.com/spreadsheets/d/1jv8xUHh3H_3f-vINGhlzfrGTuFGoTF0HC7LiTBdWq4Y/htmlview"><i id="icon-menu" data-feather="info"></i></a>
                                <a href="https://docs.google.com/spreadsheets/d/1jv8xUHh3H_3f-vINGhlzfrGTuFGoTF0HC7LiTBdWq4Y/htmlview">Database
                                    Alumni</a>
                            </li>
                            <li class="dropdown-content">
                                <a href="database-mahasiswa.php"><i id="icon-menu" data-feather="info"></i></a>
                                <a href="database-mahasiswa.php">Database
                                    Mahasiswa</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="navbar-icon">
            <div id="menu">
                <div class="menu-modern-1"></div>
                <div class="menu-modern-2"></div>
                <div class="menu-modern-3"></div>
            </div>
        </div>
    </nav>
    <!--navigasi bar end-->
    <header class="header">
        <div class="overlay"></div>
        <main class="header-content">
            <h2>Mahasiswa Aktif Matematika</h2>
        </main>
    </header>
    <div class="search">
        <form action="" method="get">
            <div class="search-engin">
                <input name="keyword" type="text" id="cari" placeholder="search" autocomplete="off">
                <button type="submit" id="tombol-cari"><i id="icon-menu" data-feather="search"></i></button>
            </div>
        </form>
    </div>


    <div class="data">
        <!-- tabel paginasi -->
        <table border="1">
            <tr>
                <th class="no">No</th>
                <th class="nim">NIM</th>
                <th class="nama">Nama</th>
                <th class="status">Status</th>
            </tr>

            <!-- perulangan untuk isi tabel -->
            <?php for ($i = $start; $i <= $end; $i++) : ?>
                <tr>
                    <td>
                        <?= $i + 1 ?>
                    </td>
                    <td>
                        <?= $dataMhs[$i]['nim'] ?>
                    </td>
                    <td>
                        <?= $dataMhs[$i]['nama'] ?>
                    </td>
                    <td>
                        <?= $dataMhs[$i]['status'] ?>
                    </td>
                </tr>
            <?php endfor; ?>
        </table>
    </div>

    <!-- tombol-tombol paginasi -->
    <div class="pagination">
        <!-- tombol prev -->
        <?php if ($current_page > 1) : ?>
            <?php if ($total_pages > 5) : ?>
                <a class="prev-btn" href="?page=1"><i data-feather="chevrons-left"></i></a>
            <?php endif; ?>
            <a class="prev-btn" href="?page=<?= ($current_page - 1) ?>"><i data-feather="chevron-left"></i></a>
        <?php endif; ?>
        <!-- paginasi -->
        <div class="page-tabs">
            <?php for ($i = $startPrint; $i <= $endPrint; $i++) : ?>
                <?php if ($current_page == $i) : ?>
                    <a href="?page=<?= $i ?>" class=" active-tab">
                        <?= $i ?> </a>
                <?php else : ?>
                    <a href="?page=<?= $i ?>" class="tabs"><?= $i ?> </a>
                <?php endif; ?>
            <?php endfor; ?>
        </div>

        <!-- tombol next -->
        <?php if ($current_page < $total_pages) : ?>
            <a class="next-btn" href="?page=<?= ($current_page + 1) ?>"><i data-feather="chevron-right"></i></a>
            <?php if ($total_pages > 5) : ?>
                <a class="next-btn" href="?page=<?= $total_pages ?>"><i data-feather="chevrons-right"></i></a>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <!-- Footer Start -->
    <div class=" footer">
        <div class="container-footer">
            <div class="col-footer">
                <img src="assets/logo_hima_putih.png" class="logo-foot" alt="Logo Himatika FMIPA UNS" />
                <p>Email: himatika@mipa.uns.ac.id</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d494.3940046802911!2d110.85863901382751!3d-7.558396399999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a17d795fd373d%3A0x66f70240a15a319d!2sSekretariat%20HIMATIKA%20FMIPA%20UNS!5e0!3m2!1sen!2sid!4v1682749275850!5m2!1sen!2sid" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-footer">
                <h6>Tentang Kami</h6>
                <ul>
                    <li><a href="visi-misi.html">Visi Misi</a></li>
                    <li><a href="susunan-pengurus.html">Susunan Pengurus</a></li>
                </ul>
            </div>
            <div class="col-footer">
                <h6>Akademik</h6>
                <ul>
                    <li>
                        <a href="aksioma.html">Aksioma</a>
                    </li>
                    <li>
                        <a href="https://drive.google.com/drive/folders/17Hz4_oWF9XgJzrRDMaZ8wYRz3mOzm-53">Buku
                            Modus</a>
                    </li>
                    <li>
                        <a href="https://drive.google.com/drive/folders/1iYcbjDgGIirnWdzUl4jQ6gX1yXAtf5eQ">Bank
                            Soal</a>
                    </li>
                </ul>
            </div>
            <div class="col-footer">
                <h6>Kegiatan</h6>
                <ul>
                    <li>
                        <a href="berita acara.html">Review Kegiatan</a>
                    </li>
                    <li><a href="starfm.html">STAR FM</a></li>
                </ul>
            </div>

            <div class="col-footer">
                <div class="col-col-footer">
                    <h6>Informasi</h6>
                    <ul>
                        <li class="blank"><a href="">Informasi Kuliah</a></li>
                        <li class="blank"><a href="">Informasi Kampus</a></li>
                        <li>
                            <a href="http://uns.id/AspirasiMahasiswaMatematika">Aspirasi Mahasiswa</a>
                        </li>
                        <li>
                            <a href="https://docs.google.com/spreadsheets/d/1jv8xUHh3H_3f-vINGhlzfrGTuFGoTF0HC7LiTBdWq4Y/htmlview">Database
                                Alumni</a>
                        </li>
                        <li>
                            <a href="database-mahasiswa.php">Database Mahasiswa</a>
                        </li>
                    </ul>
                </div>
                <div class="sosmed-footer">
                    <a href="https://web.facebook.com/himatikafmipauns">
                        <i class="fab fa-facebook" style="color: #d9d9d9"></i>
                    </a>
                    <a href="https://www.instagram.com/himatikauns/"><i class="fab fa-instagram" style="color: #d9d9d9"></i></a>
                    <a href="https://twitter.com/himatikauns"><i class="fab fa-twitter" style="color: #d9d9d9"></i></a>
                    <a href="https://www.tiktok.com/@himatikauns"><i class="fab fa-tiktok" style="color: #d9d9d9"></i></a>
                    <a href="https://www.youtube.com/HIMATIKAFMIPAUNS"><i class="fab fa-youtube" style="color: #d9d9d9"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <p>Copyright ©<a href="">Website Team 2023</a> || HIMATIKA FMIPA UNS</p>
    </div>
    <!-- Footer End -->
    <!-- navbar scipt -->
    <script src="script/nav-script.js"></script>

    <!-- Feather Icons -->
    <script>
        feather.replace();
    </script>

    <script src="script/script-data-mhs.js"></script>

    <!-- js untuk input pencarian -->
    <script>
        var keyword = <?php echo json_encode($_SESSION['keyword']); ?>;
        console.log('Nilai dari sesi: ' + keyword);
        if (keyword) {
            document.getElementById('cari').value = keyword;

        }
    </script>
</body>

</html>