<!DOCTYPE html>
<html lang="fr">
    <?php include(const_incl . 'head.php'); ?>
    	
    <body>
    	<?php include(const_incl . 'header.php'); ?>

			
    	<section>
			<h1>Se connecter</h1>

			<form action="index.php?page=login" method="POST">

				<div>
					<label for='nom'>Nom</label>
					<input type='text' name='nom' id='nom' required />
				</div>

				<div>
					<label for='maison'>Maison</label>
					<input type='text' name='maison' id='maison' required />
				</div>

				<button type="submit">Se connecter</button>

			</form>
		</section>

		<?php include(const_incl . 'footer.php'); ?>

	</body>
</html>