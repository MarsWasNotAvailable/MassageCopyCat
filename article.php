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
    <?php include './components/header.php' ?>

    <?php
        // titre, resume, titre2, contenu, titre3, contenu3, photo, datepublication

        // var_dump($_GET);
        if (isset($_GET['id']))
        {
            $Condition = 'id="' . $_GET['id'] . '"';
            
            $AllProducts = $NewConnection->select("articles", "*", $Condition);
            foreach ($AllProducts as $EachKey => $EachValue) {
                $Style = "background-image: url('" . $EachValue['photo'] . "'); background-size: cover; min-height: 489px; width: 100%;";
    
                echo '<section id="ArticleHead" class="CardPresentation" style="' . $Style . '">';
    
                echo "<h4 style='color: white;'>" . $EachValue['titre'] . "</h4>";
                echo "<h3>Published on " . $EachValue['datepublication'] . "</h3>";
    
                echo '</section>';
    
                echo '<section id="ArticleBody" class="CardPresentation" style="' . '">';
    
                echo "<p>" . $EachValue['resume'] . "</p>";
                echo "<h5>" . $EachValue['titre2'] . "</h5>";
                echo "<p>" . $EachValue['contenu2'] . "</p>";
    
                echo "<h5>" . $EachValue['titre3'] . "</h5>";
                echo "<p>" . $EachValue['contenu3'] . "</p>";
    
                echo '</section>';
    
                // var_dump($EachKey);
                // var_dump($EachValue);
    
                break;
            }
        }
    ?>

    <?php include './components/footer.php' ?>
</body>

</html>