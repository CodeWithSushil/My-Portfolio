<!doctype html>
<html lang="en" data-theme="light">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="robots" content="index, follow" />
        <link rel="icon" href="favicon.ico" />
        <meta name="description" content="Sushil Kumar | Portfolio" />
        <title>Sushil Kumar | Portfolio</title>

        <!-- Bulma CSS -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bulma/1.0.4/css/bulma.min.css"
        />

        <!-- Font Awesome -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css"
            integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />

        <style>
            /* ========================================
           Global
        ======================================== */

            html {
                scroll-behavior: smooth;
            }

            body {
                min-height: 100vh;
                padding-top: 3.25rem;

                transition:
                    background-color 0.3s ease,
                    color 0.3s ease;
            }

            section {
                scroll-margin-top: 4rem;
            }

            /* ========================================
           Navbar
        ======================================== */

            .navbar {
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);

                transition:
                    background-color 0.3s ease,
                    box-shadow 0.3s ease;
            }

            .navbar-item {
                transition:
                    background-color 0.2s ease,
                    color 0.2s ease;
            }

            .navbar-item:hover {
                background-color: rgba(0, 0, 0, 0.05);
            }

            .navbar-burger {
                width: 3.25rem;
                height: 3.25rem;
            }

            .navbar-burger span {
                height: 2px;
            }

            /* ========================================
           Navbar Menu
        ======================================== */

            .navbar-menu {
                width: 100%;
            }

            .navbar-end {
                width: 100%;

                display: flex;
                align-items: center;
            }

            /* ========================================
           Day / Night Button
        ======================================== */

            .theme-toggle {
                margin-left: auto;

                width: 3.25rem;

                display: flex;
                align-items: center;
                justify-content: center;

                border-radius: 0.5rem;
            }

            .theme-toggle .icon {
                transition: transform 0.3s ease;
            }

            .theme-toggle:hover .icon {
                transform: rotate(15deg);
            }

            /* ========================================
           Hero
        ======================================== */

            .bg-img {
                min-height: 450px;

                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;

                padding: 5rem 1rem;

                background: url("https://picsum.photos/1400/1400");
                background-size: cover;
                background-position: center center;
                background-repeat: no-repeat;

                transition: background 0.3s ease;
            }

            .bg-img h1,
            .bg-img p {
                position: relative;
                z-index: 1;
            }

            .bg-img p {
                max-width: 800px;
            }

            /* ========================================
           Contact
        ======================================== */

            .contact-section {
                min-height: calc(100vh - 3.25rem);
            }

            .contact-form {
                width: 100%;
            }

            .contact-form .input,
            .contact-form .textarea {
                transition:
                    border-color 0.2s ease,
                    box-shadow 0.2s ease;
            }

            .contact-form .input:focus,
            .contact-form .textarea:focus {
                box-shadow: 0 0 0 0.125em rgba(72, 95, 199, 0.2);
            }

            /* ========================================
           Dark Mode
        ======================================== */

            html[data-theme="dark"] {
                background-color: #121212;
                color: #f5f5f5;
            }

            html[data-theme="dark"] body {
                background-color: #121212;
                color: #f5f5f5;
            }

            /* Navbar */

            html[data-theme="dark"] .navbar {
                background-color: #181818;
            }

            html[data-theme="dark"] .navbar-item,
            html[data-theme="dark"] .navbar-link {
                color: #f5f5f5;
            }

            html[data-theme="dark"] .navbar-item:hover,
            html[data-theme="dark"] .navbar-link:hover {
                background-color: #292929;
                color: #ffffff;
            }

            html[data-theme="dark"] .navbar-menu {
                background-color: #181818;
            }

            html[data-theme="dark"] .navbar-burger span {
                background-color: #ffffff;
            }

            /* Form */

            html[data-theme="dark"] .label {
                color: #f5f5f5;
            }

            html[data-theme="dark"] .input,
            html[data-theme="dark"] .textarea {
                background-color: #1e1e1e;
                border-color: #444;
                color: #f5f5f5;
            }

            html[data-theme="dark"] .input::placeholder,
            html[data-theme="dark"] .textarea::placeholder {
                color: #999;
            }

            /* Hero */

            html[data-theme="dark"] .bg-img {
                background:
                    linear-gradient(
                        rgba(18, 18, 18, 0.88),
                        rgba(18, 18, 18, 0.88)
                    ),
                    url("https://picsum.photos/1400/1400");

                background-size: cover;
                background-position: center;
            }

            html[data-theme="dark"] .has-text-dark {
                color: #ffffff !important;
            }

            /* ========================================
           Mobile
        ======================================== */

            @media screen and (max-width: 768px) {
                body {
                    padding-top: 3.25rem;
                }

                .navbar-menu {
                    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.08);
                }

                .navbar-end {
                    display: block;
                }

                .navbar-end .navbar-item {
                    padding: 0.9rem 1rem;
                }

                /*
             * Theme button on mobile
             */
                .theme-toggle {
                    width: auto;

                    margin-left: 0;

                    justify-content: flex-start;
                }

                .bg-img {
                    min-height: 380px;
                    padding: 4rem 1rem;
                }

                .bg-img h1 {
                    font-size: 2rem !important;
                }

                .bg-img p {
                    font-size: 1rem !important;
                    margin: 1rem !important;
                }

                .contact-section {
                    padding-left: 1rem;
                    padding-right: 1rem;
                }

                .contact-section .column {
                    width: 100%;
                }

                .is-fullwidth-mobile {
                    width: 100%;
                }
            }

            /* ========================================
           Small Mobile
        ======================================== */

            @media screen and (max-width: 480px) {
                .navbar-brand .navbar-item:first-child {
                    font-size: 1rem !important;
                }

                .bg-img {
                    min-height: 330px;
                    padding: 3rem 0.75rem;
                }

                .bg-img h1 {
                    font-size: 1.6rem !important;
                }

                .bg-img p {
                    font-size: 0.95rem !important;
                }

                .contact-section h2 {
                    font-size: 1.75rem !important;
                }
            }
        </style>
    </head>

    <body class="is-family-primary">
        <!-- ========================================
         Navbar
    ======================================== -->

        <nav
            class="navbar is-fixed-top has-shadow"
            role="navigation"
            aria-label="main navigation"
        >
            <div class="container">
                <div class="navbar-brand">
                    <!-- Logo / Name -->

                    <a
                        class="navbar-item is-size-5 has-text-weight-bold"
                        href="#"
                    >
                        <span class="icon mr-2">
                            <i class="fa-solid fa-laptop-code"></i>
                        </span>

                        <span> Sushil Kumar </span>
                    </a>

                    <!-- Mobile Burger -->

                    <a
                        role="button"
                        class="navbar-burger"
                        aria-label="menu"
                        aria-expanded="false"
                        aria-controls="navbarBasicExample"
                    >
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div>

                <!-- ========================================
                 Navbar Menu
            ======================================== -->

                <div id="navbarBasicExample" class="navbar-menu">
                    <div class="navbar-end">
                        <!-- Home -->

                        <a class="navbar-item" href="#home">
                            <span class="icon mr-1">
                                <i class="fa-solid fa-house"></i>
                            </span>

                            <span> Home </span>
                        </a>

                        <!-- Contact -->

                        <a class="navbar-item" href="#contact">
                            <span class="icon mr-1">
                                <i class="fa-solid fa-envelope"></i>
                            </span>

                            <span> Contact </span>
                        </a>

                        <!-- ========================================
                         Day / Night Toggle
                         Always on the right
                    ======================================== -->

                        <a
                            id="themeToggle"
                            class="navbar-item theme-toggle"
                            href="#"
                            aria-label="Switch theme"
                            title="Switch theme"
                        >
                            <span class="icon">
                                <i id="themeIcon" class="fa-solid fa-moon"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- ========================================
         Hero Section
    ======================================== -->

        <section id="home" class="section bg-img">
            <h1
                class="has-text-link has-text-centered has-text-weight-bold is-size-1-desktop is-size-2-tablet is-size-3-mobile"
            >
                Welcome to My Portfolio
            </h1>

            <p
                class="mt-4 has-text-centered is-size-5-desktop is-size-6-mobile"
            >
                Hello Developers,

                <span class="has-text-warning has-text-weight-bold">
                    I'm Sushil Kumar
                </span>

                aka

                <span class="has-text-warning has-text-weight-bold">
                    Code With Sushil </span
                >.
            </p>

            <div class="buttons mt-5">
                <a href="#contact" class="button is-link is-medium">
                    <span class="icon">
                        <i class="fa-solid fa-envelope"></i>
                    </span>

                    <span> Contact Me </span>
                </a>
            </div>
        </section>

        <!-- ========================================
         Contact Section
    ======================================== -->

        <section id="contact" class="section contact-section">
            <div class="container">
                <div class="columns is-centered">
                    <div
                        class="column is-10-tablet is-7-desktop is-6-widescreen"
                    >
                        <!-- Heading -->

                        <h2
                            class="is-size-2-desktop is-size-3-tablet is-size-4-mobile has-text-link has-text-centered is-uppercase has-text-weight-bold mb-6"
                        >
                            Contact
                        </h2>

                        <!-- ========================================
                         Contact Form
                    ======================================== -->

                        <form
                            id="contactForm"
                            class="contact-form"
                            method="post"
                        >
                            <!-- Name -->

                            <div class="field">
                                <label class="label" for="name"> Name </label>

                                <div class="control has-icons-left">
                                    <input
                                        id="name"
                                        name="name"
                                        class="input"
                                        type="text"
                                        placeholder="Full name"
                                        autocomplete="name"
                                        required
                                    />

                                    <span class="icon is-small is-left">
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                </div>
                            </div>

                            <!-- Email -->

                            <div class="field">
                                <label class="label" for="email"> Email </label>

                                <div class="control has-icons-left">
                                    <input
                                        id="email"
                                        name="email"
                                        class="input"
                                        type="email"
                                        placeholder="Email address"
                                        autocomplete="email"
                                        required
                                    />

                                    <span class="icon is-small is-left">
                                        <i class="fa-solid fa-envelope"></i>
                                    </span>
                                </div>
                            </div>

                            <!-- Subject -->

                            <div class="field">
                                <label class="label" for="subject">
                                    Subject
                                </label>

                                <div class="control has-icons-left">
                                    <input
                                        id="subject"
                                        name="subject"
                                        class="input"
                                        type="text"
                                        placeholder="Subject"
                                        required
                                    />

                                    <span class="icon is-small is-left">
                                        <i class="fa-solid fa-heading"></i>
                                    </span>
                                </div>
                            </div>

                            <!-- Message -->

                            <div class="field">
                                <label class="label" for="message">
                                    Message
                                </label>

                                <div class="control">
                                    <textarea
                                        id="message"
                                        name="message"
                                        class="textarea"
                                        placeholder="Write your message..."
                                        rows="6"
                                        required
                                    ></textarea>
                                </div>
                            </div>

                            <!-- Submit -->

                            <div class="field mt-5">
                                <div class="control">
                                    <button
                                        type="submit"
                                        class="button is-link is-medium is-fullwidth-mobile"
                                    >
                                        <span class="icon">
                                            <i
                                                class="fa-solid fa-paper-plane"
                                            ></i>
                                        </span>

                                        <span> Submit </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================
         JavaScript
    ======================================== -->

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                /* ==================================
                   Mobile Navbar
                ================================== */

                const burger = document.querySelector(".navbar-burger");

                const navbarMenu = document.querySelector(
                    "#navbarBasicExample",
                );

                if (burger && navbarMenu) {
                    burger.addEventListener("click", () => {
                        const isActive = burger.classList.toggle("is-active");

                        navbarMenu.classList.toggle("is-active", isActive);

                        burger.setAttribute("aria-expanded", String(isActive));
                    });

                    /* Close menu after clicking links */

                    navbarMenu
                        .querySelectorAll(".navbar-item")
                        .forEach((link) => {
                            link.addEventListener("click", () => {
                                burger.classList.remove("is-active");

                                navbarMenu.classList.remove("is-active");

                                burger.setAttribute("aria-expanded", "false");
                            });
                        });
                }

                /* ==================================
                   Theme
                ================================== */

                const themeToggle = document.querySelector("#themeToggle");

                /* Load saved theme */

                const savedTheme = localStorage.getItem("theme");

                if (savedTheme === "dark" || savedTheme === "light") {
                    document.documentElement.setAttribute(
                        "data-theme",
                        savedTheme,
                    );
                }

                updateThemeIcon();

                /* ==================================
                   Toggle Theme
                ================================== */

                function toggleTheme(event) {
                    event.preventDefault();

                    const html = document.documentElement;

                    const currentTheme = html.getAttribute("data-theme");

                    const newTheme = currentTheme === "dark" ? "light" : "dark";

                    html.setAttribute("data-theme", newTheme);

                    localStorage.setItem("theme", newTheme);

                    updateThemeIcon();
                }

                if (themeToggle) {
                    themeToggle.addEventListener("click", toggleTheme);
                }

                /* ==================================
                   Update Theme Icon
                ================================== */

                function updateThemeIcon() {
                    const theme =
                        document.documentElement.getAttribute("data-theme");

                    const icon = document.querySelector("#themeIcon");

                    if (!icon) {
                        return;
                    }

                    if (theme === "dark") {
                        icon.className = "fa-solid fa-sun";

                        themeToggle?.setAttribute(
                            "aria-label",
                            "Switch to light mode",
                        );

                        themeToggle?.setAttribute(
                            "title",
                            "Switch to light mode",
                        );
                    } else {
                        icon.className = "fa-solid fa-moon";

                        themeToggle?.setAttribute(
                            "aria-label",
                            "Switch to dark mode",
                        );

                        themeToggle?.setAttribute(
                            "title",
                            "Switch to dark mode",
                        );
                    }
                }

                /* ==================================
                   Contact Form
                ================================== */

                const contactForm = document.querySelector("#contactForm");

                if (contactForm) {
                    contactForm.addEventListener("submit", (event) => {
                        const submitButton = contactForm.querySelector(
                            "button[type='submit']",
                        );

                        if (submitButton) {
                            submitButton.classList.add("is-loading");

                            submitButton.disabled = true;
                        }
                    });
                }
            });
        </script>
    </body>
</html>

