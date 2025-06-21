<!DOCTYPE HTML>
    <head>
		<title>Peer Share - Signup</title>
		<link rel = "stylesheet" href = "main.css">
	</head>
<?php
    $username = $_REQUEST['username'];
    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    $gender = $_REQUEST['gender'];
    $grade = $_REQUEST['grade'];
    $phone = $_REQUEST['phone'];
    $email = $_REQUEST['email'];
    $passwd = $_REQUEST['passwd'];

    
    $servername = "127.0.0.1";
    $user = "root";
    $password = "vivek@11";
    $db = "alumni_share";
    $conn = mysqli_connect($servername, $user, $password,$db); 
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    #echo "hiiii";
    echo "Connected successfully";

  
    $sql = "INSERT INTO user_details(username, fname,lname,gender,grade, phone, email) VALUES ('$username', '$fname', '$lname', '$gender', '$grade', '$phone', '$email')";
    /*$sql ->bindParam(':username','vivek11');
    $sql ->bindParam(':fname',$vivek);
    $sql ->bindParam(':lname',$lname);
    $sql ->bindParam(':gender',$gender);
    $sql ->bindParam(':grade',$grade);
    $sql ->bindParam(':phone',$phone);
    $sql ->bindParam(':email',$email);*/
  
    echo "works";
    if (mysqli_query($conn, $sql)) {
    echo "New record created successfully in user details";
    } 
    else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "INSERT INTO user_cred(username, passwd) VALUES('$username', '$passwd')";
    echo "works";
    if (mysqli_query($conn, $sql)) {
    echo "New record created successfully in user credentials";
    } 
    else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    
?>