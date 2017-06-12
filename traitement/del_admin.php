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

$rep=$bdd->prepare('UPDATE appartient SET admin=0 WHERE idUtil=:idUtil AND idGroup=:idGroup');
$rep->execute(array('idUtil'=>$_GET['per'], 'idGroup'=> $_GET['val']));
echo('<script>window.location="../gestion_membre.php?valeur='.$_GET['val'].'";</script>');
?>