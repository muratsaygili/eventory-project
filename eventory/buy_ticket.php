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
      <?php print getHead("Bilet Al"); ?>
  </head>
  <body class="nav-md" onunload="opener.location.reload(true);">
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
                        <h2>Bilet Alma Sayfası</h2>
                        <div class="clearfix"></div>
                      </div>

                      <?php
                      if(!$_GET){
                        header("Location: index.php");
                      }
                      if($_POST){
                          $etk=$_POST['etkinlik'];
                          $uye=$_POST['uye'];
                          $ucret=$_POST['ucret'];
                          $adet=$_POST['adet'];
                          $birim=$_POST['birim'];

                          $rsBilet=mysqli_query($conn,"INSERT INTO bilet (uye_id,etk_id,adet,etk_ucreti,etk_para_birimi) VALUES ('$uye','$etk','$adet','$ucret','$birim')");
                          if($rsBilet){
                              echo "<script>window.alert('Biletinizi başarıyla aldınız !!'); window.close();</script>";
                          }
                      }


                      $etk_id=$_GET['event'];
                      $sql="SELECT * FROM etkinlik WHERE etk_id={$etk_id} ";
                      $rs=mysqli_query($conn,$sql);

                      while($etkinlik=mysqli_fetch_array($rs)){
                          echo "";
                          $etk_ad=$etkinlik['etk_ad'];
                          $kapasite=$etkinlik['etk_kapasite'];
                          $ucret=$etkinlik['etk_ucreti'];
                          $birim=$etkinlik['etk_para_birimi'];
                      }

                      if($ucret==0){
                          $form="
                      <form method='post' action='buy_ticket.php'>
                          <input type=\"hidden\" name=\"etkinlik\" value=\"{$etk_id}\" />
                          <input type=\"hidden\" name=\"uye\" value=\"{$uye_id}\" />
                          <input type=\"hidden\" name=\"ucret\" value=\"{$ucret}\" />
                          <input type=\"hidden\" name=\"adet\" value=\"1\" />
                          <input type=\"hidden\" name=\"birim\" value=\"{$birim}\" />

                        <div class=\"form-group\">
                            <div class=\"col-md-6 col-sm-6 col-xs-12\">
                                <input class='btn btn-warning col-sm-12' type=\"submit\"  name=\"etk_ad\" value='ONAYLA ve BİLETİ AL'>
                            </div>
                        </div>
                      </form>
                          ";
                      }else{
                          $form= "
                          <form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\">
                        <input type=\"hidden\" name=\"cmd\" value=\"_xclick\" />
                        <input type=\"hidden\" name=\"business\" value=\"PayPal Adresiniz\" />
                        <input type=\"hidden\" name=\"item_name\" value=\"Ürün Adı\" />
                        <input type=\"hidden\" name=\"item_number\" value=\"Ürün Numarası (ID)\" />
                        <input type=\"hidden\" name=\"currency_code\" value=\"USD veya TRY\" />
                        <input type=\"hidden\" name=\"amount\" value=\"Fiyat\" />
                        <input type=\"hidden\" name=\"no_shipping\" value=\"1\" />
                        <input type=\"hidden\" name=\"shipping\" value=\"0.00\" />
                        <input type=\"hidden\" name=\"return\" value=\"Satış tamamlandığında gideceği URL\" />
                        <input type=\"hidden\" name=\"cancel_return\" value=\"Ödeme yapmazsa gideceği URL\" />
                        <input type=\"hidden\" name=\"custom\" value=\"Özel eklemek istedikleriniz.\" />
                        <input type=\"hidden\" name=\"no_note\" value=\"1\" />
                        <input type=\"hidden\" name=\"tax\" value=\"0.00\" />
                        <input type=\"submit\" class=\"btn btn-warning col-sm-12\" style=\"font-weight:normal\" value=\"PAYPAL HESABINLA ÖDE\" />
                      </form>
                          ";
                      }

                      $uyead=$rowUser['uye_ad']." ".$rowUser['uye_soyad'];
                      echo "
                      Etkinlik adı: <strong>{$etk_ad}</strong> <br>
                      Adınız ve Soyadınız: <strong>{$uyead}</strong> <br>
                      Ücret:<strong>{$ucret} {$birim}</strong> <br>

                      {$form}

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