<?php
    session_start();
    $id = session_id();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Linguarium - Oferta</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="d-flex flex-column">
<main class="flex-shrink-0">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container px-5">
            <a class="navbar-brand" href="#page-top">Oferta</a>
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
    <!-- Pricing section-->
    <section class="bg-light">
        <div class="text-center mt-0 contbaner">
            <h1 class="fw-bolder">Nasza Oferta</h1>
            <p class="lead fw-normal text-muted mb-1">Odkryj świat języków już dziś!</p>
        </div>
        <div class="container px-5">
            <!-- Carousel section-->
            <div id="carouselExampleCaptions" class="carousel slide mb-5" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/img/slide1.jpg" class="d-block w-75 rounded-3" data-bs-interval="2000"
                             alt="Japan">
                        <div class="carousel-caption">
                            <h5 class="fw-bolder">Kurs Japońskiego</h5>
                            <p class="lead fw-normal mb-0">Opanuj język kraju kwitnącej wiśni z naszym kursem
                                japońskiego! - 129.99 zł</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/slide2.jpg" class="d-block w-75 rounded-3" data-bs-interval="2000"
                             alt="Germany">
                        <div class="carousel-caption">
                            <h5 class="fw-bolder">Kurs Niemieckiego</h5>
                            <p class="lead fw-normal mb-0">Zanurz się w języku Goethego i odkryj bogactwo kultury
                                niemieckiej! - 149.99 zł</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/slide3.jpg" class="d-block w-75 rounded-3" data-bs-interval="2000"
                             alt="France">
                        <div class="carousel-caption">
                            <h5 class="fw-bolder">Kurs Francuskiego</h5>
                            <p class="lead fw-normal mb-0">Parlez-vous français? Rozpocznij swoją przygodę z językiem
                                francuskim już dziś! - 149.99 zł</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gx-5 justify-content-center">
                <!-- Język japoński -->
                <div class="col-lg-6 col-xl-4">
                    <div class="card mb-5 mb-xl-0">
                        <div class="card-body p-5">
                            <div class="small text-uppercase fw-bold text-muted">Kurs japońskiego</div>
                            <div class="mb-3">
                                <span class="display-4 fw-bold">129,99 zł</span>
                                <span class="text-muted">/ mies.</span>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    <strong>Zgłębienie kultury i tradycji japońskiej</strong>
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    Kwalifikacje do pracy w firmach japońkich i międzynarodowych
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    Możliwość przystąpienia do egzaminu JLPT
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    Nauka podstaw i zaawansowanego japońskiego
                                </li>
                                <li class="mb-2 text-primary">
                                    <i class="bi bi-check"></i>
                                    Dostęp do materiałów online
                                </li>
                                <li class="mb-2 text-primary">
                                    <i class="bi bi-check"></i>
                                    Zajęcia prowadzone przez native speakerów
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--Język niemiecki-->
                <div class="col-lg-6 col-xl-4">
                    <div class="card mb-5 mb-xl-0">
                        <div class="card-body p-5">
                            <div class="small text-uppercase fw-bold text-muted">
                                Kurs niemieckiego
                            </div>
                            <div class="mb-3">
                                <span class="display-4 fw-bold">149,99 zł</span>
                                <span class="text-muted">/ mies.</span>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    <strong>Zdobycie kluczowych umiejętności językowych dla kariery zawodowej w
                                        Niemczech</strong>
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    Możliwość korzystania z programów wymiany studenckiej
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    Nauka podstaw i zaawansowanego niemieckiego
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    Przygotowanie do egzaminów certyikacyjnych z języka niemieckiego
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    Możliwość uczestnictwa w niemieckich konferencjach i seminariach
                                </li>
                                <li class="mb-2 text-primary">
                                    <i class="bi bi-check"></i>
                                    Dostęp do materiałów online
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--Język francuski-->
                <div class="col-lg-6 col-xl-4">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="small text-uppercase fw-bold text-muted">Kurs francuskiego</div>
                            <div class="mb-3">
                                <span class="display-4 fw-bold">149,99 zł</span>
                                <span class="text-muted">/ mies.</span>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    <strong>Zdobycie solidnych podstaw gramatyki i fonetyki francuskiej</strong>
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    Nauka płynnej komunikacji
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    Możliwość rozmowy z innymi uczestnikami bądź nauczycielami po francusku
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    Przygotowanie do egzaminów językowych
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    Znajomość francuskiego słownictwa specjalistycznego
                                </li>
                                <li class="mb-2 text-primary">
                                    <i class="bi bi-check"></i>
                                    Dostęp do materiałów online
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-grid w-100 justify-content-around my-2"><a class="btn btn-outline-primary" href="form.php">Zamów kurs już dzisiaj!</a></div>
    </section>
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
</body>
</html>
