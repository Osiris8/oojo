<?php

include('config/database.php');

include('functions.php');

if(isset($_POST['register'])){
        if(not_empty(['name', 'username', 'phone', 'email', 'type', 'password'])){

        $errors = [];

        extract($_POST);
            
        if(mb_strlen($name) < 3){
            $errors[] = "Pseudo trop court! (minimum 3 caractères";
            
        }    

        if(mb_strlen($username) < 3){
            $errors[] = "Pseudo trop court! (minimum 3 caractères";
        }
            
        if(mb_strlen($phone) < 8){
            $errors[] = "Pseudo trop court! (minimum 3 caractères";
        }    

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = "Adresse email Invalide";
        }

        if(mb_strlen($_POST['password']) < 6){
            $errors[] = "Mot de passe trop court(Minimum 06 caractères)";
        }

        if(is_already_in_use('email', $email, 'users')){
            $errors[] = "Email déjà utilisé";
        }

        if(count($errors) == 0){
            
            // Envoi d'un mail d'activation
            /*$to = $email;
            $subject = "Boom Social - Activation de Compte";
           $password = password_hash($password, PASSWORD_BCRYPT);
            $token = sha1($pseudo.$email.$password);

            ob_start();
            require('templates/emails/activation.tmpl.php');
            $content = ob_get_clean();

            $headers = 'MIME-Version : 1.0'."\r\n";
            $headers = 'Content-type: text/html; charset = iso-8859-1'."\r\n";
            
            mail($to, $subject, $content, $headers);
          
           set_flash("Mail d'activation envoyé", 'success');*/
           //Erreur 500 de la fonction redirect
            
            $password = password_hash($password, PASSWORD_BCRYPT);
           $q = $db->prepare('INSERT INTO users(name, username, email, phone, password, father, 
           
           phone_father, mother, phone_mother, city, country, type, statut, subscription, classroom, school)
           
           VALUES(:name, :username, :email, :phone, :password, :father, :phone_father, :mother, :phone_mother, :city, :country, :type, :statut, :subscription, :classroom, :school)');
           $q->execute([
               'name'=>$name,
               'username'=>$username,
               'email'=>$email,
               'phone'=>$phone,
               'password'=>$password,  
               'father'=>'0',
               'phone_father'=>'0',
               'mother'=>'0',
               'phone_mother'=>'0',
               'city'=>'0',
               'country'=>'0',
               'type'=>$type,
               'statut'=>'0',
               'subscription'=>'0',
               'classroom'=>'0',
               'school'=>'0'
           ]);
          redirect('login2.php');
          
        }else{
            save_input_data();
        }

    }else{
        $errors[] = "Veuillez remplir tous les champs";
        save_input_data();

    }
}else{
    clear_input_data();
}



?>

<!doctype html>
<html ng-app>
  <head>

    <title>Drunk Template</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
    <style>
    
    :root {
  --input-padding-x: 1.5rem;
  --input-padding-y: 0.75rem;
}

.login,
.image {
  min-height: 100vh;
}

.bg-image {
  background-image: url('https://source.unsplash.com/WEQbe2jBg40/600x1200');
  background-size: cover;
  background-position: center;
}

</style>
  </head>
  <body>
  <div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Inscription</h3>

              <form method="post">

              <div class="form-label-group">
                  <input type="text" id="inputName" class="form-control" placeholder="Nom" required name="name" autofocus>
                  <label for="inputEmail"></label>
                </div>

                <div class="form-label-group">
                  <input type="text" id="inputUsername" class="form-control" placeholder="Prénom" required name="username">
                  <label for="inputEmail"></label>
                </div>

                <div class="form-label-group">
                  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required name="email">
                  <label for="inputEmail"></label>
                </div>

                <div class="form-label-group">
                  <input type="number" id="inputTelephone" class="form-control" placeholder="Téléphone" required name="phone">
                  <label for="inputTelephone"></label>
                </div>

                <div class="form-label-group">
                <select class=" form-control" name="type" required>
                      <option selected>Je suis</option>
                      <option value="schoolboy">Un élèves</option>
                      <option value="mentor">Mentor</option>
                    </select>
                  <label for="inputTelephone"></label>
                </div>

                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
                  <label for="inputPassword"></label>
                </div>
    
                <button class="btn btn-lg btn-info btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" name="register">Sign in</button>
                <div class="text-center">
                <a class="small" href="login2.php">Se connecter</a><br>
                  <a class="small" href="#">Forgot password?</a>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>    

  </body>
</html>