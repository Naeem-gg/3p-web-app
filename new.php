<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <style>
        body{
            background-color: #403B4A;
            color: white;
        }
        .h{
            text-align: center;
            padding-top: 25px;
            font-size: 30px;
            color: whitesmoke;
            text-shadow: 5px 5px 5px blue;



        }
    </style>
    <title>Access Granted!</title>
</head>

<body>
<h1 class="h" style="font-size:50px;">Malegaon Business Hub</h1>
<h2 class="h">29-04-2022</h2>
    <br><br><br><br>
    <div class="container alert alert-success" role="alert">
        <h4 class="alert-heading" align="center">Access granted!</h4>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium, tenetur perferendis provident ea
            officiis eveniet, reiciendis nesciunt magnam odit ex id distinctio voluptate incidunt quisquam? Assumenda
            rerum possimus quasi atque temporibus autem dignissimos ullam consequuntur repellendus ut vitae maiores
            deleniti facilis, laudantium voluptas. Quas quos molestias ex necessitatibus saepe dicta.</p>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
    </div>
    <?php
        if(isset($_SESSION['pass']))
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
                    $passw=$_SESSION['pass'];
                    $q="SELECT * FROM users WHERE pass=$passw";
                    $result=$conn->query($q);
                    // print_r($result);
                    if($result->num_rows>0)
                    {  
                        echo "<div class='container mt-5  '>
                        <table class='table table-striped' style='text-align: center;'>";
                        echo "<thead>
                        <tr>
                       
                            <th scope='col'>Name</th>
                            <th scope='col'>Mobile number</th>
                            <th scope='col'>Email</th>
                        </tr>
                    </thead>";
                        while($rows=$result->fetch_assoc())
                        {
                            echo "<tbody><tr>";
                            echo "<td>".$rows['name']."</td><td>".$rows['mobile']."</td><td>".$rows['email']."</td>";
                            echo "</tr></tbody>";
                        }
                        
                        echo "</table></div>";
                    }
                    else
                    {
                        echo "No data to retrive";
                    }
                }
            }
            catch (Exception $th) 
            {
                echo $th->getMessage();
            }
        }
        ?> 
        
            
            
            
        
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>