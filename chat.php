
<!DOCTYPE html>
<html lang="fr">
     <head>
        <meta charset="utf-8">


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script>
function refresh_liste2()

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

var filename = './traitement/liste_ami_messagerie.php';

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

setTimeout('refresh_liste2()', 5000);

}

</script>
<script>
function refresh_message()

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

var filename = './traitement/messagerie.php';

xhr_object.open(method, filename, true);

xhr_object.onreadystatechange = function()

{

if(xhr_object.readyState == 4)

{

var tmp = xhr_object.responseText;

document.getElementById('message').innerHTML = tmp;

}

}

xhr_object.send(null);

setTimeout('refresh_message()', 30000);

}

</script>

<?php
session_start(); 
if(empty($_SESSION['login'])) {
header('Location: ./index.php');
}?> 

         <title>N6LINE</title>
        <link rel="stylesheet" href="./CSS/style.css">

		   
    <link href="./CSS/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="./CSS/style.css">
	
      <style>
          .chat{
              position:fixed;
              right:20px;
              bottom:0px;
          }
     
          
          .navbar-inverse .navbar-nav>li>a {
              color:white;
          }
           .navbar-inverse .navbar-nav>li>a:hover {
               color:#abb9f8;
          }
      </style>
    </head>

<body onload=' refresh_liste2(),refresh_message();'>




<div class="container">
      <header class="row">
        <div id="titre" class="col-sm-12">
          Messagerie
        </div>
      </header>
	  
      <div class="row">
	  
        <nav class="col-sm-3">
          <div id="list">
			</div>
        </nav>
		
        <section class="col-sm-9">
          <div id="message"> 
		  </div>
		  
		<div class="row">
		  
            <article class="col-md-9">
				<div id="texte">
					<form method="post" action="./traitement/send.php">
						
					<table>
						<tr>

							<td><p><textarea name="message" class="form-control" placeholder="tapez votre message..." ></textarea></p></td>
							<td><input style="cursor:pointer" class="btn btn-success btn btn-success" type="submit" name="envoyer" value="envoyer"></td>
							<td><input style="cursor:pointer" class="btn btn-sucess btn btn-success" type="submit" name="joindre" value="joindre un fichier"></td>
						</tr>              
					</table>	
					</form>
				</div>
            </article>
			
            <aside class="col-md-3">
				<form name="x" action="./accueil.php" method="post">
					<input style="cursor:pointer" class="btn btn-success btn btn-success" type="submit" value="Accueil">
				</form>

				<form method="post" action="./traitement/deconnexion.php">
					<input style="cursor:pointer" class="btn btn-info"  type="submit" name ="deconnexion" value="Se déconnecter" />
				</form> 
            </aside>
			
          </div>
        </section>
      </div>
      <footer class="row">
        <div class="col-sm-12">
          Développé par le groupe n6line.
        </div>
      </footer>
    </div>



<?php
if(isset($_GET['valeur'])){
setcookie('variable',$_GET['valeur'],time()+3600) ; }?>

</body>
</html>