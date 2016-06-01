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
    <?php print getHead("Ne Nedir,Ne Yapar?"); ?>
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
                            <div class="col-md-9">
                                <div class="x_title">
                                    <h3 style="color:#90111A">Ne Nedir,Ne Yapar?</h3>
                                    <div class="clearfix"></div>
                                </div>
                                <p>
                                    Eventory.com.tr konferans, eğitim, sahne sanatları, fuar, gezi gibi birçok türde etkinlikler bulabileceğiniz bir platformdur.

                                </p>

                                <ol>
                                    <li><b>Kişi ve markaları takip edin:</b> Etkinliğini kaçırmak istemediğiniz kişileri, grupları ve organizatör firmalarını takip edin, etkinliklerini kaçırmayın.(Projenin ilerleyen sürümlerinde)</li>
                                    <li><b>Etkinlik önerileri alın :</b> "Pop müzik, Asp.Net, Biyoteknoloji, Finans” gibi birçok konudan ilgi alanınıza girenleri seçin. İlgi alanınıza giren bir etkinlik olduğunda size haber verelim.(Projenin ilerleyen sürümlerinde) </li>
                                    </ol>
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
                            <div class="col-md-9">
                                <div class="x_title">
                                    <h3 style="color:#90111A">Kayıtlı kullanıcılar için</h3>
                                    <div class="clearfix"></div>
                                </div>
                                <p></p>
                                    <div class="bs-glyphicons">
                                        <ul class="bs-glyphicons-list">
                                            <li>
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><span class="glyphicon-class">Ücretsiz Etkinlik Ekleme</span>
                                            </li>
                                            <div class="col-md-5">
                                            <p>Organize ettiğiniz etkinliğinizi hedef kitlenize ücretsiz olarak duyurmak için sitemize eklemeniz yeterli.</p>
                                            </div>
                                            <li>
                                                <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                                                <span class="glyphicon-class">Bilet Satış Hizmeti</span>
                                            </li>
                                            <div class="col-md-4">
                                                <p>Eventory.com.tr altyapısını kullanarak bilet satışı yapmak istiyorsanız tek yapmanız gereken ücretini belirlemek!(Paypal hizmetleri aktif olmadığı için şu anda bu hizmeti veremiyoruz.)</p>
                                            </div>
                                        </ul>
                                    </div>
                                <div class="bs-glyphicons">
                                    <ul class="bs-glyphicons-list">
                                        <li>
                                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                            <span class="glyphicon-class">Katılımcı Kaydı Alma</span>
                                        </li>
                                        <div class="col-md-5">
                                            <p>Katılımcı listesi özelliği, etkinliğinize katılan katılımcılardan isim, telefon, mail gibi bilgileri almanızı sağlar.</p>
                                        </div>
                                    </ul>
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
