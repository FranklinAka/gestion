<?php  
session_start();
if (isset($_POST['id'])) {
	if (isset($_POST['designation'])) {
		if (isset($_POST['quantite'])) {
			if ($_POST['categorie']) {
				$id = $_POST['id'];
				$designation = $_POST['designation'];
				$quantite = $_POST['quantite'];
				$categorie = $_POST['categorie'];
				if (!empty($designation)) {
					if (!empty($quantite)) {
						if (!empty($categorie)) {
							try{
								$connexion = new PDO('mysql:host=localhost;dbname=gestarticle','root','');
								echo "connexion ok";
								$req = 'UPDATE article SET designation=?,quantite=?,categorie=? WHERE id=?';
								$insertion = $connexion->prepare($req);
								$insertion->execute(array($designation,$quantite,$categorie,$id));
								echo "Modification de l'id";
								header("location:../G_article/liste.php?msg=Modification effectuée✅✅✔✅✅  ");
							}catch(Exception $e){
								die('Erreur:'.$e->getMessage());
							}
						}else{
							echo "categorie obligatoire.";
						}
					}else{
						echo "quantite obligatoire.";
					}
				}else{
					echo "designation obligatoire.";
				}
			}else{
				echo "champ categorie n'existe pas!!!.";
			}
		}else{
			echo "champ quantite n'existe pas!!!.";
		}
	}else{
		echo "champ designation n'existe pas!!!.";
	}
}else{
	echo "champ code n'existe pas!!!";
}
?>
