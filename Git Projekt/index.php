<?php 

session_start();
require './php/db_connect.php';
$query = $pdo->prepare('SELECT * FROM news');
$query->execute();
$news = $query->fetchAll();

$query = $pdo->prepare('SELECT * FROM last_game');
$query->execute();
$last_game = $query->fetchAll();

$query = $pdo->prepare('SELECT * FROM standings order by pct desc');
$query->execute();
$standings = $query->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lakers</title>
    <link rel="icon" href="img/lakerslogo.png" type="image/png">
    <style>
    <?php
    include './css/style.css';    
    ?>
    </style>
</head>

<body>

    <nav class="navbar">
    <img src="./img/lakers5.png" class="logo"> 
        <ul class="nav-links">

            <li><a href="./index.php" class="links" style="color: gold;">Home</a></li>
            <li><a href="./pages/roster.php" class="links">Roster</a></li>
            <li><a href="./pages/schedule.php" class="links">Schedule</a></li>
            <li><a href="./pages/contact.php" class="links">Contact Us</a></li>

            

            <?php 
            if(isset($_SESSION['role'])){
            if($_SESSION['role']== 'admin'){
                ?>
              <li><a href="./pages/dashboard.php" class="links">Dashboard</a></li>
              <?php
            }
        }
        ?>

            <?php
            if(!isset($_SESSION['username'])){?>
                <li><a href="../php/login.php" class="links" id="btn">Log In</a></li>
                <?php
                }
               ?>

            <?php
        
            if(isset($_SESSION['username'])){?>

            <li><a href="../php/logout.php" class="links" id="btn">Logout</a></li>
                
           <?php } ?>
           <button class="navbar-toggle">&#9776;</button>
        </ul>
    </nav>
    <nav class="banner">
        <p class="team-name">LOS ANGELES LAKERS</p>
        <p class="banner-paragraph">Welcome to the #LakeShow. 17x Champions.</p>
        <p class="banner-paragraph">The greatest team in NBA history.</p>
    </nav>
    <div class="rows">
        <div class="first-row">
            <div class="lastgame">
                <span style="font-weight: bold; color: snow; font-size: 2em">Previous Game</span>
            <div class="last-game">
            <?php
            foreach ($last_game as $last_game){
            ?>
                <div class="left-side">
                    <div class="teams">
                        <div class="home">
                            <img src="./img/<?php echo $last_game['home_team']?>" style="width : 10em;">
                            <span class="points"><?php echo $last_game['home_points']?></span>
                        </div>
                        <div class="away">
                            <img src="./img/<?php echo $last_game['away_team']?>" style="width: 6.3em;">
                            <span class="points"><?php echo $last_game['away_points']?></span>
                        </div>
                    </div>
                </div>
                    <div class="right-side">
                        <div class="best-player">
                            <img src="./img/players/<?php echo $last_game['best_player']?>" style="width: 14em;">
                            <div class="stats">
                                <div class="player-points">
                                    <span>PTS</span>
                                    <span><?php echo $last_game['points']?></span>
                                </div>
                                <div class="player-assists">
                                    <span>AST</span>
                                    <span><?php echo $last_game['assists']?></span>
                                </div>
                                <div class="player-rebounds">
                                    <span>RBD</span>
                                    <span><?php echo $last_game['rebounds']?></span>
                                </div>
                            </div>
                    </div>
            </div>
            <?php
            }
            ?>
            </div>
            </div>   
            <table class="standings-table">
  <thead>
    <tr>
      <th></th>
      <th>Team</th>
      <th>W</th>
      <th>L</th>
      <th>Win %</th>
    </tr>
  </thead>
  <tbody>
        <?php
         $count = 0;
        foreach ($standings as $standing) {
               $count++;
        ?>
         <?php

          if($standing['team'] == "Los Angeles Lakers"){
            ?>
      <tr>
      <td style="background: gold;"><?php echo $count?></td>
      <td style="background: gold;"><img src="./img/<?php echo $standing['image']?>" style="width: 1.3em; margin-right: 0.5em;"><?php echo $standing['team']?></td>
      <td style="background: gold;"><?php echo $standing['wins']?></td>
      <td style="background: gold;"><?php echo $standing['losses']?></td>
      <td style="background: gold;"><?php echo $standing['pct']?></td>
    </tr>
    <?php
    }else{
    ?>
        
    <tr>
    <td><?php echo $count?></td>
      <td><img src="./img/<?php echo $standing['image']?>" style="width: 1.3em; margin-right: 0.5em;"><span class="ekipa"><?php echo $standing['team']?></span></td>
      <td><?php echo $standing['wins']?></td>
      <td><?php echo $standing['losses']?></td>
      <td><?php echo $standing['pct']?></td>
    </tr>
    <?php
    }
    } 
    ?>
  </tbody>
</table>


        </div>
        <div class="second-row">
            <!--image slider start-->
    <div class="slider">
      <div class="slides">
        <!--radio buttons start-->
        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">
        <input type="radio" name="radio-btn" id="radio4">
        <!--slide images start-->
        <div class="slide first">
          <h1 class="slider-text">Lebron sprains ankle, could potentially miss regular season, but is back for playoffs</h1>
          <img src="./img/lebron.jpg" alt="">
        </div>
        <div class="slide">
        <h1 class="slider-text">Davis comes back like he never left, drops 37 while missing Lebron</h1>

          <img src="./img/lakers2.jpg" alt="">
        </div>
        <div class="slide">
        <h1 class="slider-text">New look Lakers with Russell, Beasley and Vanderbilt look interesting as they climb the table</h1>

          <img src="./img/lakers1.jpg" alt="">
        </div>
        <div class="slide">
        <h1 class="slider-text">D'Angelo Russell fits in perfectly with his old team the Lakers, putting up good numbers</h1>

          <img src="./img/lakers6.jpg" alt="">
        </div>
        <!--slide images end-->
        <!--automatic navigation start-->
        <div class="navigation-auto">
          <div class="auto-btn1"></div>
          <div class="auto-btn2"></div>
          <div class="auto-btn3"></div>
          <div class="auto-btn4"></div>
        </div>
        <!--automatic navigation end-->
      </div>
      <!--manual navigation start-->
      <div class="navigation-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
        <label for="radio4" class="manual-btn"></label>
      </div>
      <!--manual navigation end-->
    </div>
    <!--image slider end-->

    <script type="text/javascript">
    var counter = 1;
    setInterval(function(){
      document.getElementById('radio' + counter).checked = true;
      counter++;
      if(counter > 4){
        counter = 1;
      }
    }, 5000);
    
  
    </script>
        </div>
    </div>


    
</body>
</html>