<!DOCTYPE HTML>
<html>
	<head>
		<title>Alumni Share - Login</title>
		<link rel = "stylesheet" href = "main.css">
	</head>

	<body>
    <h1 class = "title_head"><img src = "handscollberation.png" alt = "logo" width = 50>Peer Share</h1>
    <center>
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
            $sql = "SELECT email FROM user_details WHERE username = '$username'";
            $result_2 = mysqli_query($conn, $sql);
            while($row = $result_2->fetch_assoc()){
                $email = $row['email'];
            }
            /*$sql = "SELECT * FROM posts";
            $result = mysqli_query($conn, $sql);
            while($row = $result->fetch_assoc())
            {
                $username = $row['username'];
                $title = $row['title'];
                $email = $row['email'];
                echo '<div class = "post"';
                echo "<h3>" . $username . "</h3>";
                echo "<h5>" . $row['email'] . "</h3>";
                echo "<a href = 'blog_display.php?title=$title&blog_user=$username&email=$email'><p>" . $title . "</p></a>";
                echo "</div>";
            }*/
        ?>
        <div class = "blog_stuff">
        <div class = 'new_question'>
        <form action = '' method = "post">
        <label for="title">Subject : </label><br>
            <input type = "text" id = "title" name = "title"><br>
            <label for="blog_post">Ask something : </label><br>
            <input type = "text" id = "blog_post" name = "blog_post" class = "big_text_question"><br>
            <input type = "submit" value = "SUBMIT" name = 'submit'>
        </form>
        <?php
            if(isset($_POST['submit'])){
                $post = $_POST['blog_post'];
                $title = $_POST['title'];
                $sql = "INSERT INTO posts(username, email, post, title) VALUES('$username', '$email', '$post', '$title')";
                $result_3 = mysqli_query($conn, $sql);
                echo "Your request was posted.";
            }
        ?>
        </div>
        </div>
        <div class = "blog_stuff">
        <div class = 'all_blogs'>
        <h2>All Posts</h2>
        <?php
            $sql = "SELECT * FROM posts ORDER BY id DESC";
            $result = mysqli_query($conn, $sql);
            while($row = $result->fetch_assoc()){
                $username = $row['username'];
                $title = $row['title'];
                $email = $row['email'];
                echo "<a href = 'blog_display.php?title=$title&blog_user=$username&email=$email' target = '_blank'><h2>" . $title . "</h2></a>";
                echo "<h3>" . $username . "|" . $email . "</h3>";
            }

        ?>
        </div>
        </div>
        </center>
	</body>
</html>