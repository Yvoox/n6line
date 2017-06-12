<?php include('./header.php'); ?>

<div class="container">
		
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
				<div id="corps">
					<?php include('./traitement/search_contenu.php'); ?>
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

    
  </body>
</html>