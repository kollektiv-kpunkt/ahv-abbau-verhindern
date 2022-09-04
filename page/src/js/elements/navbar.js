if (document.querySelector(".ahv-navbar-mobilemenu-button")) {
  document
    .querySelector(".ahv-navbar-mobilemenu-button")
    .addEventListener("click", function () {
      toggleMenu();
    });
}

if (document.querySelector(".ahv-navbar-mobilemenu-item-link")) {
  document
    .querySelectorAll(".ahv-navbar-mobilemenu-item-link")
    .forEach((item) => {
      item.addEventListener("click", function () {
        toggleMenu();
      });
    });
}

function toggleMenu() {
  let mobileMenu = document.querySelector(".ahv-navbar-mobilemenu");
  mobileMenu.classList.toggle("ahv-mobilemenu-open");
  let menuheight;
  if (mobileMenu.classList.contains("ahv-mobilemenu-open")) {
    menuheight = document.querySelector(
      ".ahv-navbar-mobilemenu-inner"
    ).offsetHeight;
  } else {
    menuheight = 0;
  }
  document.querySelector(
    ".ahv-navbar-mobilemenu-content"
  ).style.maxHeight = `${menuheight}px`;
}
