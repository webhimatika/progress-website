window.addEventListener("DOMContentLoaded", () => {
  const pages = {
    beranda: ["/index"],
    tentangKami: ["/tentang-kami", "/susunan-pengurus"],
    akademik: ["/aksioma"],
    kegiatan: ["/berita","/review-kegiatan", "/starfm"],
    informasi: ["/database-mahasiswa"],
  };
  const currentPage = window.location.pathname;
  const splitCurrentPage = currentPage.split(".")[0];
  let selectedPage;
  for (const key in pages) {
    pages[key].forEach(page => {
      if(currentPage.startsWith(page)) {
        console.log(key);
        selectedPage = key;
      }
    });
  }
  fetch("/komponen/Navbar/Navbar.html")
    .then((response) => response.text())
    .then((data) => {
      document.getElementById("navbar").innerHTML = data;
      const navActive = document.getElementById(`nav-${selectedPage}`);
      if (navActive) {
        navActive.classList.add("nav-visit");
      }
      
      const navbarMenu = document.querySelector(".navbar-menu");
      document.querySelector("#menu").onclick = () => {
        navbarMenu.classList.toggle("active");
        //? fungsi dropdowns memilih setiap dropdown untuk remove active
        dropdowns.forEach((dropdown) => {
          dropdown.classList.remove("active");
        });
      };
      const menuBurger = document.querySelector("#menu");
      document.addEventListener("click", function (e) {
        if (!menuBurger.contains(e.target) && !navbarMenu.contains(e.target)) {
          navbarMenu.classList.remove("active");
        }
      });
      
      //inisialisasi semua class dropdown di variabel dropdowns
      const dropdowns = document.querySelectorAll(".dropdown");
      const dropdownContent = document.querySelector(".dropdown-content");
      
      /* fungsi memilih salah satu class dropdown lalu dijalankan
      ketika diklik */
      dropdowns.forEach((dropdown) => {
        dropdown.parentElement.addEventListener("click", (e) => {
          //fungsi dropdowns memilih setiap dropdown untuk remove active
          dropdowns.forEach((otherDropdown) => {
            //logika if jika otherDropdown ~(==) dropdown atau ~(bagian dropdownContent)
            if (otherDropdown !== dropdown || !dropdownContent.contains(e.target)) {
              otherDropdown.classList.remove("active");
            }
          });
      
          dropdown.classList.toggle("active");
        });
      });

    feather.replace();

    })
    .catch((err) => {
      console.error(`Error fetching navigation bar: ${err}`);
    });
  fetch("/komponen/Footer/Footer.html")
    .then((response) => response.text())
    .then((data) => {
        document.getElementById("footer").innerHTML = data;
    })
    .catch((err) => {
        console.error(`Error fetching footer: ${err}`);
    });
});
