<?php
/**
 * Created by PhpStorm.
 * User: yunus
 * Date: 15.05.2016
 * Time: 03:03
 */
require_once "functions.php";
require_once "config.php";

if ($_POST){

    $res=mysqli_query($conn,"SHOW TABLE STATUS FROM eventory LIKE 'user_message' "); //son AI değerini aldık
    $row=mysqli_fetch_array($res);
    $mess_id=$row['Auto_increment'];
    $fna =  $_POST['fname'];
    $lna = $_POST['lname'];
    $ema=$_POST['email'];
    $numara=$_POST['no'];
    $webs=$_POST['website'];
    $mess=$_POST['message'];
    $sql="INSERT INTO user_message(message_id,fname,lname,email,no,website,message)
 VALUES ('$mess_id','$fna','$lna','$ema','$numara','$webs','$mess')";
    $rs=mysqli_query($conn,$sql);
    if ($rs){
        echo "mesaj iletildi ...";
        header("refresh:1; url=iletisim.php");
    }
    else{
        echo "mesajınız iletilmedi.!!!";
        header("refresh:1; url=page_404.php");
    }
}
else{
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php print getHead("İletişim"); ?>
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
                        <div class="x_panel">

                            <div class="x_content">

                                <div id="iletisim" class="form">
                                    <form  validate="" action="iletisim.php" method="post" class="form-horizontal form-label-left" >
                                        <span class="section" style="color: #90111A">İletişim Formu</span>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Ad<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="fname" class="form-control col-md-7 col-xs-12" name="fname" required="required" type="text">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Soyad<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="lname" class="form-control col-md-7 col-xs-12"  name="lname" required="required" type="text">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">E-mail<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" type="email" id="email" required="required" name="email" >
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Telefon <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="tel"  name="no" length="10" maxlength="10" required="required"  class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="item form-group" >
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Web sayfa URL'niz</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="url" id="website" name="website" placeholder="https://www.websiteniz.com" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mesajınız <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea id="message" required="required" name="message" placeholder="Lütfen mesajınızı kısa bir şekilde yazın" class="form-control col-md-7 col-xs-12"></textarea>
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <button type="submit" class="btn btn-success">Gönder</button>
                                            </div>
                                        </div>
                                    </form>
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
