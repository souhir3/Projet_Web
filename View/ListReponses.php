<?php
include '../Controller/ReclamationC.php';
include '../Controller/ReponseC.php';
$reponseC = new ReponseC();
$list = $reponseC->listReponses();
?>
<html>

<head></head>

<body>

    <center>
        <h1>Liste des reponses</h1>
        <h2>
            <a href="addReponse.php">Nouvelle reponse</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id Reponse</th>
            <th>Message</th>
            <th>E-mail</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $reponse) {
        ?>
            <tr>
                <td><?= $reponse['idrep']; ?></td>
                <td><?= $reponse['messagerep']; ?></td>
                <td><?= $reponse['emailrep']; ?></td>
                <!--?= $reponse['idrec']; ?></td>-->
                <td align="center">
                    <form method="POST" action="updateReponse.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $reponse['idrep']; ?> name="idrep">
                    </form>
                </td>
                <td>
                    <a href="deleteReponse.php?idrep=<?php echo $reponse['idrep']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>