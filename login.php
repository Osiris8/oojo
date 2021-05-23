<?php
session_start();

include('config/database.php');

include('functions.php');

if(isset($_POST['login'])){
        if(not_empty(['email', 'password'])){
            extract($_POST);

            $q = $db->prepare("SELECT id, name, username, email, password AS hashed_password, father, type FROM users WHERE  email = :email ");
       $q->execute([
           'email'=>$email
           
       ]);

       $user = $q->fetch(PDO::FETCH_OBJ);
       if($user && password_verify($password, $user->hashed_password)){
         
           $_SESSION['id'] = $user->id;
           $_SESSION['username'] = $user->username;
           $_SESSION['email'] = $user->email;
           
           if($user->father == '0' && $user->type == 'schoolboy'){
           redirect('profil_schoolboy.php?id='.$user->id);
           }else
               if($user->father != '0' && $user->subscription != '0'){
             redirect('startbootstrap-sb-admin-gh-pages/dist/index.php?id='.$_SESSION['id']);  
           }else
               if($user->type == 'mentor'){
             redirect('mentor.php?id='.$user->id);  
           }
       }else{
           set_flash('Combinaison Identifiant Password Incorrecte', 'danger');
           save_input_data(); 
       }
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
    <title>Apland - App Landing Page Template</title>
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
    <!-- Login Area-->
    <div class="register-area d-flex">
      <div class="register-content-wrapper d-flex align-items-center">
        <div class="register-content">
          <!-- Logo--><a class="logo" href="index.html"><img src="img/core-img/logo.png" alt=""></a>
          <h5>Welcome back.</h5>
          <p>Don't have an account? <a href="register.php">Sign up</a></p>
          <!-- Form-->
            
          <div class="register-form">
              
            <form action="#" method="post">
                
              <div class="form-group"><i class="lni-user"></i>
                <input class="form-control" type="text" placeholder="Email" name="email">
              </div>
                
              <div class="form-group"><i class="lni-lock"></i>
                <input class="form-control" type="password" placeholder="Password" name="password">
              </div>
                
              <div class="custom-control custom-checkbox mb-3 mr-sm-2">
                <input class="custom-control-input" id="rememberMe" type="checkbox">
                <label class="custom-control-label" for="rememberMe">Keep me logged in</label>
              </div>
                
              <button class="btn apland-btn w-100" type="submit" name="login">Log In</button><a class="forgot-password" href="forget-password.html">Forgot Password?</a>
            </form>
              
          </div>
          
          <!-- Footer Copwrite Area-->
          <div class="footer_bottom">
            <p>Made with <i class="fa fa-heart"> </i> by  <a href="https://wrapbootstrap.com/user/DesigningWorld">Designing World</a></p>
          </div>
        </div>
      </div>
      <!-- Register Side Content-->
      <div class="register-side-content bg-img" style="background-image: url(img/bg-img/hero-7.jpg);"></div>
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
    <!-- All plugins activation code-->
    <script src="js/default/active.js"></script>
  </body>
</html>