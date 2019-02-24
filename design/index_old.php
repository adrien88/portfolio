<?php

  /*
      load config
  */
  $CONFIG = parse_ini_file('config.ini',1)['site'];

  /*
      Autoloading of PHP class
  */
  spl_autoload_register(function ($class) {
      include 'model/php/'.$class.'.class.php';
  });

  /*
      Get PATH
  */
  $PATH=router::auto('');

  // 
  session_start();


 ?>

<!DOCTYPE html>
<html lang="fr-FR">
  <head>
    <title>Portfolio</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="portfolio, jrojets, adrien, boilley">

    <meta property="og:title" content="Portfolio" />
    <meta property="og:type" content="page" />
    <meta property="og:description" content="Portfolio personnel d'Adrien Boilley, revisité." />
    <meta property="og:url" content="https://boilley.info/other/OnlineFormaPro/portfolio2/" />
    <meta property="og:image" content="https://boilley.info/other/OnlineFormaPro/portfolio2/lib/medias/cute-owl-wallpaper.jpg" />

    <link rel="stylesheet" href="lib/public/bootstrap_4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="lib/public/css/style.css">
  </head>

  <body>
    <nav id="navbar" class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
      <a class="navbar-brand" href="#">BOILLEY Adrien</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#cont-cv">CV</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#cont-portfolio">Portfolio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#footer">Contact</a>
          </li>
        </ul>

      </div>
    </nav>

    <header id="header" class="container-fluid">
      <div class="row content">
        <div class="col-xs-12 col-sm-2">
          <img class="img-fluid" src="lib/medias/kiwi-tech.svg" alt="logo" width="200" height="100">
        </div>
        <div class="col-xs-12 col-sm-10">
          <h1>Boilley Adrien</h1>
          <p>Voici une petite rétrospective des projets auxquels j'ai participé et des langages et framworks employés.</p>
          <a href="#" class="technoUsed" id="t-html">
            HTML5
            <i class="fab fa-html5"></i>
          </a>
          <a href="#" class="technoUsed" id="t-css">
            CSS3
            <i class="fab fa-css3-alt"></i>
          </a>
          <a href="#" class="technoUsed" id="t-js">
            JS
            <i class="fab fa-js"></i>
          </a>
          <a href="#" class="technoUsed" id="t-php">
            PHP
            <i class="fab fa-php"></i>
          </a>
          <a href="#" class="technoUsed" id="t-sql">
            Mariadb MySql
            <i class="fas fa-database"></i>
          </a>

          <p>Curieux, j'aime apprendre, expérimenter, découvrir.<br>Actif dans le groupe, je n'hésite pas a suggérer des améliorations.</p>
        </div>
      </div>
    </header>

    <!-- ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
      SECTION CV
    :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->
    <section  id="cont-cv">
      <div class="container-fluid">

        <div class="row footer-title">
          <div class="col-xs-12 h2-title">
            <h2>CV</h2>
          </div>
        </div>

        <article class="row compte">
          <div class="conatiner">
            <h3>Compétences</h3>
            <ul>
              <li>Front End</li>
              <li>Back End</li>
            </ul>
          </div>
        </article>
        <article class="row">
          <div class="conatiner">
            <h3>Exp</h3>
            <ul>
              <li>Intérim</li>
            </ul>
          </div>
        </article>
        <article class="row">
          <div class="conatiner">
            <h3>Diplômes</h3>
            <ul>
              <li>Titre Pro Tailleur de pierre</li>
              <li>BAC PRO CGEA</li>
              <li>BEPA CPA</li>
            </ul>
          </div>
        </article>
      </div>
    </section>

    <!-- ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
      SECTION PortFolio
    :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->
    <section  id="cont-portfolio">
      <div class="container-fluid">

        <div class="row footer-title">
          <div class="col-xs-12 h2-title">
            <h2>Portfolio</h2>
          </div>
        </div>

        <div id="newAnim">
          <?php
          $folder = glob(__DIR__.'/projets/*', GLOB_ONLYDIR);

           foreach($folder as $projetc){
             $projectfolder = 'projets/'.basename($projetc);
             echo "
             <a target=\"blanck\"href=\"".$projectfolder."\">
               <div class=\"projet_thumbnail\" style=\"background-image:url(".$projectfolder."/screenshot.png);\">
                 <div class=\"zoneTexte\">
                   <h3><sub>description.</sub><br>".preg_replace('#^[0-9]+\.(.*)#','$1',basename($projectfolder))."</h3>
                 </div>
               </div>
             </a>";
           }
          ?>
        </div>
      </div>
    </section>

    <footer class="container-fluid" id="footer">
      <div class="row">
        <div class="col-12 h2-title" id="title-footer">
          <h2>Boilley Adrien © 2018</h2>
        </div>
      </div>

      <div class="row content">

        <div class="col-xs-12 col-sm-6">
          <form id="formmssg" class="" action="lib/controler/formAjax.php" method="post">
            <div class="">
              <label for="name">Name</label><br>
              <input id="name" type="text" name="name" value="" required>
            </div>
            <div class="">
              <label for="email">Email</label><br>
              <input id="email" type="text" name="email" value="" required>

            </div>
            <div>
              <label for="message">Message</label><br>
              <textarea id="message" name="message" rows="8" cols="80" maxlength="250" required></textarea><br>
            </div>
            <div >
              <input class="submit" type="submit" name="submit" value="message">
              <input type="reset" name="reset" value="effacer">
            </div>
          </form>
        </div>

        <div class="col-xs-12 col-sm-6">
          Mapbox
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
          <h2>Contact Me</h2>
          <ul>
            <li>06.48.23.80.42</li>
            <li> <a href="mailto:adrien.boilley@gmail.com">adrien.boilley@gmail.com</a> </li>
            <li> <a href="http://boilley.info/wp">boilley.info</a> </li>
            <li>19 Rue de l'Amitié</li>
            <li>25000 Besançon</li>
          </ul>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
          <h2>Follow me</h2>
          <ul>
            <li><a href="https://www.facebook.com/boilley.adrien"><i class="fab fa-facebook"></i> Facebook</a></li>
            <li><a href="https://twitter.com/AdrienBoilley"><i class="fab fa-twitter-square"></i> Twitter</a></li>
            <li><a href="https://www.linkedin.com/in/adrien-boilley-a4225760/"><i class="fab fa-linkedin"></i> Linked</a></li>
            <li><a href="https://joindiaspora.com/people/940a85e6718c78a1"><i class="fab fa-diaspora"></i> Diaspora</a></li>
          </ul>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
          <h2>Copyright</h2>
          <p>Ce site et son contenu sont protégés par le droit à la propriété intelectuelle.</p>
          <h2>RGPD</h2>
          <p>Ce site n'utilise pas de cookies et n'exploite pas vos données personnelles.</p>
        </div>

      </div>

    </footer>

    <script src="lib/public/js/style.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

  </body>
</html>
