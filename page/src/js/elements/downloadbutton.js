if (document.querySelector("#ahv-letter-download")) {
  document
    .querySelector("#ahv-letter-download")
    .addEventListener("click", function (e) {
      setTimeout(() => {
        shareBox(e);
      }, 400);
    });
}

function shareBox(e) {
  e.target.remove();
  document.getElementById("ahv-letter-share-wrapper").style.display = "block";
}
