<?php
include 'D:/xampp/htdocs/PHP_CRUD__M/config.php';
include 'D:/xampp/htdocs/PHP_CRUD__M/Model/Reclamation.php';

class ReclamationC
{
    public function infoclient($idclient)
    {
       //$sql = "SELECT * FROM reclamation";
      $sql = "SELECT user.name as name, user.emailuser as email FROM client inner join user on client.iduser=user.iduser where client.idclient=$idclient";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function all_Reclamations()
    {
       //$sql = "SELECT * FROM reclamation";
      $sql = "SELECT reclamation.*,reponse.idrep FROM `reclamation` left join reponse on reclamation.idrec= reponse.idrec;";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listReclamations($idclient)
    {
       //$sql = "SELECT * FROM reclamation";
      $sql = "SELECT * FROM reclamation where idclient=$idclient";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deleteReclamation($id)
    {
        $sql = "DELETE FROM reclamation WHERE idrec = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addReclamation($reclamation)
    {
        $sql = "INSERT INTO reclamation  
        VALUES (NULL,:name,:email,:message,:subject,:idclient)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'name' => $reclamation->getname(),
                'email' => $reclamation->getemail(),
                'message' => $reclamation->getmessage(),
                'subject' => $reclamation->getsubject(),
                'idclient' => $reclamation->getidclient()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateReclamation($reclamation, $idrec)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reclamation SET 
                    email = :email, 
                    name = :name, 
                    message = :message,
                   subject = :subject
                WHERE idrec= :idrec'
            );
            $query->execute([
              'idrec' =>$idrec,
                'name' => $reclamation->getname(),
                'email' => $reclamation->getemail(),
                'message' => $reclamation->getmessage(),
                'subject' => $reclamation->getsubject()
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }



    

    function showReclamation($id)
    {
        $sql = "SELECT * from reclamation where idrec =$id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $reclamation = $query->fetch();
            return $reclamation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
