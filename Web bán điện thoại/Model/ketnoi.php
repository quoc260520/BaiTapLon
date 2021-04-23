<?php
$dbHost="localhost";
$user="root";
$password="";
$name="baitaplon";

$conn=mysqli_connect($dbHost,$user,$password,$name);

if($conn)
{
    $SetLang=mysqli_query($conn,"SET NAMES utf8");
}
else
{
    echo "kết nối thất bại!!!";
}
?>