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

    if(!$query){
      echo "Error";
    }

    
    $row=mysqli_fetch_assoc($query);

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
  <script type="text/javascript" src="../js/validate_insertion.js"></script>
</head>
<body>

   
	 <div class="container">
  <form method="post" action="updateContent.php" onsubmit="return display()" enctype="multipart/form-data" id="logg" >
  <input type="hidden" name="id" value="<?php echo $row["id"]?>">
    <div id="login-box">

    <div class="logo">
     <img src="../Images/logo.png" id="logoImg" class="img img-responsive img-circle center-block"/>
    </div>
    
    <div class="controls">
        <span  id="error" class="noErrorHappen">*</span></label>
        <h5 style="color: white;">Game name</h5>
        <input class="input--style-4 form-control input-group" type="text" name="game_name" placeholder="Photo Name" id="game_name"/>

        <span  id="error1" class="noErrorHappen">*</span></label>
        <h5 style="color: white;">Choose image</h5>
        <input class="input--style-4 form-control input-group" type="file" name="image" placeholder="Photo Image" id="image"/>

        <span  id="error2" class="noErrorHappen">*</span></label>
        <h5 style="color: white;">Enter date</h5>
        <input  type="date" class="input--style-4 form-control input-group" name="game_date" id="game_date"/>

        <span id="error3" class="noErrorHappen">*</span></label>
        <h5 style="color: white;">Description</h5>
        <textarea class="input--style-4" class="input--style-4 form-control input-group" name="game_desc" id="game_desc" rows="4" cols="41"></textarea>
      
        <button  class="btn-default btn-block btn-custom input-group" name="update" id="insert" type="submit" >Update</button>
        <button type="button" class="btn-default btn-block btn-custom input-group"><a style="text-decoration: none;color:white;" href="javascript:history.go(-1)"  >Home</a></button>
        
  
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