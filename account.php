<!DOCTYPE HTML>
<html>
    <head>
        <title>Alumni Share - Account</title>
        <link rel = "stylesheet" href = "main.css">
    </head>
    <body class = "account_page">
    <h1 class = "title_head"><img src = "handscollberation.png" alt = "logo" width = 50>Peer Share</h1>
        <div class = "account_display">
        <?php
            session_start();
            $username = $_SESSION['username'];

            $post_title = $_GET['title'];
            $blog_user = $_GET['blog_user'];
            $blog_email = $_GET['email'];
            $servername = "127.0.0.1";
            $user = "root";
            $password = "vivek@11";
            $db = "alumni_share";
            $conn = mysqli_connect($servername, $user, $password,$db); 
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            $sql = "SELECT * FROM user_details WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            while($row = $result->fetch_assoc()){
                echo "<p>Username : " . $username . "</p>";
                echo "<p>First Name : " . $row['fname'] . "</p>";
                echo "<p>Last Name : " . $row['lname'] . "</p>";
                if ($row['gender'] == 'M'){
                    echo "<p>Gender : Male</p>";
                }
                else{
                    echo "<p>Gender : Female</p>";
                }
                echo "<p>Grade : " . $row['grade'] . "</p>";
                if($row['phone'] != NULL){
                    echo "<p>Phone Number : " . $row['phone'] . "</p>";
                }
                else{
                    echo "<p>Phone Number : N/A</p>";
                }
                echo "<p>Email : " . $row['email'] . "</p>";
            }
        ?>
        <a href = "change_account.php">
            <button class = "account_change">Change account details</button>
        </a>
        </div>
    </body>
</html>