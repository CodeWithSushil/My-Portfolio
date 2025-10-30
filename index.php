<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="My Portfolio" />
        <meta name="robots" content="index, follow" />
        <link rel="icon" href="favicon.ico" />
        <title>My Portfolio</title>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bulma/1.0.4/css/bulma.min.css"
            integrity="sha512-yh2RE0wZCVZeysGiqTwDTO/dKelCbS9bP2L94UvOFtl/FKXcNAje3Y2oBg/ZMZ3LS1sicYk4dYVGtDex75fvvA=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
            integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <link rel="stylesheet" href="./assets/style.css" />
    </head>
    <body class="is-family-primary">
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item is-size-5 has-text-dark" href="/">
                    My Portfolio
                </a>

                <a
                    role="button"
                    class="navbar-burger"
                    aria-label="menu"
                    aria-expanded="false"
                    data-target="navbarBasicExample"
                >
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-end">
                    <a class="navbar-item" href="/"> Home </a>

                    <a class="navbar-item" href="./contact.php"> Contact </a>
                </div>
            </div>
        </nav>
        <!--header-->
        <section class="section bg-img">
            <h2
                class="mt-4 is-size-4-mobile is-size-3-tablet is-size-2-desktop is-size-1-widescreen has-text-link has-text-centered"
            >
                Welcome to My Portfolio
            </h2>
            <p class="m-4 has-text-centered is-size-6-mobile is-size-5-desktop">
                Hello Developers,
                <span class="has-text-warning"> I'm Sushil Kumar</span> aka
                <span class="has-text-warning">Code With Sushil</span>.
            </p>
        </section>
                <section class="section">
            <div class="columns is-centered">
                <div class="column is-mobile is-6-desktop is-10-tablet">
                    <h2
                        class="is-size-4-mobile is-size-3-tablet is-size-2-desktop is-size-1-widescreen has-text-link has-text-centered is-uppercase"
                    >
                        Contact
                    </h2>
                    <form method="post">
                        <div class="field">
                            <label class="label">Name</label>
                            <div class="control">
                                <input
                                    class="input"
                                    type="text"
                                    placeholder="Full name"
                                    required
                                />
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input
                                    class="input"
                                    type="email"
                                    placeholder="Email address"
                                    required
                                />
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Subject</label>
                            <div class="control">
                                <input
                                    class="input"
                                    type="text"
                                    placeholder="Subject"
                                    required
                                />
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Message</label>
                            <div class="control">
                                <textarea
                                    class="textarea"
                                    placeholder="Textarea"
                                    required
                                ></textarea>
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <script src="./assets/main.js"></script>
    </body>
</html>
