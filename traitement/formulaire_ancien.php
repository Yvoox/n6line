


<!DOCTYPE html>
<html lang="fr">
    
    <head>
    
        <meta charset="utf-8">
        <title>inscription ancien</title>
		<link href="../CSS/bootstrap/css/bootstrap.min.css.map" rel="stylesheet">
		<link href="../CSS/bootstrap/css/bootstrap.css.map" rel="stylesheet">
		<link href="../CSS/bootstrap/css/bootstrap-theme.min.css.map" rel="stylesheet">
		<link href="../CSS/bootstrap/css/bootstrap-theme.css.map" rel="stylesheet">
		<link href="../CSS/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="../CSS/ins_ancien.css" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:400,700,300" />
      
		
    </head>
		
	<body>
		<div class="container">
		
		<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
	  
		<div class="modal-content">
			<div class="modal-header">
				<button type="reset" class="close" data-dismiss="modal">&times;</button>
				<h4><class="modal-title">Message</h4>
			</div>
			<div class="modal-body">
				<p>Aprés vérification de vos informations, nous vous ferons parvenir par mail votre adresse uha ainsi que votre mot de passe provisoire!</p>
			</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">fermer</button>
			</div>
		</div>
		
		</div>
		</div>
		
		
		
		
		<div class="row">
		<div class="col-xs-12">
    
			<div class="main">
            
				<div class="row">
				<div class="col-xs-5 col-md-7" style="background-color:white;"><!--.col-xs-9 .col-md-7</div>-->
				<!--<div class="col-xs-12 col-sm-6 col-sm-offset-1">-->
					
                    
					<h1>Inscription</h1>
					<h2>Ancien de l'ENSISA</h2>
                    
					<form method="post" action="inscription.php">
					<!--<form action="/users/login" name="login" role="form" class="form-horizontal" method="post" accept-charset="utf-8">-->
					
						<table>
						
						<div class="form-group">
							<tr>
								<td><div class="col-md-8"><label for="Nom">Votre nom :</label></div></td>
								<td><div class="col-md-11"><input name="Nom" placeholder="Nom" class="form-control" type="text" id="Nom"/></div></td>
							</tr>
						</div> 
						
						
						<div class="form-group">
							<tr>
								<td><div class="col-md-8"><label for="Prénom">Votre prénom :</label></div></td>
								<td><div class="col-md-11"><input name="Prénom" placeholder="Prénom" class="form-control" type="text" id="Nom"/></div></td>
							</tr>
						</div>
						
						
						<div class="form-group">
							<tr>
								<td><div class="col-md-12"><label for="date_naissance">Votre date de naissance :</label></div></td>
								<td><div class="col-md-11"><input name="date_naissance" placeholder="date de naissance" class="form-control" type="date" id="date_naissance"/></div></td>
							</tr>
						</div>
						
						
						<div id="barre1" class="form-group">
							<tr>
								
								<td><div class="col-md-12"><label for="fonction">Votre fonction :</label></div></td>
								<td>
								<div class="col-md-11"><select name="fonction" id="fonction" class="form-control"></div>
									<div class="col-md-8"><option value="select" selected>fonction</option></div>
									<div class="col-md-8"><option value="Etudiant">Etudiant</option></div>
									<div class="col-md-8"><option value="Administratif">Personnel administratif</option></div>
									<div class="col-md-8"><option value="Professeur">Professeur</option></div>
								</select>
							    </td>
							</tr>
						</div>
						
						
						<div id="barre2" class="form-group">
							<tr>
								<td><div class="col-md-12"><label for="fonction">Votre filliére (si étudiant) :</label></div></td>
								<td>
								<div class="col-md-11"><select name="fillière" id="fillière" class="form-control">
									<div class="col-md-8"><option value="select" selected>fillière</option></div>
									<div class="col-md-8"><option value="IR">Informatique et réseaux</option></div>
									<div class="col-md-8"><option value="AS">Automatique et systémes embarqués</option></div>
									<div class="col-md-8"><option value="TEXTILE">Textile</option></div>
									<div class="col-md-8"><option value="FIP">Systémes de production industriels</option></div>
								</select>
							    </td>
							</tr>
						</div>
						
						
						</table>
			
						
						<div class="form-group">
							<!--<div class="col-md-offset-0 col-md-8"><input style="cursor:pointer" class="btn btn-success btn btn-success" type="submit" value="Inscription" onclick="afficher()"></div>-->
							<button type="button" class="btn btn-success btn btn-success" data-toggle="modal" data-target="#myModal">Inscription</button>
						</div>
						
					</form>
					
					
				</div>
				</div>
			
			</div>
			
		</div>
		</div>
		</div>
    
	</body>
</html>
