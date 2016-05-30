<?php
/**
 * Created by PhpStorm.
 * User: Murat Saygılı
 * Date: 6.4.2016
 * Time: 14:27
 */
require_once "functions.php";
require_once "config.php";

if($_GET){
  $etk_id=$_GET['event'];

  $sql="SELECT * FROM etkinlik WHERE etk_id={$etk_id} ";
  $rs=mysqli_query($conn,$sql);

  while($etkinlik=mysqli_fetch_array($rs)) {
    $etk_ad = $etkinlik['etk_ad'];
  }



}else{
  header("Location: index.php");
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <?php print getHead("Katılımcı Listesi"); ?>
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- menü başlangıcı -->
          <div class="col-md-3 left_col">
            <?php print getMenu(); ?>
          </div>
        <!-- menü sonu -->
        <!-- üst bölüm -->
        <!-- /üst bölüm sonu -->
        <!-- page content -->
            <div class="right_col" role="main">
              <div class="">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel" style="height:600px;">
                      <div class="x_title">
                        <h2><?php echo $etk_ad; ?> Katılımcıları</h2>
                        <div class="clearfix"></div>
                      </div>


                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2></h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <p class="text-muted font-13 m-b-30">
                      *İletişim için mail atmanızı öneririz..
                      </p>
                            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="datatable-responsive_wrapper">
                              <div class="row">
                                <div class="col-sm-12">
                                  <table style="width: 100%;" aria-describedby="datatable-responsive_info" role="grid" id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" cellspacing="0" width="100%">

                                    <thead>
                                    <tr role="row">
                                      <th aria-label="First name: activate to sort column descending" aria-sort="ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting_asc">Ad Soyad</th>
                                      <th aria-label="Last name: activate to sort column ascending" style="width: 71px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">E-Mail</th>
                                      <th aria-label="Position: activate to sort column ascending" style="width: 152px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Telefon</th>
                                      <th aria-label="Office: activate to sort column ascending" style="width: 67px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Cinsiyet</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sqlListe="SELECT * FROM bilet WHERE etk_id={$etk_id}";
                                    $rsListe=mysqli_query($conn,$sqlListe);
                                    while($rowListe=mysqli_fetch_array($rsListe)){
                                      $rsUye=mysqli_query($conn,"SELECT * FROM uyeler WHERE uye_id={$rowListe['uye_id']}");
                                      $rowUye=mysqli_fetch_array($rsUye);
                                      $ad=$rowUye['uye_ad']." ".$rowUye['uye_soyad'];
                                      $email=$rowUye['uye_email'];
                                      $tel=$rowUye['uye_tel'];
                                      $cinsiyet=$rowUye['uye_cinsiyet'];

                                      echo "
                                      <tr class=\"odd\" role=\"row\">
                                        <td class=\"sorting_1\" tabindex=\"0\">{$ad}</td>
                                        <td>{$email}</td>
                                        <td>{$tel}</td>
                                        <td>{$cinsiyet}</td>
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