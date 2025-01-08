<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Linguarium - Kontakt</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
                <div class="container px-5">
                    <a class="navbar-brand" href="#page-top">Kontakt</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="index.php">Strona główna</a></li>
                            <li class="nav-item"><a class="nav-link" href="pricing.php">Oferta</a></li>
                            <li class="nav-item"><a class="nav-link" href="form.php">Zamów kurs</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.php">O nas</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.php">Kontakt</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    <!-- Ikonka SVG -->
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#fffaf0">
                                        <path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/>
                                    </svg>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
	                                <?php
                                        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                                            echo "<li><a class='dropdown-item' href='userData.php'>Dane użytkownika</a></li>";
                                            echo "<li><a class='dropdown-item' href='history.php'>Historia zamówień</a></li>";
                                            echo "<li><a class='dropdown-item' href='login.php?action=wyloguj'>Wyloguj się</a></li>";
                                        } else {
                                            echo "<li><a class='dropdown-item' href='login.php'>Zaloguj się</a></li>";
                                            echo "<li><a class='dropdown-item' href='register.php'>Zarejestruj się</a></li>";
                                        }
	                                ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <section class="py-5 contactbg">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                            <h1 class="fw-bolder">Kontakt</h1>
                            <p class="lead fw-normal text-muted mb-0">Chętnie pomożemy w razie jakichkolwiek pytań!</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <div class="col mb-2">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-telephone"></i></div>
                                    <div class="h5">Zadzwoń</div>
                                    <p class="text-muted mb-0">Odbieramy w godzinach 8:00 - 18:00 w dni robocze.</p>
                                    <p class="text-dark mb-0 pb-1"><strong>Marek:</strong> +48 123 456 789.</p>
                                    <p class="text-dark mb-0 pb-1"><strong>Żaneta:</strong> +48 987 654 321.</p>
                                </div>
                                <div class="col mb-2">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-chat-dots"></i></div>
                                    <div class="h5 mb-2">Napisz maila</div>
                                    <p class="text-muted mb-0">Odpisujemy w godzinach 10:00 - 21:00 w dni robocze.</p>
                                    <p class="text-dark mb-0"><strong>linguarium@gmail.com</strong></p>
                                </div>
                                <div class="col mb-2">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-pin-map"></i></div>
                                    <div class="h5 mb-2">Odwiedź nasze biuro</div>
                                    <p class="text-muted mb-3">Otwarte w godzinach 8:00 - 16:00, pon - pt.</p>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2498.130747867869!2d22.54679567686605!3d51.23508688055995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4722577729316bd9%3A0x442236391b743bc!2sPolitechnika%20Lubelska%2C%2020-618%20Lublin!5e0!3m2!1spl!2spl!4v1717324710702!5m2!1spl!2spl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between  flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Linguarium 2024</div></div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
