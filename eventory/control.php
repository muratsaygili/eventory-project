<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Control</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
</head>
<?php
/**
 * Created by PhpStorm.
 * User: Murat Saygılı
 * Date: 2.5.2016
 * Time: 02:20
 */
require_once 'config.php';

$ref=$_POST['ref'];

if($ref=="login"){ // login sayfasından gelindiyse login işlemleri
    $email=$_POST['email'];
    $password=$_POST['password'];

    $rs=mysqli_query($conn,"SELECT * FROM uyeler WHERE uye_email='$email' AND uye_pass='$password' ");


    if(mysqli_num_rows($rs)>0){
        $user=$_SESSION['user']=$email;
        header("Location: index.php");
    }else {
        echo "<h1>Kullanıcı adı veya parola hatalı..</h1>";
        header("refresh:1; url=login.php");
    }
}else if($ref=="signup"){ // signup sayfasından gelindiyse üye kayıt işlemleri
    $email=$_POST['email'];
    $password=$_POST['password'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $cinsiyet=$_POST['cinsiyet'];
    $tel=$_POST['tel'];

    $sql="INSERT INTO uyeler (uye_email,uye_pass,uye_ad,uye_soyad,uye_tel,uye_cinsiyet) VALUES ('$email','$password','$fname','$lname','$tel','$cinsiyet')";
    $rs=mysqli_query($conn,$sql);

    if($rs){
        echo "kayıt başarılı !!";
        header("refresh:1; url=login.php");
    }else{
        echo "kayıt başarısız. Zaten daha önce üye olmuşsunuz".mysqli_error($conn);
    }
    header("refresh:1; url=login.php");


}else{
    header("Location: page_404.php");
}











?>

