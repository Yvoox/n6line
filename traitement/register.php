<!--<head>
<title>Message d'alerte</title>
<script LANGUAGE="JavaScript">
document.write("message")
function afficher()
{
alert("Nous allons vous envoyer un mail afin de pouvoir modifier votre mot de passe!")
}
</script>
</head>-->





<!DOCTYPE html>
<html lang="fr">
    
    <head>
    
        <meta charset="utf-8">
        <title>mot de passe oublié</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link href="../CSS/bootstrap/css/bootstrap.min.css.map" rel="stylesheet">
		<link href="../CSS/bootstrap/css/bootstrap-theme.min.css.map" rel="stylesheet">
		<!--<link href="bootstrap/css/bootstrap.css.map" rel="stylesheet">
		
		<link href="bootstrap/css/bootstrap-theme.css.map" rel="stylesheet">-->
		<link href="../CSS/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="../CSS/index.css" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:400,700,300" />
		
		<!--- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
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
				<p>Nous allons vous envoyer un mail afin de pouvoir modifier votre mot de passe!</p>
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
					
                    
					<h1>Mot de passe oublié</h1>
					<h2>Récupération de votre compte</h2>
                    
					<form method="post" action="xxxx.php" accept-charset="utf-8" class="form-horizontal">
					
					
						<table>
				
						
						<div class="form-group">
							<tr>
								<td><div class="col-md-8"><label for="mail">Veuillez entrer votre adresse mail pour récupérer votre compte</label></div></td>
								<td><div class="col-md-12"><input name="mail" placeholder="adresse uha" class="form-control" type="text" id="mail"/></div></td>
							</tr>
						</div> 
						
						</table>
			
						
						<div class="form-group">
							<!--<div class="col-md-offset-0 col-md-8"><input style="cursor:pointer" class="btn btn-success btn btn-success" type="submit" value="Valider" onclick="afficher()"/></div>-->
							<!--<div class="col-md-offset-0 col-md-8"><input style="cursor:pointer" class="btn btn-success btn btn-success" type="reset" value="Annuler"/></div>-->
							<button type="button" class="btn btn-success btn btn-success" data-toggle="modal" data-target="#myModal">Valider</button>
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
