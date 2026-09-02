<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Professional Sign In</title>

<!-- Bootstrap 5.3.8 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

<style>
/* =========================================================
           ROOT
========================================================= */

:root {
--login-primary: var(--bs-indigo);
--login-primary-dark: #4b0082;
--login-bg: #f1f3f5;
--login-card: rgba(255, 255, 255, 0.92);
--login-text: #212529;
--login-muted: #6c757d;
--login-border: #dee2e6;
--login-radius: 20px;
}

/* =========================================================
           BODY / BACKGROUND
========================================================= */
*{margin:0;padding:0;box-sizing:border-box;}

html,
body {
  min-height: 100%;
}

body {
  margin: 0;
  min-height: 100vh;
  overflow-x: hidden;
  background: linear-gradient(-45deg, #f1f3f5, #e9dfff, #f5f0ff, #e2e3ff);
  background-size: 400% 400%;
  animation: backgroundMove 14s ease infinite;
  color: var(--login-text);
  font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
}

@keyframes backgroundMove {
  0% {
    background-position: 0% 50%;
  }

  50% {
    background-position: 100% 50%;
  }

  100% {
    background-position: 0% 50%;
  }
}


        /* =========================================================
           ANIMATED BACKGROUND SHAPES
        ========================================================= */

        .background-animation {
            position: fixed;
            inset: 0;
            z-index: -1;

            overflow: hidden;
            pointer-events: none;
        }

        .background-animation span {
            position: absolute;

            display: block;

            width: 180px;
            height: 180px;

            border-radius: 50%;

            background: rgba(102, 16, 242, 0.10);

            filter: blur(2px);

            animation:
                floatingShape 12s ease-in-out infinite;
        }

        .background-animation span:nth-child(1) {
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }

        .background-animation span:nth-child(2) {
            top: 65%;
            left: 80%;

            width: 240px;
            height: 240px;

            animation-delay: 2s;
        }

        .background-animation span:nth-child(3) {
            top: 30%;
            left: 70%;

            width: 100px;
            height: 100px;

            animation-delay: 4s;
        }

        .background-animation span:nth-child(4) {
            top: 75%;
            left: 15%;

            width: 130px;
            height: 130px;

            animation-delay: 6s;
        }

        .background-animation span:nth-child(5) {
        top: 45%;
        left: 65%;

        width: 180px;
        height: 180px;

        animation-delay: 8s;
        }


        @keyframes floatingShape {

            0%,
            100% {
                transform: translate3d(0, 0, 0) scale(1);
            }

            50% {
                transform: translate3d(40px, -50px, 0) scale(1.15);
            }
        }


        /* =========================================================
           LOGIN SECTION
        ========================================================= */

        #loginForm {
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;
        }


        /* =========================================================
           LOGIN CARD
        ========================================================= */

        .login-wrapper {
            width: 100%;
        }

        .login-card {
            border: 0;

            border-radius: var(--login-radius);

            background: var(--login-card);

            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);

            box-shadow:
                0 25px 70px rgba(0, 0, 0, 0.12);

            overflow: hidden;

            animation:
                cardEntrance 0.9s ease both;
        }


        @keyframes cardEntrance {

            from {
                opacity: 0;
                transform:
                    translateY(40px)
                    scale(0.96);
            }

            to {
                opacity: 1;
                transform:
                    translateY(0)
                    scale(1);
            }
        }


        .login-card .card-body {
            padding: 2rem;
        }


        /* =========================================================
           TEXT ANIMATION - LEFT TO RIGHT
        ========================================================= */

        .animated-title,
        .animated-subtitle,
        .animated-label,
        .animated-link,
        .animated-footer {
            animation:
                slideFromLeft 0.9s ease both;
        }

        .animated-title {
            animation-delay: 0.15s;
        }

        .animated-subtitle {
            animation-delay: 0.25s;
        }

        .animated-label {
            animation-delay: 0.35s;
        }

        .animated-link {
            animation-delay: 0.45s;
        }

        .animated-footer {
            animation-delay: 0.55s;
        }


        @keyframes slideFromLeft {

            from {
                opacity: 0;

                transform:
                    translateX(-60px);
            }

            to {
                opacity: 1;

                transform:
                    translateX(0);
            }
        }


        .login-title {
            color: var(--login-primary);

            font-weight: 800;

            letter-spacing: -0.5px;
        }

        .login-subtitle {
            color: var(--login-muted);
        }


        /* =========================================================
           FORM
        ========================================================= */

        .form-label {
            font-weight: 600;
            color: #343a40;
        }

        .input-group {
            position: relative;
        }

        .input-group-text {
            color: var(--login-primary);

            background-color: transparent;

            border-right: 0;
        }

        .input-group .form-control {
            border-left: 0;
        }


        /* =========================================================
           INPUT POP-UP ANIMATION
        ========================================================= */

        .form-control {
            min-height: 48px;

            border-color: var(--login-border);

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease,
                border-color 0.25s ease;
        }

        .form-control:hover {
            transform: translateY(-2px);

            border-color:
                rgba(102, 16, 242, 0.45);
        }

        .form-control:focus {
            transform:
                translateY(-4px)
                scale(1.01);

            border-color:
                var(--login-primary);

            box-shadow:
                0 10px 25px rgba(102, 16, 242, 0.14);

            outline: none;
        }


        .input-group:focus-within .input-group-text {
            color: var(--login-primary);

            border-color:
                var(--login-primary);

            transform: translateY(-4px);
        }


        /* =========================================================
           PASSWORD TOGGLE
        ========================================================= */

        .password-wrapper {
            position: relative;
        }

        .password-wrapper .form-control {
            padding-right: 50px;
        }

        .password-toggle {
            position: absolute;

            top: 50%;
            right: 12px;

            z-index: 5;

            width: 36px;
            height: 36px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 0;

            background: transparent;

            color: var(--login-muted);

            transform: translateY(-50%);

            cursor: pointer;

            border-radius: 50%;

            transition:
                color 0.2s ease,
                background-color 0.2s ease,
                transform 0.2s ease;
        }

        .password-toggle:hover {
            color: var(--login-primary);

            background-color:
                rgba(102, 16, 242, 0.08);

            transform:
                translateY(-50%)
                scale(1.08);
        }

        .password-toggle:focus-visible {
            outline: 2px solid var(--login-primary);
            outline-offset: 2px;
        }


        /* =========================================================
           CHECKBOX
        ========================================================= */

        .form-checkbox {
            accent-color: var(--login-primary);

            cursor: pointer;
        }


        /* =========================================================
           LINKS
        ========================================================= */

        .login-link {
            color: #343a40;

            text-decoration: none;

            transition:
                color 0.2s ease,
                text-decoration 0.2s ease;
        }

        .login-link:hover,
        .login-link:focus {
            color: var(--login-primary);

            text-decoration: underline;
        }


        /* =========================================================
           SIGN IN BUTTON
        ========================================================= */

        .btn-indigo {
            min-height: 50px;

            border: 0;

            color: #fff;

            font-weight: 700;

            border-radius: 10px;

            background:
                linear-gradient(
                    135deg,
                    var(--login-primary),
                    var(--login-primary-dark)
                );

            box-shadow:
                0 8px 20px rgba(102, 16, 242, 0.25);

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }

        .btn-indigo:hover {
            color: #fff;

            transform:
                translateY(-3px);

            box-shadow:
                0 14px 30px rgba(102, 16, 242, 0.35);
        }

        .btn-indigo:active {
            transform:
                translateY(-1px);
        }


        /* =========================================================
           DIVIDER / FOOTER
        ========================================================= */

        .signup-text {
            color: var(--login-muted);
        }

        .signup-link {
            color: var(--login-primary);

            font-weight: 700;

            text-decoration: none;
        }

        .signup-link:hover {
            text-decoration: underline;
        }


        /* =========================================================
           SM - >=576px
        ========================================================= */

        @media (min-width: 576px) {

            .login-card .card-body {
                padding: 2.25rem;
            }

            .login-title {
                font-size: 2rem;
            }
        }


        /* =========================================================
           MD - >=768px
        ========================================================= */

        @media (min-width: 768px) {

            #loginForm {
                padding-top: 2rem;
                padding-bottom: 2rem;
            }

            .login-card {
                border-radius: 22px;
            }

            .login-card .card-body {
                padding: 2.5rem;
            }
        }


        /* =========================================================
           LG - >=992px
        ========================================================= */

        @media (min-width: 992px) {

            #loginForm {
                padding-top: 3rem;
                padding-bottom: 3rem;
            }

            .login-card .card-body {
                padding: 2.75rem;
            }

            .login-title {
                font-size: 2.15rem;
            }
        }


        /* =========================================================
           XL - >=1200px
        ========================================================= */

        @media (min-width: 1200px) {

            .login-wrapper {
                max-width: 450px;
            }

            .login-card .card-body {
                padding: 3rem;
            }
        }


        /* =========================================================
           XXL - >=1400px
        ========================================================= */

        @media (min-width: 1400px) {

            .login-wrapper {
                max-width: 480px;
            }

            .login-card .card-body {
                padding: 3.25rem;
            }

            .login-title {
                font-size: 2.3rem;
            }
        }


        /* =========================================================
           XXXL - >=1600px
        ========================================================= */

        @media (min-width: 1600px) {

            #loginForm {
                padding-top: 4rem;
                padding-bottom: 4rem;
            }

            .login-wrapper {
                max-width: 520px;
            }

            .login-card .card-body {
                padding: 3.5rem;
            }

            .login-title {
                font-size: 2.5rem;
            }

            .form-control {
                min-height: 52px;
            }

            .btn-indigo {
                min-height: 54px;
            }
        }


        /* =========================================================
           REDUCED MOTION
        ========================================================= */

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;

                transition-duration: 0.01ms !important;
            }
        }

    </style>
</head>


<body>

    <!-- =========================================================
         ANIMATED BACKGROUND
    ========================================================= -->

    <div class="background-animation" aria-hidden="true">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>


    <!-- =========================================================
         LOGIN
    ========================================================= -->

	<main>
    	<section id="loginForm" class="container-fluid">
            <div class="row w-100 justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="login-wrapper mx-auto">
                        <div class="card login-card">
                            <div class="card-body">

                                <!-- Heading -->
                                <div class="text-center mb-4">

                                    <h1
                                        class="login-title animated-title mb-2"
                                    >
                                        Welcome Back
                                    </h1>

                                    <p
                                        class="login-subtitle animated-subtitle mb-0"
                                    >
                                        Sign in to continue to your account.
                                    </p>

                                </div>


                                <!-- Form -->

                                <form
                                    action="#"
                                    method="post"
                                    novalidate
                                >

                                    <!-- Username -->

                                    <div class="mb-4">

                                        <label
                                            class="form-label animated-label"
                                            for="username"
                                        >
                                            <i
                                                class="bi bi-person-circle me-1"
                                                aria-hidden="true"
                                            ></i>

                                            Username
                                        </label>

                                        <div class="input-group">

                                            <span class="input-group-text">
                                                <i
                                                    class="bi bi-person"
                                                    aria-hidden="true"
                                                ></i>
                                            </span>

                                            <input
                                                class="form-control"
                                                type="text"
                                                name="username"
                                                id="username"
                                                placeholder="Enter your username"
                                                autocomplete="username"
                                                required
                                            >

                                        </div>

                                    </div>


                                    <!-- Password -->

                                    <div class="mb-4">

                                        <label
                                            class="form-label animated-label"
                                            for="password"
                                        >
                                            <i
                                                class="bi bi-lock me-1"
                                                aria-hidden="true"
                                            ></i>

                                            Password
                                        </label>


                                        <div class="password-wrapper">

                                            <div class="input-group">

                                                <span class="input-group-text">
                                                    <i
                                                        class="bi bi-shield-lock"
                                                        aria-hidden="true"
                                                    ></i>
                                                </span>

                                                <input
                                                    class="form-control"
                                                    type="password"
                                                    name="password"
                                                    id="password"
                                                    placeholder="Enter your password"
                                                    autocomplete="current-password"
                                                    required
                                                >

                                            </div>


                                            <!-- Password visibility button -->

                                            <button
                                                type="button"
                                                class="password-toggle"
                                                id="passwordToggle"
                                                aria-label="Show password"
                                                aria-pressed="false"
                                            >
                                                <i
                                                    class="bi bi-eye"
                                                    id="passwordIcon"
                                                    aria-hidden="true"
                                                ></i>
                                            </button>

                                        </div>

                                    </div>


                                    <!-- Remember / Forgot -->

                                    <div
                                        class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-2 mb-4"
                                    >

                                        <div class="form-check">

                                            <input
                                                class="form-check-input form-checkbox"
                                                type="checkbox"
                                                name="remember_me"
                                                id="rememberMe"
                                                value="remember_me_token"
                                                checked
                                            >

                                            <label
                                                class="form-check-label"
                                                for="rememberMe"
                                            >
                                                Remember Me
                                            </label>

                                        </div>


                                        <a
                                            class="login-link animated-link"
                                            href="#"
                                        >
                                            Forgot Password?
                                        </a>

                                    </div>


                                    <!-- Submit -->

                                    <button
                                        type="submit"
                                        class="btn btn-indigo w-100"
                                    >
                                        <i
                                            class="bi bi-box-arrow-in-right me-2"
                                            aria-hidden="true"
                                        ></i>

                                        Sign In
                                    </button>


                                    <!-- Sign Up -->

                                    <p
                                        class="signup-text animated-footer text-center mt-4 mb-0"
                                    >
                                        Don't have an account?

                                        <a
                                            href="#"
                                            class="signup-link"
                                        >
                                            Sign Up
                                        </a>
                                    </p>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>


    <!-- =========================================================
         JAVASCRIPT
    ========================================================= -->

    <script>

        document.addEventListener("DOMContentLoaded", function () {

            const passwordInput =
                document.getElementById("password");

            const passwordToggle =
                document.getElementById("passwordToggle");

            const passwordIcon =
                document.getElementById("passwordIcon");


            passwordToggle.addEventListener("click", function () {

                const isPassword =
                    passwordInput.type === "password";


                /* Change input type */

                passwordInput.type =
                    isPassword ? "text" : "password";


                /* Change icon */

                passwordIcon.classList.toggle(
                    "bi-eye",
                    !isPassword
                );

                passwordIcon.classList.toggle(
                    "bi-eye-slash",
                    isPassword
                );


                /* Accessibility */

                passwordToggle.setAttribute(
                    "aria-label",
                    isPassword
                        ? "Hide password"
                        : "Show password"
                );

                passwordToggle.setAttribute(
                    "aria-pressed",
                    isPassword
                );


                /* Keep focus on input */

                passwordInput.focus();

            });

        });

    </script>


    <!-- Bootstrap JavaScript -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    ></script>

</body>
</html>
