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
      <?php print getHead("Eventory | Profil"); ?>
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
                        <h2>Profilim</h2>
                        <div class="clearfix"></div>
                      </div>

                      <div class="col-md-6">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Etkinliklerim <small>Oluşturduğunuz etkinlikleri burada görebilirsiniz </small><i class="fa fa-info-circle"></i></h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <table class="table table-hover">
                              <thead>
                              <tr>
                                <th>ID</th>
                                <th>Etkinlik Adı</th>
                                <th>Tarihi</th>
                                <th>Kalan Bilet</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php

                              $rs1=mysqli_query($conn,"SELECT * FROM etkinlik WHERE uye_id={$uye_id}");
                              while($row1=mysqli_fetch_array($rs1)){

                                $sqlKalan="SELECT COUNT(*) FROM bilet WHERE etk_id={$row1['etk_id']}";
                                $rsKalan=mysqli_query($conn,$sqlKalan);
                                $kalan=mysqli_fetch_array($rsKalan);
                                $kalan=$row1['etk_kapasite']-$kalan[0];

                                echo "
                                <tr>
                                  <th scope=\"row\">{$row1['etk_id']}</th>
                                  <td><a href='show_event.php?event={$row1['etk_id']}'><i class='glyphicon glyphicon-search'></i> {$row1['etk_ad']}</td>
                                  <td>{$row1['etk_bas_tarihi']}</td>
                                  <td>{$kalan} adet</td>
                                </tr>
                                ";
                              }

                              ?>
                              </tbody>
                            </table>

                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Biletlerim <small>Kayıt olduğunuz etkinliklerin biletleri </small><i class="fa fa-info-circle"></i></h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <table class="table table-hover">
                              <thead>
                              <tr>
                                <th>Etkinlik Adı</th>
                                <th>Tarihi</th>
                                <th>Ücreti</th>
                                <th>Oluşturan İletişim</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              $rs2=mysqli_query($conn,"SELECT * FROM bilet WHERE uye_id={$uye_id}");
                              while($row2=mysqli_fetch_array($rs2)){
                                $rs1=mysqli_query($conn,"SELECT * FROM etkinlik WHERE etk_id={$row2['etk_id']}");
                                $rowEtkinlik=mysqli_fetch_array($rs1);
                                $ad=$rowEtkinlik['etk_ad'];
                                $tarih=$rowEtkinlik['etk_bas_tarihi'];

                                $rsOlusturan=mysqli_query($conn,"SELECT * FROM uyeler WHERE uye_id={$rowEtkinlik['uye_id']}");
                                $rowOlusturan=mysqli_fetch_array($rsOlusturan);
                                $olusturan=$rowOlusturan['uye_email'];


                                echo "
                              <tr>
                                <th scope=\"row\"><a href='show_event.php?event={$row2['etk_id']}'><i class='glyphicon glyphicon-search'></i> {$ad}</th>
                                <td>{$tarih}</td>
                                <td>{$row2['etk_ucreti']} {$row2['etk_para_birimi']}</td>
                                <td>{$olusturan}</td>
                              </tr>
                              ";
                              }
                              ?>
                              </tbody>
                            </table>

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