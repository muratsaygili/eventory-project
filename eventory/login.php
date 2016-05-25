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
        <div id="login" class=" form">
          <section class="login_content">
            <form action="control.php" method="post">
              <h1>Üye Giriş Formu</h1>
              <input type="hidden" name="ref" value="login">
              <div>
                <input type="email" class="form-control" name="email" placeholder="E-mail" required="required"  />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Parola" required="required" />
              </div>
              <div>
                <input class="btn btn-default btn-sm submit" type="submit" class="form-control" value="Giriş Yap">
                <a class="reset_pass" href="#">Şifreni mi unuttun?</a>
              </div>
              <div class="clearfix"></div>
              <div class="separator">

                <p class="change_link">Hesabın yok mu?
                  <a href="signup.php" class="to_register"> Hesap Oluştur </a>
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