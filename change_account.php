<!DOCTYPE HTML>
<html>
    <head>
        <title>Alumni Share - Account</title>
        <link rel = "stylesheet" href = "main.css">
    </head>
    <body>
    <h1 class = "title_head"><img src = "handscollberation.png" alt = "logo" width = 50>Peer Share</h1>
    
        <div class = "sign_up_form">
        <form action = "accountchanger.php" method = "post">
            <label for="username">Username : </label>
			<input type = "text" id = "username" name = "username"><br>
            <br>
            <label for="fname">First Name : </label>
			<input type = "text" id = "fname" name = "fname"><br>
            <br>
            <label for="lname">Last Name : </label>
			<input type = "text" id = "lname" name = "lname"><br>
            <br>

            <label for="gender">Gender : </label><br>
			<input type="radio" id="male" name="gender" value="M">
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="F">
            <label for="female">Female</label><br>
            <br>

            <label for = "grade">Grade : </label>
            <select id="grade" name="grade">
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
            <br>
            <br>
            <label for="phone">Phone(Optional) : </label>
			<input type = "text" id = "phone" name = "phone"><br>
            <br>
            <label for="email">Email : </label>
			<input type = "text" id = "email" name = "email"><br>
            <br>
            <label for="passwd">Password : </label>
			<input type = "text" id = "passwd" name = "passwd"><br>

            <input type = "submit" value = "Submit">
		</form>
</div>
    </body>
</html>