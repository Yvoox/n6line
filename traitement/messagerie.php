<?php

    try{ 
        $bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage()); 
    }
	
	session_start(); 
	$uha =$_SESSION['login'];
	
	
if(isset($_COOKIE['variable'])){
	$id=$_COOKIE['variable'];
// echo($id);
$id_utilisateur = $bdd->query('SELECT id from utilisateur where uha =\''.$uha.'\' '); 
$id_uti = $id_utilisateur->fetch();
$dtemp=$bdd->query('SELECT * FROM utilisateur WHERE id ='.$id.' ORDER BY nom DESC');
$desti=$dtemp->fetch();
//echo($desti['nom']);
$stemp = $bdd->query('SELECT nom,prenom,id,connecte FROM utilisateur WHERE nom = '.$desti['nom'].' ');	
 //$statut = $stemp->fetch();
// echo($desti['nom']);
echo('<h1 id = nomprenom> '.$desti['nom'].' '.$desti['prenom'].'</h1>');


if($desti['connecte']==1) echo('<p id=statut>'.('Connecté').'<p>');
else echo('<p id=statut>'.('Déconnecté').'<p>');
$mess = $bdd->query('SELECT message.contenu,message.date FROM message INNER JOIN messtrans ON message.id = messtrans.idmessage WHERE (messtrans.idexp = '.$id_uti['id'].' AND messtrans.iddesti = '.$id.') OR (messtrans.idexp = '.$id.' AND messtrans.iddesti = '.$id_uti['id'].') ORDER BY message.date ASC');

include('./smiley.php'); 
include('./video_youtube.php'); 

while($donnees=$mess->fetch()){
	echo('<div class="mess">');

	echo('<p id = contenuemessage>'.filtre_texte($donnees['contenu']).'<p>');
	
	isYoutubeVideo($donnees['contenu'],'50%','20%'); 
	

	echo('</br>');
	echo('<p id=date>'.$donnees['date'].'<p>');
	echo('</div>');
	$notif_valid=$bdd->query('UPDATE notificationmessage set vu=1 where idutil='.$id_uti['id'].' ');
}

}

?>
