<?php
// Fungsi untuk memotong  kata
function getExcerpt($text, $wordLimit = 30)
{
  $words = explode(' ', $text);
  if (count($words) > $wordLimit) {
    $excerpt = implode(' ', array_slice($words, 0, $wordLimit)) . '...';
  } else {
    $excerpt = $text;
  }
  return $excerpt;
}
//import data JSON
$jsonData = file_get_contents(__DIR__ . '/data/database_berita.json');
$data = json_decode($jsonData, true);

//komponen pagination
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$items_per_page = 10; // Jumlah item per halaman

$total_data = count($data);
$total_pages = ceil($total_data / $items_per_page);

$start = ($current_page - 1) * $items_per_page;
$end = min(($start + $items_per_page - 1), $total_data - 1);

// Pagination 
$indexPrint = floor(($current_page - 1) / 5);
$startPrint = $indexPrint * 5 + 1;
$endPrint = min($startPrint + 4, $total_pages);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Review Kegiatan | HIMATIKA FMIPA UNS</title>
  <link rel="shortcut icon" href="assets/logo himatika.png" type="image/x-icon" />
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-3H6MB7RLPJ"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag("js", new Date());

    gtag("config", "G-3H6MB7RLPJ");
  </script>
  <link rel="stylesheet" href="css/style-nav.css" />
  <link rel="stylesheet" href="css/style-acara.css" />
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
  <!-- nav end -->
  <header class="header">
    <div class="overlay"></div>
    <main class="header-content">
      <h2>Berita Acara HIMATIKA FMIPA UNS</h2>
    </main>
  </header>
  <h1>Review Kegiatan</h1>
  <?php for ($i = $start; $i <= $end; $i++) : ?>
    <div class="ooo">
      <div class="berita">
        <img loading="lazy" src="assets/berita/<?php echo $data[$i]['cover']; ?>" alt="<?php echo $data[$i]['title']; ?>">
        <div class="isi">
          <div class="text">
            <h3><?php echo $data[$i]['title']; ?></h3>
            <p><?php echo getExcerpt(strip_tags($data[$i]['content']), 40); ?></p>
          </div>
          <div class="siqma">
            <a href="review-kegiatan/kegiatan.php?slug=<?php echo $data[$i]['slug']; ?>" class="news">Selengkapnya</a>
          </div>
        </div>
      </div>
    </div>
  <?php endfor; ?>

  <!-- Pagination -->
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
  <!-- My Java Script -->
  <script src="script/script-susunan-pengurus.js"></script>
  <!-- navbar scipt -->
  <script src="script/nav-script.js"></script>

  <!-- Feather Icons -->
  <script>
    feather.replace();
  </script>
</body>

</html>