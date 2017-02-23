<div class="principal">
<h2>Ajouter un étudiant</h2><br>

<?php
//session_destroy(); 
if (!isset($_SESSION['etudiants'])){
        $_SESSION['etudiants'] = array();
}
    
function longueurNom($elNom){
    //Retourne le nom s'il est valide, sinon false.
    $nbChar=strlen($elNom);
    return (($nbChar > 2) && ($nbChar < 21)) ? $elNom : false;   
}
    
$options = array(
		'nom'  => array('filter'  => FILTER_CALLBACK,
                        'options' =>'longueurNom'),
        'note' => array( 'filter'  => FILTER_VALIDATE_INT,
				         'options' => array('min_range' => 0,
                                            'max_range' => 100)),
        'session'  => array()
);
    
$resultat = filter_input_array(INPUT_POST, $options);

if($resultat != null) { //Si le formulaire a bien été posté.
						//Enregistrer des messages d'erreur selon le cas.
	$messageErreur = array(
			'nom' => '<a>Le nom n\'est pas valide, il doit avoir entre 3 et 20 caractères.</a>',
            'note' => '<a>La note n\'est pas valide (entre 0 et 100).</a>'
	);
	
	$nbrErreurs = 0;
	foreach($options as $key => $valeur) { //Parcourir tous les champs voulus.
		if(empty($_POST[$key]) && $_POST[$key]!=='0') { 		   //Si le champ est vide.
			echo '<a>Veuillez remplir le champ ' . $key . '.</a><br/>';
			$nbrErreurs++;
		}
		elseif($resultat[$key] === false) { //S'il n'est pas valide.
			echo $messageErreur[$key] . '<br/>';
			$nbrErreurs++;
		}
	}
	
	if($nbrErreurs == 0) {
        $nom = $resultat['nom'];
		$note = $resultat['note'];
        $session = $resultat['session'];
        $etudiant = array($nom,$note,$session);
        array_push($_SESSION['etudiants'], $etudiant);
	}
}
?>
<div class="form">
    <form action="" method="post">
     <p><label for="nom">Nom :</label><input type="text" name="nom" /></p>
     <p><label for="note">Note :</label><input type="number" name="note" /></p>
     <label for="operateur">Session :</label><br>
        <input type="radio" name="session" id="S1" value="S1" checked/><label for="S1">Session 1</label><br>
        <input type="radio" name="session" id="S2" value="S2"/><label for="S2">Session 2</label><br>
        <input type="radio" name="session" id="S3" value="S3"/><label for="S3">Session 3</label><br>
        <input type="radio" name="session" id="S4" value="S4"/><label for="S4">Session 4</label><br>
        <input type="radio" name="session" id="S5" value="S5"/><label for="S5">Session 5</label><br>
        <input type="radio" name="session" id="S6" value="S6"/><label for="S6">Session 6</label><br>
     <p><input type="submit" value="Valider"></p>
    </form>
</div>   
<?php
    if($_SESSION['etudiants']!==Array()){
    //print_r($_SESSION);
echo'<table>
        <tr>
          <td>Nom</td>
          <td>Note</td>
          <td>Session</td>
        </tr>';

foreach($_SESSION['etudiants'] as $key => $valeur) {
      echo '<tr>
              <td>'.$_SESSION['etudiants'][$key][0].'</td>
              <td>'.$_SESSION['etudiants'][$key][1].'</td>
              <td>'.$_SESSION['etudiants'][$key][2].'</td>
            </tr>';
}
echo '</table>';
    }
?>

</div>
