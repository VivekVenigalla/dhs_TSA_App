<!DOCTYPE HTML>

<html>
    <head>
        <title>Alumni Share - Home</title>
        <link rel = "stylesheet" href = "main.css">
    </head>
    <body>
        
        <?php
            session_start();
            $username = $_SESSION['username'];
            include 'calendar.php';
            $calendar = new Calendar();
            echo $calendar->show();
            if(isset($_GET['num'])){
                echo "<div class = 'remind_d'";
                echo '<h2>Reminders for ' . $_GET['num'] . '</h2>';
                echo "</div>";
                echo '<div class = "remind">';
                echo "<br>";
                $date_r = $_GET['num'];
                $servername = "127.0.0.1";
                $user = "root";
                $password = "vivek@11";
                $db = "alumni_share";
                $conn = mysqli_connect($servername, $user, $password,$db); 
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                if(isset($_POST['soo'])){
                    $soo = $_POST['soo'];
                    $sql = "INSERT INTO reminders (username, date_set, reminder) VALUES('$username', '$date_r', '$soo')";
                    $result = mysqli_query($conn, $sql);
                    $conn.close();
                }
                $sql = "SELECT reminder FROM reminders WHERE username = '$username' AND date_set = '$date_r'";
                $result = mysqli_query($conn, $sql);
                echo "<ul>";
                while($row = $result->fetch_assoc())
                {
                    $remind = $row['reminder'];
                    echo "<li class = 'reminders'>" . $remind . "</li>";
                }
                echo "</ul>";
                echo "</div>";
                echo "<br>";
                echo "<form action = '' method = 'post'";
                echo "<label for 'soo'>Please enter your new reminder here:</label>";
                echo "<br>";
                echo "<input type = 'text' name = 'soo' maxlength = '200' class = 'text_in'>";
                echo "<input type = 'submit' value = 'SUBMIT' class = 'submit'>";
                echo "</form>";
            }
        ?>
    </body> 
</html>