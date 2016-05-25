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
      <?php print getHead("boş sayfa"); ?>
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
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel" style="height:600px;">
                      <div class="x_title">
                        <h2>Sayfa Başlığı</h2>
                        <div class="clearfix"></div>
                      </div>
                        içerik


                    </div>
                  </div>
                </div>
              </div>
            </div>
        <!-- /page content -->

		
		
		
		
        <!-- footer content start -->
<?php print getFooter(); ?>