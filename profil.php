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
	
	$req = $bdd->query('SELECT nom,prenom from utilisateur where uha =\''.$login.'\' ');  
	$donnees = $req->fetch(); 
	
	
	
	
	?>


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
                             <a href="profil.html" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profil<br /></a>
                          </h4>
                            <p id="photoprofil">

							<?php
								
								$img=$bdd->query('SELECT chemin from image INNER JOIN utilisateur ON image.idutil = utilisateur.id where utilisateur.uha =\''.$login.'\' ');
								$chemin=$img->fetch();
								
								if($chemin!=NULL){
								echo('<img src="');
								echo $chemin['chemin'];
								echo('" style="width:60%;height:60%;" alt="image profile>">');
								}
									else{
										echo('<img src="./uploaded/unisex.jpg" style="width:60%;height:60%;" alt="image profile;">');
									}
								?>
                            </p>
                         </div>
                          <div class="col-md-6">
                           
				
					<?php
						$rep = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' ');  
						$id_utilisateur = $rep->fetch(); 
						$rep = $bdd->query('SELECT * FROM utilisateur where id=\''.$id_utilisateur[0].'\' ');
						
						
						while($donnees=$rep->fetch()){
	
							echo('<p>Nom : '.$donnees['nom'].'</p>');
							echo('<p>Prénom : '.$donnees['prenom'].'</p>');
							echo('<p>Adresse UHA : '.$donnees['uha'].'</p>');
							echo('<p>Adresse : '.$donnees['adresse'].'</p>');
							function Age($date_naissance)
							    {
								$arr1 = explode('-', $date_naissance);
								$arr2 = explode('-', date('Y-m-d'));

								if(($arr1[1] < $arr2[1]) || (($arr1[1] == $arr2[1]) && ($arr1[2] <= $arr2[2])))
								return $arr2[0] - $arr1[0];

								return $arr2[0] - $arr1[0] - 1;
							    }

							    $ma_date_de_naissance = $donnees['age'];
							    $mon_age = Age($ma_date_de_naissance);
							    echo('<p>Age : ');
							    echo $mon_age;
								echo (' ans </p>');
							
							
								function Anniv($date_naissance)
							    {
								$arr1 = explode('-', $date_naissance);
								$arr2 = explode('-', date('Y-m-d'));

								if(($arr1[1] < $arr2[1]) || (($arr1[1] == $arr2[1]) && ($arr1[2] <= $arr2[2])))
									return "<p>Joyeux anniversaire !!</p>";
							    }
								$anniv=anniv($ma_date_de_naissance);
								echo $anniv;
							
						}
						
						?>
						<p>
						<?php
							/* Sélection de la fonction de la personne, ou affichage de la promo si étudiant */ 
							
							$rep = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' ');  
							$id_utilisateur = $rep->fetch(); 
							$rep2 = $bdd->query('SELECT promotion from Etudiant where id=\''.$id_utilisateur[0].'\' ');
							$promo = $rep2->fetch(); 
							echo (''.$promo[0].'') ; 
							
							$rep3 = $bdd->query('SELECT fonction from administration where id=\''.$id_utilisateur[0].'\' ');
							$fonction = $rep3->fetch();
							echo (''.$fonction[0].''); 
						?>
						</p>
						<p>
						<?php
							$rep = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' ');  
							$id_utilisateur = $rep->fetch(); 
							
							$rep2 = $bdd->query('SELECT filiere from etudiant where id = \''.$id_utilisateur[0].'\' ');
							$filiere= $rep2->fetch(); 
							
							echo $filiere[0];
					?>	
				</p>
                           <form name = "description" method="post" >
			
				<textarea class="form-control" placeholder="Ecrivez quelque chose sur vous ici ... " name="description_profil" style="height: 15%; width: 100%"><?php
					$rep = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' ');  
					$id_utilisateur = $rep->fetch(); 
					if(isset($_POST['Modifier'])){ 
						if(!empty($_POST['description_profil'])){ 
							$description = $_POST['description_profil'];
							$bdd->query('UPDATE utilisateur SET description = \''.$description.'\' where id = \''.$id_utilisateur[0].'\' ');
						}
					}
					$rep2 = $bdd->query('SELECT description from utilisateur where id = \''.$id_utilisateur[0].'\' ');
					$descr = $rep2->fetch(); 
					
					echo $descr[0]; 
					
				?></textarea>
				<input type="submit" name="Modifier" value="Modifier" >
				
			</form>

                          </div>
                        </div>
                     </div>  
                </div>
				
                  <div class="well"> 
                    <a href="#">Paramètres du compte</a><br/>
                   <!-- <a href="./traitement/photo_profil.php">Changer votre photo de profil</a><br/>-->
                    <a href="./modification_profil.php">Modifier</a><br/> 
					<form name="changement" method="post" enctype="multipart/form-data">
					<input type="hidden" name="MAX_FILE_SIZE" value="100000"> Changer de photo de profil <input type="file" name="fichier">
					<input type ="submit" name="Changer" value="Changer" >
					</form>
					
					<?php
					if(isset($_POST['Changer'])){ 
						$fichier = $_FILES['fichier']['name'] ;
						include('./traitement/upload_profil.php');
						
					}
					?>
					
                   </div>
                   <div class="well" id ="Publication">
				   
			<form name="Publier" method="post" enctype="multipart/form-data">

		
				<input class="form-control" type="text" placeholder="Un titre" name="titre" style="height: 5%; width: 100%">
				<input class="form-control" type="text" placeholder="Où étiez-vous ? " name="position" style="height: 5%; width: 100%">
				<input class="form-control" type="text" placeholder="Rédigez votre publication ici" name="contenu" style="height: 10%; width: 100%"> 
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
				$fichier = $_FILES['fichier']['name'] ; 
				
				include('./traitement/mots_interdits.php'); 

			if($existe == FALSE ){ 
			$insert_actualite = $bdd->prepare('INSERT INTO actualite(titre,contenu,position,fichier,date,mkgroup) VALUES( :titre , :contenu,:position, :fichier ,\''.$time.'\',0)'); 
			$insert_actualite->execute(array('titre' => $_POST['titre'], 'contenu' => $_POST['contenu'], 'position' => $_POST['position'],'fichier' =>$_FILES['fichier']['name'] ));
			//include('./traitement/upload.php'); 
        $id_utilisateur = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' '); 
						$id_actualite = $bdd ->prepare('SELECT id from actualite where titre = :titre and contenu = :contenu') ; 

			$id_actualite->execute(array('titre' => $_POST['titre'], 'contenu' => $_POST['contenu']));
			
				$id_uti = $id_utilisateur->fetch();
				$id_act = $id_actualite ->fetch(); 
			
			
			if(isset($_FILES['fichier']) && !empty($_FILES['fichier']['name'])){
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
			echo '<br>'.$chemin.'<br>' ; 
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
				echo('<script>window.location = "./profil.php?valeur='.$_GET['valeur'].'";</script>');
				}
		}
		
		
		echo('<h2> Mes publications </h2>');
								$rep = $bdd->query('SELECT id from utilisateur where uha =\''.$login.'\' ');  
						$id_utilisateur = $rep->fetch(); 
		$rep = $bdd->query('SELECT * FROM actualite INNER JOIN post on actualite.id = post.idact INNER JOIN utilisateur on post.iduti = utilisateur.id where utilisateur.id = \''.$id_utilisateur[0].'\' AND actualite.mkgroup = 0 ORDER BY date desc');

		if (isset($_FILES['fichier'])){
			echo $_FILES['fichier']['name'] ; 
		}
		
		include('./traitement/smiley.php'); 
		include('traitement/nb_coms.php'); 
		include('./traitement/video_youtube.php'); 
		
		while($donnees=$rep->fetch()){
			echo('<div class="well">');
			$id_actualite = $bdd ->prepare('SELECT id from actualite where contenu = :contenu and titre = :titre ') ; 
			$id_actualite->execute(array('contenu'=>$donnees['contenu'], 'titre'=>$donnees['titre']));
			$id = $id_actualite->fetch(); 
			
			?>	
				<a href='./traitement/deleteOnProfile.php?id=<?php echo $id[0]; ?> '>Supprimer</a>
			<?php 
			
				$img=$bdd->query('SELECT chemin from image WHERE idact ='.$donnees['idact'].' ');
	$chemin=$img->fetch();
	
					if($chemin!=NULL){	
		echo('<br><img src="');
		echo $chemin['chemin'];
		echo('" style="width:40%;height:40%;" alt="img-contenu;">');
	}
			
			echo('<h2>'.$donnees['titre'].'</h2>');
			
			
			
			
			echo('<p>'.filtre_texte($donnees['contenu']).'</p>');
			
			isYoutubeVideo($donnees['contenu'],'100%','100%'); 
			
			if($donnees['position'] != ''){
				echo('<p>'.'À '.$donnees['position'].'</p>'); 
			}
			echo('<br>');
			echo('<p>'.$donnees['date'].'</p>');
			?>
			
				<a href='./commenter.php?id=<?php echo $id[0]; ?> '>Commenter <?php echo '('.count_com($id[0]).')' ; ?> </a>
			
			<?php
			echo('</div>');
}


		echo('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>');
	
	?>

            </div>
            
         </div>

        </div>
		</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
  </body>
</html>

