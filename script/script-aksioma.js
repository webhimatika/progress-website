const aksiomaContainer = document.querySelector(".aksioma-container");
const footer = document.querySelector(".footer");
const copyright = document.querySelector(".copyright");
const pdfViewer = document.getElementById("pdfViewer");
const pdfContainer = document.getElementById("pdfContainer");
const closeFull = document.querySelector(".close-full-btn");

function showPDF(event, pdfURL) {
  event.preventDefault(); // Mencegah perilaku default dari anchor tag
  pdfViewer.data = pdfURL;
  // cek apakah ukuran halaman < 1087
  if (window.innerWidth < 1087) {
    window.open(pdfURL);
    return;
  }

  pdfContainer.style.display = "block"; // menampilkan PDF
  closeFull.style.display = "flex"; // menampilkan close btn
  // membuat latar menjadi gelap
  aksiomaContainer.classList.add("off");
  footer.classList.add("off");
  copyright.classList.add("off");
  console.log(pdfURL);
}

function fullPDF() {
  const pdfURL = document
    .querySelector("a[data-pdf-url]")
    .getAttribute("data-pdf-url"); //inisialisasi pdfURL = link ke pdf
  window.open(pdfURL); //membuka pdf di tab baru
  return;
}

function closePDF() {
  pdfContainer.style.display = "none";
  closeFull.style.display = "none";
  aksiomaContainer.classList.remove("off");
  footer.classList.remove("off");
  copyright.classList.remove("off");
}
