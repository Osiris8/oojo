<?php
session_start();


include('config/database.php');

include('functions.php');

if(isset($_POST['update_profil'])){
        if(not_empty(['father', 'phone_father', 'mother', 'phone_mother', 'city', 'country', 'classroom',
                     'school'])){

        $errors = [];

        extract($_POST);
            
        if(mb_strlen($father) < 3){
            $errors[] = "Pseudo trop court! (minimum 3 caractères";
        }
        
        if(mb_strlen($phone_father) < 3){
            $errors[] = "Pseudo trop court! (minimum 3 caractères";
        }
            
        if(mb_strlen($mother) < 3){
            $errors[] = "Pseudo trop court! (minimum 3 caractères";
        }
            
        if(mb_strlen($phone_mother) < 3){
            $errors[] = "Pseudo trop court! (minimum 3 caractères";
        }
        
        if(mb_strlen($city) < 3){
            $errors[] = "Pseudo trop court! (minimum 3 caractères";
        }
            
        if(mb_strlen($country) < 3){
            $errors[] = "Pseudo trop court! (minimum 3 caractères";
        }
            
        if(count($errors) == 0){
            
            $q = $db->prepare("SELECT id, username, email FROM users WHERE id = :id");
            $q->execute([
           'id'=>$_SESSION['id']
           
            ]);

            $user_id = $q->fetch(PDO::FETCH_OBJ);
            
            if($user_id){
                
            $id = $user_id->id;
            
            $q1 = $db->prepare('UPDATE users SET father = :father, phone_father = :phone_father,
            mother = :mother, phone_mother = :phone_mother, city = :city, country = :country,
            classroom = :classroom, school = :school WHERE id = :id');
           $q1->execute([ 
               'father'=>$father,
               'phone_father'=>$phone_father,
               'mother'=>$mother,
               'phone_mother'=>$phone_mother,
               'city'=>$city,
               'country'=>$country,
               'classroom'=>$classroom,
               'school'=>$school,
               'id'=>$id
           ]);
          redirect('pricing.php?id='.$user_id->id);
            }else{
                echo $id;
            }
            
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
              <h3 class="login-heading mb-4">Completer mon profil</h3>

              <form method="post">  

                      <div class="form-label-group">
                <input class="form-control" type="text" id="inputMother" placeholder="Maman" name="mother">
                <label for="inputMother"></label>
              </div>
                              
                               <div class="form-label-group">
                <input class="form-control" type="text" id="inputMotherContact" placeholder="Contact" name="phone_mother">
                <label for="inputMotherContact"></label>
              </div>
                              
                               <div class="form-label-group">
                <input class="form-control" type="text" placeholder="Papa" name="father" id="inputFather">
                <label for="inputFather"></label>
              </div>
                              
                               <div class="form-label-group">
                <input  class="form-control" type="text" id="inputFatherContact" placeholder="Contact" name="phone_father"> 
                <label for="inputFatherContact"></label>
              </div>
                            <!---------------------------------------------------->
                            <div class="form-label-group">
                    <input class="form-control" type="text" id="classroom" placeholder="Classe" name="classroom">
                    <label for="classroom"></label>
              </div>
                            <div class="form-label-group">
                <input class="form-control" type="text" placeholder="Collège" id="school" name="school">
                <label for="school"></label>
              </div>
                           <!---------------------------------------------------->   
                               <div class="form-label-group">
                <input class="form-control" type="text" id="city" placeholder="Ville" name="city">
                <label for="city"></label>
              </div>
                              
                               <div class="form-label-group">
                                    <select class="custom-select form-control" id="country" name="country">
                      <option selected>Selectionner un pays</option>
                      <option value="+229">Bénin</option>
                      <option value="+228">Togo</option>
                      <option value="+227">Niger</option>
                    </select>
                    <label for="country"></label>
              </div>
                              
                              <button class="btn btn-info btn-lg btn-block" name="update_profil" type="submit"> Modifier </button>
                            
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