<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <style>
    body {
      background: linear-gradient(135deg, #1e1e2f, #151522);
      background-size: 200% 200%;
      animation: floatBg 8s ease-in-out infinite;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
      overflow: hidden;
    }

    /* Background floating animation */
    @keyframes floatBg {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .login-box {
      background: rgba(0, 0, 0, 0.85);
      border: 2px solid #00f0ff;
      padding: 30px 25px;
      border-radius: 15px;
      width: 380px;
      box-shadow: 0 0 25px #00f0ff, 0 0 50px rgba(0,240,255,0.5);
      color: white;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    /* Glow border animation with new colors */
    @keyframes glowBorder {
      0% { box-shadow: 0 0 15px #00ff7f; }
      50% { box-shadow: 0 0 30px #ffcc00; }
      100% { box-shadow: 0 0 15px #00ff7f; }
    }

    .login-box:hover {
      animation: glowBorder 2.5s infinite alternate;
    }

    /* Heading style with gradient animation */
    .login-title {
      font-size: 1.1rem;
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

    /* Input fields */
    .login-box input {
      width: 90%;
      padding: 12px;
      margin: 10px 0;
      border: none;
      outline: none;
      border-radius: 5px;
      font-size: 14px;
      background: rgba(255,255,255,0.1);
      color: white;
      transition: 0.3s;
    }

    .login-box input:focus {
      background: rgba(255,255,255,0.2);
      box-shadow: 0 0 12px #00f0ff;
      transform: scale(1.02);
    }

    .login-box input::placeholder {
      color: #ccc;
    }

    /* Button styling with pulse animation */
    .login-box button {
      width: 60%;
      padding: 12px;
      background: linear-gradient(90deg, #00f0ff, #ff00aa);
      color: #121212;
      font-weight: bold;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      transition: 0.3s;
      margin-top: 10px;
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0% { box-shadow: 0 0 0px rgba(0,240,255,0.6); }
      50% { box-shadow: 0 0 20px rgba(255,0,170,0.8); }
      100% { box-shadow: 0 0 0px rgba(0,240,255,0.6); }
    }

    .login-box button:hover {
      transform: scale(1.08);
      background: linear-gradient(90deg, #ff00aa, #00f0ff);
    }
  </style>
</head>
<body>

  <div class="login-box">
    <div class="login-title">👤 Registration Complete – Sign in to access your account 🔑</div>
    <?php
    error_reporting(0);
    session_start();  //  session created //  automatic  pre set vaure creat ||  field phone , password  value filup througn session 
                       //password and user name password  (unique value  it is a primary key  )automatic  value assignned  for quick login  purpose 
    $msg=$_REQUEST['msg'];
    if ($msg=="f")
        echo '<span style="color:red">⚠️ INCORRECT USERNAME OR PASSWORD ❌</span><br><br>';
    ?>
    <form action="logcheck.php" method="POST">
      <input type="text" name="lemp" value="<?php echo $_SESSION['un']; ?>" placeholder="Enter phone or email" required>
      <input type="password" name="lps" value="<?php echo $_SESSION['ps']; ?>" placeholder="Enter password" required>
      <button type="submit">LOGIN</button>
    </form>
  </div>

</body>
</html>
