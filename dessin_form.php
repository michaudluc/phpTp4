<div class="principal">
<h2>Dessiner un rectangle</h2><br>

<?php

$options = array(
		'largeur' => array( 'filter' 	=> FILTER_VALIDATE_INT,
							'options' 	=> array('min_range' => 3,'max_range' => 10)),
		'hauteur' => array( 'filter'    => FILTER_VALIDATE_INT,
							'options'   => array('min_range' => 3, 'max_range' => 10))
);

$resultat = filter_input_array(INPUT_POST, $options);

if($resultat != null) { //Si le formulaire a bien été posté.			
	
    $nbrErreurs = 0;
    $messageErreur = array( //Enregistrer des messages d'erreur selon le cas.
			'largeur' => '<a>La hauteur n\'est pas valide (entre 3 et 10).</a>',
			'hauteur' => '<a>La largeur n\'est pas valide (entre 3 et 10).</a>',
	);
	
	foreach($options as $key => $valeur) { //Parcourir tous les champs voulus.
		if(empty($_POST[$key])) { 		   //Si le champ est vide.
			echo '<a>Veuillez remplir le champ ' . $key . '.</a><br/>';
			$nbrErreurs++;
		}
		elseif($resultat[$key] === false) { //S'il n'est pas valide.
			echo $messageErreur[$key] . '<br/>';
			$nbrErreurs++;
		}
	}
	
	if($nbrErreurs == 0) {
		$h=$resultat['hauteur'];
		$l=$resultat['largeur'];
		echo 'Voici l\'affichage d\'un rectangle de largeur ' . $l . ' et de hauteur ' . $h . '.<br/>';
		echo '<div class="rectangle">';
		for ($y = 1; $y <= $h; $y++) {
			for ($x = 1; $x <= $l; $x++) {
			if ($y==1 || $y==$h || $x==1 || $x==$l) echo "<div></div>";
			else echo "<span></span>";
			}
			echo "<br>";
		} echo '</div>';
	}
}
else {
		echo 'La largeur et la hauteur doivent être entre 3 et 10 inclusivement.';
}
?>
    <div class="form">
       <form action="" method="post">
         <p><label for="largeur">Largeur :</label><input type="text" name="largeur" /></p>
         <p><label for="hauteur">Hauteur :</label><input type="text" name="hauteur" /></p>
         <p><input type="submit" value="OK"></p>
       </form> 
    </div>
</div>