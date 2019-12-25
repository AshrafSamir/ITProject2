<?php

    $connect = mysqli_connect("localhost", "root", "", "registration");

    if (isset($_POST['update'])){
        
        $id = $_POST['id'];
        $game_name=$_POST["game_name"];
        $game_date=$_POST["game_date"];
        $game_desc=$_POST["game_desc"];
        $file;
        
        if(isset($_FILES['image'])){
            $file =  $_FILES['image']['name'];
        }

        $target_dir = "../Images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        #sql query to insert into database
       $query = "UPDATE game SET game_name = '$game_name', ";
       $query .= "post_time = '$game_date', ";
       $query .= "game_disc = '$game_desc' ,";
       $query .= " game_image = '$file' WHERE id = $id";

        if(mysqli_query($connect,$query)){
    
            header("Location: index.php");
        }

        }

?>