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
      <?php print getHead("Etkinlik Ara"); ?>
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
                        <h2>Etkinlikler<small></small></h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Etkinliklerin Listesi</h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <p class="text-muted font-13 m-b-30">
                              Buraya bir cümle yazı yazılabilir
                            </p>
                            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="datatable-responsive_wrapper">
                              <div class="row">
                                <div class="col-sm-12">
                                  <table style="width: 100%;" aria-describedby="datatable-responsive_info" role="grid" id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" cellspacing="0" width="100%">

                                    <thead>
                                    <tr role="row">
                                      <th aria-label="First name: activate to sort column descending" aria-sort="ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting_asc">Etkinlik Adı</th>
                                      <th aria-label="Last name: activate to sort column ascending" style="width: 71px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Kapasite</th>
                                      <th aria-label="Position: activate to sort column ascending" style="width: 152px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Oluşturan</th>
                                      <th aria-label="Office: activate to sort column ascending" style="width: 67px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Başlangıç Tarihi</th>
                                      <th aria-label="Age: activate to sort column ascending" style="width: 29px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Bitiş Tarihi</th><!--
                                      <th aria-label="Start date: activate to sort column ascending" style="width: 67px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Baş. Saati</th>
                                      <th aria-label="Salary: activate to sort column ascending" style="width: 46px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Bit. Saati</th> -->
                                      <th aria-label="Extn.: activate to sort column ascending" style="width: 36px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Etkinlik Ücreti</th>
                                      <th aria-label="E-mail: activate to sort column ascending" style="width: 146px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Kategorisi</th>
                                      <th aria-label="Salary: activate to sort column ascending" style="width: 46px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Adres</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="odd" role="row">
                                      <td class="sorting_1" tabindex="0">Airi</td>
                                      <td>Satou</td>
                                      <td>Accountant</td>
                                      <td>Tokyo</td>
                                      <td>Tokyo</td>
                                      <td>33</td>
                                      <td>5407</td>
                                      <td>a.satou@datatables.net</td>
                                    </tr><tr class="even" role="row">
                                      <td tabindex="0" class="sorting_1">Bradley</td>
                                      <td>Greer</td>
                                      <td>Software Engineer</td>
                                      <td>London</td>
                                      <td>41</td>
                                      <td>Tokyo</td>
                                      <td>2558</td>
                                      <td>b.greer@datatables.net</td>
                                    </tr><tr class="even" role="row">
                                      <td tabindex="0" class="sorting_1">Bradley</td>
                                      <td>Greer</td>
                                      <td>Software Engineer</td>
                                      <td>London</td>
                                      <td>Tokyo</td>
                                      <td>41</td>
                                      <td>2558</td>
                                      <td>b.greer@datatables.net</td>
                                    </tr><tr class="even" role="row">
                                      <td tabindex="0" class="sorting_1">Bradley</td>
                                      <td>Greer</td>
                                      <td>Software Engineer</td>
                                      <td>London</td>
                                      <td>Tokyo</td>
                                      <td>41</td>
                                      <td>2558</td>
                                      <td>b.greer@datatables.net</td>
                                    </tr>
                                    <?php

                                    $sql="";
                                    if($_POST) {
                                      echo "<h3>Aradığınız kelime : ".$_POST['etk_ad_ara']."</h3>";
                                      $sql = "SELECT * FROM etkinlik WHERE etk_ad LIKE '%{$_POST['etk_ad_ara']}%'  ";
                                    }
                                    else{
                                      $sql = "SELECT * FROM etkinlik  ";
                                    }



                                      $rs = mysqli_query($conn, $sql);
                                      while ($row = mysqli_fetch_assoc($rs)) {

                                        $uye_idX=$row['uye_id'];
                                        $sqlUyeId="SELECT * FROM uyeler WHERE uye_id={$uye_idX} ";
                                        $rsUyeId=mysqli_query($conn,$sqlUyeId);
                                        $uye_ad="";
                                        while ($rowUyeId = mysqli_fetch_assoc($rsUyeId)){
                                          $uye_ad=$rowUyeId['uye_ad']." ".$rowUyeId['uye_soyad'];
                                        }

                                        $kat_id=$row['kat_id'];
                                        $sqlKatId="SELECT * FROM kategori WHERE kat_id={$kat_id} ";
                                        $rsKatId=mysqli_query($conn,$sqlKatId);
                                        $kat_ad="";
                                        while ($rowKatId = mysqli_fetch_assoc($rsKatId)){
                                          $kat_ad=$rowKatId['kat_ad'];
                                        }

                                        if($row['etk_ucreti']==0) {
                                          $row['etk_ucreti'] = "Ücretsiz";
                                        }

                                        $sqlAdres="SELECT * FROM adresler WHERE etk_id={$row['etk_id']}";
                                        $rsAdres=mysqli_query($conn,$sqlAdres);
                                        $ulke="";
                                        $il="";
                                        while($rowAdres=mysqli_fetch_assoc($rsAdres)){
                                          $ulke=$rowAdres['adr_ulke'];
                                          $il=$rowAdres['adr_il'];
                                        }

                                        echo "
                                        <tr class=\"even\" role=\"row\">
                                      <td class=\"sorting_1\" tabindex=\"0\"><a href='show_event.php?event={$row['etk_id']}'><i class='glyphicon glyphicon-search'></i>  {$row['etk_ad']}</a></td>
                                      <td>{$row['etk_kapasite']} kişi</td>
                                      <td>{$uye_ad}</td>
                                      <td>{$row['etk_bas_tarihi']}</td>
                                      <td>{$row['etk_bit_tarihi']}</td>
                                      <td>{$row['etk_ucreti']}</td>
                                      <td>{$kat_ad}</td>
                                      <td>{$ulke},{$il}</td>
                                    </tr>
                                        ";
                                      }

                                    ?>
                                    </tbody>
                                  </table>
                                </div></div>
                              </div>

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