const navbarBurger = document.querySelector(".navbar-burger");
const navbarMenu = document.querySelector("#portfolioNavbar");

navbarBurger.addEventListener("click", ()=> {
  const isActive = navbarBurger.classList.toggle("is-active");

  navbarMenu.classList.toggle("is-active");

  navbarBurger.setAttribute("aria-expanded", isActive);
});

document.querySelectorAll(".navbar-menu .navbar-item").forEach((item)=> {
  
  item.addEventListener("click", ()=> {
    navbarBurger.classList.remove("is-active");
    navbarMenu.classList.remove("is-active");
    navbarBurger.setAttribute("aria-expanded","false");

  });

});

const themeToggle = document.querySelector("#themeToggle");
const themeIcon = document.querySelector("#themeIcon");
const savedTheme = localStorage.getItem("portfolio-theme");

if (savedTheme) {
  document.documentElement.setAttribute("data-theme", savedTheme);

  updateThemeIcon(savedTheme);
}

themeToggle.addEventListener("click", ()=> {
  const currentTheme = document.documentElement.getAttribute("data-theme");

  const newTheme = currentTheme === "dark" ? "light" : "dark";

  document.documentElement.setAttribute("data-theme", newTheme);

  localStorage.setItem("portfolio-theme", newTheme);
  updateThemeIcon(newTheme);
});

function updateThemeIcon(theme) {
  if (theme === "dark") {
    themeIcon.className = "fa-solid fa-sun";
  } else {
    themeIcon.className = "fa-solid fa-moon";
  }
}

