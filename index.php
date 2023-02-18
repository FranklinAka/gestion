<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>Authentification</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    
      <style>
        body{
          margin-top: 10%;
          background-image: url(mdp4.jpeg);
          background-repeat: no-repeat;
          background-size: 100%;
        }
      </style>
  </head>

  <body>
    <div class="container">
      <div class="col-md-12">
        
        <div class="col-md-4 col-md-offset-4">
          <form action="traitement/trait_connexion.php" method="POST" class="form-horizontal" role="form">
              <div class="form-group">
                <legend align="center"><h1><b>Connexion</b></h1></legend>
              </div>
          
              <div class="form-group">
                <input type="text" class="form-control" placeholder="login" name="login">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="mot de passe" name="pwd">
              </div>
          
              <div class="col-md-12">
                <button class="btn btn-success"><b>Connexion</b></button>
                <button class="btn btn-danger pull-right" type="reset"><b>Annuler</b></button>
              
              </div>
          </form>
        </div> 
      </div>
    </div>
  </body>
</html>