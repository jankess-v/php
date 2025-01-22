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
    <title>Kursy językowe - Linguarium</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
          rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
          rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet"/>
</head>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container px-5">
        <a class="navbar-brand" href="#page-top">Kursy Językowe - Linguarium</a>
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
<!--                        <li><a class="dropdown-item" href="login.php">Zaloguj się</a></li>-->
<!--                        <li><a class="dropdown-item" href="register.php">Zarejestruj się</a></li>-->
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Header-->
<header class="masthead text-center text-white">
    <div class="masthead-content">
        <div class="container px-5">
            <h1 class="masthead-heading mb-0">Lingarium</h1>
            <h2 class="masthead-subheading mb-0">Odkryj pasję do języków z naszymi kursami</h2>
            <a class="btn btn-primary btn-xl rounded-pill mt-5" href="pricing.php">Oferta</a>
        </div>
    </div>
    <div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>
    <div class="bg-circle-4 bg-circle"></div>
</header>
<!-- Content section 1-->
<section id="scroll">
    <div class="container px-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/img01.jpg" alt="..."/></div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="p-5">
                    <h2 class="display-4">Japoński</h2>
                    <p>Zanurz się w fascynującym świecie japońskiej kultury i języka! Nasz kurs japońskiego wprowadzi Cię w tajniki pisma,
                        gramatyki i konwersacji, umożliwiając swobodną komunikację. Dołącz do nas i odkryj Japonię od zupełnie nowej strony!</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Content section 2-->
<section>
    <div class="container px-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6">
                <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/img02.jpg" alt="..."/></div>
            </div>
            <div class="col-lg-6">
                <div class="p-5">
                    <h2 class="display-4">Niemiecki</h2>
                    <p>Chcesz biegle posługiwać się jednym z najważniejszych języków biznesu i nauki w Europie? Nasz kurs niemieckiego pomoże
                        Ci opanować podstawy i zaawansowane aspekty języka, rozwijając zarówno umiejętności mówienia, jak i pisania. Zacznij
                        już teraz i otwórz sobie drzwi do nowych możliwości zawodowych!</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Content section 3-->
<section>
    <div class="container px-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/img03.jpg" alt="..."/></div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="p-5">
                    <h2 class="display-4">Francuski</h2>
                    <p>Francuski to język miłości, kultury i sztuki. Nasz kurs francuskiego pozwoli Ci cieszyć się pięknem tego języka,
                        ucząc Cię zarówno podstaw, jak i bardziej skomplikowanych struktur. Podróżuj po Francji, studiuj literaturę i
                        ciesz się francuską kuchnią – wszystko to stanie się łatwiejsze dzięki naszym lekcjom!</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer-->
<footer class="py-5 bg-black">
    <div class="container px-5"><p class="m-0 text-center text-white small">Copyright &copy; Linguarium 2024</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>