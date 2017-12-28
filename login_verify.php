<?php

		session_start(); 

        $user_email=$_GET["email"];
        $user_password=$_GET["password"];
        $url="./index.php";
          
        //connecting to the database

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname="school_cms";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        //checking email and password with database

        $sql_get_password="SELECT * FROM users where Email='".$user_email."'";
        $result=  $conn->query($sql_get_password);
//       echo $result;

        if ($result->num_rows > 0) {
   		 // output data of each row
    	while($row = $result->fetch_assoc()) {
     //   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        echo $row["Password"];
        if ($row["Password"]==$user_password){
        	echo "Connection successful";    
        	     //if pw matches start session
                   
            //session started
          $_SESSION["Name"]=$row["Name"];
          $_SESSION["Joined"]=$row["joined"];
          $_SESSION["Email"]=$user_email;


       		header("Location:$url"); 	//if pw matches goto this link


        }else{
        	echo "Wrong password";
        }

    }
} else {
    echo "No such account exists";
}
        
?>