<!DOCTYPE html>
<html lang="fr">
    <?php include(const_incl . 'head.php'); ?>
    	
    <body id="profil">

    	<?php
			if (isset($_SESSION['nomDilemmeRoi']) AND isset($_SESSION['maisonDilemmeRoi']) AND ($_SESSION['idDilemmeRoi'] == $_GET['idjoueur'])) {
		?>

    	<?php 
			$link = bdConnexion();

			$recSQL = 
			"SELECT 

			dilemmeroi_joueurs.id AS idJoueur, 
			dilemmeroi_joueurs.nom AS nomJoueur,
			dilemmeroi_joueurs.main AS mainJoueur,
			dilemmeroi_joueurs.prestige AS prestigeJoueur,
			dilemmeroi_joueurs.ordre AS ordreJoueur,

			dilemmeroi_maisons.id AS idMaison,
			dilemmeroi_maisons.nom AS nomMaison,
			dilemmeroi_maisons.structure AS strucMaison,

			dilemmeroi_cartes.id AS idObjectif,
			dilemmeroi_cartes.nom AS nomObjectif

			FROM dilemmeroi_joueurs 

			INNER JOIN dilemmeroi_maisons ON dilemmeroi_joueurs.maison = dilemmeroi_maisons.ID
			INNER JOIN dilemmeroi_cartes ON dilemmeroi_joueurs.main = dilemmeroi_cartes.ID

			WHERE dilemmeroi_joueurs.id =" . $_GET['idjoueur'];

			$result = mysqli_query($link , $recSQL);
			$ligne = mysqli_fetch_array($result);
		?>

    	<header>
            <h1>Maison <?php echo $ligne['nomJoueur']; ?> du <?php echo $ligne['strucMaison']; ?> de <?php echo $ligne['nomMaison']; ?></h1>
        </header>

    	<section>


			<div id="objectif-secret">					
				<div class="box imgbox">
					<figure>
						<img src="./img/objectif.png" class="obj">
					</figure>
					<h2>Objectif secret</h2>
					<?php if ($ligne['idObjectif'] == 1) { ?>
						<p>Vous n'avez <strong>aucun objectif</strong></p>
					<?php } else { ?>
						<p>Vous avez&nbsp;: <strong><?php echo $ligne['nomObjectif']; ?></strong> <a class="ico visibility" href="index.php?page=objectif&carte=<?php echo $ligne['idObjectif']; ?>" title="Voir votre objectif"></a></p>
					<?php } ?>

					<?php 
					$recSQL3 = "SELECT main, ordre FROM dilemmeroi_joueurs";
					$result3 = mysqli_query($link , $recSQL3);
					?>

					<?php
						$choixJoueur = array();
						while ($ligne3 = mysqli_fetch_array($result3)) {
							$choixJoueur[$ligne3['ordre']] = $ligne3['main'];
						}

						$ordreJoueurPrec = $ligne['ordreJoueur'] - 1;
						$mainJoueurPrec = $choixJoueur[$ordreJoueurPrec];
					?>

					

					<?php if ( ($ligne['ordreJoueur'] == 1) && ($ligne['mainJoueur'] == 1) ) { ?>
						<p><a class="more" href="index.php?page=choix-objectif&idjoueur=<?php echo $ligne['idJoueur']?>">Choisir un objectif</a></p>
					<?php } else if ($ordreJoueurPrec == 0) { ?>
					<?php } else if (($mainJoueurPrec != 1) && ($ligne['mainJoueur'] == 1)) { ?>
						<p><a class="more" href="index.php?page=choix-objectif&idjoueur=<?php echo $ligne['idJoueur']?>">Choisir un objectif</a></p>
					<?php } ?>
				</div>

			</div>


				<div class="box imgbox" id="prestige">
					<figure>
						<img src="./img/prestige.png" class="prest">
					</figure>
					<h2>Prestige</h2>
					<p>Vous avez <strong><?php echo $ligne['prestigeJoueur']; ?></strong> de Prestige</p>
					<p><a class="more" href="index.php?page=maj-prestige&idjoueur=<?php echo $ligne['idJoueur']?>">Mettre à jour son Prestige</a></p>
				</div>






		
				<div class="flex">

					<div class="flex50">
						<a href="index.php?page=deconnexion" class="clickable">
							<div class="box center C2">
								<div class="ico power_settings_new"></div>
								<p>Se déconnecter</p>
							</div>
						</a>
					</div>

					<?php 
						$recSQL2 = "SELECT main FROM dilemmeroi_joueurs";
						$result2 = mysqli_query($link , $recSQL2);
					?>


					<?php
						$mainJoueurs = array();
						while ($ligne2 = mysqli_fetch_array($result2)) {
							$mainJoueurs[$ligne2['main']] = $ligne2['main'];
						}
					?>

						
					
					<?php //if (count($mainJoueurs) > 1) { ?>
						<div class="flex50">
							<a href="index.php?page=nouvelle-partie" class="clickable">
								<div class="box center C3">
									<div class="ico add"></div>
									<p>Nouvelle partie</p>
								</div>
							</a>
						</div>
					<?php //} ?>

				</div>



				<?php
				mysqli_free_result($result);
				mysqli_free_result($result2);
				mysqli_free_result($result3);
				mysqli_close($link);
				?>



		</section>

		<?php
			} else {
		?>

		<p>Vous n'avez pas accès à ce profil</p>
		<?php
			}
		?>

		<?php include(const_incl . 'footer.php'); ?>

	</body>
</html>


<script>
	
</script>
				


