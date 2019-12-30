
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

    $id=$_GET["id"];

    $query=mysqli_query($connect,"select * from game where id=".$id);

    if($query){
    }
    else{
        echo "Error";
    }
    
    $row=mysqli_fetch_assoc($query);

    if(isset($_POST['dele']))
    {

    $id=$_GET["id"];

    $query=mysqli_query($connect,"delete from game where id=".$id);

    if($query){
       header("location: home.php");
    }
    else{
        echo "Error";
    }


    }
     mysqli_close($connect);

?>
<!DOCTYPE html>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="../CSS/formStyle.css">
  <script type="text/javascript" src="../JS/validate_insertion.js"></script>
</head>
<body>

   
   <div class="container">
  <form method="post" onsubmit="return display()" enctype="multipart/form-data" id="logg" >
    <div id="login-box">

     <div class="logo">
      <!-- logo here -->
    </div>
    
    <div class="controls">
    
      <!-- <input type="text" name="username" placeholder="Username" class="form-control input-group"  > -->
      <?php
      $image = "../Images/".$row['game_image'];
        ?>
        <label class="input--style-4 form-control input-group" type="text" name="game_name" id="game_name"><?php echo $row['game_name'] ?></label>
        <img src=<?php echo $image; ?>  alt="Bleach" width="100%" height="350" fill="#55595c">

        <label class="input--style-4 form-control input-group" type="file" name="game_disc" id="game_disc">des: <?php echo $row['game_disc'] ?></label>

        <label class="input--style-4 form-control input-group" type="file" name="image_date" id="image_date">time: <?php echo $row['post_time'] ?></label>
        <button  class="btn-default btn-block btn-custom input-group" name="dele" id="dele" type="submit" >Delete</button>

        
        
  
    </div>
  </div>
  </form>
</div>
  <div id="particles-js"></div>



<script >
  $.getScript("https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js", function(){
    particlesJS('particles-js',
      {
        "particles": {
          "number": {
            "value": 80,
            "density": {
              "enable": true,
              "value_area": 800
            }
          },
          "color": {
            "value": "#ffffff"
          },
          "shape": {
            "type": "circle",
            "stroke": {
              "width": 0,
              "color": "#000000"
            },
            "polygon": {
              "nb_sides": 5
            },
            "image": {
              "width": 100,
              "height": 100
            }
          },
          "opacity": {
            "value": 0.5,
            "random": false,
            "anim": {
              "enable": false,
              "speed": 1,
              "opacity_min": 0.1,
              "sync": false
            }
          },
          "size": {
            "value": 5,
            "random": true,
            "anim": {
              "enable": false,
              "speed": 40,
              "size_min": 0.1,
              "sync": false
            }
          },
          "line_linked": {
            "enable": true,
            "distance": 150,
            "color": "#ffffff",
            "opacity": 0.4,
            "width": 1
          },
          "move": {
            "enable": true,
            "speed": 6,
            "direction": "none",
            "random": false,
            "straight": false,
            "out_mode": "out",
            "attract": {
              "enable": false,
              "rotateX": 600,
              "rotateY": 1200
            }
          }
        },
        "interactivity": {
          "detect_on": "canvas",
          "events": {
            "onhover": {
              "enable": true,
              "mode": "repulse"
            },
            "onclick": {
              "enable": true,
              "mode": "push"
            },
            "resize": true
          },
          "modes": {
            "grab": {
              "distance": 400,
              "line_linked": {
                "opacity": 1
              }
            },
            "bubble": {
              "distance": 400,
              "size": 40,
              "duration": 2,
              "opacity": 8,
              "speed": 3
            },
            "repulse": {
              "distance": 200
            },
            "push": {
              "particles_nb": 4
            },
            "remove": {
              "particles_nb": 2
            }
          }
        },
        "retina_detect": true,
        "config_demo": {
          "hide_card": false,
          "background_color": "#b61924",
          "background_image": "",
          "background_position": "50% 50%",
          "background_repeat": "no-repeat",
          "background_size": "cover"
        }
      }
    );

});

</script>


</body>
</html>