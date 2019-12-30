
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
?>

<?php
$id = $_GET['id'];
$uname = $_GET['username'];
$con = mysqli_connect('localhost', 'root', '', 'registration');

mysqli_select_db($con,"registration");

$q=mysqli_query($con,"select * from users where id=".$id);

?>


<!DOCTYPE html>
<html>
<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<body>
  <title>Update system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="../CSS/formStyle.css">
  <script type="text/javascript" src="../js/validate_update.js"></script>
</head>

  <div class="container">
  <form onsubmit="return display()" action="update_ok.php" method="post" id="logg">
  	<div id="login-box">
    <div class="logo">
     <img src="../Images/logo.png" id="logoImg" class="img img-responsive img-circle center-block"/>
    </div>
    <div class="controls">
      <span id="error" class="noErrorHappen">*</span></label>
      <h5 style="color: white;">Username</h5>
      <input type="text" name="username" placeholder="Username" id="username" class="form-control input-group" >

      <span id="error1" class="noErrorHappen">*</span></label>
      <h5 style="color: white;">Email</h5>
      <input type="email" name="email" placeholder="E-mail" id="email" class="form-control input-group" >

      <span id="error2" class="noErrorHappen">*</span></label>
      <h5 style="color: white;">password</h5>
      <input type="password" placeholder="Password" name="password_1" id="password_1" class="form-control input-group">

      <input type="hidden" name="id" value="<?php echo $id?>">
      <input type="hidden" name="uname" value="<?php echo $uname?>">
      <button type="submit" class="btn-default btn-block btn-custom input-group" name="update">Update</button>
      <button type="button" class="btn-default btn-block btn-custom input-group"><a style="text-decoration: none;color:white;" href="home.php"  >Home</a></button>
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