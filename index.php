<?php
session_start();

include('functions.php');

if(isset($_POST['start'])){

  if(isset($_SESSION['id'])){
    redirect('startbootstrap-sb-admin-gh-pages/dist/index.php?id='.$_SESSION['id']);  
  }else{
    redirect('statut.html');
  }
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
    <!-- Header Area-->
    <header class="header_area white-nav">
      <div class="main_header_area">
        <div class="container">
          <div class="classy-nav-container breakpoint-off">
            <nav class="classy-navbar justify-content-between" id="aplandNav">
              <!-- Logo--><a class="nav-brand" href="index.php">
                <img class="img-fluid" src="OOJO_Branding/oojo_logo.png" alt="" style="width: 100px; height: 100px"></a>
              <!-- Navbar Toggler-->
              <div class="classy-navbar-toggler"><span class="navbarToggler"><span></span><span></span><span></span></span></div>
              <!-- Menu-->
              <div class="classy-menu">
                <!-- Close Button-->
                <div class="classycloseIcon">
                  <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                </div>
                <!-- Nav-->
                <div class="classynav">
                  <ul id="corenav">
                    <li><a href="#home">Acceuil</a></li>
                   
                       <li><a href="#about">A propos</a></li>
                      <li><a href="#solutions">Solutions</a></li>
                   
                      <li><a href="#home">Services</a>
                      <ul class="dropdown">
                        <li><a href="apland-barisal.html">Elèves</a></li>
                        <li><a href="apland-chattagram.html">Parents d'elèves</a></li>
                        <li><a href="apland-dhaka.html">Enseignants</a></li>
                      </ul>
                    </li>

                    <!--li><a href="#advisor">Equipe</a></!--li-->
        
                    <li><a href="#contact">Contact</a></li>
                    
                  </ul>
                  <!-- Login Button-->
                  <form method="POST"><div class="login-btn-area ml-5 mt-5 mt-lg-0"><button class="btn apland-btn btn-4" name="start">Commencer</button></div>
                  </form>

                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!-- Welcome Area-->
    <div class="hero-rajshahi hero-slides owl-carousel" id="home">
      <!-- Single Hero Slide-->
      <div class="single-hero-slide bg-img bg-overlay" style="background-image: url(img/bg-img/hero1.jpg);">
        <div class="container h-100">
          <div class="row h-100 justify-content-between align-items-center">
            <div class="col-12 col-md-6">
              <!-- Welcome Area Content-->
              <div class="welcome_text_area">
                <h2 class="text-white" data-animation="fadeInUp" data-delay="300ms">Plateforme N°1 d’appui à l’employabilité des jeunes au Bénin.
                  </h2>
                <h5 data-animation="fadeInUp" data-delay="400ms">Une solution innovante qui permet aux jeunes de booster leur employabilité partout au Bénin.
                  </h5>
                <div class="button-group d-flex align-items-center mt-30" data-animation="fadeInUp" data-delay="500ms"><form method="POST"><button class="btn apland-btn btn-4 mr-3" name="start">Commencer</button></form><!--a class="video_btn text-white" href="https://www.youtube.com/watch?v=YLtFGWVWiGo"><i class="lni-play mr-1"></i><span>Play Video</span></a--></div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <!-- Welcome Image-->
              <div class="welcome_area_thumb text-center"><img src="img/bg-img/TEST.jpg" class = "rounded-circle" alt=""></div>
            </div>
          </div>
        </div>
      </div>
      <!-- Single Hero Slide-->
      <div class="single-hero-slide bg-img bg-overlay" style="background-image: url(img/bg-img/hero9.jpg);">
        <div class="container h-100">
          <div class="row h-100 justify-content-between align-items-center">
            <div class="col-12 col-md-6">
              <!-- Welcome Area Content-->
              <div class="welcome_text_area">
                <h2 class="text-white" data-animation="fadeInUp" data-delay="300ms">OOJO, une aide à la réussite scolaire et académique
                    </h2>
                <h5 data-animation="fadeInUp" data-delay="400ms">Un excellent conseiller et assistant pour coacher vos enfants dans leur parcours scolaire et académique.</h5><form method="POST"><button class="btn apland-btn btn-4 mt-30" data-animation="fadeInUp" data-delay="500ms" name="start">Commencer</button></form>
              </div>
            </div>
            <div class="col-10 col-md-6">
              <!-- Welcome Image-->
              <div class="welcome_area_thumb text-center" data-animation="fadeInUp" data-delay="300ms"><img src="img/bg-img/TESTU.jpg" alt="" class="rounded-circle"></div>
            </div>
          </div>
        </div>
      </div>
        <!-- Single Hero Slide-->
      <div class="single-hero-slide bg-img bg-overlay" style="background-image: url(img/bg-img/hero-6.jpg);">
        <div class="container h-100">
          <div class="row h-100 justify-content-between align-items-center">
            <div class="col-12 col-md-6">
              <!-- Welcome Area Content-->
              <div class="welcome_text_area">
                <h2 class="text-white" data-animation="fadeInUp" data-delay="300ms">La solution Emploi que vous attendiez depuis.
                    </h2>
                <h5 data-animation="fadeInUp" data-delay="400ms">Une boîte à outils mis à votre disposition pour réussir votre recherche d’emploi et des opportunités d’emploi à portée de main, selon votre profil, région et vos rêves.</h5><form method="POST"><button class="btn apland-btn btn-4 mt-30" data-animation="fadeInUp" data-delay="500ms" name="start">Commencer</button></form>
              </div>
            </div>
            <div class="col-10 col-md-6">
              <!-- Welcome Image-->
              <div class="welcome_area_thumb text-center" data-animation="fadeInUp" data-delay="300ms"><img src="img/bg-img/test4.jpg" alt="" class=" rounded-circle"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
 
    <!-- About App Area-->
    <section class="about_app_area section_padding_130" id="about">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <!-- About Image-->
          <div class="col-12 col-md-6 col-lg-5">
            <div class="about_image mb-5 mb-md-0">
              <div class="big_thumb wow fadeInLeft" data-wow-delay="0.2s"><img src="OOJO_Branding/oojo_logo.png" alt=""></div>
             
            </div>
          </div>
          <!-- About Text-->
          <div class="col-12 col-md-6 col-lg-5">
            <div class="about_us_text_area wow fadeInUp" data-wow-delay="0.2s">
              <h3>A PROPOS DE NOUS</h3>
              <p><strong>oojọ</strong> est une plateforme d’employabilité des jeunes portée par le Centre d’Appui à l’Employabilité des Jeunes (CAEJ) incubé par la Tech hub Waxangari L@bs.</p>
              <div class="border-top mb-3"></div>
              <p>Elèves, étudiants, jeunes diplômés, porteurs de projets, parents et enseignants sont les cibles visées.
Dans un contexte où le marché du travail devient très exigeant et saturé, seuls ceux qui se préparent à un emploi, pourront vraiment s’insérer professionnellement. <strong>oojọ</strong>, est donc la solution pour accroitre la performance scolaire et académique des enfants, bien choisir un métier d’avenirs et trouver un emploi.
</p><!---a class="btn apland-btn mt-15" href="#">Learn more</a--->
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="container">
      <div class="border-top"></div>
    </div>

    <!-- Features Area-->
    <section class="using_benefits_area section_padding_130" id="solutions">
      <!-- Benefit Top Background-->
      <div class="benefit-top-thumbnail"><img src="img/core-img/video-bottom.png" alt=""></div>
      <!-- Benefit Top Background-->
      <div class="benefit-bottom-thumbnail"><img src="img/core-img/benefit-bottom.png" alt=""></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-8 col-lg-6">
            <!-- Section Heading-->
            <div class="section_heading white text-center wow fadeInUp" data-wow-delay="0.2s">
              <!--h6>Using Benefits</h6-->
              <h3>Decouvrez nos solutions</h3>
                <p>Nous nous focalisons sur les besoins de nos cibles pour les satisfaire. Avec eux, nous voulons construire les solutions les mieux adaptées, moins coûteuses et plus impactantes.
</p>
              <div class="line"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Single Benifits Area-->
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="single_benifits d-flex wow fadeInUp" data-wow-delay="200ms">
              <div class="icon_box"><!--i class="lni-heart"></i--><img src="img/services/468118-200.jpg" class="img-fluid bg-white rounded-circle"></div>
              <div class="benifits_text">
                <h5>Ecoute et Orientation</h5>
                <p>Nous mettons à la disposition de nos cibles, un cadre d’écoute afin de les aider à faire des choix judicieux pour leur formation, carrière et vie.
                  </p><!--a href="#">Explore More</a-->
              </div>
            </div>
          </div>
          <!-- Single Benifits Area-->
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="single_benifits d-flex wow fadeInUp" data-wow-delay="200ms">
            <div class="icon_box"> <img src="img/services/presentation2.jpg" class="img-fluid bg-white rounded-circle"></div>
              <div class="benifits_text">
                <h5>Formation</h5>
                <p>Nous offrons des formations pratiques, innovantes et sur mesure, dans le but d’activer le potentiel de nos cibles, booster leurs performances et garantir leur insertion.
                  </p><!--a href="#">Explore More</a-->
              </div>
            </div>
          </div>
          <!-- Single Benifits Area-->
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="single_benifits d-flex wow fadeInUp" data-wow-delay="200ms">
              <div class="icon_box"><!--i class="lni-heart"></i--><img src="img/services/coaching3.jpg" class="img-fluid bg-white rounded-circle"></div>
              <div class="benifits_text">
                <h5>Coaching</h5>
                <p>Nos coachs professionnels sont à la disposition de nos cibles, à tout moment pour les accompagner, entraîner et les soutenir dans leur parcours d’apprentissage, de formation et d’insertion.
                  </p><!--a href="#">Explore More</a-->
              </div>
            </div>
          </div>
          <!-- Single Benifits Area-->
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="single_benifits d-flex wow fadeInUp" data-wow-delay="200ms">
              <div class="icon_box"><!--i class="lni-heart"></i--><img src="img/services/people-network-icon-vector.jpg" class="img-fluid bg-white rounded-circle"></div>
              <div class="benifits_text">
                <h5>Réseautage</h5>
                <p>Nous facilitons la mise en réseau de nos cibles afin que les premières solutions viennent d’elles et surtout dans la volonté de bâtir ensemble un capital humain fort et impactant.
                  </p><!--a href="#">Explore More</a-->
              </div>
            </div>
          </div>
          <!-- Single Benifits Area-->
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="single_benifits d-flex wow fadeInUp" data-wow-delay="200ms">
               <div class="icon_box"><!--i class="lni-heart"></i--><img src="img/services/opportunity.png" class="img-fluid bg-white rounded-circle"></div>
              <div class="benifits_text">
                <h5>Opportunités</h5>
                <p>Nous mettons à disposition de nos cibles, en temps réel des opportunités d’emploi, de formation, stage et bourses. 
                  </p><!--a href="#">Explore More</a-->
              </div>
            </div>
          </div>
          <!-- Single Benifits Area-->
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="single_benifits d-flex wow fadeInUp" data-wow-delay="200ms">
              <div class="icon_box"><!--i class="lni-heart"></i--><img src="img/services/bibliotest3.jpg" class="img-fluid bg-white rounded-circle"></div>
              <div class="benifits_text">
                <h5>Bibliothèque</h5>
                <p>Nos mettons à votre disposition des ressources adaptées et ciblées pour vous faciliter la tâche dans vos recherches documentaires.</p><!--a href="#">Explore More</a-->
              </div>
            </div>
          </div>
        </div>
        <!--div class="row">
          <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s"><a class="btn apland-btn" href="about-us.html">View All Benefits</a></div>
        </div-->
      </div>
    </section>
      
   
    <!-- Our Advisor Area-->
    <!--section-- class="our_advisor_area section_padding_130_80 bg-gray" id="advisor">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-8 col-lg-6">
    
            <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s">
              <h3>Notre Equipe</h3>
         
            </div>
          </div>
        </div>
        <div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img src="https://source.unsplash.com/TMgQMXoglsM/500x350" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Team Member</h5>
          <div class="card-text text-black-50">Web Developer</div>
        </div>
      </div>
    </div>
   
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img src="https://source.unsplash.com/9UVmlIb0wJU/500x350" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Team Member</h5>
          <div class="card-text text-black-50">Web Developer</div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img src="https://source.unsplash.com/sNut2MqSmds/500x350" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Team Member</h5>
          <div class="card-text text-black-50">Web Developer</div>
        </div>
      </div>
    </div>
 
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img src="https://source.unsplash.com/ZI6p3i9SbVU/500x350" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Team Member</h5>
          <div class="card-text text-black-50">Web Developer</div>
        </div>
      </div>
    </div>
  </div>

      </div>
    </!--section-->
    <!-- FAQ Area-->
      <!-- FAQ Area-->
   
    <!-- Timeline Area-->
       <!-- Timeline Area-->
    
    <!-- Download App Area-->
      <!-- Download App Area-->
    
    <!-- Map Area-->
    <!--div class="map_contact_address_area" id="contact">
      <div class="map_area" id="googleMap">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d249743.72044590558!2d-77.12786342828758!3d-12.026603400822385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c5f619ee3ec7%3A0x14206cb9cc452e4a!2sLima%2C%20Peru!5e0!3m2!1sen!2sbd!4v1578076612022!5m2!1sen!2sbd" allowfullscreen></iframe>
      </div>
    </div-->
    <!-- Message Now Area-->
    <!--div class="message_now_area bg-gray wow fadeInUp" data-wow-delay="0.5s">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="apland-contact-form"-->
              <!-- Section Title-->
              <!--div class="message_title">
                <div class="section_heading">
                  <h6>Contact with us</h6>
                  <h3>We'd love to hear from you</h3>
                  <p>Appland is completely creative, lightweight, clean app landing page.</p>
                  <div class="line ml-0"></div>
                </div>
              </div-->
              <!-- Contact Form-->
              <!--div class="contact_from">
                <form id="main_contact_form" action="mail.php" method="post">
                  <div class="contact_input_area">
                    <div id="success_fail_info"></div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group mb-30">
                          <input class="form-control" id="name" type="text" name="name" placeholder="Your Name" required>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group mb-30">
                          <input class="form-control" id="email" type="email" name="email" placeholder="Your Email" required>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group mb-30">
                          <input class="form-control" id="subject" type="text" name="subject" placeholder="Your Topic" required>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group mb-30">
                          <input class="form-control" id="number" type="text" name="number" placeholder="Your Phone" required>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group mb-30">
                          <textarea class="form-control" id="message" name="message" cols="30" rows="10" placeholder="Your Message" required></textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="custom-control custom-checkbox mr-sm-2 mb-3 mb-sm-0">
                          <input class="custom-control-input" id="customControlAutosizing" type="checkbox">
                          <label class="custom-control-label" for="customControlAutosizing">Accept terms and conditions</label>
                        </div>
                      </div>
                      <div class="col-sm-6 text-right">
                        <button class="btn apland-btn" type="submit">SEND NOW</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div-->
    <!-- Footer Area-->
    <footer class="footer_area section_padding_130_0">
      <div class="container">
        <div class="row ml-5">
          <!-- Single Widget-->
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="single-footer-widget section_padding_0_130">
              <!-- Footer Logo-->
                <div class="footer-logo mb-3"><a href="index.html"><h2>Oojo</h2></a></div>
                <p>Dans un contexte où le marché du travail devient très exigeant et saturé, seul ceux qui se préparent à un emploi pourront vraiment s’insérer. <strong>oojọ</strong>, est donc la solution pour accroitre la performance scolaire et académique des enfants, bien choisir un métier d’avenirs et trouver un emploi.</p>
              <!-- Copywrite Text-->
             
              <!-- Footer Social Area-->
              <div class="footer_social_area"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a><a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a><a href="#" data-toggle="tooltip" data-placement="top" title="Skype"><i class="fa fa-skype"></i></a><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></div>
            </div>
          </div>
          <!-- Single Widget-->
   
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="single-footer-widget section_padding_0_130">
              <!-- Widget Title-->
              <h5 class="widget-title">About</h5>
              <!-- Footer Menu-->
              <div class="footer_menu">
                <ul>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Corporate Sale</a></li>
                  <li><a href="#">Terms &amp; Policy</a></li>
                  <li><a href="#">Community</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Single Widget-->
          <!--div-- class="col-12 col-sm-6 col-lg">
            <div class="single-footer-widget section_padding_0_130">
             
              <h5 class="widget-title">Support</h5>
             
              <div class="footer_menu">
                <ul>
                  <li><a href="#">Help</a></li>
                  <li><a href="#">Support</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Term &amp; Conditions</a></li>
                  <li><a href="#">Help &amp; Support</a></li>
                </ul>
              </div>
            </div>
          </!--div-->
          <!-- Single Widget-->
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="single-footer-widget section_padding_0_130">
              <!-- Widget Title-->
              <h5 class="widget-title">Contact</h5>
              <!-- Footer Menu-->
              <div class="footer_menu">
                <ul>
                  <li><a href="#">Call Centre</a></li>
                  <li><a href="#">Email Us</a></li>
                  <li><a href="#">Term &amp; Conditions</a></li>
                  <li><a href="#">Help Center</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </footer>
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