<?php

include '../Controller/ReclamationC.php';
include '../Controller/ReponseC.php';

$error = "";

// create reponse
$reponse = null;

// create an instance of the controller
$reponseC = new ReponseC();
if (
   
    
    isset($_POST["emailrep"]) &&
    isset($_POST["messagerep"])&&
    isset($_POST["idrec"])
) {
    if (
        
        !empty($_POST["emailrep"]) &&
        !empty($_POST["messagerep"])&&
        !empty($_POST["idrec"])

    ) {
        $reponse = new Reponse(
            null,
           
            $_POST['emailrep'],
            $_POST['messagerep'],
            $_POST['idrec'],

            
        );
        $reponseC->addReponse($reponse);

        header('Location:ListReponses.php');
    } else
        $error = "Missing information";
}




/*


include '../Controller/ReponseC.php';

$error = "";

// create reponse
$reponse = null;

// create an instance of the controller
$reponseC = new ReponseC();
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
            $reponse = new Reclamation(
                null,
                $_POST['name'],
                $_POST['email'],
                $_POST['message']
            );
            $reponseC->addReclamation($reponse);
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
    <title>Nouvelle reponse</title>
    <script>
        function validateForm() {
          
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
  <!--  <a href="D:/xampp/htdocs/PHP_CRUD__M/Model/ListReponses.php">Aller à la liste </a>-->
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST" onsubmit="return validateForm()">
        <table border="1" align="center">

            
            <tr>
                <td>
                    <label for="emailrep">E-mail :
                    </label>
                </td>
                <td><input type="text" name="emailrep" id="emailrep" maxlength="20"></td>
            </tr>
            <tr>
                <td></td>
                <td><span id="emailError" style="color: red;"></span></td>
            </tr>

            <tr>
                <td>
                    <label for="messagerep">Message:
                    </label>
                </td>
                <td>
                    <input type="text" name="messagerep" id="messagerep">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="idrec">idrec:
                    </label>
                </td>
                <td>
                    <input type="number" name="idrec" id="idrec">
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
