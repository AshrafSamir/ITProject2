
<?php

    session_start(); 

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: login.php");
    }

    $connect = mysqli_connect("localhost", "root", "", "registration");

    if (isset($_POST['insert'])){

        $game_name=$_POST["game_name"];
        $game_date=$_POST["game_date"];
        $game_desc=$_POST["game_desc"];
        $username = $_SESSION['username'];
        $file;
        
        if(isset($_FILES['image'])){
            $file =  $_FILES['image']['name'];
        }

        $target_dir = "../Images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        #sql query to insert into database
        $query = "insert into game";
        $query .= "(game_name, game_image, game_disc, post_time, username)";
        $query .= " values('$game_name', '$file', '$game_desc', '$game_date', '$username')";

        if(mysqli_query($connect,$query)){
    
        echo "File Sucessfully uploaded";
        }
        else{
            echo "Error";
        }
        }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">NEW GAME</h2>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">game name</label>
                                    <input class="input--style-4" type="text" name="game_name" id="game_name"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Game Image</label>
                                    <input class="input--style-4" type="file" name="image" id="image"/>
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Date</label>
                                    <div class="input-group-icon">
                                        <input  type="date" name="game_date" id="game_date"/>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                            <label class="label">Description</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                            <textarea class="input--style-4" name="game_desc" id="game_desc" rows="4" cols="50"></textarea>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" name="insert" id="insert" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="../vendor/select2/select2.min.js"></script>
    <script src="../vendor/datepicker/moment.min.js"></script>
    <script src="../vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="../JS/global.js"></script>
    <script src="../JS/validate_insertion.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->