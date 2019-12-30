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

        
    $id = $_GET['id'];

    


    #sql query to insert into database
    $query = "DELETE FROM game WHERE id = $id";

    if(mysqli_query($connect,$query)){

        header("Location: index.php");
    }



?>