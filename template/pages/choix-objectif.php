<!DOCTYPE html>
<html lang="fr">
    <?php include(const_incl . 'head.php'); ?>
    	
    <body id="choixobjectif">
    	<header>
            <h1>Choisir un objectif</h1>
        </header>


    	<?php 
			$link = bdConnexion();

			$recSQL = "SELECT id, nom FROM dilemmeroi_cartes";
			$result = mysqli_query($link , $recSQL);

			$recSQL2 = 
			"SELECT 
			dilemmeroi_joueurs.main AS mainJoueur,
			dilemmeroi_cartes.nom AS nomCarte
			FROM dilemmeroi_joueurs 
			INNER JOIN dilemmeroi_cartes ON dilemmeroi_joueurs.main = dilemmeroi_cartes.ID";
			$result2 = mysqli_query($link , $recSQL2);
		?>

		<section>

			<?php 
			$cartesPrises = array();
			while ($ligne2 = mysqli_fetch_array($result2)) {
				$cartesPrises[$ligne2['mainJoueur']] = $ligne2['nomCarte'];
			}
			$cartesObjectif = array();
			while ($ligne = mysqli_fetch_array($result)) {
				$cartesObjectif[$ligne['id']] = $ligne['nom'];
			}

			$cartesDispo = array_diff_assoc($cartesObjectif, $cartesPrises);

			if (count($cartesPrises) == 1) {
				$nbHasard = rand(2, 7);	
				unset($cartesDispo[$nbHasard]);
				$recSQL3 = 
				"UPDATE dilemmeroi_joueurs 
			    SET 
			    main = {$nbHasard}
			    WHERE id = 1";
				$result3 = mysqli_query($link , $recSQL3);
				$ligne3 = mysqli_fetch_assoc($result3);

			}
			?>

			<div class="box">


				<form action="" method="post">
					<div>
				        <label for="choix-objectif"><strong>Objectif</strong></label>
				        <select id='choix-objectif' name='choix-objectif'>
				        	<?php foreach($cartesDispo as $cle => $valeur) { ?>
				        		<option value="<?php echo $cle; ?>"><?php echo $valeur; ?></option>
							<?php } ?>
				        </select>
				    </div>

				    <button type="submit">Choisir</button>
				</form>

			</div>

			<?php
			mysqli_free_result($result);
			mysqli_free_result($result2);
			mysqli_close($link);
			?>


			<?php   
				if (count($_POST) > 0) {
					$link = bdConnexion();

					$recSQL = 
					"UPDATE dilemmeroi_joueurs 
			        SET 
			        main = {$_POST['choix-objectif']}
			        WHERE id = {$_GET['idjoueur']}";

			        $result = mysqli_query($link , $recSQL);

			        mysqli_free_result($result);
					mysqli_close($link);

			        header('location:index.php?page=joueur&idjoueur=' . $_GET['idjoueur']);

		        }
			?>

			<div class="box">

				<div class="accordion">
        			<div>
		                <h3>Extrémisme</h3>
		                <div>
			                <figure class="center">
				                <img src="./img/2.jpg">
				            </figure>
				        </div>
		            </div>
		            <div>
		                <h3>Rébellion</h3>
		                <div>
			                <figure class="center">
				                <img src="./img/3.jpg">
				            </figure>
				        </div>
		            </div>
		            <div>
		                <h3>Avarice</h3>
		                <div>
			                <figure class="center">
				                <img src="./img/4.jpg">
				            </figure>
				        </div>
		            </div>
		            <div>
		                <h3>Opportunisme</h3>
		                <div>
			                <figure class="center">
				                <img src="./img/5.jpg">
				            </figure>
				        </div>
		            </div>
		            <div>
		                <h3>Opulence</h3>
		                <div>
			                <figure class="center">
				                <img src="./img/6.jpg">
				            </figure>
				        </div>
		            </div>
		            <div>
		                <h3>Modération</h3>
		                <div>
			                <figure class="center">
				                <img src="./img/7.jpg">
				            </figure>
				        </div>
		            </div>
		    	</div>

		    </div>

		</section>




		
		<?php include(const_incl . 'footer.php'); ?>

	</body>
</html>

				


