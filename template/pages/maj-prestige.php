<!DOCTYPE html>
<html lang="fr">
    <?php include(const_incl . 'head.php'); ?>
    	
    <body>
    	<header>
            <h1>Mettre à jour le Prestige</h1>
        </header>


    	<?php 
			$link = bdConnexion();

			$recSQL = "SELECT prestige FROM dilemmeroi_joueurs WHERE id =" . $_GET['idjoueur'];
			$result = mysqli_query($link , $recSQL);
			$ligne = mysqli_fetch_array($result);
		?>

		<section>

			<div class="box">

				<form action="" method="post">
					<div>
				        <label for="maj-prestige"><strong>Prestige</strong></label>
				        <input type="number" id="maj-prestige" name="maj-prestige" value="<?php echo $ligne['prestige']; ?>">
				    </div>

				    <button type="submit">Valider</button>
				</form>

			</div>

		</section>

		<?php
			mysqli_free_result($result);
			mysqli_close($link);
		?>



		<?php   
			if (count($_POST) > 0) {
				$link = bdConnexion();

				$recSQL = 
				"UPDATE dilemmeroi_joueurs 
		        SET 
		        prestige = {$_POST['maj-prestige']}
		        WHERE id = {$_GET['idjoueur']}";

		        $result = mysqli_query($link , $recSQL);

		        mysqli_free_result($result);
				mysqli_close($link);

		        header('location:index.php?page=joueur&idjoueur=' . $_GET['idjoueur']);
	        }
		?>




		
		<?php include(const_incl . 'footer.php'); ?>

	</body>
</html>