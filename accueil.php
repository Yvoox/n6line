<?php include('./header.php'); ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script>
    function auto_deco(){
        window.location="./traitement/auto_deco.php";
    }
    setTimeout("auto_deco()",600000);
</script>


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

setTimeout('refresh_liste()', 3000);

}

</script>

<script>
function refresh_actualite()

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

var filename = './traitement/actualite.php';

xhr_object.open(method, filename, true);

xhr_object.onreadystatechange = function()

{

if(xhr_object.readyState == 4)

{

var tmp = xhr_object.responseText;

document.getElementById('actualite').innerHTML = tmp;

}

}

xhr_object.send(null);

setTimeout('refresh_actualite()', 300000);

}

</script>
<script>
function refresh_chat()

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

var filename = './traitement/chat.php';

xhr_object.open(method, filename, true);

xhr_object.onreadystatechange = function()

{

if(xhr_object.readyState == 4)

{

var tmp = xhr_object.responseText;

document.getElementById('chat').innerHTML = tmp;

}

}

xhr_object.send(null);

setTimeout('refresh_chat()', 1500);

}

</script>


    <div class="container">
	

        
		 <strong>Profil  </strong> 	<form method="post" action="./traitement/deconnexion.php">
		<input type="submit" name ="deconnexion" value="Se déconnecter" />
		</form>
			<div  class="col-md-3">
				<div id="list">
				   
					
				</div>
				
				<div id="groupe">
					<?php include('./traitement/liste_groupe.php'); ?>
				</div>
			</div>
				
				<div class="col-md-7">
					<div class="well" >
						<div id ="Publication" class="row">
							
							<form name="Publier" action="./traitement/actualite.php" method="post" enctype="multipart/form-data">
							
								<input class="form-control" type="text" placeholder="Un titre" name="titre" style="height: 5%; width: 100%">
								<input class="form-control" type="text" placeholder="Où étiez-vous ? " name="position" style="height: 5%; width: 100%">
								<input class="form-control" type="text" placeholder="Rédigez votre publication ici" name="contenu" style="height: 10%; width: 100%"> 
								<input type="hidden" name="MAX_FILE_SIZE" value="100000"> Ajouter une photo <input type="file" name="fichier">
								<input type ="submit" name="Publier" value="Publier" >
								
								
							</form>
			
						</div>
					<div class="well" id="actualite"> </div>
					</div>
				</div>
				
				<div class="col-md-2">
					
						<div class="well"><h5> SPONSORISE</h5><p>
							<img src="./img/imag4.png" style="width:100%" alt="iariss"/></p>
							<p>
							Retrouver nous sur <a href="#">Iariss </a>pour plus d'infos
							</p>
					
						</div>
						<h6> En6Line, 2016-2017</h6>
					
				</div>
	</div>

        

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="./css/bootstrap/js/bootstrap.min.js"></script>
    
  </body>
</html>
