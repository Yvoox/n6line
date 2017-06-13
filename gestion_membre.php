
﻿
<?php include('./header.php'); ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>


<script language="javascript" type='text/javascript'>
    function auto_deco(){
        window.location="./traitement/auto_deco.php";
    }
    setTimeout("auto_deco()",300000);
</script>





    <div class="container">
	

        
		 <strong>Profil  </strong> 	<form method="post" action="./traitement/deconnexion.php">
		<input type="submit" name ="deconnexion" value="Se déconnecter" />
		</form>
			<div  class="col-md-3">
				<div >
				   
					
				</div>
				
				<div id="groupe">
					<?php include('./traitement/liste_groupe.php'); ?>
				</div>
			</div>
				
				<div class="col-md-7">

					<div class="well" id="list"> 

					<?php


    try{ 
        $bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage()); 
    }

	
echo('<div class="well">');
echo('<h2> Gérer des membres :</h2>');
$rep = $bdd->query('SELECT DISTINCT(id),prenom,nom,appartient.idUtil,appartient.admin FROM utilisateur INNER JOIN appartient ON utilisateur.id = appartient.idUtil');

while($donnees=$rep->fetch()){
	if($donnees['admin']==0){
		
	echo('<a href="profil_autre?id='.$donnees['id'].'" class="btn-sm btn-info" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>'.$donnees['prenom'].' '.$donnees['nom'].' </a>');
	$temp=$bdd->query('SELECT idGroup,admin FROM appartient where idUtil ='.$donnees['idUtil'].'');
	while($rest=$temp->fetch()){
	if($rest['idGroup']==$_GET['valeur']){
		$retirer = 1;
		$ajouter = 0;

	}
		if($rest['idGroup']!=$_GET['valeur']){
		$ajouter = 1;
		$retirer = 0;
	}
	}

		if($ajouter == 1){
			if($rest['admin']==0){
		echo('<a href="./traitement/ajouter_groupe.php?per='.$donnees['id'].'&val='.$_GET['valeur'].'"> Ajouter au groupe </a>');
			}
	}
	if($retirer == 1){
		
		if($rest['admin']==0){
			echo('<a href="./traitement/retirer_groupe.php?per='.$donnees['id'].'&val='.$_GET['valeur'].'"> Retirer du groupe </a>');
			echo('<a href="./traitement/add_admin.php?per='.$donnees['id'].'&val='.$_GET['valeur'].'"> Donner les droits d\'administration </a>');
		}
	}
	echo('<br />');
	}
}



echo('</div>');


echo('<div class="well">');
echo('<h2> Gestion des administrateurs :</h2>');
$rep = $bdd->query('SELECT DISTINCT(id),prenom,nom,appartient.idUtil,appartient.admin FROM utilisateur INNER JOIN appartient ON utilisateur.id = appartient.idUtil');

while($donnees=$rep->fetch()){
	if($donnees['admin']==1){
		
	echo('<a href="profil_autre?id='.$donnees['id'].'" class="btn-sm btn-info" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>'.$donnees['prenom'].' '.$donnees['nom'].' </a>');
		echo('<a href="./traitement/del_admin.php?per='.$donnees['id'].'&val='.$_GET['valeur'].'"> Retirer les droits d\'administration </a>');
	echo('<br />');
	}
}



echo('</div>');


echo('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>');


?>




					
					
				</div>
				

	</div>

	
	</div>


        

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="./css/bootstrap/js/bootstrap.min.js"></script>
    
  </body>
</html>
