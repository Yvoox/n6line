<?php
 include('header.php');

 ?>

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
	$name = $bdd->query('SELECT id FROM utilisateur where uha = \''.$login.'\'');
$sessionid=$name->fetch();

	$id = $_GET['id']; 
	if($sessionid['id'] == $id){
		?><script type='text/javascript'>document.location.replace('profil.php');</script>"<?php
	}
	
	$req = $bdd->query('SELECT nom,prenom from utilisateur where uha =\''.$login.'\' ');  
	$donnees = $req->fetch(); 
	
	
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
                             <a href="profil.html" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profil<br /></a>
                          </h4>
                            <p id="photoprofil">
                                <?php
								
								$img=$bdd->query('SELECT chemin from image INNER JOIN utilisateur ON image.idutil = utilisateur.id where utilisateur.id =\''.$id.'\' ');
								$chemin=$img->fetch();
								
								if($chemin!=NULL){
								echo('<img src="');
								echo $chemin['chemin'];
								echo('" style="width:60%;height:60%;">');
								}
									else{
										echo('<img src="./uploaded/unisex.jpg" style="width:60%;height:60%;">');
									}
								?>
                            </p>
                         </div>
                          <div class="col-md-6">
                           <p>
				
					<?php
						$rep = $bdd->query('SELECT * FROM utilisateur where id='.$id.''); 
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
							    echo('Age : ');
							    echo $mon_age;
								echo (' ans<br>');
							
							
								function Anniv($date_naissance)
							    {
								$arr1 = explode('-', $date_naissance);
								$arr2 = explode('-', date('Y-m-d'));

								if(($arr1[1] < $arr2[1]) || (($arr1[1] == $arr2[1]) && ($arr1[2] <= $arr2[2])))
									return "C'est son anniversaire !";
							    }
								$anniv=anniv($ma_date_de_naissance);
								echo $anniv;
							
						}
						
						?>
						</p>
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
			
				<textarea class="form-control" align="left" placeholder="Pas de description renseignée ... " name="description_profil" style="height: 15%; width: 100%"><?php
					$rep2 = $bdd->query('SELECT description from utilisateur where id = \''.$id.'\' ');
					$descr = $rep2->fetch(); 
					
					echo $descr[0]; 				
				?></textarea>			
			</form>
                          </div>
                        </div>
                     </div>  
                </div>

            <div class="well" >
			<?php
		echo('<h2> Ses publications </h2>');
		$rep = $bdd->query('SELECT * FROM actualite INNER JOIN post on actualite.id = post.idact INNER JOIN utilisateur on post.iduti = utilisateur.id where utilisateur.id = \''.$id.'\' ORDER BY date desc');

		include('./traitement/smiley.php'); 
		include('./traitement/video_youtube.php'); 
		
		while($donnees=$rep->fetch()){
			echo('<div class="well">');
			$id_actualite = $bdd ->prepare('SELECT id from actualite where contenu = :contenu and titre = :titre ') ; 
			$id_actualite ->execute(array('contenu' => $donnees['contenu'], 'titre' => $donnees['titre']));
			$id = $id_actualite->fetch(); 
			echo('<h2>'.$donnees['titre'].'</h2>');
			echo('<p>'.filtre_texte($donnees['contenu']).'<p>');
			
			isYoutubeVideo($donnees['contenu'],'100%','100%'); 
			
			if($donnees['position'] != ''){
				echo('<p>'.'À '.$donnees['position'].'</p>'); 
			}
			echo('</br>');
			echo('<p>'.$donnees['date'].'<p>');
			echo('</div>');
}


		echo('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>');


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
