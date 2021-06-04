<?php


	// CONNEXION BDD

    	function bdConnexion () {
            $link = mysqli_connect("localhost" , "root" , "root" , "dilemmeduroi");
            mysqli_set_charset($link , 'utf8');

            return $link;
        }

    // FIN CONNEXION BDD



?>