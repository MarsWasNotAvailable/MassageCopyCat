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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- https://massage-theme.richardpruzek.com/ -->

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

    <main class="ContentBoxes">

        <!-- Modals -->
        <div class="modal fade" id="CreateModal" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="CreateModalLabel">Create Modal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="crud-produit.php" method="post">
                        <div class="modal-body">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Formulaire produit</h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Insertion</h6>

                                    <div class="mb-3">
                                        <label class="card-text" for="Name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="Name" name="Name" placeholder="Insert a name here" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="card-text" for="Price" class="form-label">Price</label>
                                        <input type="number" step="0.01" min="0.01" class="form-control" id="Price" name="Price" placeholder="Insert a price here" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="card-text" for="Description" class="form-label">Description</label>
                                        <textarea class="form-control" id="Description" rows="3" name="Description" placeholder="Insert a description here" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer mb-3">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" name="Intention" value="Create" class="btn btn-primary">Submit to the machine!</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="DeleteModalLabel">Delete Modal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        Can you confirm you want to delete that record ?
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, close</button>
                        <button id="DeleteModalSubmitButton" type="submit" class="btn btn-primary">Yes, delete</button>
                    </div>
                </div>
            </div>
        </div>



        <section>
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Description</th>
                        <th>Action<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#CreateModal">Add</button></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $AllProducts = $NewConnection->select("articles", "*");
                    foreach ($AllProducts as $EachKey => $EachValue) {
                        echo '<form id="MainForm" action="crud.php" method="post" >';
                        // echo '<input type="text" class="form-control" id="CurrentName" name="CurrentName" placeholder="Insert name here for update." required hidden value="' . $EachValue['Nom'] . '">';

                        // echo "<tr>";
                        // echo '<td><input type="text" class="form-control" id="NameUpdate" name="Name" placeholder="Insert new name here" required value="' . $EachValue['Nom'] . '"></td>';
                        // echo '<td><input type="number" step="0.01" min="0.01" class="form-control" id="PriceUpdate" name="Price" placeholder="Insert a new price here" value="' . $EachValue['Prix'] . '"></td>';
                        // echo '<td><textarea class="form-control" id="DescriptionUpdate" rows="3" name="Description" placeholder="Insert a new description here" >' . $EachValue['Description'] . '</textarea></td>';
                        // echo '<td>';
                        // echo '<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#CreateModal">Add</button>';
                        // echo '<button type="submit" name="Intention" value="Update" class="btn btn-primary mb-3" >Update</button>';
                        // echo '<button type="button" name="Intention" value="Delete" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#DeleteModal">Delete</button>';
                        // echo '</td>';
                        // echo "</tr>";
                        echo '</form>';
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <script defer>
            let myModal = document.getElementById('DeleteModal');

            //the page reloads everytime, so we dont care about unsetting the event listener
            myModal.addEventListener('shown.bs.modal', function(event) {
                let SubmitButton = document.getElementById('DeleteModalSubmitButton');

                // it's only when we click on the button that all of this happens: meaning, you dont have to worry about cleanup or event misfiring
                SubmitButton.onclick = function() {
                    console.log(event.relatedTarget);

                    //we enable the target button to submit from here
                    event.relatedTarget.type = "submit";
                    event.relatedTarget.click();
                };

                if (true) {
                    return event.preventDefault();
                }
            });
        </script>
    </main>
</body>

</html>