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

  $username = $_SESSION['username'];

  $result = mysqli_query($connect, "select * from game where username = '$username'");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Album example · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/album/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/HomeCSS.css">
    

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

  </head>
  <body>

<div style="z-index: 9999;position: absolute;width:100%;">
<div class="navCollection">
    <header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">About</h4>
            <p class="text-muted">These online games focus more on the mechanics of the game versus having intricate artwork. There's shooters, fighting, and platform games that you can enjoy with simplistic animation. </p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
            <h4 class="text-white">Contact</h4>
            <ul class="list-unstyled">
               <li><a href="https://www.Twitter.com/" target="_blank" class="text-white">Follow on Twitter</a></li>
                <li><a href="https://www.Facebook.com/" target="_blank" class="text-white">Like on Facebook</a></li>
                <li><a href = "mailto: abc@example.com" target="_blank" class="text-white">Email me</a></li>
            </ul>
            </div>
            <div class="col-sm-8 col-md-7 py-4">
            <h4 style="display: inline;"><a class="text-white btn btn-danger " role ="button" href="index.php?logout='1'" >Logout</a></h4>
            </div>
        </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
        <a href="index.php" class="navbar-brand d-flex align-items-center">
            <img src="../Images/logo.png" width="50" height="50"  >
            <h5>Album</h5>
        </a>
        <h4 class="navbar-brand d-flex align-items-center">
            <?php echo $_SESSION['username'] ?>
        </h4>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>
    </div>
    </header>
</div>

<main role="main" >

  <section style="margin:10% auto;" class="text-center">
    <div class="container">
      <div style="background:white;border:2px solid rgb(77, 77, 77);border-radius:10px;"> <img src="../Images/logo.png" width="50" height="50"  >
            <h5>Album</h5>
      <p style="margin:2% 5%;" class="lead text-muted"></p>
     <center> <p>
        <a href="index.php" class="btn btn-primary my-2">Home</a>
        <a href="insertGame.php" class="btn btn-primary my-2">Insert Photo</a>
        <?php 
        if($_SESSION['admin']){
          echo '<a href="selectAll.php" class="btn btn-secondary my-2">Show Users</a>' ;
        }
        ?>
        
      </p></center>
    </div>
    </div>
  </section>

  <div style="margin:5% auto;" class="album py-5 ">
    <div class="container">

      <div style="position:relative;" class="row">

      <?php

        while($row=mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $image = $row['game_image'];
            $imageSource = "../Images/".$image;
            $desc = $row['game_disc'];
            $time = $row['post_time'];
            $postUser = $row['username'];
            $name = $row['username'];
            $gamename = $row['game_name'];
            
              echo'<div class="col-md-4">';
                echo'<div class="card mb-4 shadow-sm">';
                 echo'<center><p class="card-text">'; echo $gamename; echo '</p></center>';
                  echo'<img src="'; echo $imageSource; echo '"alt="Bleach" width="100%" height="350" fill="#55595c">';
                    echo'<div class="card-body">';
                        echo'<div class="d-flex justify-content-between align-items-center">';
                        echo'<div class="btn-group">';
                            echo'<button type="button" class="btn btn-sm btn-outline-secondary"><a href="view.php?id=';echo $id; echo'">View</a></button>';
                            echo'<button type="button" class="btn btn-sm btn-outline-secondary"><a href="updateForm.php?id=';echo $id; echo'">Edit</a></button>';
                            echo'<button  type="button" class="btn btn-sm btn-outline-secondary btn btn-danger "><a style="color:#FFFFFF; text-decoration:none;" href="dele.php?id=';echo $id; echo'">Delete</a></button>';
                          echo'</div>';
                          echo'<small class="text-muted">'; echo $time; echo '</small>';
                          echo'</div>';
                        echo'</div>';
                    echo'</div>';
                echo' </div>';


              }
        ?>
        
      </div>
    </div>
  </div>

</main>

<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    <center></p>
    <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p>New to Bootstrap? <a href="https://getbootstrap.com/"><br>Visit the homepage</a> or read our <a href="/docs/4.4/getting-started/introduction/">getting started guide</a>.</p>
    </center>
  </div>
</footer>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
      

  <div id="particles-js"></div>
  <!-- scripts -->
  <script src="../js/particles.min.js"></script>
  <script src="../JS/app.js"></script>

      </body>
</html>

