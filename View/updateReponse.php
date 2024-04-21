<?php

include '../Controller/ReclamationC.php';
include '../Controller/ReponseC.php';

$error = "";

// create reponse
$reponse = null;

// create an instance of the controller
$reponseC = new ReponseC();
if (
    isset($_POST["idrep"]) &&
   
    isset($_POST["emailrep"]) &&
    isset($_POST["messagerep"])&&
    isset($_POST["idrec"])
) {
    if (
        !empty($_POST["idrep"]) &&
        
        !empty($_POST["emailrep"]) &&
        !empty($_POST["messagerep"])&&
        !empty($_POST["idrec"])
    ) {
        $reponse = new Reponse(
            $_POST['idrep'],
         
            $_POST['emailrep'],
            $_POST['messagerep'],
            $_POST['idrec']
        );
        $reponseC->updateReponse($reponse, $_POST["idrep"]);
        header('Location:bs-basic-table.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier reponse</title>
</head>

<body>
    <button><a href="bs-basic-table.php">Aller à la liste</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idrep'])) {
        $reponse = $reponseC->showReponse($_POST['idrep']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idrep">Id Reponse:
                        </label>
                    </td>
                    <td><input type="number" name="idrep" id="idrep" value="<?php echo $reponse['idrep']; ?>" maxlength="20" required></td>

                </tr>
                
                <tr>
                    <td>
                        <label for="emailrep">E-mail :
                        </label>
                    </td>
                    <td><input type="text" name="emailrep" id="emailrep" value="<?php echo $reponse['emailrep']; ?>" maxlength="20"></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="messagerep">Message:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="messagerep" id="messagerep" value="<?php echo $reponse['messagerep']; ?>">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="idrec">idrec:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="idrec" id="idrec" value="<?php echo $reponse['idrec']; ?>">
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>