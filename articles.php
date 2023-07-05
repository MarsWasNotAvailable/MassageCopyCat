<!DOCTYPE html>
<html lang="en">
<?php
include("./connexion.php");
$NewConnection = new MaConnexion("massage", "root", "", "localhost");
// echo var_dump($NewConnection);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <!-- <script defer src="./script.js"></script> -->

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->

    <!-- https://massage-theme.richardpruzek.com/blog/ -->

    <title>Accueil</title>
</head>

<body>
    <header>
        <nav id="NavigationBar">
            <a id="Home" class="navigational" href="#"><img src="./cache/massage_logo_header-1.png" alt="company header logo"></a>
            <div id="HamburgerMenu">
                <button id="HamburgerButton" class="navigational"><img src="./cache/icons_Hamburger.png" onclick="ToggleHamburger()"></button>
                <ul id="HamLinks" class="Collapsed">
                    <li class="navigational"><a href="./index.php">Homepage</a></li>
                    <li class="navigational"><a href="./articles.php">Articles</a></li>
                    <li class="navigational"><a href="./gestion.php">New Article</a></li>
                    <li class="navigational"><a href="./contact.php">Contact</a></li>
                    <li class="navigational"><button>Contact</button></li>
                </ul>
            </div>
        </nav>
    </header>

    <img src="./cache/massage48.jpg" alt="" srcset="">
    <img src="./cache/massage16.jpg" alt="" srcset="">
 
</body>

</html>