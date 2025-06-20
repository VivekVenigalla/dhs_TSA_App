<!DOCTYPE HTML>
<html>
    <head>
        <title>Alumni Share - Chats</title>
        <link rel = "stylesheet" href = "main.css">
        <h1 class = "title_head"><img src = "handscollberation.png" alt = "logo" width = 50>Peer Share</h1>
        
        <center>
        <h1>Get Info</h1>
        <?php
            session_start();
            $username = $_SESSION["username"];
            $all_users = array();
            $servername = "127.0.0.1";
            $user = "root";
            $password = "vivek@11";
            $db = "alumni_share";
            $conn = mysqli_connect($servername, $user, $password,$db); 
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            if (isset($_POST['foo']))
            {
                $_SESSION['chat_user'] = $_POST['foo'];
                echo $_POST['foo'];
                echo "<script>";
                echo "var newWindow;";
                echo "newWindow = window.open('display.php', '', 'width = 500, height= 750');";
                echo "newWindow.moveTo(1400,0)";
                echo "</script>";
            }
            $sql = "SELECT username, activity FROM user_cred";
            $result = mysqli_query($conn, $sql);
            echo "<div class = 'chat_box'>" . "\n";
            echo "<div class = 'chat_scroll_box'>" . "\n";
            echo "<form action = '' method = 'post'>" . "\n";
            echo "<h3>Direct Messages</h3>";
            while($row = $result->fetch_assoc())
            {
                $users = $row['username'];
                if($row['username'] === $username){
                    echo "" . "\n";
                }
                else
            {
                    if($row['activity'] === 'Y'){    
                        echo "<h3><button name = 'foo' value = '$users' class = 'yes_activity'>" . $row['username'] . "</button></h3>" . "\n";
                    }
                    else{
                        echo "<h3><button name = 'foo' value = '$users' class = 'no_activity'>" . $row['username'] . "</button></h3>" . "\n";
                    }
                }
            }
            echo "</form>" . "\n";
            echo "</div>" . "\n";
            echo "<div class = 'chat_scroll_box'>" . "\n";
            echo "<h2>Forum</h2>" . "\n";
            echo "<h2 style = 'color:navy'>Recent Posts</h2>" . "\n";
            $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 5";
            $result_2 = mysqli_query($conn, $sql);
            while($row = $result_2->fetch_assoc())
            {
                $username = $row['username'];
                $title = $row['title'];
                $email = $row['email'];
                echo "<a href = 'blog_display.php?title=$title&blog_user=$username&email=$email' target = '_blank'><h4>" . $title . "</h4></a>";
            }
            echo "<br>";
            echo "<a href = 'blog_home.php' target='_blank' style = 'color:black'><h2>All posts<h2></a>" . "\n";
            //grab top 5 posts with a set number of likes or more from database and display them here as direct links
            echo "</div>" . "\n";
            echo "<div class = 'chat_scroll_box'>" . "\n";
            echo "<h2>Extra Resources</h2>";
            //find resources and paste them here
            ?>
            <a href = "https://myap.collegeboard.org/login">AP Classroom</a>
            <br>
            <br>
            <a href = "https://bigfuture.collegeboard.org/student-search-service?gclid=Cj0KCQiA8aOeBhCWARIsANRFrQFY2fdOtuaH-RmfIjVmPbacYI8q9m1Mcy7ZjWT2kKklEpKz23bxnfAaAik4EALw_wcB&ef_id=Cj0KCQiA8aOeBhCWARIsANRFrQFY2fdOtuaH-RmfIjVmPbacYI8q9m1Mcy7ZjWT2kKklEpKz23bxnfAaAik4EALw_wcB:G:s&s_kwcid=AL!4330!3!623228945193!e!!g!!college%20board!11025878398!104937655421">College Board</a>
            <br>
            <br>
            <a href = "https://www.khanacademy.org/">Khan Academy</a>
            <br>
            <br>
            <a href ="https://www.skillshare.com/">Skillshare</a>
            <br>
            <br>
            <a href = "https://www.edx.org/">edX</a>
            <br>
            <br>
            <a href = "https://scholar.google.com/">Google Scholar</a>
            <br>
            <br>
            <a href = "https://gpacalculator.net/high-school-gpa-calculator/">GPA Calculator</a>

            <?php
            echo "</div>";
            echo "</div>" . "\n";
        ?>

        <?php
            //this is all the messages it self(paste into another script)
            //grab all the messages from database here and also the name of person
            /*function add_messages($new_date, $new_person, $new_message, $_array){
                $_array[$new_date] = array(
                    "person" => $new_person,
                    "message" => $new_message
                ); 
            }
            $person = "Vivek";
            $allmessages = array(
                "date1" => array(
                    "person" => "Vivek",
                    "message" => "Hello",
                ),
                "date2" => array(
                    "person" => "Sravya",
                    "message" => "How are you?",
                ),

            );
            foreach($allmessages as $date => $stuff){
                if($stuff["person"] == $person){
                    echo '<div class = "person1">';
                    echo "<h3>" . $stuff["message"] . "</h3>";
                    echo $stuff["person"] . " at "  . $date;
                    echo "</div>";
                }
                else{
                    echo "<h3>" . $stuff["message"] . "</h3>";
                    echo $stuff["person"] . " at "  . $date;
                }
            }*/
        ?>
        </center>
    </head>
    <body>
    </body>
</html>
