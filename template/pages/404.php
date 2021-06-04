<!DOCTYPE html>
<html lang="fr">
    <?php include(const_incl . 'head.php'); ?>
        
    <body>
        <header>
            <h1>Le Dilemme du Roi</h1>
        </header>

        <section>
            <div class="box">
                <p>Cette page n'existe pas</p>

                <div class="actions center">
                    <a class="close button" href="index.php?page=joueur&idjoueur=<?php echo $_SESSION['idDilemmeRoi']; ?>">Revenir au profil</a>
                </div>
            </div>
        </section>

        <?php include(const_incl . 'footer.php'); ?>

    </body>
</html>