<!DOCTYPE html>
<html lang="fr">
    <?php include(const_incl . 'head.php'); ?>
        
    <body>
        <header>
            <h1>Votre objectif</h1>
        </header>

        <?php 
            $link = bdConnexion();

            $recSQL = 
            "SELECT 
            dilemmeroi_cartes.id AS idObjectif,
            dilemmeroi_cartes.nom AS nomObjectif,

            dilemmeroi_joueurs.id AS idJoueur, 
            dilemmeroi_joueurs.nom AS nomJoueur,
            dilemmeroi_joueurs.main AS mainJoueur,
            dilemmeroi_joueurs.prestige AS prestigeJoueur,
            dilemmeroi_joueurs.ordre AS ordreJoueur

            FROM dilemmeroi_cartes 

            INNER JOIN dilemmeroi_joueurs ON dilemmeroi_cartes.ID = dilemmeroi_joueurs.main

            WHERE dilemmeroi_cartes.id =" . $_GET['carte'];

            $result = mysqli_query($link , $recSQL);
            $ligne = mysqli_fetch_array($result);
        ?>

        <section>

            <figure class="center">
                <img src="./img/<?php echo $ligne['idObjectif']; ?>.jpg">
            </figure>

            <div class="actions center">
                <a class="close button" href="index.php?page=joueur&idjoueur=<?php echo $_SESSION['idDilemmeRoi']; ?>">Revenir au profil</a>
            </div>
            
        </section>

        <?php include(const_incl . 'footer.php'); ?>

    </body>
</html>