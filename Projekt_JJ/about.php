<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Linguarium - O nas</title>
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
            <a class="navbar-brand" href="#page-top">O nas</a>
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
    <!-- Header-->
    <header class="py-5">
        <div class="container px-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xxl-6">
                    <div class="text-center my-5">
                        <h1 class="fw-bolder mb-3">Witamy w Linguarium!</h1>
                        <p class="lead fw-normal text-muted mb-4">
                            Chcesz płynnie posługiwać się nowym językiem? Marzysz o podróżach bez barier językowych,
                            awansie zawodowym lub po prostu rozwijaniu swoich umiejętności? Linguarium to miejsce, gdzie
                            nauka języków obcych staje się przyjemnością!
                        </p>
                        <a class="btn btn-primary btn-lg" href="#scroll-target">Dowiedz się wiecej</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- About section one-->
    <section class="py-5 bg-light" id="scroll-target">
        <div class="container px-5 my-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0"
                                           src="assets/img/baner2.png" alt="..."/></div>
                <div class="col-lg-6">
                    <h2 class="fw-bolder">Nasza misja</h2>
                    <p class="lead fw-normal text-muted mb-0">
                        Naszym celem jest pomaganie ludziom w odkrywaniu nowych kultur, poszerzaniu horyzontów i
                        osiąganiu sukcesów zawodowych dzięki znajomości
                        języków obcych. Wierzymy, że nauka języków otwiera drzwi do nieskończonych możliwości – od
                        podróżowania bez barier, przez lepsze zrozumienie
                        różnorodności świata, po zdobycie przewagi na rynku pracy.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- About section two-->
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-first order-lg-last"><img class="img-fluid rounded mb-5 mb-lg-0"
                                                                     src="assets/img/baner1.jpg"
                                                                     alt="..."/></div>
                <div class="col-lg-6">
                    <h2 class="fw-bolder">Nasze wartości</h2>
                    <ul class="lead fw-normal text-muted mb-0">
                        <li>Jakość: Wysoki poziom nauczania dzięki doświadczonym lektorom i starannie opracowanym
                            materiałom.
                        </li>
                        <li>Dostępność: Elastyczne godziny nauki i dostępność kursów online z dowolnego miejsca na
                            świecie.
                        </li>
                        <li>Indywidualne Podejście: Kursy dostosowane do indywidualnych potrzeb i poziomu każdego
                            ucznia.
                        </li>
                        <li>Innowacyjność: Nowoczesne metody nauczania, interaktywne materiały i wykorzystanie
                            najnowszych technologii.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- About section three-->
    <section class="py-5 bg-light">
        <div class="container px-5 my-5">
            <div class="row gx-5 text-center">
                <h2 class="fw-bolder mb-3">Dlaczego my?</h2>
                <div class="lead fw-normal text-muted mb-0">
                    <p>Bogata oferta: Kursy z różnych języków, takich jak japoński, niemiecki, francuski i wiele
                        innych.</p>
                    <p>Efektywność: Skuteczne metody nauczania, które szybko przynoszą rezultaty.</p>
                    <p>Wsparcie: Stała pomoc i wsparcie ze strony lektorów na każdym etapie nauki.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Team members section-->
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="text-center">
                <h2 class="fw-bolder">Nasz zespół</h2>
                <p class="lead fw-normal text-muted mb-5">Jesteśmy zespołem profesjonalnych lektorów i ekspertów
                    językowych,
                    którzy są zdeterminowani, aby pomóc Ci osiągnąć Twoje cele. Każdy z nas posiada wieloletnie
                    doświadczenie
                    w nauczaniu języków obcych i pasję do dzielenia się swoją wiedzą.</p>
            </div>
            <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
                <div class="col mb-5 mb-5 mb-xl-0">
                    <div class="text-center">
                        <img class="img-fluid rounded-circle mb-4 px-4"
                             src="assets/img/jakub.jpg" alt="..."/>
                        <h5 class="fw-bolder">Jakub Jankowski</h5>
                        <div class="fst-italic text-muted">Founder & CEO & Koordynator Programów Edukacyjnych</div>
                    </div>
                </div>
                <div class="col mb-5 mb-5 mb-xl-0">
                    <div class="text-center">
                        <img class="img-fluid rounded-circle mb-4 px-4"
                             src="assets/img/anna.jpg" alt="..."/>
                        <h5 class="fw-bolder">Anna Kowalska</h5>
                        <div class="fst-italic text-muted">Główna Lektorka Języka Francuskiego</div>
                    </div>
                </div>
                <div class="col mb-5 mb-5 mb-sm-0">
                    <div class="text-center">
                        <img class="img-fluid rounded-circle mb-4 px-4"
                             src="assets/img/gunter.jpg" alt="..."/>
                        <h5 class="fw-bolder">Günter Fisher</h5>
                        <div class="fst-italic text-muted">Główny Lektor Języka Niemieckiego</div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="text-center">
                        <img class="img-fluid rounded-circle mb-4 px-4"
                             src="assets/img/hana.jpg" alt="..."/>
                        <h5 class="fw-bolder">Hana Tsubasa</h5>
                        <div class="fst-italic text-muted">Główna Lektorka Języka Japońskiego</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- Footer-->
<footer class="bg-dark py-4 mt-auto">
    <div class="container px-5">
        <div class="row align-items-center justify-content-between flex-column flex-sm-row">
            <div class="col-auto">
                <div class="small m-0 text-white">Copyright &copy; Lingarium 2024</div>
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
