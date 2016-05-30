<?php
require_once "config.php";


$user = "";
if (array_key_exists ( "user", $_SESSION )) {
  $user = $_SESSION ['user'];
}
if ($user) {
  echo "zaten daha önceden giriş yapmıştınız...";
  header ( "refresh:2; url=index.php" );
}else{

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Eventory </title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="css/custom.css" rel="stylesheet">
</head>

<body style="background:#F7F7F7;">
<div class="">
  <div id="wrapper">

    <script type="text/javascript">

      function isValid(frm)
      {
        var sifre1 = frm.password.value;
        var sifre2 = frm.password2.value;
        if ( !(sifre1 == sifre2) )
        {
          alert("Girdiğiniz şifreler eşleşmiyor !!");
          return false;
        }
        return true;
      }

    </script>

    <div id="login" class=" form">
      <section class="login_content">
        <form action="control.php" method="post" onsubmit="return isValid(this)">
          <h1>Hesap Oluştur</h1>
          <input type="hidden" name="ref" value="signup">
          <div>
            <input type="email" class="form-control" name="email" placeholder="Email" required="required" />
          </div>
          <div>
            <input type="text" class="form-control" name="fname" placeholder="Ad" required="required" />
          </div>
          <div>
            <input type="text" class="form-control" name="lname" placeholder="Soyad" required="required" />
          </div>
          <div>
           <select class="form-control" required="required" name="cinsiyet">
              <option  value="Erkek">Erkek</option>
              <option  value="Kadın">Kadın</option>
              <option  value="Diğer">Diğer</option>
            </select>
          </div><br>
          <div>
            <input id="password" type="password" class="form-control" name="password" placeholder="Parola giriniz" required="required" />
          </div>
          <div>
            <input id="confirm_password" type="password" class="form-control" name="password2" placeholder="Parolayı tekrar giriniz" required="required" data-validate-pattern="password"/>
          </div>
          <div>
            <input type="text" class="form-control" name="tel" placeholder="Telefon" required="required" />
          </div>
          <div>
            <input type="submit" class="btn btn-default btn-sm submit" value="Üye Ol">
          </div>
          <div class="clearfix"></div>
          <div class="separator">

            <p class="change_link">Zaten üye misin ?
              <a href="login.php" class="to_register"> Giriş Yap </a>
            </p>
            <div class="clearfix"></div>
            <br />
            <div>
              <h1> <img src="images/201.png" height='65px' width='60px'><span style="color: red;font-family:'Showcard Gothic'">Eventory!</span></h1>

              <p>©2016 Tüm hakları saklıdır.<a href="index.php">Eventory</a> </p>
            </div>
          </div>
        </form>



      </section>
    </div>
  </div>
</div>
</body>
</html>