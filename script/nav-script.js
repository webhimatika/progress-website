//inisialisasi class navbar-menu
const navbarMenu = document.querySelector(".navbar-menu");

//ketika icon menu diketik
document.querySelector("#menu").onclick = () => {
  navbarMenu.classList.toggle("active");

  //fungsi dropdowns memilih setiap dropdown untuk remove active
  dropdowns.forEach((dropdown) => {
    dropdown.classList.remove("active");
  });
};

//inisialisasi id menu
const menuBurger = document.querySelector("#menu");

//ketika klik diluar side bar dan burger
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
