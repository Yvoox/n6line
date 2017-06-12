<?php 
    include('./header.php'); 
?> 
		<h1>Modification des paramètres du profil</h1>
        <div id="contenu_modification">
           
            <div id="modification_mdp">
							<form method="post" action="./traitement/modification_mdp.php">
						<table>
						<h2>Modification du mot de passe</h2>
					<tr>
                        <td><label for="Nom">Ancien mot de passe :</label></td>
                        <td><input type="text" placeholder ="*****" name="ancien_mdp" id="ancien_mdp"/></td>
                    </tr>
					<tr>
                        <td><label for="Nom">Nouveau mot de passe :</label></td>
                        <td><input type="text" placeholder ="*****" name="nouveau_mdp" id="nouveau_mdp"/></td>
                    </tr>
					<tr>
                        <td><label for="Nom">Répéter le mot de passe :</label></td>
                        <td><input type="text" placeholder ="*****" name="repetition_mdp" id="repetition_mdp"/></td>
                    </tr>
					</table>
					<input type="submit" name="modifier_mdp" value="Modifier mdp">
					<input type="submit" name="effacer_mdp" value="Effacer">
					</form>
            </div>
			
        </div>
