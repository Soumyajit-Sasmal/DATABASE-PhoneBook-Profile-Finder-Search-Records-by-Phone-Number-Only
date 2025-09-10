<html>
<head>
    <title>MySQLREGISTATION FORM CREAT </title>
    <style>
        body {
            margin: 0;
            background-color: #080b18; /* Solid deep blue */
            font-family: Arial, sans-serif;
            height: 100vh;
        }

        @keyframes borderGlow {
            0% { border-color: #ff9f1c; box-shadow: 0 0 10px #ff9f1c; }
            50% { border-color: #00f5d4; box-shadow: 0 0 20px #00f5d4; }
            100% { border-color: #ff4040; box-shadow: 0 0 10px #ff4040; }
        }

        .myform {
            width: 25vw; /* Smaller width */
            background: rgba(255,255,255,0.05);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            border-radius: 1.5vw;
            padding: 1.5vw; /* Smaller padding */
            backdrop-filter: blur(10px);
            border: 3px solid #ff9f1c;
            animation: borderGlow 3s infinite alternate;
        }

        .myform input, select {
            margin-top: 0.6vw;
            width: 90%;
            background: rgba(255,255,255,0.15);
            border: none;
            text-align: center;
            color: white;
            padding: 0.6vw;
            border-radius: 0.5vw;
            font-size: 0.9rem; /* Slightly smaller font */
            outline: none;
            transition: 0.3s;
        }

        .myform input:focus, .myform select:focus {
            background: rgba(255,255,255,0.25);
            transform: scale(1.05);
        }

        .myform input[type="submit"] {
            background: linear-gradient(90deg, #ff9f1c, #ff4040);
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .myform option {
            background-color: black;
            color: white;
        }

        .show {
            margin-top: 0.8vw;
            width: 85%;
            background: linear-gradient(90deg, #00f5d4, #00bbf9);
            border: none;
            text-align: center;
            color: black;
            padding: 0.6vw;
            border-radius: 0.8vw;
            cursor: pointer;
            font-weight: bold;
            font-size: 0.9rem;
            transition: 0.3s;
        }

        .show:hover {
            transform: scale(1.05);
            background: linear-gradient(90deg, #00bbf9, #00f5d4);
        }
      /* Heading style with gradient animation */
    .regtitle {
      font-size: 1.3vw;
      margin-bottom: 15px;
      font-weight: bold;
      background: linear-gradient(90deg, #ff9f1c, #ff4040, #ff00aa, #00f0ff);
      background-size: 300% 300%;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: gradientText 6s ease infinite;
    }
    @keyframes gradientText {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

      
    </style>
</head>
<body>
    <form class="myform" action="submit.php" method="post">
        <div class="regtitle">👨‍💻 If you’re not an existing user, kindly register here– Start Your Journey.✨</div>
        <center>
            <?php 
            error_reporting(0); 
            session_start();   
            if ($_GET['st']=='r')   //satate code, submit.php which is else part supply  this page 
                echo '<font color="red"> 🔒 Duplicate Credentials ❌</font><br><br>'; 
            else{
                session_destroy();
            }
            ?>
            <input type="text" name="fn" value="<?php echo $_SESSION['fn'];?>" placeholder="Enter fullname" maxlength="50" required><br>
            <input type="text" name="ad" value="<?php echo $_SESSION['ad'];?>" placeholder="Enter address" maxlength="100" required><br>
            <input type="email" name="em" placeholder="Enter email" required><br>
            <input type="password" onchange="checkps()" value="<?php echo $_SESSION['ps'];?>" id="ps" minlength="8" name="ps" maxlength="15" placeholder="Enter password" required><br>
            <input type="password" onchange="checkps()" id="cps" minlength="8" name="cps" maxlength="15" placeholder="Enter confirm password" required><br>
            <div onclick="toggleps()" class="show">Show Password</div>
            <input type="text" name="pn" value="<?php echo $_SESSION['pn'];?>" placeholder="Enter phone number" maxlength="15" required><br>
            <select name="st">
                <option value="none">----- Select Country -----</option>
                <option value="WB">West Bengal</option>
                <option value="PN">Punjab</option>
                <option value="TN">Tamilnadu</option>
                <option value="AP">Andhra Pradesh</option>
                <option value="OD">Odisha</option>
            </select><br>
            <input id="reg" type="submit" value="REGISTER HERE" style="display:none"><br>
        </center>
    </form>
</body>
<script>
    var t=1;
    function checkps(){
        var ps = document.getElementById('ps').value;
        var cps = document.getElementById('cps').value;  // 2 fied value same  or nor check ....
        if(ps == cps){
            document.getElementById('cps').style.cssText="background-color:rgba(0,255,0,0.4)";
            document.getElementById('ps').style.cssText="background-color:rgba(0,255,0,0.4)";
            document.getElementById('reg').style.cssText="display:block";
        }
        else{
            document.getElementById('cps').style.cssText="background-color:rgba(255,0,0,0.4)";
            document.getElementById('ps').style.cssText="background-color:rgba(255,0,0,0.4)";
            document.getElementById('reg').style.cssText="display:none";
        }
    }

    function toggleps(){
        t = t * (-1);
        if (t > 0){
            document.getElementById('ps').type = "password";
            document.getElementById('cps').type = "password";
        } else {
            document.getElementById('ps').type = "text";
            document.getElementById('cps').type = "text";
        }
    }
</script>
</html>
