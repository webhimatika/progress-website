document.addEventListener("DOMContentLoaded", function () {
  const prevBtn = document.querySelector(".prev-btn");
  const pageTabs = document.querySelector(".page-tabs");
  const nextBtn = document.querySelector(".next-btn");
  const allItems = document.querySelectorAll(".content-book");

  const perPage = 12;
  function showItems(page) {
    // allItems = document.querySelectorAll(".item");
    startIndex = (page - 1) * perPage;
    endIndex = startIndex + perPage;

    allItems.forEach((item, index) => {
      if (index >= startIndex && index < endIndex) {
        item.style.display = "flex";
      } else {
        item.style.display = "none";
      }
    });
  }

  //  membuat berapa banyak page sesuai halaman
  const updateItemsPage = (currentPage) => {
    // allItems = document.querySelectorAll(".item");
    pageTotal = Math.ceil(allItems.length / perPage);
    pageTabs.innerHTML = "";
    for (let i = 1; i <= pageTotal; i++) {
      const tab = document.createElement("div");
      tab.classList.add("tab");
      tab.textContent = i;

      if (currentPage === i) {
        tab.classList.add("active-tab");
      }

      //   ketika tab di klik
      tab.addEventListener("click", () => {
        currentPage = i;
        showItems(currentPage);
        updateItemsPage(currentPage);

        // Simpan tab aktif ke penyimpanan lokal (localStorage)
        sessionStorage.setItem("activeTab", currentPage);
      });
      // menambahkan div tab ke dalam pageTabs
      pageTabs.appendChild(tab);
    }
  };
  // Fungsi untuk mengambil tab aktif dari penyimpanan lokal (localStorage)
  const getActiveTab = () => {
    const activeTab = sessionStorage.getItem("activeTab");
    return activeTab ? parseInt(activeTab) : 1;
  };

  // Inisialisasi halaman berita saat pertama kali halaman dimuat
  const initialTab = getActiveTab();
  showItems(initialTab);
  updateItemsPage(initialTab);

  // fungsi ketika mengklik tombol selanjutnya
  nextBtn.addEventListener("click", () => {
    // const allItems = document.querySelectorAll(".item");
    const pageTotal = Math.ceil(allItems.length / perPage);

    let currentPage = getActiveTab();
    if (currentPage < pageTotal) {
      currentPage++;
      showItems(currentPage);
      updateItemsPage(currentPage);

      sessionStorage.setItem("activeTab", currentPage);
    }
  });

  // fungsi ketika mengklik tombol sebelumnya
  prevBtn.addEventListener("click", () => {
    let currentPage = getActiveTab();
    if (currentPage > 1) {
      currentPage--;
      showItems(currentPage);
      updateItemsPage(currentPage);

      sessionStorage.setItem("activeTab", currentPage);
    }
  });
});
