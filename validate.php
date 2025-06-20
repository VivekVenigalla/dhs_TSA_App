<!DOCTYPE HTML>
<html>
	<head>
		<title>Alumni Share - Login</title>
        <link rel = "stylesheet" href = "main.css">
	</head>

	<body>
        <?php
            session_start();
            $username = $_REQUEST["username"];
            $passwd = $_REQUEST["passwd"];
            $all_user = array();
            $_SESSION['username'] = $username;

            $servername = "127.0.0.1";
            $user = "root";
            $password = "vivek@11";
            $db = "alumni_share";
            $conn = mysqli_connect($servername, $user, $password,$db); 
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            //find the username in sql

            $sql = "SELECT username, passwd FROM user_cred WHERE username = '$username'";
            
            $result = $conn->query($sql);
            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    if($row['passwd'] == $passwd){
                        //redirect to home page
                        //echo "<a href = 'home.php'>Click here to go to the homepage</a>";
                        //header("Location : home.php");
                    }
                    else{
                        echo "Password not correct /n";
                        echo "<a href = 'login_form.php'>Click here to go back to login</a>";
                    }
                }
            }
            else{
                echo "Username not correct";
                echo "<a href = 'login_form.php'>Click here to go back to login</a>";
            }

        ?>
	</body>
</html>