<?php
	try{ 
		$bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
    }
    catch(Exception $e){
		die('Erreur : '.$e->getMessage()); 
    }
	
	$login = $_SESSION['login'] ;
	$rep = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' ');  
	$id_utilisateur = $rep->fetch(); 
	echo('<div class="well">');	
	echo('<h2> Groupes auxquels vous appartenez  :</h2>');
	$rep = $bdd->query('SELECT distinct nom, description, id FROM groupe INNER JOIN appartient ON appartient.idGroup = groupe.id AND appartient.idUtil =\''.$id_utilisateur[0].'\' ');


	while($donnees=$rep->fetch()){
		echo('<div class="well">');	
		                                
								
								$img=$bdd->query('SELECT chemin from image WHERE idgroup = '.$donnees['id'].' ');
								$chemin=$img->fetch();
								
								if($chemin!=NULL){
								echo('<img src="');
								echo $chemin['chemin'];
								echo('" style="width:20%;height:20%;">');
								}
									else{
										echo('<img src="./uploaded/defaut.jpg" style="width:20%;height:20%;">');
									}
								
		echo('<a href="groupe_page.php?valeur='.$donnees['id'].'">'.$donnees['nom'].'<br /></a>');
		echo('<p>'.$donnees['description'].'</p>');
			echo('<div class="well">');	
								echo('<h4> Liste des membres :</h4>');
						$membre=$bdd->query('SELECT * FROM groupe INNER JOIN appartient ON groupe.id = appartient.idGroup INNER JOIN utilisateur ON appartient.idUtil = utilisateur.id where groupe.id='.$donnees['id'].' ORDER BY appartient.admin DESC');
						while($mem=$membre->fetch()){
							if($mem['admin'] == 1){
								echo('<p>'.$mem['prenom'].' '.$mem['nom'].' ADMINISTRATEUR </p>');
							}
							else{
								echo('<p>'.$mem['prenom'].' '.$mem['nom'].'');
							}
							
						}
		echo('</div>');
		echo('</div>');
	}
	

echo('</div>');
	echo('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>');
?>