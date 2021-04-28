<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <!--jQuery library--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--Latest compiled and minified JavaScript--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
        th{
            border:1px solid white;
            padding:10px;
            text-align:center;
            background-color: rgb(216,31,42);
            color:white;
        }
        td{
            border:1px solid gray;
            text-align:center;
            padding:5px;
        }
    </style>
</head>
<body>
<div id="donor">
    <div class="container" >
        <div class="thumbnail">
            <h3>BLOOD AND PLASMA DONATION CENTERS</h3>
            <div class="row text-center">
                <div class="col-sm-6">
                    <form action="sort.php" method="POST">
                        <div style="margin-top:30px;float:left;">
                            <label for="location">Enter your Location: </label>
                            <input type="text" name="location" required = "true">
                            <button type="submit" name="search" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3">
                    <?php 
                        if(isset($_POST['search'])){ ?>
                        <img src="img/blood.png" alt="" width="200" height="200">
                        <?php if($_POST['location']=='Guntur'){?>
                        <h4>Blood Banks:</h4>
                        <p>1. Rainbow Blood Bank</p>
                        <p>2. NTR Trust Blood Bank</p>
                        <p>3. Red Cross Blood Bank</p>
                        <?php } else{?>
                        <h4>Blood Banks:</h4>
                        <p>1. SunFlowers</p>
                        <p>2. Charity Trust Co. </p>
                        <p>3. Nirmala BloodCentre</p>
                    <?php }}?>
                </div>
                <div class="col-sm-3">
                    <?php 
                    if(isset($_POST['search'])){ ?>
                    <img src="img/plasma.jpg" alt="" width="200" height="200">
                    <?php if($_POST['location']=='Guntur'){?>
                        <h4>PLASMA CENTERS:</h4>
                        <p>1. IDonate Organization</p>
                        <p>2. Indian RedCross Society</p>
                        <p>3. NTR Bhavan</p>
                        <?php } else{?>
                        <h4>PLASMA CENTERS:</h4>
                        <p>1. AirCross co.</p>
                        <p>2. WhiteCentre</p>
                        <p>3. Trusty Centre</p>
                    <?php }}?>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="donor">
    <div class="container" >
        <div class="thumbnail">
            <h3>NUTRIENTS</h3>
            <div class="row text-center">
                <div class="col-sm-5">
                    <form action="sort.php" method="POST">
                        <div style="margin-top:30px;float:left;">
                            <label for="location">Enter Food Item: </label>
                            <input type="text" name="location" required = "true">
                            <button type="submit" name="find" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-7">
                    <?php 
                        if(isset($_POST['find'])){ ?>
                        <table>
                        <tr>
                            <th>Carbohydrates</th>
                            <th>Fat</th>
                            <th>Proteins</td>
                            <th>Calories</td>
                            <th>Sugars</td>
                            <th>Fiber</td>
                            <th>Calcium</td>
                        </tr>
                        <tr>
                            <td>2.6</td>
                            <td>19.3</td>
                            <td>11.5</td>
                            <td>230</td>
                            <td>0</td>
                            <td>0</td>
                            <td>11</td>
                        </tr>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>