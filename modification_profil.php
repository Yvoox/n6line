<?php include('./header.php');?>

<div class="container">
 
	<h1>Modification des paramètres du profil</h1>
    <div id="contenu_modification">
        
		<form method="post" action="./traitement/deconnexion.php">
			<input type="submit" class="btn btn-info" name ="deconnexion" value="Se déconnecter" />
		</form>
		
		<div  class="col-md-3">
				
				<div id="list">
					<?php include('./traitement/liste_ami.php'); ?>
				</div>
				
				<div id="groupe">
					<?php include('./traitement/liste_groupe.php'); ?>
				</div>
		</div>
		
		<div class="col-md-7">
		
				<div id="modification_mdp">
				<form method="post" action="./traitement/modification_mdp.php">
				
				<div class="row">
					<div class="col-md-12">
					
					<table>
						<h2>Modification du mot de passe</h2>
						<tr>
							<td><label for="Nom">Ancien mot de passe :</label></td>
							<td><input type="text" class="form-control" placeholder ="*****" name="ancien_mdp" id="ancien_mdp"/></td>
						</tr>
						<tr>
							<td><label for="Nom">Nouveau mot de passe :</label></td>
							<td><input type="text" class="form-control" placeholder ="*****" name="nouveau_mdp" id="nouveau_mdp"/></td>
						</tr>
						<tr>
							<td><label for="Nom">Répéter le mot de passe :</label></td>
							<td><input type="text" class="form-control" placeholder ="*****" name="repetition_mdp" id="repetition_mdp"/></td>
						</tr>
					</table>
					</div>
					
				</div>
				
				<div class="row">
				
					<div class="col-md-12">
						
					<!--<div class="col-md-offset-1 col-md-3">-->
						<input type="submit" class="btn btn-success" name="modifier_mdp" value="Modifier mdp" data-toggle="modal" data-target="#myModal">
					<!--</div>-->
					
					<!--<div class="col-md-6">-->
						<input type="submit" class="btn btn-danger" name="effacer_mdp" value="Effacer">
					<!--</div>-->
					
					</div>
				</div>
				
				</form>
				</div>
			
				</div>
		
		</div>
		
		<div class="col-md-2">
		
				<div class="well"><h5> SPONSORISE</h5><p>
					<img src="./img/imag4.png" style="width:100%"/></p>
					<p>
					Retrouver nous sur <a href="#">Iariss </a>pour plus d'infos
					</p>
				</div>
					<h6> En6Line, 2016-2017</h6>
		</div>
		
	</div>
</div>
		
</body>
</html>
