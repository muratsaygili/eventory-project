<?php
/**
 * Created by PhpStorm.
 * User: Murat Saygılı
 * Date: 3.5.2016
 * Time: 00:50
 */

require_once "config.php";
$user = "";
if (array_key_exists ( "user", $_SESSION )) {
    $user = $_SESSION ['user'];
}

if($user){
    session_destroy();
    header("Location: login.php");
}
else{
    echo "Oturum açık değil, yönlendiriliyorsunuz..";
    header("refresh:2; url=login.php");
}
?>
</body>
</html>