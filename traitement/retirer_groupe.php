<?php

      try{ 
        $bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage()); 
    }
	session_start();
	$login = $_SESSION['login'];
	$uha=$bdd->query('SELECT id from utilisateur where uha=\''.$login.'\'');
	$id = $uha->fetch();

$rep=$bdd->prepare('DELETE FROM appartient WHERE idUtil=:idutilisateur AND idGroup=:idgroupe');
$rep->execute(array('idutilisateur'=>$_GET['per'], 'idgroupe'=> $_GET['val']));
echo('<script>window.location="../gestion_membre.php?valeur='.$_GET['val'].'";</script>');
?>
