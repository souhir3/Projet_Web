<?php

include '../Controller/ReclamationC.php';

$error = "";

// create reclamation
$reclamation = null;

// create an instance of the controller
$reclamationC = new ReclamationC();
if (
    isset($_POST["name"]) &&
    isset($_POST["email"]) &&
    isset($_POST["message"])&&
    isset($_POST["subject"])
) {
    if (
        !empty($_POST['name']) &&
        !empty($_POST["email"]) &&
        !empty($_POST["message"])&&
        !empty($_POST["subject"])

    ) {
        
        $reclamation = new Reclamation(
            null,
            $_POST['name'],
            $_POST['email'],
            $_POST['message'],
            $_POST['subject'],
            $_SESSION["idclient"]
        );
        $reclamationC->addReclamation($reclamation);
        header('Location:ListReclamations.php');
    } else
        $error = "Missing information";
}




/*


include '../Controller/ReclamationC.php';

$error = "";

// create reclamation
$reclamation = null;

// create an instance of the controller
$reclamationC = new ReclamationC();
if (
    isset($_POST["name"]) &&
    isset($_POST["email"]) &&
    isset($_POST["message"])
) {
    if (
        !empty($_POST['name']) &&
        !empty($_POST["email"]) &&
        !empty($_POST["message"])
    ) {
        try {
            $reclamation = new Reclamation(
                null,
                $_POST['name'],
                $_POST['email'],
                $_POST['message']
            );
            $reclamationC->addReclamation($reclamation);
            header('Location:ListReclamations.php');
        }
        catch (Exception $e) {
            $error = "Missing information "+$e;
        }
    } else
        $error = "Missing information";
}

*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle reclamation</title>
    <script>
        function validateForm() {
            var etat = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var test = true; // Initialisez test à true
            var etatRegExp = /^[A-Za-z]+$/; // Expression régulière pour vérifier l'état
            var emailRegExp = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Expression régulière pour vérifier le format de l'email

            // Vérifier l'état
            if (!etatRegExp.test(etat)) {
                document.getElementById('etatError').textContent = "État incorrect (seules les lettres sont autorisées)";
                test = false; // Modifier test à false si la validation échoue
            } else {
                document.getElementById('etatError').textContent = "";
            }

            // Vérifier l'email
            if (!emailRegExp.test(email)) {
                document.getElementById('emailError').textContent = "Email incorrect";
                test = false; // Modifier test à false si la validation échoue
            } else {
                document.getElementById('emailError').textContent = "";
            }

            return test; // Autoriser la soumission du formulaire si toutes les validations sont réussies
        }
    </script>
</head>

<body>
    <a href="D:/xampp/htdocs/PHP_CRUD__M/Model/ListReclamations.php">Aller à la liste </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST" onsubmit="return validateForm()">
        <table border="1" align="center">

            <tr>
                <td>
                    <label for="name">Name:
                    </label>
                </td>
                <td><input type="text" name="name" id="name" maxlength="20"></td>
                <td><span id="etatError" style="color: red;"></span></td>
            </tr>
            <tr>
                <td>
                    <label for="email">E-mail :
                    </label>
                </td>
                <td><input type="text" name="email" id="email" maxlength="20"></td>
            </tr>
            <tr>
                <td></td>
                <td><span id="emailError" style="color: red;"></span></td>
            </tr>

            <tr>
                <td>
                    <label for="message">Message:
                    </label>
                </td>
                <td>
                    <input type="text" name="message" id="message">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="subject">Subject:
                    </label>
                </td>
                <td>
                    <input type="text" name="subject" id="subject">
                </td>
            </tr>



            <tr align="center">
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
