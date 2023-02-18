<?php 
session_start();
$title = 'Gestion article';
?>
  <body>
    <?php require('menu.php'); ?>
    <div class="container">
      <div class="starter-template">
        <h1><b> Bienvenue</b> <?=$_SESSION['login']  ?> <b>sur notre platefrome de gestion d'articles...</b></h1>
      </div>
    </div><!-- /.container -->
  </body>
