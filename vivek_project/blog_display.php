<!DOCTYPE HTML>
<html>
	<head>
		<title>Alumni Share - Login</title>
		<link rel = "stylesheet" href = "main.css">
	</head>

	<body>
    <h1 class = "title_head"><img src = "handscollberation.png" alt = "logo" width = 50>Peer Share</h1>
    
        <div class = 'post'>
		<?php
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
            $sql = "SELECT post FROM posts WHERE username = '$blog_user' AND title = '$post_title'";
            $result = mysqli_query($conn, $sql);
            while($row = $result->fetch_assoc()){
                $post = $row['post'];
            }
            echo "<h1>" . $post_title . "</h1>";
            echo "<h2>" . $blog_user . " | " . $blog_email . "</h2>";
            echo "<p>" . $post . "</p>";
            echo "</div>";
            echo "<br>";

            $sql = "SELECT username, email, reply FROM replies WHERE post = '$post_title'";
            $result_4 = mysqli_query($conn, $sql);
            while($row = $result_4->fetch_assoc()){
                $email = $row['email'];
                $username = $row['username'];
                $reply = $row['reply'];
                echo "<div class = 'reply_post'>";
                echo "<h2>" . $username . "|" . $email . " says..." . "</h2>";
                echo "<p>" . $reply . "</p>";
                echo "</div>";
                echo "<br>";
            }
            session_start();
            $username = $_SESSION['username'];
            $sql = "SELECT email FROM user_details WHERE username = '$username'";
            $result_2 = mysqli_query($conn, $sql);
            while($row = $result_2->fetch_assoc()){
                $email = $row['email'];
            }

            if (isset($_POST['blog_reply'])){
                $blog_post = $_POST['blog_reply'];
                $sql = "INSERT INTO replies(username, email, reply, post) VALUES('$username', '$email', '$blog_post', '$post_title')";
                $result_3 = mysqli_query($conn, $sql);
            }
        ?>
        <br>
        <center>
            <div class = 'reply'>
            <form action = '' method = 'post'>
            <label for="blog_reply">Reply: </label><br>
            <input type = "text" id = "blog_reply" name = "blog_reply" class = "big_text_question"><br>
            <input type = "submit" value = "SUBMIT">
            </form>
            </div>
        </center>
    </body>
</html>