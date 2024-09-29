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
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3H6MB7RLPJ"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-3H6MB7RLPJ');
    </script>

    <link rel="stylesheet" href="css/style-nav.css" />
    <link rel="stylesheet" href="css/data-mahasiswa.css" />
    <link rel="stylesheet" href="css/style-footer.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet" />
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <!-- Feather Icons-->
    <script src="https://unpkg.com/feather-icons"></script>

    <script src="/komponen/Navbar/Navbar.js"></script>
    <script src="/komponen/Footer/Footer.js"></script>
</head>

<body>
    <!-- Navigasi Bar Start -->
    <div id="navbar"></div>
    <!-- Navigasi Bar End -->
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
    <div id="footer"></div>
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