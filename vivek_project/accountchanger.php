<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href = "main.css">
    </head>
    <body>
    <h1 class = "title_head"><img src = "handscollberation.png" alt = "logo" width = 50>Peer Share</h1>
    
        <?php
            session_start();
            $username = $_SESSION['username'];
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
            echo "<p>Account created successfuly. Click <a href = 'account.php'>here</a> to view your account.</p>";
            if ($_POST['username'] != NULL){
                $new_username = $_POST['username'];
                $sql = "UPDATE user_details SET username = '$new_username' WHERE username = '$username'";
                $result = mysqli_query($conn, $sql);
            }
            if ($_POST['fname'] != NULL){
                $new_fname = $_POST['fname'];
                $sql = "UPDATE user_details SET fname = '$new_fname' WHERE username = '$username'";
                $result = mysqli_query($conn, $sql);
            }
            if ($_POST['lname'] != NULL){
                $new_lname = $_POST['lname'];
                $sql = "UPDATE user_details SET lname = '$new_lname' WHERE username = '$username'";
                $result = mysqli_query($conn, $sql);
            }
            if ($_POST['gender'] != NULL){
                $new_gender = $_POST['gender'];
                $sql = "UPDATE user_details SET gender = '$new_gender' WHERE username = '$username'";
                $result = mysqli_query($conn, $sql);
            }
            if ($_POST['grade'] != NULL){
                $new_grade = $_POST['grade'];
                $sql = "UPDATE user_details SET grade = '$new_grade' WHERE username = '$username'";
                $result = mysqli_query($conn, $sql);
            }
            if ($_POST['phone'] != NULL){
                $new_phone = $_POST['phone'];
                $sql = "UPDATE user_details SET phone = '$new_phone' WHERE username = '$username'";
                $result = mysqli_query($conn, $sql);
            }
            if ($_POST['email'] != NULL){
                $new_email = $_POST['email'];
                $sql = "UPDATE user_details SET email = '$new_email' WHERE username = '$username'";
                $result = mysqli_query($conn, $sql);
            }
        ?>

    </body>
</html>