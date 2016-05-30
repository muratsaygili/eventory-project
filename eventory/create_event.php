<?php
/**
 * Created by PhpStorm.
 * User: Murat Saygılı
 * Date: 6.4.2016
 * Time: 14:27
 */
require_once "functions.php";
require_once "config.php";


if($_POST){
    echo "post var";


    global $uye_id;

    // $etk_id=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM etkinlik "));
    // $etk_id=$etk_id[0]; //kaç tane etkinlik olduğunu hesaplayıp sonraki etkinlik için id belirledik

    $res=mysqli_query($conn,"SHOW TABLE STATUS FROM eventory LIKE 'etkinlik' "); //son AI değerini aldık
    $row=mysqli_fetch_array($res);
    $etk_id=$row['Auto_increment'];


    $etk_ad=$_POST['etk_ad'];
    $etk_detay=$_POST['etk_detay'];
    $etk_kapasite=$_POST['etk_kapasite'];

    if($_POST['etk_afis']==""){
        $etk_afis="default_afis.png";
    }else{
        $etk_afis=$_POST['etk_afis'];
    }

    $kat_id=$_POST['kat_id'];
    $etk_ucreti=$_POST['etk_ucreti'];
    $etk_para_birimi=$_POST['etk_para_birimi'];

    $etk_bas_tarihi=$_POST['etk_bas_tarihi'];
    $etk_bit_tarihi=$_POST['etk_bit_tarihi'];
    $etk_bas_saati=$_POST['etk_bas_saati'];
    $etk_bit_saati=$_POST['etk_bit_saati'];

    $adr_ulke=$_POST['adr_ulke'];
    $adr_il=$_POST['adr_il'];
    $adr_ilce=$_POST['adr_ilce'];
    $adr_mahalle=$_POST['adr_mahalle'];
    $adr_sokak=$_POST['adr_sokak'];
    $adr_no=$_POST['adr_no'];



    //etkinlik tablosuna veri girişi
    $sql_etk="INSERT INTO etkinlik (etk_id,etk_ad,etk_detay,etk_kapasite,uye_id,etk_afis,etk_bas_tarihi,etk_bit_tarihi,etk_bas_saati,etk_bit_saati,etk_ucreti,kat_id,etk_para_birimi)
              VALUES ('$etk_id','$etk_ad','$etk_detay','$etk_kapasite','$uye_id','$etk_afis','$etk_bas_tarihi','$etk_bit_tarihi','$etk_bas_saati','$etk_bit_saati','$etk_ucreti','$kat_id','$etk_para_birimi')";
    $rs_etk=mysqli_query($conn,$sql_etk);
    //adres tablosuna veri girişi
    $sql_adr="INSERT INTO adresler (etk_id,adr_ulke,adr_il,adr_ilce,adr_mahalle,adr_sokak,adr_no)
              VALUES ('$etk_id','$adr_ulke','$adr_il','$adr_ilce','$adr_mahalle','$adr_sokak','$adr_no')";
    $rs_adr=mysqli_query($conn,$sql_adr);

    if($rs_etk && $rs_adr){
        echo "Etkinliğiniz başarıyla oluşturulmuştur !! :) ";
        header("refresh:1; url=search_event.php");
    }else{
        echo "HATA!! Etkinlik oluşturulamadı !";
        header("refresh:1; url=create_event.php");
    }


}else {
}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <?php print getHead("Etkinlik Oluştur"); ?>
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
            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Etkinlik Oluştur</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <!-- Form başlangıç -->
                            <p>Etkinliğinizi oluşturmak için bütün alanları eksiksiz doldurunuz !</p>
                            <div id="wizard" class="form_wizard wizard_horizontal">
                                <ul class="wizard_steps">
                                    <li>
                                        <a href="#step-1">
                                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Adım 1<br />
                                              <small>Genel Bilgiler</small>
                                          </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#step-2">
                                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Adım 2<br />
                                              <small>Afiş&Kategori</small>
                                          </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#step-3">
                                            <span class="step_no">3</span>
                            <span class="step_descr">
                                              Adım 3<br />
                                              <small>Tarih&Fiyat</small>
                                          </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#step-4">
                                            <span class="step_no">4</span>
                            <span class="step_descr">
                                              Adım 4<br />
                                              <small>Adres Bilgileri</small>
                                          </span>
                                        </a>
                                    </li>
                                </ul>
                                <div>
                                    <form class="form-horizontal form-label-left" action="create_event.php" method="post">
                                <div id="step-1" class="form-group">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="etk_ad">Etkinlik Adı </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input autofocus type="text" id="etk_ad" name="etk_ad" required="required" class="form-control col-md-7 col-xs-12" placeholder="Ör: Yılbaşı Partisi '17">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="etk_detay">Etkinlik Detayı </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea id="etk_detay" required="required" class="form-control col-md-6 col-sm-6 col-xs-12"
                                                          name="etk_detay" placeholder="max. 500 karakter" rows="8" maxlength="500"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="etk_kapasite">Etkinlik Kapasitesi </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="number" id="etk_kapasite" name="etk_kapasite" required="required" class="form-control col-md-7 col-xs-12" placeholder="Etkinliğiniz kaç kişilik ?">
                                            </div>
                                        </div>
                                </div>
                                <div id="step-2" class="form-group">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="etk_afis">Etkinlik Afişi</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                                            <label>resim seç veya sürükle<small style="alignment: right;"> *afişiniz yok ise boş bırakınız</small></label>
                                            <input type="file" draggable="true" id="etk_afis" name="etk_afis" class="form-control col-md-7 col-xs-12" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kat_id">Kategori seçiniz</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control" id="kat_id" required="required" name="kat_id">
                                                <?php //kategorileri listelemek için script
                                                $sql="SELECT * FROM kategori";
                                                $rs=mysqli_query($conn,$sql);

                                                while($kat=mysqli_fetch_array($rs)){
                                                    echo "<option value=\"{$kat[0]}\">{$kat[1]}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="etk_ucreti">Etkinlik Ücreti </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label>Eğer etkinlik ücretsiz ise boş bırakınız !</label>
                                            <input type="number" id="etk_ucreti" name="etk_ucreti" value="0" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="etk_para_birimi">Para Birimi </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control" id="etk_para_birimi" required="required" name="etk_para_birimi">
                                                <option  value="TRY">Türk Lirası</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="step-3" class="form-group">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bas_tar">Başlangıç Tarihi</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="bas_tar" type="date" class="form-control" name="etk_bas_tarihi">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bit_tar">Bitiş Tarihi</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="bit_tar" type="date" class="form-control" name="etk_bit_tarihi">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bas_saat">Başlangıç Saati</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="bas_saat" type="time" class="form-control" name="etk_bas_saati">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bit_saat">Bitiş Saati</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="bit_saat" type="time" class="form-control" name="etk_bit_saati">
                                        </div>
                                    </div>
                                </div>
                                <div id="step-4" class="form-group">
                                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <strong>Etkinliğinizin yapılacağı adres bilgileri</strong>
                                    </div>
                                    <div class="form-group col-md-1"></div>
                                    <div class="form-group col-md-5">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adr_ulke">Ülke </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="adr_ulke" name="adr_ulke" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adr_il">İl </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="adr_il" name="adr_il" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adr_ilce">İlçe </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="adr_ilce" name="adr_ilce" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adr_mahalle">Mahalle </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="adr_mahalle" name="adr_mahalle" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adr_sokak">Sokak </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="adr_sokak" name="adr_sokak" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adr_no">No </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="adr_no" name="adr_no" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                    </div>
                                    <input class="submit btn btn-round btn-info pull-right" type="submit" value="Etkinlik Oluştur"></form>
                                    </div>
                                </div>
                            </div>
                            <!-- Form bitiş -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

		
		
		
		
        <!-- footer content start -->
<?php print getFooter();







?>