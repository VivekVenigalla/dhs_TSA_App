<!DOCTYPE HTML>

<html>
    <head>
        <title>Peer Share - Home</title>
        <link rel = "stylesheet" href = "main.css">
    </head>
    <body>
    <h1 class = "title_head"><img src = "handscollberation.png" alt = "logo" width = 50>Peer Share</h1>
    
        <?php
            $username = $_REQUEST["username"];
            $passwd = $_REQUEST["passwd"];
            $all_user = array();
            

            $servername = "127.0.0.1";
            $user = "root";
            $password = "vivek@11";
            $db = "alumni_share";
            $conn = mysqli_connect($servername, $user, $password,$db); 
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "SELECT username, passwd FROM user_cred WHERE username = '$username'";
            
            $result = $conn->query($sql);
            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    if($row['passwd'] == $passwd){
                        //redirect to home page
                        //echo "<a href = 'home.php'>Click here to go to the homepage</a>";
                    $sql = "UPDATE user_cred SET activity = 'Y' WHERE username = '$username'";
                    $result = $conn ->query($sql);
                    session_start();
                    $_SESSION["username"] = $username;
                    echo '<center>
                    <div class = "home_image">
                    </div>
                    <a href = chats.php target = "_blank">
                        <button class = "home_button" target = "_blank">Get Info</button>
                    </a>
                    <a href = "planner.php" target = "_blank">
                        <button class = "home_button">Plan</button>
                    </a>
                    <a href = "account.php" target = "_blank">
                        <button class = "home_button">Account</button>
                    </a> 
                    <a href = "index.php">
                        <button class = "home_button">Logout</button>
                    </a>  
                    </center> ';
                    }
                    else{
                        echo "Password not correct ";
                        echo "<a href = 'index.php'>Click here to go back to home</a>";
                    }
                }
            }
            else{
                echo "Username not correct ";
                echo "<a href = 'index.php'>Click here to go back to home</a>";
            }
        ?>
    </body> 
</html>