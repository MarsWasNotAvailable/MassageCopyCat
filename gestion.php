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

    <title>Admin</title>
</head>

<body>
    <!-- <?php include './components/header.php' ?> -->

    <main class="ContentBoxes">

        <!-- Modals -->
        <!-- titre, resume, titre2, contenu2, titre3, contenu3, photo, datepublication -->
        <div class="modal fade" id="CreateModal" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="CreateModalLabel">Create Modal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="crud.php" method="post">
                        <div class="modal-body">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Formulaire</h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Insertion</h6>

                                    <div class="mb-3">
                                        <label class="card-text" for="titre" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="titre" name="titre" placeholder="Insert a title here" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="card-text" for="resume" class="form-label">Resume</label>
                                        <textarea type="text" class="form-control" id="resume" name="resume" placeholder="Insert a resume here" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="card-text" for="titre2" class="form-label">Title 2</label>
                                        <input class="form-control" id="titre2" rows="3" name="titre2" placeholder="Insert a sub title here" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="card-text" for="contenu2" class="form-label">Content 2</label>
                                        <input class="form-control" id="contenu2" rows="3" name="contenu2" placeholder="Insert a sub content here" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="card-text" for="titre3" class="form-label">Title 3</label>
                                        <input class="form-control" id="titre3" rows="3" name="titre2" placeholder="Insert a sub title here" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="card-text" for="contenu3" class="form-label">Content 3</label>
                                        <input class="form-control" id="contenu3" rows="3" name="contenu3" placeholder="Insert a sub content here" required></textarea>
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
                        <th>Titre</th>
                        <th>Resume</th>
                        <th>Titre 2</th>
                        <th>Contenu 2</th>
                        <th>Titre 3</th>
                        <th>Contenu 3</th>
                        <th>Photo</th>
                        <th>Date</th>
                        <th>Action<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#CreateModal">Add</button></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $AllProducts = $NewConnection->select("articles", "*");
                    foreach ($AllProducts as $EachKey => $EachValue) {
                        echo '<form id="MainForm" action="crud.php" method="post" >';
                        // echo '<input type="text" class="form-control" id="CurrentName" name="CurrentName" placeholder="Insert name here for update." required hidden value="' . $EachValue['Nom'] . '">';

                        echo "<tr>";
                        echo '<td><input type="text" class="form-control" id="TitleUpdate" name="titre" placeholder="Insert new title here" required value="' . $EachValue['titre'] . '"></td>';

                        echo '<td><textarea class="form-control" id="Resume" rows="3" name="resume" placeholder="Insert a new resume here" >' . $EachValue['resume'] . '</textarea></td>';

                        // echo '<td><input type="text" class="form-control" id="Resume" name="resume" placeholder="Insert new resume here" required value="' . $EachValue['resume'] . '"></td>';
                        echo '<td><input type="text" class="form-control" id="Title2" name="titre2" placeholder="Insert new title here" required value="' . $EachValue['titre2'] . '"></td>';
                        echo '<td><input type="text" class="form-control" id="Content2" name="contenu2" placeholder="Insert new content here" required value="' . $EachValue['contenu2'] . '"></td>';
                        echo '<td><input type="text" class="form-control" id="Title3" name="titre3" placeholder="Insert new title here" required value="' . $EachValue['titre3'] . '"></td>';
                        echo '<td><input type="text" class="form-control" id="Content3" name="contenu3" placeholder="Insert new content here" required value="' . $EachValue['contenu3'] . '"></td>';

                        echo '<td><input type="text" class="form-control" id="Photo" name="photo" placeholder="Insert new title here" required value="' . $EachValue['photo'] . '"></td>';
                        echo '<td><input type="text" class="form-control" id="DatePublication" name="datepublication" placeholder="Insert new content here" required value="' . $EachValue['datepublication'] . '"></td>';

                        echo '<td>';
                        // echo '<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#CreateModal">Add</button>';
                        echo '<button type="submit" name="Intention" value="Update" class="btn btn-primary mb-3" >Update</button>';
                        echo '<button type="button" name="Intention" value="Delete" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#DeleteModal">Delete</button>';
                        echo '</td>';

                        echo "</tr>";
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