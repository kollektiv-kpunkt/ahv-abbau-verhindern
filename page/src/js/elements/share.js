if (document.querySelector(".ahv-share-buttons")) {
  document
    .querySelectorAll(".ahv-share-buttons .ahv-share-button")
    .forEach((button) => {
      button.addEventListener("click", function (e) {
        e.preventDefault();
        let type = e.target.getAttribute("id");
        const shareText = document
          .getElementById("ahv-letter-share-wrapper")
          .getAttribute("data-sharetext");
        shareHandler(type, shareText, window.location.href);
      });
    });
}

function shareHandler(type, shareText, url) {
  switch (type) {
    case "WA":
      window.open(
        "https://wa.me/?text=" + encodeURIComponent(shareText),
        "_blank"
      );
      break;
    case "FB":
      window.open(
        "https://www.facebook.com/sharer/sharer.php?u=" +
          encodeURIComponent(url),
        "_blank"
      );
      break;
    case "tele":
      window.open(
        "https://telegram.me/share/url?url=" +
          encodeURIComponent(url) +
          "&text=" +
          encodeURIComponent(shareText),
        "_blank"
      );
      break;
    case "twitter":
      window.open(
        "https://twitter.com/intent/tweet?url=" +
          encodeURIComponent(url) +
          "&text=" +
          encodeURIComponent(shareText),
        "_blank"
      );
      break;
    case "email":
      window.open(
        "mailto:?subject=''&body=" + encodeURIComponent(shareText),
        "_blank"
      );
      break;
  }
}
