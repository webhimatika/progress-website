<?php

//json
$jsonData = file_get_contents(__DIR__ . '/data/database_aksioma.json');
$aksioma = json_decode($jsonData, true);

//komponen pagination
$halaman = isset($_GET["page"]) ? $_GET["page"] : 1;
$jumlah_data_halaman = 8;

$total_data = count($aksioma);
$total_halaman = ceil($total_data / $jumlah_data_halaman);

// memastikan nomor halaman 
if ($halaman < 1) {
  header("Location: ?page=1");
  exit();
} elseif ($halaman > $total_halaman) {
  header("Location: ?page=1");
  exit();
}

$awal = ($halaman - 1) * $jumlah_data_halaman;
$akhir = min($awal + $jumlah_data_halaman, $total_data);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AKSIOMA | HIMATIKA FMIPA UNS</title>
    <link
      rel="shortcut icon"
      href="assets/logo himatika.png"
      type="image/x-icon" />
    <script
      async
      src="https://www.googletagmanager.com/gtag/js?id=G-3H6MB7RLPJ"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());
      gtag("config", "G-3H6MB7RLPJ");
    </script>
    <!-- My Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap"
      rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap"
      rel="stylesheet" />
    <!--Calibri Font => klo mau pake langsung di CSS(font-family: "calibri",sans-serif;)-->

    <!-- My Css Style-->
    <link rel="stylesheet" href="css/style-nav.css" />
    <link rel="stylesheet" href="css/style-aksioma.css" />
    <link rel="stylesheet" href="css/style-footer.css" />

    <!-- Feather Icons-->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <script src="/komponen/Navbar/Navbar.js"></script>
    <script src="/komponen/Footer/Footer.js"></script>
</head>

<body>
  <!-- Navigasi Bar Start -->
  <div id="navbar"></div>
  <!-- nav end -->
  <div class="aksioma-container">
      <header class="header">
        <div class="overlay"></div>
        <main class="header-content">
          <h2>AKSIOMA HIMATIKA FMIPA UNS</h2>
        </main>
      </header>
      <section class="aksioma-wrapp">
        <h1>Ajang Kreasi Seni dan Informasi HIMATIKA (AKSIOMA)</h1>
          <!-- aksioma -->
          <div class="group-book">
          <?php for ($i = $awal; $i < $akhir; $i++) : ?>
            <div class="content-book">
              <a
                href=""
                onclick="showPDF(event, this.getAttribute('data-pdf-url'))"
                data-pdf-url="assets/Aksioma/pdf-aksioma/<?php echo $aksioma[$i]['url']; ?>"><img
                  loading="lazy" src="assets/Aksioma/cover-aksioma/<?php echo $aksioma[$i]['cover']; ?>"
                  alt=<?php echo $aksioma[$i]['title'];?>/></a>
                <h3>#EDISI <?php echo $aksioma[$i]['edition'];?> </h3>
                <h2><?php echo $aksioma[$i]['title'];?></h2>
                  <h4> <?php echo $aksioma[$i]['year'];?> </h4>
                    <p>Tahun <?php echo $aksioma[$i]['year'];?> </p>
            </div>
            <?php endfor ?>
          </div>
          <div class="pagination">
            <!-- tombol prev -->
            <?php if ($halaman > 1) : ?>
              <?php if ($total_halaman > 5) : ?>
                <a class="prev-btn" href="?page=1"><i data-feather="chevrons-left"></i></a>
              <?php endif; ?>
              <a class="prev-btn" href="?page=<?= ($halaman - 1) ?>"><i data-feather="chevron-left"></i></a>
            <?php endif; ?>
            <!-- paginasi -->
            <div class="page-tabs">
              <?php for ($i = 1; $i <= $total_halaman; $i++) : ?>
                <?php if ($halaman == $i) : ?>
                  <a href="?page=<?= $i ?>" class=" active-tab"><?= $i ?> </a>
                <?php else : ?>
                  <a href="?page=<?= $i ?>" class="tabs"><?= $i ?> </a>
                <?php endif; ?>
              <?php endfor; ?>
            </div>
            <!-- tombol next -->
            <?php if ($halaman < $total_halaman) : ?>
              <a class="next-btn" href="?page=<?= ($halaman + 1) ?>"><i data-feather="chevron-right"></i></a>
              <?php if ($total_halaman > 5) : ?>
                <a class="next-btn" href="?page=<?= $total_halaman ?>"><i data-feather="chevrons-right"></i></a>
              <?php endif; ?>
            <?php endif; ?>
      </div>
      </section>
            </div>
                <div id="pdfContainer" class="pdf-container">
              <object id="pdfViewer" type="application/pdf"></object>
            </div>
          <div class="close-full-btn">
        <div class="close-btn" id="close-btn">
          <p onclick="closePDF()">
            <i data-feather="x" style="stroke-width: 2.5px"></i>
          </p>
        </div>
        <div class="full-btn" id="full-btn">
          <p onclick="fullPDF()">Buka Majalah</p>
        </div> 
      </div>
    </div> 
  </div>
        
  <!-- Footer Start -->
  <div id="footer"></div>
  <!-- Footer End -->
  
  <!-- My Java Script -->
  <script src="script/nav-script.js"></script>
  <script src="script/script-aksioma.js"></script>

  <!-- Feather Icons -->
  <script>
    feather.replace();
  </script>
</body>

</html>