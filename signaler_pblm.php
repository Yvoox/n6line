<?php include('./header.php');?>

<div class="container">
 
	<h1>Signaler un probléme</h1>
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
				<form method="post" action="./message_pblm.php">
				
				<div class="row">
					<div class="col-md-12">
					
					<table>
						<h2>Signalisation</h2>
						<tr>
							<td><label for="Nom">Nom :</label></td>
							<td><input type="text" class="form-control" placeholder ="Nom ..." name="nom" id="nom"/></td>
						</tr>
						<tr>
							<td><label for="Nom">Prénom :</label></td>
							<td><input type="text" class="form-control" placeholder ="Prénom ..." name="prénom" id="prénom"/></td>
						</tr>
						<tr>
							<td><label for="Nom">Adresse mail :</label></td>
							<td><input type="text" class="form-control" placeholder ="Mail ..." name="mail" id="mail"/></td>
						</tr>
						<tr>
							<td><label for="Nom">Objet :</label></td>
							<td><input type="text" class="form-control" placeholder ="Objet ..." name="objet" id="objet"/></td>
						</tr>
						<tr>
							<td><label for="Nom">Message :</label></td>
							<td><textarea type="text" name="message" class="form-control" placeholder="tapez votre message..." ></textarea></td>
						</tr>
					</table>
					</div>
					
				</div>
				
				<div class="row">
				
					<div class="col-md-12">
						
					<!--<div class="col-md-offset-1 col-md-3">-->
						<input type="submit" class="btn btn-success" name="envoi" value="envoi">
					<!--</div>-->
					
					<!--<div class="col-md-6">-->
						<input type="reset" class="btn btn-danger" name="effacer" value="Effacer">
					<!--</div>-->
					
					</div>
				</div>
				
				</form>
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

   