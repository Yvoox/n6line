<?php
    include('header.php'); 
	
    if(isset($_POST['modifier_mdp'])){ 
        if(!empty($_POST['ancien_mdp'])){ 
            $ancien_mdp = $_POST['ancien_mdp']; 
            if(!empty($_POST['nouveau_mdp'])){ 
                $nouveau_mdp = $_POST['nouveau_mdp'];         
				if(!empty($_POST['repetition_mdp'])){ 
					$repetition_mdp = $_POST['repetition_mdp'];     
				
					session_start(); 
					$login  =$_SESSION['login'];
					$req=$bdd->query('SELECT mdp FROM utilisateur WHERE uha =\''.$login.'\' ');
					$password=$req->fetch();
					
				if($ancien_mdp == $password[0]) { 
					echo('ok');	
					if($nouveau_mdp == $repetition_mdp){
						echo('bien');
				
					// $update = $bdd->query('UPDATE utilisateur set mdp=\''.$nouveau_mdp.'\' WHERE uha=\''.$login.'\' ');
					$update = $bdd->prepare('UPDATE utilisateur set mdp=:nouveau_mdp where uha=\''.$login.'\' ');
					$update->execute(array('nouveau_mdp' => $_POST['nouveau_mdp'] ));
					header("location:modification_profil.php"); /*redirection vers la page d'acceuil */
					$message='Vous avez changé votre mot de passe.';
					echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
					
					}
					else{
						header("location:modification_profil"); /*redirection vers la page d	e connexion */ 
						echo "<script language=\"javascript\">" ; 
						echo "alert(\'Vous devez taper le même mot de passe.\')";
						echo "</script>";
					}
				}
				else{
					header("location:modification_profil.php"); /*redirection vers la page de connexion */ 
					echo"<script language=\"javascript\">" ; 
					echo"alert('Votre ancien mot de passe est incorrect.')";
					echo"</script>";
				}
					
				 
                            }
                        }
                    }
	
			if (empty($_POST['ancien_mdp']) || empty($_POST['nouveau_mdp']) || empty($_POST['repetition_mdp'])) {
				 
				echo"<script language=\"javascript\">" ; 
				echo"alert('Vous devez remplir tous les champs pour pouvoir changer de mot de passe.')";
				echo"</script>";
				header("location:modification_profil.php");

			}
	}
	
	if(isset($_POST['effacer_mdp'])){ 
		$_POST['ancien_mdp'] = '' ;
		$_POST['nouveau_mdp'] = ''; 
		$_POST['repetition_mdp']='';
		header("location:modification_profil.php");
	}
	
	include('footer.php'); 
?> 