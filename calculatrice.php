<div class="principal">
<h2>Calculatrice</h2><br>

<?php

function multiplier($n1, $n2) {
	return $n1 * $n2;
}

function diviser($n1, $n2) {
    if($n2==0){ 
        $rep = 'l\'infini.';
    } else {
        $rep = $n1 / $n2;
    } return $rep;
}

function additionner($n1, $n2) {
	return $n1 + $n2;
}

function modulo($n1, $n2) {
	if($n2==0){ 
        $rep = 'l\'infini.';
    } else {
        $rep = $n1 % $n2;
    } return $rep;
}

function soustraire($n1, $n2) {
	return $n1 - $n2;
}

$options = array(
		'nb1' => array( 'filter' 	=> FILTER_VALIDATE_INT,
						'options' 	=> array('min_range' => 0)),
		'nb2' => array( 'filter'    => FILTER_VALIDATE_INT,
						'options'   => array('min_range' => 0))
);

$resultat = filter_input_array(INPUT_POST, $options);

if($resultat != null) { //Si le formulaire a bien été posté.
						//Enregistrer des messages d'erreur selon le cas.
	$messageErreur = array(
			'nb1' => '<a>Le nombre 1 n\'est pas valide (plus ou egal a 0).</a>',
			'nb2' => '<a>Le nombre 2 n\'est pas valide (plus ou egale a 0).</a>',
	);
	
	$nbrErreurs = 0;
	foreach($options as $key => $valeur) { //Parcourir tous les champs voulus.
		if(empty($_POST[$key]) && $_POST[$key] != 0) { 		   //Si le champ est vide.
			echo '<a>Veuillez remplir le champ ' . $key . '.</a><br/>';
			$nbrErreurs++;
		}
		elseif($resultat[$key] === false) { //S'il n'est pas valide.
			echo $messageErreur[$key] . '<br/>';
			$nbrErreurs++;
		}
	}
	
	if($nbrErreurs == 0) {
		
		$nb1 = $resultat['nb1'];
		$nb2 = $resultat['nb2'];
		$operateur = $_POST['operateur'];
		
		switch ($operateur) {
			case 'addition':
				$r = additionner($nb1, $nb2);
				break;
			case 'soustraction':
				$r = soustraire($nb1, $nb2);
				break;
			case 'multiplication':
				$r = multiplier($nb1, $nb2);
				break;
			case 'division':
				$r = diviser($nb1, $nb2);
				break;
			case 'modulo':
				$r = modulo($nb1, $nb2);
				break;
			}
		
		echo 'Les nombres ' . $nb1 . ' et ' . $nb2 . ' affectés par l\'operateur ' . $operateur . ' donne : ' . $r . '<br/>';

	}
}
else {
		echo 'Les nombres négatifs ne sont pas acceptés.';
}
?>
    <div class="form">
        <form action="" method="post">
         <p><label for="nb1">Nombre 1 :</label><input type="number" name="nb1" /></p>
         <p><label for="nb2">Nombre 2 :</label><input type="number" name="nb2" /></p>
         <p><label for="operateur">Operation :</label>
            <select name="operateur">
                <option value="addition">Addition</option>
                <option value="soustraction">Soustraction</option>
                <option value="multiplication" selected="selected">Multiplication</option>
                <option value="division">Division</option>
                <option value="modulo">Modulo</option>
            </select>
         </p>
         <p><input type="submit" value="Calculer"></p>
        </form>
    </div>    
</div>
