<?php 
session_start();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
        if (!empty(trim($id))) {
            try {
                $connexion = new PDO("mysql:host=localhost;dbname=gestarticle",'root','');
                var_dump($connexion);
                exit();
                $req = 'DELETE FROM article WHERE id=?';
                $insertion =$connexion->prepare($req);
                $insertion->execute(array($id));
                echo "Suppression d'un article";
                header("location:../G_article/liste.php?texte=Suppression éffectuée avec succès✅✅✅!");                           
            } catch (Exception $e) {
                die("Erreur".$e->getMessage()); 
            }                        
        }else{}
    }else{}
?>