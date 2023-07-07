<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Controller</title>
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
            $Redirection = "gestion.php";

            $NewConnection = new MaConnexion($DatabaseName, "root", "", "localhost");

            switch ($_POST['Intention']) {
                case 'Create':
                    $Success = $NewConnection->insert($TableName, array(
                        'titre' => $_POST['titre'],
                        'resume' => $_POST['resume'],
                        'titre2' => $_POST['titre2'],
                        'contenu2' => $_POST['contenu2'],
                        'titre3' => $_POST['titre3'],
                        'contenu3' => $_POST['contenu3'],
                        'photo' => './cache/massage26.jpg'
                    ));
            
                    if ($Success)
                    {
                        header("Location: " . $Redirection);
                        die();
                    }

                    break;

                case 'Update':
                    $Values = array();
                    
                    //We allow those fields to be empty ("")
                    $FieldsToUpdate = array('titre','resume','titre2','contenu2', 'titre3', 'contenu3', 'photo', 'datepublication');
                    foreach ($FieldsToUpdate as $EachKey => $EachValue){
                        if ($_POST[$EachValue]) $Values += array($EachValue => $_POST[$EachValue]);
                    }

                    // var_dump($Values);

                    $Condition = array('id' => $_POST['CurrentField']);

                    $Success = $NewConnection->update($TableName, $Condition, $Values);

                    if ($Success) {
                        header("Location: " . $Redirection);
                        die();
                    }
                    break;

                case 'Delete':
                    $UpdateFieldCondition = array('id' => $_POST['CurrentField']);

                    $Success = $NewConnection->delete($TableName, $UpdateFieldCondition);

                    if ($Success) {
                        header("Location: " . $Redirection);
                        die();
                    }
                    break;
                
                default:
                    # code...
                    break;
            }
        }

        //TODO: I'm thinking the Select request could come here, BUT realistically, there's too many different read request
        else if (isset($_GET['Intention']))
        {
            switch ($_GET['Intention']) {
                case 'Read':
                    break;
                default:
                    break;
            }
        }

    ?>

</body>
</html>
