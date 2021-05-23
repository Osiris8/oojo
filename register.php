<?php

include('config/database.php');

include('functions.php');

if(isset($_POST['register'])){
        if(not_empty(['name', 'username', 'phone', 'email', 'type', 'password'])){

        $errors = [];

        extract($_POST);
            
        if(mb_strlen($name) < 3){
            $errors[] = "Pseudo trop court! (minimum 3 caractères";
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
            
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
          redirect('login.php');
          
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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Oojo - App Landing Page Template</title>
    <!-- Favicon-->
    <link rel="icon" href="img/core-img/favicon.ico">
    <!-- Stylesheet-->
    <link rel="stylesheet" href="style.css">
       <link href="./lineicons/WebFont/font-css/LineIcons.css" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  </head>
  <body>
    <!-- Preloader-->
    <div id="preloader">
      <div class="apland-load"></div>
    </div>
    <!-- Register Area-->
    <div class="register-area d-flex">
      <div class="register-content-wrapper d-flex align-items-center">
        <div class="register-content">
          <!-- Logo--><a class="logo" href="index.html"><img src="OOJO_Branding/oojo_logo.png" alt="" style="width: 100px; height: 100px"></a>
          <h5>Créer votre compte.</h5>
          <p>Avez-vous déjà un compte ? &nbsp;&nbsp;<a href="login.php">Se connecter</a></p>
            
          <!-- Form-->
          <div class="register-form">
            <form method="post" data-parsley-validate>
                
              <div class="form-group"><i class="lni-user"></i>
                <input class="form-control" type="text" placeholder="Nom" name="name" required>
              </div>
                
                <div class="form-group"><i class="lni-user"></i>
                <input class="form-control" type="text" placeholder="Prénom" name="username" required>
              </div>
                
              <div class="form-group"><i class="lni-envelope"></i>
                <input class="form-control" type="email" placeholder="Addresse Email" name="email" required>
              </div>
                
                <div class="form-group"><i class="lni lni-phone"></i>
                <input class="form-control" type="text" placeholder="Téléphone" name="phone" required>
              </div>
                
                <div class="form-group"><i class="lni-user"></i>
                                    <select class="custom-select form-control" name="type" required>
                      <option selected>Je suis</option>
                      <option value="schoolboy">Un élèves</option>
                      <option value="mentor">Mentor</option>
                    </select>
              </div><hr>
                
              <div class="form-group"><i class="lni-lock"></i>
                <input class="form-control" type="password" placeholder="Password" name="password" required>
              </div>
              
                <!--a href="complete_statue.html" class="btn apland-btn w-100">S'inscrire</a-->
           <button class="btn apland-btn w-100" type="submit" name="register">S'inscrire</button>
            </form>
          </div>
         
        </div>
      </div>
      <!-- Register Side Content-->
      <div class="register-side-content bg-img" style="background-image: url(img/bg-img/hero-6.jpg);"></div>
    </div>
    <!-- jQuery(necessary for all JavaScript plugins)-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/default/classy-nav.min.js"></script>
    <script src="js/default/sticky.js"></script>
    <script src="js/default/one-page-nav.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/default/scrollup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jarallax.min.js"></script>
    <script src="js/jarallax-video.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/default/mail.js"></script>
    <!-- All plugins activation code>
    <script src="js/default/active.js"></script>
    <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
    <script-- src="./Parsley.js-2.9.2/dist/i18n/fr.js"></script-->
  </body>
</html>