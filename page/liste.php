<?php
    $title = 'Liste Article';
    session_start();
    if(!isset($_SESSION['login'])) {
        header('location:../index.php');
    }
    try {
        $pdo=new PDO("mysql:host=localhost;dbname=gestarticle",'root','');
        $req=$pdo->query("SELECT * FROM article art, categorie cat WHERE cat.idCat=art.categorie");
        $listeArticle=$req->fetchAll();

        $req=$pdo->query("SELECT * FROM categorie");
        $categorie=$req->fetchAll();
} catch (Exception $er) {
    die('Erreur:'.$er->getMessage());
}
?>


<body>
    <?= require('menu.php'); ?>
    <div class="container">
        <div class="col-md-12">
            <?php  if (isset($_GET['msg'])&& !empty(trim($_GET['msg']))) : ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong><?=$_GET['msg']; ?></strong>
                </div>
            <?php endif ?>

            <?php if (isset($_GET['texte'])&& !empty(trim($_GET['texte']))): ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong><?=$_GET['texte']; ?></strong>
                </div>
            <?php endif ?>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Designation</th>
                        <th>Quantite</th>
                        <th>Categorie</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php  foreach ($listeArticle as $article) :?>
                    <tr>
                        <td><?=$article['code'] ?></td>
                        <td><?=$article['designation'] ?></td>
                        <td><?=$article['quantite'] ?></td>     
                        <td><?=$article['libelle'] ?></td>
                        <td>
                            <!-- script de suppression -->
                            <a class="btn btn-danger" data-toggle="modal" href="#modal-id0<?=$article['id']?>"><span><b>Supprimer</b></span></a>&nbsp;

                            <div class="modal fade" id="modal-id0<?=$article['id'] ?>">
                                <div class="modal-dialog"> 
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" align="center"><b>Voulez-vous supprimer cet article???</b></h4>
                                        </div>

                                        <div class="modal-body col-md-12">
                                            <form action="../traitement/Trait_delete.php" method="POST" role="form">
                                                <input type="hidden" value="<?=$article['id'] ?>" name="id">
                                                <button type="submit" class="btn btn-success pull-right">OUI</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">NON</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">  

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-primary" data-toggle="modal" href='#modal-id<?=$article['id']?>'><span><b>Modifier</b></span></a>
                            <div class="modal fade" id="modal-id<?=$article['id']?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" align="center"><b>MODIFICATION</b></h4>  
                                        </div>
                                        <div class="modal-body">
                                            <form action="../traitement/Trait_modification.php" method="POST" role="form">
                                                <input type="hidden" name="id" value="<?=$article['id']?>">
                                            </form>
                                        </div>          
                                    </div>

                                    <div class="form-group">
                                        <label for="code">Code<?=$article['code'] ?></label>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Désignation</label>
                                        <input type="text" class="form-control"value="<?=$article['designation'] ?>" name="designation" id="designation">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Quantite</label>
                                        <input type="text" class="form-control" value="<?=$article['quantite'] ?>" name="quantite" id="quantite">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Categorie</label>
                                        <select name="categorie" id="categorie" class="form-control">
                                        <?php foreach ($categorie as $cat) : ?>
                                        <option <?=($cat['idCat']==$article['categorie'])?'selected="selected"' :''?> value="<?= $cat['idCat'] ?>"><?= $cat['libelle']?>
                                        </option>
                                        <?php  endforeach ?>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-warning">Confirmer</button>
                                                <button type="reset" class="btn btn-primary pull-left" data-dismiss="modal">Retour</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div><!-- /.container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>   
</body>
</html>