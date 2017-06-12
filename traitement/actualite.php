<?php


    try{ 
        $bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage()); 
    }

session_start(); 
$login = $_SESSION['login'] ;
$name = $bdd->query('SELECT nom,prenom FROM utilisateur where uha = \''.$login.'\'');
$accueil=$name->fetch();
echo ('Bienvenue '.$accueil['nom'].' '.$accueil['prenom'].' ');
	
 if(isset($_POST['Publier'])){ 
        if(!empty($_POST['contenu'])){ 

			
			
//			$titre = $bdd->quote($titre);
//			$contenu = $bdd ->quote($contenu); 
			$time=date("Y-m-d H:i:s");
			echo 'contenu'.'</br>' ; 
			echo 'titre'.'</br>' ; 
			$id_utilisateur = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' '); 
			$id_uti = $id_utilisateur->fetch();
			
			include('./mots_interdits_accueil.php'); 
			
			if($existe == FALSE ){ 
			$insert_actualite = $bdd->prepare('INSERT INTO actualite(titre,contenu,position,fichier,date,mkgroup) VALUES( :titre , :contenu,:position, \'\' ,\''.$time.'\',0)'); 
			$insert_actualite->execute(array('titre' => $_POST['titre'], 'contenu' => $_POST['contenu'], 'position' => $_POST['position']));
			

			
			$id_actualite = $bdd ->prepare('SELECT id from actualite where titre = :titre and contenu = :contenu') ; 
			$id_actualite->execute(array('titre' => $_POST['titre'], 'contenu' => $_POST['contenu']));
			$id_act = $id_actualite ->fetch();
			
			 if(isset($_FILES['fichier'])){
				 $fichier = $_FILES['fichier']['name'] ;
				 echo($fichier);
				 
				 
				 $dossier = '../uploaded/';
				 $up='./uploaded/';
	$fichier = basename($_FILES['fichier']['name']); 
	$taille_maxi = 100000;
	$taille = filesize($_FILES['fichier']['tmp_name']);
	$extensions = array('.png', '.gif', '.jpg', '.jpeg');
	$extension = strrchr($_FILES['fichier']['name'], '.'); 
	if(!in_array($extension, $extensions)){
		$erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
	}
	
	if($taille>$taille_maxi){
     $erreur = 'Le fichier est trop gros...';
	}
	
	if(!isset($erreur)){
		$fichier = strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

     
		if(move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier.$fichier)){
			echo 'Upload effectué avec succès !';
			$chemin = $up.$fichier;
			echo '</br>'.$chemin.'</br>' ; 
			$bdd->query('INSERT INTO image(idutil,idact,idgroup,chemin) VALUES( 0,'.$id_act[0].',0,\''.$chemin.'\') ');
		}
		else{
			echo 'Echec de l\'upload !';
		}
	}
	else{
     
	 echo $erreur;
	}
				 
				 
			 }
			
			
			//echo $id_uti[0] ;

			
			
			$insert_post = $bdd->query('INSERT INTO post VALUES(\''.$id_uti[0].'\',\''.$id_act[0].'\',0) '); 
			
			
			header("location:../accueil.php"); 
			}
						else{
			header("location:../accueil.php"); 
			}
		}
		
		else{
			/*echo"<script language=\"javascript\">" ; 
			echo"alert('Vous devez saisir au moins du texte pour pouvoir publier')";
			echo"</script>";*/
			header("location:../accueil.php"); 
		}
 }
	
	
echo('<h1> Les actualités :</h1>');
$rep = $bdd->query('SELECT * FROM actualite INNER JOIN post on actualite.id = post.idact INNER JOIN utilisateur on post.iduti = utilisateur.id WHERE mkgroup = 0 ORDER BY date desc');

$id_utilisateur = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' '); 
$id_uti = $id_utilisateur->fetch();
			
include('./smiley.php'); 
include('nb_coms.php'); 
include('video_youtube.php'); 

while($donnees=$rep->fetch()){
	echo('<div class="well">');
	if($donnees['id'] == $id_uti[0]){
	?>	
		<a href='./traitement/deleteOnHome.php?id=<?php echo $donnees['idact']; ?> '>Supprimer</a>
	<?php 
	}
	
	$img=$bdd->query('SELECT chemin from image WHERE idact ='.$donnees['idact'].' ');
	$chemin=$img->fetch();
	
					if($chemin!=NULL){	
		echo('</br><img src="');
		echo $chemin['chemin'];
		echo('" style="width:40%;height:40%;">');
	}
								


	echo('<h2>'.$donnees['titre'].'</h2>');
	echo('<p>'.filtre_texte($donnees['contenu']).'<p>');
	isYoutubeVideo($donnees['contenu'],'100%','50%'); 
	
		if($donnees['position'] != ''){
		echo('<p>'.'A '.$donnees['position'].'</p>'); 
	}
	echo('</br>');
	echo('<p>'.$donnees['date'].'<p>');
	echo('<p> Par <a href="./profil_autre.php?id='.$donnees['id'].'" class="btn-sm btn-info" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>'.$donnees['prenom'].' '.$donnees['nom'].' </a></p>');
	// echo('<p> Par '.$donnees['prenom'].' '.$donnees['nom'].'<p>');
	
	?>
		<a href='./commenter.php?id=<?php echo $donnees['idact']; ?> '>Commenter <?php echo '('.count_com($donnees['idact']).')' ; ?> </a>
	<?php
	

	
	echo('</div>');

}


echo('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>');
?>
