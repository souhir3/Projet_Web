<?php

include '../Controller/ReclamationC.php';

$error = "";

// create reclamation
$reclamation = null;

// create an instance of the controller
$reclamationC = new ReclamationC();
if (
    isset($_POST["idrec"]) &&
    isset($_POST["name"]) &&
    isset($_POST["email"]) &&
    isset($_POST["message"])&&
    isset($_POST["subject"])
) {
    if (
        !empty($_POST["idrec"]) &&
        !empty($_POST['name']) &&
        !empty($_POST["email"]) &&
        !empty($_POST["message"])&&
        !empty($_POST["subject"])
    ) {
        $reclamation = new Reclamation(
            $_POST['idrec'],
            $_POST['name'],
            $_POST['email'],
            $_POST['message'],
            $_POST['subject'],$idclient
        );
        $reclamationC->updateReclamation($reclamation, $_POST["idrec"]);
        header('Location:package.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier reclamation</title>
</head>

<body>
    <button><a href="package.php">Aller à la liste</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idrec'])) {
        $reclamation = $reclamationC->showReclamation($_POST['idrec']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idrec">Id Reclamation:
                        </label>
                    </td>
                    <td><input type="number" name="idrec" id="idrec" value="<?php echo $reclamation['idrec']; ?>" maxlength="20" required></td>

                </tr>
                <tr>
                    <td>
                        <label for="name">Name:
                        </label>
                    </td>
                    <td><input type="text" name="name" id="name" value="<?php echo $reclamation['name']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="email">E-mail :
                        </label>
                    </td>
                    <td><input type="text" name="email" id="email" value="<?php echo $reclamation['email']; ?>" maxlength="20"></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="message">Message:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="message" id="message" value="<?php echo $reclamation['message']; ?>">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="subject">Subject:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="subject" id="subject" value="<?php echo $reclamation['subject']; ?>">
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