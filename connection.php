<html>
    


<body>
  

    <div class="message">
     <?php
    date_default_timezone_set("asia/calcutta");
$sn="localhost";
$un="root";
$ps="";
$dn="entry";
$con=new mysqli($sn,$un,$ps,$dn);
if ($con->connect_error)
    echo " Connection failed";
else
    echo "<span style='color:yellow'>"  .  date('Y-m-d  H:i:s A'). "<span> "  ."<span style='color: #a0a0a0'>connection established <span> <br>  <span style='color:lime'>".$dn."database <span style='color:red'> Active <span> <span>";
?>
</div>
  

</body>
</html>


