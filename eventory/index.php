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
                                      <?php
                                      $y=mysqli_query($conn,"SELECT COUNT(*) FROM kategori");
                                      $y=mysqli_fetch_array($y);
                                      $y=$y[0];
                                      for($i=1;$i<=$y;$i++) {
                                              $sqlKategori1 = "SELECT * FROM etkinlik WHERE kat_id={$i} ORDER BY etk_bas_tarihi DESC LIMIT 1";
                                              $rsKategori1 = mysqli_query($conn, $sqlKategori1);
                                              $row = mysqli_fetch_array($rsKategori1);
                                              $ucret = $row['etk_ucreti'] . " " . $row['etk_para_birimi'] . " <i class=\"fa fa-try\"></i>";
                                              if ($row['etk_ucreti'] == 0) {
                                                  $ucret = "<span style='color: red;'>Ücretsiz !</span>";
                                              }
                                              if (strcmp($row['etk_afis'], "default_afis.png") == 0) {
                                                  $afis = "yapim_asamasinda.png";
                                              } else {
                                                  $afis = $row['etk_afis'];
                                              }

                                          $rsKatAd=mysqli_query($conn,"SELECT * FROM kategori WHERE kat_id={$i}");
                                          $rowKadAd=mysqli_fetch_array($rsKatAd);
                                          $kat=$rowKadAd['kat_ad'];

                                          $xx=mysqli_query($conn,"SELECT COUNT(*) FROM etkinlik WHERE kat_id={$i} ORDER BY etk_bas_tarihi DESC LIMIT 1");
                                          $xx=mysqli_fetch_array($xx);
                                          $xx=$xx[0];
                                          if($xx!=0) {
                                              echo "
                                          <div class=\"col-md-3\">
                                              <div class=\"thumbnail\">
                                                  <a href=\"show_event.php?event={$row['etk_id']}\"><div class=\"image view view-first\">
                                                      <img style=\"width: 100%; display: block;\" src=\"images/events/{$afis}\" alt=\"image\">
                                                      <div class=\"mask\">
                                                          <p>{$kat}</p>
                                                          <div class=\"tools tools-bottom\">
                                                              {$ucret}
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class=\"caption\">
                                                      <p>&nbsp;{$row['etk_ad']} <span class='pull-right' style='color: red'>({$row['etk_bas_tarihi']})</span></p>

                                                  </div></a>
                                              </div>
                                          </div>
                                          ";
                                          }
                                      }

                                      ?>

                                      <div class="pull-right" style="text-align: right">
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
