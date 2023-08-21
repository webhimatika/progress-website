const aksiomaContainer = document.querySelector(".aksioma-container");
const footer = document.querySelector(".footer");
const copyright = document.querySelector(".copyright");
const pdfViewer = document.getElementById("pdfViewer");
const pdfContainer = document.getElementById("pdfContainer");
const closeFull = document.querySelector(".close-full-btn");

function showPDF(event, pdfURL) {
  event.preventDefault(); // Mencegah perilaku default dari anchor tag
  pdfViewer.data = pdfURL;
  // cek apakah ukuran halaman < 500
  if (window.innerWidth < 450) {
    pdfContainer.style.display = "block"; // menampilkan PDF
    closeFull.style.display = "flex"; // menampilkan close btn

    aksiomaContainer.classList.add("off");
    footer.classList.add("off");
    copyright.classList.add("off");
    return;
  }

  pdfContainer.style.display = "block"; // menampilkan PDF
  closeFull.style.display = "flex"; // menampilkan close btn
  // membuat latar menjadi gelap
  aksiomaContainer.classList.add("off");
  footer.classList.add("off");
  copyright.classList.add("off");
  console.log(pdfViewer);
}

function fullPDF() {
  const pdfURL = pdfViewer.getAttribute("data");
  window.open(pdfURL); //membuka pdf di tab baru
  console.log(pdfURL);
  return;
}

function closePDF() {
  let pdfURL = pdfViewer.getAttribute("data");
  pdfURL = " "; // Ketika pdf di close maka pdfURL akan => ""
  pdfViewer.data = pdfURL; // membuat data pada pdfViewer => ""

  pdfContainer.style.display = "none";
  closeFull.style.display = "none";
  aksiomaContainer.classList.remove("off");
  footer.classList.remove("off");
  copyright.classList.remove("off");
}
