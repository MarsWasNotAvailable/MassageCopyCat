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

    <title>Blog</title>
</head>

<body>
    <?php include './components/header.php' ?>

    <section id="BlogHead" >
        <h4>Our blog</h4>
        <h3>Latest news from us</h3>
    </section>

    <section id="BeautyBlog" class="CardPresentation">
        <span id="BeautyBlogCardContainer">

            <?php
            // titre, resume, titre2, contenu, titre3, contenu3, photo, datepublication

            $AllProducts = $NewConnection->select("articles", "*");
            foreach ($AllProducts as $EachKey => $EachValue) {

                echo '<form method="GET" action="./article.php" class="Card">';
                echo '<input type="number" name="id" required hidden value="' . $EachValue['id'] . '">';
                echo '<img src="' . $EachValue['photo'] .  ' " alt="">';
                echo '<h5>' . $EachValue['titre'] . '</h5>';
                echo '<h6>by Richard Pruzek</h6>';
                // echo '<button name="Intention" value="Read" type="submit">read more</button>';
                echo '<button type="submit">read more</button>';
                echo '</form>';

                // var_dump($EachKey);
                // var_dump($EachValue);
            }
            ?>

            <!-- <form method="GET" action="./article.php?id=1" class="Card">
                <img src="./cache/massage21.jpg" alt="">
                <h5>Best haircuts trends in 2020</h5>
                <h6>by Richard Pruzek</h6>
                <button>read more</button>
            </form> -->
           
        </span>
    </section>


    <?php include './components/footer.php' ?>
</body>

</html>