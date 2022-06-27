<!DOCTYPE html>
<html lang="zxx">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>World Time</title>
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="././assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="./assets/vendors/aos/dist/aos.css/aos.css" />
    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="./assets/images/favicon.png" />
    <!-- inject:css -->
    <link rel="stylesheet" href="./assets/css/style.css">
      <!-- endinject -->
    </head>

    <body>
     <?php
     $title = $_GET['t'];
     $imageRemplacement = $_GET['q']  .  ".jpeg";

     /** Gestion des pages */
     if ((isset($_REQUEST['page'])) && (!empty($_REQUEST['page']))) {
     $page = $_GET['page'];
    } else {
     $page = 1;
    }

    $q = $_GET['q'];
    $url = "https://newsapi.org/v2/everything?q=" . $q . "&page=" . $page . "&apiKey=2b6c3949748a41d4ad0d2344e78084a5&language=fr&pagesize=20";
    //$url = $_GET['q'] . $page . '.json';

    $str = file_get_contents($url);
    $json = json_decode($str, true); // decode the JSON into an associative array
    $nbResultats = $json['totalResults'];
    ?>

      <div class="container-scroller">
        <div class="main-panel">
          <!-- partial:../partials/_navbar.html -->
          <?php include 'header.php'; ?>

          <!-- partial -->
          <div class="content-wrapper">
            <div class="container">
              <div class="col-sm-12">
                <div class="card" data-aos="fade-up">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-12">
                        <h1 class="font-weight-600 mb-4">
                          <?php echo $title ?>
                        </h1>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8">
                        <div class="row">
                          <?php
                          for ($index = 6; $index < 21; $index++) {
                          $article = $json['articles'][$index];            
                          ?>
                          <div class="col-sm-4 grid-margin mt-2">
                            <div class="rotate-img">
                              <img style="width:300px; height:150px;" src="
                              <?php 
                              $image = $article['urlToImage'];
                              if ($image == null) {
                              echo $imageRemplacement;
                            } else {
                              echo $image;
                               }?>
                               " alt="banner" class="img-fluid" />
                            </div>
                          </div>
                          <div class="col-sm-8 grid-margin">
                            <h2 class="font-weight-600 mb-2">
                              <?php
                              $titreArticle = $article['title']; $max_caracteres=74;
                              
                              if (strlen($titreArticle)>$max_caracteres){   
                              $titreArticle = substr($titreArticle, 0, $max_caracteres);    
                              $position_espace = strrpos($titreArticle, " ");    
                              $titreArticle = substr($titreArticle, 0, $position_espace);
                              echo $titreArticle . "...";
                              } else {
                               echo $titreArticle;
                             }?>
                            </h2>
                            <p class="fs-13 text-muted mb-0">
                              <?php
                              $date = $article['publishedAt'];
                              echo substr($date,0,10);
                              ?>
                            </p>
                            <p class="fs-15">
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
                          <?php } ?>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <h2 class="mb-4 text-primary font-weight-600">
                        Nouvelles récentes
                        </h2>
                        <?php for ($index = 0; $index < 3; $index++) {
                        $article = $json['articles'][$index]; ?>
                         <div class="row">
                          <div class="col-sm-12">
                            <div class="border-bottom pb-4 pt-4">
                              <div class="row">
                                <div class="col-sm-8">
                                  <h5 class="font-weight-600 mb-1">
                                    <?php
                                     $titreArticle = $article['title']; $max_caracteres=55;
                                
                                     if (strlen($titreArticle)>$max_caracteres){   
                                     $titreArticle = substr($titreArticle, 0, $max_caracteres);    
                                     $position_espace = strrpos($titreArticle, " ");    
                                     $titreArticle = substr($titreArticle, 0, $position_espace);
                                     echo $titreArticle . "...";
                                   } else {
                                     echo $titreArticle;
                                   }?>
                                  </h5>
                                  <p class="fs-13 text-muted mb-0">
                                   <?php
                                    $date = $article['publishedAt'];
                                    echo substr($date,0,10);
                                   ?>
                                  </p>
                                </div>
                                <div class="col-sm-4">
                                  <div class="rotate-img">
                                    <img src="
                                    <?php 
                                    $image = $article['urlToImage'];
                                    if ($image == null) {
                                    echo $imageRemplacement;
                                  } else {
                                    echo $image;
                                  }?>
                                  " alt="banner" class="img-fluid" />
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php }?>
                        <div class="trending">
                          <h2 class="mb-4 text-primary font-weight-600">
                           Tendances
                          </h2>
                           <?php
                           for ($index = 3; $index < 6; $index++) {
                           $article = $json['articles'][$index];
                           ?>
                          <div class="mb-4">
                            <div class="rotate-img">
                              <img src="
                               <?php
                                $image = $article['urlToImage']; 
                                if ($image == null) {
                                echo $imageRemplacement;
                              } else {
                                echo $image;
                              }?>
                              " alt="banner" class="img-fluid" />
                            </div>
                            <h3 class="mt-3 font-weight-600">
                              <?php echo $article['title']?>
                            </h3>
                            <p class="fs-13 text-muted mb-0">
                             <?php
                             $date = $article['publishedAt'];
                             echo substr($date,0,10);
                             ?>
                            </p>
                          </div>
                          <?php }?>
                        </div>
                      </div>
                    </div>
                  </div>

<?php 
$pageFirst = -1;
$pagePrec = -1;
$pageNext = -1;
$pageLast = -1;

if ($page > 1) {
  $pageFirst = 1;
}
if ($page > 2) {
  $pagePrec = $page-1;
}
$nbPage = floor($nbResultats/20)+1;
if ($page < $nbPage) {
  $pageLast = $nbPage;
}
if ($page < $nbPage-1) {
  $pageNext = $page +1;
}
?>
<div class="pagination pb-5">
 <?php if ($pageFirst>0) { ?>
  <a href="category.php?q=<?php echo $q ?>">1</a> &nbsp;&nbsp;>>&nbsp;&nbsp;
 <?php } ?>

 <?php if ($pagePrec>0) { ?>
  <a href="category.php?q=<?php echo $q ?>&page=<?php echo $pagePrec ?>"><?php echo $pagePrec ?></a>
  &nbsp;&nbsp;.&nbsp;&nbsp;
 <?php } ?>

<strong><a class="activeA"><?php echo ($page) ?></a></strong>

<?php if ($pageNext>0) { ?>
    &nbsp;&nbsp;.&nbsp;&nbsp;
  <a href="category.php?q=<?php echo $q ?>&page=<?php echo $pageNext ?>"><?php echo $pageNext ?></a>
<?php } ?>

<?php if ($pageLast>0) { ?>
    &nbsp;&nbsp;>>&nbsp;&nbsp;
  <a href="category.php?q=<?php echo $q ?>&page=<?php echo $pageLast ?>"><?php echo $pageLast ?></a>
<?php } ?>

               </div>
              </div>
             </div>
            </div>
          </div>

<?php include 'footer.php'; ?>


        </div>
      </div>
      <!-- inject:js -->
      <script src="./assets/vendors/js/vendor.bundle.base.js"></script>
      <!-- endinject -->
      <!-- plugin js for this page -->

      <script src="./assets/vendors/aos/dist/aos.js/aos.js"></script>
      <!-- End plugin js for this page -->
      <!-- Custom js for this page-->
      <script src="./assets/js/demo.js"></script>
      <script src="./assets/js/jquery.easeScroll.js"></script>
      <!-- End custom js for this page-->
    </body>
  </html>
