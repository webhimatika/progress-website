const aksiomaContainer = document.querySelector(".aksioma-container");
const footer = document.querySelector(".footer");
const copyright = document.querySelector(".copyright");
const pdfViewer = document.getElementById("pdfViewer");
const pdfContainer = document.getElementById("pdfContainer");
const closeFull = document.querySelector(".close-full-btn");

function showPDF(event, pdfURL) {
  event.preventDefault(); // Mencegah perilaku default dari anchor tag
  // pdfViewer.data = pdfURL;
  pdfViewer.src = pdfURL;
  // cek apakah ukuran halaman < 500
  if (window.innerWidth < 450) {
    window.open(pdfURL);
    return;
  }

  pdfContainer.style.display = "block"; // menampilkan PDF
  closeFull.style.display = "flex"; // menampilkan close btn
  // membuat latar menjadi gelap
  document.getElementsByTagName("body")[0].classList.add("off");
  aksiomaContainer.classList.add("off");
  footer.classList.add("off");
  copyright.classList.add("off");
  console.log(pdfViewer);
}

function fullPDF() {
  const pdfURL = pdfViewer.getAttribute("src");
  window.open(pdfURL); //membuka pdf di tab baru
  console.log(pdfURL);
  return;
}

function closePDF() {
  let pdfURL = pdfViewer.getAttribute("src");
  pdfURL = " "; // Ketika pdf di close maka pdfURL akan => ""
  pdfViewer.src = pdfURL; // membuat data pada pdfViewer => ""

  pdfContainer.style.display = "none";
  closeFull.style.display = "none";
  document.getElementsByTagName("body")[0].classList.remove("off");
  aksiomaContainer.classList.remove("off");
  footer.classList.remove("off");
  copyright.classList.remove("off");
}
