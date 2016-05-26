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

}else if($_POST) {


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
            <div class="right_col" role="main" >
              <div style="height: 1000px">
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


                      $sqlAdres="SELECT * FROM adresler WHERE etk_id={$etk_id} ";
                      $rsAdres=mysqli_query($conn,$sqlAdres);

                      $ulke="";
                      $il="";
                      $ilce="";
                      $mahalle="";
                      $sokak="";
                      $no="";
                      while($adres=mysqli_fetch_array($rsAdres)){
                          $ulke=$adres['adr_ulke'];
                          $il=$adres['adr_il'];
                          $ilce=$adres['adr_ilce'];
                          $mahalle=$adres['adr_mahalle'];
                          $sokak=$adres['adr_sokak'];
                          $no=$adres['adr_no'];
                      }

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

                          $olusturan=$etkinlik['uye_id']; //

                          $etk_ad=$etkinlik['etk_ad']; //
                          $etk_detay=$etkinlik['etk_detay']; //
                          $etk_kapasite=$etkinlik['etk_kapasite']; //
                          $etk_afis=$etkinlik['etk_afis']; //
                          $kat_id=$etkinlik['kat_id']; //
                          $etk_ucreti=$etkinlik['etk_ucreti'];
                          $etk_para_birimi=$etkinlik['etk_para_birimi'];
                          $etk_bas_tarihi=$etkinlik['etk_bas_tarihi']; //
                          $etk_bit_tarihi=$etkinlik['etk_bit_tarihi']; //
                          $etk_bas_saati=$etkinlik['etk_bas_saati']; //
                          $etk_bit_saati=$etkinlik['etk_bit_saati']; //


                          $sqlUyeId="SELECT * FROM uyeler WHERE uye_id={$olusturan} ";
                          $rsUyeId=mysqli_query($conn,$sqlUyeId);
                          $ol_uye_ad="";
                          while ($rowUyeId = mysqli_fetch_assoc($rsUyeId)){
                              $ol_uye_ad=$rowUyeId['uye_ad']." ".$rowUyeId['uye_soyad'];
                          }

                          $sqlKatId="SELECT * FROM kategori WHERE kat_id={$kat_id} ";
                          $rsKatId=mysqli_query($conn,$sqlKatId);
                          $kat_ad="";
                          while ($rowKatId = mysqli_fetch_assoc($rsKatId)){
                              $kat_ad=$rowKatId['kat_ad'];
                          }

                          if($etk_ucreti==0){
                              $etk_ucreti="Ücretsiz";
                          }else{
                              $etk_ucreti=$etk_ucreti." ".$etk_para_birimi;
                          }


                      }

                      echo "
                        <div class=\"col-md-3\">
                            <div class=\"row\"><img src=\"images/events/{$etk_afis}\" height=\"300px\" width=\"300px\"></div>
                            Organizatör: &nbsp&nbsp&nbsp&nbsp<strong>{$ol_uye_ad}</strong> <br>
                            Kategori: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<strong>{$kat_ad}</strong> <br>
                            Kapasite: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<strong>{$etk_kapasite}</strong> <br>
                            Etkinlik ücreti: &nbsp<strong>{$etk_ucreti}</strong> <br>
                            Etkinlik adresi:
                            <strong>
                             {$no},{$sokak} sokak <br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {$mahalle} mahallesi <br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {$ilce}/{$il}<br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {$ulke}</strong> <br>
                            <form action='show_event.php' method='post'>
                                <input type='hidden' name='etk_id' value='{$etk_id}'>
                                <input type='hidden' name='uye_id' value='{$uye_id}'>
                                <button type='submit' class='btn btn-success btn-lg'>BİLET AL</button>
                            </form>
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
                              <p3>{$etk_detay}</p3>
                            </div>

                            <div class=\"x_panel\">
                  <div class=\"x_title\">
                    <h2><i class=\"fa fa-align-left\"></i> Katılımcı Listesi <small>Sessions</small></h2>
                    <ul class=\"nav navbar-right panel_toolbox\">
                      <li><a class=\"collapse-link\"><i class=\"fa fa-chevron-up\"></i></a>
                      </li>
                      <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\"><i class=\"fa fa-wrench\"></i></a>
                        <ul class=\"dropdown-menu\" role=\"menu\">
                          <li><a href=\"#\">Settings 1</a>
                          </li>
                          <li><a href=\"#\">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class=\"close-link\"><i class=\"fa fa-close\"></i></a>
                      </li>
                    </ul>
                    <div class=\"clearfix\"></div>
                  </div>
                  <div class=\"x_content\">

                    <!-- start accordion -->
                    <div class=\"accordion\" id=\"accordion1\" role=\"tablist\" aria-multiselectable=\"true\">
                      <div class=\"panel\">
                        <a class=\"panel-heading collapsed\" role=\"tab\" id=\"headingOne1\" data-toggle=\"collapse\" data-parent=\"#accordion1\" href=\"#collapseOne1\" aria-expanded=\"false\" aria-controls=\"collapseOne\">
                          <h4 class=\"panel-title\">Katılımcılar</h4>
                        </a>
                        <div id=\"collapseOne1\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"headingOne\" aria-expanded=\"false\" style=\"height: 0px;\">
                          <div class=\"panel-body\">
                            <table class=\"table table-striped\">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>First Name</th>
                                  <th>Last Name</th>
                                  <th>Username</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope=\"row\">1</th>
                                  <td>Mark</td>
                                  <td>Otto</td>
                                  <td>@mdo</td>
                                </tr>
                                <tr>
                                  <th scope=\"row\">2</th>
                                  <td>Jacob</td>
                                  <td>Thornton</td>
                                  <td>@fat</td>
                                </tr>
                                <tr>
                                  <th scope=\"row\">3</th>
                                  <td>Larry</td>
                                  <td>the Bird</td>
                                  <td>@twitter</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>


                    </div>
                    <!-- end of accordion -->


                  </div>
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
