<?php
if(isset($_POST['reset'])){
    if(not_empty(['email'])){

    $errors = [];

    extract($_POST);
        
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "Adresse email Invalide";
        
        echo  '<div class="alert w3-red alert-dismissible fade show" role="alert">
              <strong>Adresse Email Invalide !</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
    }
        if(count($errors) == 0){
            
        $q = $db->prepare('SELECT id, email FROM users WHERE email = :email');
        $q->execute([
           'email'=>$email
       
           
       ]);

        if(is_already_in_use('email', $email, 'users')){
        
        
            // Envoi d'un mail de reinitialisation
        $to = $email;
        $subject = "Oojo - Reinitialisation de votre mot de passe !";
       $michibichi = ")=à)çàç_ç_)àç))çàà)ç_çà)ç)à_àç)àç)=";
        $token = sha1($email.$michibichi);
        

        ob_start();
        require('templates/emails/reset.tmpl.php');
        $content = ob_get_clean();

        $hello = 'MIME-Version : 1.0'."\r\n";
        $hello = 'Content-type: text/html; charset = iso-8859-1'."\r\n";
        
        mail($to, $subject, $content, $hello);
      
       set_flash("Mail d'activation envoyé", 'success');
            //https://www.php.net/manual/fr/function.ob-start.php;
            ob_end_clean();
             redirect('reset/reset.reset.php');
        }
        
    }
        
    }
    }