<?php
/**
 * Created by PhpStorm.
 * User: Murat Saygılı
 * Date: 15.4.2016
 * Time: 18:24
 */

$host     = "localhost";
$user     = "root";
$password = "1234";
$db       ="eventory";


$conn=mysqli_connect($host,$user,$password,$db);


// Check connection
if (mysqli_connect_errno())
{
    echo "MySQL bağlantısı başarısız: " . mysqli_connect_error();
}
mysqli_query($conn,"SET NAMES utf8");
session_start();
//mysqli_close($conn); for closing connection.

?>