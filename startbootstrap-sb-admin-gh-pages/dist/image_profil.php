<?php
session_start();


include('../../config/database.php');

include('../../functions.php');

//////////////////////////////////////// Image Profil ///////////////////////////////////////////////

if(!empty($_FILES)){
    
    $file_name = $_FILES['fichier']['name'];

    $file_extension = strrchr($file_name, ".");
    //echo 'Extension : '.$file_extension;

    $file_tmp_name = $_FILES['fichier']['tmp_name'];
    $file_dest = 'image_profil/'.$file_name;

    $extensions_autorisees = array('.jpg', '.JPG', '.png', '.PNG', '.jpeg', '.JPEG');
    
    //On verifie si les entrées sont un tableau de fichier image
    if(in_array($file_extension, $extensions_autorisees)){
        $i=0;
        
        // Démarrage de l'enregistrement du fichier dans le dossier "files"
        if(move_uploaded_file($file_tmp_name, $file_dest)){
          
            // On verifie si le fichier n'existe déjà pas dans la base de données
          $q = $db->prepare('SELECT * FROM users_profil WHERE name =:name AND users_id =:users_id');
            
          $q->execute(array(
            'name'=>$file_name,
            'users_id' => $_SESSION['id']
          ));
          
          $image_name = $q->fetch(PDO::FETCH_OBJ);
            
         
               
            
          if($image_name){
            $i=0;
            echo  '<br/><br/><br/><br/><br/><div class="w3-panel w3-card-4 w3-round-xlarge w3-rose w3-display-container">
            <span onclick="this.parentElement.style.display=\'none\'" class=\"w3-button w3-red w3-large w3-display-topright">
                &times;</span>
            <h3></h3>
            <p>Fichier dejà enregistré</p>
           </div>';
            $i++;  
          }else{                   
               
            // ENregistrement de la photo de profil 
           $q = $db->prepare('INSERT INTO users_profil (users_id, name, photo_url, date_add) VALUES (:users_id, :name, :photo_url, NOW())');
            $q->execute([
              'users_id' => $_SESSION['id'],
              'name' => $file_name,
              'photo_url' => $file_dest 
            ]);
                   
        
            echo  '<br/><br/><br/><br/><br/><div class="w3-panel w3-card-4 w3-round-xlarge w3-rose w3-display-container">
            <span onclick="this.parentElement.style.display=\'none\'" class=\"w3-button w3-red w3-large w3-display-topright">
                &times;</span>
            <h3></h3>
            <p>Fichier envoyé avec succès</p>
           </div>';
           $i++;
              
              redirect('index.php?id='.$_SESSION['id']); 
              }
        }
          }
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
    
      
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>

          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

      </div>
</nav>
      
      <div class="container">
          
          <div class="row mt-5">
              
              <div class="col-lg-4 col-md-6 col-sm-12">
                  <img src="../../OOJO_Branding/oojo_logo.png" class="img-fluid">
              </div>
              
              <div class="col-lg-8 col-md-6 col-sm-12">
                  <div class="container">
                      
                      <div class="card">
                          <div class="card-body">
                              <h3 class="text-center">Completer mon profil <?= $_SESSION['id']; ?></h3><br>
                              
                        <form method="post" enctype="multipart/form-data">      
                      
                             <div class="form-group">
                                         
                                  <input class="form-control" type="file"  name="fichier" />
                                       
                             </div>
                              
                              <button class="btn btn-info btn-lg btn-block" name="image_profil" type="submit"> Modifier </button>
                            
                              </form>
                              
                          </div>
                      </div>
                      
                  </div>
              </div>
              
          </div>
      </div>
      
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>