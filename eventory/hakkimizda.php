<?php
/**
 * Created by PhpStorm.
 * User: yunus
 * Date: 15.05.2016
 * Time: 02:25
 */
require_once "functions.php";
require_once "config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php print getHead("Hakkımızda"); ?>
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

                            <div class="col-md-6">
                                <div class="x_title">
                                    <h3 style="color:#90111A">Hakkımızda</h3>
                                    <div class="clearfix"></div>
                                    
                                </div>
                                <p>
                                    Eventory.com 2016 yılının başlarında geliştirmeye başlatıldı.
                                    Projenin temel amaçlarından biri etkinliği sanal ortamda yaymak amacı için oluşturuldu. Sistemde üyeliği olan her kişiye etkinlik oluşturma hakkı sunulmaktadır.

                                </p>
                                <p> Üye olan kişi profil sayfasından oluşturmuş olduğu etkinlikleri ve katılmış olduğu etkinlikleri görebilmektedir.
                                Projemizde herhangi bir etkinliği arama işlemi yapabilir ve etkinlik hakkında bilgi sahibi olabilir.
                                </p>
                                <p>
                                    Projemiz hala gelişme aşamasındadır. Herhangi bir soru ya da sorunla karşılaşıldığında iletişim sayfamızdan
                                    bizlere ulaşabilir ve mesajınızı iletebilirsiniz.
                                </p>
                            </div>

                            <div class="col-md-3">
                                <div class="x_title">
                                    <h3 style="color: #90111A"><i class="glyphicon glyphicon-new-window"></i> Bağlantılar</h3>
                                    <div class="clearfix"></div>
                                </div>
                                    <p><a href="hakkimizda.php"> Hakkımızda</a></p>
                                    <p><a href="nedir.php" >  Ne nedir,Ne yapar</a ></p >
                                    <p><a href = "iletisim.php" > İletişim </a ></p >
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->





        <!-- footer content start -->
        <?php print getFooter(); ?>
