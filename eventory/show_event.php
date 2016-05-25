<?php
/**
 * Created by PhpStorm.
 * User: Murat Saygılı
 * Date: 6.4.2016
 * Time: 14:27
 */
require_once "functions.php";
require_once "config.php";

if($_GET){ //etkinliğe tıklanmadan gelindiyse önceki sayfasına yönlendirelim..(Kapsam dışı istek)

}else{
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <?php print getHead("Eventory!"); ?>
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
                        <h2>Ayrıntılı Etkinlik Bilgileri</h2>
                        <div class="clearfix"></div>
                      </div>
                      <?php

                      $etk_id=$_GET['event'];
                      $sql="SELECT * FROM etkinlik WHERE etk_id={$etk_id} ";
                      $rs=mysqli_query($conn,$sql);

                      $olusturan="";

                      $etk_ad="";
                      $etk_detay="";
                      $etk_kapasite="";
                      $etk_afis="";
                      $kat_id="";
                      $etk_ucreti="";
                      $etk_para_birimi="";
                      $etk_bas_tarihi="";
                      $etk_bit_tarihi="";
                      $etk_bas_saati="";
                      $etk_bit_saati="";

                      while($etkinlik=mysqli_fetch_array($rs)){

                          $olusturan=$etkinlik['uye_id'];

                          $etk_ad=$etkinlik['etk_ad'];
                          $etk_detay=$etkinlik['etk_detay'];
                          $etk_kapasite=$etkinlik['etk_kapasite'];
                          $etk_afis=$etkinlik['etk_afis'];
                          $kat_id=$etkinlik['kat_id'];
                          $etk_ucreti=$etkinlik['etk_ucreti'];
                          $etk_para_birimi=$etkinlik['etk_para_birimi'];
                          $etk_bas_tarihi=$etkinlik['etk_bas_tarihi'];
                          $etk_bit_tarihi=$etkinlik['etk_bit_tarihi'];
                          $etk_bas_saati=$etkinlik['etk_bas_saati'];
                          $etk_bit_saati=$etkinlik['etk_bit_saati'];


                      }

                      echo "
                        <div class=\"col-md-3\">
                            <div class=\"row\"><img src=\"images/{$etk_afis}\" height=\"350px\" width=\"350px\"></div>
                            Kapasite: {$etk_kapasite}
                        </div>
                        <div class=\"col-md-9\">
                            <h3>
                                <span class='pull-right'> <i class='fa fa-2x fa-calendar'></i>
                                    <span class='btn-info btn-round btn-lg'>{$etk_bas_tarihi}-{$etk_bas_saati}</span> <strong>&</strong>
                                    <span class='btn-warning btn-round btn-lg'> {$etk_bit_tarihi}-{$etk_bit_saati}</span>
                                </span>
                            </h3>
                            <div class=\"jumbotron\">
                              <h1>{$etk_ad}</h1>
                              <p>{$etk_detay}</p>
                            </div>


                        </div>
                      ";
                      ?>




                    </div>
                  </div>
                </div>
              </div>
            </div>
        <!-- /page content -->

		
		
		
		
        <!-- footer content start -->
<?php print getFooter(); ?>