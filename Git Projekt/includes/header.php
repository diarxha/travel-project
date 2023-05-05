<nav class="navbar">
        <ul class="nav-links">
            <li><img src="../img/lakers5.png" class="logo"></li>
            <li><a href="../index.php" class="links"+>Home</a></li>
            <li><a href="./roster.php" class="links">Roster</a></li>
            <li><a href="./schedule.php" class="links">Schedule</a></li>
            <li><a href="./contact.php" class="links">Contact Us</a></li>
            <?php 
            if(isset($_SESSION['role'])){
            if($_SESSION['role']== 'admin'){
                ?>
              <li><a href="./dashboard.php" class="links">Dashboard</a></li>
              <?php
            }
        }
        ?>

            <?php
            if(!isset($_SESSION['username'])){
                ?>
                <li><a href="../pages/login.php" class="links" id="btn">Log In</a></li>
           
               <?php
               }
               
                    
            if(isset($_SESSION['username'])){?>
            <li><a href="../php/logout.php" class="links" id="btn">Logout</a></li>
           <?php }
           
           ?>
        </ul>
</nav>