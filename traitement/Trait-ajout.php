<?php 

session_start();
/*var_dump($_POST);exit();*/
if (isset($_POST['code'])) {
  if (isset($_POST['designation'])) {
    if (isset($_POST['quantite'])) {
      if (isset($_POST['categorie'])) {
        $code=$_POST['code'];
        $designation=$_POST['designation'];
        $quantite=$_POST['quantite'];
        $categorie=$_POST['categorie'];
        if (!empty(trim($code))) {
          if (!empty(trim($designation))) {
            if (!empty(trim($quantite))) {
              if (!empty(trim($categorie))) {
              
              //Enregistrement
              try{
              $pdo = new PDO('mysql:host=localhost;dbname=gestarticle','root','');
              $req= $pdo->prepare('INSERT INTO article values(null,?,?,?,?,?)');
              //$ins=$connexion->prepare($req);
              $req->execute(array($code,$designation,$quantite,$categorie,$_SESSION['idUser']));
              $message="Enregistrement éffectué avec succès✅ ✅ ✅";                                                                                                                
                echo "$message";

              header("location:../G_article/ajout.php");

              } catch (Exception $e) {
              die('Erreur :'.$e->getMessage());
              }
                
                }else{}
              // code...
            }else{}
            // code...
          }else{}
        }else{}
      }else{}
      // code...
    }else{}
    // code...
  }else{}
  // code...
}else{}


 ?>