<?php

    try{ 
        $bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage()); 
    }
	
	
	
	
	    echo('<head>');
    
        echo('<meta charset="utf-8">');
        echo('<title>inscription ancien</title>');
		echo('<link href="../CSS/bootstrap/css/bootstrap.min.css.map" rel="stylesheet">');
		echo('<link href="../CSS/bootstrap/css/bootstrap.css.map" rel="stylesheet">');
		echo('<link href="../CSS/bootstrap/css/bootstrap-theme.min.css.map" rel="stylesheet">');
		echo('<link href="../CSS/bootstrap/css/bootstrap-theme.css.map" rel="stylesheet">');
		echo('<link href="../CSS/bootstrap/css/bootstrap.min.css" rel="stylesheet">');
        
        echo('<link rel="stylesheet" type="text/css" href="../CSS/ins_ancien.css" />');
        echo('<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />');
        echo('<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:400,700,300" />');
      
		
		echo('</head>');
	

	
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
				if(password_verify($ancien_mdp, $password[0])){	
					echo('ok');	
					if($nouveau_mdp == $repetition_mdp){
						echo('bien');
				
					// $update = $bdd->query('UPDATE utilisateur set mdp=\''.$nouveau_mdp.'\' WHERE uha=\''.$login.'\' ');
					$options = [
              'cost' => 10
            ];
    $hash = password_hash($nouveau_mdp, PASSWORD_BCRYPT, $options);
	$ins=$bdd->prepare('UPDATE utilisateur SET mdp = :hash WHERE uha=:login');
	$ins->execute(array('hash' => $hash, 'login' => $login));
	
	$upd=$ins->fetch();
					header("location:../modification_profil.php"); /*redirection vers la page d'acceuil */
					$message='Vous avez changé votre mot de passe.';
					echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
					
					}
					else{
						header("location:../modification_profil"); /*redirection vers la page d	e connexion */ 
						echo "<script language=\"javascript\">" ; 
						echo "alert(\'Vous devez taper le même mot de passe.\')";
						echo "</script>";
					}
				}
				else{
					header("location:../modification_profil.php"); /*redirection vers la page de connexion */ 
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
				


				//header("location:../modification_profil.php");

			}
	}
	
	if(isset($_POST['effacer_mdp'])){ 
		$_POST['ancien_mdp'] = '' ;
		$_POST['nouveau_mdp'] = ''; 
		$_POST['repetition_mdp']='';
		echo('<script>window.location="../modification_profil";</script>');
	}
	

?> 