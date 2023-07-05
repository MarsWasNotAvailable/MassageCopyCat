<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Controller</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</head>
<body>
    <h1>CRUD Controller</h1>
    <?php
        var_dump($_POST);

        if (isset($_POST['Intention']))
        {
            include("./connexion.php");
            $DatabaseName = "massage";
            $TableName = "articles";

            $NewConnection = new MaConnexion($DatabaseName, "root", "", "localhost");

            switch ($_POST['Intention']) {
                case 'Create':
                    $Success = $NewConnection->insert($TableName, array(
                        'Nom' => $_POST['Name'],
                        'Prix' => $_POST['Price'],
                        'Description' => $_POST['Description']
                    ));
            
                    if ($Success)
                    {
                        header("Location: " . 'index.php');
                        die();
                    }

                    break;

                case 'Update':
                    $Values = array();
                    //those field could be empty ("")
                    if ($_POST['Name']) $Values += array('Nom' => $_POST['Name']);
                    if ($_POST['Price']) $Values += array('Prix' => $_POST['Price']);
                    if ($_POST['Description']) $Values += array('Description' => $_POST['Description']);

                    // var_dump($Values);

                    $Success = $NewConnection->update($TableName, array('Nom' => $_POST['CurrentName']), $Values);

                    if ($Success) {
                        header("Location: " . 'index.php');
                        die();
                    }
                    break;

                case 'Delete':
                    $UpdateFieldCondition = array('Nom' => $_POST['CurrentName']);

                    $Success = $NewConnection->delete($TableName, $UpdateFieldCondition);

                    if ($Success) {
                        header("Location: " . 'index.php');
                        die();
                    }
                    break;
                
                default:
                    # code...
                    break;
            }
        }
        // 

    ?>

</body>

</html>