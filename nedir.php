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
                                        Eventory projemiz gezi,sahne sanatları,seminer gibi kategorilere ayrılarak kullanıcıların aradığı etkinliği en kolay
                                    şekilde bulmasına yardımcı olur.
                                    etkinliğe kaydolma,bilet satın alma ve bir de bireysel veya kurumsal olarak etkinlik oluşturabilmektedir.
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
                            <div class="col-md-9">
                                <div class="x_title">
                                    <h3 style="color:#90111A">Kayıtlı kullanıcılar için</h3>
                                    <div class="clearfix"></div>
                                </div>
                                <p>Sistemde kayıtlı kullanıcılarımıza bazı özel avantajlardan yararlanabilirler.</p>
                                    <div class="bs-glyphicons">
                                        <ul class="bs-glyphicons-list">
                                            <li>
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><span class="glyphicon-class">Ücretsiz Etkinlik Ekleme</span>
                                            </li>
                                            <div class="col-md-5">
                                            <p>Oluşturmuş olunan etkinliği sitemize ekleyerek diğer kullanıcıların görebilmesini sağlayabilirsiniz.</p>
                                            </div>
                                            <li>
                                                <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                                                <span class="glyphicon-class">Bilet Satış Hizmeti</span>
                                            </li>
                                            <div class="col-md-4">
                                                <p>Ücretli olan etkinliklere sitemizde aktif bulunan ödeme sistemini kullanabilip biletinizi hemen dakikalar içinde
                                                    alabilirsiniz.</p>
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
                                            <p>Katılımcı formu ile katılımcılardan ad,soyad,tel gibi bilgileri almanızı sağlar.</p>
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
