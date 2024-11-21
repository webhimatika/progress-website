<?php
// Ambil slug dari URL
if (isset($_GET['slug'])) {
  $slug = $_GET['slug'];
} else {
  echo "Slug tidak ditemukan!";
  exit;
}

// Import data JSON dari file
$jsonData = file_get_contents(__DIR__ . '/data/database_berita.json');
$data = json_decode($jsonData, true);

// Cari berita yang sesuai dengan slug
$berita = null;
foreach ($data as $item) {
  if ($item['slug'] === $slug) {
    $berita = $item;
    break;
  }
}

// Jika berita tidak ditemukan
if ($berita === null) {
  echo "Berita tidak ditemukan!";
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $berita['title']; ?></title>
  <link rel="shortcut icon" href="assets/logo himatika.png" type="image/x-icon" />
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-3H6MB7RLPJ"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-3H6MB7RLPJ');
  </script>

  <!-- My Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet" />
  <!--Calibri Font => klo mau pake langsung di CSS(font-family: "calibri",sans-serif;)-->

  <!-- My Css Style-->
  <link rel="stylesheet" href="../css/style-nav.css" />
  <link rel="stylesheet" href="../css/review-kegiatan.css" />
  <link rel="stylesheet" href="../css/style-footer.css" />

  <!-- Feather Icons-->
  <script src="https://unpkg.com/feather-icons"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />

  <script src="../komponen/Navbar/Navbar.js"></script>
  <script src="../komponen/Footer/Footer.js"></script>
</head>

<body>
  <!-- Navigasi Bar Start -->
  <div id="navbar"></div>
  <!-- nav end -->
<main>
<div class="container">
    <div class="content">
      <h4><?php echo ($berita['title']); ?></h4>
      <div class="deskripsi">
        <p><?php echo ($berita['date']); ?></p>
      </div>
      <div class="image-container">
        <img src="../assets/berita/<?php echo ($berita['cover']); ?>" alt="<?php echo $berita['title']; ?>" />
        </div>
      <div class="konten-isi">
      <p><?php echo ($berita['content']); ?></p>
      </div>
    </div>
  </div>
  <aside>
    <h2>Post Terkini</h2>
    <div class="line"></div>

    <div class="ling">
    <?php
        $dataTanpaBeritaSaatIni = array_filter($data, function ($item) use ($berita) {
          return $item['slug'] !== $berita['slug']; 
        });

        $dataTerbaru = array_slice($dataTanpaBeritaSaatIni, 0, 4);

        foreach ($dataTerbaru as $post) {
          echo '<a href="kegiatan.php?slug=' . htmlspecialchars($post['slug']) . '" class="news">'
          . htmlspecialchars($post['title']) . 'asdasd</a>';
            }
            ?>
    </div>
  </aside>
</main>

  <!-- Footer Start -->
  <div id="footer"></div>
  <!-- Footer End -->

  <!-- navbar scipt -->
  <script src="../script/nav-script.js"></script>
  <!-- Feather Icons -->
  <script>
    feather.replace();
  </script>
</body>

</html>