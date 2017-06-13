<?php
    
    if(isset($_POST['envoi'])){
        if(!empty($_POST['nom'])){ 
            $nom = $_POST['nom']; 
            if(!empty($_POST['prénom'])){ 
                $prenom = $_POST['prénom']; 
                if(!empty($_POST['mail'])){
                    $mail = $_POST['mail']; 
                        if(!empty($_POST['objet'])){ 
                            $objet = $_POST['objet']; 
                            if(!empty($_POST['message'])){ 
                                $message = $_POST['message'];
                                
echo '<p>'.$prenom.' '.$nom.', merci de nous avoir contacté.</p>';
echo '<p>Votre mail : <a href="mailto:'.$mail.'">'.$mail.'</a></p>';
echo '<p>J\'aurai le plaisir de répondre à votre message sur "'.$objet.'"  prochainement. Votre message : '.$message.'</p>';
                              
                            }
                        }
                    }
                }
            }
        }


    
?>