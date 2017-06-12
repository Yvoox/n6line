<!DOCTYPE html>
<html lang="fr" >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>N6Line</title>
<link rel="stylesheet" type="text/css" href="./CSS/style_recherche.css">
    </head>
</html>
<?php 
    try{ 
        $bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage()); 
    }
	
 if(isset($_POST['search'])){ 	
	$search = $bdd->query('SELECT * FROM actualite INNER JOIN post on actualite.id = post.idact INNER JOIN utilisateur on post.iduti = utilisateur.id where COALESCE(contenu, \'\')   LIKE \'%'.$_POST['search'].'%\' ORDER BY date DESC');
	$search_title = $bdd->query('SELECT * FROM actualite INNER JOIN post on actualite.id = post.idact INNER JOIN utilisateur on post.iduti = utilisateur.id where COALESCE(titre, \'\')   LIKE \'%'.$_POST['search'].'%\' ORDER BY date DESC');
	$search_pos = $bdd->query('SELECT * FROM actualite INNER JOIN post on actualite.id = post.idact INNER JOIN utilisateur on post.iduti = utilisateur.id where COALESCE(position, \'\')   LIKE \'%'.$_POST['search'].'%\' ORDER BY date DESC');
	include('./smiley.php');
	echo('<h2> Recherche dans les contenus : </h2>');
	while($result=$search->fetch()){
	if($result['mkgroup'] == 0){
		
		echo('<div class="well">');
		echo('<h2 style=>'.$result['titre'].'</h2>');
		echo('<p>'.filtre_texte($result['contenu']).'<p>');
		if($result['position'] != ''){
		echo('<p>'.'A '.$result['position'].'</p>'); 
		}
	
	echo('</br>');
	echo('<p>'.$result['date'].'<p>');
	echo('<p> Par '.$result['prenom'].' '.$result['nom'].'<p>');
	echo('</div>');
	}
	}
	
		echo('<h2> Recherche dans les titres : </h2>');
	while($result=$search_title->fetch()){
		if($result['mkgroup'] == 0){
		echo('<div class="well">');
		echo('<h2>'.$result['titre'].'</h2>');
		echo('<p>'.filtre_texte($result['contenu']).'<p>');
		if($result['position'] != ''){
		echo('<p>'.'A '.$result['position'].'</p>'); 
		}
	
	echo('</br>');
	echo('<p>'.$result['date'].'<p>');
	echo('<p> Par '.$result['prenom'].' '.$result['nom'].'<p>');
	echo('</div>');
	}
	}
	
			echo('<h2> Recherche dans les positions : </h2>');
	while($result=$search_pos->fetch()){
		if($result['mkgroup'] == 0){
		echo('<div class="well">');
		echo('<h2>'.$result['titre'].'</h2>');
		echo('<p>'.filtre_texte($result['contenu']).'<p>');
		if($result['position'] != ''){
		echo('<p>'.'A '.$result['position'].'</p>'); 
		}
	
	echo('</br>');
	echo('<p>'.$result['date'].'<p>');
	echo('<p> Par '.$result['prenom'].' '.$result['nom'].'<p>');
	echo('</div>');
	}
	}
	}
      ?> 
