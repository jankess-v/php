<?php
    session_start();
    include_once "classes/RegistrationForm.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content/>
    <meta name="author" content/>
    <title>Lingarium - Zamów kurs</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="js/scripts.js"></script>
</head>
<body class="d-flex flex-column">
<main class="flex-shrink-0">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container px-5">
            <a class="navbar-brand" href="#scroll-down">Zamów Kurs</a>
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
                                    echo "<li><a class='dropdown-item' href='data.php'>Dane użytkownika</a></li>";
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
    <section class="py-5 formbg">
        <div class="container px-5">
            <!-- Contact form-->
            <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                <div class="text-center mb-5">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-bag-dash"></i>
                    </div>
                    <h1 class="fw-bolder">Zamów kurs</h1>
                    <p class="lead fw-normal text-muted mb-0">już dziś</p>
                </div>

                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
<!--                        Wybor kursu-->
                        <form id="contactForm">
                            <div class="row justify-content-center input-control">
                                <div class="error text-center" id="error_check"></div>
                                <div class="col-md-3">
                                    <div class="custom-control custom-checkbox image-checkbox">
                                        <input type="checkbox" class="custom-control-input checkboxes" id="japonski" value="japonski" name="kurs">
                                        <label class="custom-control-label" for="japonski">
                                            <img src="assets/img/japan.png" alt="#" class="img-fluid rounded-3">
                                            <span class="text-muted mb-0">Japoński<br><strong>129,99 zł</strong></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="custom-control custom-checkbox image-checkbox">
                                        <input type="checkbox" class="custom-control-input checkboxes" id="francuski" value="francuski" name="kurs">
                                        <label class="custom-control-label" for="francuski">
                                            <img src="assets/img/france.png" alt="#" class="img-fluid rounded-3">
                                            <span class="text-muted mb-0">Francuski<br><strong>149,99 zł</strong></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="custom-control custom-checkbox image-checkbox">
                                        <input type="checkbox" class="custom-control-input checkboxes" id="niemiecki" value="niemiecki" name="kurs">
                                        <label class="custom-control-label" for="niemiecki">
                                            <img src="assets/img/germany.png" alt="#" class="img-fluid rounded-3">
                                            <span class="text-muted mb-0">Niemiecki<br><strong>149,99 zł</strong></span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                             <!--Name input-->
                            <div class="form-floating mb-3 input-control">
                                <input class="form-control" id="imie" name="imie" type="text" placeholder="Imię">
                                <label for="imie">Imię</label>
                                <div class="error"></div>
                            </div>
                             <!--Nazwisko input-->
                            <div class="form-floating mb-3 input-control">
                                <input class="form-control" id="nazwisko" name="nazwisko" type="text" placeholder="Nazwisko">
                                <label for="imie">Nazwisko</label>
                                <div class="error"></div>
                            </div>
                             <!--Email address input-->
                            <div class="form-floating mb-3 input-control">
                                <input class="form-control" id="email" name="email" type="text" placeholder="name@example.com"/>
                                <label for="email">Email</label>
                                <div class="error"></div>
                            </div>
                             <!--Phone number input-->
                            <div class="form-floating mb-3 input-control">
                                <input class="form-control" id="phone" type="text" placeholder="123 456 789"/>
                                <label for="phone">Nr telefonu</label>
                                <div class="error"></div>
                            </div>
                             <!--Adres input-->
                            <div class="form-floating mb-3 input-control">
                                <input class="form-control" id="adres" type="text" placeholder="10-100, Ulica, Miasto">
                                <label for="adres">Adres</label>
                                <div class="error"></div>
                            </div>
<!--                             Submit success message
                             Submit error message
                             Submit Button-->
                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Zamów</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact cards-->
    <div class="container px-5">
        <div class="row gx-5 row-cols-2 row-cols-lg-4 py-5 justify-content-center">
            <div class="col">
                <a href="contact.html">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                            class="bi bi-chat-dots"></i></div>
                </a>
                <div class="h5 mb-2">Napisz maila</div>
                <p class="text-muted mb-0">Odpisujemy w godzinach 10:00 - 21:00 w dni robocze.</p>
            </div>
            <div class="col">
                <a href="contact.html">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                            class="bi bi-telephone"></i></div>
                </a>
                <div class="h5">Zadzwoń</div>
                <p class="text-muted mb-0">Odbieramy w godzinach 8:00 - 18:00 w dni robocze.</p>
            </div>
        </div>
    </div>
</main>
<!-- Footer-->
<footer class="bg-dark py-4 mt-auto">
    <div class="container px-5">
        <div class="row align-items-center justify-content-between flex-column flex-sm-row">
            <div class="col-auto">
                <div class="small m-0 text-white">Copyright &copy; Linguarium 2024</div>
            </div>
            <div class="col-auto">
                <a class="link-light small" href="contact.php">Contact</a>
            </div>
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
