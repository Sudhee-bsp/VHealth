<?php
require_once('config.php');
require_once('core/controller.Class.php');
// include('./server.php');

?>
<!DOCTYPE html>
<html>

  <head>
    <link rel="icon" href="./logo1.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>V-Health</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <!--jQuery library-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--Latest compiled and minified JavaScript-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Custom CSS -->
    <link href="style1.css" rel="stylesheet" />
  </head>

  <body>
    <?php 
      if(isset($_COOKIE['id']) && isset($_COOKIE['sess'])){
        $Controller = new Controller;
        if($Controller -> checkUserStatus($_COOKIE['id'], $_COOKIE['sess'])) {
    ?>
    <div
      class="navbar navbar-inverse navbar-fixed-top"
      style="background-color: #120E43"
    >
      <div class="container-fluid">
        <div class="navbar-header">
          <button
            type="button"
            class="navbar-toggle"
            data-toggle="collapse"
            data-target="#myNavbar"
          >
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="" style="font-size: 45px; color: white; margin: 8px 0 0 12px;">
            V-Health
          </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            
            <li>
              <a href="./covid.php">
              <button class="btn b1" style="margin-top: 0px; margin-right: -10px; background-color: #5DA3FA">
                <p id="demo" style="color: white">COVID data</p>
              </button>
              </a>
            </li>

            <li>
              <a href="./availability.php">
              <button class="btn b1" style="margin-top: 0px; margin-right: -10px; background-color: #5DA3FA">
                <p id="demo" style="color: white">Hospitals</p>
              </button>
              </a>
            </li>

            <li>
              <a href="logout.php" style="font-size: 40px; margin-top: 0px; color: white">
                <span class="glyphicon glyphicon-log-out"></span>
              </a>
            </li>

          </ul>
        </div>
      </div>
    </div>
    
    <div class="col-sm-10 col-sm-offset-1 above">
      <h1 style="color: green">Hello, <?php echo $Controller -> printData(intval($_COOKIE['id']));?> !</h1>
    </div> 
    
    <br>
    <footer>Developed by VITShiners</footer>
  </body>


<!-- ----------------------------If not logged-in, then below loginpage---------------------- -->


  <?php }       
    } else{ 
  ?>

    <body style="background-color: #207398;">
      <div class="container">
        <div class="row row_style">
          <div class="col-xs-8">
            <div class="login-div">
              <form>
                <div class="logo"></div>
                <div class="sub-title">V-Health</div>
                <div class="fields"></div>
                <button onclick="window.location = '<?php echo $login_url; ?>'" type="button"  class="loginin-button">
                  Login via Google
                </button>
                <div class="link">
                 <p>Serving with CARE & pleasure!</p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <footer> Developed by VITShiners </footer>
    </body>
  <?php } ?>
    
</html>
