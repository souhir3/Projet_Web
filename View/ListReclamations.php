<?php
include '../Controller/ReclamationC.php';
$reclamationC = new ReclamationC();
$list = $reclamationC->listReclamations($idclient);
?>
<html>

<head></head>

<body>

    <center>
        <h1>Liste des reclamations</h1>
        <h2>
            <a href="addReclamation.php">Nouvelle reclamation</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id Reclamation</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Message</th>
            <th>Subject</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $reclamation) {
        ?>
            <tr>
                <td><?= $reclamation['idrec']; ?></td>
                <td><?= $reclamation['name']; ?></td>
                <td><?= $reclamation['email']; ?></td>
                <td><?= $reclamation['message']; ?></td>
                <td><?= $reclamation['subject']; ?></td>
                <td align="center">
                    <form method="POST" action="updateReclamation.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $reclamation['idrec']; ?> name="idrec">
                    </form>
                </td>
                <td>
                    <a href="deleteReclamation.php?idrec=<?php echo $reclamation['idrec']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>