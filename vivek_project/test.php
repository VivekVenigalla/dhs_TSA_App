<!DOCTYPE HTML>
<?php
            $servername = "127.0.0.1";
            $username = "root";
            $password = "vivek@11";
            $db = "alumni_share";
            
            $conn = mysqli_connect($servername, $username, $password,$db); 
            if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
           }
           #echo "hiiii";
           echo "Connected successfully";
            $sql = "INSERT INTO user_details(username, fname,lname,gender,grade, phone, email) VALUES ('balaji11','balaji','v','m',9,null,'balaji@gmail.com')";
            if ($conn->query($sql) === TRUE) {
              echo "New record created successfully";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
            #echo "hello";
            #echo "$servername";
            #echo "$username";
            #echo "$password";
            #echo "$db";
            // Create connection
            #$conn = new ($servername, $username, $password);
            #try {
            #$conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password, $db);
            #$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            #$conn = new PDO('mysql:host=localhost;dbname=alumni_share', 'vivek', 'vivek@11');
            #$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            #$sql = "insert into user_details(username, fname,lname,gender,grade, phone, email) values ('balaji11','balaji','v','m',9,null,'balaji@gmail.com')";
            #$conn->exec($sql);
            #echo "record created successfully";
            #$link = mysql_connect("localhost","root","vivek@11","alumni_share");
            #if (!$link) {
            #    die('could not connect' . mysql_error());
            #}
            #echo "Connected successfully"; 
            #mysql_close($link);
            #    }
            #catch(PDOException $e) {
            #echo "Connection failed: " . $e->getMessage();
          #}
?>
