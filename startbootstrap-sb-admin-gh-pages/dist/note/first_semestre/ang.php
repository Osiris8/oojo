<?php
session_start();

include('config/database.php');

include('functions.php');

//////////////////////////////////////// Extraire information ///////////////////////////////////////////////

            $q = $db->prepare("SELECT id, name, username, phone, father, phone_father, mother, phone_mother, city, country, classroom, school FROM users WHERE id = :id");
            $q->execute([
           'id'=>$_SESSION['id']
           
            ]);

            $user_id = $q->fetch(PDO::FETCH_OBJ);
////////////////////////////////////////////////////////////////////////////////////////////////////////////


            if(isset($_POST['interrogation'])){

            $q1 = $db->prepare("SELECT users_id FROM anglais WHERE users_id = :users_id");
            $q1->execute([
           'id'=>$_SESSION['id']
           
            ]);

            $user_id = $q1->fetch(PDO::FETCH_OBJ);

            if($user_id){

                $id = $user_id->users_id;

                $q = $db->prepare('INSERT INTO anglais(name, username, email, phone, password, father, 
           
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

            }else{

           $q1 = $db->prepare('UPDATE anglais SET users_id = :users_id, classroom = :classroom, interrogation1_semestre1= :interrogation1_semestre1
           interrogation2_semestre1 = :interrogation2_semestre1, interrogation3_semestre1,  AND interrogation4_semestre1 AND interrogation5_semestre1 AND WHERE user_id = :user_id');
           $q1->execute([ 
                'classroom'=>$_POST['classsroom'],
               'interrogation1_semestre1'=>$_POST['interrogation1_semestre1'],
               'interrogation2_semestre1'=>$_POST['interrogation2_semestre1'],
               'interrogation3_semestre1'=>$_POST['interrogation3_semestre1'],
               'interrogation4_semestre1'=>$_POST['interrogation4_semestre1'],
               'interrogation5_semestre1'=>$_POST['interrogation5_semestre1'],
               'devoir1_semestre1'=>$_POST['devoir1_semestre1'],
               'devoir2_semestre1'=>$_POST['devoir2_semestre1'],
               'interrogation1_semestre2'=>$_POST['interrogation1_semestre2'],
               'interrogation2_semestre2'=>$_POST['interrogation2_semestre2'],
               'interrogation3_semestre2'=>$_POST['interrogation3_semestre2'],
               'interrogation4_semestre2'=>$_POST['interrogation4_semestre2'],
               'interrogation5_semestre2'=>$_POST['interrogation5_semestre2'],
               'devoir1_semestre2'=>$_POST['devoir1_semestre2'],
               'devoir2_semestre2'=>$_POST['devoir2_semestre2'],
               'id'=>$_SESSION['id']

           ]);

            }

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
        <link href="../../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        
        <link href="../../../../lineicons/WebFont/font-css/LineIcons.css" rel="stylesheet">
        
        <style>
            
        </style>
    </head>
    <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-white bg-white Small shadow">
            <a class="navbar-brand font-weight-bold" href="../../../index.html" style="font-size: 40px;"><img src="../../../../OOJO_Branding/oojo_logo.png" class="img-fluid" style="width: 100px; height: 100px"></a>
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
             
                <li class="nav-item dropdown">
                    
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!--i class="fa fa-user-o fa-2x" aria-hidden="true"></!--i><h1-- class="badge badge-danger ">9</h1-->
                    <img src="../../../../img/profile.svg" class="img-fluid p-1" style="width: 50px; height : 50px;">
                   </a>
                    
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="../../dist/profil.php">
                        <h6> Modifier mon profil </h6></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                        <h6> Mes notifications <span class="badge badge-danger">4</span></h6></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../dist/note/start.php">
                        <h6> Mes notes </h6></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../../logout.php"><h6>Logout</h6></a>
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
                            <a class="nav-link " href="../../dist/index.php" style="font-size: 20px;">
                                <div class="sb-nav-link-icon "><i class="fa fa-tachometer fa-2x" aria-hidden="true"></i></div>
                                Dashboard
                            </a>
                        
                            <a class="nav-link active" href="../../dist/note/start.php"  style="font-size: 20px;">
                                <div class="sb-nav-link-icon"><i class="fa fa-leanpub fa-2x" aria-hidden="true"></i></div>
                                Mes notes
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
                        <h1 class="mt-4">Anglais</h1>
                            </div>
                            <div class="col-lg-6">
                                
                            </div>
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Mes notes d'Anglais</li>
                        </ol>
                        
                        <div class="container">
          
          <div class="row mt-5">
              
              <div class="col-lg-12 col-md-612 col-sm-12">
                  <div class="container">
                      
                      <div class="card">
                          <div class="card-body">
                              <h1 class="text-center">Vos note d'Anglais</h1><br>
                              
                              <p>Les progrssions sur votre note d'Anglais s'afficheront ici</p>
        </div>
                          </div>
                      </div>
                      
                  </div>
              </div><br><br>

              <form method="POST">

              <div class="card">
              <div class="card-body">
              

              <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
              <h4 class="text-center"> Mes notes du 1er Semestre </h4>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">
              <h4> Mes interrogations </h4>
              <label for="interrogation1" class="mt-3">Interrogation1</label>
              <input type="number" id="interrogation1" class="form-control" name="interrogation1_semestre1">

              <label for="interrogation2" class="mt-3">Interrogation2</label>
              <input type="number" id="interrogation2" class="form-control" name="interrogation2_semestre1">

              <label for="interrogation3" class="mt-3">Interrogation3</label>
              <input type="number" id="interrogation3" class="form-control" name="interrogation3_semestre1">

              <label for="interrogation4" class="mt-3">Interrogation4</label>
              <input type="number" id="interrogation4" class="form-control" name="interrogation4_semestre1">

              <label for="interrogation5" class="mt-3">Interrogation5</label>
              <input type="number" id="interrogation5" class="form-control" name="interrogation5_semestre1">

              </div>

              <div class="col-lg-6 col-md-6 col-sm-12">
              <h4> Mes Devoirs </h4>
              <label for="devoir1_semestre1" class="mt-3">Devoir 1</label>
              <input type="number" id="devoir1_semestre1" class="form-control" name="devoir1_semestre1">

              <label for="devoir2_semestre1" class="mt-3">Devoir 2</label>
              <input type="number" id="devoir2_semestre1" class="form-control" name="devoir2_semestre1">

              </div>

              </div>
              
              </div>
              </div>

              <div class="card mt-4">
              <div class="card-body">
              

              <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
              <h4 class="text-center"> Mes notes du 2nd Semestre </h4>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">
              <h4> Mes interrogations </h4>
              <label for="interrogation1" class="mt-3">Interrogation1</label>
              <input type="number" id="interrogation1" class="form-control" name="interrogation1_semestre2">

              <label for="interrogation2" class="mt-3">Interrogation2</label>
              <input type="number" id="interrogation2" class="form-control" name="interrogation2_semestre2">

              <label for="interrogation3" class="mt-3">Interrogation3</label>
              <input type="number" id="interrogation3" class="form-control" name="interrogation3_semestre2">

              <label for="interrogation4" class="mt-3">Interrogation4</label>
              <input type="number" id="interrogation4" class="form-control" name="interrogation4_semestre2">

              <label for="interrogation5" class="mt-3">Interrogation5</label>
              <input type="number" id="interrogation5" class="form-control" name="interrogation5_semestre2">

              </div>

              <div class="col-lg-6 col-md-6 col-sm-12">
              <h4> Mes Devoirs </h4>
              <label for="devoir1_semestre2" class="mt-3">Devoir 1</label>
              <input type="number" id="devoir1_semestre2" class="form-control" name="devoir1_semestre2">

              <label for="devoir2_semestre2" class="mt-3">Devoir 2</label>
              <input type="number" id="devoir2_semestre2" class="form-control" name="devoir2_semestre2">

              </div>

              </div>
              
              </div>
              </div>

              <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
          <button type="submit" class="btn btn-info btn-block" name="save">Enregistrer</button>
          </div>
          </div>

          </form>

          <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
          <a href="../start.php" type="button" class="btn btn-info btn-block">Retour</a>
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
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="../https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../../assets/demo/datatables-demo.js"></script>
    </body>
</html>
