<div class="principal">
<h2>Sommaire notes</h2><br>
<?php
if(isset($_SESSION['etudiants']) && !empty($_SESSION['etudiants'])){
    //print_r($_SESSION);
    
    function calculerMoy($vecEtu){
        $nbEtudiants = 0;        
        $somme = 0;
        foreach($vecEtu as $key => $valeur) {
            $somme = $somme + $vecEtu[$key][1];
            $nbEtudiants++;
        }
        echo'Le groupe compte <b>'.$nbEtudiants.'</b> étudiants.<br><br>';
        return round($somme/$nbEtudiants,2);
    }
    
    function noteMax($vecEtu, $id){
        $max=0;
        foreach($vecEtu as $key => $valeur) {
            if($vecEtu[$key][1] > $vecEtu[$max][1]){
                $max=$key;
            }
        }
        return $vecEtu[$max][$id];
    }
    
    function noteMin($vecEtu, $id){
        $min=0;
        foreach($vecEtu as $key => $valeur) {
            if($vecEtu[$key][1] < $vecEtu[$min][1]){
                $min=$key;
            }
        }
        return $vecEtu[$min][$id];
    }
        
    echo'La moyenne du groupe est de <b>'.calculerMoy($_SESSION['etudiants']).'%</b>.<br><br>';
    echo'Celui qui à obtenu la meilleure note est '.noteMax($_SESSION['etudiants'], 0).' avec <b>'.noteMax($_SESSION['etudiants'], 1).'%</b>.<br><br>';
    echo'Celui qui à obtenu la moins bonne note est '.noteMin($_SESSION['etudiants'], 0).' avec <b>'.noteMin($_SESSION['etudiants'], 1).'%</b>.<br><br>';
    
} else {
    echo 'Aucune note de rentrée...';
}
?>

</div>