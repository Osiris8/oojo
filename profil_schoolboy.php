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
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
      
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">  

    <title>Profil Schoolboy</title>
  </head>
  <body>
    
      
      <div class="container">
          
          <div class="row mt-5">
              
              <div class="col-lg-4 col-md-6 col-sm-12">
                  <img src="img/bg-img/about-app-1.png" class="img-fluid">
              </div>
              
              <div class="col-lg-8 col-md-6 col-sm-12">
                  <div class="container">
                      
                      <div class="card">
                          <div class="card-body">
                              <h3 class="text-center">Completer mon profil <?= $_SESSION['id']; ?></h3><br>
                              
                        <form method="post">      
                      <div class="form-group"><i class="lni-user"></i>
                <input class="form-control" type="text" placeholder="Maman" name="mother">
              </div>
                              
                               <div class="form-group"><i class="lni-user"></i>
                <input class="form-control" type="text" placeholder="Contact" name="phone_mother">
              </div><hr>
                              
                               <div class="form-group"><i class="lni-user"></i>
                <input class="form-control" type="text" placeholder="Papa" name="father">
              </div>
                              
                               <div class="form-group"><i class="lni-user"></i>
                <input class="form-control" type="text" placeholder="Contact" name="phone_father">
              </div><hr>
                            <!---------------------------------------------------->
                            <div class="form-group"><i class="lni-user"></i>
                    <input class="form-control" type="text" placeholder="Classe" name="classroom">
              </div>
                            <div class="form-group"><i class="lni-user"></i>
                <input class="form-control" type="text" placeholder="Collège" name="school">
              </div><hr>
                           <!---------------------------------------------------->   
                               <div class="form-group"><i class="lni-user"></i>
                <input class="form-control" type="text" placeholder="Ville" name="city">
              </div>
                              
                               <div class="form-group"><i class="lni-user"></i>
                                    <select class="custom-select form-control" name="country">
                      <option selected>Selectionner un pays</option>
                      <option value="+229">Bénin</option>
                      <option value="+228">Togo</option>
                      <option value="+227">Niger</option>
                    </select>
              </div><hr>
                              
                              <button class="btn btn-info btn-lg btn-block" name="update_profil" type="submit"> Modifier </button>
                            
                              </form>
                              
                          </div>
                      </div>
                      
                  </div>
              </div>
              
          </div>
      </div>
      

      <br><br><br>
      
   
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>    

  </body>
</html>