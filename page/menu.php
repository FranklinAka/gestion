<?php
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'element' . DIRECTORY_SEPARATOR . 'header.php';
?>
<link rel="stylesheet" href="style.css" type="text/css" >
<div class="container" >
  <div class="navbar-header">
    <a class="navbar-brand" href="#">Gestion Article[<?=$_SESSION['login'] ?>]</a>
    <nav id="simple-list-example" class="d-flex flex-column gap-2 simple-list-example-scrollspy text-center">
      <ul class="nav nav-tabs">
        <li>
          <a class="nav-link" href="index.php">Acceuil</a>
        </li>
        <li> 
          <a class="nav-link" href="liste.php">Liste</a>
        </li>
        <li>
          <a class="nav-link" href="ajout.php">Ajout</a>
        </li>
      </ul>
    </nav>
  </div>
</div>
<?php
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'element' . DIRECTORY_SEPARATOR . 'footer.php';
?>
