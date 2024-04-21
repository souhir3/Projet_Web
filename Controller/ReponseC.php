<?php
include 'D:/xampp/htdocs/PHP_CRUD__M/config2.php';
include 'D:/xampp/htdocs/PHP_CRUD__M/Model/Reponse.php';

class ReponseC
{
    public function listReponses()
    {
        $sql = "SELECT * FROM reponse";
        $db = config2::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteReponse($id)
    {
        $sql = "DELETE FROM reponse WHERE idrep = :id";
        $db = config2::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addReponse($reponse)
    {
        $sql = "INSERT INTO reponse  
        VALUES (NULL,:messagerep,:emailrep,:idrec)";
        $db = config2::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                
                'messagerep' => $reponse->getmessagerep(),
                'emailrep' => $reponse->getemailrep(),
                'idrec' => $reponse->getidrec()
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateReponse($reponse, $idrep)
    {
        try {
            $db = config2::getConnexion();
            $query = $db->prepare(
                'UPDATE reponse SET 
                    emailrep = :emailrep, 
                    messagerep = :messagerep, 
                    idrec = :idrec
                   
                WHERE idrep= :idrep'
            );
            $query->execute([
              'idrep' =>$idrep,
                'messagerep' => $reponse->getmessagerep(),
                'emailrep' => $reponse->getemailrep(),
                'idrec' => $reponse->getidrec()
                
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }



    

    function showReponse($id)
    {
        $sql = "SELECT * from reponse where idrep = $id";
        $db = config2::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $reponse = $query->fetch();
            return $reponse;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}