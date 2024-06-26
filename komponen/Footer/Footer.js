window.addEventListener('DOMContentLoaded', () => {
    fetch("/komponen/Footer/Footer.html")
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("footer").innerHTML = data;
        })
        .catch((err) => {
            console.error(`Error fetching footer: ${err}`);
        });
});
