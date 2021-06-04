<!DOCTYPE html>
<html lang="fr">
    <?php include(const_incl . 'head.php'); ?>
        
    <body id="home">
        <header>
            <h1>Le Dilemme du Roi</h1>
        </header>

        <section>

            <?php
                if (isset($_SESSION['idDilemmeRoi'])) {
            
                    header('location:index.php?page=joueur&idjoueur=' . $_SESSION['idDilemmeRoi']);

                } else {
            ?>

            <form action="index.php?page=login" method="POST">

                <div>
                    <label for='nom' class="invisible">Nom</label>
                    <input type='text' name='nom' id='nom' required placeholder="Nom" />
                </div>

                <div>
                    <label for='maison' class="invisible">Maison</label>
                    <input type='text' name='maison' id='maison' required placeholder="Maison"/>
                </div>

                <button type="submit">Se connecter</button>

            </form>

            <?php
                }
            ?>
        </section>

        <?php include(const_incl . 'footer.php'); ?>

    </body>
</html>