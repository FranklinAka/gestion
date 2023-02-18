<?php 
session_start();
if (isset($_POST['login'])) {
	if (isset($_POST['pwd'])) {
		$login=$_POST['login'];
		$passe=$_POST['pwd'];
		if(!empty(trim($login))){
			if (!empty(trim($passe))) {
				try {
					$pdo = new PDO('mysql:host=localhost;dbname=gestarticle','root','');
					$req = $pdo->prepare('SELECT * FROM users WHERE login=? AND password=?');
					$e=$req->execute(array($login,md5($passe)));
					$rep=$req->fetch();
					//var_dump($rep);
					if ($rep) {
						//si l'utilisateur existe dans la base de données
						$_SESSION['login']=$login;
						$_SESSION['idUser']=$rep['idUser'];
						header("location:../G_article/index.php");
					}else{
						header("location:../login.php");
					}
					
				} catch (Exception $e) {
					die('Erreur :'.$e->getMessage());					
				}
			}
		}	
	}
}
?>