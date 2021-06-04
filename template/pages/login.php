<?php
	$nom = $_POST['nom'];
	$maison = $_POST['maison'];

	if (!empty($_POST)) {

		if ( (!empty($nom)) AND (!empty($maison)) ) {

			$link = bdConnexion();

			$recSQL = 
			"SELECT

			dilemmeroi_joueurs.id AS idJoueur, 
			dilemmeroi_joueurs.nom AS nomJoueur,

			dilemmeroi_maisons.id AS idMaison,
			dilemmeroi_maisons.nom AS nomMaison,
			dilemmeroi_maisons.structure AS strucMaison

			FROM dilemmeroi_joueurs 

			INNER JOIN dilemmeroi_maisons ON dilemmeroi_joueurs.maison = dilemmeroi_maisons.ID

			WHERE dilemmeroi_joueurs.nom = '{$nom}' AND dilemmeroi_maisons.nom = '{$maison}'";

			$result = mysqli_query($link , $recSQL);
			$row_cnt = mysqli_num_rows($result);
			$ligne = mysqli_fetch_array($result);

			echo $row_cnt;

			if( $row_cnt == 1 ) {
			   	$_SESSION['idDilemmeRoi'] = $ligne['idJoueur'];
			   	$_SESSION['nomDilemmeRoi'] = $ligne['nomJoueur'];
			   	$_SESSION['maisonDilemmeRoi'] = $ligne['nomMaison'];

			   	mysqli_free_result($result);
				mysqli_close($link);

				header("Location: index.php?page=joueur&idjoueur={$_SESSION['idDilemmeRoi']}");
		   	} else {
		      	echo "ERREUR";
		   	}

		} else {
			echo "ERREUR";
		}
	}				

?>