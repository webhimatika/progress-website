const iconPopUp = document.querySelector(".icon-pop-up");

document.querySelector(".close-btn").onclick = () => {
  iconPopUp.classList.toggle("hide");
};

let isScrolling = false;
let timeout = null;

function showMoveRight() {
  iconPopUp.classList.add("move-right");
}

function hideMoveRight() {
  iconPopUp.classList.remove("move-right");
}

function scrollTimeout() {
  isScrolling = false;
  hideMoveRight();
}

function checkScrollStatus() {
  if (!isScrolling) {
    showMoveRight();
    isScrolling = true;
  }

  clearTimeout(timeout);
  timeout = setTimeout(scrollTimeout, 500);
}

window.addEventListener("scroll", checkScrollStatus);
