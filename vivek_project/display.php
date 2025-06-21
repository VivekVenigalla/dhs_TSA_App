<!DOCTYPE HTML>

<html>
    <head>
        <title>Alumni Share - Home</title>
        <link rel = "stylesheet" href = "main.css">
    </head>
    <body>
    <h1 class = "title_head"><img src = "handscollberation.png" alt = "logo" width = 50>Peer Share</h1>
    
        <?php
            session_start();
            $chat_user = $_SESSION['chat_user'];
            $username = $_SESSION['username'];
            echo "<h1>" . $chat_user . "</h1>";
            $servername = "127.0.0.1";
            $user = "root";
            $password = "vivek@11";
            $db = "alumni_share";
            $conn = mysqli_connect($servername, $user, $password, $dbname);
            if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "SELECT * FROM messages WHERE username = '$username'";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                $users = $row['username'];
                echo $users;
                if ($users == $username){
                    echo "<div class = 'grey'>";
                    echo $row['message_sent'] . " sent by " . $users . " at " . $row['date_sent'];
                    echo "</div>";
                }
                else{
                    echo "<div class = 'white'>";
                    echo $row['message_sent'] . " sent by " . $users . " at " . $row['date_sent'];
                    echo "</div>";
                }
            }
        ?>
    </body> 
</html>