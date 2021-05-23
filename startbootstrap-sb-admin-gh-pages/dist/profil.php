<?php
session_start();

include('../../config/database.php');

include('../../functions.php');

//////////////////////////////////////// Extraire information ///////////////////////////////////////////////

            $q = $db->prepare("SELECT id, name, username, phone, father, phone_father, mother, phone_mother, city, country, classroom, school FROM users WHERE id = :id");
            $q->execute([
           'id'=>$_SESSION['id']
           
            ]);

            $user_id = $q->fetch(PDO::FETCH_OBJ);
////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////// profil image ////////////////////////////////////////////////////////

            /*$q1 = $db->prepare("SELECT id, users_id, photo_url FROM users_profil WHERE users_id = :users_id 
            ORDER BY ID DESC LIMIT 0, 1");
            $q1->execute([
           'users_id'=>$_SESSION['id']
           
            ]);

            $user_profil = $q1->fetch(PDO::FETCH_OBJ);
            if($user_profil){
                $image = $user_profil->photo_url;
            }else{
                $image = './assets/img/undraw_profile_pic_ic5t.svg';
            }*/

            if(isset($_POST['update_profil'])){
           $q1 = $db->prepare('UPDATE users SET city = :city AND phone = :phone WHERE id = :id');
           $q1->execute([ 
               
               'city'=>$_POST['city'],
               'phone'=>$_POST['phone'],
               'id'=>$_SESSION['id']
           ]);
            }

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        
        <link href="../../lineicons/WebFont/font-css/LineIcons.css" rel="stylesheet">
        
        <style>
            
        </style>
    </head>
    <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-white bg-white Small shadow">
            <a class="navbar-brand font-weight-bold" href="../dist/index.php" style="font-size: 40px;"><img src="../../OOJO_Branding/oojo_logo.png" class="img-fluid" style="width: 100px; height: 100px"></a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fa fa-bars" aria-hidden="true"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>

             <!-- Navbar notification-->
             <ul class="navbar-nav ml-auto ml-md-0">
             <li class="nav-item">
                <a class="nav-link" href="./notification.php"><img src="../../img/notifications-icon.png" class="img-fluid p-1" style="width: 50px; height : 50px;"><span class="badge">3</span></a>
                </li>
                <li class="nav-item dropdown">
                
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!--i class="fa fa-user-o fa-2x" aria-hidden="true"></!--i><h1-- class="badge badge-danger ">9</h1-->
                    <img src="../../img/profile.svg" class="img-fluid p-1" style="width: 50px; height : 50px;">
                   </a>
                    
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="./profil.php">
                        <h6> Modifier mon profil </h6></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="./mentor/mentor.php">
                        <h6> Tableau de bord Mentorat </h6></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../dist/mon-parcours.html">
                        <h6> Mon parcours </h6></a>
                        <div class="dropdown-divider"></div>
                        <a href="../dist/note/start.php" class="dropdown-item" href="#">
                        <h6> Mes notes </h6></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../logout.php"><h6>Logout</h6></a>
                    </div>
                </li>

                
            </ul>

            <!-- Navbar personnal profil-->
            <!--ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img src="./assets/img/undraw_profile_2.svg" class="img-fluid circle" style="height: 2rem; width: 2rem">
                   </a>
                    
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="image_profil.php">Changer de photo</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../logout.php">Logout</a>
                    </div>
                </li>
            </ul-->

             <!-- Navbar notification-->
            <!--ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell-o" aria-hidden="true"><span class="badge badge-light">4</span></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
                <li class="nav-item">
                <button type="button" class="btn btn-primary">
  Profile <span class="badge badge-light">9</span>
  <span class="sr-only">unread messages</span>
</button>
                </li>
            </ul-->
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link active" href="index.php" style="font-size: 20px;">
                                <div class="sb-nav-link-icon "><i class="fa fa-tachometer fa-2x" aria-hidden="true"></i></div>
                                Dashboard
                            </a>
                        
                            <a class="nav-link" href="japprends.html"  style="font-size: 20px;">
                                <div class="sb-nav-link-icon"><i class="fa fa-leanpub fa-2x" aria-hidden="true"></i></div>
                                J'apprends
                            </a>
                            <a class="nav-link" href="jemexerce.html"  style="font-size: 20px;">
                                <div class="sb-nav-link-icon"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></div>
                                Je m'exerce
                            </a>
                              <a class="nav-link" href="jeveuxmieuxcomprendre.html"  style="font-size: 20px;">
                                <div class="sb-nav-link-icon"><i class="fa fa-book fa-2x" aria-hidden="true"></i></div>
                                Je veux mieux comprendre
                            </a>
                            <a class="nav-link" href="jeveuxdelaide.html"  style="font-size: 20px;">
                                <div class="sb-nav-link-icon"><i class="fa fa-question fa-2x" aria-hidden="true"></i></div>
                                Je veux de l'aide
                            </a>
                              <a class="nav-link" href="jecherche.html"  style="font-size: 20px;">
                                <div class="sb-nav-link-icon"><i class="fa fa-search fa-2x" aria-hidden="true"></i></div>
                                Je cherche
                            </a>
                          
                            <a class="nav-link" href="reussite-scolaire.html"  style="font-size: 20px;">
                                <div class="sb-nav-link-icon"><i class="fa fa-superpowers fa-2x" aria-hidden="true"></i></div>
                                Réusite scolaire
                            </a>
                           
                            <a class="nav-link" href="coaching-scolaire.html"  style="font-size: 20px;">
                                <div class="sb-nav-link-icon"><i class="fa fa-etsy fa-2x" aria-hidden="true"></i></i></div>
                                Mon coaching scolaire
                            </a>

                            <a class="nav-link" href="soutien-scolaire.html"  style="font-size: 20px;">
                                <div class="sb-nav-link-icon"><i class="fa fa-comment fa-2x" aria-hidden="true"></i></div>
                                Soutient scolaire
                            </a>

                            <a class="nav-link" href="orientation-scolaire.html"  style="font-size: 20px;">
                                <div class="sb-nav-link-icon"><i class="fa fa-cube fa-2x" aria-hidden="true"></i></div>
                                Orientation scolaire
                            </a>

                        </div>
                    </div>
                  
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                       <div class="row">
                            <div class="col-lg-6">
                        <h1 class="mt-4">Mon profil</h1>
                            </div>
                            <div class="col-lg-6">
                                <h1 class="mt-4 text-right"><?= $user_id->classroom ?></h1>
                            </div>
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Mon profil</li>
                        </ol>
                        
                        <div class="row">
                            <!----Progress bar----->
                          <div class="col-lg-6">
                              <div class="row">
                                  
                                 <div class="col-lg-6">
                         
                      <div class="card h-100">

                        <div class="card-body">
                          <h4 class="card-title text-center">
                           Identité
                          </h4>
                         
                            <h6>Nom : <?= $user_id->name ?></h6>
                            <h6>Prénom : <?= $user_id->username ?></h6>
                            <!--h6>Age : 14 ans</!--h6-->
                            <h6>Ville : <?= $user_id->city ?></h6>
                            <!--h6>Quartier : Hanlan</!--h6-->
                            <!--h6>Adresse : Maison Hanlan</!--h6-->
                            <h6>Téléphone : <?= $user_id->phone ?>
                        </h6>
                            
                        </div>
                      </div>
                    
                     </div>       
                                  
                                  <div class="col-lg-6">

                                  
                                  <img src="../../img/profile.svg" class="img-fluid circle">
                                
                         

                                  </div>
                                  
                              </div>
                              
                              <!--- Information sur les parents--->
                              <div class="row">
                                  <div class="col-lg-12 mt-2">
                                      <div class="card h-100">
                                          <h4 class="text-center mt-1"> Information sur les parents</h4>
                                      </div>
                                  </div>
                              </div>
                              
                              <div class="row">
                                  
                                 <div class="col-lg-6 mt-2">
                         
                      <div class="card h-100">

                        <div class="card-body">
                            <h6>Papa : <?= $user_id->father ?></h6>
                            <!--h6>Fonction : Traducteur</!--h6-->
                            <h6>Téléphone : <?= $user_id->phone_father ?></h6>
                            
                        </div>
                      </div>
                    
                     </div>       
                                  
                                  <div class="col-lg-6 mt-2">
                                      
                                 <div class="card h-100">

                        <div class="card-body">     
                            <h6>Maman : <?= $user_id->mother?></h6>
                            <!--h6>Fonction : Juriste</!--h6-->
                            <h6>Téléphone : <?= $user_id->phone_mother ?></h6>
                            
                        </div>
                      </div>
                                     
                                  </div>
                                  
                              </div>
                              
                              <!--- End Parent Information--->
                              
                              <!--information on brother-->
                              <!--div class="row">
                                  <div class="col-lg-12 mt-2">
                                      <div class="card h-100">
                                          <h4 class="text-center mt-1"> Information sur les frères et soeurs</h4>
                                      </div>
                                  </div>
                              </!--div>
                              
                              <div-- class="row">
                                  
                                 <div class="col-lg-6 mt-2 mb-4">
                         
                      <div class="card h-100">

                        <div class="card-body">
                            <h6>Frère John Doe</h6>
                            <h6>Classe : 4ème</h6>
                           
                            
                        </div>
                      </div>
                    
                     </div>       
                                  
                                  <div class="col-lg-6 mt-2 mb-4">
                                      
                                 <div class="card h-100">

                        <div class="card-body">     
                            <h6>Soeur Johne Doe</h6>
                            <h6>Classe : 3ème</h6> 
                        </div>
                      </div>
                                     
                                  </div>
                                  
                              </div-->
                               <!--End information on brother-->
                              
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-12">
                                       <p> <button class="btn btn-info btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Modifier mon profil
                                           </button></p>
                                        
                                        <div class="collapse" id="collapseExample">
                                      <div class="card card-body">
                                         
                                          <h6>Mon Identité</h6>
                                          <div class="row">
                                              <div class="col-lg-12">
            <form method="post">
                                    <div class="row">
                                   <div class="col-lg-6"> 
                              <div class="form-group">
                                <label for="exampleInputEmail1">Ville</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Accra" name="city">
                                        </div>
                                    </div>
                                    
                                <div class="col-lg-6">   
                              <div class="form-group">
                        <label for="exampleInputPassword1">Téléphone</label>
            <input type="number" class="form-control" id="exampleInputPassword1" name="phone">
                              </div>
                                    </div>
                                    </div>
                                    
                                     <!--div class="row">
                                   <div class="col-lg-6"> 
                              <div class="form-group">
                                <label for="exampleInputEmail1">Age</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="14 ans">
                                        </div>
                                    </div>
                                    
                                <div class="col-lg-6">   
                              <div class="form-group">
                                <label for="exampleInputPassword1">Ville</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Porto-Novo">
                              </div>
                                    </div>
                                    </!--div>
                                    
                                    <div class="row">
                                   <div class="col-lg-6"> 
                              <div class="form-group">
                                <label for="exampleInputEmail1">Adresse</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Hanlan">
                                        </div>
                                    </div>
                                    
                                <div class="col-lg-6">   
                              <div class="form-group">
                                <label for="exampleInputPassword1">Téléphone</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="98 45 68 32">
                              </div>
                                    </div>
                                    </div>
                                    
                                     <h6>Mes Parents</h6>
                                    
                                     <div class="row">
                                   <div class="col-lg-6"> 
                              <div class="form-group">
                                <label for="exampleInputEmail1">Papa</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nom et Prénom">
                                        </div>
                                    </div>
                                    
                                <div class="col-lg-6">   
                              <div class="form-group">
                                <label for="exampleInputPassword1">Maman</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Nom et Prénom">
                              </div>
                                    </div>
                                    </div>
                                    
                                    <div-- class="row">
                                   <div class="col-lg-6"> 
                              <div class="form-group">
                                <label for="exampleInputEmail1">Fonction</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Fonction de Papa">
                                        </div>
                                    </div>
                                    
                                <div class="col-lg-6">   
                              <div class="form-group">
                                <label for="exampleInputPassword1">Fonction</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Fonction de Maman">
                              </div>
                                    </div>
                                    </div-->

                                   
                                    
                             <button class="btn btn-info btn-block" type="submit" name="update_profil">
                                        Modifier
                                           </button>
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
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
