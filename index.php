<!DOCTYPE html>
<html lang="zxx">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>World Time</title>
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="./assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/aos/dist/aos.css/aos.css" />

    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />

    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
      <!-- endinject -->
    </head>

    <body>
     <?php
     $str = file_get_contents('divertissement.json');
     $json = json_decode($str, true); // decode the JSON into an associative array
     ?>

      <div class="container-scroller">
        <div class="main-panel">
          <!-- partial:partials/_navbar.html -->
          <?php include 'header.php'; ?>
          <!-- partial -->
           <div class="content-wrapper">
             <div class="container">
              <div class="row" data-aos="fade-up">
                <div class="col-xl-8 stretch-card grid-margin">
                  <div class="position-relative">
                   <img alt="banner" class="img-fluid "src=" <?php echo $json['articles'][0]['urlToImage']?> ">
                    <div class="banner-content">
                      <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                      nouvelle globale
                      </div>
                      <h1 class="mb-0">DIVERTISSEMENT</h1>
                       <h1 class="mb-2">
                        <?php echo $json['articles'][0]['title']?>
                       </h1>
                        <div class="fs-12">
                         <?php $date = $json['articles'][0]['publishedAt'];
                         echo substr($date,0,10);
                         ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 stretch-card grid-margin">
                  <div class="card bg-dark text-white">
                    <div class="card-body">
                      <h2>Nouvelles récentes</h2>
                       <?php for ($index = 1; $index < 4; $index++) {
                       $article = $json['articles'][$index];
                       ?>
                        <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between">
                         <div class="pr-3">
                          <h5>
                            <?php
                            echo $article['title']
                            ?>
                          </h5>
                           <div class="fs-12">
                            <?php
                            $date = $article['publishedAt'];
                            echo substr($date,0,10);
                            ?>
                           </div>
                         </div>
                        <div class="rotate-img">
                          <img alt="thumb" class="img-fluid img-lg" src="<?php echo $article['urlToImage']?>"/>
                        </div>
                      </div>
                        <?php }?>
                    </div>
                  </div>
                </div>
              </div>
            <div class="row" data-aos="fade-up">
              <div class="col-lg-3 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h2>Catégories</h2>
                    <ul class="vertical-menu">
                      <li><a href="#">Cinéma</a></li>
                      <li><a href="#">Théâtre</a></li>
                      <li><a href="#">Danse</a></li>
                      <li><a href="#">Arts</a></li>
                      <li><a href="#">Musique</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-9 stretch-card grid-margin">
                <div class="card">
                 <?php
                 for ($index = 4; $index < 7; $index++) {
                 $article = $json['articles'][$index];
                 ?>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-4 grid-margin">
                        <div class="position-relative">
                          <div class="rotate-img">
                            <img
                              src="<?php echo $article['urlToImage']?>"
                              alt="thumb"
                              class="img-fluid"
                            />
                          </div>
                          <div class="badge-positioned">
                            <span class="badge badge-danger font-weight-bold">Flash news</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-8  grid-margin">
                        <h3 class="mb-2 font-weight-600">
                         <?php echo $article['title']?>
                        </h3>
                        <div class="fs-13 mb-2">
                         <?php
                         $date = $article['publishedAt'];
                         echo substr($date,0,10);
                         ?>
                        </div>
                        <p class="mb-0">
                         <?php
                         $texte = $article['description'];
                         $max_caracteres=130;

                         if (strlen($texte)>$max_caracteres){   
                         $texte = substr($texte, 0, $max_caracteres);    
                         $position_espace = strrpos($texte, " ");    
                         $texte = substr($texte, 0, $position_espace);
                         echo $texte . "...";
                         } else {
                         echo $texte;
                         }?>
                        </p>
                      </div>
                    </div>
                  </div>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
        <!-- container-scroller ends -->

<?php include 'footer.php'; ?>

        <!-- partial -->
      </div>
    </div>
    <!-- inject:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="assets/vendors/aos/dist/aos.js/aos.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="./assets/js/demo.js"></script>
    <script src="./assets/js/jquery.easeScroll.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>
