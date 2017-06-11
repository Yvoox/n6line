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
	//echo $id['id'];

	$supp=$bdd->query('DELETE FROM groupe WHERE id='.$_GET['valeur'].' ');
	header('Location: ../groupe.php'); 

	
					  
?> 