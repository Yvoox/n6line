<form role="form" class="form-horizontal" method="post"  accept-charset="utf-8">
						<div class="form-group">
							<div class="col-md-8"><input name="login" placeholder="Adresse mail uha" class="form-control" type="text" id="login"/></div>
						</div> 
                
						<div class="form-group">
							<div class="col-md-8"><input name="pass" placeholder="Mot de passe" class="form-control" type="password" id="password"/></div>
						</div> 
												
						<div class="form-group">
							<div class="col-md-offset-0 col-md-8"><input style="cursor:pointer" class="btn btn-success btn btn-success" type="submit" name="connexion" value="Connexion"/></div>
						</div>
            
					</form>

<?php

      try{ 
        $bdd = new PDO('mysql:host=localhost;dbname=n6line;charset=utf8','root',''); 
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage()); 
    }
	
	if(isset($_POST['connexion'])){
	if(isset($_POST['login'])){
		if(isset($_POST['pass'])){
			

    $options = [
              'cost' => 10
            ];
    $hash = password_hash($_POST['pass'], PASSWORD_BCRYPT, $options);
	echo($hash);
	echo($_POST['login']);
	$ins=$bdd->prepare('UPDATE utilisateur SET mdp = :hash WHERE uha=:login');
	$ins->execute(array('hash' => $hash, 'login' => $_POST['login']));
	
	$upd=$ins->fetch();

		}
	}
	}


?>