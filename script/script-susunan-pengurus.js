var slideIndex = 1;
showDivs(slideIndex, document.getElementsByClassName("imgslide"));

function plusDivs(n) {
  showDivs((slideIndex += n), document.getElementsByClassName("imgslide"));
}

// adkes
var slideIndex2 = 1;
showAdkes(slideIndex2, document.getElementsByClassName("adkes"));

function plusDivs2(n) {
  showAdkes((slideIndex2 += n), document.getElementsByClassName("adkes"));
}
//danus
var slideIndex3 = 1;
showDanus(slideIndex3, document.getElementsByClassName("danus"));

function plusDanus(n) {
  showDanus((slideIndex3 += n), document.getElementsByClassName("danus"));
}
//kl
var slideIndex4 = 1;
showKl(slideIndex4, document.getElementsByClassName("kl"));

function plusKl(n) {
  showKl((slideIndex4 += n), document.getElementsByClassName("kl"));
}
//bid1
var slideIndex5 = 1;
showBid1(slideIndex5, document.getElementsByClassName("bid1"));

function plusBid1(n) {
  showBid1((slideIndex5 += n), document.getElementsByClassName("bid1"));
}
//bid2
var slideIndex6 = 1;
showBid2(slideIndex6, document.getElementsByClassName("bid2"));

function plusBid2(n) {
  showBid2((slideIndex6 += n), document.getElementsByClassName("bid2"));
}
//bid3
var slideIndex7 = 1;
showBid3(slideIndex7, document.getElementsByClassName("bid3"));

function plusBid3(n) {
  showBid3((slideIndex7 += n), document.getElementsByClassName("bid3"));
}
//bid4
var slideIndex8 = 1;
showBid4(slideIndex8, document.getElementsByClassName("bid4"));

function plusBid4(n) {
  showBid4((slideIndex8 += n), document.getElementsByClassName("bid4"));
}
//bid5
var slideIndex9 = 1;
showBid5(slideIndex9, document.getElementsByClassName("bid5"));

function plusBid5(n) {
  showBid5((slideIndex9 += n), document.getElementsByClassName("bid5"));
}
//bid6
var slideIndex0 = 1;
showBid6(slideIndex0, document.getElementsByClassName("bid6"));

function plusBid6(n) {
  showBid6((slideIndex0 += n), document.getElementsByClassName("bid6"));
}

//fungsi utama
function showDivs(n, x) {
  var i;
  if (n > x.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = x.length;
  }
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex - 1].style.display = "block";
}

function showAdkes(n, x) {
  var i;
  if (n > x.length) {
    slideIndex2 = 1;
  }
  if (n < 1) {
    slideIndex2 = x.length;
  }
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex2 - 1].style.display = "block";
}

function showDanus(n, x) {
  var i;
  if (n > x.length) {
    slideIndex3 = 1;
  }
  if (n < 1) {
    slideIndex3 = x.length;
  }
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex3 - 1].style.display = "block";
}

function showKl(n, x) {
  var i;
  if (n > x.length) {
    slideIndex4 = 1;
  }
  if (n < 1) {
    slideIndex4 = x.length;
  }
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex4 - 1].style.display = "block";
}

function showBid1(n, x) {
  var i;
  if (n > x.length) {
    slideIndex5 = 1;
  }
  if (n < 1) {
    slideIndex5 = x.length;
  }
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex5 - 1].style.display = "block";
}
function showBid2(n, x) {
  var i;
  if (n > x.length) {
    slideIndex6 = 1;
  }
  if (n < 1) {
    slideIndex6 = x.length;
  }
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex6 - 1].style.display = "block";
}
function showBid3(n, x) {
  var i;
  if (n > x.length) {
    slideIndex7 = 1;
  }
  if (n < 1) {
    slideIndex7 = x.length;
  }
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex7 - 1].style.display = "block";
}
function showBid4(n, x) {
  var i;
  if (n > x.length) {
    slideIndex8 = 1;
  }
  if (n < 1) {
    slideIndex8 = x.length;
  }
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex8 - 1].style.display = "block";
}
function showBid5(n, x) {
  var i;
  if (n > x.length) {
    slideIndex9 = 1;
  }
  if (n < 1) {
    slideIndex9 = x.length;
  }
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex9 - 1].style.display = "block";
}

function showBid6(n, x) {
  var i;
  if (n > x.length) {
    slideIndex0 = 1;
  }
  if (n < 1) {
    slideIndex0 = x.length;
  }
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex0 - 1].style.display = "block";
}
