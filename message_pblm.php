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
		
				<div id="msg_pblm">
				<form method="post" action="./traitement/formulaire_pblm.php">
				
				<div class="row">
					<div class="col-md-12">
					
					<table>
						<h2>Signalisation</h2>
						
						
						<?php include('./traitement/formulaire_pblm.php'); ?>
						
						
						
					</table>
					</div>
					
				</div>
				
				<div class="row">
				
					<div class="col-md-12">
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

   