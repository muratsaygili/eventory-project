<?php
/**
 * Created by PhpStorm.
 * User: Murat Saygılı
 * Date: 6.4.2016
 * Time: 14:27
 */
require_once "functions.php";
require_once "config.php";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <?php print getHead("Anasayfa"); ?>
  </head>
  <body class="nav-sm">
    <div class="container body">
      <div class="main_container">
        <!-- menü başlangıcı -->
          <div class="col-md-3 left_col">
            <?php print getMenu(); ?>
          </div>
        <!-- menü sonu -->
        <!-- üst bölüm -->
          <?php print getHeader(); ?>
        <!-- /üst bölüm sonu -->
        <!-- page content -->
            <div class="right_col" role="main">
              <div class="">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="x_panel">
                              <div class="x_title">
                                  <h2>Başlıca Etkinlikler </h2>

                                  <div class="clearfix"></div>
                              </div>
                              <div class="x_content">

                                  <div class="row">

                                      <p><h4>Vitrindekiler</h4></p>

                                      <div class="col-md-4">
                                          <div class="thumbnail">
                                              <div class="image view view-first">
                                                  <img style="width: 100%; display: block;" src="images/4.jpg" alt="image">
                                                  <div class="mask">
                                                      <p>Your Text</p>
                                                      <div class="tools tools-bottom">
                                                          <a href="#"><i class="fa fa-link"></i></a>
                                                          <a href="#"><i class="fa fa-pencil"></i></a>
                                                          <a href="#"><i class="fa fa-times"></i></a>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="caption">
                                                  <p>Snow and Ice Incoming for the South</p>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="thumbnail">
                                              <div class="image view view-first">
                                                  <img style="width: 100%; display: block;" src="images/4.jpg" alt="image">
                                                  <div class="mask">
                                                      <p>Your Text</p>
                                                      <div class="tools tools-bottom">
                                                          <a href="#"><i class="fa fa-link"></i></a>
                                                          <a href="#"><i class="fa fa-pencil"></i></a>
                                                          <a href="#"><i class="fa fa-times"></i></a>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="caption">
                                                  <p>Snow and Ice Incoming for the South</p>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="thumbnail">
                                              <div class="image view view-first">
                                                  <img style="width: 100%; display: block;" src="images/4.jpg" alt="image">
                                                  <div class="mask">
                                                      <p>Your Text</p>
                                                      <div class="tools tools-bottom">
                                                          <a href="#"><i class="fa fa-link"></i></a>
                                                          <a href="#"><i class="fa fa-pencil"></i></a>
                                                          <a href="#"><i class="fa fa-times"></i></a>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="caption">
                                                  <p>Snow and Ice Incoming for the South</p>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="thumbnail">
                                              <div class="image view view-first">
                                                  <img style="width: 100%; display: block;" src="images/4.jpg" alt="image">
                                                  <div class="mask">
                                                      <p>Your Text</p>
                                                      <div class="tools tools-bottom">
                                                          <a href="#"><i class="fa fa-link"></i></a>
                                                          <a href="#"><i class="fa fa-pencil"></i></a>
                                                          <a href="#"><i class="fa fa-times"></i></a>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="caption">
                                                  <p>Snow and Ice Incoming for the South</p>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="thumbnail">
                                              <div class="image view view-first">
                                                  <img style="width: 100%; display: block;" src="images/4.jpg" alt="image">
                                                  <div class="mask">
                                                      <p>Your Text</p>
                                                      <div class="tools tools-bottom">
                                                          <a href="#"><i class="fa fa-link"></i></a>
                                                          <a href="#"><i class="fa fa-pencil"></i></a>
                                                          <a href="#"><i class="fa fa-times"></i></a>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="caption">
                                                  <p>Snow and Ice Incoming for the South</p>
                                              </div>
                                          </div>
                                      </div>


                                      <div class="col-md-4">
                                          <div class="thumbnail">
                                              <div class="image view view-first">
                                                  <img style="width: 100%; display: block;" src="images/yapim_asamasinda.png" alt="image">
                                                  <div class="mask no-caption">
                                                      <div class="tools tools-bottom">
                                                          <a href="#"><i class="fa fa-link"></i></a>
                                                          <a href="#"><i class="fa fa-pencil"></i></a>
                                                          <a href="#"><i class="fa fa-times"></i></a>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="caption">
                                                  <p><strong>Image Name</strong>
                                                  </p>
                                                  <p>Snow and Ice Incoming</p>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-4"></div>
                                      <div class="col-md-4"></div>
                                      <div class="col-md-4" style="text-align: right">
                                          <a  href="search_event.php"><p style="font-size: larger" >Daha fazlası için Tıklamanız yeterli...</p> </a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
        <!-- /page content -->

		
		
		
		
        <!-- footer content start -->
<?php print getFooter(); ?>
