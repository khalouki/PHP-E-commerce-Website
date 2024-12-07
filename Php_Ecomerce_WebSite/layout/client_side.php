<?php
      //include "pagination_client_produit.php";
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/logo.jpg" type="image/gif" />
  <title>Electro mghila</title>
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <!-- font awesome style -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body id="body">
  <div class="hero_area">
    <!-- header section strats -->
    <header style=";position:relative" id="main-header" class=" header_section long_section px-0">
      <nav id="nv" class=" navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="client_side.php">
          <span>
            Electro mghila
          </span>
        </a>
        </a>
        <button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
            <ul class="navbar-nav  ">
              <li id="allpage" class="nav-item ">
                <a class="nav-link" href="client_side.php" >Accuielle <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about">sur nous</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#furniture">Produit</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#createur">Créateur</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->
    <!-- slider section--> 
    <section  class="slider_section long_section">
      <div id="customCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-5">
                  <div class="detail-box">
                    <h1>
                      Trouver tout les <br>composant que vous avez besoin
                    </h1>
                    <p>
                        Chez nous, qualité,
                        fiabilité et satisfaction client sont notre priorité absolue
                    </p>
                    
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="img-box">
                    <img src="images/ele.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel" data-slide-to="0" class="actie"></li>
        </ol>
      </div>-->
    </section> 
    <!-- end slider section -->
  </div>
  <!-- furniture section -->
  <section id="furniture"  class="produit_container furniture_section layout_padding">
    <div class="container">
      <div class="left heading_container">
        <h2>
          Notre produits
        </h2>
        <p>
        Nous avons un stock qui contient plusieurs produits de différentes catégories
        </p>
      </div>
      <div class="d-flex justify-content-center" >
          <div style="width: 24rem;">
            <form id="search_pro" >
              <select class="select_menu" name="select_categorie" class="form-select">
                      <option  selected disabled>Select category</option>
                      <option value="AC">Accessoir</option>
                      <option value="PC">PC</option>
                      <option value="CE">Carte Electronique</option>
                      <option value="ST">stockage</option>
              </select>
              <input class="serch" type="submit" value="chercher">
            </form>
          </div>
      </div>
      <!--     les produit ------->
      <div class="row" id="produit_table">  
      </div>
      <!--Pagination-->
      <div  class="pagination  justify-content-center mt-3">
          <ul id="containe" class="pagination justify-content-center">
          </ul>
      </div>
    </div>
  </section>
  <!-- end furniture section -->
  <!-- about section -->
  <section id="about" class="about_section layout_padding long_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/about-img.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Sur Nous
              </h2>
            </div>
            <p>
              Bienvenue chez electro mghila, 
              votre référence en produits électroniques.
              Depuis 2024, 
              nous nous engageons à offrir des solutions technologiques de qualité supérieure. Explorez notre sélection soigneusement choisie d'appareils électroniques de pointe et d'accessoires essentiels, conçus pour répondre à tous vos besoins technologiques. Chez nous, qualité,
              fiabilité et satisfaction client sont notre priorité absolue
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end about section -->
  <!-- client section -->
  <section id="createur" class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          Owner
        </h2>
      </div>
      <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="images/admin.jpg" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <i class="fa fa-quote-left" aria-hidden="true"></i>
                      <h6>
                        Abdelkhalek
                      </h6>
                    </div>
                    <p>
                    Ingénieur en science des données, développement logiciel, développement web, apprentissage automatique et apprentissage profond
                  </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="images/admin.jpg" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <i class="fa fa-quote-left" aria-hidden="true"></i>
                      <h6>
                        Abdelkhalek
                      </h6>
                    </div>
                    <p>
                    Ingénieur en science des données, développement logiciel, développement web, apprentissage automatique et apprentissage profond
                  </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="carousel_btn-container">
          <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
          <i class="ri-contract-left-fill"></i>
          <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
          <i class="ri-contract-right-fill"></i>
          <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- end client section -->
  <!-- contact section -->
  <section id="contact" class="contact_section  long_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <div class="heading_container">
              <h2>
                Contact Us
              </h2>
            </div>
            <form id="message_forme">
              <div>
                <input type="text" id="nom_client" name="nom" placeholder="votre nom" required/>
              </div>
              <div>
                <input type="text" id="teli_client" name="phone" placeholder="votre numéro téliphone" required/>
              </div>
              <div>
                <input type="email" id="email_client" name="email" placeholder="votre email" required/>
              </div>
              <div>
                <input type="text" id="message_client" name="message" class="message-box" placeholder="Message" required/>
              </div>
              <div class="btn_box">
                  <input type="hidden" name="opt" value="send_message">
                  <input style="width:238px" class="envoi_message_btn" type="submit" name="" value="envoyer" id="">
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map_container">
            <div class="map">
              <iframe id="map" width="600" height="450" frameborder="0" style="border:0"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3305.804878314715!2d-6.32132288361535!3d32.37536280517727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda385fee999f689%3A0x4e7fbccedbb34938!2sUniversit%C3%A9%20Sultan%20Moulay%20Slimane%3A%20Facult%C3%A9%20Polydisciplinaire!5e0!3m2!1sen!2sma!4v1620163766670!5m2!1sen!2sma" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->
  <!-- info section -->
  <section class="info_section long_section">
    <div class="container">
      <div class="contact_nav">
        <a href="">
          <i class="fa fa-phone" aria-hidden="true"></i>
          <span>
            Call : +212 653738676
          </span>
        </a>
        <a href="">
          <i class="fa fa-envelope" aria-hidden="true"></i>
          <span>
            Email : licence_excelence@gmail.com
          </span>
        </a>
      </div>
       <!-- Section: Social media -->
      <div class="info_top ">
          <section style="display: flex; justify-content: center; gap: 9%;" class="mb-4">
            <!-- Facebook -->
            <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: blue;" href="#!" role="button">
              <i class="fab fa-facebook"></i>
            </a>
            <!-- Instagram -->
            <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="#!" role="button">
            <i class="fab fa-instagram"></i>
            </a>
            <!-- Linkedin -->
            <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: blue;" href="#!" role="button">
            <i class="fab fa-linkedin"></i>
            </a>
            <!-- Home page -->
            <a href="client_side.php" data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color:antiquewhite;" href="#!" role="button">
                <i class="fas fa-home" style="color:black"></i>
            </a>
    </section>
    <!-- Section: Social media -->
      </div>
    </div>
  </section>
  <!-- end info_section -->
  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="http://localhost/projet_php/layout/client_side.php">abdelkhalk essaid</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->
  <!--Le model -->
  <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
      <div style="transform: scale(0.87);" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <!--Headre modal-->
          <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Commander maintenant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </butoon>
                </div>
          <!-- fin Headre modal-->
          <!--Body de modal-->
          <div class="modal-body">
                <div class="row">
                  <div class="col-md-6 image_produit">
                    <!-- Product Details -->
                    <div id="productDetails">
                    <img id="productImage" style="width:219px" src="" alt="Product Image">
                    <!-- Add other product details here -->
                      </div>
                    </div>
                  <div class="col-md-6">
                    <!-- Form -->
                    <h4>Order Form</h4>
                    <form  id="buy_form">
                      <div class="form-group">
                        <label for="name">Nom <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="nom" id="name" placeholder="donner votre nom" required>
                        <span class="error" id="nameErr"></span>
                        </div>
                      <div class="form-group">
                        <label for="prenom">prénom <span style="color:red">*</span></label>
                        <input type="text" name="prenom" class="form-control" id="prenom" placeholder="donner votre prénom" required>
                      </div>
                      <div class="form-group">
                        <label for="Contité">Contité <span style="color:red">*</span></label>
                        <input type="number" max="3" name="contité"" value="1" class="form-control" id="prenom" placeholder="Contité" required>
                      </div>
                      <div class="form-group">
                        <label for="quantity">la ville <span style="color:red">*</span></label>
                        <input type="text" name="ville" class="form-control" id="ville" placeholder="nom de ville" required>
                        </div>
                      <div class="form-group">
                        <label for="quantity">Adress <span style="color:red">*</span></label>
                        <input type="text" name="adress" class="form-control" id="adress" placeholder="Adress" required>
                        </div>
                      <div class="form-group">
                        <label for="quantity">teliphone <span style="color:red">*</span></label>
                        <input type="text" name="teli" class="form-control" id="teliphone" placeholder="donner votre numéro" required>
                        </div>
                    <!-- Add more form fields as needed -->
                        <div class="text-center">
                          <button type="submit"  id="cmd_btn" class="btn btn-primary">Commander</button>
                          <input type="hidden" name="opt" value="commander">
                          </div>
                      <input type="text" value="" name="prod_nom" id="title" style="display:none;">
                    </form>
                    </div>
                </div>
                </div>
          <!--fin Body de modal-->
          <!--modal footer-->
            <!--makayn walo hna had sa3a -->
          <!--fin modal footer-->
        </div>
      </div>
    </div>
  <!--fin modal-->
  <div id="loading">
    <div class="spinner"></div>
  </div>
<!--java script de model-->
  <script src="js/client.js"></script>
  <script src="js/pagination_produit.js"></script>
  <!--End model -->
  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <script >
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                            behavior: 'smooth'
                });
            });
        });
  </script>
  <!-- End Google Map -->
</body>
<style>
      .error-border {
         border-color: red !important; /* Utilisation de !important pour s'assurer que la couleur est appliquée */
        }
        @keyframes flashRed {
            0% { color: red; }
            50% { color: transparent; }
            100% { color: red; }
        }
        .animated-text {
            animation: flashRed 0.5s infinite;
        }
        .image_produit{
          display: flex;
          justify-content: center;
          padding-block: 156px;
        }
        @media screen and (max-width: 900px) {
            .image_produit {
             padding-block: 34px; /* Padding for screens less than 900px */
          }
        }
        @media screen and (max-width: 900px) {
            .produit_container {
                margin-inline: 24px !important;
            }
        }
        .card_produit{
          box-shadow: 0 0 4px rgb(0 0 0 / 23%);
            background: linear-gradient(192deg, #74616133, transparent);
        }
        .produit_container{
          background: linear-gradient(45deg, #f3e6e629, transparent);
          margin-inline: 45px;
        }
        .envoi_message_btn{
          width: 238px;
          background:#00800042;
          border: none;
          border-radius: 10px;
          box-shadow: 0 0 3px rgb(0 0 0 / 14%);
        }
        .envoi_message_btn:hover{
            background:#54eb54;
        }
        .select_menu{
          padding: 7px;
          height: 37px;
          box-shadow: 0 0 4px rgb(0 0 0 / 15%);
          border-radius: 6px;
          background: #8fa2d738;
          margin-right:13px;
        }
        .serch{
          height: 38px;
          border: none;
          border-radius: 4px;
          width: 10rem;
          box-shadow: 0 0 4px rgb(0 0 0 / 15%);
          background: #00800069;
          position: relative;
          top: -2px;
        }
  </style>
</html>