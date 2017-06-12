<?php include('header.php'); ?>

<script>
function refresh_liste()

{

var xhr_object = null;

if(window.XMLHttpRequest)

{ // Firefox

xhr_object = new XMLHttpRequest();

}

else if(window.ActiveXObject)

{ // Internet Explorer

xhr_object = new ActiveXObject('Microsoft.XMLHTTP');

}

var method = 'GET';

var filename = './traitement/liste_ami.php';

xhr_object.open(method, filename, true);

xhr_object.onreadystatechange = function()

{

if(xhr_object.readyState == 4)

{

var tmp = xhr_object.responseText;

document.getElementById('list').innerHTML = tmp;

}

}

xhr_object.send(null);

setTimeout('refresh_liste()', 1500);

}

</script>

<?php 
	$login = $_SESSION['login'] ;
	
	$req = $bdd->query('SELECT nom,prenom,id from utilisateur where uha =\''.$login.'\' ');  
	$donnees = $req->fetch(); 
	
	$group=$bdd->query('SELECT idUtil from appartient where idGroup = '.$_GET['valeur'].' AND idUtil = '.$donnees['id'].' ');
	$valid = $group->fetch();
	
	if($valid==NULL){
		echo('<script>window.location = "./error_groupe.php";</script>');
	}
	
	
	echo '<title>'.$donnees['prenom']." ".$donnees['nom'].'</title>' ; 
	
	
	?>
<body onload='refresh_liste(); refresh_actualite();'>

    <div class="container">
	
	<strong>Profil  </strong> 	<form method="post" action="./traitement/deconnexion.php">
		<input type="submit" name ="deconnexion" value="Se déconnecter" />
		</form>
        <div class="row" style="">
            <div class="col-md-3" id="list" >

        
      </div>
            <div class="col-md-7" >
                 <div class="well">  
                    <div class="row">
                     <div class="col-md-12">
                        <div class="col-md-6">
                          <h4>
                             <a href="profil.html" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Groupe<br /></a>
                          </h4>
                            <p id="photoprofil">
                                <?php
								
								$img=$bdd->query('SELECT chemin from image WHERE idgroup = '.$_GET['valeur'].' ');
								$chemin=$img->fetch();
								
								if($chemin!=NULL){
								echo('<img src="');
								echo $chemin['chemin'];
								echo('" style="width:60%;height:60%;">');
								}
									else{
										echo('<img src="./uploaded/defaut.jpg" style="width:60%;height:60%;">');
									}
								?>
                            </p>
                         </div>
                          <div class="col-md-6">
                           <p>
				
					<?php
						$rep = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' ');  
						$id_utilisateur = $rep->fetch(); 
						$rep = $bdd->query('SELECT * FROM groupe where id=\''.$_GET['valeur'].'\' ');
						
						
						while($donnees=$rep->fetch()){
	
							echo('Nom : '.$donnees['nom'].'</br>');
						}
						
						?>
						</p>
						<p>
						<?php
						echo('<h4> Liste des membres </h4>');
						$membre=$bdd->query('SELECT * FROM groupe INNER JOIN appartient ON groupe.id = appartient.idGroup INNER JOIN utilisateur ON appartient.idUtil = utilisateur.id where groupe.id='.$_GET['valeur'].' ORDER BY appartient.admin DESC');
						while($mem=$membre->fetch()){
							if($mem['admin'] == 1){
								echo('<p>'.$mem['prenom'].' '.$mem['nom'].' ADMINISTRATEUR </p>');
							}
							else{
								echo('<p>'.$mem['prenom'].' '.$mem['nom'].'');
							}
							
						}
						?>
						</p>
						

				<form name = "description" method="post" >
				<textarea align="left" placeholder="Modifier la description du Groupe ... " name="description_groupe" style="height: 15%; width: 100%"><?php
						
					if(isset($_POST['Modifier'])){ 
						if(!empty($_POST['description_groupe'])){ 
							$description = $_POST['description_groupe'];
							$bdd->query('UPDATE groupe SET description = \''.$description.'\' where id = \''.$_GET['valeur'].'\' ');
						}
					}
					$rep2 = $bdd->query('SELECT description from groupe where id = \''.$_GET['valeur'].'\' ');
					$descr = $rep2->fetch(); 
					
					echo $descr[0]; 
					
				?></textarea>
									<?php
					$rep = $bdd->query('SELECT * FROM groupe INNER JOIN appartient ON groupe.id = appartient.idGroup INNER JOIN utilisateur ON appartient.idUtil = utilisateur.id where groupe.id='.$_GET['valeur'].' AND utilisateur.uha = \''.$login.'\' ');  
					$id_utilisateur = $rep->fetch(); 
						if($id_utilisateur['admin'] == 1){
                           echo('<input type="submit" name="Modifier" value="Modifier" >');
						}
						?>
				
				
			</form>
                          </div>
                        </div>
                     </div>  
                </div>
                  <div class="well"> 
				  <?php if($id_utilisateur['admin'] == 1){
                    echo('<a href="./traitement/suppression_groupe.php?valeur='.$_GET['valeur'].'">Supprimer le groupe</a><br/>');
					echo('<form name="changement" method="post" enctype="multipart/form-data">');
					echo('<input type="hidden" name="MAX_FILE_SIZE" value="100000"> Changer la photo de groupe <input type="file" name="fichier">');
					echo('<input type ="submit" name="Changer" value="Changer" >');
					echo('</form>');
					
					
					if(isset($_POST['Changer'])){ 
						$fichier = $_FILES['fichier']['name'] ;

	
	function ajout_image ($chemin){	
		
		try{ 
        $bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
		}
		
		catch(Exception $e){
			die('Erreur : '.$e->getMessage()); 
		}
		
		$login = $_SESSION['login']; 
		
		$bdd->query('DELETE FROM image where idgroup = '.$_GET['valeur'].' ');

		$bdd->query('INSERT INTO image(idutil,idact,idgroup,chemin) VALUES( 0,0,'.$_GET['valeur'].',\''.$chemin.'\') '); 
		
		
	}
		
	$dossier = './uploaded/';
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
			$chemin = $dossier.$fichier;
			echo '</br>'.$chemin.'</br>' ; 
			ajout_image($chemin);
		}
		else{
			echo 'Echec de l\'upload !';
		}
	}
	else{
     
	 echo $erreur;
	}
	
	
		//echo('"./groupe_page.php?valeur='.$_GET['valeur'].'"');
	echo('<script>window.location="./groupe_page.php?valeur='.$_GET['valeur'].'";</script>');
	
	
					}
					
					
                    echo('<a href="./gestion_membre.php?valeur='.$_GET['valeur'].'">Gestion des membres</a><br/>');
				  }
				  else echo('L\'accès au panel de gestion du groupe est reservé aux administrateurs');?>
                   </div>
                   <div class="well" >
			<form name="Publier" method="post" enctype="multipart/form-data">
		
				<input type="textarea" placeholder="Un titre" name="titre" style="height: 5%; width: 100%">
				<input type="textarea" placeholder="Où étiez-vous ? " name="position" style="height: 5%; width: 100%">
				<input type="textarea" placeholder="Rédigez votre publication ici" name="contenu" style="height: 10%; width: 100%"> 
				<input type="hidden" name="MAX_FILE_SIZE" value="100000"> Ajouter une photo <input type="file" name="fichier">
				<input type ="submit" name="Publier" value="Publier" >

				
				
			</form>
                   </div>
            <div class="well" >
               <?php
			if(isset($_POST['Publier'])){ 
				if(!empty($_POST['contenu'])){ 
			 
				$contenu = $_POST['contenu'];
				$titre = $_POST['titre']; 
				$time = date("Y-m-d H:i:s");
				
				include('./traitement/mots_interdits.php'); 
			if($existe == FALSE ){ 
			$insert_actualite = $bdd->prepare('INSERT INTO actualite(titre,contenu,position,fichier,date,mkgroup) VALUES( :titre , :contenu,:position, \'\' ,\''.$time.'\','.$_GET['valeur'].')'); 
			$insert_actualite->execute(array('titre' => $_POST['titre'], 'contenu' => $_POST['contenu'], 'position' => $_POST['position']));
					
				$id_utilisateur = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' '); 
						$id_actualite = $bdd ->prepare('SELECT id from actualite where titre = :titre and contenu = :contenu') ; 
			$id_actualite->execute(array('titre' => $_POST['titre'], 'contenu' => $_POST['contenu']));
			
				$id_uti = $id_utilisateur->fetch();
				$id_act = $id_actualite ->fetch(); 
				
							if(isset($_FILES['fichier'])){
				 $fichier = $_FILES['fichier']['name'] ;
				 echo($fichier);
				 
				 
				 $dossier = './uploaded/';

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
			$chemin = $dossier.$fichier;
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
				
				
			
				$insert_post = $bdd->query('INSERT INTO post VALUES(\''.$id_uti[0].'\',\''.$id_act[0].'\',0) '); 
			
				//header("location:profil.php"); 
			}
			}
		
			else{
				/*echo"<script language=\"javascript\">" ; 
				echo"alert('Vous devez saisir au moins du texte pour pouvoir publier')";
				echo"</script>";*/
				header("location:profil.php"); 
				}
		}
		
		
		echo('<h2> Publications du groupe: </h2>');
								$rep = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' ');  
						$id_utilisateur = $rep->fetch(); 
		$rep = $bdd->query('SELECT * FROM actualite INNER JOIN post on actualite.id = post.idact INNER JOIN utilisateur on post.iduti = utilisateur.id where actualite.mkgroup='.$_GET['valeur'].' ORDER BY date desc');

		include('./traitement/smiley.php'); 
		include('./traitement/video_youtube.php'); 
		
		while($donnees=$rep->fetch()){
			echo('<div class="well">');
			$id_actualite = $bdd ->query('SELECT id from actualite where contenu = \''.$donnees['contenu'].'\' and titre = \''.$donnees['titre'].'\' ') ; 
			$id = $id_actualite->fetch(); 
			$tmp = $bdd->query('SELECT * FROM groupe INNER JOIN appartient ON groupe.id = appartient.idGroup INNER JOIN utilisateur ON appartient.idUtil = utilisateur.id where groupe.id='.$_GET['valeur'].' AND utilisateur.uha = \''.$login.'\' ');  
			$util = $tmp->fetch(); 
							
						if($util['admin'] == 1){
				echo('<a href=\'./traitement/deleteOnProfile.php?id='.$id[0].'\'>Supprimer</a>');
						}

							$img=$bdd->query('SELECT chemin from image WHERE idact ='.$donnees['idact'].' ');
	$chemin=$img->fetch();
	
					if($chemin!=NULL){	
		echo('</br><img src="');
		echo $chemin['chemin'];
		echo('" style="width:40%;height:40%;">');
	}
						

			echo('<h2>'.$donnees['titre'].'</h2>');
			echo('<p>'.$donnees['contenu'].'<p>');
			
			isYoutubeVideo($donnees['contenu'],'100%','100%'); 
			
			if($donnees['position'] != ''){
				echo('<p>'.'À '.$donnees['position'].'</p>'); 
			}
			echo('<p> Par <a href="./profil_autre?id='.$donnees['id'].'" class="btn-sm btn-info" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>'.$donnees['prenom'].' '.$donnees['nom'].' </a></p>');
			echo('</br>');
			echo('<p>'.$donnees['date'].'<p>');
			echo('</div>');
}


		echo('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>');
	
	?>
            </div>
            
         </div>

        

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
  </body>
</html>
