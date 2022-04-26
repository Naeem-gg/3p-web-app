<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malegaon Business Hub</title>
    <style>
        body{
            background-color: #403B4A;
        }
        .d1{
            height:400px;
            width:378px;
            background-color: #59555b;
            margin:0px auto;
            border-radius: 5%;
            margin-top: 150px;
            -webkit-box-shadow: 0 0 10px #fff;
                 box-shadow: 0 0 10px #fff;
            border: 2px solid blue;

        }
        .tx{
            height:40px;
            width:320px;
            margin:25px;
            border-radius: 25px;
            text-align: center;
            font-size: 25px;
            border: none;
            color: #2f2833;

            
        }
        .h{
            text-align: center;
            padding-top: 25px;
            font-size: 30px;
            color: whitesmoke;
            text-shadow: 5px 5px 5px blue;



        }

        
        .btn-grad {background-image: linear-gradient(to right, #403B4A 0%, #E7E9BB  51%, #403B4A  100%)}
         .btn-grad {
            margin: 10px;
            padding: 15px 45px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;            
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
            display: block;
            font-size:25px;
            margin:0px auto;
            margin-top: 35px;
            border: none;

          }

          .btn-grad:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
          }
         
    </style>
</head>
<body>
    <h1 class="h" style="font-size:50px;">Malegaon Business Hub</h1>
    <form method="post">
    <div class="d1">
        <div style="border: solid 2px white ; height:99%; border-radius: 21px;">
            <h3 class="h">Check Password</h3>
            <input class="tx" type="text" placeholder="6 Digit" size="6" name="pass"><br>
            <input class="btn-grad" type="submit" value="Submit" name="sub">

            <!-- <?php
                if(isset($_POST['sub']))
                {
                    if(isset($_POST['pass']))
                    {
                        $pass=$_POST['pass'];
                        if($pass==="123456")
                        {
                            echo"<p style='color:white; text-align:center;'>Your Password is right.</p>";
                        }
                        else{
                            echo"<p style='color:white; text-align:center;'>Your Password is wrong.</p>";

                        }

                    }
                }
            ?> -->
        </div>
    </div>
    </form>
    
</body>
</html>
    <?php
        if(isset($_POST['sub']))
        {
            try 
            {
                $server="localhost";
                $user="naeem";
                $pass="Navjivan";
                $db="mbh";
                $conn=new mysqli($server,$user,$pass,$db);
                if($conn->connect_error)
                {
                    die("ERROR! while connecting to $db".$conn->connect_error);
                }    
                else
                {
                    // echo "Connection successfull";
                    $passw=$_POST['pass'];
                    $q="SELECT * FROM users WHERE pass=$passw";
                    $result=$conn->query($q);
                    print_r($result);
                    if($result->num_rows>0)
                    {   if($passw===($result->fetch_assoc())['pass'])
                        {
                            $_SESSION['pass']=$passw;
                            header("Location:new.php");
                        }
                        else
                        {
                                echo "something";
                        }
                        // echo "<table border=1 cellspacing=0 cellpadding=10>";
                        // echo "<tr><th>Name</th><th>number</th><th>Email</th></tr>";
                        // while($rows=$result->fetch_assoc())
                        // {
                        //     echo "<tr>";
                        //     echo "<td>".$rows['name']."</td><td>".$rows['mobile']."</td><td>".$rows['email']."</td>";
                        //     echo "</tr>";
                        // }
                        
                        // echo "</table>";
                    }
                    else
                    {
                        header("Location:scanned.php");
                    }
                }
            }
            catch (Exception $th) 
            {
                echo $th->getMessage();
            }
        }
        ?>
