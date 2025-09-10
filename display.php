<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            margin: 0;
            color: white;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            background: #0a0a0a; /* Dark background */
        }

        /* Table Styling */
        .mytab {
            border-collapse: collapse;
            width: 95%;
            margin: 2% auto;
            background: rgba(18, 16, 16, 0.85);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(255, 165, 0, 0.4);
        }

        .mytab th {
            padding: 12px;
            background: #ff9900;
            color: black;
            font-weight: bold;
            text-align: center;
        }

        .mytab td {
            padding: 10px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-align: center;
        }

        .mytab tr:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        /* Buttons */
        .delete-btn {
            background-color: red;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .delete-btn:hover {
            background-color: darkred;
        }

        .update-btn {
            background-color: green;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .update-btn:hover {
            background-color: darkgreen;
        }

        /* Modal Styling */
        .modal {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(1);
            width: 350px;
            padding: 20px;
            border-radius: 15px;
            background: rgba(0, 0, 0, 0.85);
            box-shadow: 0px 0px 15px rgba(255, 165, 0, 0.5);
            display: none;
            color: white;
        }

        .modal input {
            width: 90%;
            height: 35px;
            margin-bottom: 15px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255,255,255,0.3);
            text-align: center;
            color: white;
            font-size: 14px;
            border-radius: 5px;
            outline: none;
        }

        .modal input[type="submit"] {
            background: #ff9900;
            color: black;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .modal input[type="submit"]:hover {
            background: #ffaa33;
        }

        .modal button {
            background: none;
            border: none;
            font-size: 18px;
            color: white;
            float: right;
            cursor: pointer;
        }

        .modal button:hover {
            color: red;
        }

       
    </style>
</head>
<body>
  
    <table class="mytab">
      
        <tr>
            <th>ID</th>
            <th>FULL NAME</th>
            <th>ADDRESS</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
            <th>STATE</th>
            <th>IP ADDRESS</th>
            <th>PHONE NUMBER</th>
            <th>ACTION</th>
        </tr>
           
        <?php
        error_reporting(0);
        include "connection.php";
        
        if ($_REQUEST['del']!=NULL) {
            $delsql = "DELETE FROM reg WHERE id =".$_REQUEST['del'];
            mysqli_query($con, $delsql);
        }
        else if($_REQUEST['id']!=NULL){
            $id=$_REQUEST['id'];
            $fullname=$_REQUEST['fullname'];
            $address=$_REQUEST['address'];
            $phonenumbers=$_REQUEST['phonenumbers'];
            $email=$_REQUEST['email'];
            $updsql="UPDATE reg SET fullname='$fullname', address='$address', phonenumbers='$phonenumbers', email='$email' WHERE id=$id";
            mysqli_query($con,$updsql);
        }

        $sql = "SELECT * FROM reg";
        $table = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($table);

        do {
            echo '                           
            <div class="modal" id ="' . $row['id'] . '">
                <button onclick="closemodal(' . $row['id'] . ')">x</button>
                <h3 style="text-align:center; margin-bottom:15px;">Edit Record</h3>
                <center>
                <form>
                    <input type="hidden" name="id" value="' . $row['id'] . '"  >
                    <input type="text"  name="fullname" value="' . $row['fullname'] . '" placeholder="Full Name" required >
                    <input type="text"  name="address" value="' . $row['address'] . '" placeholder="Address" required >
                    <input type="text" name="phonenumbers" value="' . $row['phonenumbers'] . '" placeholder="Phone Number" required >
                    <input type="email" name="email" value="' . $row['email'] . '" placeholder="Email" required ><br>
                    <input type="submit" value="Update">
                </form>
                </center>
            </div>
            <tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['fullname'] . '</td>
                <td>' . $row['address'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['password'] . '</td>
                <td>' . $row['state'] . '</td>
                <td>' . $row['ip'] . '</td>
                <td>' . $row['phonenumbers'] . '</td>
                <td><center>
                    <form action="" method="POST">
                        <button name="del" value="'.$row['id'].'" class="delete-btn">Delete</button>
                        <button type="button" onclick="showmodal(' . $row['id'] . ')" name="upd" value="'.$row['id'].'" class="update-btn">Update</button>
                    </form>
                </center></td>
            </tr>';
        } while ($row = $table->fetch_assoc());
        ?>
    </table>


   
</body>
<script>
    function showmodal(x){
        document.getElementById(x).style.display="block";
    }
    function closemodal(x){
        document.getElementById(x).style.display="none";
    }
</script>
</html>
