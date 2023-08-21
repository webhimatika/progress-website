document.addEventListener("DOMContentLoaded", function () {
  const prevBtn = document.querySelector(".prev-btn");
  const pageTabs = document.querySelector(".page-tabs");
  const nextBtn = document.querySelector(".next-btn");
  const allItems = document.querySelectorAll(".content-book");
  const Items = document.querySelector("#items");

  const perPage = 8; // berapa banyak data per pagenya
  const href = "aksioma.html"; // href untuk link page utama

  // mengambil value pada data di link
  const getLinkUrl = (url) => {
    const getUrl = window.location.search.substring(1);
    const pageTotal = Math.ceil(allItems.length / perPage);
    // cek apakah ada data di url
    if (getUrl != "") {
      const urlData = getUrl.split("&");
      for (let i = 0; i < urlData.length; i++) {
        const urlKey = urlData[i].split("=");
        if (urlKey[0] === url) {
          const urlValue = urlKey[1];
          // cek apakah value page sesuai halaman yang tersedia
          if (urlValue >= 1 && urlValue <= pageTotal) {
            showItems(urlValue);
            updateItemsPage(urlValue);
            // console.log(getUrl);
            return urlValue;
          } else {
            document.location.href = href;
            return false;
          }
        } else {
          const urlValue = 1;
          showItems(urlValue);
          updateItemsPage(urlValue);
          return urlValue;
        }
      }
    } else {
      const urlValue = 1;
      showItems(urlValue);
      updateItemsPage(urlValue);
      return urlValue;
    }
  };

  // mencetak isi sesuai di url
  const showItems = (page) => {
    const startIndex = page * perPage - perPage;
    const endIndex = startIndex + perPage;
    Items.classList.remove("items");
    allItems.forEach((item, index) => {
      if (index >= startIndex && index < endIndex) {
        item.style.display = "flex";
        // console.log(`ketemu index ke ${index}`);
      } else {
        item.style.display = "none";
      }
    });
  };

  //  membuat berapa banyak page sesuai halaman
  const updateItemsPage = (currentPage) => {
    // allItems = document.querySelectorAll(".item");
    pageTotal = Math.ceil(allItems.length / perPage);
    pageTabs.innerHTML = "";
    for (let i = 1; i <= pageTotal; i++) {
      const tab = document.createElement("a");
      tab.classList.add("tab");
      tab.textContent = i;
      const url = `${href}?page=${i}`;
      tab.setAttribute("href", url);

      if (currentPage == i) {
        tab.classList.add("active-tab");
      }
      pageTabs.appendChild(tab);
    }
  };

  // fungsi ketika mengklik tombol selanjutnya
  nextBtn.addEventListener("click", () => {
    // const allItems = document.querySelectorAll(".item");
    const pageTotal = Math.ceil(allItems.length / perPage);
    let urlValue = getLinkUrl("page");
    if (urlValue < pageTotal) {
      urlValue++;
      document.location.href = `${href}?page=${urlValue}`;
    }
  });

  // fungsi ketika mengklik tombol sebelumnya
  prevBtn.addEventListener("click", () => {
    let urlValue = getLinkUrl("page");
    if (urlValue > 1) {
      urlValue--;
      document.location.href = `${href}?page=${urlValue}`;
    }
  });

  //   running ketika pertama kali diload
  getLinkUrl("page");
});
