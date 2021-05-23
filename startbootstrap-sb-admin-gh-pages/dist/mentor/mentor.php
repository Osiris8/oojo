<?php
session_start();

include('../../../config/database.php');

include('../../../functions.php');

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
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        
        <link href="../../../lineicons/WebFont/font-css/LineIcons.css" rel="stylesheet">
        
        <style>
        .badge {
            position: relative;
            top: -10px;
           
            padding: 5px 10px;
            border-radius: 50%;
            background-color: red;
            color: white;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-white bg-white Small shadow">
            <a class="navbar-brand font-weight-bold" href="../index.php" style="font-size: 40px;"><img src="../../../OOJO_Branding/oojo_logo.png" class="img-fluid" style="width: 100px; height: 100px"></a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fa fa-bars" aria-hidden="true"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-info" type="button"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>

             <!-- Navbar notification-->
             <ul class="navbar-nav ml-auto ml-md-0">

             <li class="nav-item">
                <a class="nav-link" href="../notification.php"><img src="../../../img/notifications-icon.png" class="img-fluid p-1" style="width: 50px; height : 50px;"><span class="badge">3</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!--i class="fa fa-user-o fa-2x" aria-hidden="true"></!--i><h1-- class="badge badge-danger ">9</h1-->
                    <img src="../../../img/profile.svg" class="img-fluid p-1" style="width: 50px; height : 50px;">
                   </a>
                    
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="../profil.php">
                        <h6> Modifier mon profil </h6></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../mentor/mentor.php">
                        <h6> Tableau de bord Mentorat </h6></a>
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
                            <a class="nav-link active" href="../index.php" style="font-size: 20px;">
                                <div class="sb-nav-link-icon "><i class="fa fa-tachometer fa-2x" aria-hidden="true"></i></div>
                                Dashboard
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
                        <h1 class="mt-4">Mon tableau de bord</h1>
                            </div>
                            <div class="col-lg-6">
                                
                            </div>
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Mon profil</li>
                        </ol>
                        
                        <div class="container">
          
          <div class="row mt-5">
              
              <div class="col-lg-12 col-md-612 col-sm-12">
                  <div class="container">
                      
                      <div class="card">
                          <div class="card-body">
                              <h1 class="text-center">Bienvenue sur la page des mentors</h1><br>
                              
                              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo minus impedit, qui sed architecto doloremque? Facilis velit dolores quasi illo possimus qui cupiditate. Odio ad nesciunt error. Dolore, nam odio!</p>
        </div>
                          </div>
                      </div>
                      
                  </div>
              </div><br><br>

              <div class="dropdown">
        <button class="btn btn-info btn-lg dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Créer un evenement
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
        <button class="dropdown-item" type="button">Coaching Scolaire</button>
        <button class="dropdown-item" type="button">Reussite Scolaire</button>
        <button class="dropdown-item" type="button">Orientation Scolaire</button>
        </div>
        </div>

        <h3 class="mt-2"> Liste de mes sessions </h3>

        <div class="row">

        <div class="col-md-4 offset-md-4">

        <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-info">A completer</button>
        <a href="session-planif.php" class="btn btn-outline-info">Planifiés</a>
        <a href="session-historique.php" class="btn btn-outline-info">Historique</a>
        </div>

        </div><br><br>

        <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Date de la session</th>
      <th scope="col">Elèves</th>
      <th scope="col">Parcours</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><a href="session-tocomplete.php">23 Mars 2021</a></th>
      <td>Mark Offio</td>
      <td>Coaching Scolaire</td>
    </tr>
    <tr>
      <th scope="row"><a href="session-tocomplete.php">19 Février 2021</a></th>
      <td>Jacob Zouma</td>
      <td>Reussite Scolaire</td>
    </tr>
    <tr>
      <th scope="row"><a href="session-tocomplete.php">13 Janvier 2021</a></th>
      <td>Larry Outsun</td>
      <td>Orientaion Scolaire</td>
    </tr>
  </tbody>
</table>
        </div>

        <h3 class="mt-2"> Elèves attribués </h3>

        <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Elèves</th>
      <th scope="col">Parcours</th>
      <th scope="col">Notes</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Mark Offio</th>
   
      <td>Coaching Scolaire</td>
      <td><a href="../note/start.php">Notes Scolaire</a></td>
    </tr>
    <tr>
      <th scope="row">Jacob Zouma</th>
      <td>Reussite Scolaire</td>
      <td><a href="../note/start.php">Notes Scolaire</a></td>
    </tr>
    <tr>
      <th scope="row">Larry Outsun</th>
      <td>Orientaion Scolaire</td>
      <td><a href="../note/start.php">Notes Scolaire</a></td>
    </tr>
  </tbody>
</table>
        
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
        <script src="../assets/demo/datatables-demo.js"></script>
    </body>
</html>
