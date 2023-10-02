document.addEventListener("DOMContentLoaded", function () {
  fetch("../../temp/partials/footer.html") // Corrija o caminho para o arquivo footer.html
    .then((response) => response.text())
    .then((data) => {
      document.querySelector("footer").innerHTML = data;
    });
});
