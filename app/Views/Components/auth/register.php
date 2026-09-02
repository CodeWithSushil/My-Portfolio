<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Professional Registration</title>

    <!-- Bootstrap 5.3.8 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        rel="stylesheet"
    >

    <style>

        /* =========================================================
           ROOT
        ========================================================= */

        :root {
            --register-primary: var(--bs-indigo);
            --register-primary-dark: #4b0082;

            --register-bg: #f1f3f5;
            --register-card: rgba(255, 255, 255, 0.92);

            --register-text: #212529;
            --register-muted: #6c757d;
            --register-border: #dee2e6;

            --register-radius: 20px;
        }


        /* =========================================================
           RESET
        ========================================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        html,
        body {
            min-height: 100%;
        }


        /* =========================================================
           BODY / BACKGROUND
        ========================================================= */

        body {
            min-height: 100vh;

            overflow-x: hidden;

            background:
                linear-gradient(
                    -45deg,
                    #f1f3f5,
                    #e9dfff,
                    #f5f0ff,
                    #e2e3ff
                );

            background-size: 400% 400%;

            animation:
                backgroundMove 14s ease infinite;

            color: var(--register-text);

            font-family:
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;
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

            background:
                rgba(102, 16, 242, 0.10);

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
                transform:
                    translate3d(0, 0, 0)
                    scale(1);
            }

            50% {
                transform:
                    translate3d(40px, -50px, 0)
                    scale(1.15);
            }
        }


        /* =========================================================
           REGISTRATION SECTION
        ========================================================= */

        #registrationForm {
            min-height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;
        }


        /* =========================================================
           REGISTRATION WRAPPER
        ========================================================= */

        .register-wrapper {
            width: 100%;
        }


        /* =========================================================
           REGISTRATION CARD
        ========================================================= */

        .register-card {
            border: 0;

            border-radius:
                var(--register-radius);

            background:
                var(--register-card);

            backdrop-filter:
                blur(14px);

            -webkit-backdrop-filter:
                blur(14px);

            box-shadow:
                0 25px 70px
                rgba(0, 0, 0, 0.12);

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


        .register-card .card-body {
            padding: 2rem;
        }


        /* =========================================================
           TEXT ANIMATION
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


        /* =========================================================
           TITLE
        ========================================================= */

        .register-title {
            color:
                var(--register-primary);

            font-weight: 800;

            letter-spacing:
                -0.5px;
        }


        .register-subtitle {
            color:
                var(--register-muted);
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
            color:
                var(--register-primary);

            background-color:
                transparent;

            border-right: 0;

            transition:
                transform 0.25s ease,
                border-color 0.25s ease;
        }


        .input-group .form-control {
            border-left: 0;
        }


        /* =========================================================
           INPUT POP-UP ANIMATION
        ========================================================= */

        .form-control {
            min-height: 48px;

            border-color:
                var(--register-border);

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease,
                border-color 0.25s ease;
        }


        .form-control:hover {
            transform:
                translateY(-2px);

            border-color:
                rgba(102, 16, 242, 0.45);
        }


        .form-control:focus {
            transform:
                translateY(-4px)
                scale(1.01);

            border-color:
                var(--register-primary);

            box-shadow:
                0 10px 25px
                rgba(102, 16, 242, 0.14);

            outline: none;
        }


        .input-group:focus-within
        .input-group-text {
            color:
                var(--register-primary);

            border-color:
                var(--register-primary);

            transform:
                translateY(-4px);
        }


        /* =========================================================
           PASSWORD WRAPPER
        ========================================================= */

        .password-wrapper {
            position: relative;
        }


        .password-wrapper .form-control {
            padding-right: 50px;
        }


        /* =========================================================
           PASSWORD TOGGLE
        ========================================================= */

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

            background:
                transparent;

            color:
                var(--register-muted);

            transform:
                translateY(-50%);

            cursor: pointer;

            border-radius: 50%;

            transition:
                color 0.2s ease,
                background-color 0.2s ease,
                transform 0.2s ease;
        }


        .password-toggle:hover {
            color:
                var(--register-primary);

            background-color:
                rgba(102, 16, 242, 0.08);

            transform:
                translateY(-50%)
                scale(1.08);
        }


        .password-toggle:focus-visible {
            outline:
                2px solid
                var(--register-primary);

            outline-offset: 2px;
        }


        /* =========================================================
           PASSWORD STRENGTH
        ========================================================= */

        .password-strength {
            height: 5px;

            margin-top: 8px;

            border-radius: 10px;

            background: #e9ecef;

            overflow: hidden;
        }


        .password-strength-bar {
            width: 0;

            height: 100%;

            border-radius: 10px;

            transition:
                width 0.3s ease;
        }


        .password-strength-text {
            font-size: 0.78rem;

            color:
                var(--register-muted);
        }


        /* =========================================================
           TERMS CHECKBOX
        ========================================================= */

        .form-checkbox {
            accent-color:
                var(--register-primary);

            cursor: pointer;
        }


        .terms-link {
            color:
                var(--register-primary);

            font-weight: 600;

            text-decoration: none;
        }


        .terms-link:hover {
            text-decoration: underline;
        }


        /* =========================================================
           REGISTER BUTTON
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
                    var(--register-primary),
                    var(--register-primary-dark)
                );

            box-shadow:
                0 8px 20px
                rgba(102, 16, 242, 0.25);

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }


        .btn-indigo:hover {
            color: #fff;

            transform:
                translateY(-3px);

            box-shadow:
                0 14px 30px
                rgba(102, 16, 242, 0.35);
        }


        .btn-indigo:active {
            transform:
                translateY(-1px);
        }


        /* =========================================================
           FOOTER
        ========================================================= */

        .signin-text {
            color:
                var(--register-muted);
        }


        .signin-link {
            color:
                var(--register-primary);

            font-weight: 700;

            text-decoration: none;
        }


        .signin-link:hover {
            text-decoration: underline;
        }


        /* =========================================================
           VALIDATION
        ========================================================= */

        .password-match-message {
            font-size: 0.8rem;

            margin-top: 6px;
        }


        /* =========================================================
           SM - >=576px
        ========================================================= */

        @media (min-width: 576px) {

            .register-card .card-body {
                padding: 2.25rem;
            }

            .register-title {
                font-size: 2rem;
            }
        }


        /* =========================================================
           MD - >=768px
        ========================================================= */

        @media (min-width: 768px) {

            #registrationForm {
                padding-top: 2rem;
                padding-bottom: 2rem;
            }

            .register-card {
                border-radius: 22px;
            }

            .register-card .card-body {
                padding: 2.5rem;
            }
        }


        /* =========================================================
           LG - >=992px
        ========================================================= */

        @media (min-width: 992px) {

            #registrationForm {
                padding-top: 3rem;
                padding-bottom: 3rem;
            }

            .register-card .card-body {
                padding: 2.75rem;
            }

            .register-title {
                font-size: 2.15rem;
            }
        }


        /* =========================================================
           XL - >=1200px
        ========================================================= */

        @media (min-width: 1200px) {

            .register-wrapper {
                max-width: 500px;
            }

            .register-card .card-body {
                padding: 3rem;
            }
        }


        /* =========================================================
           XXL - >=1400px
        ========================================================= */

        @media (min-width: 1400px) {

            .register-wrapper {
                max-width: 520px;
            }

            .register-card .card-body {
                padding: 3.25rem;
            }

            .register-title {
                font-size: 2.3rem;
            }
        }


        /* =========================================================
           XXXL - >=1600px
        ========================================================= */

        @media (min-width: 1600px) {

            #registrationForm {
                padding-top: 4rem;
                padding-bottom: 4rem;
            }

            .register-wrapper {
                max-width: 560px;
            }

            .register-card .card-body {
                padding: 3.5rem;
            }

            .register-title {
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
                animation-duration:
                    0.01ms !important;

                animation-iteration-count:
                    1 !important;

                transition-duration:
                    0.01ms !important;
            }
        }

    </style>
</head>


<body>


    <!-- =========================================================
         ANIMATED BACKGROUND
    ========================================================= -->

    <div
        class="background-animation"
        aria-hidden="true"
    >
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>



    <!-- =========================================================
         REGISTRATION
    ========================================================= -->

    <main>

        <section
            id="registrationForm"
            class="container-fluid"
        >

            <div class="row w-100 justify-content-center">

                <div
                    class="
                        col-12
                        col-sm-10
                        col-md-8
                        col-lg-6
                        col-xl-5
                        col-xxl-4
                    "
                >

                    <div class="register-wrapper mx-auto">

                        <div class="card register-card">

                            <div class="card-body">


                                <!-- =================================================
                                     HEADING
                                ================================================= -->

                                <div
                                    class="text-center mb-4"
                                >

                                    <h1
                                        class="
                                            register-title
                                            animated-title
                                            mb-2
                                        "
                                    >
                                        Create Account
                                    </h1>


                                    <p
                                        class="
                                            register-subtitle
                                            animated-subtitle
                                            mb-0
                                        "
                                    >
                                        Register to create your account.
                                    </p>

                                </div>



                                <!-- =================================================
                                     FORM
                                ================================================= -->

                                <form
                                    id="registerForm"
                                    action="#"
                                    method="post"
                                    novalidate
                                >


                                    <!-- =================================================
                                         FULL NAME
                                    ================================================= -->

                                    <div class="mb-4">

                                        <label
                                            class="
                                                form-label
                                                animated-label
                                            "
                                            for="fullName"
                                        >

                                            <i
                                                class="
                                                    bi
                                                    bi-person-circle
                                                    me-1
                                                "
                                                aria-hidden="true"
                                            ></i>

                                            Full Name

                                        </label>


                                        <div class="input-group">

                                            <span
                                                class="input-group-text"
                                            >

                                                <i
                                                    class="
                                                        bi
                                                        bi-person
                                                    "
                                                    aria-hidden="true"
                                                ></i>

                                            </span>


                                            <input
                                                class="form-control"
                                                type="text"
                                                name="full_name"
                                                id="fullName"
                                                placeholder="Enter your full name"
                                                autocomplete="name"
                                                minlength="2"
                                                required
                                            >

                                        </div>

                                        <div
                                            class="invalid-feedback"
                                        >
                                            Please enter your full name.
                                        </div>

                                    </div>



                                    <!-- =================================================
                                         EMAIL
                                    ================================================= -->

                                    <div class="mb-4">

                                        <label
                                            class="
                                                form-label
                                                animated-label
                                            "
                                            for="email"
                                        >

                                            <i
                                                class="
                                                    bi
                                                    bi-envelope
                                                    me-1
                                                "
                                                aria-hidden="true"
                                            ></i>

                                            Email Address

                                        </label>


                                        <div class="input-group">

                                            <span
                                                class="input-group-text"
                                            >

                                                <i
                                                    class="
                                                        bi
                                                        bi-envelope
                                                    "
                                                    aria-hidden="true"
                                                ></i>

                                            </span>


                                            <input
                                                class="form-control"
                                                type="email"
                                                name="email"
                                                id="email"
                                                placeholder="Enter your email address"
                                                autocomplete="email"
                                                required
                                            >

                                        </div>

                                        <div
                                            class="invalid-feedback"
                                        >
                                            Please enter a valid email address.
                                        </div>

                                    </div>



                                    <!-- =================================================
                                         PHONE
                                    ================================================= -->

                                    <!--<div class="mb-4">

                                        <label
                                            class="
                                                form-label
                                                animated-label
                                            "
                                            for="phone"
                                        >

                                            <i
                                                class="
                                                    bi
                                                    bi-telephone
                                                    me-1
                                                "
                                                aria-hidden="true"
                                            ></i>

                                            Phone Number

                                        </label>


                                        <div class="input-group">

                                            <span
                                                class="input-group-text"
                                            >

                                                <i
                                                    class="
                                                        bi
                                                        bi-phone
                                                    "
                                                    aria-hidden="true"
                                                ></i>

                                            </span>


                                            <input
                                                class="form-control"
                                                type="tel"
                                                name="phone"
                                                id="phone"
                                                placeholder="Enter your phone number"
                                                autocomplete="tel"
                                                pattern="[0-9+\-\s()]{7,20}"
                                                required
                                            >

                                        </div>

                                        <div
                                            class="invalid-feedback"
                                        >
                                            Please enter a valid phone number.
                                        </div>

                                    </div>-->



                                    <!-- =================================================
                                         PASSWORD
                                    ================================================= -->

                                    <div class="mb-4">

                                        <label
                                            class="
                                                form-label
                                                animated-label
                                            "
                                            for="password"
                                        >

                                            <i
                                                class="
                                                    bi
                                                    bi-lock
                                                    me-1
                                                "
                                                aria-hidden="true"
                                            ></i>

                                            Password

                                        </label>


                                        <div class="password-wrapper">

                                            <div class="input-group">

                                                <span
                                                    class="input-group-text"
                                                >

                                                    <i
                                                        class="
                                                            bi
                                                            bi-shield-lock
                                                        "
                                                        aria-hidden="true"
                                                    ></i>

                                                </span>


                                                <input
                                                    class="form-control"
                                                    type="password"
                                                    name="password"
                                                    id="password"
                                                    placeholder="Create a password"
                                                    autocomplete="new-password"
                                                    minlength="8"
                                                    required
                                                >

                                            </div>


                                            <button
                                                type="button"
                                                class="password-toggle"
                                                id="passwordToggle"
                                                aria-label="Show password"
                                                aria-pressed="false"
                                            >

                                                <i
                                                    class="
                                                        bi
                                                        bi-eye
                                                    "
                                                    id="passwordIcon"
                                                    aria-hidden="true"
                                                ></i>

                                            </button>

                                        </div>


                                        <!-- Password strength -->

                                        <div
                                            class="password-strength"
                                            aria-hidden="true"
                                        >

                                            <div
                                                id="passwordStrengthBar"
                                                class="password-strength-bar"
                                            ></div>

                                        </div>


                                        <div
                                            id="passwordStrengthText"
                                            class="password-strength-text mt-1"
                                        >
                                            Use at least 8 characters.
                                        </div>

                                    </div>



                                    <!-- =================================================
                                         CONFIRM PASSWORD
                                    ================================================= -->

                                    <div class="mb-4">

                                        <label
                                            class="
                                                form-label
                                                animated-label
                                            "
                                            for="confirmPassword"
                                        >

                                            <i
                                                class="
                                                    bi
                                                    bi-lock-fill
                                                    me-1
                                                "
                                                aria-hidden="true"
                                            ></i>

                                            Confirm Password

                                        </label>


                                        <div class="password-wrapper">

                                            <div class="input-group">

                                                <span
                                                    class="input-group-text"
                                                >

                                                    <i
                                                        class="
                                                            bi
                                                            bi-shield-lock
                                                        "
                                                        aria-hidden="true"
                                                    ></i>

                                                </span>


                                                <input
                                                    class="form-control"
                                                    type="password"
                                                    name="confirm_password"
                                                    id="confirmPassword"
                                                    placeholder="Confirm your password"
                                                    autocomplete="new-password"
                                                    minlength="8"
                                                    required
                                                >

                                            </div>


                                            <button
                                                type="button"
                                                class="password-toggle"
                                                id="confirmPasswordToggle"
                                                aria-label="Show confirm password"
                                                aria-pressed="false"
                                            >

                                                <i
                                                    class="
                                                        bi
                                                        bi-eye
                                                    "
                                                    id="confirmPasswordIcon"
                                                    aria-hidden="true"
                                                ></i>

                                            </button>

                                        </div>


                                        <div
                                            id="passwordMatchMessage"
                                            class="password-match-message"
                                        ></div>

                                    </div>



                                    <!-- =================================================
                                         TERMS
                                    ================================================= -->

                                    <div class="mb-4">

                                        <div class="form-check">

                                            <input
                                                class="
                                                    form-check-input
                                                    form-checkbox
                                                "
                                                type="checkbox"
                                                name="terms"
                                                id="terms"
                                                required
                                            >


                                            <label
                                                class="form-check-label"
                                                for="terms"
                                            >

                                                I agree to the

                                                <a
                                                    href="#"
                                                    class="terms-link"
                                                >
                                                    Terms & Conditions
                                                </a>

                                                and

                                                <a
                                                    href="#"
                                                    class="terms-link"
                                                >
                                                    Privacy Policy
                                                </a>

                                            </label>

                                        </div>


                                        <div
                                            class="invalid-feedback"
                                        >
                                            You must agree before creating
                                            your account.
                                        </div>

                                    </div>



                                    <!-- =================================================
                                         SUBMIT
                                    ================================================= -->

                                    <button
                                        type="submit"
                                        class="
                                            btn
                                            btn-indigo
                                            w-100
                                        "
                                    >

                                        <i
                                            class="
                                                bi
                                                bi-person-plus
                                                me-2
                                            "
                                            aria-hidden="true"
                                        ></i>

                                        Create Account

                                    </button>



                                    <!-- =================================================
                                         SIGN IN
                                    ================================================= -->

                                    <p
                                        class="
                                            signin-text
                                            animated-footer
                                            text-center
                                            mt-4
                                            mb-0
                                        "
                                    >

                                        Already have an account?

                                        <a
                                            href="#"
                                            class="signin-link"
                                        >
                                            Sign In
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

        document.addEventListener(
            "DOMContentLoaded",
            function () {


                /* =====================================================
                   PASSWORD ELEMENTS
                ===================================================== */

                const passwordInput =
                    document.getElementById("password");

                const passwordToggle =
                    document.getElementById("passwordToggle");

                const passwordIcon =
                    document.getElementById("passwordIcon");


                const confirmPasswordInput =
                    document.getElementById("confirmPassword");

                const confirmPasswordToggle =
                    document.getElementById(
                        "confirmPasswordToggle"
                    );

                const confirmPasswordIcon =
                    document.getElementById(
                        "confirmPasswordIcon"
                    );


                /* =====================================================
                   PASSWORD TOGGLE FUNCTION
                ===================================================== */

                function setupPasswordToggle(
                    input,
                    toggle,
                    icon,
                    showLabel,
                    hideLabel
                ) {

                    toggle.addEventListener(
                        "click",
                        function () {

                            const isPassword =
                                input.type === "password";


                            input.type =
                                isPassword
                                    ? "text"
                                    : "password";


                            icon.classList.toggle(
                                "bi-eye",
                                !isPassword
                            );


                            icon.classList.toggle(
                                "bi-eye-slash",
                                isPassword
                            );


                            toggle.setAttribute(
                                "aria-label",
                                isPassword
                                    ? hideLabel
                                    : showLabel
                            );


                            toggle.setAttribute(
                                "aria-pressed",
                                isPassword
                            );


                            input.focus();

                        }
                    );

                }


                setupPasswordToggle(
                    passwordInput,
                    passwordToggle,
                    passwordIcon,
                    "Show password",
                    "Hide password"
                );


                setupPasswordToggle(
                    confirmPasswordInput,
                    confirmPasswordToggle,
                    confirmPasswordIcon,
                    "Show confirm password",
                    "Hide confirm password"
                );



                /* =====================================================
                   PASSWORD STRENGTH
                ===================================================== */

                const strengthBar =
                    document.getElementById(
                        "passwordStrengthBar"
                    );

                const strengthText =
                    document.getElementById(
                        "passwordStrengthText"
                    );


                passwordInput.addEventListener(
                    "input",
                    function () {

                        const password =
                            passwordInput.value;

                        let strength = 0;


                        if (password.length >= 8) {
                            strength++;
                        }


                        if (/[A-Z]/.test(password)) {
                            strength++;
                        }


                        if (/[a-z]/.test(password)) {
                            strength++;
                        }


                        if (/[0-9]/.test(password)) {
                            strength++;
                        }


                        if (/[^A-Za-z0-9]/.test(password)) {
                            strength++;
                        }


                        const widths = [
                            "0%",
                            "20%",
                            "40%",
                            "60%",
                            "80%",
                            "100%"
                        ];


                        strengthBar.style.width = "100%";
                           /* widths[strength]; */


                        if (password.length === 0) {

                            strengthText.textContent =
                                "Use at least 8 characters.";
                                strengthBar.style.background="var(--bs-gray-300)";

                        }

                        else if (strength <= 2) {

                            strengthText.textContent =
                                "Weak password.";
                                strengthBar.style.background="var(--bs-red)";

                        }

                        else if (strength === 3) {

                            strengthText.textContent =
                                "Medium password.";
                                strengthBar.style.background="var(--bs-yellow)";

                        }

                        else if (strength === 4) {

                            strengthText.textContent =
                                "Strong password.";
                                strengthBar.style.background="var(--bs-orange)";

                        }

                        else {

                            strengthText.textContent =
                                "Very strong password.";
                                strengthBar.style.background="var(--bs-green)";

                        }


                        checkPasswordMatch();

                    }
                );



                /* =====================================================
                   CONFIRM PASSWORD
                ===================================================== */

                const passwordMatchMessage =
                    document.getElementById(
                        "passwordMatchMessage"
                    );


                function checkPasswordMatch() {

                    const password =
                        passwordInput.value;

                    const confirmPassword =
                        confirmPasswordInput.value;


                    if (!confirmPassword) {

                        passwordMatchMessage.textContent =
                            "";

                        confirmPasswordInput.classList.remove(
                            "is-valid",
                            "is-invalid"
                        );

                        return;
                    }


                    if (
                        password === confirmPassword
                    ) {

                        confirmPasswordInput.classList.remove(
                            "is-invalid"
                        );

                        confirmPasswordInput.classList.add(
                            "is-valid"
                        );

                        passwordMatchMessage.textContent =
                            "Passwords match.";

                        passwordMatchMessage.classList.remove(
                            "text-danger"
                        );

                        passwordMatchMessage.classList.add(
                            "text-success"
                        );

                    } else {

                        confirmPasswordInput.classList.remove(
                            "is-valid"
                        );

                        confirmPasswordInput.classList.add(
                            "is-invalid"
                        );

                        passwordMatchMessage.textContent =
                            "Passwords do not match.";

                        passwordMatchMessage.classList.remove(
                            "text-success"
                        );

                        passwordMatchMessage.classList.add(
                            "text-danger"
                        );
                    }

                }


                confirmPasswordInput.addEventListener(
                    "input",
                    checkPasswordMatch
                );



                /* =====================================================
                   FORM VALIDATION
                ===================================================== */

                const registerForm =
                    document.getElementById(
                        "registerForm"
                    );


                registerForm.addEventListener(
                    "submit",
                    function (event) {

                        event.preventDefault();


                        checkPasswordMatch();


                        if (
                            !registerForm.checkValidity()
                            ||
                            passwordInput.value !==
                            confirmPasswordInput.value
                        ) {

                            event.stopPropagation();

                            registerForm.classList.add(
                                "was-validated"
                            );

                            return;
                        }


                        /*
                         * Registration passed client-side validation.
                         *
                         * Send the form data to your backend here.
                         */

                        alert(
                            "Registration successful!"
                        );

                    }
                );

            }
        );

    </script>



    <!-- Bootstrap JavaScript -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    ></script>

</body>

</html>
