<?php
	$link = bdConnexion();

	$recSQL = "SELECT * FROM dilemmeroi_joueurs ORDER BY prestige";
	$result = mysqli_query($link , $recSQL);

	$nbChoix = 0;

	while ($ligne = mysqli_fetch_array($result)) {
		if ($ligne['ID'] == 1) {
			$recSQL2 = 
			"UPDATE dilemmeroi_joueurs 
		    SET 
		    main = '1',
			ordre = '0'";

		    $result2 = mysqli_query($link , $recSQL2);
		} else {
			$nbChoix++;

			$recSQL2 = 
			"UPDATE dilemmeroi_joueurs 
		    SET 
		    main = '1',
			ordre = '{$nbChoix}'
			WHERE ID = {$ligne['ID']}";

		    $result2 = mysqli_query($link , $recSQL2);
		}
	}

	mysqli_free_result($result);
    mysqli_free_result($result2);
	mysqli_close($link);

    header('location:index.php?page=joueur&idjoueur=' . $_SESSION['idDilemmeRoi']);
   
?>