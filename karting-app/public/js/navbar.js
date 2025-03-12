export function setupNavbar() {
  document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("navbarToggle");
    const menu = document.getElementById("navbarMenu");

    if (toggleButton && menu) {
      toggleButton.addEventListener("click", function () {
        menu.classList.toggle("show");
      });
    }
  });
}