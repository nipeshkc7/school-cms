<?php
	session_start();

	$published=$_GET['box1'];
	$id=$_GET['id'];
	$title=$_GET['title'];
	$type=$_GET['type'];
	$body=$_GET['editor1'];
		if($_GET['type']=="page"){
		$sql_edit="UPDATE pages SET published=".$published.", page_title='".$title."',page_body='".$body."' WHERE page_id=".$id;
	}
		elseif($_GET['type']=="post"){
			$sql_edit="UPDATE posts SET published=".$published.", post_title='".$title."',post_body='".$body."' WHERE post_id=".$id;
		}
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname="school_cms";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else{
        	//echo 'connection successfull';
        }

        //checking email and password with database

        
       if($conn->query($sql_edit)== TRUE){
       		//echo 'successfully updated';
       		header("Location:./edit.php?type=".$type."&&id=".$id);
       }
       else{
       		echo 'error' .$conn->error;
       }

        //header("Location:./edit.php?type=".$type."&&id=".$id);
//       echo $result;
?>