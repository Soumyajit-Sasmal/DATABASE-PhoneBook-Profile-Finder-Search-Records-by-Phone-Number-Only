<?php
include "connection.php";
$lemp=$_REQUEST['lemp'];
$lps=$_REQUEST['lps'];
$sql="SELECT id FROM reg WHERE email='$lemp' AND password='$lps' OR phonenumbers='$lemp' AND password='$lps'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
if ($row['id']!=NULL)
    header("Location:https://github.com/Soumyajit-Sasmal");
else
    header("Location:login.php?msg=f");
?>  