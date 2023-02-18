<?php
  $title = 'Ajout Article';
  session_start();
  if(!isset($_SESSION['login'])) {
    header('location:../index.php');
  }

  try {
    $pdo=new PDO("mysql:host=localhost;dbname=gestarticle",'root','');
    $req=$pdo->query("SELECT * FROM categorie");
    $rep=$req->fetchAll();
} catch (Exception $er) {
  die('Erreur:'.$er->getMessage());
}

?>

  <body>
  <?php require('menu.php'); ?>
    <div class="container overflow-hidden text-center">
      <div class="row gx-5">
        <div class="col">
          <form method="POST" action="../traitement/Trait-ajout.php">
            <div class="p-3">
              <div class="form-group">
                <label for="code">Code:</label>
                <input type="text" class="form-control" name="code" id="code" value=" <?= substr(uniqid(), 5,5) ?>" readonly>
              </div>
              <div class="form-group">
                <label for="designation">Désignation:</label>
                <input type="text" class="form-control" name="designation" id="designation">
              </div>
              <div class="form-group"><button class="btn btn-success col-md-12">Ajouter</button></div>
            </div>
        </div>
        <div class="col">
          <div class="p-3">
            <div class="form-group">
              <label for="categorie">Categorie:</label>
              <select name="categorie" id="categorie" class="form-control">
                <?php foreach ($rep as $cat) : ?>
                <option value="<?= $cat['idCat'] ?>"><?= $cat['libelle']?></option>
                <?php endforeach; ?>
              </select>
            </div>
              <div class="form-group">
                <label for="quantite">Quantite:</label>
                <input type="number" name="quantite" id="quantite" class="form-control">
              </div>
              <div class="form-group"><button class="btn btn-danger col-md-12">Annuler</button></div>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </body>