document.addEventListener("DOMContentLoaded", function () {
  fetch("../../temp/partials/footer.html")
    .then((response) => {
      console.log(response); // Adicione esta linha para depuração
      return response.text();
    })
    .then((data) => {
      document.querySelector("footer").innerHTML = data;
    })
    .catch((error) => {
      console.error("Erro ao  carregar o footer:", error);
    });
});
