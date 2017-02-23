<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8" />
<title>TP4</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div class="container">
<?php
	include_once 'en-tete.php';
	include_once 'menu.php';
	if (isset ($_GET ['action'])) {
		if ($_GET ['action'] == "dessin"){
	           include_once 'dessin_form.php';
		} else if ($_GET ['action'] == "calculatrice"){      
	           include_once 'calculatrice.php';
		} else if ($_GET ['action'] == "etudiants"){      
	           include_once 'etudiants.php';
		} else if ($_GET ['action'] == "sommaire"){      
	           include_once 'sommaire.php';
		}
	} else { include_once 'dessin_form.php'; }
	include_once 'pied.php';
?>	
</div>
</body>
</html>