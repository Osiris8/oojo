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
           redirect('profil_schoolboy2.php?id='.$user->id);
           }else
               if($user->father != '0' && $user->subscription != '0'){
             redirect('startbootstrap-sb-admin-gh-pages/dist/index.php?id='.$_SESSION['id']);  
           }else
               if($user->type == 'mentor'){
             redirect('mentor/mentor.php?id='.$user->id);  
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
              <h3 class="login-heading mb-4">Connexion</h3>

              <form method="post">

              

                <div class="form-label-group">
                  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required name="email">
                  <label for="inputEmail"></label>
                </div>

                

                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
                  <label for="inputPassword"></label>
                </div>
    
                <button class="btn btn-lg btn-info btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" name="login">Se Connecter</button>
                <div class="text-center">
                  <a class="small" href="forget_password.php">Forgot password?</a><br>
                  <a class="small" href="register2.php">S'inscrire</a></div>
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