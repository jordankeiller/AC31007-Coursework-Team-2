<?php
    include "php/__GLOBAL_CONFIG__.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionnaire Extraordinare</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/customBootstrap.css">
    <link rel="stylesheet" href="css/styleSheet.css">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand" href="index.html">Questionnaire Extraordinare</a>

            <!-- Menu button for mobile version -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- /Menu button for mobile version -->

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <button class="btn btn-outline-light d-flex" type="submit">Log In</button>
            </div>
        </div>
    </nav>

    <div class="container bg-white">
        <div class="row">
            <div class="col">
                <h1 class="text-primary">Understanding Subtitle Usage</h1>
                    <form action="php/questionnaire_processing.php" method="post">
                        <?php include "php/questionnaire_questions.php" ?>
                        <input id="submit" name="submit" class="btn btn-lg btn-primary btn-block"  type="submit" value="Submit">
                    </form>

                    <br>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footerBottom bg-dark">
        <div class="container">
            <div class="row">
                <div class="col my-3">
                    <p class="text-center text-light mb-0">Questionnaire Extraordinare © 2021</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- /Footer -->

    <script src="bootstrap/js/bootstrap.js"></script>
</body>

</html>