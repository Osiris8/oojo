<?php
session_start();

include('config/database.php');

include('functions.php');

include('reset/micro.reset.php');
//**************************************** Security Rules***************************//

if(!empty($_GET['email']) && is_already_in_use('email', $_GET['email'], 'users')
    && !empty($_GET['bing'])){

    $email = $_GET['email'];
    $token = $_GET['bing'];

    $michibichi = ")=à)çàç_ç_)àç))çàà)ç_çà)ç)à_àç)àç)=";
    $token_verif = sha1($email.$michibichi);

    if($token !== $token_verif){

        
        set_flash('Parametres invalides', 'danger');
        redirect('index.html');

    }



//**************************************** Change Password Controls ***************************//
//$email = "miganosiris8@gmail.com";
$email = $_GET['email'];
if(isset($_POST['change_password'])){
    if(not_empty(['password'])){

    $errors = [];

    extract($_POST);
        

    if(mb_strlen($_POST['password']) < 8){
        
        $errors[] = '<div class="w3-panel w3-card-4 w3-round-xlarge w3-red w3-display-container">
         <span onclick="this.parentElement.style.display=\'none\'" class=\"w3-button w3-red w3-large w3-display-topright">
             &times;</span>
         <p>Mot de passe trop court</p>
        </div>';
        
         echo  '<div class="alert w3-red alert-dismissible fade show" role="alert">
              <strong>Mot de passe trop court !</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
    }
        if(count($errors) == 0){
            
        $q = $db->prepare('SELECT email FROM users WHERE email = :email');
        $q->execute([
           
           'email'=>$email
       
           
       ]);

        
       $user = $q->fetch(PDO::FETCH_OBJ);
       if($user){
            
            // Envoi d'un mail de confirmation de reinitialisation du mot de passe
        $to = $email;
        $subject = "Mot de passe modifié !";
      
        

        ob_start();
        require('templates/emails/succes.reset.tmpl.php');
        $content = ob_get_clean();

        $hello = 'MIME-Version : 1.0'."\r\n";
        $hello = 'Content-type: text/html; charset = iso-8859-1'."\r\n";
        
        mail($to, $subject, $content, $hello);
      
       set_flash("Mail d'activation envoyé", 'success');
            //https://www.php.net/manual/fr/function.ob-start.php;
            ob_end_clean();
           
            $password = password_hash($password, PASSWORD_BCRYPT);
           $q = $db->prepare('UPDATE users SET password = :password WHERE email = :email');
        $q->execute([
           'email'=>$email,
            'password' => $password 
        ]);
            
            redirect('login2.php');
       
           
       }
            
       }
            
        }
        
}
    
    /*********************************End of Password Reset*********************************/
    
    }else{
    redirect('index.php');
}

    /********************************HTML page template include**************************/
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
              <h3 class="login-heading mb-4">Reinitialisation du mot de passe</h3>

              <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card">
              <div class="card-body">
              
              <form method="post" data-parsley-validate class="form-signin">
              <div class="form-label-group">
              <label for="inputPassword"><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;Nouveau mot de passe</label>
                <input data-parsley-trigger="change" type="password" name="password" id="inputPassword" class="form-control mb-3" placeholder="Nouveau mot de passe" required autofocus>
                
              </div>

              <button class="btn btn-lg btn-info  btn-block text-uppercase" type="submit" name="change_password">Changer</button>
            </form>

              </div>
              </div>
              </div>
             
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