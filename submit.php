<?php
session_start();       // seesion activated  // web browse actived ,just cooment cookie creat  
// cookie variable name ....just detemined purpose ......
include "connection.php";

$fn = $_REQUEST['fn']; // Get full name
$ad = $_REQUEST['ad']; // Get address
$em = $_REQUEST['em']; // Get email
$ps = $_REQUEST['ps']; // Get password
$st = $_REQUEST['st']; // Get state
$ip = getenv('REMOTE_ADDR'); // Get client IP
$tm=date("Y-m-d h:i:s A");
$pn=$_REQUEST['pn'];

$_SESSION['fn'] = $fn;
$_SESSION['ad'] = $ad;
$_SESSION['pn'] = $pn;
$_SESSION['ps'] = $ps;

$check="SELECT id  FROM reg WHERE phonenumbers='$pn' OR email='$em';";
$res=mysqli_query($con,$check);
$found=mysqli_fetch_array($res)['id'];
if ($found==NULL)
{
    $sql = "INSERT INTO reg (fullname, address, email, password, state, ip,timeregian,phonenumbers) VALUES('$fn', '$ad', '$em', '$ps', '$st', '$ip','$tm','$pn')";
    unset($_SESSION['ps']);
    mysqli_query($con,$sql);
    header("Location:login.php");
}
else
{
    unset($_SESSION['pn']);
    header("Location:form.php?st=r"); // states creat for checkung purpose ......
}


//$_SESSION['un']=$pn;  // cookie creat DONE, seesion variable creat [seesion name provoded ]
//$_SESSION['ps']=$ps; //  cookie creat DONE ,browse is determined ,username unde specifice value is store and passworg fied  $ps value assingne


//$sql = "INSERT INTO reg (fullname, address, email, password, state, ip,timeregian,phonenumbers) VALUES('$fn', '$ad', '$em', '$ps', '$st', '$ip','$tm','$pn')";
// specific valuse only store useing session variable ....  so,use 
//unset($_SESSION['PS']);

//mysqli_query($con, $sql); // Run SQL insert
//session_destroy();    //  another page before the redirect the session values destoy....all prevoiuse cookie valuse destory logout purpose used 


//header("Location:login.php"); // Redirect to form

?>